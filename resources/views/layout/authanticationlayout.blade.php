<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Assamese Dictionary') }}</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/auth/login.css')}}">
    {{-- turbo_link start--}}
    {{-- tailwind CSS start --}}
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    {{-- tailwind CSS end --}}
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    {{-- turbo_link end--}}
    
        <!-- Bootstrap Start-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"><!--CSS-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script><!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script><!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script><!-- Latest compiled JavaScript -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- Bootstrap End-->
</head>
<body>
    <div class="loader" id="myLoader"></div>
    <div class="wrapper">
        @yield('auth_containt')</div> 
          <script>
            window.onload = function(){
              document.getElementById('myLoader').style.display = 'none';
            }
           </script>
   </body>
   </html>