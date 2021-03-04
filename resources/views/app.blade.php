<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title></title>
    <!-- <script src="./bootstrap/" defer></script> -->
    <link href="" rel="stylesheet">
<!-- Using bootstrap since tailwind is asociated with Livewire -->
   
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
     integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid" id="app">
    <!-- <a href="/mk">Macedonian</a>
    <a href="/en">English</a> -->
    <a href="locale/en">English</a>
    <a href="locale/mk">Macedonian</a>
        @yield('content')
    </div>    
</body>
<script src="{{ mix('js/app.js') }}"></script>

<script src="/js/lang.js"></script>
<!-- <script >const _ = import('lodash');
window.trans = (string) => _.get(window.i18n, string);</script> -->
</html>