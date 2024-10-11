<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/asset/dashboard.css') }}" rel="stylesheet">
    
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script> --}}
    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-dashboard', 'resources/assets/sass/app.scss') }} --}}
</head>

<body x-data="{ 
    page: 'ecommerce', 
    loaded: true, 
    darkMode: JSON.parse(localStorage.getItem('darkMode')) || true, 
    stickyMenu: false, 
    sidebarToggle: false, 
    scrollTop: false 
  }" 
  x-init="$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" 
  :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
    @yield('content')

    {{-- Vite JS --}}
    {{-- {{ module_vite('build-dashboard', 'resources/assets/js/app.js') }} --}}
    <script type="module" src="{{ mix('js/app.js') }}"></script>

</body>
