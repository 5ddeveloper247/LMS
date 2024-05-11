<style>
    .nav-pills-custom .nav-link {
        color: #aaa;
        background: #fff;
        position: relative;
    }

    .nav-pills-custom .nav-link.active {
        color: #F89880;
        background: #fff;
    }

    .tab-content {
        margin-left: 0rem;
        margin-top: 0rem;
        margin-right: 0rem;
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
</style>
<div>
    <div class="contact_section ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 p-5">
                    <div class="card">
                        <div class="card-header">
                            <h1>Privacy Policies</h1>
                        </div>
                        <div class="card-body">
                            {!! $privacy_policy->details !!}
                        </div>
                    </div>
                    {{-- <div class="contact_address">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="row justify-content-between">
                                    <div class="col-lg-12 p-5">

                                        <div class="address_lines py-3">
                                            {!! $privacy_policy->details !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                
            </div>
        </div>
    </div>
</div>
<main ng-app="project1">
    <section class="py-10 mt-15 mt-15-67 bg-gray-1 hero-section">
        <div class="container">

            <h2 class="mb-2 text-center font-size-banner" id="information-page" data-animate="fadeInRight"
                style="color: white; ">Customer Help
            </h2>

        </div>

    </section>
    <!-- Demo header-->
    <section class="py-5 header">

        <div class="container container-custom py-4">

            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                         <a class="nav-link mb-3 p-3 shadow" id="tab-8" data-toggle="pill" href="#customer"
                            role="tab" aria-controls="customer" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Customer Service</span></a>

                            <a class="nav-link mb-3 p-3 shadow" id="tab-9" data-toggle="pill" href="#contact"
                            role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Contact Us</span></a>


                        <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill"
                            href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Term Of Use</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab-1" data-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Privacy Policy</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab-2" data-toggle="pill"
                            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Accessibility</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab-3" data-toggle="pill"
                            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                            aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Cookies Settings/Policy</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="tab-4" data-toggle="pill" href="#ship"
                            role="tab" aria-controls="ship" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Shipping & Returns</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="tab-5" data-toggle="pill" href="#track"
                            role="tab" aria-controls="track" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Track Order</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="tab-6" data-toggle="pill" href="#account"
                            role="tab" aria-controls="account" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">My Accounts</span></a>

                        <a class="nav-link mb-3 p-3 shadow" id="tab-7" data-toggle="pill" href="#faq"
                            role="tab" aria-controls="faq" aria-selected="false">
                            <i class="fa fa-arrow-right mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Faq's</span></a>
                    </div>
                </div>


                <div class="col-md-9">
                    <h1 class="invisible customer d-block d-md-none">test</h1>
                    <!-- Tabs content -->
                    <div class="tab-content " id="v-pills-tabContent">
                         <div class="tab-pane fade shadow rounded bg-white p-5" id="customer" role="tabpanel"
                            aria-labelledby="tab-8">

                            <h2>FOR ASSISTANCE</h2>
                            <h6>DOMESTIC CUSTOMERS</h6>
                            <h6>Call Us:</h6>

                            <p>
                                Representatives are available from 7am – 2am ET, 7 days a week (excluding major U.S. holidays) and are ready to help.
                            </p>
                            <p><u>866-848-2168</u></p>

                            <h2>Live Chat with Us:</h2>
                            <p>
                                Representatives are available from 7am – 11pm ET, 7 days a week (excluding major U.S. holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of any page.
                            </p>
                            <h2>International Customer</h2>
                            <p>
                                Our international customers may access our international help center 24 hours a day, 7 days a week HERE. If you are unable to find the answer to your question, you may contact a customer service representative through the help center. Representatives are available 6 days a week (Sunday - Friday) and are ready to help. Please allow 24 hours to receive a response.
                            </p>

                        </div>

                         <div class="tab-pane fade shadow rounded bg-white p-5" id="contact" role="tabpanel"
                            aria-labelledby="tab-9">
                            <h2>WE’RE HERE FOR YOU!</h2>
                            <p>
                                Email JUSOUT BEAUTY Customer Service (admin@jusoutbeauty.com) or call 866-848-2168. Operating hours are from 7am – 2am EST, 7 days a week, excluding major U.S. holidays. Live chat representatives are available 7am – 11pm ET, 7 days a week (excluding major U.S. holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of any page
                            </p>
                        </div>


                        <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home"
                            role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h2> SCOPE</h2>
                            <p>The business relationships between Barbara Sturm Molecular Cosmetics GmbH - hereinafter
                                referred to as "BSMC"
                                - and the buyer shall be subject exclusively to the version of the following General
                                Terms and Conditions
                                applicable at the time the order is placed. Conflicting terms of business or purchase of
                                the buyer shall
                                only be deemed recognized if this has been explicitly agreed in writing. </p>
                            <h2>CONCLUSION OF CONTRACT</h2>
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
                            <h2>
                                RIGHT TO CANCEL WITHIN 14 DAYS; EXCLUSION OF THE RIGHT TO CANCEL, NOTIFICATION
                                OF RIGHT TO CANCEL,

                            </h2>
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

                            <h2>
                                JUSOUTBEAUTY
                            </h2>
                            <h6>
                                Contact: 866-848-2168
                                <br>
                                Email: admin@jusoutbeauty.com
                            </h6>

                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
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
                            <h2>
                                DATE COMMUNICATION AND RECORDING FOR INSTRASYSTEM AND STATISTICAL PURPOSES

                            </h2>
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
                            <h2>
                                CUSTOMER BASIC DATA
                            </h2>
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
                            <h2>
                                COOKIES
                            </h2>
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

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">
                            <p>
                                Jusout Beauty + Beauty Skin are committed to providing a website that is accessible to
                                all audiences, regardless of technology or ability. As part of this, Fenty Beauty+ Fenty
                                Skin aim to substantially conform to applicable guidelines, including WCAG 2.1 at levels
                                A and AA. If you experience any difficulty in accessing any part of this website, please
                                contact us by <br> emailing: <b>admin@jusoutbeauty.com</b>
                                or
                                calling: <b>866-848-2168</b>
                            </p>
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">
                            <h2>About this cookie policy</h2>
                            <p>
                                This Cookie Policy explains what cookies are and how we use them, the types of cookies
                                we use i.e, the information we collect using cookies and how that information is used,
                                and how to control the cookie preferences. For further information on how we use, store,
                                and keep your personal data secure, see our Privacy Policy.You can at any time change or
                                withdraw your consent from the Cookie Declaration on our websiteLearn more about who we
                                are, how you can contact us, and how we process personal data in our Privacy Policy
                            </p>
                            <h2>What are cookies?</h2>
                            <p>
                                Cookies are small text files that are used to store small pieces of information. They
                                are stored on your device when the website is loaded on your browser. These cookies help
                                us make the website function properly, make it more secure, provide better user
                                experience, and understand how the website performs and to analyze what works and where
                                it needs improvement.
                            </p>
                            <h2>
                                How do we use cookies?
                            </h2>

                            <p>
                                As most of the online services, our website uses first-party and third-party cookies for
                                several purposes. First-party cookies are mostly necessary for the website to function
                                the right way, and they do not collect any of your personally identifiable data.The
                                third-party cookies used on our website are mainly for understanding how the website
                                performs, how you interact with our website, keeping our services secure, providing
                                advertisements that are relevant to you, and all in all providing you with a better and
                                improved user experience and help speed up your future interactions with our website.

                            </p>
                            <h2>
                                What types of cookies do we use?
                            </h2>
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
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id=ship role="tabpanel"
                            aria-labelledby="tab-4">
                            <h2>FREE SHIPPING</h2>
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

                            <h2>DOMESTIC SHIPPING COSTS + DELIVERY TIMES</h2>
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
                        </div>

                        <div class="tab-pane fade shadow rounded bg-white p-5" id="track" role="tabpanel"
                            aria-labelledby="tab-5">

                            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="account" role="tabpanel"
                            aria-labelledby="tab-6">
                            <h2>Sign In</h2>
                            <p>Sign in to your account to add or edit your addresses and email Preference, save your Pro
                                filter to your profile and more.</p>
                            <h2>Creat Account</h2>
                            <p>EXCLUSIVE OFFERS + INFO <br>
                                Sign up to stay posted on hyper-limited offers, online-only product drops, in store
                                events, and-as true fenty beauty + fenty skin family-personal beauty tips from Rihhana
                                herself.</p>
                            <p class="text-muted mb-2">Click here for Sign In or Creat Account</p>
                            <button class="btn btn-primary"><a href="{{ url('/login') }}"
                                    style="color:white">Login</a></button>

                        </div>
                        <div class="tab-pane fade shadow rounded bg-white p-5" id="faq" role="tabpanel"
                            aria-labelledby="tab-7">
                            <h2>SHIPPING/ORDER STATUS</h2>
                            <h6>CAN WE GET FENTY BEAUTY INTERNATIONALLY?</h6>
                           <p>
                                Of course! FentyBeauty.com ships internationally to 150+ countries. Fenty Beauty is also available for purchase at select Sephora stores throughout the U.S., Canada, Mexico, France, Spain, Denmark, Sweden, Thailand, Malaysia, Australia, Singapore and the Middle East (UAE, Bahrain, Qatar, Kuwait). Fenty Beauty will also be available at select SiJCP stores as well as on Sephora.com. If you live in the UK or Ireland, you can also shop Fenty Beauty at Harvey Nichols or on HarveyNichols.com as well as Boots or Boots.com. For a full list of all international retailers
                           </p>
                           <h6>
                                WHEN CAN I GET PRODUCTS THAT ARE OUT OF STOCK?
                           </h6>
                           <p>
                            We try our best to replenish stock as quickly as possible. Here’s what you can do in the meantime: Sign up for an email alert by going to the specific product page and clicking the “Notify Me” button. When that must-have item is back in action, you’ll be the first to know.
                           </p>
                           <h2>RETURNS</h2>
                           <h6>RETURNING DEFECTIVE/WRONG ITEMS</h6>
                           <p>For domestic orders, please send the defective or incorrect item(s) back to us, using the FREE RETURNS PROCESS. Once we receive the returned item(s), we will gladly send you a replacement. Use the return form included in your original packaging or contact Customer Service at866-848-2168. For international orders, please follow the returns process specific to your country. For Canada, UK, EU, and AUS orders, please follow the RETURNS PROCESS HERE. For all other countries, please contact customer service</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
<script>
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
    } else if (information == 'accessibility') {

        $('#v-pills-messages-tab-2').click();
        $('#information-page').text('Customer Help');
        localStorage.setItem("information", '');
    } else if (information == 'cookies settings/policy') {

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
    $(document).ready(function () {
    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize(){
        var newWindowWidth = $(window).width();

        if (newWindowWidth < 481) {
            $("#tab-8,#tab-9,#v-pills-home-tab,#v-pills-profile-tab-1,#v-pills-messages-tab-2,#v-pills-settings-tab-3,#tab-4,#tab-5,#tab-6,#tab-7").click(function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: $(".customer").offset().top
                } ,500);
            });

        }
    }
});
</script>
@include(theme('partials._custom_footer'))