<!DOCTYPE html>
<html lang="en">
<script
src='//fw-cdn.com/11939191/4502733.js'
chat='true'>
</script>
<head>
    @include('landingpage.head')
</head>
<body>
    @include('landingpage.header')
    @include('landingpage.navbar')
    
    @if($header)
        @include('landingpage.carousel')
    @endif
    
    @yield('content')
    @include('landingpage.footer')

