

                    {{ Form::open(['class' => 'form-horizontal','id' => 'addChapter_from', 'files' => true, 'route' => 'saveChapter',

                    'method' => 'POST', 'enctype' => 'multipart/form-data']) }}



                    <input type="hidden" id="url" value="{{url('/')}}">

                    <input type="hidden" name="course_id" value="{{@$course->id}}">

                    <input type="hidden" name="input_type" value="1">

                    <input type="hidden" name="is_lock" value="1">

                    <div class="section-white-box">

                        <div class="add-visitor">

                            <div class="input-effect mt-2 pt-1 mb-20">

                                <label>{{__('quiz.Chapter')}} {{__('common.Name')}}

                                    <span>*</span><small>(Max: 150 characters)</small></label>

                                <input

                                    class="primary_input_field name{{ $errors->has('chapter_name') ? ' is-invalid' : '' }}"

                                    type="text" name="chapter_name" placeholder="Title" id="addchapter_name"

                                    autocomplete="off"

                                    value="" maxlength="150" required>

                                <span class="focus-border"></span>

                                @if ($errors->has('chapter_name'))

                                    <span class="invalid-feedback" role="alert">

                                <strong>{{ $errors->first('chapter_name') }}</strong>

                            </span>

                                @endif

                            </div>

                            <div class="row mt-40" style="visibility: hidden">

                                <div class="col-lg-12 text-center">

                                    <button type="submit" class="primary-btn fix-gr-bg"

                                            data-toggle="tooltip">

                                        <span class="ti-check"></span>

                                        {{__('common.Save')}}

                                    </button>

                                </div>

                            </div>

                            <div class="row mt-40">

                                <div class="col-lg-12 text-center">

                                    <button type="button" class="primary-btn fix-gr-bg"

                                            data-toggle="tooltip" onclick="chapter_add_form();">

                                        <span class="ti-check"></span>

                                        {{__('common.Save')}}

                                    </button>

                                </div>

                            </div>



                        </div>

                    </div>

                {{ Form::close() }}



<script>

    function chapter_add_form(){
    	$('.preloader').show();
        var errors = [];

        isUnique(
            {
                columns: [
                    ['chapters', 'name', $('#addchapter_name').val()]
                ]
            }
            , function (res) {
                errors = [...res.errors]

				if (isEmpty($('#addchapter_name').val())) {
                    errors.push('Chapter Name is required');
                }
                

                if (errors.length) {
                    console.log(errors);
                        $('.preloader').hide();
                        $('input[type="submit"]').attr('disabled', false);
                        $.each(errors.reverse(), function (index, item) {
                            toastr.error(item, 'Error', 1000);
                        });
                    return false;
                }
                $('#addChapter_from').submit();
            });
   	}

    function lesson_inside_form(button){
    	$('.preloader').show();
        var errors = [];
        var lessonId = '{{isset($editLesson) ? $editLesson->id : ''}}';
        
        var form = $(button).closest("form");
        var chapterId = form.find('input[name="chapter_id"]').val();
        console.log(chapterId)
       	isUnique(
            {
                columns: [
                    ['lessons', 'name', form.find("input[name='name']").val(), '{{isset($editLesson) ? $editLesson->id : ''}}']
                ]
            }
            , function (res) {
                errors = [...res.errors]

				if (isEmpty(form.find("input[name='name']").val())) {
                    errors.push('Lesson Name is required.');
                }
                if (isEmpty(form.find("select[name='host']").val())) {
                    errors.push('Choose Host first.');
                }
                console.log(lessonId);
                if(lessonId == ''){
                	var host = form.find("select[name='host']").val();
                    if(host == 'Self' || host == 'GoogleDrive'|| host == 'Zip'|| host == 'Text' || 
                    	host == 'PowerPoint'|| host == 'Excel'|| host == 'Word'|| host == 'PDF' || 
                    	host == 'Image'){
                            // let fileInput = form.find('.filepond--browser');
                            let fileInput = form.find("#hostFile"+chapterId);
                            var pondInstance = FilePond.find(fileInput[0]);
                            if (pondInstance.getFiles().length == 0) {
                                errors.push("Host file is required");
                            }
                        }
                    }
                    if(host == 'Youtube' || host == 'URL'){

                    	if (isEmpty(form.find("input[name='video_url']").val())) {
                            errors.push("URL is required");
                        }
//                         if(form.find("input[name='video_url']").val() != ''){
//                         	var isUrl = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w.-]*)*\/?$/.test(form.find("input[name='video_url']").val());
//                         	if(!isUrl){
//                         		errors.push('Enter valid url.');
//                            	}
//                        	}
                  	}

                    if(host == 'VdoCipher'){
                    	if (isEmpty(form.find("input[name='vdocipher']").val())) {
                            errors.push("Choose host video first.");
                        }
                	}
            //    }

                if (isEmpty(form.find("select[id='is_lock']").val())) {
                    errors.push('Choose Privacy first.');
                }
                

                if (errors.length) {
                        $('.preloader').hide();
                        $('input[type="submit"]').attr('disabled', false);
                        $.each(errors.reverse(), function (index, item) {
                            toastr.error(item, 'Error', 1000);
                        });
                    return false;
                }
                form.submit();
            });
   	}
</script>











