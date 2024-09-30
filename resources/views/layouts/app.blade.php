<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <title>@yield('title')</title>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    @yield('auth')
</body>
</html>