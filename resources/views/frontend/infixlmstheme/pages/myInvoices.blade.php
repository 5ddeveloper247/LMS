

    @extends(theme('layouts.dashboard_master'))
    @section('title')
        {{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | Invoice
    @endsection
    @section('css')
        <link href="{{asset('public/frontend/infixlmstheme/css/my_invoice.css')}}{{assetVersion()}}" rel="stylesheet"
              media="screen,print"/>
    @endsection
    @section('mainContent')
        <x-my-invoice-page-section :id="$id"/>

    @endsection
    @section('js')
        <script src="{{ asset('public/frontend/infixlmstheme') }}/js/html2pdf.bundle.js"></script>
        <script src="{{ asset('public/frontend/infixlmstheme/js/my_invoice.js') }}"></script>
    @endsection

