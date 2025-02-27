<script>
    function confirm_modal(delete_url) {
        jQuery('#confirm-delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>

<div class="modal fade admin-query" id="confirm-delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('common.Delete Confirmation') }}</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">{{ __('common.Are you sure to delete ?') }}</h3>

                <div class="col-lg-12 text-center">
                    <div class="d-flex justify-content-between mt-40">
                        <button type="button" class="primary-btn tr-bg"
                            data-dismiss="modal">{{ __('common.Cancel') }}</button>
                        <a id="delete_link" class="primary-btn semi_large2 fix-gr-bg"><i class="ti-check"></i>
                            {{ __('common.Delete') }}</a>

                        <a id="deletingButton" class="primary-btn semi_large2 fix-gr-bg d-none">
                            {{ __('common.Updating') }} ....
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
