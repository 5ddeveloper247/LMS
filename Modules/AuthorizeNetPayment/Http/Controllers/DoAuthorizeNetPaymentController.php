<?php

namespace Modules\AuthorizeNetPayment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;
use App\Models\CloverPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Modules\Payment\Entities\Checkout;
use Modules\PaymentMethodSetting\Entities\PaymentMethod;
use Modules\PaymentMethodSetting\Entities\PaymentMethodCredential;
use Illuminate\Support\Facades\Response;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DoAuthorizeNetPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function makePayment(Request $request, $type = 'new_user', $response = false, $installment_id = null, $is_checkout = false)
    {

         // dd($request);
         //   die;

        //$amount=1000;



        //   retrieving the paymentGateway settings

        $gatewaySettings = DB::table('AuthorizeNet_Settings')
            ->where('status', 1)
            ->first();

            //dd($gatewaySettings);
        if (!$gatewaySettings) {
            return redirect()->back()->with('error', 'Gateway settings not found');
        }

        $gatewayClient_id = $gatewaySettings->client_id;
        $gatewayClient_secret = $gatewaySettings->client_secret;
        $user_id = $request->input('user_id');



               // Get the submitted form data
    $requestData = $request->all();
    // Extracting data and formatting expiry date
    $expiryDateParts = explode('/', $requestData['expiryDate']);
    $formattedExpiryDate = $expiryDateParts[1] . '-' . $expiryDateParts[0]; // Format: YYYY-MM
    $cardHolderName = (array_key_exists('cardHolderLastname',$requestData)) ? $requestData['cardHolder'].' '.$requestData['cardHolderLastname'] : $requestData['cardHolder'];
    // Create the data array
    $data = [
        'user_id' => $requestData['user_id'],
        //'tracking_id' => $requestData['tracking_id'],
        'id' => $requestData['id'] ?? 0,
        'card' => [
            'cardHolder' => $cardHolderName,
            'cardNumber' => str_replace(' ', '', $requestData['cardNumber']), // Remove spaces from card number
            'expiryDate' => $formattedExpiryDate,
            'cvv' => $requestData['cvv']
        ],
        'amount' => [
            'amount' => $request->input('amount'),  // in cents
            'amountInDollar' => $request->input('amount') / 100  // in dollars
        ],
        'gatewaySettings' => [
            'client_id' =>   $gatewayClient_id,
            'client_secret' => $gatewayClient_secret
        ]
    ];

//  dd($data);


        if (!$request->session()->get('payment_details')) {
            $refId = 'ref' . time();
            //dd(  $refId );

            //stilll we have static payment values in curl request and we set the actual payment in database by after payment has completed
            // we are just using static payment for curl request but we are using actual payment for database

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://apitest.authorize.net/xml/v1/request.api',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                    "createTransactionRequest": {
                        "merchantAuthentication": {
                            "name":"'. $data['gatewaySettings']['client_id'] .'",
                             "transactionKey": "'. $data['gatewaySettings']['client_secret'] .'"
                        },
                        "refId": "' . $refId . '",
                        "transactionRequest":{
                            "transactionType": "authCaptureTransaction",
                            "amount": "'. $data['amount']['amountInDollar'] .'",
                            "payment":{
                                "creditCard": {
                                    "cardNumber": "'. $data['card']['cardNumber'] .'",
                                    "expirationDate": "'. $data['card']['expiryDate'] .'",
                                    "cardCode": "'. $data['card']['cvv'] .'"
                                }
                            },

                            "customer": {
                                "id": "' . $data['user_id'] . '"
                            },


                            "transactionSettings": {
                                "setting": {
                                    "settingName": "testRequest",
                                    "settingValue": "false"
                                }
                            },
                            "userFields": {
                                "userField": [
                                    {
                                        "name": "MerchantDefinedFieldName1",
                                        "value": "MerchantDefinedFieldValue1"
                                    },
                                    {
                                        "name": "favorite_color",
                                        "value": "blue"
                                    }
                                ]
                            },
                            "processingOptions": {
                            "isSubsequentAuth": "true"
                            },
                            "subsequentAuthInformation": {
                            "originalNetworkTransId": "123456789NNNH",
                            "originalAuthAmount": "4.00",
                            "reason": "resubmission"
                            },
                            "authorizationIndicatorType": {
                            "authorizationIndicator": "final"
                        }
                        }
                    }
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));


            $getresponse = curl_exec($curl);
            curl_close($curl);


            $dataArray = [];
            preg_match_all('/"([^"]+)":"([^"]+)"/', $getresponse, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $key = $match[1];
                $value = $match[2];
                $dataArray[$key] = $value;
            }
            $formatedData = [];
            if ($dataArray['resultCode'] == "Ok" && $dataArray["text"] == "Successful.") {
                $dataArray['paid'] = true;
                $dataArray['status'] = "succeeded";
                $dataArray['user_id'] = $data['user_id'];
                $dataArray['amount'] = $data['amount']['amountInDollar'];
                $dataArray["address_line1_check"] = null;
                $dataArray["address_zip"] = null;
                $dataArray["address_zip_check"] = null;
                $dataArray["brand"] = null;
                $dataArray["exp_month"] = 12;
                $dataArray["exp_year"] = 2025;
                $dataArray["first6"] = 424242;
                $dataArray["last4"] = 4242;
                $dataArray["payment_method_details"] = "mastercard";
                $dataArray["amount_refunded"] = 0;
                $dataArray["currency"] = "USD";
                $dataArray["created"] = '20122025';
                $dataArray["captured"] = true;
                // dd("jkjlkjlkjkl");

                //formated Data
                $formatedData['id'] = $dataArray['refId'];
                $formatedData['amount'] = $dataArray['amount'];
                $formatedData['payment_method_details'] = $dataArray['accountType'];
                $formatedData['amount_refunded'] = $dataArray['amount_refunded'];
                $formatedData['currency'] = $dataArray['currency'];
                $formatedData['created'] = $dataArray['created'];
                $formatedData['captured'] = $dataArray['captured'];
                $formatedData['ref_num'] = $dataArray['refId'];
                $formatedData['auth_code'] = $dataArray['authCode'];
                $formatedData['outcome'] = [
                    "network_status" => "approved_by_network",
                    "type" => "authorized"
                ];
                $formatedData['paid'] = $dataArray['paid'];
                $formatedData['status'] = $dataArray['status'];
                $formatedData['source'] = [
                    "id" => $dataArray['transId'],
                    "address_line1_check" => $dataArray["address_line1_check"],
                    "address_zip" => $dataArray["address_zip"],
                    "address_zip_check" => $dataArray["address_zip_check"],
                    "brand" => $dataArray["accountType"],
                    "exp_month" => $dataArray["exp_month"],
                    "exp_year" => $dataArray["exp_year"],
                    "first6" => $dataArray["first6"],
                    "last4" => $dataArray["last4"] // Corrected from $dataArray["first6"]
                ];
            } else {
                $dataArray['paid'] = false;
            }
        } else {
            $paymentDetails = $request->session()->get('payment_details');
            // dd($paymentDetails);
            $termOneText = $paymentDetails->term_one_text;
            //  dd($termOneText);
            $declarationDate = $paymentDetails->declaration_date;
            $termTwoText = $paymentDetails->term_two_text;
            $name = $paymentDetails->name;
            $phone = $paymentDetails->phone;
            $address = $paymentDetails->address;
            $fax = $paymentDetails->fax;
            $city = $paymentDetails->city;
            $state = $paymentDetails->state;
            $zip = $paymentDetails->Zip;
            $country = $paymentDetails->country;
            $paymentType = $paymentDetails->payment_type;
            $creditCardNoWithHyphens = $paymentDetails->credit_card_no;
            $creditCardNo = str_replace('-', '', $creditCardNoWithHyphens);
            $first6 = substr($creditCardNo, 0, 6);

            // Extract the last 4 digits
            $last4 = substr($creditCardNo, -4);
            $expDate = $paymentDetails->exp_date;
            if (Str::contains($expDate, '-')) {
                $dateArray = explode("-", $expDate);
            } elseif (Str::contains($expDate, '/')) {
                $dateArray = explode("/", $expDate);
            }

            // dd($dateArray);
            //Extract month and year from the array
            $expMonth = $dateArray[0];  //Month
            $expYear = $dateArray[1];
            $cardAppearsName = $paymentDetails->card_appears_name;
            $digitOnBack = $paymentDetails->digit_on_back;
            $dollarAmount = $paymentDetails->dollar_amount;
            $signature = $paymentDetails->stgnature;
            $paidBillDate = $paymentDetails->paid_bill_date;
            $paidBill = $paymentDetails->paid_bill;
            $studentSignature = $paymentDetails->student_signature;
            $studentSignatureDate = $paymentDetails->student_signature_date;
            $userID = $paymentDetails->user_id;
            //  dd($userID);
            $updatedAt = $paymentDetails->updated_at;
            $createdat = $paymentDetails->created_at;
            $createdAt = $createdat->format('mY H:i:s');
            $id = $paymentDetails->id;

            $refId = 'ref' . time();
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://apitest.authorize.net/xml/v1/request.api',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                    "createTransactionRequest": {
                        "merchantAuthentication": {
                            "name":"'. $data['gatewaySettings']['client_id'] .'",
                             "transactionKey": "'. $data['gatewaySettings']['client_secret'] .'"
                        },
                        "refId": "' . $refId . '",
                        "transactionRequest":{
                            "transactionType": "authCaptureTransaction",
                            "amount": "'. $data['amount']['amountInDollar'] .'",
                            "payment":{
                                "creditCard": {
                                    "cardNumber": "'. $data['card']['cardNumber'] .'",
                                    "expirationDate": "'. $data['card']['expiryDate'] .'",
                                    "cardCode": "'. $data['card']['cvv'] .'"
                                }
                            },

                            "customer": {
                                "id": "' . $data['user_id'] . '"
                            },


                            "transactionSettings": {
                                "setting": {
                                    "settingName": "testRequest",
                                    "settingValue": "false"
                                }
                            },
                            "userFields": {
                                "userField": [
                                    {
                                        "name": "MerchantDefinedFieldName1",
                                        "value": "MerchantDefinedFieldValue1"
                                    },
                                    {
                                        "name": "favorite_color",
                                        "value": "blue"
                                    }
                                ]
                            },
                            "processingOptions": {
                            "isSubsequentAuth": "true"
                            },
                            "subsequentAuthInformation": {
                            "originalNetworkTransId": "123456789NNNH",
                            "originalAuthAmount": "4.00",
                            "reason": "resubmission"
                            },
                            "authorizationIndicatorType": {
                            "authorizationIndicator": "final"
                        }
                        }
                    }
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));


            $getresponse = curl_exec($curl);
            // echo("2");
            //   dd($getresponse);
            // die;
            curl_close($curl);


            //  dd($getresponse);
            // die;
            $dataArray = [];
            preg_match_all('/"([^"]+)":"([^"]+)"/', $getresponse, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $key = $match[1];
                $value = $match[2];
                $dataArray[$key] = $value;
            }
            $formatedData = [];
            if ($dataArray['resultCode'] == "Ok" && $dataArray["text"] == "Successful.") {
                $dataArray['paid'] = true;
                $dataArray['status'] = "succeeded";
                $dataArray['user_id'] =$data['user_id'];
                $dataArray['amount'] =$data['amount']['amountInDollar'];
                $dataArray["address_line1_check"] = $address;
                $dataArray["address_zip"] = $zip;
                $dataArray["address_zip_check"] = $termTwoText;
                $dataArray["brand"] = $paymentType;
                $dataArray["exp_month"] = $expMonth;
                $dataArray["exp_year"] = $expYear;
                $dataArray["first6"] = $first6;
                $dataArray["last4"] = $last4;
                $dataArray["payment_method_details"] = $paymentType;
                $dataArray["amount_refunded"] = 0;
                $dataArray["currency"] = "USD";
                $dataArray["created"] = $createdAt;
                $dataArray["captured"] = true;
                // dd("jkjlkjlkjkl");

                //formated Data
                $formatedData['id'] = $dataArray['refId'];
                $formatedData['amount'] = $dataArray['amount'];
                $formatedData['payment_method_details'] = $dataArray['accountType'];
                $formatedData['amount_refunded'] = $dataArray['amount_refunded'];
                $formatedData['currency'] = $dataArray['currency'];
                $formatedData['created'] = $dataArray['created'];
                $formatedData['captured'] = $dataArray['captured'];
                $formatedData['ref_num'] = $dataArray['refId'];
                $formatedData['auth_code'] = $dataArray['authCode'];
                $formatedData['outcome'] = [
                    "network_status" => "approved_by_network",
                    "type" => "authorized"
                ];
                $formatedData['paid'] = $dataArray['paid'];
                $formatedData['status'] = $dataArray['status'];
                $formatedData['source'] = [
                    "id" => $dataArray['transId'],
                    "address_line1_check" => $dataArray["address_line1_check"],
                    "address_zip" => $dataArray["address_zip"],
                    "address_zip_check" => $dataArray["address_zip_check"],
                    "brand" => $dataArray["accountType"],
                    "exp_month" => $dataArray["exp_month"],
                    "exp_year" => $dataArray["exp_year"],
                    "first6" => $dataArray["first6"],
                    "last4" => $dataArray["last4"] // Corrected from $dataArray["first6"]
                ];
            } else {
                $dataArray['paid'] = false;
            }
        }


        $response1 = json_encode($formatedData, true);   //string
        $response11 = json_decode($response1, true);   //std class object

        $getresponse1 = json_encode($dataArray, true);
        $getresponse = json_decode($getresponse1, true);

        if ($getresponse["paid"]) {
            $saveCheck = $this->saveCloverResponce((int) $user_id, $response1, $type);
            if ($saveCheck) {
                // dd("paid");
                // dd($is_checkout);
                if ($is_checkout) {
                    $checkOutCheck = $this->saveCheckout($request, $response11, $type, $installment_id, $response1);
                    // dd( $checkOutCheck);
                    if ($checkOutCheck) {
                        if ($response) {
                            return $response11;    //std class object
                        }
                        return true;
                    }
                }
            }
        } else {
            //dd("un");
            if ($response) {
                return $getresponse;   //array
            }
            return false;
        }
    }









    public function saveCheckout($request, $response11, $type, $installment_id, $response1)
    {

        // echo(gettype(json_decode($getresponse)));
        // dd(gettype($response1));

        $response = json_decode($response1);  //object
        $response1 = json_encode($response11, true);  //string
        if (Auth::check()) {
            $user_id = Auth::id();
        } elseif (session()->get('user')) {
            $user_id = session()->get('user')->id;
        } else {
            $user_id = Cookie::get('user_id');
        }

        try {
            $checkout_info = new Checkout();
            $checkout_info->tracking = $response->id;
            $checkout_info->user_id = $user_id;
            $checkout_info->installment_id = $installment_id;
            $checkout_info->purchase_price = $response->amount;
            $checkout_info->price = $response->amount;
            $checkout_info->reveune = $response->amount;
            $checkout_info->status = 1;
            $checkout_info->payment_method = 'authorizeNet';
            $checkout_info->type = $type;
            $checkout_info->response = $response1;
            $checkout_info->save();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function saveCloverResponce($user_id, $response1, $type)
    {
        // dd("hghhjhgjhgh");
        try {
            $pay = new CloverPayment;
            $pay->response = $response1;  //$response1 json string
            $pay->user_id = $user_id;
            $pay->type = $type;
            $pay->save();
            return true;
        } catch (Exception $e) {
            // Toastr::error('Something Went Wrong', 'Error');
            return false;
        }
    }









    // public function makePayment(Request $request, $type = 'new_user', $response = false, $installment_id = null, $is_checkout = false)
    // {
    //     $post = $request->all();
    //     $post['currency'] = 'USD';
    //     $post['source'] = $_POST['cloverToken'];
    //     $clover_details = $this->getCloverConfig();

    //     $url = env('CLOVER_CHARGE_END_POINT');
    //     if ($clover_details->is_test == 'true') {
    //         $url = env('CLOVER_CHARGE_END_POINT_TEST');
    //     }

    //     $post = json_encode($post);
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     $headers = [
    //         'accept: application/json',
    //         'authorization: Bearer ' . $clover_details->access_token,
    //         'content-type: application/json',
    //     ];

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //     // execute!
    //     $getresponse = curl_exec($ch);

    //     // close the connection, release resources used
    //     curl_close($ch);

    //     // do anything you want with your response
    //     $response1 = json_decode($getresponse);

    //     if (isset($response1->paid)) {
    //         $this->saveCloverResponce((int)$request->user_id, $getresponse, $type);
    //         if ($is_checkout) {
    //             $this->saveCheckout($request, $response1, $type, $installment_id, $getresponse);
    //         }
    //         if ($response) {
    //             return $response1;
    //         }
    //         return true;
    //     } else {
    //         if ($response) {
    //             return $getresponse;
    //         }
    //         return false;
    //     }
    // }




    //dd($request->all());

    // $post = $request->all();
    // dd($userID);

    // $post['currency'] = 'USD';
    // $post['source'] = $_POST['cloverToken'];
    // $clover_details = $this->getCloverConfig();
    // $url = env('CLOVER_CHARGE_END_POINT');
    // if ($clover_details->is_test == 'true') {
    //     $url = env('CLOVER_CHARGE_END_POINT_TEST');
    // }

    // $post = json_encode($post);
    // $ch = curl_init($url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $headers = [
    //     'accept: application/json',
    //     'authorization: Bearer ' . $clover_details->access_token,
    //     'content-type: application/json',
    // ];

    // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // // execute!
    // $getresponse = curl_exec($ch);

    // // close the connection, release resources used
    // curl_close($ch);














    // $curl = curl_init();
    // curl_setopt_array($curl, array(
    // CURLOPT_URL => 'https://apitest.authorize.net/xml/v1/request.api',
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => '',
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS =>'{
    //     "createTransactionRequest": {
    //         "merchantAuthentication": {
    //             "name": "9x7azAUT3Af",
    //             "transactionKey": "2332qAS4X56UekBV"
    //         },
    //         "refId": "123456",
    //         "transactionRequest": {
    //             "transactionType": "authCaptureTransaction",
    //             "amount": "5",
    //             "payment": {
    //                 "creditCard": {
    //                     "cardNumber": "5424000000000015",
    //                     "expirationDate": "2025-12",
    //                     "cardCode": "999"
    //                 }
    //             },
    //             "lineItems": {
    //                 "lineItem": {
    //                     "itemId": "1",
    //                     "name": "vase",
    //                     "description": "Cannes logo",
    //                     "quantity": "18",
    //                     "unitPrice": "45.00"
    //                 }
    //             },
    //             "tax": {
    //                 "amount": "4.26",
    //                 "name": "level2 tax name",
    //                 "description": "level2 tax"
    //             },
    //             "duty": {
    //                 "amount": "8.55",
    //                 "name": "duty name",
    //                 "description": "duty description"
    //             },
    //             "shipping": {
    //                 "amount": "4.26",
    //                 "name": "level2 tax name",
    //                 "description": "level2 tax"
    //             },
    //             "poNumber": "456654",
    //             "customer": {
    //                 "id": "99999456654"
    //             },
    //             "billTo": {
    //                 "firstName": "Ellen",
    //                 "lastName": "Johnson",
    //                 "company": "Souveniropolis",
    //                 "address": "14 Main Street",
    //                 "city": "Pecan Springs",
    //                 "state": "TX",
    //                 "zip": "44628",
    //                 "country": "US"
    //             },
    //             "shipTo": {
    //                 "firstName": "China",
    //                 "lastName": "Bayles",
    //                 "company": "Thyme for Tea",
    //                 "address": "12 Main Street",
    //                 "city": "Pecan Springs",
    //                 "state": "TX",
    //                 "zip": "44628",
    //                 "country": "US"
    //             },
    //             "customerIP": "192.168.1.1",
    //             "transactionSettings": {
    //                 "setting": {
    //                     "settingName": "testRequest",
    //                     "settingValue": "false"
    //                 }
    //             },
    //             "userFields": {
    //                 "userField": [
    //                     {
    //                         "name": "MerchantDefinedFieldName1",
    //                         "value": "MerchantDefinedFieldValue1"
    //                     },
    //                     {
    //                         "name": "favorite_color",
    //                         "value": "blue"
    //                     }
    //                 ]
    //             },
    //             "processingOptions": {
    //              "isSubsequentAuth": "true"
    //             },
    //             "subsequentAuthInformation": {
    //              "originalNetworkTransId": "123456789NNNH",
    //              "originalAuthAmount": "45.00",
    //              "reason": "resubmission"
    //             },
    //             "authorizationIndicatorType": {
    //             "authorizationIndicator": "final"
    //           }
    //         }
    //     }
    // }',
    //   CURLOPT_HTTPHEADER => array(
    //     'Content-Type: application/json'
    //   ),
    // ));

    //        $getresponse = curl_exec($curl);

    //       // $responseArray = Response::json($getresponse)->original;
    //          print_r($getresponse);
    //          dd($getresponse);

    //        $strresponse=strval( $getresponse);
    //        echo(is_string($strresponse));
    //        $strencoded= json_encode($strresponse);
    //        print_r($strencoded);
    //        $strdecoded= json_decode($strencoded);
    //        dd($strdecoded);




    //          $response = json_decode($getresponse, true);
    //          dd($response);


    //         print_r($getresponse);
    //         echo("before decode");
    //         print_r($response);
    //         echo("after decode");




    public function getCloverConfig()
    {
        $clover = (object) [];
        $method = PaymentMethod::find(15);
        $method_setup = PaymentMethodCredential::firstOrNew(array('lms_id' => $method->lms_id));
        $clover->client_id = $method_setup->CLOVER_CLIENT_ID;
        $clover->code = $method_setup->CLOVER_CODE;
        $clover->client_secret = $method_setup->CLOVER_CLIENT_SECRET;
        $clover->merchant_id = $method_setup->CLOVER_MERCHANT_ID;
        $clover->employee_id = $method_setup->CLOVER_EMPLOYEE_ID;
        $clover->is_test = $method_setup->IS_CLOVER_LOCALHOST;
        $clover->access_token = !empty($method_setup->CLOVER_ACCESS_TOKEN) ? $method_setup->CLOVER_ACCESS_TOKEN : getPaymentEnv('CLOVER_ACCESS_TOKEN');
        return $clover;
    }

    public function getAccessToken($client_id, $client_secret, $code, $is_test)
    {
        $url = env('CLOVER_TOKEN_END_POINT');
        if ($is_test == 'true') {
            $url = env('CLOVER_TOKEN_END_POINT_TEST');
        }

        $data = array(
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'code' => $code
        );

        $msg = http_build_query($data);

        $url .= $msg;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result1 = json_decode($result);
        if (isset($result1->access_token)) {
            return $result1->access_token;
        } else {
            return $result1;
        }
    }
    public function getCloverPakmsKey($access_token, $is_test)
    {

        $url = env('CLOVER_PAKMS_END_POINT');
        if ($is_test == 'true') {
            $url = env('CLOVER_PAKMS_END_POINT_TEST');
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer " . $access_token
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $response1 = json_decode($response);
        if (isset($response1->apiAccessKey)) {
            return $response1->apiAccessKey;
        } else {
            return $response1;
        }
    }
    public function getPakmsKey()
    {
        $clover_details = $this->getCloverConfig();
        $access_token = $clover_details->access_token;
        if (isset($access_token->message)) {
            return $access_token;
        } else {
            $clover_details = $this->getCloverPakmsKey($access_token, $clover_details->is_test);
            return $clover_details;
        }
    }



    public function getclovercode(Request $request)
    {

        $method = PaymentMethod::find(15);
        try {
            $method_setup = PaymentMethodCredential::firstOrNew(array('lms_id' => $method->lms_id));

            $method_setup->CLOVER_CLIENT_ID = trim($request->client_id);
            $method_setup->CLOVER_CODE = trim($request->code);
            $method_setup->CLOVER_MERCHANT_ID = trim($request->merchant_id);
            $method_setup->CLOVER_EMPLOYEE_ID = trim($request->employee_id);
            $access_token = $this->getAccessToken($request->client_id, $method_setup->CLOVER_CLIENT_SECRET, $request->code, $method_setup->IS_CLOVER_LOCALHOST);
            if (isset($access_token->message)) {
                return "Something went wrong Trying Again:" . $access_token->message;
            }
            $method_setup->CLOVER_ACCESS_TOKEN = $access_token;
            $method_setup->save();

            return "Successfully Save Into Your Database: " . json_encode([
                'client_id' => $method_setup->CLOVER_CLIENT_ID,
                'client_secret' => $method_setup->CLOVER_CLIENT_SECRET,
                'code' => $method_setup->CLOVER_CODE,
                'merchant_id' => $method_setup->CLOVER_MERCHANT_ID,
                'employee_id' => $method_setup->CLOVER_EMPLOYEE_ID,
                'access_token' => $method_setup->CLOVER_ACCESS_TOKEN,
                'is_test' => $method_setup->IS_CLOVER_LOCALHOST
            ]);
        } catch (\Throwable $th) {
            return "Something went wrong : \n" . $th;
        }
    }
}











// public function makePayment(Request $request, $type = 'new_user', $response = false, $installment_id = null, $is_checkout = false)
// {

//   dd($request);
// //     die;

//     $user_id = $request->input('user_id');
//     $amount = $request->input('amount');  //in cents
//     // $amount=1000;
//     $amountInDollar = $amount / 100;   //in dollar
//     $paymentDetails = $request->session()->get('payment_details');
//   //  dd($paymentDetails);
//     $termOneText = $paymentDetails->term_one_text;
//     //  dd($termOneText);
//     $declarationDate = $paymentDetails->declaration_date;
//     $termTwoText = $paymentDetails->term_two_text;
//     $name = $paymentDetails->name;
//     $phone = $paymentDetails->phone;
//     $address = $paymentDetails->address;
//     $fax = $paymentDetails->fax;
//     $city = $paymentDetails->city;
//     $state = $paymentDetails->state;
//     $zip = $paymentDetails->Zip;
//     $country = $paymentDetails->country;
//     $paymentType = $paymentDetails->payment_type;
//     $creditCardNoWithHyphens = $paymentDetails->credit_card_no;
//     $creditCardNo = str_replace('-', '', $creditCardNoWithHyphens);
//     $first6 = substr($creditCardNo, 0, 6);

//     // Extract the last 4 digits
//     $last4 = substr($creditCardNo, -4);
//     $expDate = $paymentDetails->exp_date;
//     $dateArray = explode("/", $expDate);
//     //Extract month and year from the array
//     $expMonth = $dateArray[0];  //Month
//     $expYear = $dateArray[1];
//     $cardAppearsName = $paymentDetails->card_appears_name;
//     $digitOnBack = $paymentDetails->digit_on_back;
//     $dollarAmount = $paymentDetails->dollar_amount;
//     $signature = $paymentDetails->stgnature;
//     $paidBillDate = $paymentDetails->paid_bill_date;
//     $paidBill = $paymentDetails->paid_bill;
//     $studentSignature = $paymentDetails->student_signature;
//     $studentSignatureDate = $paymentDetails->student_signature_date;
//     $userID = $paymentDetails->user_id;
//     //  dd($userID);
//     $updatedAt = $paymentDetails->updated_at;
//     $createdat = $paymentDetails->created_at;
//     $createdAt = $createdat->format('mY H:i:s');
//     $id = $paymentDetails->id;


//     // dd($user_id);
//     //    [  cutomer's key
//     //     "name": "9x7azAUT3Af",
//     //     "transactionKey": "6RpKz92VY5C87re6"
//     //    ]

//     //    "name": "9x7azAUT3Af",
//     //    "transactionKey": "2332qAS4X56UekBV"


//     // "cardNumber": "' . $creditCardNo . '",
//     // "expirationDate": "' . $expYear . '-' . $expMonth . '",
//     // "cardCode": "' . $digitOnBack . '"
//     // "amount": "' . $amountInDollar . '",

//     // "customer": {
//     //     "id": "' . $user_id . '"
//     // },




//     // client credentials
//     // "name":"6Bj83Rby2",
//     // "transactionKey": "393skyQL94Mb6hFV"
//     // CURLOPT_URL => 'https://api.authorize.net/xml/v1/request.api',



//     $refId = 'ref' . time();
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://apitest.authorize.net/xml/v1/request.api',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => '{
//             "createTransactionRequest": {
//                 "merchantAuthentication": {
//                     "name":"9x7azAUT3Af",
//                      "transactionKey": "3d6Za982J9s94Yb6"
//                 },
//                 "refId": "' . $refId . '",
//                 "transactionRequest":{
//                     "transactionType": "authCaptureTransaction",
//                     "amount": "100",
//                     "payment":{
//                         "creditCard": {
//                             "cardNumber": "5424000000000015",
//                             "expirationDate": "2025-12",
//                             "cardCode": "999"
//                         }
//                     },

//                     "customer": {
//                         "id": "' . $user_id . '"
//                     },


//                     "transactionSettings": {
//                         "setting": {
//                             "settingName": "testRequest",
//                             "settingValue": "false"
//                         }
//                     },
//                     "userFields": {
//                         "userField": [
//                             {
//                                 "name": "MerchantDefinedFieldName1",
//                                 "value": "MerchantDefinedFieldValue1"
//                             },
//                             {
//                                 "name": "favorite_color",
//                                 "value": "blue"
//                             }
//                         ]
//                     },
//                     "processingOptions": {
//                     "isSubsequentAuth": "true"
//                     },
//                     "subsequentAuthInformation": {
//                     "originalNetworkTransId": "123456789NNNH",
//                     "originalAuthAmount": "4.00",
//                     "reason": "resubmission"
//                     },
//                     "authorizationIndicatorType": {
//                     "authorizationIndicator": "final"
//                 }
//                 }
//             }
//         }',
//         CURLOPT_HTTPHEADER => array(
//             'Content-Type: application/json'
//         ),
//     ));


//     $getresponse = curl_exec($curl);
//     curl_close($curl);


//     // dd($getresponse);
//     // die;
//     $dataArray = [];
//     preg_match_all('/"([^"]+)":"([^"]+)"/', $getresponse, $matches, PREG_SET_ORDER);
//     foreach ($matches as $match) {
//         $key = $match[1];
//         $value = $match[2];
//         $dataArray[$key] = $value;
//     }


//     $formatedData = [];
//     if ($dataArray['resultCode'] == "Ok" && $dataArray["text"] == "Successful.") {
//         $dataArray['paid'] = true;
//         $dataArray['status'] = "succeeded";
//         $dataArray['user_id'] = $user_id;
//         $dataArray['amount'] = $amount;
//         $dataArray["address_line1_check"] = $address;
//         $dataArray["address_zip"] = $zip;
//         $dataArray["address_zip_check"] = $termTwoText;
//         $dataArray["brand"] = $paymentType;
//         $dataArray["exp_month"] = $expMonth;
//         $dataArray["exp_year"] = $expYear;
//         $dataArray["first6"] = $first6;
//         $dataArray["last4"] = $last4;
//         $dataArray["payment_method_details"] = $paymentType;
//         $dataArray["amount_refunded"] = 0;
//         $dataArray["currency"] = "USD";
//         $dataArray["created"] = $createdAt;
//         $dataArray["captured"] = true;
//         // dd("jkjlkjlkjkl");

//         //formated Data
//         $formatedData['id'] = $dataArray['refId'];
//         $formatedData['amount'] = $dataArray['amount'];
//         $formatedData['payment_method_details'] = $dataArray['accountType'];
//         $formatedData['amount_refunded'] = $dataArray['amount_refunded'];
//         $formatedData['currency'] = $dataArray['currency'];
//         $formatedData['created'] = $dataArray['created'];
//         $formatedData['captured'] = $dataArray['captured'];
//         $formatedData['ref_num'] = $dataArray['refId'];
//         $formatedData['auth_code'] = $dataArray['authCode'];
//         $formatedData['outcome'] = [
//             "network_status" => "approved_by_network",
//             "type" => "authorized"
//         ];
//         $formatedData['paid'] = $dataArray['paid'];
//         $formatedData['status'] = $dataArray['status'];
//         $formatedData['source'] = [
//             "id" => $dataArray['transId'],
//             "address_line1_check" => $dataArray["address_line1_check"],
//             "address_zip" => $dataArray["address_zip"],
//             "address_zip_check" => $dataArray["address_zip_check"],
//             "brand" => $dataArray["accountType"],
//             "exp_month" => $dataArray["exp_month"],
//             "exp_year" => $dataArray["exp_year"],
//             "first6" => $dataArray["first6"],
//             "last4" => $dataArray["last4"] // Corrected from $dataArray["first6"]
//         ];

//     } else {
//         $dataArray['paid'] = false;
//     }

//       //dd($dataArray);
//     // dd($formatedData);

//     // if($dataArray['resultCode']=="Ok" && $dataArray['transId'] !=="0"){
//     // $dataArray['paid']=true;
//     // $dataArray['status']="succeeded";
//     // $dataArray['user_id']=$user_id;
//     // $dataArray['amount']=$amount;
//     // $dataArray["address_line1_check"] ="pass";
//     // $dataArray["address_zip"]="14254";
//     // $dataArray["address_zip_check"]="pass";
//     // $dataArray["brand"] ="VISA";
//     // $dataArray["exp_month"]="12";
//     // $dataArray["exp_year"] ="2025";
//     // $dataArray["first6"] ="424242";
//     // $dataArray["last4"] = "4242";
//     // $dataArray["payment_method_details"] = "card";
//     // $dataArray["amount_refunded"]=0;
//     // $dataArray["currency"]= "USD";
//     // $dataArray["created"]= 1699345754425;
//     // $dataArray["captured"] = true;

//     // //formated Data

//     // $formatedData['id'] = $dataArray['refId'];
//     // $formatedData['amount'] = $dataArray['amount'];
//     // $formatedData['payment_method_details'] = $dataArray['payment_method_details'];
//     // $formatedData['amount_refunded']=$dataArray['amount_refunded'];
//     // $formatedData['currency'] = $dataArray['currency'];
//     // $formatedData['created']=$dataArray['created'];
//     // $formatedData['captured'] = $dataArray['captured'];
//     // $formatedData['ref_num'] = $dataArray['refId'];
//     // $formatedData['auth_code'] = $dataArray['authCode'];
//     // $formatedData['outcome'] = [
//     //     "network_status" => "approved_by_network",
//     //     "type" => "authorized"
//     // ];
//     // $formatedData['paid'] = $dataArray['paid'];
//     // $formatedData['status'] = $dataArray['status'];
//     // $formatedData['source'] = [
//     //     "id" => $dataArray['transId'],
//     //     "address_line1_check" => $dataArray["address_line1_check"],
//     //     "address_zip" => $dataArray["address_zip"],
//     //     "address_zip_check" => $dataArray["address_zip_check"],
//     //     "brand" => $dataArray["brand"],
//     //     "exp_month" => $dataArray["exp_month"],
//     //     "exp_year" => $dataArray["exp_year"],
//     //     "first6" => $dataArray["first6"],
//     //     "last4" => $dataArray["last4"]              //Corrected from $dataArray["first6"]
//     // ];






//     //     }
//     //     else{
//     //     $dataArray['paid']=false;
//     // }

//     //dd($dataArray);

//     //dd(json_encode($formatedData));

//     // dd($getresponse);
//     // Convert the array to a JSON string
//     //  dd($formatedData);

//     $response1 = json_encode($formatedData, true);   //string
//     $response11 = json_decode($response1, true);   //std class object

//     $getresponse1 = json_encode($dataArray, true);
//     $getresponse = json_decode($getresponse1, true);


//     //dd($getresponse);
//     //$response1 json string
//     //$response11 std object or  array
//     //dd($getresponse["paid"]);
//     //if (false){
//       // dd($getresponse["paid"]);
//     if ($getresponse["paid"]) {
//         $saveCheck = $this->saveCloverResponce((int) $user_id, $response1, $type);
//         if ($saveCheck) {
//              // dd("paid");
//            // dd($is_checkout);
//             if ($is_checkout) {
//                 $checkOutCheck = $this->saveCheckout($request, $response11, $type, $installment_id, $response1);
//                // dd( $checkOutCheck);
//                 if ($checkOutCheck) {
//                     if ($response) {
//                         return $response11;    //std class object
//                     }
//                     return true;

//                 }
//             }
//         }
//     } else {
//         //dd("un");
//         if ($response) {
//             return $getresponse;   //array
//         }
//         return false;
//     }
// }









// public function saveCheckout($request, $response11, $type, $installment_id, $response1)
// {

//     // echo(gettype(json_decode($getresponse)));
//     // dd(gettype($response1));

//     $response = json_decode($response1);  //object
//     $response1 = json_encode($response11, true);  //string
//     if (Auth::check()) {
//         $user_id = Auth::id();
//     } elseif (session()->get('user')) {
//         $user_id = session()->get('user')->id;
//     } else {
//         $user_id = Cookie::get('user_id');
//     }

//     try {
//         $checkout_info = new Checkout();
//         $checkout_info->tracking = $response->id;
//         $checkout_info->user_id = $user_id;
//         $checkout_info->installment_id = $installment_id;
//         $checkout_info->purchase_price = $response->amount / 100;
//         $checkout_info->price = $response->amount / 100;
//         $checkout_info->reveune = $response->amount / 100;
//         $checkout_info->status = 1;
//         $checkout_info->payment_method = 'authorizeNet';
//         $checkout_info->type = $type;
//         $checkout_info->response = $response1;
//         $checkout_info->save();
//         return true;
//     } catch (Exception $e) {
//         return false;
//     }

// }

// public function saveCloverResponce($user_id, $response1, $type)
// {
//     // dd("hghhjhgjhgh");
//     try {
//         $pay = new CloverPayment;
//         $pay->response = $response1;  //$response1 json string
//         $pay->user_id = $user_id;
//         $pay->type = $type;
//         $pay->save();
//         return true;
//     } catch (Exception $e) {
//         // Toastr::error('Something Went Wrong', 'Error');
//         return false;
//     }
// }
