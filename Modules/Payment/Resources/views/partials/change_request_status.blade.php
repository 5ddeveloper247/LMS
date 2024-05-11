    <script>
        function confirm_modal(route, id, status) {
            jQuery('#confirmation_modal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('status_form').setAttribute('action', route);
            document.getElementById('request_status').setAttribute('value', status);
            document.getElementById('request_id').setAttribute('value', id);
        }

        function transection_modal(route, id, amount, status) {
            jQuery('#transection_modal').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('transection_form').setAttribute('action', route);
            document.getElementById('transection_status').setAttribute('value', status);
            document.getElementById('transection_request_id').setAttribute('value', id);
            document.getElementById('amount').setAttribute('value', amount);
        }
    </script>
    {{-- Confirmation Modal --}}
    <div class="modal fade admin-query" id="confirmation_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" id="status_form">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ 'Confirm' }} </h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                    </div>
                    <input type="hidden" name="status" id="request_status">
                    <input type="hidden" name="request_id" id="request_id">
                    <div class="modal-body">
                        <h4>Are you Sure you Want to Confirm ?</h4>
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ 'Cancel' }}</button>
                            <button class="primary-btn fix-gr-bg" type="submit">{{ 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Transection Modal --}}
    <div class="modal fade admin-query" id="transection_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" id="transection_form">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ 'Transection ID' }} </h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="ti-close"></i></button>
                    </div>
                    <input type="hidden" name="status" id="transection_status">
                    <input type="hidden" name="request_id" id="transection_request_id">
                    <input type="hidden" name="amount" id="amount">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="primary_input mb-25">
                                    <label class="primary_input_label" for="">{{ 'ID' }}
                                        <strong class="text-danger">*</strong></label>
                                    <input class="primary_input_field" value="{{ old('transection_id') }}"
                                        name="transection_id" id="transection_id" placeholder="-" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-40">
                            <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal">{{ 'Cancel' }}</button>
                            <button class="primary-btn fix-gr-bg" type="button"
                                id="transection_btn">{{ 'Save' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
