<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('layouts.imports.css')
</head>
<body>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
    @include('layouts.imports.js')
    @yield('js')
</body>
</html>