@extends('layout.assamesekeyboard')
@extends('layout.admindashbiardlayout')
@section('header')
@parent
@stop
@section('containt')
<center>
<div class="search_area">
    <form name="keyboard" id="keyboard" enctype="multipart/form-data">
        <div class="search_bar">
            <div class="search"> 
                <select id="language" onchange="getLanguageValue()" class="lang_select">
                    <option value="english">ইংৰাজী</option>
                    <option value="axom">অসমীয়া</option>
                  </select> 
                <input type="text" class="searchTerm" id="word0" name="word0" placeholder="Type In English">
                <button type="submit" id="search"class="searchButton"><i class="fa fa-search"></i></button>
                <button id="keyboard1" class="button" type="button"><i class='far fa-keyboard'></i></button>
    </form>
            </div>
        </div>
    <small id ="error_msg" style="color: brown;font-size:2rem;margin-top:1rem;"></small>
</div>
</center>
    {{-- place to show word table data --}}
    <center>
        <div class="area">
    <div class="scroll-bg" id="scroll-bg">
        <div class="scroll-div">
            <table id="update_table" class="update_table"></table>
        </div>
    </div> 
</div>
    </center>
    {{-- place to show word table data --}}

  
    <link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/admin/viewwords.css')}}">
    <script type="text/javascript" src="{{asset('../asset/js/admin/wordSearch.js')}}"></script>
@endsection