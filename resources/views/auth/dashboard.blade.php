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
                <input type="text" class="searchTerm" id="word0" name="word0" placeholder="Type In English ...">
                <button type="submit" id="search" class="searchButton"><i class="fa fa-search"></i></button>
      </form>
      <button id="keyboard1" class="button" type="button"><i class='far fa-keyboard'></i></button>
                <button id="download" class="button" type="button"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>
              </div>
          </div>
      <small id ="error_msg" style="color: brown;font-size:2rem;margin-top:1rem;"></small>
  </div>
</center>


<center>
  <div class="area">
    <div class="scroll-bg" id="scroll-bg">
          <div class="scroll-div">
              <table id="library_table" class="table_body">
                  {{-- place to show word table data --}}
              </table>
          </div>    
    </div>
  </div>
</center>


<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <img src="" id="present_image" alt="" style="width: 100%;">
          <div id="image_absent" style="color:tomato;font-size:2rem;margin-left:5rem;"></div>
      </div>
      <div class="modal-footer">
          <button type="button" class="modalbutton" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>

{{-- printJS cdn --}}
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
{{-- printJS cdn --}}
<link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/admin/library.css')}}">
<script type="text/javascript" src="{{asset('../asset/js/admin/library.js')}}"></script>
@endsection