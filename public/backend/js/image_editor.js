var cropper_1,
    $modal = $("#image-editor-modal-caller"),
    image_1 = document.getElementById("image-editor-image-1");
let current_uploader_1 = null,
    current_blob_1 = null,
    current_base64_1 = null,
    current_content_type_1 = null,
    current_file_1 = null;
function setCropper1() {
    cropper_1 = new Cropper(image_1, {
        dragMode: true,
        aspectRatio: 0.75,
        autoCropArea: 0.85,
        restore: false,
        guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        minContainerWidth: screen.width > 700 ? 400 : (screen.width * 60) / 100,
        minContainerHeight:
            screen.width > 700 ? 200 : (screen.width * 40) / 100,
        zoomable: !0,
    });
}
function destroyCropper1() {
    cropper_1.destroy();
}
function saveCropImage1() {
    $(".upload-editor-hidden-file-1").val(current_base64_1),
        $(".image-editor-preview-img-1").attr("src", current_base64_1),
        isEmpty1(cropper_1) || cropper_1.destroy(),
        (cropper_1 = null),
        $("#image-editor-save-button-1").hide(),
        $("#image-editor-modal-1").modal("hide");
        console.log(current_file_1);
}

function isEmpty1(e) {
    let t = !0;
    return (
        null != e && "null" != e && "undefined" != e && "" != e && (t = !1), t
    );
}

function imageEditorEdit1() {
    $(".upload-editor-1").trigger("change");
}
function imageEditorEditPost1() {
    $(".upload-editor_second").trigger("change");
}

$("body").on("change", ".upload-editor-1", function (e) {
    if (isEmpty1($(this).val())) $(".editor-edit-btn-1").hide();
    else {
        $(".editor-edit-btn-1").show(),
            $("#image-editor-save-button-1").hide(),
            $(".image-editor-preview-container-1").css(
                "background-image",
                "url(null)"
            ),
            $(".image-editor-preview-container-1").attr("src", null);
        var t = e.target.files;
        current_uploader_1 = $(this);
        var i,
            r,
            n = function (e) {
                (image_1.src = e), $("#image-editor-modal-caller").click();
            };
        t &&
            t.length > 0 &&
            ((r = t[0]),
            URL
                ? n(URL.createObjectURL(r))
                : FileReader &&
                  (((i = new FileReader()).onload = function (e) {
                      n(i.result);
                  }),
                  i.readAsDataURL(r)),
            setCropper1());
    }
}),
    $(".image-editor-cancel-button").click(function () {
        isEmpty1(cropper_1) || cropper_1.destroy(),
            (cropper_1 = null),
            $("#image-editor-save-button-1").hide(),
            // These elements are resetting from create marketplace section
            $(".upload-editor-1").val("");
    }),
    $("#image-editor-cancel-button-cancel").click(function () {}),
    $("#image-editor-crop-1").click(function () {
        $("#image-editor-save-button-1").show(),
            (canvas_1 = cropper_1.getCroppedCanvas({
                width: 500,
                height: 500,
                minContainerWidth: 500,
                minContainerHeight: 500,
            })),
            canvas_1.toBlob(function (e) {
                url = URL.createObjectURL(e);
                var t = new FileReader();
                t.readAsDataURL(e),
                    (t.onloadend = function () {
                        (current_base64_1 = this.result), (current_blob_1 = e);
                    });
            });
    });

// 2nd Cropper
var cropper_2,
    $modal = $("#image-editor-modal-caller"),
    image_2 = document.getElementById("image-editor-image-2");
let current_uploader_2 = null,
    current_blob_2 = null,
    current_base64_2 = null,
    current_content_type_2 = null,
    current_file_2 = null;
function setCropper2() {
    cropper_2 = new Cropper(image_2, {
        dragMode: true,
        aspectRatio: 0.75,
        autoCropArea: 0.85,
        restore: false,
        guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        minContainerWidth: screen.width > 700 ? 400 : (screen.width * 60) / 100,
        minContainerHeight:
            screen.width > 700 ? 200 : (screen.width * 40) / 100,
        zoomable: !0,
    });
}
function destroyCropper2() {
	setTimeout(function() {
		cropper_2.destroy();
	}, 500);
	
}
function saveCropImage2() {
    $(".upload-editor-hidden-file-2").val(current_base64_2),
        $(".image-editor-preview-img-2").attr("src", current_base64_2),
        isEmpty2(cropper_2) || cropper_2.destroy(),
        (cropper_2 = null),
        $("#image-editor-save-button-2").hide(),
        $("#image-editor-modal-2").modal("hide");
}

function isEmpty2(e) {
    let t = !0;
    return (
        null != e && "null" != e && "undefined" != e && "" != e && (t = !1), t
    );
}

function imageEditorEdit2() {
    $(".upload-editor-2").trigger("change");
}
function imageEditorEditPost2() {
    $(".upload-editor_second").trigger("change");
}

$("body").on("change", ".upload-editor-2", function (e) {
    if (isEmpty2($(this).val())) $(".editor-edit-btn-2").hide();
    else {
        $(".editor-edit-btn-2").show(),
            $("#image-editor-save-button-2").hide(),
            $(".image-editor-preview-container-2").css(
                "background-image",
                "url(null)"
            ),
            $(".image-editor-preview-container-2").attr("src", null);
        var t = e.target.files;
        current_uploader_2 = $(this);
        var i,
            r,
            n = function (e) {
                (image_2.src = e), $("#image-editor-modal-caller").click();
            };
        t &&
            t.length > 0 &&
            ((r = t[0]),
            URL
                ? n(URL.createObjectURL(r))
                : FileReader &&
                  (((i = new FileReader()).onload = function (e) {
                      n(i.result);
                  }),
                  i.readAsDataURL(r)),
            setCropper2());
    }
}),
    $(".image-editor-cancel-button").click(function () {
        isEmpty2(cropper_2) || cropper_2.destroy(),
            (cropper_2 = null),
            $("#image-editor-save-button-2").hide(),
            // These elements are resetting from create marketplace section
            $(".upload-editor-2").val("");
    }),
    $("#image-editor-cancel-button-cancel").click(function () {}),
    $("#image-editor-crop-2").click(function () {
        $("#image-editor-save-button-2").show(),
            (canvas_2 = cropper_2.getCroppedCanvas({
                width: 500,
                height: 500,
                minContainerWidth: 500,
                minContainerHeight: 500,
            })),
            canvas_2.toBlob(function (e) {
                url = URL.createObjectURL(e);
                var t = new FileReader();
                t.readAsDataURL(e),
                    (t.onloadend = function () {
                        (current_base64_2 = this.result), (current_blob_2 = e);
                    });
            });
    });

// 3rd Cropper

var cropper_3,
    $modal = $("#image-editor-modal-caller"),
    image_3 = document.getElementById("image-editor-image-3");
let current_uploader_3 = null,
    current_blob_3 = null,
    current_base64_3 = null,
    current_content_type_3 = null,
    current_file_3 = null;
function setCropper3() {
    cropper_3 = new Cropper(image_3, {
        dragMode: true,
        aspectRatio: 0.75,
        autoCropArea: 0.85,
        restore: false,
        guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        minContainerWidth: screen.width > 700 ? 400 : (screen.width * 60) / 100,
        minContainerHeight:
            screen.width > 700 ? 200 : (screen.width * 40) / 100,
        zoomable: !0,
    });
}
function destroyCropper3() {
    cropper_3.destroy();
    console.log("kkkkkkkkkkkkkk");
}
function saveCropImage3() {
    $(".upload-editor-hidden-file-3").val(current_base64_3),
        $(".image-editor-preview-img-3").attr("src", current_base64_3),
        isEmpty3(cropper_3) || cropper_3.destroy(),
        (cropper_3 = null),
        $("#image-editor-save-button-3").hide(),
        $("#image-editor-modal-3").modal("hide");
}

function isEmpty3(e) {
    let t = !0;
    return (
        null != e && "null" != e && "undefined" != e && "" != e && (t = !1), t
    );
}

function imageEditorEdit3() {
    $(".upload-editor-3").trigger("change");
}
function imageEditorEditPost3() {
    $(".upload-editor_second").trigger("change");
}

$("body").on("change", ".upload-editor-3", function (e) {
    if (isEmpty3($(this).val())) $(".editor-edit-btn-3").hide();
    else {
        $(".editor-edit-btn-3").show(),
            $("#image-editor-save-button-3").hide(),
            $(".image-editor-preview-container-3").css(
                "background-image",
                "url(null)"
            ),
            $(".image-editor-preview-container-3").attr("src", null);
        var t = e.target.files;
        current_uploader_3 = $(this);
        var i,
            r,
            n = function (e) {
                (image_3.src = e), $("#image-editor-modal-caller").click();
            };
        t &&
            t.length > 0 &&
            ((r = t[0]),
            URL
                ? n(URL.createObjectURL(r))
                : FileReader &&
                  (((i = new FileReader()).onload = function (e) {
                      n(i.result);
                  }),
                  i.readAsDataURL(r)),
            setCropper3());
    }
}),
    $(".image-editor-cancel-button").click(function () {
        isEmpty3(cropper_3) || cropper_3.destroy(),
            (cropper_3 = null),
            $("#image-editor-save-button-3").hide(),
            // These elements are resetting from create marketplace section
            $(".upload-editor-3").val("");
    }),
    $("#image-editor-cancel-button-cancel").click(function () {}),
    $("#image-editor-crop-3").click(function () {
        $("#image-editor-save-button-3").show(),
            (canvas_3 = cropper_3.getCroppedCanvas({
                width: 500,
                height: 500,
                minContainerWidth: 500,
                minContainerHeight: 500,
            })),
            canvas_3.toBlob(function (e) {
                url = URL.createObjectURL(e);
                var t = new FileReader();
                t.readAsDataURL(e),
                    (t.onloadend = function () {
                        (current_base64_3 = this.result), (current_blob_3 = e);
                    });
            });
    });

// 4th Cropper
var cropper_4,
    $modal = $("#image-editor-modal-caller"),
    image_4 = document.getElementById("image-editor-image-4");
let current_uploader_4 = null,
    current_blob_4 = null,
    current_base64_4 = null,
    current_content_type_4 = null,
    current_file_4 = null;
function setCropper4() {
    cropper_4 = new Cropper(image_4, {
        dragMode: true,
        aspectRatio: 0.75,
        autoCropArea: 0.85,
        restore: false,
        guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        minContainerWidth: screen.width > 700 ? 400 : (screen.width * 60) / 100,
        minContainerHeight:
            screen.width > 700 ? 200 : (screen.width * 40) / 100,
        zoomable: !0,
    });
}
function destroyCropper4() {
    cropper_4.destroy();
    console.log("kkkkkkkkkkkkkk");
}
function saveCropImage4() {
    $(".upload-editor-hidden-file-4").val(current_base64_4),
        $(".image-editor-preview-img-4").attr("src", current_base64_4),
        isEmpty4(cropper_4) || cropper_4.destroy(),
        (cropper_4 = null),
        $("#image-editor-save-button-4").hide(),
        $("#image-editor-modal-4").modal("hide");
}

function isEmpty4(e) {
    let t = !0;
    return (
        null != e && "null" != e && "undefined" != e && "" != e && (t = !1), t
    );
}

function imageEditorEdit4() {
    $(".upload-editor-4").trigger("change");
}
function imageEditorEditPost4() {
    $(".upload-editor_second").trigger("change");
}

$("body").on("change", ".upload-editor-4", function (e) {
    if (isEmpty4($(this).val())) $(".editor-edit-btn-4").hide();
    else {
        $(".editor-edit-btn-4").show(),
            $("#image-editor-save-button-4").hide(),
            $(".image-editor-preview-container-4").css(
                "background-image",
                "url(null)"
            ),
            $(".image-editor-preview-container-4").attr("src", null);
        var t = e.target.files;
        current_uploader_4 = $(this);
        var i,
            r,
            n = function (e) {
                (image_4.src = e), $("#image-editor-modal-caller").click();
            };
        t &&
            t.length > 0 &&
            ((r = t[0]),
            URL
                ? n(URL.createObjectURL(r))
                : FileReader &&
                  (((i = new FileReader()).onload = function (e) {
                      n(i.result);
                  }),
                  i.readAsDataURL(r)),
            setCropper4());
    }
}),
    $(".image-editor-cancel-button").click(function () {
        isEmpty4(cropper_4) || cropper_4.destroy(),
            (cropper_4 = null),
            $("#image-editor-save-button-4").hide(),
            // These elements are resetting from create marketplace section
            $(".upload-editor-4").val("");
    }),
    $("#image-editor-cancel-button-cancel").click(function () {}),
    $("#image-editor-crop-4").click(function () {
        $("#image-editor-save-button-4").show(),
            (canvas_4 = cropper_4.getCroppedCanvas({
                width: 500,
                height: 500,
                minContainerWidth: 500,
                minContainerHeight: 500,
            })),
            canvas_4.toBlob(function (e) {
                url = URL.createObjectURL(e);
                var t = new FileReader();
                t.readAsDataURL(e),
                    (t.onloadend = function () {
                        (current_base64_4 = this.result), (current_blob_4 = e);
                    });
            });
    });
