$(document).ready(function () {
    var base_url = $(".base_url").val();
    var csrf = $(".csrf_token").val();

    $(document).on("click", ".course_name", function (e) {
        let status = 0;
        if ($(this).prop("checked") == true) status = 1;
        let course_id = $(this).data("course");
        let lesson_id = $(this).data("lesson");
        $.ajax({
            url: base_url + "/lesson-complete",
            method: "POST",
            data: {
                status: status,
                course_id: course_id,
                lesson_id: lesson_id,
                _token: csrf,
            },

            success: function (result) {
                location.reload();
                $(".certificate_btn").hide();

                if (result.btn == 1) {
                    $(".certificate").show();
                } else {
                    $(".certificate").hide();
                }
            },
        });
    });
});

function goFullScreen(
    course_id,
    lesson_id,
    program_id = 'null',
    course_type = 'null'
) {
    var url = document.getElementById("url").value;
    if (program_id != 'null' && program_id > 0) {
        window.location.replace(
            url +
                "/fullscreen-view/" +
                course_id +
                "/" +
                lesson_id +
                "?program_id=" +
                program_id
        );
    } else if (course_type != 'null' && course_type > 0) {
        window.location.replace(
            url +
                "/fullscreen-view/" +
                course_id +
                "/" +
                lesson_id +
                "?courseType=" +
                course_type
        );
    } else {
        window.location.replace(
            url + "/fullscreen-view/" + course_id + "/" + lesson_id
        );
    }
}

function goQuizTest(current) {
    // let link = current.('url');
    window.location.href = current;
}
