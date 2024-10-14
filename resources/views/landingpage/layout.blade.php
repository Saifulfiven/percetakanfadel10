<!DOCTYPE html>
<html lang="en">
<!-- <script
src='//fw-cdn.com/11939191/4502733.js'
chat='true'>
</script> -->
<head>
    @include('landingpage.head')
  
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>

</head>
<body>
    @include('landingpage.header')
    @include('landingpage.navbar')
    
    @if($header)
        @include('landingpage.carousel')
    @endif
    
    @yield('content')
    @include('landingpage.footer')

    @yield('scripts')
