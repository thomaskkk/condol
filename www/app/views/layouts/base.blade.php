<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

        <title>
            @section('title')
            Welcome!
            @show
        </title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        @section('stylesheets')

        {{-- Bootstrap CSS --}}
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" type="text/css" rel="stylesheet">

        {{-- Template CSS --}}
        <link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        @show

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" type="image/x-icon" href="favicon.ico" />

    </head>
    <body>

    @include('layouts.header')

    @include('layouts.leftpanel')

    {{-- MAIN PANEL --}}
    <div id="main" role="main">

        {{-- MAIN CONTENT --}}
        <div id="content">
            @section('content')
            @show
        </div>

    </div>
    {{-- MAIN PANEL --}}

    @section('javascripts')

    {{-- Jquery JS --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    {{-- BOOTSTRAP JS --}}
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    {{-- JARVIS WIDGETS --}}
    <script src="/js/base/smartwidgets/jarvis.widget.min.js"></script>

    {{-- browser msie issue fix --}}
    <script src="/js/base/msie-fix/jquery.mb.browser.min.js"></script>

    {{-- SmartClick: For mobile devices --}}
    <script src="/js/base/smartclick/smartclick.js"></script>

    @show

    {{-- MAIN APP JS FILE --}}
    <script src="/js/base/app.js"></script>

    {{-- Google Analytics --}}

    </body>
</html>