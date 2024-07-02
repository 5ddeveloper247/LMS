@extends('backend.master')

@section('table')
    @php
        $table_name='requirement_slides';
    @endphp
    {{$table_name}}
@stop
@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header">
                                <div class="main-title d-md-flex mb-0">
                                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"> @if(!isset($tab))
                                            {{__('frontendmanage.Add New Slider') }}
                                        @else
                                            {{__('common.Update')}}
                                        @endif</h3>
                                    @if(isset($tab))

                                        <a href="{{route('frontend.resource_center.create')}}"
                                           class="primary-btn small fix-gr-bg ml-3 "
                                           title="{{__('coupons.Add')}}">Add New</a>

                                    @endif
                                    <a href="{{route('frontend.resource_center.index')}}"
                                           class="primary-btn small fix-gr-bg ml-3 "
                                           style="position: absolute;  right: 0;   margin-right: 15px;"
                                           title="{{__('coupons.Add Resource Tab')}}">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white-box ">
                        @if (isset($tab))
                            <form action="{{route('frontend.resource_center.update')}}" method="POST" id="coupon-form"
                                  name="coupon-form"
                                  enctype="multipart/form-data">@csrf
                                <input type="hidden" name="id" value="{{$tab->id}}">
                                @else
                                    <form action="{{route('frontend.resource_center.store') }}" method="POST"
                                          id="coupon-form"
                                          name="coupon-form" enctype="multipart/form-data">

                                        @endif
                                        @csrf
                                        <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for=""> Tab {{ __('common.Title') }}</label>
                                                        <input name="name" id="name"
                                                               class="primary_input_field name {{ @$errors->has('name') ? ' is-invalid' : '' }}"
                                                               placeholder="{{ __('frontendmanage.Title') }}"
                                                               type="text"
                                                               value="{{isset($tab)?$tab->name:old('name')}}" {{$errors->has('name') ? 'autofocus' : ''}}>
                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-xl-12">
                                                    <div class="primary_input mb-25">
                                                        <label class="primary_input_label"
                                                               for="">{{ __('Tab Content') }}</label>
                                                        <textarea name="content" id="content"
                                                               class="primary_input_field name custom_summernote {{ @$errors->has('content') ? ' is-invalid' : '' }}"
                                                               >{{(isset($tab) && $tab->content != null)?$tab->content:old('content')}}</textarea>
                                                        @if ($errors->has('content'))
                                                            <span class="invalid-feedback d-block mb-10"
                                                                  role="alert">
                                                            <strong>{{ @$errors->first('content') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            <div class="col-lg-12 text-center">
                                                <div class="d-flex justify-content-center pt_20">
                                                    <button type="submit" class="primary-btn semi_large fix-gr-bg"
                                                            id="save_button_parent">
                                                        <i class="ti-check"></i>
                                                        @if(!isset($tab))
                                                            {{ __('common.Save') }}
                                                        @else
                                                            {{ __('common.Update') }}
                                                        @endif
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
<script>
    $('.custom_summernote').each(function (){
                var elId = $(this).attr('id');
                ClassicEditor
                .create( document.getElementById(elId),{
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload',['_token' => csrf_token()]) }}",
                    },
                mediaEmbed : {
                    previewsInData: true,
                    removeProviders: [ 'instagram', 'twitter', 'googleMaps', 'flickr', 'facebook' ],
                },
                toolbar: {
			items: [
				'heading',
				'|',
				'bold',
				'italic',
				'link',
				'bulletedList',
				'numberedList',
				'|',
				'blockQuote',
				'fontFamily',
				'fontSize',
				'fontColor',
				'alignment',
				'outdent',
				'indent',
				'|',
				'insertTable',
				'imageInsert',
			//	'imageUpload',
				'mediaEmbed',
			//	'CKFinder',
			//	'codeBlock',
				'|',
				'undo',
				'redo'
			]
		},
		language: 'en',
		image: {
			toolbar: [
				'imageTextAlternative',
				'toggleImageCaption',
				'imageStyle:inline',
				'imageStyle:block',
				'imageStyle:side'
			],
            insert: {
                // This is the default configuration, you do not need to provide
                // this configuration key if the list content and order reflects your needs.
                integrations: [ 'upload', 'url' ]
            }
		},
		table: {
			contentToolbar: [
				'tableColumn',
				'tableRow',
				'mergeTableCells'
			]
		}
                } )
                .then(editor => {
                    // Save the editor instance to use it later
                    window.editor = editor;

                    // Listen to the change:data event
                    editor.model.document.on('change:data', () => {
                        // Get the editor content
                        const editorData = editor.getData();
                        // Update the textarea with the editor content
                        // document.querySelector('#editor').value = editorData;
                        $(this).val(editorData);
                    });
                })
                .catch( error => {
                    console.error( error );
                });
            });
</script>
@endpush