@include(theme('partials._header'))
@include(theme('partials._menu'))
@extends(theme('auth.layouts.app'))

{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/b98cad50b5.js" crossorigin="anonymous"></script>

{{-- signature --}}
<script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@lemonadejs/signature/dist/index.min.js"></script>
@section('content')
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

        .preloader {

            display: none;
        }

        .btn_login {
            width: 135px;
            height: 38px;
            font-size: 16px;
            background: var(--system_primery_color);
            border-radius: 16px;
            font-family: Source Sans Pro, sans-serif;
            color: #fff;
            font-weight: 600;
            border: 1px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            /* line-height: 1; */
        }

        .btn_login:hover {
            color: var(--system_primery_color);
            background: transparent;
            border-color: var(--system_primery_color);
        }

        .text_reg {
            font-size: 30px;
            font-weight: 900;
            color: var(--system_secendory_color);
            line-height: 50px;
        }

        .heading-reg {
            line-height: 30px;
            color: var(--system_secendory_color);
        }

        .reg_img {
            /* min-height: 72vh; */
            max-width: 100%;
            width: 100%;
        }
        .reg_img img{
            height: 45%;
        }

        .larger-checkbox .form-check-input {
            width: 25px;
            height: 25px;
        }

        .larger-checkbox .form-check-label {
            margin-top: 0;
            font-size: 12px;
            text-align: justify;
        }

        .label-reg {
            font-size: 14px;
            font-weight: bold;
        }

        .login-span {
            cursor: pointer;
        }

        input.outside,
        input[class=outside],
        [type=password].outside {
            color: #555;
            width: 100%;
            font-size: 1rem;
            line-height: normal;
            border: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            margin-bottom: -1px;
            padding: .375rem 45px;
            -webkit-appearance: none;
            -moz-appearance: none;
            position: relative;
            z-index: 1;
            height: calc(1.5em + .75rem + 2px);
        }

        input:focus,
        select:focus {
            outline: 0 !important;
            color: #555 !important;
            border-color: #9e9e9e;
            z-index: 2
        }

        input:focus~.floating-label-outside input:not(:focus):valid~.floating-label-outside {
            top: 12px;
            left: 40px;
            font-size: 15px;
            opacity: 1;
            font-weight: 400
        }

        input:focus~.floating-label-outside,
        input:valid~.floating-label-outside {
            top: -10px;
            opacity: 1;
            font-size: 13px;
            color: #727272;
            background: #fff;
            padding: 0px 5px;
        }

        input:focus~.floating-label-outside,
        input:not(:focus):valid~.floating-label-outside {
            left: 40px
        }

        .form-control:focus {
            box-shadow: none !important;
            border-color: #ced4da;
        }

        .floating-label-outside {
            position: absolute;
            pointer-events: none;
            left: 60px;
            top: 12px;
            transition: .2s ease all;
            color: #777;
            font-weight: 500;
            font-size: 10px;
            letter-spacing: .5px;
            z-index: 3;
            text-transform: uppercase;
        }

        .input-icon-outside {
            position: absolute;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            height: 100%;
            top: 0.5px;
            left: 0.5px;
            z-index: 3;
            color: #fff;
            /* background-color: #e9ecef; */
            background: linear-gradient(0deg, rgb(255, 118, 25) 0%,rgb(153, 102, 153) 75%);
            padding: .4rem .75rem;
            display: flex;
            align-items: center;
            border-right: 1px solid #ced4da;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }


        .borderbottom {
            border-bottom: 1px solid black;
        }

        /* signature */
        .signature {
	border: 1px solid #ced4da;
	height: 155px;
	width: 100%;
    overflow: hidden;
}

#root {
	height: 100%;
	width: 100%;
}

canvas {
	/* width: 100%; */
	height: 100%;
}

.sign-btn {
	position: absolute;
	bottom: 1px;
	right: 6px;
}

.reset-btn,
.save-btn {
    background: var(--system_primery_color);
            border-radius: 5px;
            font-family: Source Sans Pro, sans-serif;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            padding: 6px 10px;
            border: 1px solid transparent;
            text-transform: capitalize;
            display: inline-block;
            line-height: 1;
            margin: 10px;
}
.reset-btn:hover,
.save-btn:hover {
    border-color: var(--system_primery_color);
            background: transparent;
    color: var(--system_primery_color) !important;
}
.reset-btn:focus,
.save-btn:focus {
    border-color: var(--system_primery_color);
            background: transparent;
    color: var(--system_primery_color) !important;
}
.date-btn{
    border: 0px;
    font-size: 12px;
    background-color: #e9ecef;
}
        /* timeline */
        .timeline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            height: 30px;
            position: relative;
            height: 30px;
        }

        .inside-line {
            background: #e9ecef;
            height: 2px;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
        }

        .dott {
            border-radius: 50%;
            padding: 7px;
            width: 40px;
            height: 40px;
            background-color: #ccc;
            color: #fff;
            z-index: 1;
            text-align: center;
        }

        .dott.active {

            background-color: var(--system_primery_color);
        }

        @media only screen and (max-width: 578px) {
            .btn_login {
                width: 92px;
                height: 38px;
                font-size: 12px;
                text-align: center;
            }

            h6,
            span,
            .form-group {
                font-size: 14px;
            }

        }

        @media only screen and (min-width: 769px) and (max-width: 1024px) {

            h6,
            span,
            .form-group,
            .btn_forget,
            .btn_login {
                font-size: 14px;
            }

         
        }

    </style>


    <div class="container px-xl-5">
        <div class="row my-4 my-lg-5 px-xl-5">
            <!-- Left side - Registration Form -->
            <div class="col-md-8">
                <h3 class="text-uppercase text-center text_reg">We are Merkaii Xcellence </h3>
                <h6 class="text-center mb-4 text-capitalize heading-reg">welcome to Merkaii Xcellence <br><span
                        class="font-weight-300">please fill the form below</span></h6>
                <div class="timeline">
                    <div class="inside-line"></div>

                    <div class="dott">1</div>
                    <div class="dott active">2 </div>
                    <div class="dott">3</div>
                    <div class="dott">4 </div>
                    {{-- <div class="dott">5</div> --}}
                    <div class="dott">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>

                <form action="{{ route('register.declarationp') }}" method="POST" id="regForm" enctype="multipart/form-data">
                    @csrf
                    <!-- widgetsform -->
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-row">
                        <div class="col-md-12 my-3">
                            <h6 class="mt-5">Enrollment Acknowledgment Declaration</h6>
                            <div id="first" class="form mb-5">
                                @if (count($errors))
                                    <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                        role="alert">
                                        <strong>Required!</strong> Please fill all fields.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                        role="alert">
                                        {{$error}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endforeach
                                @endif
                                @if ($errors->first('phone'))
                                    <div class="alert alert-danger alert-dismissible fade @if (count($errors)) show @endif"
                                        role="alert">
                                        @if ($errors->first('phone'))
                                            {{ $errors->first('phone') }}
                                        @endif
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="form-row ">

                        <div class="form-group col-md-12">
                            <p>I, the undersigned, solemnly declare that the information provided above is accurate,
                                acknowledging the potential consequences, such as perjury, for providing false
                                information. After carefully examining the Remediation Course Participant Handbook, I
                                accept its contents and agree to the terms mentioned below.<br><br>
                                To meet the standards set by the Florida Board of Nursing (BON), I understand that I
                                must complete a total of 96 clinical hours, which will include both Med-Surg and
                                Ambulatory care. These hours can be fulfilled either in a real hospital setting or
                                through simulated experiences. It is important to note that the duration of the clinical
                                simulation should not exceed 48 hours. If I want to obtain a license from the Florida
                                Board of Nursing while living outside of Florida, I understand that I must fulfill the
                                requirement of completing hours in person in Florida.<br><br>
                                Recognizing the extensive scope of this obligation, I acknowledge that fulfilling the
                                BON prerequisites entails not only completing clinical hours but also successfully
                                finishing 80 didactic hours, consistently submitting homework assignments, achieving
                                passing grades in all mandatory exams, and paying all specified fees. I will only be
                                eligible to get the Completion Letter for the Board of Nursing once these components are
                                successfully completed.<br><br>
                                It is important to understand that being able to participate in the RN Remediation
                                Course depends on individual merit and does not automatically ensure success on the
                                NCLEX-RN examination. After carefully examining the handbook and requesting
                                clarification for any questions, I confirm that I have taken proactive measures to
                                guarantee my comprehension before signing this agreement.<br><br>
                                Ultimately, I pledge to adhere to the specified criteria and prerequisites stated in
                                this document, fully comprehending the significance of this commitment and the
                                obligations it includes for achieving effective course fulfillment.</p>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4  @if ($errors->first('student_name')) is-invalid @endif">
                                <input type="text" class="outside form-control"name="student_name"
                                    value="{{ $userDeclaration['student_name'] ?? auth()->user()->name }}" required />
                                <span class="floating-label-outside">Student Name</span>
                                <i class="fa fa-user-o input-icon-outside"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="position-relative mt-4 @if ($errors->first('declare_date')) is-invalid @endif">
                                <input type="date" class="outside"name="declare_date"
                                    value="{{ $userDeclaration['declare_date'] ?? old('declare_date') }}" required />
                                <span class="floating-label-outside">
                                    Date</span>
                                <i class="far fa-calendar input-icon-outside"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                    <div class="d-flex justify-content-between">
                        <small class="mb-0 font-weight-bold">Please sign up the document and click 'Save' or Upload your signature.</small>
                        <span>Selected file: <small id="sign_filename" class="bg-dark px-2 text-white">No file chosen</small></span>
                    </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="signature">
                                <div id='root'></div>
                                <div class="" style="position: absolute; bottom: 0; padding: 5px;">
                                    <input class="date-btn" type="date" id="datepicker"
                                        value="{{date('Y-m-d')}}" />
                                </div>
                                <div class="sign-btn" style="position: absolute;">
                                    <input type="button" value="Reset" id="resetCanvas" class="reset-btn mx-1" />
                                    <input type="button" value="Save" id="saveImage" class="save-btn mx-1" />
                                </div>
                                <img id="signatureImage" class="image full-width" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                          
                            <input type="file" id="canvasFileInput" name="signature-img" required style="display:none">
                            <label for="canvasFileInput" class="btn btn_login w-100 mt-2 d-flex- justify-content-center align-items-center">Upload Signature</label>

                        </div>
                    </div>


                    <div class="text-center">
                        <button type="button" class="btn btn_login mt-4" id="back-button">Back Page</button>
                        <button type="submit" class="btn btn_login mt-4" id="next-button">Next Page</button>
                    </div>
                </form>

            </div>
            <!-- Right side - Image -->
            <div class="col-md-4">
                <div class="reg_img img-fluid h-100 d-none d-md-block">
                    <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class=" mb-4 w-100" alt="Placeholder Image">
                    <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg"
                        class="w-100 mb-4 " alt="Placeholder Image">
                    {{-- <img src="https://mchnursing.com/lms/public/uploads/main/images/03-10-2023/651ba7a5d35a5.jpeg" class="reg_img h-100" alt="placeholder Image"> --}}
                    <h6 class="text-uppercase mt-lg-2">student centered expert instructors learn anywhere community</h6>
                </div>


            </div>
        </div>
    </div>
    </div>
    @include(theme('partials._custom_footer'))
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2"></script> --}}
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}

    <script>
        document.getElementById("back-button").onclick = function() {

            window.location.href = "{{route('register')}}";
        };
        // document.getElementById("next-button").onclick = function () {

        //     window.location.href = "reg4.html";
        // };
    </script>

    <!-- signature -->
    <script>
        $('#canvasFileInput').on('change',function(){
            if (this.files.length > 0) {
                var file = $('#canvasFileInput')[0].files[0].name;
                $('#sign_filename').text(file);
            }else{
                $('#sign_filename').text('No file chosen');
            }
        });

        function base64ToBlob(base64URL) {
            var parts = base64URL.split(';base64,');
            var contentType = parts[0].split(':')[1];
            var raw = window.atob(parts[1]);
            var rawLength = raw.length;
            var uInt8Array = new Uint8Array(rawLength);

            for (var i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uInt8Array], { type: contentType });
        }

        // Function to set the file input field's value with a Blob
        function setFileInputFromBase64(base64URL) {
            var blob = base64ToBlob(base64URL);
            var file = new File([blob], "signature.png", { type: blob.type });

            var fileInput = document.getElementById('canvasFileInput');
            //var previewImage = document.getElementById('previewImage');

            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);

            fileInput.files = dataTransfer.files;
            // Create a new 'change' event
            var event = new Event('change');

            // Dispatch it.
            fileInput.dispatchEvent(event);
            // Display the image preview
            //previewImage.src = base64URL;
        }

        // Signature
        const root = document.getElementById("root");
        const resetCanvas = document.getElementById("resetCanvas");
        const saveImage = document.getElementById("saveImage");
        const signatureImage = document.getElementById("signatureImage");
    
        const component = Signature(root, {
            width: 1200,
            height: 150,
        });
    
        resetCanvas.addEventListener("click", () => {
            component.value = [];
        });
    
        // saveImage.addEventListener("click", () => {
        //     signatureImage.src = component.getImage();
        // });
    
        const today = new Date().toISOString().split('T')[0];
        datepicker.min = today;
        datepicker.max = today;
    
        // Canvas Image Saving
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
    
        saveImage.addEventListener("click", () => {
            const dataURL = component.getImage();
            // const dataURL = canvas.toDataURL("image/png");
            const a = document.createElement("a");
            a.href = dataURL;
            a.download = "signature.png";
            a.click();
            setFileInputFromBase64(dataURL);
        });
    
        window.addEventListener('resize', updateCanvasWidth);
    </script>
@endsection
