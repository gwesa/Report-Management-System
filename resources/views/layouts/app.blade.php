<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',' نظام إدارة التقارير')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/style.css?v=15' )}}" rel="stylesheet" type="text/css" >
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body dir="rtl">
  @include('layouts.inc.header')
  <main class="py-4">
        @yield('content')
  </main>
</body>
</html>
