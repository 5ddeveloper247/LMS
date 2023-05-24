<div data-type="component-text"
     data-preview="{{!function_exists('themeAsset')?'':themeAsset('img/snippets/preview/contact/contact_page_section.jpg')}}"
     data-aoraeditor-title="Quiz Page Section"
     data-aoraeditor-categories="Quiz Page"
>

    <input type="hidden" class="class_route" name="quiz_route" value="{{route('quizzes')}}">
    <div class="courses_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    @include(theme('snippets.components._sidebar'))
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div data-type="component-nonExisting"
                         data-preview=""
                         data-table=""
                         data-select=""
                         data-order=""
                         data-limit=""
                         data-where-type="2"
                         data-where-status="1"
                         data-pagination="12"
                         data-view="_single_topic"
                         data-model="Modules\CourseSetting\Entities\Course"
                         data-with=""
                         data-request="type,language_id,level,category_id,order,search"
                    >
                        <div class="dynamicData"
                             data-dynamic-href="{{routeIsExist('getDynamicData')?route('getDynamicData'):''}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
