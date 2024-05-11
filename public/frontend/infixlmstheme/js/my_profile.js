function readURL(input) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();



        reader.onload = function (e) {

            $('#previewTxt').hide();

            $('#imgPreview').show();

            $('#imgPreview').attr('src', e.target.result);

        }



        reader.readAsDataURL(input.files[0]); // convert to base64 string

    }

}

$('#select_country').select2();



// pofile_image.onchange = evt => {

//     console.log('text');

//     const [file] = pofile_image.files

//     if (file) {

//         show_profile_image.src = URL.createObjectURL(file)



//     }

// }





var _URL1 = window.URL || window.webkitURL;
$('#pofile_image').change(function () {
    $('#loading').css('display', 'block');
    console.log('image uploaded');
    var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
                var image_width = this.width;
                var image_height = this.height;
                if (!(image_width == 350 && image_height == 500)) {
                    $('#pofile_image').val('');
                    toastr.error(
                        'Wrong Image Dimensions, Please Select Image of 350 X 500 !',
                        'Error')
                        $('#loading').css('display', 'none');
                }
            };
            img.src = _URL1.createObjectURL(file);
        }
        if($(this).val() != ''){
            upload(this.files[0]);
        }
    
});





function upload(img) {

    var form_data = new FormData();

    var token=$("input[name=_token]").val();

    form_data.append('file', img);

    form_data.append('_token', token);

    var submit_url=$('#ajax-update-profile-image').val();

    var url=$('#url').val();

 

    $.ajax({

        url: submit_url,

        data: form_data,

        type: 'POST',

        contentType: false,

        processData: false,

        success: function (data) {
            if (data.status == 'error') {
                toastr.error(data.message);
            }else {
                
                $('#show_profile_image').attr('src',data.path);
                  $('.sidebar-profile').find('img').attr('src',data.path);
               
                // var header_image='background-image: url('+data.path+')';
                // $('.studentProfileThumb').attr('style',header_image);
            }

            $('#loading').css('display', 'none');
        },

        error: function (xhr, status, error) {

            alert(xhr.responseText);

            $('#show_profile_image').attr('src', url+'/public/demo/user/admin.jpg');

        }

    });

}



// $(document).ready(function (e) {

//     $.ajaxSetup({

//     headers: {

//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

//     }

//     });

//     pofile_image.onchange = evt => {

//         const [file] = pofile_image.files

//         if (file) {

//             show_profile_image.src = URL.createObjectURL(file)

//             var submit_url=document.getElementById('ajax-update-profile-image').value;

//             var pofile_image=document.getElementById('pofile_image');



//             var formData = new FormData(this);

//             var files = $('#pofile_image')[0].files;





//             console.log(pofile_image);



//             fd.append('file',files[0]);

//             $.ajax({

//                 type:'POST',

//                 url: submit_url,

//                 data: formData,

//                 cache:false,

//                 contentType: false,

//                 processData: false,

//                 success: (data) => {

//                 alert('File has been uploaded successfully');

//                 console.log(data);

//                 },

//                 error: function(data){

//                 console.log(data);

//                 }

//             });

//         }

//     };

//     });

