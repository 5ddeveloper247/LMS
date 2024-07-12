@extends(theme('layouts.master'))
@section('title')
    {{ Settings('site_title') ? Settings('site_title') : 'Infix LMS' }} | {{ __('Customer-help') }}
@endsection
{{-- @section('css') --}}

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<style>
   .nav-pills-custom .nav-link {
    color: #aaa;
    background: #fff !important;
    position: relative;
}

.nav-pills-custom .nav-link.active {
    color: #fff !important;
    background: #996699 !important;
}

.tab-content {
    margin-left: 0rem;
    margin-top: 0rem;
    margin-right: 0rem;
}

.wrapper {
    position: relative;
    overflow-x: hidden;
}

.wrapper .eventsIcon {
    position: absolute;
    top: 0;
    height: 100%;
    width: auto;
    display: flex;
    align-items: center;
    z-index: 10; /* Ensure the buttons are above the tabs */
}

.eventsIcon:first-child {
    left: -10px; /* Adjust as needed */
    display: none;
    background: linear-gradient(90deg, #fff 70%, transparent);
}

.eventsIcon:last-child {
    right: -10px; /* Adjust as needed */
    justify-content: flex-end;
    background: linear-gradient(-90deg, #fff 70%, transparent);
}

.eventsIcon i {
    cursor: pointer;
    font-size: 14px;
    text-align: center;
    border-radius: 50%; /* Make it round */
    background: #efedfb;
    padding: 10px;
}

.eventsIcon:first-child i {
    margin-left: 10px; /* Adjust for better spacing */
}

.eventsIcon:last-child i {
    margin-right: 10px; /* Adjust for better spacing */
}

@media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
        content: '';
        display: block;
        border-top: 8px solid transparent;
        border-left: 10px solid #fff;
        border-bottom: 8px solid transparent;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
        opacity: 0;
    }
}

.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}

.wrapper {
    background-color: #eee;
    transition: 0.2s ease-in-out;
}

.wrapper:hover {
    background-color: white;
}

.shadow-1 {
    box-shadow: 0 0.2rem 0.7rem rgba(0, 0, 0, 0.15) !important
}

.toggle,
.content {
    font-family: "Poppins", sans-serif;
}

.toggle {
    text-align: start;
    width: 100%;
    background-color: transparent;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 16px;
    color: #111130;
    font-weight: 600;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 0;
}

.content {
    position: relative;
    font-size: 14px;
    text-align: justify;
    line-height: 30px;
    height: 0;
    overflow: hidden;
    transition: all 1s;
}

    @media (width > 1650px) {

        .breadcrumb_area .breadcam_wrap {
            max-width: 677px !important;
        }
    }
</style>
@section('mainContent')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="breadcrumb_area position-relative">
                    <div class="w-100 h-100 position-absolute bottom-0 left-0">
                        <img alt="Banner Image" class="w-100 h-100 img-cover"
                            src="{{ asset('public/frontend/infixlmstheme/img/images/customer.jpg') }}">
                    </div>

                    <div class="col-lg-9 offset-lg-1">
                        <div class="breadcam_wrap">&nbsp;
                            <h3 class="text-white custom-heading" id="tabHeading">Customer Help</h3>
                            {{-- <h2  class="font-size-banner my-4 text-center font-weight-bold"  data-animate="fadeInRight">
                            </h2> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <main ng-app="project1">
        <section class="bg-gray-1 hero-section py-10">
            <div class="container my-lg-5">


            </div>
        </section>
        <!-- Demo header-->
        <section class="header mb-4 mb-md-5 mt-md-5 mt-4">
            <div class="container px-md-5">
                <div class="row px-1 px-xl-5 px-md-2">

                    <div class="col-md-3 px-md-0 px-lg-2">
                        <!-- Tabs nav -->
                        <div class="wrapper">
                            <div class="eventsIcon d-md-none"><i id="left" class="fa-solid fa-angle-left"></i>
                            </div>


                            <div class="nav flex-md-column nav-pills nav-pills-custom small_pills" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">

                                {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-8" data-toggle="pill" href="#customer"
                                role="tab" aria-controls="customer" aria-selected="false">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">Customer Service</span></a> --}}

                                {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-9" data-toggle="pill" href="#contact"
                                role="tab" aria-controls="contact" aria-selected="false">
                                <i class="fa fa-arrow-right mr-2"></i>
                                <span class="text_small font-weight-bold small text-uppercase">Contact Us</span></a> --}}

                                <a class="nav-link active mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-home-tab"
                                    data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Term Of Use')">Term
                                        Of Use</span></a>

                                <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-profile-tab-1"
                                    data-toggle="pill" href="#v-pills-profile" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Privacy Policy')">Privacy Policy</span></a>

                                <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-messages-tab-2"
                                    data-toggle="pill" href="#v-pills-messages" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Help and Support')">Help and Support</span></a>

                                {{-- <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-settings-tab-3"
                                    data-toggle="pill" href="#v-pills-settings" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="false">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Certificate Verification')">Certificate Verification</span></a> --}}

                                {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-4" data-toggle="pill" href="#ship"
                            role="tab" aria-controls="ship" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="text_small font-weight-bold small text-uppercase">Shipping & Returns</span></a> --}}

                                {{-- <a class="nav-link mb-3 p-3 shadow" id="tab-5" data-toggle="pill" href="#track"
                            role="tab" aria-controls="track" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="text_small font-weight-bold small text-uppercase">Track Order</span></a> --}}
                                {{--
                        <a class="nav-link mb-3 p-3 shadow" id="tab-6" data-toggle="pill" href="#account"
                            role="tab" aria-controls="account" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="text_small font-weight-bold small text-uppercase">My Accounts</span></a> --}}

                                <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="tab-7" data-toggle="pill"
                                    href="#faq" role="tab" aria-controls="faq" aria-selected="false">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Faqs')">Faq's</span></a>

                                {{-- <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="tab-8" data-toggle="pill"
                                    href="#resource-center" role="tab" aria-controls="resource-center"
                                    aria-selected="false">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Resource center')">Resource center</span></a> --}}
                            </div>
                            <div class="eventsIcon d-md-none"><i id="right" class="fa-solid fa-angle-right"></i></div>
                        </div>
                    </div>


                    <div class="col-md-9 mt-4 mt-md-0">
                        <h1 class="customer d-none invisible">test</h1>
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="customer" role="tabpanel"
                                aria-labelledby="tab-8">
                                <h5>FOR ASSISTANCE</h5>
                                <h6>DOMESTIC CUSTOMERS</h6>
                                <h6>Call Us:</h6>
                                <p>
                                    Representatives are available from 7am – 2am ET, 7 days a week (excluding major U.S.
                                    holidays) and are ready to help.
                                </p>
                                <p><u>863-250-8764</u></p>

                                <h5>Live Chat with Us:</h5>
                                <p>
                                    Representatives are available from 7am – 11pm ET, 7 days a week (excluding major U.S.
                                    holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of any
                                    page.
                                </p>
                                <h5>International Customer</h5>
                                <p>
                                    Our international customers may access our international help center 24 hours a day, 7
                                    days a week HERE. If you are unable to find the answer to your question, you may contact
                                    a customer service representative through the help center. Representatives are available
                                    6 days a week (Sunday - Friday) and are ready to help. Please allow 24 hours to receive
                                    a response.
                                </p>
                            </div>

                            <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="contact" role="tabpanel"
                                aria-labelledby="tab-9">
                                <h5>WE’RE HERE FOR YOU!</h5>
                                <p>
                                    Email JUSOUT BEAUTY Customer Service (admin@merakinursing.com) or call 863-250-8764.
                                    Operating hours are from 7am – 2am EST, 7 days a week, excluding major U.S. holidays.
                                    Live chat representatives are available 7am – 11pm ET, 7 days a week (excluding major
                                    U.S. holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of
                                    any page
                                </p>
                            </div>


                            <div class="tab-pane fade show active rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-home"
                                role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h5> SCOPE</h5>
                                <p>The business relationships between Barbara Sturm Molecular Cosmetics GmbH - hereinafter
                                    referred to as "BSMC"
                                    - and the buyer shall be subject exclusively to the version of the following General
                                    Terms and Conditions
                                    applicable at the time the order is placed. Conflicting terms of business or purchase of
                                    the buyer shall
                                    only be deemed recognized if this has been explicitly agreed in writing. </p>
                                <h5>CONCLUSION OF CONTRACT</h5>
                                <p>
                                    By sending an order via the website the buyer makes a binding offer to BSMC to conclude
                                    a purchase
                                    agreement. If you place an order with BSMC we will send you an email confirming receipt
                                    by us of your order
                                    and the order details (confirmation of order). This confirmation of order shall not be
                                    deemed acceptance of
                                    your offer but shall merely inform you that we have received your order. A purchase
                                    agreement shall only
                                    then be concluded when we send the ordered product to you and confirm shipment to you in
                                    a second email
                                    (shipping confirmation). No purchase contract shall be concluded regarding products from
                                    one and the same
                                    order which are not stated in the confirmation of shipment. BSMC does not offer any
                                    products for purchase to
                                    minors. Products intended for children may likewise be only purchased by adults. Your
                                    order also functions
                                    as assurance that you are of legal age. We accept no liability for orders for our
                                    product placed by minors.
                                </p>
                                <h5>
                                    RIGHT TO CANCEL WITHIN 14 DAYS; EXCLUSION OF THE RIGHT TO CANCEL, NOTIFICATION
                                    OF RIGHT TO CANCEL,

                                </h5>
                                <p>
                                    You can revoke your contractual declaration without stating grounds within 14 days in
                                    text form (e.g.
                                    letter, fax, email) or if the item is transferred to you before expiry of this period -
                                    by returning the
                                    goods.

                                    The period begins after receiving this formal advice in text form but not prior to
                                    receipt of the goods by
                                    the recipient (in the case of the recurring delivery of similar goods, not prior to
                                    receipt of the first
                                    part delivery) nor prior to fulfillment of our informaiton duties pursuant to Article
                                    246 Section 2 in
                                    connection with Section 1 (1) and (2) of the Introductory Law to the German Civil Code
                                    (EGBGB) and our
                                    duties under Section 312 g (1) Sentence 1 of the German Civil Code (BGB) in connection
                                    with Article 246
                                    Section 3 of the Introductory Law to the German Civil Code (EGBGB). The period will be
                                    deemed as having been
                                    observed if notification is sent or the delivered goods are returned within this period.

                                    Notification of cancellation must be sent to:
                                </p>

                                <h5>
                                    MERAKINURSING
                                </h5>
                                <h6>
                                    Contact: 863-250-8764
                                    <br>
                                    Email:admin@merakinursing.com
                                </h6>

                            </div>

                            <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-profile"
                                role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <p>
                                    Barbara Sturm Molecular Cosmetics collects and uses your personal data exclusively in
                                    the framework of the
                                    provisions of data protection law which apply in the Federal Republic of Germany. The
                                    following explanations
                                    provide information about the way in which personal data is collected and used as well
                                    as the extent of such
                                    collection and use and its purpose. This information can be read at any time on our
                                    website.
                                </p>
                                <h5>
                                    DATE COMMUNICATION AND RECORDING FOR INSTRASYSTEM AND STATISTICAL PURPOSES

                                </h5>
                                <p>
                                    For technical reasons your Internet browser automatically conveys data to our web server
                                    every time you
                                    visit our website. Among other things your browser sends data about the date and time at
                                    which our website
                                    was visited, the URL of the referencing web page, the files accessed, the volume of data
                                    sent, the type and
                                    version of browser used, the operating system and your IP address. This data is stored
                                    separately from other
                                    data which is entered when using our offer. We are not able to assign this data to
                                    specific persons. The
                                    data is used for statistical purposes and subsequently deleted in accordance with GDPR
                                    compliance.
                                </p>
                                <h5>
                                    CUSTOMER BASIC DATA
                                </h5>
                                <p>
                                    If a contractual relationship is created between us and you or if the contents of such a
                                    contractual
                                    relationship are established or altered, we collect and use personal data from you to
                                    the extent that this
                                    is necessary for such purposes. If instructed to do so by the responsible authorities we
                                    shall be able in
                                    specific cases to provide information about such data (customer basic data) where the
                                    provision of such data
                                    is required for the purposes of criminal investigations, to avert dangers, to comply
                                    with the statutory
                                    duties of authorities for the protection of the constitution of the Federal Armed Forces
                                    Counterintelligence
                                    Office of for the purposes of asserting rights to intellectual property.
                                </p>
                                <h5>
                                    COOKIES
                                </h5>
                                <p>
                                    In order to extend the functional scope of our Internet service and to make it easier
                                    for you to use, we
                                    make use of "cookies". These are text files which are saved on your computer and which
                                    enable your use of
                                    the website to be analyzed. These cookies help us to store data on your computer when
                                    you access our
                                    website. You have the option of blocking the storage of cookies on your computer by
                                    changing the settings on
                                    your browser. If you do this, however, you may no longer be able to use all the
                                    functions which our services
                                    provide.

                                    THIS WEBSITE USES COOKIES. This website uses our own and 3rd party cookies to improve
                                    your experience and
                                    for personalised content/advertising. By clicking 'ACCEPT' you consent to our use of
                                    cookies. More info

                                    Cookies are small text files that can be used by websites to make a user's experience
                                    more efficient.

                                    The law states that we can store cookies on your device if they are strictly necessary
                                    for the operation of
                                    this site. For all other types of cookies we need your permission.

                                    This site uses different types of cookies. Some cookies are placed by third party
                                    services that appear on
                                    our pages.

                                    You can at any time change or withdraw your consent from the Cookie Declaration on our
                                    website.

                                    Learn more about who we are, how you can contact us and how we process personal data in
                                    our Privacy Policy.

                                    Please state your consent ID and date when you contact us regarding your consent.
                                </p>
                            </div>

                            <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-messages"
                                role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <p>
                                    Merkaii Xcellence College of Health are committed to providing a website that is accessible to
                                    all audiences, regardless of technology or ability. As part of this, Fenty Beauty+ Fenty
                                    Skin aim to substantially conform to applicable guidelines, including WCAG 2.1 at levels
                                    A and AA. If you experience any difficulty in accessing any part of this website, please
                                    contact us by <br> emailing: <b>admin@merakinursing.com</b>
                                    or
                                    calling: <b>863-250-8764</b>
                                </p>
                            </div>

                            {{-- <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-settings"
                                role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <h5>About this cookie policy</h5>
                                <p>
                                    This Cookie Policy explains what cookies are and how we use them, the types of cookies
                                    we use i.e, the information we collect using cookies and how that information is used,
                                    and how to control the cookie preferences. For further information on how we use, store,
                                    and keep your personal data secure, see our Privacy Policy.You can at any time change or
                                    withdraw your consent from the Cookie Declaration on our websiteLearn more about who we
                                    are, how you can contact us, and how we process personal data in our Privacy Policy
                                </p>
                                <h5>What are cookies?</h5>
                                <p>
                                    Cookies are small text files that are used to store small pieces of information. They
                                    are stored on your device when the website is loaded on your browser. These cookies help
                                    us make the website function properly, make it more secure, provide better user
                                    experience, and understand how the website performs and to analyze what works and where
                                    it needs improvement.
                                </p>
                                <h5>
                                    How do we use cookies?
                                </h5>

                                <p>
                                    As most of the online services, our website uses first-party and third-party cookies for
                                    several purposes. First-party cookies are mostly necessary for the website to function
                                    the right way, and they do not collect any of your personally identifiable data.The
                                    third-party cookies used on our website are mainly for understanding how the website
                                    performs, how you interact with our website, keeping our services secure, providing
                                    advertisements that are relevant to you, and all in all providing you with a better and
                                    improved user experience and help speed up your future interactions with our website.

                                </p>
                                <h5>
                                    What types of cookies do we use?
                                </h5>
                                <p>
                                    <b>Essential:</b> Some cookies are essential for you to be able to experience the full
                                    functionality of our site. They allow us to maintain user sessions and prevent any
                                    security threats. They do not collect or store any personal information. For example,
                                    these cookies allow you to log-in to your account and add products to your basket, and
                                    checkout securely.
                                </p>

                                <p>
                                    <b>Statistics:</b> These cookies store information like the number of visitors to the
                                    website, the number of unique visitors, which pages of the website have been visited,
                                    the source of the visit, etc. These data help us understand and analyze how well the
                                    website performs and where it needs improvement.
                                </p>
                                <p>
                                    <b>Marketing:</b> Our website displays advertisements. These cookies are used to
                                    personalize the advertisements that we show to you so that they are meaningful to you.
                                    These cookies also help us keep track of the efficiency of these ad campaigns.
                                    The information stored in these cookies may also be used by the third-party ad providers
                                    to show you ads on other websites on the browser as well.


                                </p>
                                <p>
                                    <b>Functional:</b> These are the cookies that help certain non-essential functionalities
                                    on our website. These functionalities include embedding content like videos or sharing
                                    content of the website on social media platforms.
                                </p>
                                <p>
                                    <b>Preferences:</b> These cookies help us store your settings and browsing preferences
                                    like language preferences so that you have a better and efficient experience on future
                                    visits to the website.
                                </p>
                            </div> --}}

                            {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id=ship role="tabpanel"
                            aria-labelledby="tab-4">
                            <h5>FREE SHIPPING</h5>
                            <p>
                                Below are the free shipping offers available on <strong>JUSOUTBEAUTY</strong>
                            </p>
                            <p>
                                <b> DOMESTIC</b> FREE Standard Shipping on all U.S. merchandise orders (please allow 4-8
                                business days for processing and shipping to receive your order)
                            </p>

                            <p>
                                <b>INTERNATIONAL</b> FREE Standard International Shipping on all merchandise orders $75
                                USD and over.
                            </p>

                            <p>
                                Please note if your order contains a hazmat item US orders must ship via ground Standard
                                Shipping. International orders must ship DHL Express. International shipping rates vary
                                by country and will be determined at checkout.
                            </p>

                            <h5>DOMESTIC SHIPPING COSTS + DELIVERY TIMES</h5>
                            <p>
                                Orders must be placed by 12pm ET to start processing on the same day. Processing time
                                usually takes 1-2 business days. Delivery times are based on orders placed between
                                Monday – Friday.
                            </p>

                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Shipping Method</th>
                                        <th scope="col">Costs</th>
                                        <th scope="col">Total Delivery Time (including processing time)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>Standard Shipping</td>
                                        <td>Free</td>
                                        <td>4-8 business days (up to 21 days for APO/FPO/DPO Military Addresses)</td>
                                    </tr>
                                    <tr>

                                        <td>2 Day Shipping</td>
                                        <td>$10.95 USD</td>
                                        <td>3 – 4 business days</td>
                                    </tr>
                                    <tr>

                                        <td>1 Day Shipping</td>
                                        <td>$16.95 USD</td>
                                        <td>2 – 3 business days</td>
                                    </tr>
                                </tbody>
                            </table>

                            <p>
                                Orders must be placed by 12pm ET Monday – Friday to start processing on the same day.
                                Processing time usually takes 1-2 business days. Delivery times are based on orders
                                placed between Monday and Friday. FentyBeauty.com and FentySkin.com offer FREE Standard
                                Shipping on all U.S. merchandise. Select items considered hazmat (hazardous materials)
                                are restricted and must be shipped ground with Standard Shipping. All U.S. orders always
                                ship Standard Shipping for free—no promotion code needed.
                            </p>
                        </div> --}}

                            {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id="track" role="tabpanel"
                            aria-labelledby="tab-5">

                            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum.</p>
                        </div> --}}
                            {{-- <div class="tab-pane fade shadow rounded bg-white p-5" id="account" role="tabpanel"
                            aria-labelledby="tab-6">
                            <h5>Sign In</h5>
                            <p>Sign in to your account to add or edit your addresses and email Preference, save your Pro
                                filter to your profile and more.</p>
                            <h5>Creat Account</h5>
                            <p>EXCLUSIVE OFFERS + INFO <br>
                                Sign up to stay posted on hyper-limited offers, online-only product drops, in store
                                events, and-as true fenty beauty + fenty skin family-personal beauty tips from Rihhana
                                herself.</p>
                            <p class="text-muted mb-2">Click here for Sign In or Creat Account</p>
                            <button class="btn btn-primary"><a href="{{ url('/login') }}"
                                    style="color:white">Login</a></button>

                        </div> --}}
                            <div class="tab-pane fade p-lg-5 rounded bg-white p-3 shadow mb-3" id="faq"
                                role="tabpanel" aria-labelledby="tab-7">
                                <h5>Frequently Asked Questions</h5>
                                <div class="col-12 mt-3 px-0">
                                    @forelse ($faqs as $faq)
                                        <div class="wrapper shadow-1 mb-4 rounded px-3 py-2">
                                            <button class="toggle"
                                                onclick="toggleFaq({{ $faq->id }})">{{ $faq->question }}<i
                                                    class="fas fa-plus icon"></i></button>
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <iframe id="iframeFaqAns_{{ $faq->id }}"
                                                                style="border:unset;width:100%;"></iframe>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <p>{!! $faq->answer !!}</p> --}}
                                            </div>
                                        </div>
                                    @empty
                                        <div class="wrapper mb-4 px-3 py-2 shadow">
                                            <button class="toggle">No FAQs Found</button>
                                        </div>
                                    @endforelse
                                </div>
                                {{-- <h5 class="font-weight-bolder text-dark">1. Can I apply my previous nursing or healthcare
                                    experience toward becoming an RN and/or
                                    earning a higher degree?
                                </h5>

                                <p class="mt-2">
                                    Registered nurses (RNs) must have at least an Associate Degree in Nursing (ADN), but
                                    some students decide to pursue a Bachelor of Science in Nursing (BSN). If you’re already
                                    working in the medical field, there are multiple pathways to work toward becoming an RN.
                                    <br>

                                    <strong>Here are two examples:
                                    </strong> <br>

                                    <span class="font-weight-bold">Medical Assistant (MA):
                                    </span> MAs may be able to apply some of the coursework from their
                                    program (particularly community college courses) toward an ADN to shorten the time to
                                    graduation. <br>
                                    <span class="font-weight-bold"> Licensed Practical Nurse (LPN):
                                    </span> Both LPN-to-ADN and LPN-to-BSN bridge programs take into
                                    account prior education. The main difference is that an ADN can take a year or two,
                                    while a BSN will generally take twice that long.

                                </p>
                                <h5 class="font-weight-bolder text-dark mt-2">2. How much math and science do I have to
                                    take to become a nurse? </h5>
                                <p class="mt-2">

                                    These subjects appear to be a common fear among prospective students, and the answer
                                    depends on the type of nursing you pursue. If you’re interested in the LPN/LVN route,
                                    your training program will likely include science courses like anatomy, physiology,
                                    human growth and development, and basic nutrition. You may need to meet a math
                                    requirement to get into an LPN program. <br>
                                    Whether in an ADN or BSN degree program, a prospective registered nurse will likely need to take health-related science courses, as well as meet math requirements (and liberal arts, too). <br>
                                    Don’t let math anxiety keep you from pursuing your career goals. Revisit the basics—fractions are your friends!—if you feel like you’ve forgotten them since school. And don’t be afraid to hire a tutor to help you navigate college-level coursework that seems daunting.
                                </p>
                                <h5 class="font-weight-bolder text-dark mt-2">3.Can I really get a nursing degree online?
                                </h5>
                                <p class="mt-2">Since nursing is a hands-on profession, even online nursing programs require in-person clinical training with real patients. Programs that combine online learning with real-world practice are called hybrids. <br> If you’re pursuing a bachelor’s degree and already have a combination of clinical hours and a current RN license, you may be able to find a program that is exclusively online.


                                </p> --}}
                            </div>
                            {{-- resourse center --}}
                            {{-- <div class="tab-pane fade rounded bg-white p-4 shadow mb-3" id="resource-center"
                                role="tabpanel" aria-labelledby="tab-8">
                                <h5>FOR Resource Center</h5>
                                <h6>DOMESTIC CUSTOMERS</h6>
                                <h6>Call Us:</h6>
                                <p>
                                    Representatives are available from 7am – 2am ET, 7 days a week (excluding major U.S.
                                    holidays) and are ready to help.
                                </p>
                                <p><u>863-250-8764</u></p>

                                <h5>Live Chat with Us:</h5>
                                <p>
                                    Representatives are available from 7am – 11pm ET, 7 days a week (excluding major U.S.
                                    holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of any
                                    page.
                                </p>
                                <h5>International Customer</h5>
                                <p>
                                    Our international customers may access our international help center 24 hours a day, 7
                                    days a week HERE. If you are unable to find the answer to your question, you may contact
                                    a customer service representative through the help center. Representatives are available
                                    6 days a week (Sunday - Friday) and are ready to help. Please allow 24 hours to receive
                                    a response.
                                </p>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        // active-tab_heading
        function updateTabHeading(tabName) {
            document.getElementById('tabHeading').innerText = tabName;
        }

        function setActiveTab(tabLink) {
            var tabName = tabLink.innerText.trim();
            updateTabHeading(tabName);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var activeTab = document.querySelector('.nav-link.active');
            setActiveTab(activeTab);
        });

        var tabLinks = document.querySelectorAll('.nav-link');
        tabLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                setActiveTab(link);
            });
        });
    </script>

    <script>
        if (window.location.hash) {
            let hash = window.location.hash;
            $(hash).tab('show');
        }

        var information = localStorage.getItem("information");

        if (information == 'track order') {

            $('#tab-5').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'shipping') {

            $('#tab-4').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'my Account') {

            $('#tab-6').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'term of use') {

            $('#v-pills-home-tab').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'privacy policy') {

            $('#v-pills-profile-tab-1').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'Help and Support') {

            $('#v-pills-messages-tab-2').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'Certificate Verification') {

            $('#v-pills-settings-tab-3').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'faq') {

            $('#tab-7').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'customer') {

            $('#tab-8').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        } else if (information == 'contact') {

            $('#tab-9').click();
            $('#information-page').text('Customer Help');
            localStorage.setItem("information", '');
        }
    </script>
    <script>
        // function close_topbar() {

        //     $("#topbar").removeClass('d-xl-flex');
        //     $(".hero-section").removeClass('mt-15-67');
        //     $('.hero-section').attr('style', 'padding-top: 230px !important');

        // }
        $(document).ready(function() {
            $(window).on("resize", function(e) {
                checkScreenSize();
            });

            checkScreenSize();

            function checkScreenSize() {
                var newWindowWidth = $(window).width();

                if (newWindowWidth < 481) {
                    $("#tab-8,#tab-9,#v-pills-home-tab,#v-pills-profile-tab-1,#v-pills-messages-tab-2,#v-pills-settings-tab-3,#tab-4,#tab-5,#tab-6,#tab-7")
                        .click(function(event) {
                            event.preventDefault();
                            $('html, body').animate({
                                scrollTop: $(".customer").offset().top
                            }, 500);
                        });

                }
            }
        });
    </script>
    <script>
        let toggles = document.getElementsByClassName("toggle");
        let contentDiv = document.getElementsByClassName("content");
        let icons = document.getElementsByClassName("icon");
        let wrapper = document.getElementsByClassName('wrapper');

        for (let i = 0; i < toggles.length; i++) {
            toggles[i].addEventListener("click", () => {
                if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
                    contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
                    toggles[i].style.color = "#996699";
                    wrapper[i].style.background = "#fff";
                    icons[i].classList.remove("fa-plus");
                    icons[i].classList.add("fa-minus");
                } else {
                    contentDiv[i].style.height = "0px";
                    toggles[i].style.color = "#111130";
                    wrapper[i].style.background = "#eee";
                    icons[i].classList.remove("fa-minus");
                    icons[i].classList.add("fa-plus");
                }

                for (let j = 0; j < contentDiv.length; j++) {
                    if (j !== i) {
                        contentDiv[j].style.height = 0;
                        toggles[j].style.color = "#111130";
                        wrapper[j].style.background = "#eee";
                        icons[j].classList.remove("fa-minus");
                        icons[j].classList.add("fa-plus");
                    }
                }
            });
        }

        var faqs = @json($faqs);
        if (faqs != '') {
            for (var i = 0; i < faqs.length; i++) {
                console.log(faqs[i]['answer'].en);

                // set About iframe
                var iframe = document.getElementById("iframeFaqAns_" + faqs[i]['id']);
                var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                var dynamicDiv = document.createElement("div");

                dynamicDiv.innerHTML = faqs[i]['answer'].en;

                iframeDoc.body.appendChild(dynamicDiv);


            }
        }

        function toggleFaq(id) {

            var iframe = document.getElementById("iframeFaqAns_" + id);
            var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
            var bodyHeight = iframeDoc.body.querySelector("div").scrollHeight + 25;
            $("#iframeFaqAns_" + id).css('height', bodyHeight);
        }
    </script>


    {{-- for slider in navtabs for mobile --}}
    <script>
$(document).ready(function() {
    const $tabsBox = $(".small_pills");
    const $allTabs = $tabsBox.find(".main-items");
    const $arrowEventsIcons = $(".eventsIcon i");
    const $tabContents = $(".tab-pane");

    $arrowEventsIcons.on("click", function() {
        if ($(this).attr("id") === "left") {
            $tabsBox.animate({ scrollLeft: '-=340' }, 'smooth');
        } else {
            $tabsBox.animate({ scrollLeft: '+=340' }, 'smooth');
        }
    });

    $tabsBox.on("scroll", function() {
        let maxScrollableWidth = this.scrollWidth - this.clientWidth;
        $(".eventsIcon:first-child").css('display', this.scrollLeft <= 0 ? "none" : "flex");
        $(".eventsIcon:last-child").css('display', maxScrollableWidth - this.scrollLeft <= 1 ? "none" : "flex");
    });

    $allTabs.on("click", function(e) {
        e.preventDefault();
        $allTabs.removeClass("active");
        $(this).addClass("active");

        // Remove active class
        $tabContents.removeClass("show active");

        // Add active class 
        const targetContentId = $(this).attr("href").substring(1);
        $("#" + targetContentId).addClass("show active");
    });
    const handleEventsIcons = function() {
        let maxScrollableWidth = $tabsBox[0].scrollWidth - $tabsBox[0].clientWidth;
        console.log('scrollLeft:', $tabsBox[0].scrollLeft, 'maxScrollableWidth:', maxScrollableWidth);
        $(".eventsIcon:first-child").css('display', $tabsBox[0].scrollLeft <= 0 ? "none" : "flex");
        $(".eventsIcon:last-child").css('display', maxScrollableWidth - $tabsBox[0].scrollLeft <= 1 ? "none" : "flex");
    };
    handleEventsIcons();
});


    </script>
    @include(theme('partials._custom_footer'))
@endsection
