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
        z-index: 10;
        /* Ensure the buttons are above the tabs */
    }

    .eventsIcon:first-child {
        left: -10px;
        /* Adjust as needed */
        display: none;
        background: linear-gradient(90deg, #fff 70%, transparent);
    }

    .eventsIcon:last-child {
        right: -10px;
        /* Adjust as needed */
        justify-content: flex-end;
        background: linear-gradient(-90deg, #fff 70%, transparent);
    }

    .eventsIcon i {
        cursor: pointer;
        font-size: 14px;
        text-align: center;
        border-radius: 50%;
        /* Make it round */
        background: #efedfb;
        padding: 10px;
    }

    .eventsIcon:first-child i {
        margin-left: 10px;
        /* Adjust for better spacing */
    }

    .eventsIcon:last-child i {
        margin-right: 10px;
        /* Adjust for better spacing */
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

                                <a class="nav-link mb-md-3 p-md-3 p-2 shadow main-items" id="v-pills-cookies-tab"
                                    data-toggle="pill" href="#v-pills-cookies" role="tab"
                                    aria-controls="v-pills-cookies" aria-selected="true">
                                    <i class="fa fa-arrow-right mr-2"></i>
                                    <span class="text_small font-weight-bold small text-uppercase"
                                        onclick="changeTab('Cookies')">Cookies</span></a>

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
                            <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="customer"
                                role="tabpanel" aria-labelledby="tab-8">
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

                            <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="contact"
                                role="tabpanel" aria-labelledby="tab-9">
                                <h5>WE’RE HERE FOR YOU!</h5>
                                <p>
                                    Email JUSOUT BEAUTY Customer Service (admin@merakinursing.com) or call 863-250-8764.
                                    Operating hours are from 7am – 2am EST, 7 days a week, excluding major U.S. holidays.
                                    Live chat representatives are available 7am – 11pm ET, 7 days a week (excluding major
                                    U.S. holidays) and are ready to help. Click the ‘Chat now’ button at the lower right of
                                    any page
                                </p>
                            </div>


                            <div class="tab-pane fade show active rounded bg-white p-3 p-lg-5 shadow mb-3"
                                id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h5 class="font-weight-bold text-center mb-md-4 mb-2">Terms and Conditions for Merkaii Xcellence Prep,
                                    also known as Merkaii Global Society (MGS)</h5>
                                <h5>License Contract</h5>
                                <p class="mb-2"><span class="font-weight-bold">IMPORTANT:</span> Do not edit this agreement. ready?
                                    merkaii global societe, llc. (referred to as "Mgs", "We", or "Uur") and you (referred to
                                    as "Licensee", "You", or "Your") agree to a license agreement for the use of mgs content
                                    and/or services.
                                </p>
                                <p class="mb-2">Downloading and using mgs content or services confirms that you have the legal authority
                                    to enter into this agreement, that you accept its terms and conditions, and that you
                                    agree to be bound by them.
                                    You may not access or use MGS Content or Services if you do
                                    not have the necessary authority or if you disagree with its terms. In such case, you
                                    must delete them.</p>
                                <p class="mb-2">This agreement seats any prior agreement, written or oral, and any other communications
                                    relating to the subject matter of this agreement being the entire and exclusive
                                    statement between you and mgs.
                                </p>
                                <p>You certify that you are over 18 years old and are able to form a legal binding agreement.
                                </p>
                                <br>
                                <h5 class="text-center font-weight-bold mb-md-4 mb-3">TERMS AND SUMMARY</h5>
                              <h5> 1. Definitions</h5>
                                    <p>The following terms have the
                                    following meanings as they are used in this document:
                                    <br>
                                    "Agreement" refers to the license agreement between the licensee and MGS as well as any
                                    associated policies that are included in it.
                                    "Websites" refers to www.merkaiixcelprep.com as well as any other website that MGS owns,
                                    runs, or uses to promote its goods and services.
                                    <br>
                                    "Services" refers to all MGS platforms, websites, and mobile applications, as well as
                                    the items, services, and contents contained therein, that MGS makes available to
                                    Licensees for purchase, either directly through the App Stores or through any other
                                    marketplace where MGS sells such goods or services

                                </p>
                                <h5>2. Permission and Inclusion</h5>
                                <p>
                                    <span class="font-weight-bold">a.</span> Exclusive Rights. MGS is the owner and
                                    operator of the Services. All materials
                                    included in or included with the Services, unless otherwise specifically stated by MGS,
                                    are owned, controlled, or licensed by MGS or MGS's third-party partners. This includes
                                    past, present, and future versions of the materials as well as domain names, source and
                                    object code, text, site design, logos, graphics, and the selection, assembly, and
                                    arrangement of these materials (collectively, "MGS Content").
                                    <br>
                                    <span class="font-weight-bold"> b.</span> Permission to Use. THIS IS NOT A SALE, BUT A
                                    LICENSE. MGS grants Licensee a limited,
                                    non-exclusive, non-transferable, non-sublicensable license to <br>
                                    (i) View the MGS Content<br>
                                    (ii) Download the services <br>
                                    (iii) Use the Services exclusively for Licensee's
                                    internal use for the number of users for which the corresponding fee has been paid
                                    ("License") during the subscription period, subject to the terms and conditions of this
                                    Agreement and payment of the applicable license fees (the "Subscription Fee"). Licensee
                                    should get advice from MGS if they are unsure about how the Services are to be used. A
                                    license or subscription cannot be shared with another person. To stop unauthorized third
                                    parties from accessing or using the MGS Content or Services, MGS may set reasonable
                                    access restrictions.
                                    <br>
                                    <span class="font-weight-bold">c.</span> Time of Subscription. Depending on the
                                    subscription plan you choose, the Services'
                                    subscription period starts the day you buy them and lasts for 3, 6, 12, 18, or 24 months
                                    ("Subscription Period"). After the new subscription cost is paid, your subscription will
                                    automatically renew for an additional Subscription Period. For periods of renewal, MGS
                                    retains the right to modify the Subscription Fee. The same terms and conditions, which
                                    MGS may alter from time to time in compliance with Section 15(a) of this Agreement, will
                                    apply to each new Subscription Period.
                                </p>
                                <h5>3. Payment</h5>
                                <p>
                                    The MGS Content and Services are only accessible to subscribers who have paid for them
                                    or who have been granted access by a promotion (including a limited free trial). Unless
                                    they cancel the service, subscribers will automatically be charged the standard monthly
                                    amount at the conclusion of the trial period. Users may terminate their subscription at
                                    any moment by contacting support or using the cancel button within the app. Subscribers
                                    may continue to be billed for the current subscription term even after canceling. The
                                    content of the chosen bundle is included in the monthly subscription; there are no other
                                    costs. Packages or other content can be available for an additional fee. To continue
                                    using MGS, a current, valid credit card is required. For inquiries regarding prorated
                                    costs, billing, or refunds, please send an email to payments@merkaiixcelprep.com (MGS).

                                </p>
                                <h5>4. A Free Trial Membership</h5>
                                <p>
                                    For some Services, which require registration with a working payment card, we might
                                    provide free trials. If a user cancels before the trial expires, their subscription will
                                    automatically renew at the discounted cost. A free trial can be ended online or by
                                    getting in touch with MGS customer service. Per person, just one free trial is
                                    permitted. Free trials are not available for registrations made after that. In
                                    promotions that include both "paid" and "free" periods, unless otherwise specified, the
                                    paid period will end first. At our discretion, we may add new or extra features,
                                    services, or resources that are either priced differently from current memberships or
                                    included as part of them.

                                </p>
                                <h5>5. Licensee's Restrictions and Covenants</h5>
                                <p>
                                    <span class="font-weight-bold"> a.</span> To guarantee that MGS Content and Services
                                    are used exclusively by Licensee and in
                                    compliance with this Agreement, Licensee shall implement internal policies and
                                    procedures.
                                    <br>
                                    <span class="font-weight-bold"> b.</span> The Licensee may not, unless otherwise
                                    permitted herein, use, copy, modify,
                                    sell, sublicense, rent, lease, transfer, assign, resell, distribute, or in any other way
                                    disseminate the MGS Content or Services.
                                    - Permit any other party to access or utilize the MGS Services or Content in any way.
                                    - Feed another system with any portion of the MGS Content or Services.
                                    - Use software applications that carry out automatic downloading, copying, or printing
                                    to extract data or information.
                                    - Use data extraction software programs in connection with the MGS Content or Services.
                                    - In any manner alter, translate, reverse engineer, decompile, or disassemble the MGS
                                    Content or Services.
                                    - Eliminate any confidentiality, copyright, patent, trademark, and proprietary rights
                                    notices that may have been included in the MGS Content or Services.
                                    <br>
                                    <span class="font-weight-bold">c.</span> Only the Licensee is authorized to use the MGS
                                    Content or Services. No other
                                    person shall have the right to utilize, distribute, extract, export, or download any
                                    part of the MGS Content or Services under the terms of this Agreement. It is the
                                    licensee's responsibility to keep any usernames and passwords supplied by MGS secure and
                                    to stop third parties from using them without authorization.
                                    <br>
                                    <span class="font-weight-bold">d.</span> Whether for internal use only or for use by
                                    others, the licensee is prohibited
                                    from creating any software, resource, or product that has functionality comparable to
                                    that of the MGS Content or Services. Licensee agrees not to provide any of the MGS
                                    Content or Services for sale, license, or distribution to outside parties, nor may
                                    Licensee utilize any of the MGS Content or Services as part of any product that is
                                    offered for sale, license, or distribution.

                                </p>
                                <h5>6. Possession</h5>
                                <p>
                                    The Licensee agrees that MGS owns all copies, versions, and updates of the MGS Content
                                    and Services, as well as all rights, title, interest, and ownership in and to them. This
                                    Agreement only grants Licensee a restricted right of use in compliance with this
                                    Agreement; it does not provide Licensee title or ownership to the MGS Content or
                                    Services. There are no implicit licenses in this agreement. MGS retains all rights not
                                    specifically granted hereunder.

                                </p>
                                <h5> 7. User Submissions and Profile Information</h5>
                                <p>
                                    <span class="font-weight-bold"> a.</span> You grant MGS and our affiliates, licensees,
                                    distributors, agents, representatives,
                                    and other entities authorized by MGS the non-exclusive, worldwide, perpetual, unlimited,
                                    irrevocable, royalty-free, fully sublicensable, and fully transferable right to exercise
                                    any and all copyright, trademark, publicity, and database rights you may have in the
                                    content, in any media now known or in the future, as well as the right to use the User
                                    Generated Content, when you post, upload, embed, display, communicate, link to, email,
                                    or in any other way distribute or publish any review, suggestion, idea, solution,
                                    question, answer, feedback, comment, testimonial, and other material ("User Generated
                                    Content") to the MGS Website or application.
                                    <br>
                                    <span class="font-weight-bold"> b.</span> Your name, profile, and photo may be used by
                                    MGS to produce, assist, or display
                                    commercials, social media posts, or other promotional materials (collectively,
                                    "Marketing Materials"). By using the Services and interacting with MGS and third
                                    parties, including other users, you consent to MGS using your name and profile image in
                                    conjunction with Marketing Materials to advertise goods and services.
                                    <br>
                                    <span class="font-weight-bold"> c.</span> You grant MGS permission to use any ideas or
                                    concepts included in User Generated
                                    Content for any reason, including the development, production, and marketing of goods
                                    and services as well as the creation of educational articles, without having to pay you
                                    anything. You give MGS permission to publish your user-generated content online in a
                                    searchable format that is available to Service and Internet users. You give up all moral
                                    rights in any User Generated Content you provide, to the maximum degree allowed by law,
                                    even if it is changed in a way that you find objectionable. User Generated Content is
                                    not guaranteed to be hosted, displayed, or distributed by MGS, and we reserve the right
                                    to remove any content at our sole discretion. MGS retains the right to alter the User
                                    Generated Content in any way it deems appropriate, including format, size, and display
                                    specifications.
                                    <br>
                                    <span class="font-weight-bold"> d.</span> You affirm and guarantee that: (i) you are
                                    the owner of the User Generated Content
                                    that you have submitted, or that you are authorized to grant the licenses described in
                                    this section; and (ii) the posting of your User Generated Content does not infringe upon
                                    the rights of any person or entity with regard to privacy, publicity, copyrights,
                                    contracts, or other intellectual property. You will provide MGS with any records, proof,
                                    or releases required to confirm your adherence to this Agreement at MGS's request.
                                </p>
                                <h5>8. Updates automatically</h5>
                                <p>
                                    Licensee understands that MGS may need to adopt changes in order to maintain the
                                    accuracy and integrity of MGS Content and Services, and Licensee consents to receive
                                    such updates from MGS. MGS will try its best to lessen the impact of these changes. The
                                    licensee is not allowed to try to change or remove any of these updates.

                                </p>
                                <h5>9. Agreement Modifications</h5>
                                <p>
                                    MGS retains the right to alter, amend, add, or remove any part of this Agreement at any
                                    time, at its sole discretion. After updates are posted, Licensee's continuing use of the
                                    Services signifies Licensee's acceptance and agreement to the changes. MGS reserves the
                                    right to end this Agreement at any time and to stop offering the Services instantly.

                                </p>
                                <h5>10. Termination</h5>
                                <p>
                                    <span class="font-weight-bold"> a.</span> Until they are terminated, this Agreement and
                                    the license it grants are in effect. If
                                    Licensee violates any provision of this Agreement, MGS may immediately terminate this
                                    Agreement or suspend Licensee's access to the Services.
                                    <br>
                                    <span class="font-weight-bold">b.</span> Licensee shall promptly stop using the
                                    Services upon termination of this
                                    Agreement and return or destroy all MGS Content and Services, including any copies,
                                    extracts, and summaries. Sections 6, 7, 9, 10, 11, and 13 as well as any other clauses
                                    that are by their very nature meant to survive termination will survive the termination
                                    of this agreement.

                                </p>
                                  <h5> 11. Disclaimer of Warranties</h5>
                                <p>
                                    <span class="font-weight-bold"> a.</span> Warranty of any kind, express or implied,
                                    including without limitation any implied
                                    warranties of merchantability, fitness for a particular purpose, accuracy, completeness,
                                    or non-infringement, is provided with the services and any information, content, or
                                    materials contained therein, "as is" and "as available" basis with all faults in self.

                                    <br>
                                    <span class="font-weight-bold"> b.</span> MGS offers no guarantees that: (i) the
                                    services will fulfill your needs; (ii)
                                    the services will be timely, secure, error-free, and interruption-free; (iii) the
                                    results that can be obtained from using the services will be accurate or dependable;
                                    (iv) any errors in the services will be fixed; or (v) the services, or the server that
                                    makes them available, are free of viruses or other harmful components.
                                    <br>
                                    <span class="font-weight-bold"> c. </span> Abandon all risk relating to the services'
                                    quality and performance. you will
                                    be liable for the whole cost of any necessary servicing, repair, or correction should
                                    the services prove to be defective.
                                </p>
                                <h5>12. Limitation of Liability</h5>
                                <p>
                                    To the maximum extent permitted by applicable law, mgs and its affiliates, licensors,
                                    suppliers, advertisers, or sponsors shall not be liable for any direct, indirect,
                                    incidental, consequential, special, punitive, or exemplary damages, including damages
                                    for loss of profits, goodwill, use, data, or other intangible losses, arising out of or
                                    in connection with this agreement, the use or inability to use the services,
                                    unauthorized access to or alteration of your transmissions or data.

                                </p>
                               <h5> 13. Liability</h5>
                                <p>
                                    In the event that Licensee violates this Agreement or uses the Services in any way,
                                    Licensee agrees to indemnify, defend, and hold harmless MGS, its officers, directors,
                                    employees, agents, licensors, and suppliers from and against any and all claims, losses,
                                    expenses, damages, and costs, including reasonable attorneys' fees.

                                </p>
                                <h5> 14. Applicable Law and Location</h5>
                                <p>
                                    Without respect to its conflict of law provisions, the laws of the State of Florida
                                    shall govern and be construed in conformity with this Agreement. Any action or cause
                                    arising out of this agreement may only be brought in Florida's federal or state courts,
                                    and the parties agree to the personal jurisdiction and venue of such courts.

                                </p>
                                 <h5> 15. Miscellaneous</h5>
                                <p>
                                    <span class="font-weight-bold"> a.</span> Modification and Release. By updating the
                                    conditions on the Website, MGS reserves the
                                    right to change this Agreement at any time. Any modification to this agreement must be
                                    made in writing and signed by MGS for it to be effective.
                                    The ability to be severed. The remaining terms of this Agreement will still be in full
                                    force and effect even if any of them are found to be invalid or unenforceable.
                                    <br>
                                    <span class="font-weight-bold"> b. </span> Consent. All previous or contemporaneous
                                    oral or written communications and
                                    proposals between Licensee and MGS regarding the Services are superseded by this
                                    Agreement, which represents the entire agreement between the parties regarding the use
                                    of the Services.
                                    <br>
                                    <span class="font-weight-bold"> c.</span> Task. By operation of law or otherwise,
                                    licensee may not assign or transfer this
                                    Agreement or any of its rights or duties hereunder without MGS's prior written
                                    agreement. This Agreement may be assigned by MGS without prior notice at any time.
                                    <br>
                                    <span class="font-weight-bold"> d. </span> All notices under this agreement must be in
                                    writing, and they will be
                                    considered to have been sent on time if they are delivered in person; when they are
                                    electronically confirmed to have been sent by email or fax; or the day after they are
                                    sent if they are sent for next-day delivery via an established overnight delivery
                                    service.

                                </p>
                                 <h5> 16. Money-Back Promise </h5>
                                <p>
                                    We will reimburse your tuition if you are a graduate of a recognized nursing or
                                    healthcare career institution, and you did not pass your exam. The following qualifying
                                    requirements must be met by you:
                                    <span class="font-weight-bold"> a.</span> The warranty is only valid for the initial
                                    exam taken with the product.
                                    <br>
                                    <span class="font-weight-bold"> b.</span> The product needs to be purchased more than
                                    14 days before the exam date.
                                    <br>
                                    <span class="font-weight-bold"> c.</span> A thorough examination and completion of all
                                    the material.
                                    <br>
                                    <span class="font-weight-bold"> d. </span> to present your board letter and purchase
                                    receipt.

                                </p>
                                <br>
                                <h6 class="font-weight-bold">You accept this Agreement's terms by downloading, using, or
                                    accessing the Services.
                                    Please do not download, access, or use the Services if you disagree with the provisions
                                    of this Agreement.</h6>
                            </div>

                            <div class="tab-pane fade rounded bg-white p-3 p-lg-5 shadow mb-3" id="v-pills-cookies"
                                role="tabpanel" aria-labelledby="v-pills-cookies">

                                <h5 class="font-weight-bold text-center mb-md-4 mb-2">Merkaii Xcellence Prep Cookie Policy</h5>
                                <h5>What are Cookies and Tracking Technologies?</h5>
                                <p>We use cookies and similar tracking technologies to improve and analyze our service,
                                    Merkaii Xcellence Prep. This policy explains what cookies are and how we use them, your
                                    choices regarding cookies, and where you can find more information. These technologies
                                    track activity on our website and store certain information. Examples of tracking
                                    technologies include beacons, tags, and scripts.</p>
                                <h5>Types of Cookies We Use</h5>
                                <ul>
                                    <li>
                                        <span class="font-weight-bold"> Cookies or Browser Cookies:</span> Small data files
                                        stored on your device when
                                        you visit a
                                        website. They are widely used to remember You and Your preferences and track your
                                        activity on our website. You can instruct your browser to refuse all cookies or to
                                        indicate when a cookie is being sent. However, this may limit your ability to use
                                        some
                                        features of our service.
                                    </li>
                                    <li ><span class="font-weight-bold"> Web Beacons:</span> Tiny
                                        electronic files (also
                                        referred to as clear gifs,
                                        pixel tags, and
                                        single pixel gifs) embedded in our website and emails that track activity, like how
                                        many
                                        users visit those pages or open emails.</li>
                                </ul>
                                <h5> We use two main types of cookies</h5>
                                <ul>
                                    <li><span class="font-weight-bold"> Session Cookies:</span>
                                        These cookies are temporary
                                        and deleted as soon as you close your web
                                        browser.</li>
                                    <li><span class="font-weight-bold">Persistent Cookies:</span>
                                        These cookies remain on
                                        your personal computer or mobile device
                                        when you go offline until they expire, or you delete them.
                                    </li>
                                </ul>
                                <br>
                                <h5 class="font-weight-bold text-center mb-md-4 mb-2">Why We Use Cookies</h5>
                                <h5> We use cookies for several reasons, including:</h5>

                                <ul>
                                    <li> <span class="font-weight-bold">Necessary and Essential
                                            Cookies:</span> These cookies
                                        are
                                        essential for our website to
                                        provide you with our services and let you use some of their features, like
                                        authentication and security.
                                    </li>
                                    <li>
                                        <span class="font-weight-bold"> Cookies Policy and Notice Acceptance
                                            Cookies:</span>
                                        Remember if you've accepted our cookie
                                        policy.
                                    </li>
                                    <li>
                                        <span class="font-weight-bold">Functionality Cookies:</span> Remember your
                                        preferences,
                                        such as login details or language,
                                        to personalize your experience. This gives you a more customized experience by not
                                        having to re-enter your preferences each time you visit the website.
                                    </li>
                                    <li>
                                        <span class="font-weight-bold"> Tracking and Performance Cookies:</span> We use
                                        these
                                        third parties to track website traffic
                                        and user behavior to improve our website and your experience. This information may
                                        be
                                        used to identify you indirectly. We also test new website pages, features, or
                                        functions
                                        using these cookies to see how people respond to them.
                                    </li>
                                </ul>
                                <br>
                               <h5>Learn More About Your Cookie Choices</h5>
                                    <p>
                                    Most web browsers allow you to control cookies through their settings. You can usually
                                    choose to block all cookies, or to receive a notification before a cookie is set. Please
                                    be aware that completely blocking cookies may limit your use of some websites.

                                </p>
                                <br>
                                <h5> Where to Find More Information</h5>
                                   <p> For more detailed information about the cookies, we use and your choices regarding
                                    cookies, please see our Privacy Policy.</p>
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
                                <h5 class="font-weight-bold text-center">Merkaii Xcellence Prep: Your One-Stop Shop for Academic Success - Help & Support</h5>
                                <p>
                                    At Merkaii Xcellence Prep, we're dedicated to empowering students of all backgrounds to
                                    achieve their academic goals. We understand that you might have questions about our prep
                                    programs and courses, enrollment process, or billing.

                                </p>
                                <p> Merkaii Xcellence Prep is a comprehensive academic support platform designed to help
                                    students excel in their academic pursuits. We offer personalized tutoring, test prep
                                    courses, and academic coaching to healthcare adult learners at all levels.
                                </p>
                                <p> This Help & Support page is designed to be your one-stop resource for everything Merkaii
                                    Xcellence Prep.
                                </p>

                                <h5>Haven't Found What You're Looking For?</h5>
                                <p>
                                    If you can't find the answer to your question on this page, don't hesitate to reach out
                                    to our friendly and knowledgeable support team. We're available by phone, text, or email
                                    to assist you:
                                </p>
                                <ul>
                                    <li><span class="font-weight-bold">Phone:</span><a href="" class="text-dark"> 863-250-8764 </a>(Main Line + Text) </li>
                                    <li><span class="font-weight-bold"> Cell:</span> <a href="" class="text-dark">347-525-1736 </a>(Voice + Text)</li>
                                    <li><span class="font-weight-bold">Email:</span><a href="" class="text-dark"> mpsupport@merkaiixcelprep.com</a></li>
                                </ul>
                                <h5>For General Inquiries see our Frequently Asked Questions (FAQs) page </h5>
                                <p><span class="font-weight-bold">Billing & Payment: What are your payment options?</span>
                                    We accept all major credit cards and debit cards. You can also set up automatic payments
                                    for your convenience.</p>
                                <p><span class="font-weight-bold">Technical Support: I'm having trouble accessing my online
                                        account.</span> If you're having
                                    trouble accessing your online account, please ensure you are using the correct username
                                    and password. You can also try resetting your password by clicking on the "Forgot
                                    Password" link on the login page. If you continue to experience issues, please contact
                                    our support team. </p>

                                <h5>We're Here to Help!</h5>
                                <p>We hope this Help & Support page has answered your questions about Merkaii Xcellence
                                    Prep. If you have any further inquiries, please don't hesitate to reach out to our
                                    support team. We're always happy to help!</p>
                                <h5>In addition to the above, you may find the following resources helpful</h5>
                                <ul>
                                    <li><span class="font-weight-bold">Our Website:</span><a href="" class="text-dark"> www.merkaiixcelprep.com</a> </li>
                                    <li><span class="font-weight-bold">Our Blog:</span>
                                      <a href="" class="text-dark">  https://merkaiixcelprep.com/articles </a></li>
                                </ul>
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
        } else if (information == 'cookies settings') {

            $('#v-pills-cookies-tab').click();
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
                    $("#tab-8,#tab-9,#v-pills-home-tab,#v-pills-cookies-tab,#v-pills-profile-tab-1,#v-pills-messages-tab-2,#v-pills-settings-tab-3,#tab-4,#tab-5,#tab-6,#tab-7")
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
                    $tabsBox.animate({
                        scrollLeft: '-=340'
                    }, 'smooth');
                } else {
                    $tabsBox.animate({
                        scrollLeft: '+=340'
                    }, 'smooth');
                }
            });

            $tabsBox.on("scroll", function() {
                let maxScrollableWidth = this.scrollWidth - this.clientWidth;
                $(".eventsIcon:first-child").css('display', this.scrollLeft <= 0 ? "none" : "flex");
                $(".eventsIcon:last-child").css('display', maxScrollableWidth - this.scrollLeft <= 1 ?
                    "none" : "flex");
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
                $(".eventsIcon:last-child").css('display', maxScrollableWidth - $tabsBox[0].scrollLeft <= 1 ?
                    "none" : "flex");
            };
            handleEventsIcons();
        });
    </script>
    @include(theme('partials._custom_footer'))
@endsection
