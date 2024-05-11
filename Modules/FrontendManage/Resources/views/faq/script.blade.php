<script>
    $(document).ready(function() {
        var form_add = $('#faqs_add_form');
        $(form_add).submit(function(event) {

            $('.preloader').show();
            var errors = [];

            if (isEmpty(form_add.find('input[name="question[en]"]').val())) {
                errors.push('Question is required!');
            }

            if (isEmptySummernote(form_add.find('textarea[name="answer[en]"]'))) {
                errors.push('Answer is required!');
            }

            if(errors.length){
                console.log(errors);
                setTimeout(function (){
                    $('.preloader').hide();
                    $('#save_button_parent').attr('disabled', false);
                    $.each(errors.reverse(), function(index, item) {
                        toastr.error(item, 'Error', 1000);
                    });
                },3000)
                return false;
            }
        });


        var form_update= $('#faqs_update_form');
        $(form_update).submit(function(event) {

            $('.preloader').show();
            var errors = [];

            if (isEmpty(form_update.find('input[name="question[en]"]').val())) {
                errors.push('Question is required!');
            }

            if (isEmptySummernote(form_update.find('textarea[name="answer[en]"]'))) {
                errors.push('Answer is required!');
            }

            if(errors.length){
                console.log(errors);
                setTimeout(function (){
                    $('.preloader').hide();
                    $('#update_button_parent').attr('disabled', false);
                    $.each(errors.reverse(), function(index, item) {
                        toastr.error(item, 'Error', 1000);
                    });
                },3000)
                return false;
            }
        });
    });
</script>

<script>
    if ($.fn.DataTable.isDataTable('#faq_table')) {
        $('#faq_table').DataTable().destroy();
    }
    let table = $('#faq_table').DataTable({
        bLengthChange: true,
        "bDestroy": true,
        "lengthChange": true,
        "lengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        // order: [
        //     [0, "desc"]
        // ],
        language: {
            emptyTable: "{{ __('common.No data available in the table') }}",
            search: "<i class='ti-search'></i>",
            searchPlaceholder: '{{ __('common.Quick Search') }}',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        dom: 'Blfrtip',
        buttons: [{
                extend: 'copyHtml5',
                text: '<i class="far fa-copy"></i>',
                title: $("#logo_title").val(),
                titleAttr: '{{ __('common.Copy') }}',
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="far fa-file-excel"></i>',
                titleAttr: '{{ __('common.Excel') }}',
                title: $("#logo_title").val(),
                margin: [10, 10, 10, 0],
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                },

            },
            {
                extend: 'csvHtml5',
                text: '<i class="far fa-file-alt"></i>',
                titleAttr: '{{ __('common.CSV') }}',
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="far fa-file-pdf"></i>',
                title: $("#logo_title").val(),
                titleAttr: '{{ __('common.PDF') }}',
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                },
                orientation: 'landscape',
                pageSize: 'A4',
                margin: [0, 0, 0, 12],
                alignment: 'center',
                header: true,
                customize: function(doc) {
                    doc.content[1].table.widths =
                        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }

            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: '{{ __('common.Print') }}',
                title: $("#logo_title").val(),
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-columns"></i>',
                postfixButtons: ['colvisRestore']
            }
        ],
        columnDefs: [{
                visible: false
            },
            {
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 1,
                targets: 2
            },
            {
                responsivePriority: 1,
                targets: -1
            },
            {
                responsivePriority: 2,
                targets: -2
            },
        ],
        responsive: true,
    });

    (function($) {
        "use strict";



        $(document).on('click', '.editfaq', function() {
            let faq = $(this).data('item');
            $('#faqId').val(faq.id);
            @foreach ($LanguageList as $key => $language)
                $('#editQuestion{{ $language->code }}').val(faq.question.{{ $language->code }});
                $('#editAnswer{{ $language->code }}').summernote("code", faq.answer
                .{{ $language->code }});
            @endforeach
            $('#editOrder').val(faq.order);

            $("#editfaq").modal('show');

        });


        $(document).on('click', '.deletefaq', function() {
            let id = $(this).data('id');
            $('#faqDeleteId').val(id);
            $("#deletefaq").modal('show');
        });


        $(document).on('click', '#add_faq_btn', function() {
            $('#addQuestion').val('');
            $('#addAnswer').html('');
        });
    })(jQuery);
</script>



@if ($errors->any())
    <script>
        @if (Session::has('type'))
            @if (Session::get('type') == 'store')
                $('#add_faq').modal('show');
            @else
                $('#editfaq').modal('show');
            @endif
        @endif
    </script>
@endif
