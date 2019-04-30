<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css_salma/app.css')}}">
            
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        
        <title>{{config('app.name','CarDealer')}}</title>
        <link rel="icon" href="{!! asset('img/logo.png') !!}"/>
        
    </head>
    
    <body>
        @include('inc.navbarClient')
        <br> <br>
        <div class="container">
             @yield('content')
        </div>
    </body>
</html>
