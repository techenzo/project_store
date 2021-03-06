<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #toggle_cart{
            padding: 8px;
            background:#2B5F8E;
            width: 250px;
            height:250px;
            box-shadow: 0 0 5px #aaa;
            font-size: 25px;
            color:#fff;
            text-align:center;
            border-radius: 150px;
            line-height: 150px;
        }
        button{
        margin: 30px 60px;
            
        }


    </style>
    
</head>
<body>
    <div id="app">
        
        @include('inc.navbar')

        <div class="container">
            @yield('breadcrumb')  
        </div>
            <div class="container">
                    <div class="row">
                            @include('inc.messages')
                    </div>
                @yield('sidebar')
                @yield('content') 
            </div>
            
    </div>

    
    @yield ('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script> --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />

    <script>

       
        $(document).ready(function() {
            $("#show_hide").mouseover(function () {
                $("#toggle_cart").removeClass('hidden').toggle(1500,"easeOutQuint",function(){
                });
        });  
        });
            
    </script>
    
 
</body>
</html>
