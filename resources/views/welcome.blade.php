<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('/images/nepal-gov.svg')}}">
    <link
    rel="apple-touch-icon"
    sizes="76x76"
    href="{{asset('/images/nepal-gov.svg')}}"
/>
    <title>{{ env('APP_NAME') }}</title>
    {{-- styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <app></app>
    </div>
</body>
</html>