@push('scripts')
    <script>
        $(document).on('click', '.addWidget', function () {
            let demoMode = $('#demoMode').val();
            if (demoMode == 1) {
                toastr.warning("For the demo version, you cannot change this", "Warning");
                return false;
            }
            $('#CreateModal').modal('show');
            let a = $(this).data('type');
            $('#category').val(a);

        });


        @if ($errors->any())

        @endif

        $(document).ready(function () {

            $('#copyright_form').on('submit', function (event) {
                event.preventDefault();

                let demoMode = $('#demoMode').val();
                if (demoMode == 1) {
                    toastr.warning("For the demo version, you cannot change this", "Warning");
                    return false;
                }
                @if(!permissionCheck('footerSetting.footer.content-update'))
                toastr.warning("Permission denied", "Warning");
                return false;
                @endif

                $("#copyrightBtn").prop('disabled', true);
                $('#copyrightBtn').text('Updating');
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('footerSetting.footer.content-update') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        toastr.success('Updated successfully!')
                        $('#copyrightBtn').text('{{__('common.Update')}}');
                        $("#copyrightBtn").prop('disabled', false);
                    },
                    error: function (response) {
                        toastr.error('Something wrong !')
                        $('#copyrightBtn').text('{{__('common.Update')}}');
                        $("#copyrightBtn").prop('disabled', false);
                    }
                });
            });

            $('#aboutForm').on('submit', function (event) {
                event.preventDefault();
                let demoMode = $('#demoMode').val();
                if (demoMode == 1) {
                    toastr.warning("For the demo version, you cannot change this", "Warning");
                    return false;
                }
                @if(!permissionCheck('footerSetting.footer.content-update'))
                toastr.warning("Permission denied", "Warning");
                return false;
                @endif
                $("#aboutSectionBtn").prop('disabled', true);
                $('#aboutSectionBtn').text('Updating');
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('footerSetting.footer.content-update') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        toastr.success('Updated successfully!')
                        $('#aboutSectionBtn').text('{{__('common.Update')}}');
                        $("#aboutSectionBtn").prop('disabled', false);
                    },
                    error: function (response) {
                        toastr.error('Something wrong !')
                        $('#aboutSectionBtn').text('{{__('common.Update')}}');
                        $("#aboutSectionBtn").prop('disabled', false);
                    }
                });
            });

            $('#aboutDescriptionForm').on('submit', function (event) {
                event.preventDefault();
                let demoMode = $('#demoMode').val();
                if (demoMode == 1) {
                    toastr.warning("For the demo version, you cannot change this", "Warning");
                    return false;
                }
                @if(!permissionCheck('footerSetting.footer.content-update'))
                toastr.warning("Permission denied", "Warning");
                return false;
                @endif
                $("#aboutDescriptionBtn").prop('disabled', true);
                $('#aboutDescriptionBtn').text('Updating');
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('footerSetting.footer.content-update') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        toastr.success('Updated successfully!')
                        $('#aboutDescriptionBtn').text('{{__('common.Update')}}');
                        $("#aboutDescriptionBtn").prop('disabled', false);
                    },
                    error: function (response) {
                        toastr.error('Something wrong !')
                        $('#aboutDescriptionBtn').text('{{__('common.Update')}}');
                        $("#aboutDescriptionBtn").prop('disabled', false);
                    }
                });
            });

            $('#companyForm').on('submit', function (event) {
                event.preventDefault();
                let demoMode = $('#demoMode').val();
                if (demoMode == 1) {
                    toastr.warning("For the demo version, you cannot change this", "Warning");
                    return false;
                }
                @if(!permissionCheck('footerSetting.footer.content-update'))
                toastr.warning("Permission denied", "Warning");
                return false;
                @endif
                $("#companyBtn").prop('disabled', true);
                $('#companyBtn').text('Updateing');
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('footerSetting.footer.content-update') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        toastr.success('Updated successfully!')
                        $('#companyBtn').text('{{__('common.Update')}}');
                        $("#companyBtn").prop('disabled', false);
                    },
                    error: function (response) {
                        toastr.error('Something wrong !')
                        $('#companyBtn').text('{{__('common.Update')}}');
                        $("#companyBtn").prop('disabled', false);
                    }
                });
            });

            $('#accountForm').on('submit', function (event) {
                event.preventDefault();
                let demoMode = $('#demoMode').val();
                if (demoMode == 1) {
                    toastr.warning("For the demo version, you cannot change this", "Warning");
                    return false;
                }
                @if(!permissionCheck('footerSetting.footer.content-update'))
                toastr.warning("Permission denied", "Warning");
                return false;
                @endif
                $("#accountBtn").prop('disabled', true);
                $('#accountBtn').text('Updating');
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('footerSetting.footer.content-update') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        toastr.success('Updated successfully!')
                        $('#accountBtn').text('{{__('common.Update')}}');
                        $("#accountBtn").prop('disabled', false);
                    },
                    error: function (response) {
                        toastr.error('Something wrong !')
                        $('#accountBtn').text('{{__('common.Update')}}');
                        $("#accountBtn").prop('disabled', false);
                    }
                });
            });

            $('#serviceForm').on('submit', function (event) {
                event.preventDefault();
                let demoMode = $('#demoMode').val();
                if (demoMode == 1) {
                    toastr.warning("For the demo version, you cannot change this", "Warning");
                    return false;
                }
                @if(!permissionCheck('footerSetting.footer.content-update'))
                toastr.warning("Permission denied", "Warning");
                return false;
                @endif
                $("#serviceBtn").prop('disabled', true);
                $('#serviceBtn').text('Updating');
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('footerSetting.footer.content-update') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        toastr.success('Updated successfully!')
                        $('#serviceBtn').text('{{__('common.Update')}}');
                        $("#serviceBtn").prop('disabled', false);
                    },
                    error: function (response) {
                        toastr.error('Something wrong !')
                        $('#serviceBtn').text('{{__('common.Update')}}');
                        $("#serviceBtn").prop('disabled', false);
                    }
                });
            });


        });

        function sectionControl(id) {

            let url = "/footer/footer-setting/tab/" + id;
            $.ajax({
                url: url,
                type: "GET",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {

                },
                error: function (response) {

                }
            });
        }


        function statusChange(item) {
            let demoMode = $('#demoMode').val();
            if (demoMode == 1) {
                toastr.warning("For the demo version, you cannot change this", "Warning");
                return false;
            }
            var formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('id', item.id);
            formData.append('status', item.status);
            $.ajax({
                url: "{{ route('footerSetting.footer.widget-status') }}",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (response) {
                    toastr.success('Status Change Successfully!')
                },
                error: function (response) {
                    toastr.error('Something wrong !')
                }
            });
        }

        function showEditModal(page) {
            let demoMode = $('#demoMode').val();
            if (demoMode == 1) {
                toastr.warning("For the demo version, you cannot change this", "Warning");
                return false;
            }
            $('#editModal').modal('show');
            @foreach ($LanguageList as $key => $language)
            $('#widget_name_edit_{{$language->code}}').val(page.name.{{$language->code}}).addClass('has-content');
            @endforeach
            $("#widget_description").summernote("code", page.description);
            $('#widgetEditId').val(page.id);
            $("#editCategory").val(page.category);
            $('#editCategory').niceSelect('update');

            $("#editPage").val(page.page);
            $('#editPage').niceSelect('update');

            if (page.is_static == 1) {
                // $('#editPageFieldDiv').css("display", "none");
                $('#editCategoryFieldDiv').removeClass("col-lg-12").addClass("col-lg-12");
            } else {
                // $('#editPageFieldDiv').css("display", "inherit");
                $('#editCategoryFieldDiv').removeClass("col-lg-12").addClass("col-lg-12");
            }

        }

        function showDeleteModal(id) {
            let demoMode = $('#demoMode').val();
            if (demoMode == 1) {
                toastr.warning("For the demo version, you cannot change this", "Warning");
                return false;
            }
            $('#deleteItemModal').modal('show');
            let route = '{{url('/')}}/footer/footer-widget-delete/' + id
            $('#deleteBtn').attr('href', route)
        }

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        let order = [];
        var recordsTotal = '{{ count($SectionOnePages) }}';
        let course_seq_url = '{{route("footerSetting.footer.changeFooterWidgetOrder")}}';
        // let course_seq_url = '{{url("social-links/changeOrder")}}';
        $('#footer-section-1 tbody').sortable({
                cursor: "move",
                update: function (event, ui) {
                    // Get the sorted row IDs

                    var page_length = parseInt($('#section-one .dataTable_select>.list>li.selected').data('value'));
                    var current_page = parseInt($('#section-one .paginate_button.current').text());
                    //
                    var postion_for_text = (current_page * page_length) - page_length; //asc
                    var postion_for = recordsTotal - (postion_for_text); // dsec


                    $('#footer-section-1 tbody tr').each(function (index, element) {
                        //var rowData = datatable.row(index).data();

                        order.push({
                            id: $(this).attr('data-item'),
                            new_position: postion_for,
                        });

                        $(this).data('seq_no', postion_for);

                        postion_for = postion_for - 1;

                    });

                    $.ajax({
                        // type: "POST",
                        method: 'POST',
                        url: course_seq_url,
                        dataType: 'json',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            order: order
                        }),
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response == 200) {
                                toastr.success('Order Successfully Changed !', 'Success');
                                order = [];
                            }
                        }
                    });
                },
            });
        $('#footer-section-2 tbody').sortable({
                cursor: "move",
                update: function (event, ui) {
                    // Get the sorted row IDs

                    var page_length = parseInt($('#section-two .dataTable_select>.list>li.selected').data('value'));
                    var current_page = parseInt($('#section-two .paginate_button.current').text());
                    //
                    var postion_for_text = (current_page * page_length) - page_length; //asc
                    var postion_for = recordsTotal - (postion_for_text); // dsec


                    $('#footer-section-2 tbody tr').each(function (index, element) {
                        //var rowData = datatable.row(index).data();

                        order.push({
                            id: $(this).attr('data-item'),
                            new_position: postion_for,
                        });

                        $(this).data('seq_no', postion_for);

                        postion_for = postion_for - 1;

                    });

                    $.ajax({
                        // type: "POST",
                        method: 'POST',
                        url: course_seq_url,
                        dataType: 'json',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            order: order
                        }),
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response == 200) {
                                toastr.success('Order Successfully Changed !', 'Success');
                                order = [];
                            }
                        }
                    });
                },
            });
        $('#footer-section-3 tbody').sortable({
                cursor: "move",
                update: function (event, ui) {
                    // Get the sorted row IDs

                    var page_length = parseInt($('#section-three .dataTable_select>.list>li.selected').data('value'));
                    var current_page = parseInt($('#section-three .paginate_button.current').text());
                    //
                    var postion_for_text = (current_page * page_length) - page_length; //asc
                    var postion_for = recordsTotal - (postion_for_text); // dsec


                    $('#footer-section-3 tbody tr').each(function (index, element) {
                        //var rowData = datatable.row(index).data();

                        order.push({
                            id: $(this).attr('data-item'),
                            new_position: postion_for,
                        });

                        $(this).data('seq_no', postion_for);

                        postion_for = postion_for - 1;

                    });

                    $.ajax({
                        // type: "POST",
                        method: 'POST',
                        url: course_seq_url,
                        dataType: 'json',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            order: order
                        }),
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response == 200) {
                                toastr.success('Order Successfully Changed !', 'Success');
                                order = [];
                            }
                        }
                    });
                },
            });
        $('#footer-section-4 tbody').sortable({
                cursor: "move",
                update: function (event, ui) {
                    // Get the sorted row IDs

                    var page_length = parseInt($('#section-four .dataTable_select>.list>li.selected').data('value'));
                    var current_page = parseInt($('#section-four .paginate_button.current').text());
                    //
                    var postion_for_text = (current_page * page_length) - page_length; //asc
                    var postion_for = recordsTotal - (postion_for_text); // dsec


                    $('#footer-section-4 tbody tr').each(function (index, element) {
                        //var rowData = datatable.row(index).data();

                        order.push({
                            id: $(this).attr('data-item'),
                            new_position: postion_for,
                        });

                        $(this).data('seq_no', postion_for);

                        postion_for = postion_for - 1;

                    });

                    $.ajax({
                        // type: "POST",
                        method: 'POST',
                        url: course_seq_url,
                        dataType: 'json',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            order: order
                        }),
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response == 200) {
                                toastr.success('Order Successfully Changed !', 'Success');
                                order = [];
                            }
                        }
                    });
                },
            });

    </script>
@endpush

