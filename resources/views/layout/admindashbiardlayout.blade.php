<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Assamese Dictionary') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Start-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"><!--CSS-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script><!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script><!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script><!-- Latest compiled JavaScript -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Bootstrap End-->
    
    <!-- jquarycdn -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/css-toggle-switch@latest/dist/toggle-switch.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- jquarycdn -->

  <!--|| google api for icon ||-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:wght@400;500;600;700&display=swap" />
  <!--|| google api for icon ||-->

  {{-- turbo_link start--}}
  {{-- tailwind CSS start --}}
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
   {{-- tailwind CSS end --}}
  {{-- <script src="{{asset('js/app.js')}}" defer></script> --}}
   {{-- turbo_link end--}}

<!-- our css & js files -->
<script type="text/javascript" src="{{asset('../asset/js/admin/to_write_assamese_with_eng_keyboard.js')}}"></script>
<!-- assamesekeyboard start -->
<script type="text/javascript" src="{{asset('../asset/js/admin/assamesekeyboard.js')}}"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/admin/assamesekeyboard.css')}}">
<!-- assamesekeyboard end-->
<!-- nav start -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/admin/admin_nav.css')}}">
<!-- nav end-->
<!-- our css & js files -->


</head>
<body>
    @section('header')  
    <header class="header shadow" id="header">
      <a href='javascript:void(0)' id="dashboard" data-turbolinks="false">
        <img src="data:image/png;base64,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" alt="Assamese Dictionary" class="logo"/></a>
        <nav class="navbar">
          <ul class="navbar-list"> 
            <li><a class="navbar-link" href="{{ route('dashboard') }}">ডেচব'ৰ্ড</a></li>
            <li><a class="navbar-link" href='javascript:void(0)' id="library">নতুন তথ্য</a></li>
            <li><a class="navbar-link" href='javascript:void(0)' id="update">শব্দ</a></li>
            <li><a class="navbar-link" href='javascript:void(0)' id="profile">প্ৰফাইল</a></li>
            <li data-toggle="modal" data-target="#kbModal"><a class="navbar-link" href='javascript:void(0)'>কিবৰ্ড</a></li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
             <li><a class="navbar-link"  href="javascript:void(0)"  id="log_out"><button class="lg_button">লগআউট</button></a></li>
            </form>
             {{-- <li><a class="navbar-link" href="javascript:void(0)" id="register">Register</a></li> --}}
          </ul>
        </nav>
    
        <div class="mobile-navbar-btn">
          <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
          <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>
        </div>
      </header>
  @show 
  <div class="loader" id="myLoader"></div>
    <div class="main_containt">
     @yield('containt')
    </div>
    <style>
                  body{
    background-color:#ecf0f3; 
    height: 100vh;
}
      .main_containt{
        margin-top: 14vh;
    width: 100%;
    /* height: 87vh;
    background: #ecf0f3; */
      }
      </style> 



<!--keyboard details Modal -->
<div class="modal fade" id="kbModal" tabindex="-1" role="dialog" aria-labelledby="kbModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" style="font-size: 3rem;color:#1DA1F2;">অসমীয়া টাইপ কৰিবলৈ- </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="search_kb" placeholder="টাইপ কৰক" onkeyup="searchFun_kb()" id="search_kb">
        
        <div class="scroll-bg-kb"> 
        <div class="scroll-div-kb">
          <table class="table_head_kb">
            <tr>
              <td>ইংৰাজী</td>
              <td>অসমীয়া</td>
            </tr>
          </table>
          <table class="table_body_kb">
<tr>
  <td>a</td>
  <td>অ</td>
</tr>
<tr>
  <td>aa</td>
  <td>আ</td>
</tr>
<tr>
  <td>i</td>
  <td>ই</td>
</tr>
<tr>
  <td>ii</td>
  <td>ঈ</td>
</tr>
<tr>
  <td>u</td>
  <td>উ</td>
</tr>
<tr>
  <td>uu</td>
  <td>ঊ</td>
</tr>
<tr>
  <td>wr</td>
  <td>ঋ</td>
</tr>
<tr>
  <td>e</td>
  <td>এ</td>
</tr>
<tr>
  <td>oi</td>
  <td>ঐ</td>
</tr>
<tr>
  <td>o</td>
  <td>ও</td>
</tr>
<tr>
  <td>ow</td>
  <td>ঔ</td>
</tr>
<tr>
  <td>\|</td>
  <td>।</td>
</tr>
<tr>
  <td>\/</td>
  <td>।</td>
</tr>
<tr>
  <td>।।</td>
  <td>।।</td>
</tr>
<tr>
  <td>ka</td>
  <td>ক</td>
</tr>
<tr>
  <td>kha</td>
  <td>খ</td>
</tr>
<tr>
  <td>ga</td>
  <td>গ</td>
</tr>
<tr>
  <td>gha</td>
  <td>ঘ</td>
</tr>
<tr>
  <td>nga</td>
  <td>ঙ</td>
</tr>
<tr>
  <td>cha</td>
  <td>চ</td>
</tr>
<tr>
  <td>so</td>
  <td>ছ</td>
</tr>
<tr>
  <td>jo</td>
  <td>জ</td>
</tr>
<tr>
  <td>jho</td>
  <td>ঝ</td>
</tr>
<tr>
  <td>nya</td>
  <td>ঞ</td>
</tr>
<tr>
  <td>to</td>
  <td>ট</td>
</tr>
<tr>
  <td>tho</td>
  <td>ঠ</td>
</tr>
<tr>
  <td>do</td>
  <td>ড</td>
</tr>
<tr>
  <td>dho</td>
  <td>ঢ</td>
</tr>
<tr>
  <td>no</td>
  <td>ণ</td>
</tr>
<tr>
  <td>ta</td>
  <td>ত</td>
</tr>
<tr>
  <td>tha</td>
  <td>থ</td>
</tr>
<tr>
  <td>da</td>
  <td>দ</td>
</tr>
<tr>
  <td>dha</td>
  <td>ধ</td>
</tr>
<tr>
  <td>na</td>
  <td>ন</td>
</tr>
<tr>
  <td>po</td>
  <td>প</td>
</tr>
<tr>
  <td>fo</td>
  <td>ফ</td>
</tr>
<tr>
  <td>bo</td>
  <td>ব</td>
</tr>
<tr>
  <td>vo</td>
  <td>ভ</td>
</tr>
<tr>
  <td>mo</td>
  <td>ম</td>
</tr>
<tr>
  <td>zo</td>
  <td>য</td>
</tr>
<tr>
  <td>ro</td>
  <td>ৰ</td>
</tr>
<tr>
  <td>lo</td>
  <td>ল</td>
</tr>
<tr>
  <td>wb</td>
  <td>ৱ</td>
</tr>
<tr>
  <td>xha</td>
  <td>শ</td>
</tr>
<tr>
  <td>xa</td>
  <td>ষ</td>
</tr>
<tr>
  <td>sa</td>
  <td>স</td>
</tr>
<tr>
  <td>ho</td>
  <td>হ</td>
</tr>
<tr>
  <td>khy</td>
  <td>ক্ষ</td>
</tr>
<tr>
  <td>dr</td>
  <td>ঢ়</td>
</tr>
<tr>
  <td>dhr</td>
  <td>ড়</td>
</tr>
<tr>
  <td>yo</td>
  <td>য়</td>
</tr>
<tr>
  <td>A</td>
  <td>া</td>
</tr>
<tr>
  <td>I</td>
  <td>ি</td>
</tr>
<tr>
  <td>II</td>
  <td>ী</td>
</tr>
<tr>
  <td>U</td>
  <td>ু</td>
</tr>
<tr>
  <td>UU</td>
  <td>ূ</td>
</tr>
<tr>
  <td>OI</td>
  <td>ৈ</td>
</tr>
<tr>
  <td>OW</td>
  <td>ৌ</td>
</tr>
<tr>
  <td>WR</td>
  <td>ৃ</td>
</tr>
<tr>
  <td>E</td>
  <td>ে</td>
</tr>
<tr>
  <td>O</td>
  <td>ো</td>
</tr>
<tr>
  <td>`</td>
<td>্</td>
</tr>
<tr>
  <td>ht</td>
  <td>ৎ</td>
</tr>
<tr>
  <td>nu</td>
  <td>ং</td>
</tr>
<tr>
  <td>cn</td>
  <td>ঁ</td>
</tr>
<tr>
  <td>bkh</td>
  <td>ঃ</td>
</tr>
<tr>
  <td>0</td>
    <td>০</td>
  </tr>
<tr>
<td>1</td>
  <td>১</td>
</tr>
<tr>
  <td>2</td>
    <td>২</td>
  </tr>
  <tr>
    <td>3</td>
      <td>৩</td>
    </tr>
    <tr>
      <td>4</td>
        <td>৪</td>
      </tr>
      <tr>
        <td>5</td>
          <td>৫</td>
        </tr>
        <tr>
          <td>6</td>
            <td>৬</td>
          </tr>
 <tr>
  <td>7</td>
 <td>৭</td>
 </tr>
 <tr>
<td>8</td>
  <td>৮</td>
 </tr>
<tr>
  <td>9</td>
  <td>৯</td>
 </tr>

          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .table_body_kb{
    width: 100%;
  }
  .table_body_kb tr{
    width: 100%;
    color: black;
  }
  .table_body_kb td{
    width: 50%;
    text-align: center;
    
    border: .1rem solid black;
    font-size: 2rem;
  }
  .table_body_kb tr:hover{
    background-color: #1DA1F2;
    color: #ecf0f3;

  }
  .search_kb{
    width: 100%;
    border: .3rem solid #1DA1F2;
    border-radius: 20px;
    height:4rem ;
    font-size: 2.3rem;
    color: black;
  }
  .table_head_kb{
    width: 100%;
  }
  .table_head_kb tr{
    width: 100%;
  }
  .table_head_kb td{
    width: 50%;
    text-align: center;
    background-color: #1DA1F2;
    color: #ecf0f3;
    border: .1rem solid black;
    font-size: 2rem;
  }
       .scroll-bg-kb{
        margin-top: 1rem;
        background:#ecf0f3;
        width:100%;
    }
    .scroll-div-kb{
        width:100%;
        background:#ecf0f3; 
        height: 50vh;
        overflow:hidden;
        overflow-y: scroll;
    }
</style>
{{-- keyboard details modal --}}
<script type="text/javascript" src="{{asset('../asset/js/admin/adminnavbar.js')}}"></script>
<script>
  window.onload = function(){
    document.getElementById('myLoader').style.display = 'none';
  }
 </script>

</body>
</html>