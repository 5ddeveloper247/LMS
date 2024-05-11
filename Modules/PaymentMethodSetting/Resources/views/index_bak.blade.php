@extends('backend.master')

@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="mb-40 student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12 pb-30">

                    <div class="row row  justify-content-center">
                        <div class="col-12">
                            <div class="box_header common_table_header mb-0">
                                <div class="main-title d-md-flex">
                                    <h3 class="mt-10">{{__('setting.Gateway Status')}}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="row mb-3 d-flex justify-content-center align-items-center col-12">
                            <div class="col">
                                <label for="clientID" class="form-label">Client ID</label>
                                <input type="text" class="form-control border-0 border-bottom" id="clientID" placeholder="Enter Client ID">
                            </div>
                            <div class="col">
                                <label for="clientSecret" class="form-label">Client Secret</label>
                                <input type="text" class="form-control border-0 border-bottom" id="clientSecret" placeholder="Enter Client Secret">
                            </div>
                            <div class="col">
                                
                                <label for="clientSecret" class="form-label"style="opacity:0;">Environment</label>
                                        <div class="mr-5 bg-danger" style="margin-right:20px !important;">
                                            <input class="form-control common-radio relationButton" type="checkbox" id="option1">
                                            <label class="form-check-label" for="option1">
                                                sandbox
                                            </label>
                                        </div>
                                            <div class="ms-5">
                                            <input class="form-control common-radio relationButton" type="checkbox" id="option2">
                                            <label class="form-check-label" for="option2">
                                                live
                                            </label>
                                        
                                        </div>
                        
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                          <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                </div>


            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script src="{{asset('public/backend/js/gateway.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
  const checkboxes = document.querySelectorAll('.common-radio');

  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('click', function () {
      checkboxes.forEach(function (otherCheckbox) {
        if (otherCheckbox !== checkbox) {
          otherCheckbox.checked = false;
        }
      });
    });
  });
});

    </script>
@endpush
