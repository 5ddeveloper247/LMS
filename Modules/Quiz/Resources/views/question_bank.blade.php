@extends('backend.master')
@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            @if (isset($bank))
                @if (permissionCheck('question-bank.store'))
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 col-md-12 mb-20 text-right">

                        </div>
                    </div>
                @endif
            @endif
            <div class="row">
                {{-- @dd($bank) --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">


                            @if (isset($bank))
                                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['question-bank-update', $bank->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'question_bank']) }}
                            @else
                                @if (permissionCheck('question-bank.store'))
                                    {{ Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'question-bank.store',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                        'id' => 'question_bank',
                                    ]) }}
                                @endif
                            @endif
                            <input type="hidden" name="url" id="url" value="{{ URL::to('/') }}">
                            <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 d-flex flex-column justify-content-between">

                                            <label class="primary_input_label" for="groupInput">{{ __('quiz.Group') }}
                                                *</label>
                                            <select {{ $errors->has('group') ? ' autofocus' : '' }}
                                                class="primary_select{{ $errors->has('group') ? ' is-invalid' : '' }}"
                                                name="group" id="groupInput">
                                                <option data-display="{{ __('common.Select') }} {{ __('quiz.Group') }} *"
                                                    value="">{{ __('common.Select') }} {{ __('quiz.Group') }}
                                                </option>
                                                @foreach ($groups as $group)
                                                    @if (isset($bank))
                                                        <option value="{{ $group->id }}"
                                                            {{ $group->id == $bank->q_group_id ? 'selected' : '' }}>
                                                            {{ $group->title }}</option>
                                                    @else
                                                        <option value="{{ $group->id }}"
                                                            {{ old('group') != '' ? (old('group') == $group->id ? 'selected' : '') : '' }}>
                                                            {{ $group->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-xl-4 col-md-6 mt-3 mt-md-0 d-flex flex-column justify-content-between">
                                            <label class="primary_input_label" for="category_id">{{ __('quiz.Category') }}
                                                *</label>
                                            <select {{ $errors->has('category') ? ' autofocus' : '' }}
                                                class="primary_select {{ $errors->has('category') ? ' is-invalid' : '' }}"
                                                id="category_id" name="category">
                                                <option data-display=" {{ __('quiz.Category') }} *" value="">
                                                    {{ __('quiz.Category') }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    @if (isset($bank))
                                                        <option value="{{ $category->id }}"
                                                            {{ $bank->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category') != '' ? (old('category') == $category->id ? 'selected' : '') : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-xl-4 mt-3 mt-xl-0 d-flex flex-column justify-content-between" id="subCategoryDiv">
                                            <label class="primary_input_label"
                                                for="subcategory_id">{{ __('quiz.Sub Category') }}</label>
                                            <select {{ $errors->has('sub_category') ? ' autofocus' : '' }}
                                                class="primary_select{{ $errors->has('sub_category') ? ' is-invalid' : '' }} select_section"
                                                id="subcategory_id" name="sub_category">
                                                <option
                                                    data-display=" {{ __('common.Select') }} {{ __('quiz.Sub Category') }}"
                                                    value="">{{ __('common.Select') }} {{ __('quiz.Sub Category') }}
                                                </option>

                                                @if (isset($bank))
                                                    <option value="{{ @$bank->subcategory_id }}" selected>
                                                        {{ @$bank->subCategory->name }}</option>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    {{-- <input type="hidden" name="question_type" value="M"> --}}
                                    <div class="row mt-25">
                                        <div class="col-xl-4 col-md-6 d-flex flex-column justify-content-between">
                                            <label class="primary_input_label"
                                                for="question-type">{{ __('quiz.Question Type') }} *</label>
                                            <select {{ $errors->has('question_type') ? ' autofocus' : '' }}
                                                class="primary_select{{ $errors->has('question_type') ? ' is-invalid' : '' }}"
                                                name="question_type" id="question-type">
                                                <option data-display="{{ __('quiz.Question Type') }} *" value="">
                                                    {{ __('quiz.Question Type') }} *
                                                </option>

                                                <option value="M"
                                                    {{ isset($bank) ? ($bank->type == 'M' ? 'selected' : '') : '' }}>
                                                    {{ __('quiz.Multiple Choice') }}</option>
                                                {{-- <option
                                                    value="S" {{isset($bank)? $bank->type == "S"? 'selected': '' : ''}}> {{__('quiz.Short Answer')}} </option>
                                                <option
                                                    value="L" {{isset($bank)? $bank->type == "L"? 'selected': '' : ''}}> {{__('quiz.Long Answer')}} </option> --}}
                                            </select>

                                        </div>
                                        <div class="col-xl-4 col-md-6 mt-3 mt-md-0 d-flex flex-column justify-content-between">
                                            {{-- <div class="input-effect"> --}}
                                                <label> {{ __('quiz.Marks') }} <span id="marks_required">*</span> </label>
                                                <input {{ $errors->has('marks') ? ' autofocus' : '' }}
                                                    class="primary_input_field name{{ $errors->has('marks') ? ' is-invalid' : '' }}"
                                                    type="number" name="marks" id="marks"
                                                    value="{{ isset($bank) ? $bank->marks : (old('marks') != '' ? old('marks') : '') }}">
                                                {{-- <span class="focus-border"></span> --}}

                                            {{-- </div> --}}
                                        </div>

                                        <div class="col-xl-4 mt-3 mt-xl-0 d-flex flex-column justify-content-between">
                                            {{-- <div class="input-effect "> --}}
                                                <label class="primary_input_label" for="">{{ __('quiz.Image') }}
                                                    (Recommended Dimensions: 300 X 300 - {{ __('common.Optional') }})</label>
                                                <div class="primary_file_uploader">
                                                    <input class="primary-input filePlaceholder placeholder_txt" type="text"
                                                        id="" value="{{ showPicName(@$bank->image) }}"
                                                        {{ $errors->has('image') ? 'autofocus' : '' }}
                                                        placeholder="{{ __('courses.Browse Image file') }}" readonly="">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg"
                                                            for="document_file_thumb_2">{{ __('common.Browse') }}</label>
                                                        <input type="file" class="d-none fileUpload" name="image"
                                                            id="document_file_thumb_2" accept="image/*">
                                                    </button>
                                                </div>
                                            {{-- </div> --}}
                                        </div>

                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="input-effect">
                                                <label> {{ __('quiz.Question') }} *</label>
                                                <textarea class="textArea custom_summernote {{ @$errors->has('details') ? ' is-invalid' : '' }}" cols="30"
                                                    rows="10" id="question" name="question">{{ isset($bank) ? $bank->question : (old('question') != '' ? old('question') : '') }}</textarea>

                                                <span class="focus-border textarea"></span>

                                            </div>
                                        </div>
                                    </div>


                                    @php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'M') {
                                                $multiple_choice = '';
                                            }
                                        } else {
                                            if ($bank->type == 'M' || old('question_type') == 'M') {
                                                $multiple_choice = '';
                                            }
                                        }
                                    @endphp
                                    <div class="multiple-choice"
                                        id="{{ isset($multiple_choice) ? $multiple_choice : 'multiple-choice' }}">
                                        <div class="row mt-25">
                                            <div class="col-lg-8">
                                                <div class="input-effect">
                                                    <label> {{ __('quiz.Number Of Options') }}*</label>
                                                    <input {{ $errors->has('number_of_option') ? ' autofocus' : '' }}
                                                        class="primary_input_field name{{ $errors->has('number_of_option') ? ' is-invalid' : '' }}"
                                                        type="number" name="number_of_option" id="number_of_option"
                                                        autocomplete="off" id="number_of_option"
                                                        value="{{ isset($bank) ? $bank->number_of_option : '' }}">
                                                    <span class="focus-border"></span>

                                                </div>
                                            </div>
                                            <div class="col-lg-2 mt-40">
                                                <button type="button" class="primary-btn small fix-gr-bg"
                                                    id="create-option">{{ __('quiz.Create') }} </button>
                                            </div>
                                        </div>


                                    </div>
                                    @php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'M') {
                                                $multiple_options = '';
                                            }
                                        } else {
                                            if ($bank->type == 'M' || old('question_type') == 'M') {
                                                $multiple_options = '';
                                            }
                                        }
                                    @endphp
                                    <div class="multiple-options questionBoxDiv"
                                        id="{{ isset($multiple_options) ? '' : 'multiple-options' }}">
                                        @php
                                            $i = 0;
                                            $multiple_options = [];
                                            
                                            if (isset($bank)) {
                                                if ($bank->type == 'M') {
                                                    $multiple_options = $bank->questionMuInSerial;
                                                }
                                            }
                                        @endphp
                                        @foreach ($multiple_options as $multiple_option)
                                            @php $i++; @endphp
                                            <div class='row mt-25'>
                                                <div class='col-lg-10'>
                                                    <div class='input-effect'>
                                                        <label> {{ __('quiz.Option') }} {{ $i }}</label>
                                                        <input class='primary_input_field name' type='text'
                                                            name='option[]' autocomplete='off' required
                                                            value="{{ $multiple_option->title }}">
                                                        <span class='focus-border'></span>
                                                    </div>
                                                </div>
                                                <div class='col-lg-2 mt-40'>
                                                    <label class="primary_checkbox d-flex mr-12"
                                                        for="option_check_{{ $i }}" {{ __('quiz.Yes') }}>
                                                        <input type="checkbox"
                                                            @if ($multiple_option->status == 1) checked @endif
                                                            id="option_check_{{ $i }}"
                                                            name="option_check_{{ $i }}" value="1">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'T') {
                                                $true_false = '';
                                            }
                                        } else {
                                            if ($bank->type == 'T' || old('question_type') == 'T') {
                                                $true_false = '';
                                            }
                                        }
                                    @endphp
                                    <div class="true-false" id="{{ isset($true_false) ? $true_false : 'true-false' }}">
                                        <div class="row mt-25">
                                            <div class="col-lg-12 d-flex">
                                                <p class="text-uppercase fw-500 mb-10"></p>
                                                <div class="d-flex radio-btn-flex">
                                                    <div class="mr-30">
                                                        <input type="radio" name="trueOrFalse" id="relationFather"
                                                            value="T" class="common-radio relationButton"
                                                            {{ isset($bank) ? ($bank->trueFalse == 'T' ? 'checked' : '') : 'checked' }}>
                                                        <label for="relationFather"> {{ __('quiz.True') }} </label>
                                                    </div>
                                                    <div class="mr-30">
                                                        <input type="radio" name="trueOrFalse" id="relationMother"
                                                            value="F" class="common-radio relationButton"
                                                            {{ isset($bank) ? ($bank->trueFalse == 'F' ? 'checked' : '') : '' }}>
                                                        <label for="relationMother">{{ __('quiz.False') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'F') {
                                                $fill_in = '';
                                            }
                                        } else {
                                            if ($bank->type == 'F' || old('question_type') == 'F') {
                                                $fill_in = '';
                                            }
                                        }
                                    @endphp

                                    <div class="multiple-choice"
                                        id="{{ isset($multiple_choice) ? $multiple_choice : 'multiple-choice' }}">
                                        <div class="row mt-25">
                                            <div class="col-lg-12">
                                                <div class="input-effect">
                                                    <label> {{ __('quiz.Explanation') }} *</label>
                                                    <textarea class="textArea custom_summernote {{ @$errors->has('details') ? ' is-invalid' : '' }}" cols="10"
                                                        rows="10" id="explanation" name="explanation">{{ isset($bank) ? $bank->explanation : (old('explanation') != '' ? old('explanation') : '') }}</textarea>

                                                    <span class="focus-border textarea"></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $tooltip = '';
                                        if (permissionCheck('question-bank.store')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    @endphp
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg questionSubmitBtn" data-toggle="tooltip"
                                                title="{{ $tooltip }}">
                                                <span class="ti-check"></span>
                                                @if (isset($bank))
                                                    {{ __('common.Update') }}
                                                @else
                                                    {{ __('common.Save') }}
                                                @endif
                                                {{ __('quiz.Question') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="modal fade admin-query" id="deleteBank">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('common.Delete') }} </h4>
                    <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('question-bank-delete') }}" method="post">
                        @csrf

                        <div class="text-center">

                            <h4>{{ __('common.Are you sure to delete ?') }} </h4>
                        </div>
                        <input type="hidden" name="id" value="" id="classQusId">
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ __('common.Cancel') }}</button>

                            <button class="primary-btn fix-gr-bg" type="submit">{{ __('common.Delete') }}</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Summer Note
            $('.custom_summernote').summernote({
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20'],
                codeviewFilter: true,
                codeviewIframeFilter: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']],
                ],
                height: 188,
                tooltip: true
            });
        });
        $(document).on("click", ".questionSubmitBtn", function(e) {
            e.preventDefault();
            let type = $('#question-type').val();
            if (type == 'M') {
                let div = $('.questionBoxDiv');
                let count = div.find('[type=checkbox]:checked').length;
                if (count < 1) {
                    toastr.error('{{ __('common.At least one correct answer is required') }} ',
                        '{{ __('common.Error') }}');
                } else {
                    $(this).closest('form').submit();
                }
            } else {
                $(this).closest('form').submit();
            }

        });

        $('#question-type').change(function(e) {
            var type = $('#question-type').val();

            if (type == "M") {
                $('.multiple-choice').show();
                $('.multiple-options').show();
            } else {
                $('.multiple-choice').hide();
                $('.multiple-options').hide();

            }

            if (type == "S") {
                $('#marks_required').hide();
            } else {
                $('#marks_required').show();
            }
        });
        $('#question-type').trigger('change')
    </script>
    <script>
        $(document).ready(function() {
            $("#question_bank").on("submit", function(event) {
                $('.preloader').show();
                var errors = [];
                let questionType = $("#question-type").val();

                if (isEmpty($("#groupInput").val())) {
                    errors.push('Choose Group first.');
                }
                if (isEmpty($("#category_id").val())) {
                    errors.push('Choose Category first.');
                }
                if (isEmpty(questionType)) {
                    errors.push('Choose Question Type first.');
                }

                if (isEmpty($("#marks").val())) {
                    errors.push('Enter Marks first.');
                }


                if (isEmptySummernote('#question')) {
                    errors.push('Enter Question first.');
                }

                if (questionType == 'M') {
                    if (isEmpty($("#number_of_option").val())) {
                        errors.push('Enter Number of Options first.');
                    }
                }

                if (questionType == 'M') {
                    if (isEmptySummernote('#explanation')) {
                        errors.push('Enter Explanation first.');
                    }
                }


                if (errors.length) {
                    console.log(errors);
                    setTimeout(function() {
                        $('.preloader').hide();
                        $('input[type="submit"]').attr('disabled', false);
                        $.each(errors.reverse(), function(index, item) {
                            toastr.error(item, '{{ __('common.Error') }}', 1000);
                        });
                    }, 3000)
                    return false;
                }


            });
        });
    </script>
    <script src="{{ asset('/') }}/Modules/CourseSetting/Resources/assets/js/course.js"></script>
@endpush
