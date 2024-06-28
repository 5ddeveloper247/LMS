$(document).ready(function () {
    // $("#category_id").on("change", function () {
    //     var url = $("#url").val();
    //     var lang =window._locale;

    //     var formData = {
    //         id: $(this).val(),
    //     };
    //     // get section for student
    //     $.ajax({
    //         type: "GET",
    //         data: formData,
    //         dataType: "json",
    //         url: url + "/" + "admin/course/ajaxGetCourseSubCategory",
    //         success: function (data) {
    //             // console.log('ttttt');
    //             var a = "";
    //             // $.loading.onAjax({img:'loading.gif'});
    //             $.each(data, function (i, item) {
    //                 if (item.length) {
    //                     $("#subcategory_id").find("option").not(":first").remove();
    //                     $("#subCategoryDiv ul").find("li").not(":first").remove();

    //                     $.each(item, function (i, section) {
    //                         $("#subcategory_id").append(
    //                             $("<option>", {
    //                                 value: section.id,
    //                                 text: section.name[lang],
    //                             })
    //                         );

    //                         $("#subCategoryDiv ul").append(
    //                             "<li data-value='" +
    //                             section.id +
    //                             "' class='option'>" +
    //                             section.name[lang] +
    //                             "</li>"
    //                         );
    //                     });
    //                 } else {
    //                     $("#subCategoryDiv .current").html("Subcategory");
    //                     $("#subcategory_id").find("option").not(":first").remove();
    //                     $("#subCategoryDiv ul").find("li").not(":first").remove();
    //                 }
    //             });

    //         },
    //         error: function (data) {
    //             console.log("Error:", data);
    //         },
    //     });
    // });

        var url = $("#url").val();
        $("#category_id").on("change", function () {
        var lang =window._locale;
        var url = $("#url").val();
        console.log(url);

        var formData = {
            id: $(this).val(),
        };
        // get section for student
        $.ajax({
            type: "GET",
            data: formData,
            dataType: "json",
            url: url + "/" + "admin/course/ajaxGetCourseSubCategory",
            success: function (data) {
                console.log(data);
                var a = "";
                // $.loading.onAjax({img:'loading.gif'});
                $.each(data, function (i, item) {
                    if (item.length) {
                        $("#subcategory_id").find("option").not(":first").remove();
                        $("#subCategoryDiv ul").find("li").not(":first").remove();

                        $.each(item, function (i, section) {
                            $("#subcategory_id").append(
                                $("<option>", {
                                    value: section.id,
                                    text: section.name[lang],
                                })
                            );

                            $("#subCategoryDiv ul").append(
                                "<li data-value='" +
                                section.id +
                                "' class='option'>" +
                                section.name[lang] +
                                "</li>"
                            );
                        });
                    } else {
                        $("#subCategoryDiv .current").html("Select Sub Category");
                        $("#subcategory_id").find("option").not(":first").remove();
                        $("#subCategoryDiv ul").find("li").not(":first").remove();
                    }
                });
                // console.log(a);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    // $("#subcategory_id").on("change", function () {
    //     var url = $("#url").val();
    //     var lang = window._locale;
    //     var formData = {
    //         category_id: $('#category_id').val(),
    //         subcategory_id: $(this).val(),
    //     };

    //     $.ajax({
    //         type: "POST",
    //         data: formData,
    //         dataType: "json",
    //         url: url + "coupons/" + "ajaxGetCourseList",
    //         success: function (data) {
    //             console.log(data);
    //             $.each(data, function (i, item) {
                    
    //                 if (item.length) {
    //                     $("#course_id").find("option").not(":first").remove();
    //                     $("#CourseDiv ul").find("li").not(":first").remove();

    //                     $.each(item, function (i, course) {
    //                         $("#course_id").append(
    //                             $("<option>", {
    //                                 value: course.id,
    //                                 text: course.title2,
    //                             })
    //                         );
    //                         $("#CourseDiv ul").append("<li data-value='" + course.id + "' class='option'>" + course.title2 + "</li>");
    //                     });
    //                 } else {
    //                     $("#CourseDiv .current").html("Select A Course *");
    //                     $("#course_id").find("option").not(":first").remove();
    //                     $("#CourseDiv ul").find("li").not(":first").remove();
    //                 }
    //             });
    //             // console.log(a);
    //         },
    //         error: function (data) {
    //             console.log("Error:", data);
    //         },
    //     });
    // });


    $("#category_id, #subcategory_id").on("change", function () {
        var url = $("#url").val();

        var formData = {
            category_id: $('#category_id').val(),
            subcategory_id: $('#subcategory_id').val(),
        };

        $.ajax({
            type: "POST",
            data: formData,
            dataType: "json",
            url: url + "/coupons/" + "ajaxGetCourseList",
            success: function (data) {
                $.each(data, function (i, item) {
                    if (item.length) {
                        $("#course_id").find("option").not(":first").remove();
                        $("#CourseDiv ul").find("li").not(":first").remove();

                        $.each(item, function (i, course) {
                            let courseType = '';
                            switch (course.type) {
                                case '2':
                                    courseType = '(Big Quiz)';
                                    break;
                                case '3':
                                    courseType = '(Individual Course)';
                                    break;
                                case '4':
                                    courseType = '(Full Course)';
                                    break;
                                case '5':
                                    courseType = '(Prep-Course (On-Demand))';
                                    break;
                                case '6':
                                    courseType = '(Prep-Course (Live))';
                                    break;
                                case '8':
                                    courseType = '(Repeat Course)';
                                    break;
                                case '9':
                                    courseType = '(Tutor Course)';
                                    break;
                            
                                default:
                                    courseType = '';
                                    break;
                            }
                            $("#course_id").append(
                                $("<option>", {
                                    value: course.id,
                                    text: course.title2 + ' ' + courseType,
                                })
                            );
                            $("#CourseDiv ul").append("<li data-value='" + course.id + "' class='option'>" + course.title2 + ' ' + courseType + "</li>");
                        });
                    } else {
                        $("#CourseDiv .current").html("Select A Course *");
                        $("#course_id").find("option").not(":first").remove();
                        $("#CourseDiv ul").find("li").not(":first").remove();
                    }
                });

            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });
});

$(document).ready(function () {
    $('#course_2').change(function () {
        if (this.checked)

            $('#price_div').fadeOut('slow');
        else
            $('#price_div').fadeIn('slow');
    });

});
$(document).ready(function () {
    $('#course_3').change(function () {
        if (this.checked)
            $('#discount_price_div').fadeIn('slow');
        else
            $('#discount_price_div').fadeOut('slow');
    });
});
