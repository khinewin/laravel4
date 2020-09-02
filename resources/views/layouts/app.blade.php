<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> စားဖိုမှုးကြီး @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{url('bst/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('fa/css/all.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{url('bst/js/jquery.js')}}"></script>
    <script src="{{url('bst/js/popper.js')}}"></script>
    <script src="{{url('bst/js/bootstrap.js')}}"></script>

   

    <script>
        $(function(){
            setTimeout(function(){
                $(".alert").fadeOut();
            }, 4000)
        })
    </script>
</head>
<body>
    <div id="app" class="mb-5 pb-5">
       
        @include("partials.nav");

       <div class="container-fluid">
           <div class="row">
               <div class="col-sm-2">
                    @auth
                        @include("partials.sidebar");
                        
                    @endauth
               </div>
               <div class="col-sm-10">
                    @yield('content')
               </div>
           </div>
       </div>
    </div>
</body>
</html>

@yield('javascript')