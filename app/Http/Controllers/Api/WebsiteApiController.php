<?php

namespace App\Http\Controllers\Api;

use App\BillingDetails;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Jobs\SendGeneralEmail;
use App\LessonComplete;
use App\User;
use App\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\UserBlog;
use Modules\Certificate\Entities\CertificateRecord;
use Modules\Coupons\Entities\Coupon;
use Modules\Coupons\Entities\UserWiseCoupon;
use Modules\Coupons\Entities\UserWiseCouponSetting;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseComment;
use Modules\CourseSetting\Entities\CourseCommentReply;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Modules\CourseSetting\Entities\CourseReveiw;
use Modules\CourseSetting\Entities\Notification;
use Modules\FrontendManage\Entities\Slider;
use Modules\Org\Entities\OrgRecentActivity;
use Modules\OrgSubscription\Entities\OrgAttendance;
use Modules\OrgSubscription\Entities\OrgCourseSubscription;
use Modules\OrgSubscription\Entities\OrgSubscriptionCheckout;
use Modules\Payment\Entities\Cart;
use Modules\Payment\Entities\Checkout;
use Modules\Payment\Entities\InstructorPayout;
use Modules\PaymentMethodSetting\Entities\PaymentMethod;
use Modules\Quiz\Entities\OnlineExamQuestionAssign;
use Modules\Quiz\Entities\OnlineQuiz;
use Modules\Quiz\Entities\QuestionBankMuOption;
use Modules\Quiz\Entities\QuizMarking;
use Modules\Quiz\Entities\QuizTest;
use Modules\Quiz\Entities\QuizTestDetails;
use Modules\Quiz\Entities\QuizTestDetailsAnswer;
use Modules\Setting\Model\GeneralSetting;
use Modules\VirtualClass\Entities\VirtualClass;
use paytm\paytmchecksum\PaytmChecksum;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use Modules\BBB\Entities\BbbMeeting;
use App\Traits\ImageStore;
use Modules\Certificate\Entities\Certificate;
use Modules\Certificate\Http\Controllers\CertificateController;

/**
 * @group  Frontend Api
 *
 * APIs for managing frontend api
 */
class WebsiteApiController extends Controller
{

    use ImageStore;

    /**
     * Cart List
     * @response {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "course_id": 1,
     * "user_id": 6,
     * "instructor_id": 2,
     * "tracking": "MQKR46KB7JJP",
     * "price": 10,
     * "created_at": "2020-11-17T06:29:05.000000Z",
     * "updated_at": "2020-11-17T06:29:05.000000Z",
     * "course": {
     * "id": 1,
     * "category_id": 1,
     * "subcategory_id": 1,
     * "quiz_id": null,
     * "user_id": 2,
     * "lang_id": 1,
     * "title": "Managerial Accounting Advance Course",
     * "slug": "managerial-accounting",
     * "duration": "5H",
     * "image": "public/demo/course/image/1.png",
     * "thumbnail": "public/demo/course/thumb/1.png",
     * "price": 20,
     * "discount_price": 10,
     * "publish": 1,
     * "status": 1,
     * "level": 2,
     * "trailer_link": "https://www.youtube.com/watch?v=mlqWUqVZrHA",
     * "host": "Youtube",
     * "meta_keywords": null,
     * "meta_description": null,
     * "about": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text\r\n            ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
     * "special_commission": null,
     * "total_enrolled": 1,
     * "reveune": 50,
     * "reveiw": 0,
     * "type": 1,
     * "created_at": null,
     * "updated_at": null,
     * "dateFormat": "17th November 2020",
     * "publishedDate": "17th November 2020 12:28 pm",
     * "sumRev": 2,
     * "purchasePrice": 21,
     * "enrollCount": 1,
     * "user": {
     * "id": 2,
     * "role_id": 2,
     * "name": "Teacher",
     * "photo": "public/infixlms/img/admin.png",
     * "image": "public/infixlms/img/admin.png",
     * "avatar": "public/infixlms/img/admin.png",
     * "mobile_verified_at": null,
     * "email_verified_at": "2020-09-09T10:52:36.000000Z",
     * "notification_preference": "mail",
     * "is_active": 1,
     * "username": "teacher@infixedu.com",
     * "email": "teacher@infixedu.com",
     * "email_verify": "0",
     * "phone": null,
     * "address": null,
     * "city": "1374",
     * "country": "19",
     * "zip": null,
     * "dob": null,
     * "about": null,
     * "facebook": null,
     * "twitter": null,
     * "linkedin": null,
     * "instagram": null,
     * "subscribe": 0,
     * "provider": null,
     * "provider_id": null,
     * "status": 1,
     * "balance": 0,
     * "currency_id": 112,
     * "special_commission": 1,
     * "payout": "Paypal",
     * "payout_icon": "/uploads/payout/pay_1.png",
     * "payout_email": "demo@paypal.com",
     * "referral": "4MLV6zZjd9",
     * "added_by": 0,
     * "created_at": "2020-11-16T04:39:07.000000Z",
     * "updated_at": "2020-11-16T04:39:07.000000Z"
     * }
     * }
     * }
     * ],
     * "message": "Getting Cart info"
     * }
     *
     */

    public function __construct()
    {
        config(['auth.defaults.guard' => 'api']);
    }

    public function cartList()
    {

        try {

            $carts = Cart::where('user_id', Auth::id())->with('course', 'course.user')->get();

            if (count($carts) != 0) {
                $response = [
                    'success' => true,
                    'data' => $carts,
                    'message' => 'Getting Cart info',
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Cart is empty ',
                ];
            }

            return response()->json($response, 200);
        } catch (\Exception $exception) {
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Add to cart
     *
     * @queryParam id required The id of Cart Example:1.
     * @response  {
     * "success": false,
     * "message": "Course already added in your cart"
     * }
     */

    public function addToCart($id)
    {
        try {
            $user = Auth::user();
            if (Auth::check() && ($user->role_id != 1)) {

                $exist = Cart::where('user_id', $user->id)->where('course_id', $id)->first();
                $oldCart = Cart::where('user_id', $user->id)->first();

                if (isset($exist)) {
                    $message = 'Course already added in your cart';
                    $success = false;
                } elseif (Auth::check() && ($user->role_id == 1)) {
                    $message = 'You logged in as admin so can not add cart !';
                    $success = false;
                } else {

                    if (isset($oldCart)) {
                        $course = Course::find($id);
                        $cart = new Cart();
                        $cart->user_id = $user->id;
                        $cart->instructor_id = $course->user_id;
                        $cart->course_id = $id;
                        $cart->tracking = $oldCart->tracking;
                        if ($course->discount_price != null) {
                            $cart->price = $course->discount_price;
                        } else {
                            $cart->price = $course->price;
                        }
                        $cart->save();
                    } else {

                        $course = Course::find($id);
                        $cart = new Cart();
                        $cart->user_id = $user->id;
                        $cart->instructor_id = $course->user_id;
                        $cart->course_id = $id;
                        $cart->tracking = getTrx();
                        if ($course->discount_price != null) {
                            $cart->price = $course->discount_price;
                        } else {
                            $cart->price = $course->price;
                        }
                        $cart->save();
                    }

                    $message = 'Course Added to your cart';
                    $success = true;
                }
            } //If user not logged in then cart added into session

            else {
                $message = 'Only student can add to cart';
                $success = true;
            }
            $response = [
                'success' => $success,
                'message' => $message,
            ];

            return response()->json($response, 200);
        } catch (\Exception $exception) {
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Remove cart
     * @queryParam id required The id of course/quiz Example:1.
     * @response  {
     * "success": false,
     * "message": "Course removed from your cart"
     * }
     */

    public function removeCart($id)
    {

        try {

            if (Auth::check()) {
                $item = Cart::find($id);
                if ($item) {
                    $item->delete();
                    $success = true;
                    $message = 'Course removed from your cart';
                } else {
                    $success = false;
                    $message = 'Something went wrong';
                }
            } else {
                $success = false;
                $message = 'Something went wrong';
            }

            $response = [
                'success' => $success,
                'message' => $message,
            ];

            return response()->json($response, 200);
        } catch (\Exception $exception) {
            $response = [
                'success' => false,
                'message' => $exception->getMessage()
            ];
            return response()->json($response, 500);
        }
    }


    /**
     * Apply Coupon
     * @bodyParam code string required The code of coupon Example:newyear2020
     * @bodyParam total number required The total of Amount Example:5000
     * @response  {
     * "success": true,
     * "total":30,
     * "message": "Coupon Successful Applied"
     * }
     */
    public function applyCoupon(Request $request)
    {

        try {

            $code = $request->code;

            $coupon = Coupon::where('code', $code)->whereDate('start_date', '<=', Carbon::now())
                ->whereDate('end_date', '>=', Carbon::now())->where('status', 1)->first();


            $tracking = Cart::where('user_id', Auth::id())->first()->tracking;


            $couponApply = false;


            $checkout = Checkout::where('tracking', $tracking)->first();

            if (empty($checkout)) {
                $checkout = new Checkout();
            }

            if (isset($coupon)) {
                if ($coupon->limit != 0) {
                    if ($coupon->limit <= $coupon->loginUserTotalUsed()) {

                        return response()->json([
                            'success' => false,
                            "message" => "Already used this coupon",
                        ], 200);
                    }
                }


                $total = $request->total;
                $max_dis = $coupon->max_discount;
                $min_purchase = $coupon->min_purchase;
                $type = $coupon->type;
                $value = $coupon->value;

                $checkTrackingId = Checkout::where('tracking', $tracking)->where('coupon_id', $coupon)->first();

                if ($checkTrackingId) {
                    return response()->json([
                        'success' => false,
                        'total' => $total,
                        "message" => "Already used this coupon",
                    ], 200);
                }

                if ($total >= $min_purchase) {


                    if ($coupon->category == 1) {
                        $couponApply = true;
                    } elseif ($coupon->category == 2) {

                        if (count($checkout->carts) != 1) {
                            return response()->json([
                                'success' => false,
                                'total' => $total,
                                "message" => "This coupon apply for single course",
                            ], 200);
                        }

                        if ($checkout->carts[0]->course_id == $coupon->course_id) {
                            $couponApply = true;
                        } else {
                            return response()->json([
                                'success' => false,
                                'total' => $total,
                                "message" => "This coupon is not valid for this course.",
                            ], 200);
                        }
                    } elseif ($coupon->category == 3) {
                        //                        dd();
                        if ($coupon->coupon_user_id != $checkout->user_id) {
                            return response()->json([
                                'success' => false,
                                'total' => $total,
                                "message" => "This coupon not for you.",
                            ], 200);
                        } else {
                            $couponApply = true;
                        }
                        //                        $couponApply=true;
                    }

                    $final = $total;
                    if ($couponApply) {
                        if ($type == 0) {
                            $discount = (($total * $value) / 100);
                            if ($discount >= $max_dis) {

                                $final = ($total - $max_dis);
                                $checkout->discount = $max_dis;
                                $checkout->purchase_price = $final;
                            } else {

                                $final = ($total - $discount);
                                $checkout->discount = $discount;
                                $checkout->purchase_price = $final;
                            }
                        } else {
                            $discount = $value;
                            if ($discount >= $max_dis) {
                                $final = ($total - $max_dis);

                                $checkout->discount = $max_dis;
                                $checkout->purchase_price = $final;
                            } else {
                                $final = ($total - $discount);
                                $checkout->discount = $discount;
                                $checkout->purchase_price = $final;
                            }
                        }
                    }
                    if ($discount > $total) {
                        return response()->json([
                            'success' => false,
                            'total' => $total,
                            "message" => "Invalid Request",
                        ], 200);
                    }
                    if (hasTax()) {
                        $tax = taxAmount($final);
                        $final = applyTax($final);
                        $checkout->tax = $tax;
                        $checkout->purchase_price = $final;
                    } else {
                        $tax = 0;
                    }
                    $checkout->tracking = $tracking;
                    $checkout->purchase_price = getPriceAsNumber($final);
                    $checkout->user_id = Auth::id();
                    $checkout->coupon_id = $coupon->id;
                    $checkout->price = $total;
                    $checkout->status = 0;
                    $checkout->save();
                    return response()->json([
                        'success' => true,
                        'total' => number_format($final, 2),
                        "message" => trans("frontend.Coupon Successfully Applied"),
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'total' => $total,
                        "message" => trans('frontend.Coupon Minimum Purchase Does Not Match'),
                    ], 200);
                }
            } else {
                $checkout->discount = 0;
                $checkout->coupon_id = null;
                $checkout->purchase_price = $request->total;
                $checkout->save();
                return response()->json([
                    'success' => false,
                    "message" => trans('frontend.Invalid Coupon')
                ], 200);
            }
            /*  $code = $request->code;

              $coupon = Coupon::where('code', $code)->whereDate('start_date', '<=', Carbon::now())
                  ->whereDate('end_date', '>=', Carbon::now())->where('status', 1)->first();
              if (isset($coupon)) {

                  $tracking = Cart::where('user_id', Auth::id())->first()->tracking;
                  $total = $request->total;
                  $max_dis = $coupon->max_discount;
                  $min_purchase = $coupon->min_purchase;
                  $type = $coupon->type;
                  $value = $coupon->value;

                  $couponApply = false;


                  $checkout = Checkout::where('tracking', $tracking)->first();
                  if (empty($checkout)) {
                      $checkout = new Checkout();
                  }

                  $checkTrackingId = Checkout::where('tracking', $tracking)->where('coupon_id', $coupon)->first();

                  if ($checkTrackingId) {
                      $response = [
                          'success' => false,
                          'message' => "Already used this coupon",
                      ];
                      return response()->json($response, 200);

                  }

                  if ($total >= $min_purchase) {


                      if ($coupon->category == 1) {
                          $couponApply = true;
                      } elseif ($coupon->category == 2) {

                          if (count($checkout->carts) != 1) {
                              return response()->json([
                                  'error' => "This coupon apply for single course",
                                  'total' => $total,
                              ], 200);
                          }

                          if ($checkout->carts[0]->course_id == $coupon->course_id) {
                              $couponApply = true;
                          } else {
                              return response()->json([
                                  'error' => "This coupon is not valid for this course.",
                                  'total' => $total,
                              ], 200);
                          }
                      } elseif ($coupon->category == 3) {
  //                        dd();
                          if ($coupon->coupon_user_id != $checkout->user_id) {
                              return response()->json([
                                  'error' => "This coupon not for you.",
                                  'total' => $total,
                              ], 200);
                          } else {
                              $couponApply = true;
                          }
  //                        $couponApply=true;
                      }

                      $final = $total;
                      if ($couponApply) {
                          if ($type == 0) {

                              $discount = (($total * $value) / 100);
                              if ($discount >= $max_dis) {

                                  $final = ($total - $max_dis);
                                  $checkout->discount = $max_dis;
                                  $checkout->purchase_price = $final;
                              } else {

                                  $final = ($total - $discount);
                                  $checkout->discount = $discount;
                                  $checkout->purchase_price = $final;

                              }
                          } else {

                              $discount = $value;

                              if ($discount >= $max_dis) {
                                  $final = ($total - $max_dis);

                                  $checkout->discount = $max_dis;
                                  $checkout->purchase_price = $final;
                              } else {
                                  $final = ($total - $discount);
                                  $checkout->discount = $discount;
                                  $checkout->purchase_price = $final;
                              }
                          }
                      }
                      if ($discount > $total) {
                          return response()->json([
                              'success' => false,
                              "message" => "Invalid Request"
                          ], 200);
                      }

                      $checkout->tracking = $tracking;
                      $checkout->user_id = Auth::id();
                      $checkout->coupon_id = $coupon->id;
                      $checkout->price = $final;
                      $checkout->status = 0;
                      $checkout->save();
                      $response = [
                          'success' => true,
                          'total' => number_format($final, 2),
                          'message' => "Coupon Successful Applied",
                      ];
                      return response()->json($response, 200);

                  } else {

                      $response = [
                          'success' => false,
                          'message' => "Coupon Minimum Purchase Does Not Match",
                      ];
                      return response()->json($response, 200);

                  }

              } else {
                  $response = [
                      'success' => false,
                      'message' => "Invalid Coupon",
                  ];
                  return response()->json($response, 200);

              }*/
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed",
            ];
            return response()->json($response, 500);
        }
    }


    /**
     * My Courses
     * @response
     * {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "category_id": 1,
     * "subcategory_id": 1,
     * "quiz_id": null,
     * "user_id": 2,
     * "lang_id": 1,
     * "title": "Managerial Accounting Advance Course",
     * "slug": "managerial-accounting",
     * "duration": "5H",
     * "image": "public/demo/course/image/1.png",
     * "thumbnail": "public/demo/course/thumb/1.png",
     * "price": 20,
     * "discount_price": 10,
     * "publish": 1,
     * "status": 1,
     * "level": 2,
     * "trailer_link": "https://www.youtube.com/watch?v=mlqWUqVZrHA",
     * "host": "Youtube",
     * "meta_keywords": null,
     * "meta_description": null,
     * "about": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text\r\n            ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
     * "special_commission": null,
     * "total_enrolled": 1,
     * "reveune": 50,
     * "reveiw": 0,
     * "type": 1,
     * "created_at": null,
     * "updated_at": null,
     * "dateFormat": "17th November 2020",
     * "publishedDate": "17th November 2020 10:40 am",
     * "sumRev": 2,
     * "purchasePrice": 21,
     * "enrollCount": 1
     * }
     * ],
     * "total": 11,
     * "message": "Getting Courses Data"
     * }
     */
    public function myCourses()
    {
        try {
            $courses = CourseEnrolled::where('course_enrolleds.user_id', Auth::user()->id)
                ->leftjoin('courses', 'courses.id', 'course_enrolleds.course_id')
                ->where('courses.type', 1)
                ->select('courses.*')
                ->with('user')
                ->get();

            foreach ($courses as $course) {
                $user = User::where('id', $course->user_id)->first();
                $complete = Course::where('id', $course->id)->with('completeLessons')->first();
                $course->totalCompletePercentage = $complete->LoginUserTotalPercentage;
                $course->title = json_decode($course->title, true);
                $course->about = json_decode($course->about, true);
                $course->requirements = json_decode($course->requirements, true);
                $course->outcomes = json_decode($course->outcomes, true);
                $course->user = $user;
            }
            $response = [
                'success' => true,
                'data' => $courses,
                'message' => "Getting my courses",
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }


    public function myQuizzes()
    {
        try {
            $courses = CourseEnrolled::where('course_enrolleds.user_id', Auth::user()->id)
                ->leftjoin('courses', 'courses.id', 'course_enrolleds.course_id')
                ->where('courses.type', 2)
                ->with('user', 'course')
                ->get();
            foreach ($courses as $course) {
                $user = User::where('id', $course->user_id)->first();
                $tests = QuizTest::where('user_id', Auth::user()->id)->get();
                $course->user = $user;
                $course->about = json_decode($course->about, true);
                $course->requirements = json_decode($course->requirements, true);
                $course->outcomes = json_decode($course->outcomes, true);
                $course->tests = $tests;
            }

            $response = [
                'success' => true,
                'data' => $courses,
                'message' => "Getting my Quiz",
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Something went wrong",
            ];
            return response()->json($response, 500);
        }
    }

    public function myClasses()
    {
        try {
            $courses = CourseEnrolled::where('course_enrolleds.user_id', Auth::user()->id)
                ->leftjoin('courses', 'courses.id', 'course_enrolleds.course_id')
                ->where('courses.type', 3)
                ->with('user', 'course')
                ->get();
            foreach ($courses as $course) {
                $class = VirtualClass::where('id', $course->class_id)->first();
                $course->class = $class;
                $course->about = json_decode($course->about, true);
                $course->requirements = json_decode($course->requirements, true);
                $course->outcomes = json_decode($course->outcomes, true);
                $user = User::where('id', $course->user_id)->first();
                $course->user = $user;
            }
            $response = [
                'success' => true,
                'data' => $courses,
                'message' => "Getting my Classes",
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Something went wrong",
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Update Profile
     * @bodyParam name string required The name of User Example:Student
     * @bodyParam email string required The email of User Example:user@email.com
     * @bodyParam phone string required The phone number of User Example:01711223344
     * @bodyParam address string required The address of User Example:Dhaka,Bangladesh
     * @bodyParam city string required The city of User Example:Dhaka
     * @bodyParam country string required The country of User Example:Bangladesh
     * @bodyParam zip string required The zip of User Example:1200
     * @bodyParam about string required The about of User Example:something.....
     * @bodyParam image file  The profile image of User Example:image.png
     * @response  {
     * "success": true,
     * "message": "Password has been changed"
     * }
     */

    public function updateProfile(Request $request)
    {
        /*   if (Auth::user()->role_id == 1) {
               $request->validate([
                   'name' => 'required',
                   'email' => 'required|email',

               ]);
           } else {
               $request->validate([
                   'name' => 'required',
                   'email' => 'required|email',
                   'phone' => 'nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:1|unique:users',
                   'address' => 'required',
                   'city' => 'required',
                   'country' => 'required',
                   'zip' => 'required',
               ]);
           }*/


        try {

            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->language_id = $request->language;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->zip = $request->zip;
            $user->currency_id = 112;
            $user->facebook = $request->facebook;
            $user->twitter = $request->twitter;
            $user->linkedin = $request->linkedin;
            $user->instagram = $request->instagram;
            $user->about = $request->about;

            if ($request->file('image') != "") {
                $user->image = $this->saveImage($request->file('image'));
            }
            $user->save();
            $response = [
                'success' => true,
                'message' => "Profile has been updated",
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Something went wrong",
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Review Course
     *
     * @bodyParam course_id  integer required The course_id of course/quiz Example:1
     * @bodyParam review string required The review  of course/quiz Example:Something
     * @bodyParam rating integer required The rating  of course/quiz Example:5
     * @response  {
     * "success": true,
     * "message": "Review Submit Successful"
     * }
     */
    public function submitReview(Request $request)
    {
        $this->validate($request, [
            'review' => 'required',
            'course_id' => 'required',
            'rating' => 'required'
        ]);

        try {
            $user_id = Auth::user()->id;
            $review = CourseReveiw::where('user_id', $user_id)->where('course_id', $request->course_id)->first();
            // return $review;
            if (is_null($review)) {
                $newReview = new CourseReveiw();
                $newReview->user_id = $user_id;
                $newReview->course_id = $request->course_id;
                $newReview->comment = $request->review;
                $newReview->star = $request->rating;
                $newReview->save();

                $course = Course::find($request->course_id);
                $total = CourseReveiw::where('course_id', $course->id)->sum('star');
                $count = CourseReveiw::where('course_id', $course->id)->where('status', 1)->count();
                $average = $total / $count;
                $course->reveiw = $average;
                $course->save();


                if (UserEmailNotificationSetup('Course_Review', $course->user)) {
                    SendGeneralEmail::dispatch($course->user, 'Course_Review', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'review' => $newReview->comment,
                        'star' => $newReview->star,
                    ]);
                }
                if (UserBrowserNotificationSetup('Course_Review', $course->user)) {
                    send_browser_notification(
                        $course->user,
                        'Course_Review', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'review' => $newReview->comment,
                        'star' => $newReview->star,
                    ],
                        trans('common.View'),
                        courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                    );
                }

                if (UserMobileNotificationSetup('Course_Review', $course->user) && !empty($course->user->device_token)) {
                    send_mobile_notification($course->user, 'Course_Review', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'review' => $newReview->comment,
                        'star' => $newReview->star,
                    ]);
                }
                $success = true;
                $message = 'Review Submit Successful';
            } else {

                $review->update([
                    'comment' => $request->review,
                    'star' => $request->rating,
                ]);

                $course = Course::find($request->course_id);
                $total = CourseReveiw::where('course_id', $course->id)->sum('star');
                $count = CourseReveiw::where('course_id', $course->id)->where('status', 1)->count();
                $average = $total / $count;
                $course->reveiw = $average;
                $course->save();

                if (UserEmailNotificationSetup('Course_Review', $course->user)) {
                    SendGeneralEmail::dispatch($course->user, 'Course_Review', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'review' => $review->comment,
                        'star' => $review->star,
                    ]);
                }
                if (UserBrowserNotificationSetup('Course_Review', $course->user)) {

                    send_browser_notification(
                        $course->user, 'Course_Review', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'review' => $review->comment,
                        'star' => $review->star,
                    ],
                        trans('common.View'),
                        courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                    );
                }

                if (UserMobileNotificationSetup('Course_Review', $course->user) && !empty($course->user->device_token)) {
                    send_mobile_notification($course->user, 'Course_Review', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'review' => $review->comment,
                        'star' => $review->star,
                    ]);
                }
                $success = true;
                $message = 'Review Edit Successful';
            }

            $response = [
                'success' => $success,
                'message' => $message
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'error' => $e->getMessage(),
                'message' => "Something went wrong",
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Comment Course
     *
     * @bodyParam course_id integer required The course_id of course/quiz Example:1
     * @bodyParam comment string required The comment  of course/quiz Example:Something
     * @response  {
     * "success": true,
     * "message": "Operation Successful"
     * }
     */
    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'course_id' => 'required',
        ]);

        try {
            $course = Course::where('id', $request->course_id)->where('status', 1)->first();

            if (isset($course)) {

                $comment = new CourseComment();
                $comment->user_id = Auth::user()->id;
                $comment->course_id = $request->course_id;
                $comment->instructor_id = $course->user_id;
                $comment->comment = $request->comment;
                $comment->status = 1;
                $comment->save();

                // $notification = new Notification();
                // $notification->author_id = Auth::user()->id;
                // $notification->user_id = $course->user_id;
                // $notification->course_id = $course->id;
                // $notification->course_comment_id = $comment->id;
                // $notification->save();


                if (UserEmailNotificationSetup('Course_comment', $course->user)) {
                    SendGeneralEmail::dispatch($course->user, 'Course_comment', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'comment' => $comment->comment,
                    ]);
                }
                if (UserBrowserNotificationSetup('Course_comment', $course->user)) {
                    send_browser_notification($course->user, 'Course_comment', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'comment' => $comment->comment,
                    ],
                        trans('common.View'),
                        courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                    );
                }

                if (UserMobileNotificationSetup('Course_comment', $course->user) && !empty($course->user->device_token)) {
                    send_mobile_notification($course->user, 'Course_comment', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'comment' => $comment->comment,
                    ]);
                }

                $success = true;
                $message = 'Operation successful';
            } else {
                $success = false;
                $message = 'Invalid Action !';
            }
            $response = [
                'success' => $success,
                'message' => $message
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Something went wrong",
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Comment Reply Course
     *
     * @bodyParam comment_id integer required The comment id of Comment Example:1
     * @bodyParam reply string required The reply  of Comment Example:Something
     * @response  {
     * "success": true,
     * "message": "Operation Successful"
     * }
     */
    public function commentReply(Request $request)
    {
        $this->validate($request, [
            'comment_id' => 'required',
            'reply' => 'required',
        ]);

        try {
            $comment = CourseComment::find($request->comment_id);
            $course = $comment->course;


            if (isset($course)) {

                $comment = new CourseCommentReply();
                $comment->user_id = Auth::user()->id;
                $comment->course_id = $course->id;
                if (!empty($request->reply_id)) {
                    $comment->reply_id = $request->reply_id;
                } else {
                    $comment->reply_id = null;
                }
                $comment->comment_id = $request->comment_id;
                $comment->reply = $request->reply;
                $comment->status = 1;
                $comment->save();


                if (UserEmailNotificationSetup('Course_comment_Reply', $course->user)) {
                    SendGeneralEmail::dispatch($course->user, 'Course_comment_Reply', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'comment' => $comment->comment,
                        'reply' => $comment->reply,
                    ]);
                }
                if (UserBrowserNotificationSetup('Course_comment_Reply', $course->user)) {

                    send_browser_notification($course->user, 'Course_comment_Reply', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'comment' => $comment->comment,
                        'reply' => $comment->reply,
                    ],
                        trans('common.View'),
                        courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                    );
                }

                if (UserMobileNotificationSetup('Course_comment_Reply', $course->user) && !empty($course->user->device_token)) {
                    send_mobile_notification($course->user, 'Course_comment_Reply', [
                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
                        'course' => $course->title,
                        'comment' => $comment->comment,
                        'reply' => $comment->reply,
                    ]);
                }


                $success = true;
                $message = 'Operation successful';
            } else {
                $success = false;
                $message = 'Invalid Action !';
            }
            $response = [
                'success' => $success,
                'message' => $message
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Something went wrong",
            ];
            return response()->json($response, 500);
        }
    }


    /**
     * Checkout
     *
     * @bodyParam billing_address  string required  Select "new" || "previous"
     * @bodyParam old_billing  integer required  If select Previous billing Address
     * @bodyParam first_name  string required  If select New billing Address
     * @bodyParam last_name  string required  If select New billing Address
     * @bodyParam country  string required  If select New billing Address
     * @bodyParam address1  string required  If select New billing Address
     * @bodyParam city  string required  If select New billing Address
     * @bodyParam phone  string required  If select New billing Address
     * @bodyParam email  string required  If select New billing Address
     * @response  {
     * "success": true,
     * "message": "Operation Successful"
     * }
     */
    public function makeOrder(Request $request)
    {
        $response = array('response' => '', 'success' => false);
        /* $validator = Validator::make($request->all(), [
             'billing_address' => 'required',
             'old_billing' => 'required_if:billing_address,previous',
             'first_name' => 'required_if:billing_address,new',
             'last_name' => 'required_if:billing_address,new',
             'country' => 'required_if:billing_address,new',
             'address1' => 'required_if:billing_address,new',
             'city' => 'required_if:billing_address,new',
             'phone' => 'required_if:billing_address,new',
             'email' => 'required_if:billing_address,new',
         ]);
         if ($validator->fails()) {
             return $response['response'] = $validator->messages();
         }*/

        try {
            $profile = Auth::user();
            $tracking = Cart::where('user_id', Auth::id())->first()->tracking;
            if ($profile->role_id == 3) {
                /* if (isSubscribe()) {
                     $total = 0;
                 } else {
                     $total = Cart::where('user_id', Auth::user()->id)->sum('price');
                 }*/
                $total = Cart::where('user_id', Auth::user()->id)->sum('price');
            }

            $checkout = Checkout::where('tracking', $tracking)->where('user_id', Auth::id())->latest()->first();
            if (!$checkout) {
                $checkout = new Checkout();
                $checkout->discount = 0.00;
                $checkout->purchase_price = $total;
                $checkout->tracking = $tracking;
                $checkout->user_id = Auth::id();
                $checkout->price = $total;
                $checkout->status = 0;
                $checkout->save();
            }


            if ($request->billing_address == 'new') {
                $bill = BillingDetails::where('tracking_id', $tracking)->first();

                if (empty($bill)) {
                    $bill = new BillingDetails();
                }

                $bill->user_id = Auth::id();
                $bill->tracking_id = $tracking;
                $bill->first_name = $request->first_name;
                $bill->last_name = $request->last_name;
                $bill->company_name = $request->company_name;
                $bill->country = $request->country;
                $bill->address1 = $request->address1;
                $bill->address2 = $request->address2;
                $bill->city = $request->city;
                $bill->state = $request->state;
                $bill->zip_code = $request->zip_code;
                $bill->phone = $request->phone;
                $bill->email = $request->email;
                $bill->details = $request->details;
                $bill->payment_method = null;
                $bill->save();
            } else {
                $bill = BillingDetails::where('id', $request->old_billing)->first();
            }

            $checkout_info = $checkout;
            if ($checkout_info) {
                $checkout_info->billing_detail_id = $bill->id;
                $checkout_info->save();

                if ($checkout_info->purchase_price == 0) {
                    $checkout_info->payment_method = 'None';
                    $bill->payment_method = 'None';
                    $checkout_info->save();
                    $carts = Cart::where('tracking', $checkout_info->tracking)->get();

                    foreach ($carts as $cart) {

                        $payment = new PaymentController();
                        $payment->directEnroll($cart->course_id, $checkout_info->tracking);
                        $cart->delete();
                    }


                    $response = [
                        'success' => true,
                        'type' => 'Free',
                        'message' => 'Operation successful'
                    ];
                    return response()->json($response, 200);
                } else {
                    $response = [
                        'success' => true,
                        'type' => 'Paid',
                        'message' => 'Operation successful. Go to Payment page'
                    ];
                    return response()->json($response, 200);
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Operation Failed.'
                ];
                return response()->json($response, 500);
            }
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Payment
     *
     * @queryParam response  required array Response Form Gateway.
     * @queryParam gateWayName  required string Gateway Name.
     * @response  {
     * "success": true,
     * "message": "Successfully Done"
     * }
     */
    public static function payWithGateWay(Request $request, $gateWayName)
    {
        try {
            if (isset($request->response)) {
                $response = $request->response;
            } else {
                $response = null;
            }


            if (Auth::check()) {
                $user = Auth::user();
                $track = Cart::where('user_id', $user->id)->first()->tracking;
                $total = Cart::where('user_id', Auth::user()->id)->sum('price');
                $checkout_info = Checkout::where('tracking', $track)->where('user_id', $user->id)->latest()->first();

                if ($gateWayName == "Wallet") {
                    if ($user->balance < $checkout_info->purchase_price) {

                        $response = [
                            'success' => false,
                            'message' => 'Insufficient balance'
                        ];
                        return response()->json($response, 200);
                    } else {
                        $newBal = ($user->balance - $checkout_info->purchase_price);
                        $user->balance = $newBal;
                        $user->save();
                    }
                }


                if (isset($checkout_info)) {

                    $discount = $checkout_info->discount;

                    $carts = Cart::where('tracking', $track)->get();

                    foreach ($carts as $cart) {


                        $course = Course::find($cart->course_id);
                        $enrolled = $course->total_enrolled;
                        $course->total_enrolled = ($enrolled + 1);

                        //==========================Start Referral========================
                        $purchase_history = CourseEnrolled::where('user_id', Auth::user()->id)->first();
                        $referral_check = UserWiseCoupon::where('invite_accept_by', Auth::user()->id)->where('category_id', null)->where('course_id', null)->first();
                        $referral_settings = UserWiseCouponSetting::where('role_id', Auth::user()->role_id)->first();

                        if ($purchase_history == null && $referral_check != null) {
                            $referral_check->category_id = $course->category_id;
                            $referral_check->subcategory_id = $course->subcategory_id;
                            $referral_check->course_id = $course->id;
                            $referral_check->save();
                            $percentage_cal = ($referral_settings->amount / 100) * $checkout_info->price;

                            if ($referral_settings->type == 1) {
                                if ($checkout_info->price > $referral_settings->max_limit) {
                                    $bonus_amount = $referral_settings->max_limit;
                                } else {
                                    $bonus_amount = $referral_settings->amount;
                                }
                            } else {
                                if ($percentage_cal > $referral_settings->max_limit) {
                                    $bonus_amount = $referral_settings->max_limit;
                                } else {
                                    $bonus_amount = $percentage_cal;
                                }
                            }

                            $referral_check->bonus_amount = $bonus_amount;
                            $referral_check->save();

                            $invite_by = User::find($referral_check->invite_by);
                            $invite_by->balance += $bonus_amount;
                            $invite_by->save();

                            $invite_accept_by = User::find($referral_check->invite_accept_by);
                            $invite_accept_by->balance += $bonus_amount;
                            $invite_accept_by->save();
                        }
                        //==========================End Referral========================
                        if ($discount != 0 || !empty($discount)) {
                            $itemPrice = $cart->price - ($discount / count($carts));
                            $discount_amount = $cart->price - $itemPrice;
                        } else {
                            $itemPrice = $cart->price;
                            $discount_amount = 0.00;
                        }
                        $enroll = new CourseEnrolled();
                        $instractor = User::find($cart->instructor_id);
                        $enroll->user_id = $user->id;
                        $enroll->tracking = $track;
                        $enroll->course_id = $course->id;
                        $enroll->purchase_price = $itemPrice;
                        $enroll->coupon = null;
                        $enroll->discount_amount = $discount_amount;
                        $enroll->status = 1;


                        if (!is_null($course->special_commission)) {
                            $commission = $course->special_commission;
                            $reveune = ($cart->price * $commission) / 100;
                            $enroll->reveune = $reveune;
                        } elseif (!is_null($instractor->special_commission)) {
                            $commission = $instractor->special_commission;
                            $reveune = ($cart->price * $commission) / 100;
                            $enroll->reveune = $reveune;
                        } else {

                            $commission = Settings('commission');
                            $reveune = ($cart->price * $commission) / 100;
                            $enroll->reveune = $reveune;
                        }

                        $payout = new InstructorPayout();
                        $payout->instructor_id = $course->user_id;
                        $payout->reveune = $reveune;

                        $payout->status = 0;
                        $payout->save();


                        if (UserEmailNotificationSetup('Course_Enroll_Payment', $checkout_info->user)) {
                            SendGeneralEmail::dispatch($checkout_info->user, 'Course_Enroll_Payment', [
                                'time' => \Illuminate\Support\Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                                'currency' => $checkout_info->user->currency->symbol ?? '$',
                                'price' => ($checkout_info->user->currency->conversion_rate * $cart->price),
                                'instructor' => $course->user->name,
                                'gateway' => 'Sslcommerz',
                            ]);
                        }
                        if (UserBrowserNotificationSetup('Course_Enroll_Payment', $checkout_info->user)) {
                            send_browser_notification($checkout_info->user, 'Course_Enroll_Payment', [
                                'time' => \Illuminate\Support\Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                                'currency' => $checkout_info->user->currency->symbol ?? '$',
                                'price' => ($checkout_info->user->currency->conversion_rate * $cart->price),
                                'instructor' => $course->user->name,
                                'gateway' => 'Sslcommerz',
                            ],
                                trans('common.View'),
                                courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                            );
                        }

                        if (UserMobileNotificationSetup('Course_Enroll_Payment', $checkout_info->user) && !empty($checkout_info->user->device_token)) {
                            send_mobile_notification($checkout_info->user, 'Course_Enroll_Payment', [
                                'time' => \Illuminate\Support\Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                                'currency' => $checkout_info->user->currency->symbol ?? '$',
                                'price' => ($checkout_info->user->currency->conversion_rate * $cart->price),
                                'instructor' => $course->user->name,
                                'gateway' => 'Sslcommerz',
                            ]);
                        }
                        if (UserEmailNotificationSetup('Enroll_notify_Instructor', $instractor)) {
                            SendGeneralEmail::dispatch($instractor, 'Enroll_notify_Instructor', [
                                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                                'currency' => $instractor->currency->symbol ?? '$',
                                'price' => ($instractor->currency->conversion_rate * $cart->price),
                                'rev' => @$reveune,
                            ]);
                        }
                        if (UserBrowserNotificationSetup('Enroll_notify_Instructor', $instractor)) {

                            send_browser_notification($instractor, 'Enroll_notify_Instructor', [
                                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                                'currency' => $instractor->currency->symbol ?? '$',
                                'price' => ($instractor->currency->conversion_rate * $cart->price),
                                'rev' => @$reveune,
                            ],
                                trans('common.View'),
                                courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                            );
                        }

                        if (UserMobileNotificationSetup('Course_Chapter_Added', $instractor) && !empty($instractor->device_token)) {
                            send_mobile_notification($instractor, 'Course_Chapter_Added', [
                                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                                'course' => $course->title,
                                'currency' => $instractor->currency->symbol ?? '$',
                                'price' => ($instractor->currency->conversion_rate * $cart->price),
                                'rev' => @$reveune,
                            ]);
                        }


                        $enroll->save();

                        $course->reveune = (($course->reveune) + ($enroll->reveune));

                        $course->save();


                    }

                    $checkout_info->payment_method = $gateWayName;
                    $checkout_info->status = 1;
                    $checkout_info->response = json_encode($response);
                    $checkout_info->save();


                    if ($checkout_info->user->status == 1) {

                        foreach ($carts as $old) {
                            $old->delete();
                        }
                    }
                    $response = [
                        'success' => true,
                        'message' => 'Operation successful.'
                    ];
                    return response()->json($response, 200);
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Operation Failed.'
                    ];
                    return response()->json($response, 500);
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Operation Failed.'
                ];
                return response()->json($response, 500);
            }
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Available Payment Methods
     * @response {
     * "success": true,
     * "data": [
     * {
     * "method": "PayPal",
     * "logo": "public/demo/gateway/paypal.png"
     * },
     * {
     * "method": "Stripe",
     * "logo": "public/demo/gateway/stripe.png"
     * },
     * {
     * "method": "PayStack",
     * "logo": "public/demo/gateway/paystack.png"
     * },
     * {
     * "method": "RazorPay",
     * "logo": "public/demo/gateway/razorpay.png"
     * },
     * {
     * "method": "PayTM",
     * "logo": "public/demo/gateway/paytm.png"
     * },
     * {
     * "method": "Bank Payment",
     * "logo": ""
     * },
     * {
     * "method": "Offline Payment",
     * "logo": ""
     * },
     * {
     * "method": "Wallet",
     * "logo": ""
     * }
     * ],
     * "message": "Operation successful"
     * }
     */
    public function paymentMethods()
    {
        try {
            $methods = PaymentMethod::where('active_status', 1)->get(['method', 'logo']);
            $response = [
                'success' => true,
                'data' => $methods,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }


    /**
     * Billing Address
     * @response {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "tracking_id": "K3USKPJBC5U8",
     * "user_id": 3,
     * "first_name": "Student",
     * "last_name": "",
     * "company_name": "Spondon IT",
     * "country": {
     * "id": 19,
     * "name": "Bangladesh",
     * "iso3": "BGD",
     * "iso2": "BD",
     * "phonecode": "880",
     * "currency": "BDT",
     * "capital": "Dhaka",
     * "active_status": 1,
     * "created_at": "2018-07-20T08:41:03.000000Z",
     * "updated_at": "2018-07-20T08:41:03.000000Z"
     * },
     * "address1": "Dhaka",
     * "address2": "",
     * "city": "Dhaka",
     * "zip_code": "1200",
     * "phone": "01723442233",
     * "email": "student@infixedu.com",
     * "details": "add here additional info.",
     * "payment_method": null,
     * "created_at": "2021-03-03T11:21:01.000000Z",
     * "updated_at": "2021-03-03T11:21:01.000000Z"
     * },
     * {
     * "id": 2,
     * "tracking_id": "765A3UJ7B11M",
     * "user_id": 3,
     * "first_name": "Student",
     * "last_name": "",
     * "company_name": "Spondon IT",
     * "country": {
     * "id": 19,
     * "name": "Bangladesh",
     * "iso3": "BGD",
     * "iso2": "BD",
     * "phonecode": "880",
     * "currency": "BDT",
     * "capital": "Dhaka",
     * "active_status": 1,
     * "created_at": "2018-07-20T08:41:03.000000Z",
     * "updated_at": "2018-07-20T08:41:03.000000Z"
     * },
     * "address1": "Dhaka",
     * "address2": "",
     * "city": "Dhaka",
     * "zip_code": "1200",
     * "phone": "01723442233",
     * "email": "student@infixedu.com",
     * "details": "add here additional info.",
     * "payment_method": null,
     * "created_at": "2021-03-03T11:21:01.000000Z",
     * "updated_at": "2021-03-03T11:21:01.000000Z"
     * }
     * ],
     * "message": "Operation successful"
     * }
     */
    public function billingAddress(Request $request)
    {
        try {
            $bills = BillingDetails::with('country')->where('user_id', $request->user()->id)->get();

            $response = [
                'success' => true,
                'data' => $bills,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }


    /**
     * Countries
     * @response {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "name": "Afghanistan"
     * }
     * ],
     * "message": "Operation successful"
     * }
     */
    public function countries()
    {
        try {
            $countries = DB::table('countries')->select('id', 'name')->get();
            $response = [
                'success' => true,
                'data' => $countries,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }


    /**
     * Cities
     * @queryParam country_id required The id of course/quiz Example:1.
     * @response {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "name": "Dhaka"
     * }
     * ],
     * "message": "Operation successful"
     * }
     */
    public function states($country_id)
    {
        try {
            $states = DB::table('states')->where('country_id', $country_id)->select('id', 'name')->get();
            $response = [
                'success' => true,
                'data' => $states,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }


    /**
     * Cities
     * @queryParam country_id required The id of course/quiz Example:1.
     * @response {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "name": "Dhaka"
     * }
     * ],
     * "message": "Operation successful"
     * }
     */
    public function cities($state_id)
    {
        try {
            $cities = DB::table('spn_cities')->where('state_id', $state_id)->select('id', 'name')->get();
            $response = [
                'success' => true,
                'data' => $cities,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }


    /**
     * Payment Gateways
     * @response {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "method": "method-name",
     * "logo": "image.png"
     * }
     * ],
     * "message": "Operation successful"
     * }
     */
    public function paymentGateways()
    {
        try {
            $methods = PaymentMethod::where('active_status', 1)->get(['method', 'logo']);

            $response = [
                'success' => true,
                'data' => $methods,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }


    /**
     * My Billing Address
     * @response {
     * "success": true,
     * "data": [
     * {
     * "success": true,
     * "data": [
     * {
     * "id": 1,
     * "tracking_id": "K3USKPJBC5U8",
     * "user_id": 3,
     * "first_name": "Student",
     * "last_name": "",
     * "company_name": "Spondon IT",
     * "country": {
     * "id": 19,
     * "name": "Bangladesh",
     * "iso3": "BGD",
     * "iso2": "BD",
     * "phonecode": "880",
     * "currency": "BDT",
     * "capital": "Dhaka",
     * "active_status": 1,
     * "created_at": "2018-07-20T08:41:03.000000Z",
     * "updated_at": "2018-07-20T08:41:03.000000Z"
     * }
     * ],
     * "message": "Operation successful"
     * }
     * ],
     * "message": "Operation successful"
     * }
     */

    public function myBilling()
    {
        try {
            $bills = BillingDetails::with('country')->where('user_id', Auth::id())->latest()->get();

            $response = [
                'success' => true,
                'data' => $bills,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }

    public function paytmOrderGenerate(Request $request)
    {

        try {
            $paytmParams = array();
            $user = Auth::user();
            $track = Cart::where('user_id', $user->id)->first()->tracking ?? '';
            $paytmParams["MID"] = getPaymentEnv('PAYTM_MERCHANT_ID');
            $paytmParams["ORDERID"] = $track;


            $body['mid'] = getPaymentEnv('PAYTM_MERCHANT_ID');
            $body['key_secret'] = getPaymentEnv('PAYTM_MERCHANT_KEY');
            $body['website'] = getPaymentEnv('PAYTM_MERCHANT_WEBSITE');
            $body['orderId'] = $track;
            $body['amount'] = $request->amount;
            $body['callbackUrl'] = $request->callbackUrl;
            $body['mode'] = $request->mode;
            $body['testing'] = $request->testing;

            $paytmChecksum = PaytmChecksum::generateSignature(json_encode($body), getPaymentEnv('PAYTM_MERCHANT_KEY'));

            $response = [
                'success' => true,
                'tracking' => $track,
                'paytmChecksum' => $paytmChecksum,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => "Operation Failed!"
            ];
            return response()->json($response, 200);
        }
    }


    public function paytmOrderVerify(Request $request)
    {

        try {

            $paytmParams = array();

            $user = Auth::user();
            $track = Cart::where('user_id', $user->id)->first()->tracking;

            $paytmParams["MID"] = getPaymentEnv('PAYTM_MERCHANT_ID');
            $paytmParams["ORDERID"] = $track;

            $isVerifySignature = PaytmChecksum::verifySignature($paytmParams, getPaymentEnv('PAYTM_MERCHANT_KEY'), $request->paytmChecksum);
            if ($isVerifySignature) {
                $result = "Checksum Matched";
            } else {
                $result = "Checksum Mismatched";
            }

            $response = [
                'success' => true,
                'result' => $result,
                'message' => "Operation successful"
            ];
            return response()->json($response, 200);
        } catch (\Exception $e) {


            return response()->json($e, 200);
        }
    }

    public function getBbbMeetingUrl($meeting_id, $user_name)
    {
        try {
            Bigbluebutton::getMeetingInfo([
                'meetingID' => $meeting_id,
            ]);
            $localBbbMeeting = BbbMeeting::where('meeting_id', $meeting_id)->first();

            if (!$localBbbMeeting->isRunning()) {
                $status = 'Not running';
            } else {
                $status = 'running';
            }
            $url = Bigbluebutton::start([
                'meetingID' => $meeting_id,
                'password' => $localBbbMeeting->attendee_password,
                'userName' => $user_name,
            ]);
            $data['url'] = $url;
            $data['status'] = $status;
            return $data;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function quizStart($courseId, $quizId)
    {
        try {
            $userId = Auth::id();
            $quiz = new QuizTest();
            $quiz->user_id = $userId;
            $quiz->course_id = $courseId;
            $quiz->quiz_id = $quizId;
            $quiz->quiz_type = 2;
            $quiz->start_at = now();
            $quiz->end_at = null;
            $quiz->duration = 0.00;

            $quiz->save();

            $return['result'] = true;
            $return['data'] = $quiz;
        } catch (\Exception $e) {
            $return['result'] = true;
            $return['data'] = null;
        }

        return $return;
    }

    public function singleQusSubmit(Request $request)
    {

        try {
            //            parameters
            //            type -> String example:M
            //            assign_id -> integer
            //            quiz_test_id -> integer
            //            ans ->array
            $answer = $request->ans;
            $type = $request->get('type');
            $assign_id = $request->get('assign_id');
            $quiz_test_id = $request->get('quiz_test_id');
            $assign = OnlineExamQuestionAssign::with('questionBank')->find($assign_id);
            $qus = $assign->question_bank_id;
            $quizTest = QuizTest::find($quiz_test_id);


            $start_at = Carbon::parse($quizTest->start_at);
            $end_at = Carbon::now();


            $quizTest->end_at = $end_at;
            $quizTest->duration = number_format(abs(strtotime($start_at) - strtotime($end_at)) / 60, 2) ?? 0.00;
            $quizTest->save();

            $check_details = QuizTestDetails::where('quiz_test_id', $quiz_test_id)->where('qus_id', $qus)->first();
            if ($check_details) {
                $quizDetails = $check_details;
            } else {
                $quizDetails = new QuizTestDetails();
                $quizDetails->quiz_test_id = $quiz_test_id;
                $quizDetails->qus_id = $qus;
                $quizDetails->status = 0;
                $quizDetails->mark = $assign->questionBank->marks;
                $quizDetails->save();
            }

            if ($type == "M") {

                $alreadyAns = QuizTestDetailsAnswer::where('quiz_test_details_id', $quizDetails->id)->get();
                $totalCorrectAns = QuestionBankMuOption::where('status', 1)->where('question_bank_id', $assign->question_bank_id)->count();

                foreach ($alreadyAns as $already) {
                    $already->delete();
                }
                $wrong = 0;
                $userCorrectAns = 0;
                if (!empty($answer)) {
                    foreach ($answer as $ans) {
                        $setAns = new QuizTestDetailsAnswer();
                        $option = QuestionBankMuOption::with('question')->find($ans);
                        if ($option) {
                            $setAns->quiz_test_details_id = $quizDetails->id;
                            $setAns->ans_id = $ans;
                            $setAns->status = $option->status;
                            $setAns->save();

                            if ($setAns->status == 0) {
                                $wrong++;
                            } elseif ($setAns->status == 1) {
                                $userCorrectAns++;
                            }
                        }
                    }
                    if ($wrong == 0) {
                        if ($userCorrectAns == $totalCorrectAns) {
                            $quizDetails->status = 1;
                        } else {
                            $quizDetails->status = 0;
                        }
                    } else {
                        $quizDetails->status = 0;
                    }
                    $quizDetails->save();
                }
            } else {

                $quizDetails->quiz_test_id = $quiz_test_id;
                $quizDetails->qus_id = $qus;
                $quizDetails->answer = $answer;
                $quizDetails->status = 0;
                $quizDetails->mark = 0;

                $quizDetails->save();
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function finalQusSubmit(Request $request)
    {
        //        quiz_test_id
        //type
        $userId = Auth::id();
        $quiz_test = QuizTest::with('quiz', 'details')->find($request->quiz_test_id);

        if ($quiz_test->quiz_id) {
            $marking = QuizMarking::where('quiz_id', $quiz_test->quiz_id)->where('quiz_test_id', $quiz_test->id)->where('student_id', $userId)->first();
        }

        if ($marking) {
            $quiz_marking = $marking;
        } else {
            $quiz_marking = new QuizMarking();
        }

        $quiz_marking->quiz_id = $quiz_test->quiz_id;
        $quiz_marking->quiz_test_id = $quiz_test->id;
        $quiz_marking->student_id = $userId;

        if (in_array('L', $request->type) || in_array('S', $request->type)) {
            $quiz_marking->marking_status = 0;
            $quiz_test->publish = 0;
        } else {
            $score = 0;
            if ($quiz_test->details) {
                foreach ($quiz_test->details as $test) {
                    $score += $test->mark ?? 1;
                }
            }
            $quiz_marking->marked_by = 0;
            $quiz_marking->marking_status = 1;
            $quiz_marking->marks = $score;
            $quiz_test->publish = 1;
        }
        $quiz_marking->save();

        $start_at = Carbon::parse($quiz_test->start_at);
        $end_at = Carbon::now();


        $quiz_test->end_at = $end_at;
        $quiz_test->duration = number_format(abs(strtotime($start_at) - strtotime($end_at)) / 60, 2) ?? 0.00;
        $quiz_test->save();

        return true;
    }

    public function quizResults()
    {
        $quiz = QuizTest::with('quiz')->where('user_id', Auth::user()->id)->get();

        $response = [
            'success' => true,
            'data' => $quiz,
            'message' => "Operation successful"
        ];
        return $response;
    }

    public function quizResult($course_id, $quiz_id)
    {
        $quizzes = QuizTest::with('quiz', 'details')->where('course_id', $course_id)->where('quiz_id', $quiz_id)->get();


        foreach ($quizzes as $key => $i) {
            $onlineQuiz = OnlineQuiz::find($i->quiz_id);
            $date = showDate($i->created_at);
            $totalQus = totalQuizQus($i->quiz_id);
            $totalAns = count($i->details);
            $totalCorrect = 0;
            $totalScore = totalQuizMarks($i->quiz_id);
            $score = 0;
            if ($totalAns != 0) {
                foreach ($i->details as $test) {
                    if ($test->status == 1) {
                        $score += $test->mark ?? 1;
                        $totalCorrect++;
                    }
                }
            }


            $preResult[$key]['quiz_test_id'] = $i->id;
            $preResult[$key]['totalQus'] = $totalQus;
            $preResult[$key]['date'] = $date;
            $preResult[$key]['totalAns'] = $totalAns;
            $preResult[$key]['totalCorrect'] = $totalCorrect;
            $preResult[$key]['totalWrong'] = $totalAns - $totalCorrect;
            $preResult[$key]['score'] = $score;
            $preResult[$key]['totalScore'] = $totalScore;
            $preResult[$key]['passMark'] = $onlineQuiz->percentage ?? 0;
            $preResult[$key]['mark'] = $score > 0 ? round($score / $totalScore * 100) : 0;;
            $preResult[$key]['publish'] = $i->publish;
            $preResult[$key]['status'] = $preResult[$key]['mark'] >= $preResult[$key]['passMark'] ? "Passed" : "Failed";
            $preResult[$key]['text_color'] = $preResult[$key]['mark'] >= $preResult[$key]['passMark'] ? "success_text" : "error_text";
            $i->pass = $preResult[$key]['mark'] >= $preResult[$key]['passMark'] ? "1" : "0";
            $i->save();

            $i->result = $preResult;
        }

        $response = [
            'success' => true,
            'data' => $quizzes,
            'message' => "Operation successful"
        ];
        return $response;
    }

    public function quizResultPreview($quiz_id)
    {
        $quizTest = QuizTest::with('quiz', 'quiz.assign', 'quiz.assign.questionBank', 'quiz.assign.questionBank.questionMu')->findOrFail($quiz_id);

        $questions = [];

        foreach ($quizTest->quiz->assign as $key => $assign) {
            $questions[$key]['qus'] = $assign->questionBank->question;
            $questions[$key]['type'] = $assign->questionBank->type;

            $test = QuizTestDetails::where('quiz_test_id', $quizTest->id)->where('qus_id', $assign->questionBank->id)->first();
            $questions[$key]['isSubmit'] = false;
            $questions[$key]['isWrong'] = false;

            if ($assign->questionBank->type != "M") {

                if ($test) {
                    $questions[$key]['isSubmit'] = true;
                    if ($test->status == 0) {
                        $questions[$key]['isWrong'] = true;
                    }
                    $questions[$key]['answer'] = $test->answer;
                }
            } else {
                foreach (@$assign->questionBank->questionMu as $key2 => $option) {
                    $questions[$key]['option'][$key2]['title'] = $option->title;
                    $questions[$key]['option'][$key2]['right'] = $option->status == 1 ? true : false;
                }

                if ($test) {
                    $questions[$key]['isSubmit'] = true;
                    if ($test->status == 0) {
                        $questions[$key]['option'][$key2]['wrong'] = $test->status == 0 ? true : false;
                        $questions[$key]['isWrong'] = true;
                    }
                }
            }
            if (!$questions[$key]['isSubmit']) {
                $questions[$key]['isWrong'] = true;
            }
        }


        $quizTest->questions = $questions;
        $response = [
            'success' => true,
            'data' => $quizTest,
            'message' => "Operation successful"
        ];
        return $response;
    }


    public function quizTestResult($quiz_test_id)
    {
        $quizTest = QuizTest::with('quiz', 'quiz.assign', 'quiz.assign.questionBank', 'quiz.assign.questionBank.questionMu')->findOrFail($quiz_test_id);

        $questions = [];

        foreach ($quizTest->quiz->assign as $key => $assign) {
            $questions[$key]['qus'] = $assign->questionBank->question;
            $questions[$key]['type'] = $assign->questionBank->type;

            $test = QuizTestDetails::where('quiz_test_id', $quizTest->id)->where('qus_id', $assign->questionBank->id)->first();
            $questions[$key]['isSubmit'] = false;
            $questions[$key]['isWrong'] = false;

            if ($assign->questionBank->type != "M") {

                if ($test) {
                    $questions[$key]['isSubmit'] = true;
                    if ($test->status == 0) {
                        $questions[$key]['isWrong'] = true;
                    }
                    $questions[$key]['answer'] = $test->answer;
                }
            } else {
                foreach (@$assign->questionBank->questionMu as $key2 => $option) {
                    $questions[$key]['option'][$key2]['title'] = $option->title;
                    $questions[$key]['option'][$key2]['right'] = $option->status == 1 ? true : false;
                }

                if ($test) {
                    $questions[$key]['isSubmit'] = true;
                    if ($test->status == 0) {
                        $questions[$key]['option'][$key2]['wrong'] = $test->status == 0 ? true : false;
                        $questions[$key]['isWrong'] = true;
                    }
                }
            }
            if (!$questions[$key]['isSubmit']) {
                $questions[$key]['isWrong'] = true;
            }
        }


        $quizTest->questions = $questions;
        $response = [
            'success' => true,
            'data' => $quizTest,
            'message' => "Operation successful"
        ];
        return $response;
    }

    public function quizHistory($quiz_id)
    {
        $preResult = [];
        $user = Auth::user();
        $all = QuizTest::with('details')->where('quiz_id', $quiz_id)->where('user_id', $user->id)->get();


        foreach ($all as $key => $i) {
            $onlineQuiz = OnlineQuiz::find($i->quiz_id);
            $date = showDate($i->created_at);
            $totalQus = totalQuizQus($i->quiz_id);
            $totalAns = count($i->details);
            $totalCorrect = 0;
            $totalScore = totalQuizMarks($i->quiz_id);
            $score = 0;
            if ($totalAns != 0) {
                foreach ($i->details as $test) {
                    if ($test->status == 1) {
                        $score += $test->mark ?? 1;
                        $totalCorrect++;
                    }

                }
            }


            $preResult[$key]['quiz_test_id'] = $i->id;
            $preResult[$key]['totalQus'] = $totalQus;
            $preResult[$key]['date'] = $date;
            $preResult[$key]['totalAns'] = $totalAns;
            $preResult[$key]['totalCorrect'] = $totalCorrect;
            $preResult[$key]['totalWrong'] = $totalAns - $totalCorrect;
            $preResult[$key]['score'] = $score;
            $preResult[$key]['totalScore'] = $totalScore;
            $preResult[$key]['passMark'] = $onlineQuiz->percentage ?? 0;
            $preResult[$key]['mark'] = $score > 0 && $totalScore > 0 ? round($score / $totalScore * 100) : 0;
            $preResult[$key]['publish'] = $i->publish;
            $preResult[$key]['status'] = $preResult[$key]['mark'] >= $preResult[$key]['passMark'] ? "Passed" : "Failed";
            $preResult[$key]['text_color'] = $preResult[$key]['mark'] >= $preResult[$key]['passMark'] ? "success_text" : "error_text";
            $i->pass = $preResult[$key]['mark'] >= $preResult[$key]['passMark'] ? "1" : "0";
            $i->save();


        }


        $response = [
            'success' => true,
            'data' => $preResult,
            'message' => "Operation successful"
        ];
        return $response;
    }

    /**
     * Lesson Complete
     * @bodyParam course_id string required The id of Course Example:1
     * @bodyParam lesson_id string required The id of Lesson Example:1
     * @bodyParam status string required The status of Lesson Example:1
     * @response  {
     * "success": true,
     * "message": "Lesson complete successfully"
     * }
     */
    public function lessonComplete(Request $request)
    {
        $newLessonComplete = false;


        try {
            $lesson = LessonComplete::where('course_id', $request->course_id)->where('lesson_id', $request->lesson_id)->where('user_id', Auth::id())->first();

            if (!$lesson) {
                checkGamification('each_unit_complete', '');
                $newLessonComplete = true;
                $lesson = new LessonComplete();
                $lesson->user_id = Auth::id();
                $lesson->course_id = $request->course_id;
                $lesson->lesson_id = $request->lesson_id;
            }
            $lesson->status = $request->status;
            $lesson->save();
            $course = Course::find($request->course_id);
            if ($course) {
                $percentage = round($course->loginUserTotalPercentage);
                if ($percentage >= 100) {

                    if ($newLessonComplete) {
                        checkGamification('each_course_complete', '');
                    }
                    $this->getCertificateRecord($course->id);


                    if (UserEmailNotificationSetup('Complete_Course', Auth::user())) {
                        SendGeneralEmail::dispatch(Auth::user(), 'Complete_Course', [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title
                        ]);
                    }
                    if (UserBrowserNotificationSetup('Complete_Course', Auth::user())) {
                        send_browser_notification(Auth::user(), 'Complete_Course', [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title
                        ],
                            trans('common.View'),
                            courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
                        );
                    }

                    if (UserMobileNotificationSetup('Course_Chapter_Added', Auth::user()) && !empty(Auth::user()->device_token)) {
                        send_mobile_notification(Auth::user(), 'Course_Chapter_Added', [
                            'time' => Carbon::now()->format('d-M-Y, g:i A'),
                            'course' => $course->title
                        ]);
                    }
                }
            }

            $response = [
                'success' => true,
                'message' => "Lesson complete successfully"
            ];
            return $response;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getCertificateRecord($course_id)
    {

        try {
            $course = Course::find($course_id);
            if (!empty($course->certificate_id)) {
                $certificate = Certificate::find($course->certificate_id);
            } else {
                if ($course->type == 1) {
                    $certificate = Certificate::where('for_course', 1)->first();
                } elseif ($course->type == 2) {
                    $certificate = Certificate::where('for_quiz', 1)->first();
                } elseif ($course->type == 3) {
                    $certificate = Certificate::where('for_class', 1)->first();
                } else {
                    $certificate = null;
                }
            }
            if ($certificate) {
                $certificate_record = CertificateRecord::where('student_id', Auth::user()->id)->where('course_id', $course_id)->first();
                if (!$certificate_record) {

                    checkGamification('each_certificate', 'certification');
                    $certificate_record = new CertificateRecord();

                    $certificate_record->certificate_id = $this->generateUniqueCode();
                    $certificate_record->student_id = Auth::user()->id;
                    $certificate_record->course_id = $course_id;
                    $certificate_record->created_by = Auth::user()->id;
                    if (isModuleActive('Org')) {
                        if ($course->required_type == 1) {
                            $enrolls = $course->enrolls->where('user_id', Auth::id());
                            if (isset($enrolls[0])) {
                                $plan_id = $enrolls[0]->org_subscription_plan_id;
                                $checkout = OrgSubscriptionCheckout::where('plan_id', $plan_id)->where('user_id', \auth()->id())->latest()->first();
                                $certificate_record->start_date = $checkout->start_date;
                                $certificate_record->end_date = $checkout->end_date;
                            }

                        } else {
                            $certificate_record->start_date = $course->created_at;
                            $certificate_record->end_date = '';
                        }
                        addOrgRecentActivity(\auth()->id(), $course->id, 'Complete');
                    }

                    $certificate_record->save();
                }

                if (isModuleActive('Org')) {

                    request()->certificate_id = $certificate_record->certificate_id;
                    request()->course = $course;
                    request()->user = Auth::user();
                    $downloadFile = new CertificateController();
                    $certificate = $downloadFile->makeCertificate($certificate->id, request())['image'] ?? '';

                    $certificate->encode('jpg');

                    $certificate->save('public/certificate/' . $certificate_record->id . '.jpg');

                }
                return $certificate_record;
            } else {
                return null;
            }

        } catch (\Exception $e) {
            return null;
        }
    }

    public function generateUniqueCode()
    {
        do {
            $referal_code = random_int(100000, 999999);
        } while (CertificateRecord::where("certificate_id", "=", $referal_code)->first());

        return $referal_code;
    }

    public function sliders()
    {
        try {
            $sliders = Slider::where('status', 1)->get();
            return [
                'success' => true,
                'data' => $sliders,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }

    public function news()
    {
        try {
            $query = Blog::where('status', 1)->with('user', 'userRead');

            if (isModuleActive('Org')) {
                $query->where(function ($q) {
                    $q->where('audience', 1)
                        ->orWhere(function ($q) {
                            $q->where('audience', 2);
                            if (Auth::check()) {
                                if (Auth::user()->role_id != 1) {
                                    $q->whereHas('branches', function ($q) {
                                        $q->whereIn('branch_id', getAllChildCodeIds(Auth::user()->branch, [Auth::user()->branch->id]));
                                    });
                                }
                            } else {
                                $q->whereHas('branches', function ($q) {
                                    $q->where('branch_id', 0);
                                });
                            }
                        });
                });
            }
            $blogs = $query->latest()->get();

            $allIds = $blogs->pluck('id')->toArray();

            $read = UserBlog::whereIn('blog_id', $allIds)->where('user_id', Auth::id())
                ->count();

            return [
                'success' => true,
                'data' => $blogs,
                'count' => count($blogs),
                'read' => $read,
                'unread' => count($blogs) - $read,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }

    public function activities()
    {
        try {
            $activities = OrgRecentActivity::with('user', 'course', 'user.position')->whereHas('user')->latest()->get();
            return [
                'success' => true,
                'data' => $activities,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }

    public function loginDevices()
    {
        try {
            $logins = UserLogin::where('user_id', auth()->id())->where('status', 1)->get();
            return [
                'success' => true,
                'data' => $logins,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }

    public function certificateRecords()
    {
        try {
            $certificate_records = CertificateRecord::where('student_id', auth('api')->user()->id)->latest()->get();

            foreach ($certificate_records as $key => $certificate) {
                $certificate->title = @$certificate->course->title;

                $certificate->start_date = showDate($certificate->start_date);
                $certificate->end_date = empty($certificate->end_date) ? trans('org.Limitless') : showDate($certificate->end_date);

                $certificate->image = asset('public/certificate/' . $certificate->id . '.jpg');
            }

            return [
                'success' => true,
                'data' => $certificate_records,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }

    public function courseList(Request $request)
    {
        try {
            if ($request->type == 'online') {
                $mode_of_delivery = 1;
            } elseif ($request->type == 'offline') {
                $mode_of_delivery = 3;
            } else {
                $mode_of_delivery = '';
            }
            $search = $request->search;
            $type = $request->type;
            $status = $request->status;
            $with = ['course', 'course.activeReviews', 'course.courseLevel', 'course.BookmarkUsers', 'course.user', 'course.reviews', 'course.enrollUsers'];
            $with[] = 'course.quiz';
            $with[] = 'course.quiz.assign';
            $with[] = 'course.chapters';
            $with[] = 'course.class';
            $with[] = 'course.category';
            $query = CourseEnrolled::where('user_id', auth('api')->user()->id)
                ->whereHas('course', function ($query) use ($type) {
                    if (\request()->type == 'class') {
                        $course_type = [3];
                    } elseif (\request()->type == 'online' || \request()->type == 'offline') {
                        $course_type = [1];
                    } else {
                        $course_type = [1, 3];
                    }
                    $query->whereIn('type', $course_type);
                });
            if (!empty($mode_of_delivery)) {
                $query->whereHas('course', function ($query) use ($mode_of_delivery) {
                    $query->where('mode_of_delivery', '=', $mode_of_delivery);
                });
            }
            if (!empty($search)) {
                $query->whereHas('course', function ($query) use ($search) {
                    $query->where('title', 'LIKE', "%{$search}%");
                });
            }
            $query->with($with);
            $courses = $query->get();

            foreach ($courses as $c) {
                $course = Course::where('id', $c->course_id)->first();

                if ($course->type == 1) {
                    $percentage = $course->userTotalPercentage(auth('api')->user()->id, $course->id);
                } else {
                    $percentage = $course->userTotalClassPercentage(auth('api')->user()->id, $course->id);
                }
                $c->percentage = $percentage;

                if ($course->type == 1) {
                    $c->duration = MinuteFormat($course->duration);
                } else {
                    $c->duration = MinuteFormat($course->class->duration);
                }

                if ($course->type == 1)
                    $c->categoryName = $course->category->name;
                else
                    $c->categoryName = $course->class->category->name;

                if ($percentage == 100) {
                    $c->courseStatus = 'completed';
                } elseif ($percentage == 0) {
                    $c->courseStatus = 'notStarted';
                } else {
                    $c->courseStatus = 'started';
                }

                if ($course->mode_of_delivery == 3) {
                    $plan = $course->orgSubscriptionCourseList->first()->plan;
                    $offline_venue = $plan->offline_venue;
                    $c->venue = $offline_venue;
                } else {
                    if ($course->type == 1) {
                        $c->totalQuiz = count($course->quiz->assign);
                        $c->totalLessons = count($course->lessons);
                    } else {
                        $c->totalClass = $course->class->totalClass();
                    }
                }

                $days = orgGetStartEndDate($c, $c->course);
                $c->startDay = $days['start'];
                $c->endDay = $days['end'];
            }

            return [
                'success' => true,
                'data' => $courses,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed $e"
            ];
        }
    }

    public function quizList(Request $request)
    {

        try {
            if ($request->type == 'online') {
                $mode_of_delivery = 1;
            } elseif ($request->type == 'offline') {
                $mode_of_delivery = 3;
            } else {
                $mode_of_delivery = '';
            }
            $type = $request->type;
            $status = $request->status;
            $with = ['course', 'course.activeReviews', 'course.courseLevel', 'course.BookmarkUsers', 'course.user', 'course.reviews', 'course.enrollUsers'];
            $with[] = 'course.quiz';
            $with[] = 'course.quiz.assign';
            $query = CourseEnrolled::where('user_id', auth('api')->user()->id)
                ->whereHas('course', function ($query) use ($type) {
                    $query->where('type', '=', 2);
                });
            if (!empty($mode_of_delivery)) {
                $query->whereHas('course', function ($query) use ($mode_of_delivery) {
                    $query->where('mode_of_delivery', '=', $mode_of_delivery);
                });
            }
            if ($request->limit == 1) {
                $limit = true;
            } else {
                $limit = false;
            }
            $query->with($with);
            $courses = $query->get();

            foreach ($courses as $c) {
                $course = Course::where('id', $c->course_id)->first();

                $percentage = $course->userQuizPercentage(auth('api')->user()->id, $course->id);

                $c->percentage = $percentage;

                if ($course->mode_of_delivery == 1) {
                    $c->venue = null;
                } else {
                    $c->venue = $c->orgSubscriptionPlan->offline_venue;
                }


                if ($percentage == 100) {
                    $c->courseStatus = 'completed';
                } elseif ($percentage == 0) {
                    $c->courseStatus = 'notStarted';
                } else {
                    $c->courseStatus = 'started';
                }

                $c->quizCount = count($course->quiz->assign);
                $c->quizPercentage = $course->quiz->percentage . "%";
                $c->quizRetestNumber = count($c->quizCompletes);
                if ($course->quiz->question_time_type == 0) {
                    $c->duration = MinuteFormat($course->quiz->question_time * count($course->quiz->assign));
                } else {
                    $c->duration = MinuteFormat($course->quiz->question_time);
                }
                $pass = count($course->quizCompletes->where('pass', 1)) != 0 ? true : false;
                if ($c->quizRetestNumber != 0) {
                    if ($pass) {
                        $c->quizStatus = __('org.Pass');
                    } else {
                        $c->quizStatus = __('org.Fail');
                    }
                } else {
                    $c->quizStatus = __('org.Not attempt');
                }

                $days = orgGetStartEndDate($c, $c->course);
                $c->startDay = $days['start'];
                $c->endDay = $days['end'];
            }

            return [
                'success' => true,
                'data' => $courses,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed $e"
            ];
        }
    }

    public function learningSchedulePlans(Request $request)
    {
        try {
            if ($request->type == 'all') {
                $query = OrgSubscriptionCheckout::where('user_id', auth('api')->user()->id)->with('plan', 'plan.assign');


                $plans = $query->get();

                foreach ($plans as $plan) {
                    $p = $plan->plan;
                    $plan->position = json_decode($plan->position);
                    $p->total = round($p->totalCompleted()['totalProgress']);
                    $p->remaining = $p->remaining();

                    if ($p->type == 1) {
                        $p->start = showDate($p->join_date);
                        $p->end = showDate($plan->end_date);
                    } else {
                        $p->start = showDate($p->subscription->start_date);
                        $p->end = showDate($p->subscription->end_date);
                    }

                    $p->totalComplete = $p->totalCompleted()['completed_course'];
                }
                return [
                    'success' => true,
                    'data' => $plans,
                    'message' => "Operation successful"
                ];
            } else {
                $collection = collect();
                $month = $request->month;
                $year = $request->year;

                $open_started = CourseEnrolled::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $month)
                    ->with('course')
                    ->whereHas('course', function ($q) {
                        $q->where('required_type', 0);
                    })
                    ->where('user_id', auth('api')->user()->id)->orderBy('created_at')
                    ->get();

                $close_started = CourseEnrolled::with('orgSubscriptionPlan', 'course')
                    ->whereHas('course', function ($q) {
                        $q->where('required_type', 1);
                    })
                    ->whereHas('orgSubscriptionPlan', function ($q) use ($month, $year) {
                        $q->whereHas('checkouts', function ($q2) use ($month, $year) {
                            $q2->whereMonth('start_date', '=', $month);
                            $q2->whereYear('start_date', '=', $year);
                            $q2->whereYear('user_id', '=', auth('api')->user()->id);
                        });
                    })
                    ->where('user_id', auth('api')->user()->id)
                    ->get();

                $ended = CourseEnrolled::whereYear('subscription_validity_date', '=', $year)
                    ->whereMonth('subscription_validity_date', '=', $month)
                    ->with('orgSubscriptionPlan', 'course')
                    ->where('user_id', auth('api')->user()->id)
                    ->get();


                foreach ($open_started as $open) {
                    $course = Course::where('id', $open->course_id)->first();
                    $open->date = \Carbon\Carbon::parse($open->created_at)->format('Y-m-d');
                    $open->course_data_type = 'start';
                    $open->course_date = \Carbon\Carbon::parse($open->created_at)->format('d-m-Y');
                    $open->course_type = $this->getCourseType($open);
                    $open->course_title = $course->title . ' ' . '(' . (trans('common.Start Date')) . ')';
                    $open->course_day_month = \Carbon\Carbon::parse($open->created_at)->format('d-M');
                    $open->venue = $open->orgSubscriptionPlan->offline_venue ?? "";

                    $collection->push($open);
                }

                foreach ($close_started as $close) {
                    $course = Course::where('id', $close->course_id)->first();
                    $close->date = \Carbon\Carbon::parse($close->created_at)->format('Y-m-d');
                    $close->course_data_type = 'start';
                    $close->course_date = \Carbon\Carbon::parse($close->created_at)->format('d-m-Y');
                    $close->course_type = $this->getCourseType($close);
                    $close->course_title = $course->title . ' ' . '(' . (trans('common.Start Date')) . ')';
                    $close->course_day_month = \Carbon\Carbon::parse($close->created_at)->format('d-M');
                    $close->venue = $close->orgSubscriptionPlan->offline_venue ?? "";
                    $collection->push($close);
                }


                foreach ($ended as $end) {
                    $course = Course::where('id', $end->course_id)->first();
                    $end->date = $end->subscription_validity_date;
                    $end->course_data_type = 'end';
                    $end->course_date = \Carbon\Carbon::parse($end->subscription_validity_date)->format('d-m-Y');
                    $end->course_type = $this->getCourseType($end);
                    $end->course_title = $course->title . ' ' . '(' . (trans('common.End Date')) . ')';
                    $end->course_day_month = \Carbon\Carbon::parse($end->created_at)->format('d-M');
                    $end->venue = $end->orgSubscriptionPlan->offline_venue ?? "";
                    $collection->push($end);
                }

                $count = [
                    'open' => count($open_started),
                    'close' => count($close_started),
                    'end' => count($ended),
                    'collection' => count($collection),
                ];

                return [
                    'success' => true,
                    'data' => $collection,
                    'message' => "Operation successful"
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "$e"
            ];
        }
    }

    public function learningSchedulePlanList($plan_id)
    {
        try {
            $orgSub = OrgCourseSubscription::with('assign.course.user')->with('assign.course.category')->find($plan_id);
            $courses = $orgSub->assign;
            foreach ($courses as $c) {
                $course = Course::where('id', $c->course_id)->first();

                if ($course->quiz_id != null) {
                    $percentage = $course->userQuizPercentage(auth('api')->user()->id, $course->id);

                    $c->percentage = $percentage;

                    if ($course->mode_of_delivery == 1) {
                        $c->venue = null;
                    } else {
                        $c->venue = $c->plan->offline_venue;
                    }


                    if ($percentage == 100) {
                        $c->courseStatus = 'completed';
                    } elseif ($percentage == 0) {
                        $c->courseStatus = 'notStarted';
                    } else {
                        $c->courseStatus = 'started';
                    }

                    $c->quizCount = count($course->quiz->assign);
                    $c->quizPercentage = $course->quiz->percentage . "%";
                    $c->quizRetestNumber = count($course->quizCompletes);
                    if ($course->quiz->question_time_type == 0) {
                        $c->duration = MinuteFormat($course->quiz->question_time * count($course->quiz->assign));
                    } else {
                        $c->duration = MinuteFormat($course->quiz->question_time);
                    }
                    $pass = count($course->quizCompletes->where('pass', 1)) != 0 ? true : false;
                    if ($c->quizRetestNumber != 0) {
                        if ($pass) {
                            $c->quizStatus = __('org.Pass');
                        } else {
                            $c->quizStatus = __('org.Fail');
                        }
                    } else {
                        $c->quizStatus = __('org.Not attempt');
                    }
                } else {
                    if ($course->type == 1) {
                        $percentage = $course->userTotalPercentage(auth('api')->user()->id, $course->id);
                    } else {
                        $percentage = $course->userTotalClassPercentage(auth('api')->user()->id, $course->id);
                    }

                    $c->percentage = $percentage;


                    if ($course->type == 1) {
                        $c->duration = MinuteFormat($course->duration);
                    } else {
                        $c->duration = MinuteFormat($course->class->duration);
                    }

                    if ($course->type == 1)
                        $c->categoryName = $course->category->name;
                    else
                        $c->categoryName = $course->class->category->name;

                    if ($percentage == 100) {
                        $c->courseStatus = 'completed';
                    } elseif ($percentage == 0) {
                        $c->courseStatus = 'notStarted';
                    } else {
                        $c->courseStatus = 'started';
                    }

                    if ($course->mode_of_delivery == 3) {
                        $plan = $course->orgSubscriptionCourseList->first()->plan;
                        $offline_venue = $plan->offline_venue;
                        $c->venue = $offline_venue;
                    } else {
                        if ($course->type == 1) {
                            $c->totalQuiz = count($course->quiz->assign);
                            $c->totalLessons = count($course->lessons);
                        } else {
                            $c->totalClass = $course->class->totalClass();
                        }
                    }
                }
                $days = orgGetStartEndDate($c, $c->course);
                $c->startDay = $days['start'];
                $c->endDay = $days['end'];
            }

            return [
                'success' => true,
                'data' => $orgSub,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "$e"
            ];
        }
    }

    public function courseReport()
    {
        try {
            $courses = CourseEnrolled::where('user_id', auth('api')->user()->id)->with('course')->latest()->get();
            foreach ($courses as $c) {

                $course = Course::where('id', $c->course_id)->first();

                $c->type = $course->required_type == 1 ? trans('courses.Compulsory') : trans('courses.Open');

                if ($course->mode_of_delivery == 1) {
                    $c->deliveryMode = trans('courses.Online');
                } elseif ($course->mode_of_delivery == 2) {
                    $c->deliveryMode = trans('courses.Distance Learning');
                } else {
                    if (isModuleActive('Org')) {
                        $c->deliveryMode = trans('courses.Offline');
                    } else {
                        $c->deliveryMode = trans('courses.Face-to-Face');
                    }
                }

                $c->date = showDate($course->created_at);

                if ($course->type == 1) {
                    $c->completionRate = $c->userTotalPercentage . '%';
                }
                $c->completionDate = $c->userCompleteDate;


                $percentage = $c->userTotalPercentage;
                $c->percentage = $percentage;
                if ($percentage == 0) {
                    $c->courseStatus = trans('courses.Not Started yet');
                } else {
                    if ($course->type == 1) {
                        if ($percentage == 100) {
                            $c->courseStatus = trans('courses.Completed');
                        } else {
                            $c->courseStatus = trans('courses.Studying');
                        }
                    } else {
                        if ($percentage == 100) {
                            $c->courseStatus = trans('common.Pass');
                        } else {
                            $c->courseStatus = trans('common.Fail');
                        }
                    }
                }
            }

            return [
                'success' => true,
                'data' => $courses,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "$e"
            ];
        }
    }

    public function quizReport()
    {
        try {
            $quizzes = QuizTest::with(['course', 'course.quiz', 'user'])->latest()->where('user_id', auth('api')->user()->id)->get();

            foreach ($quizzes as $key => $quiz) {

                $totalCorrect = $quiz->details->where('status', 1)->sum('mark');
                $totalMark = $quiz->quiz->totalMarks();

                $quiz->totalCorrect = $totalCorrect . '/' . $totalMark;

                if ($totalCorrect == 0 || $totalMark == 0) {
                    $result = 0;
                } else {
                    $result = ($totalCorrect / $totalMark) * 100;
                }
                $quiz->result = $result . '%';

                $quiz->duration = $quiz->duration . ' ' . trans('common.Min');

                if ($quiz->pass == 1) {
                    $quiz->passFail = trans('common.Pass');
                } else {
                    $quiz->passFail = trans('common.Fail');
                }
            }
            return [
                'success' => true,
                'data' => $quizzes,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }

    private function getCourseType($item)
    {
        $mode = $item->course->mode_of_delivery;
        if ($mode == 1) {
            $mode = 'online';
        } else {
            $mode = 'offline';
        }

        $type = $item->course->type;

        if ($type == 1) {
            $type = $mode . '-course';
        } elseif ($type == 2) {
            $type = $mode . '-quiz';
        } elseif ($type == 3) {
            $type = 'live';
        }
        return 'data-month-' . $type;
    }

    public function notifications(Request $request): array
    {
        try {

            if ($request->type == 'read') {
                auth('api')->user()->unreadNotifications->where('id', $request->id)->markAsRead();
                $data['notifications'] = auth('api')->user()->notifications;
                $data['total_unread'] = auth('api')->user()->unreadNotifications->count();
                return [
                    'success' => true,
                    'data' => $data,
                    'message' => "Operation successful"
                ];
            } else if ($request->type == 'read-all') {
                auth('api')->user()->unreadNotifications->markAsRead();
                $data['notifications'] = auth('api')->user()->notifications;
                $data['total_unread'] = auth('api')->user()->unreadNotifications->count();
                return [
                    'success' => true,
                    'data' => $data,
                    'message' => "Operation successful"
                ];
            } else {
                $data['notifications'] = auth('api')->user()->notifications;
                $data['total_unread'] = auth('api')->user()->unreadNotifications->count();
                return [
                    'success' => true,
                    'data' => $data,
                    'message' => "Operation successful"
                ];
            }

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }


    public function deleteComment(Request $request)
    {
        try {
            $comment = CourseComment::find($request->id);
            $user = Auth::user();
            if ($comment->user_id == $user->id || $user->role_id == 1 || $comment->instructor_id == $user->id) {
                $comment->delete();
                if (isset($comment->replies)) {
                    foreach ($comment->replies as $replay) {
                        $replay->delete();
                    }
                }
                return [
                    'success' => true,
                    'message' => "Operation successful"
                ];
            } else {
                return [
                    'success' => false,
                    'message' => "Operation un-successful"
                ];
            }
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'error' => $exception,
                'message' => "Operation failed"
            ];
        }
    }

    public function deleteReview(Request $request)
    {
        try {
            $review = CourseReveiw::find($request->id);
            $course_id = $review->course_id;
            $user = Auth::user();
            if ($review->user_id == $user->id || $user->role_id == 1 || $review->instructor_id == $user->id) {
                $review->delete();

                $course = Course::find($course_id);
                $total = CourseReveiw::where('course_id', $course->id)->sum('star');
                $count = CourseReveiw::where('course_id', $course->id)->where('status', 1)->count();
                if ($total != 0) {
                    $average = $total / $count;
                } else {
                    $average = 0;
                }
                $course->reveiw = $average;
                $course->total_rating = $average;
                $course->save();


                $course_user = User::find($course->user_id);
                $user_courses = Course::where('user_id', $course_user->id)->get();
                $user_total = 0;
                $user_rating = 0;
                foreach ($user_courses as $u_course) {
                    $total = CourseReveiw::where('course_id', $u_course->id)->sum('star');
                    $count = CourseReveiw::where('course_id', $u_course->id)->where('status', 1)->count();
                    if ($total != 0) {
                        $user_total = $user_total + 1;
                        $average = $total / $count;
                        $user_rating = $user_rating + $average;
                    }
                }
                if ($user_total != 0) {
                    $user_rating = $user_rating / $user_total;
                }
                $course_user->total_rating = $user_rating;
                $course_user->save();

                $total = CourseReveiw::where('course_id', $course->id)->sum('star');
                $count = CourseReveiw::where('course_id', $course->id)->where('status', 1)->count();
                if ($total != 0) {
                    $average = $total / $count;
                } else {
                    $average = 0;
                }
                $course->reveiw = $average;
                $course->total_rating = $average;
                $course->save();


                return [
                    'success' => true,
                    'message' => "Operation successful"
                ];
            } else {
                return [
                    'success' => false,
                    'message' => "Operation un-successful"
                ];
            }
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'error' => $exception,
                'message' => "Operation failed"
            ];
        }
    }

    public function deleteCommnetReply(Request $request)
    {
        try {

            $reply = CourseCommentReply::find($request->id);
            $course = Course::find($reply->course_id);
            $user = Auth::user();

            if ($reply->user_id == $user->id || $user->role_id == 1 || $course->user_id == $user->id) {
                $reply->delete();

                return [
                    'success' => true,
                    'message' => trans('common.Operation successful')
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Invalid access'
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e,
                'message' => "Operation failed"
            ];
        }
    }

    public function offlineAttendanceReport()
    {
        try {
            $query = OrgAttendance::query();
            $query->with('course', 'user');
            $query->where('user_id', Auth::id());
            $attendances = $query->get();

            $data = collect();

            foreach ($attendances as $attendance) {
                $at = [
                    'course' => $attendance->course->title,
                    'class' => $attendance->class->title,
                    'start_date' => showDate($attendance->created_at),
                    'attend' => $attendance->attend,
                    'total_score' => $attendance->total_score,
                    'rate' => $attendance->pass_rate,
                    'actual_score' => $attendance->actual_score,

                ];

                $data->push($at);
            }

            return [
                'success' => true,
                'data' => $data,
                'message' => "Operation successful"
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Operation failed"
            ];
        }
    }

    public function visitBlogPost($blog_id)
    {

        UserBlog::updateOrInsert([
            'user_id' => Auth::id(),
            'blog_id' => $blog_id,
        ]);

        return [
            'success' => true,
            'message' => "Operation successful"
        ];
    }

    public function enrollIAP(Request $request)
    {
        try {

            $user = auth('api')->user();

            $course = Course::find($request->id);
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->instructor_id = $course->user_id;
            $cart->course_id = $request->id;
            $cart->tracking = getTrx();
            if ($course->discount_price != null) {
                $cart->price = $course->discount_price;
            } else {
                $cart->price = $course->price;
            }
            $cart->save();

            $tracking = Cart::where('user_id', Auth::id())->first()->tracking;

            $total = Cart::where('user_id', Auth::user()->id)->sum('price');

            $checkout = Checkout::where('tracking', $tracking)->where('user_id', Auth::id())->latest()->first();
            if (!$checkout) {
                $checkout = new Checkout();
                $checkout->discount = 0.00;
                $checkout->purchase_price = $total;
                $checkout->tracking = $tracking;
                $checkout->user_id = Auth::id();
                $checkout->price = $total;
                $checkout->status = 0;
                $checkout->save();
            }

            $checkout_info = Checkout::where('tracking', $tracking)->where('user_id', $user->id)->latest()->first();

            $checkout_info = $checkout;
            if ($checkout_info) {
                $checkout_info->billing_detail_id = 0;
                $checkout_info->payment_method = 'IAP';
                $checkout_info->save();

                $carts = Cart::where('tracking', $checkout_info->tracking)->get();

                foreach ($carts as $cart) {

                    $payment = new PaymentController();
                    $payment->directEnroll($cart->course_id, $checkout_info->tracking);
                    $cart->delete();
                }
                $response = [
                    'success' => true,
                    'type' => 'Free',
                    'message' => 'Operation successful'
                ];
                return response()->json($response, 200);
            }
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function settings()
    {
        $color = DB::table('themes')
            ->select(
                'theme_customizes.primary_color',
                'theme_customizes.secondary_color',
                'theme_customizes.footer_background_color',
                'theme_customizes.footer_headline_color',
                'theme_customizes.footer_text_color',
                'theme_customizes.footer_text_hover_color',
            )
            ->join('theme_customizes', 'themes.name', '=', 'theme_customizes.theme_name')
            ->where('themes.is_active', '=', 1)
            ->where('theme_customizes.is_default', '=', 1)
            ->first();

        if (isModuleActive('Org')) {
            $primary = str_replace('#', '', $color->primary_color);
            $secondary = str_replace('#', '', $color->secondary_color);
            $color->primary_color = 'Color(0xFF' . $primary . ')';
            $color->secondary_color = 'Color(0xFF' . $secondary . ')';
        }

        $data = [
            'site_title' => Settings('site_title'),
            'system_version' => Settings('system_version'),
            'student_reg' => (int)Settings('student_reg'),
            'instructor_reg' => (int)Settings('instructor_reg'),
            'theme_color' => $color,
        ];

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Operation successful'
        ];
        return response()->json($response, 200);
    }
}
