<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon-icon.png') }}">
    <title>@yield('title', 'HomeEase') – Professional Services at Your Doorstep</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    @stack('head')
</head>
<body>

{{-- HEADER --}}
@include('frontend.layout.header')

@yield('content')

{{-- FOOTER --}}
@include('frontend.layout.footer')

@stack('scripts')
</body>
</html>
