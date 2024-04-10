<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('form_style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


{{--    <link rel="stylesheet" data-type="keditor-style" href=" @vite('resources/css/admin.css')">--}}
{{--    @vite('resources/css/admin.css')--}}
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>

<body class="fixed-navbar">
