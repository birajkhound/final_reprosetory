@extends('layout.assamesekeyboard')
@extends('layout.admindashbiardlayout')
@section('header')
@parent
@stop
@section('containt')
<div class="scroll-bg2">
      
  <div class="controls">
    {{-- <button id="asm_kb" class="button-xyz" type="button"><i class='far fa-keyboard'></i> --}}
    </button>
    <div class="heading"> তথ্য সংশোধন প্ৰপত্ৰ </div>
    {{-- <button class="button-xyz" id="submit_update"><i class="fa fa-save"></i></button> --}}
  </div>

  <div id="data_inserted" style="color:rgb(13, 164, 53);font-size:2rem;"></div>
  <div id="data_validation_error" style="color:tomato;font-size:2rem;"></div>
  <div class="scroll-div2">

    <form  id="inserForm" enctype="multipart/form-data">
       <div class="inputs">
        <input type="text" id="old_audio" style="display: none;">
        <input type="text" id="old_image" style="display: none;">
          <label class="hallowin">শব্দ</label>
          <input type="text" class="single_input hallowin" id="word"/>
          <small  id="word_error" style="color:tomato;font-size:2rem;"></small>
          <label class="hallowin">অৰ্থ ব্যাখ্যা</label>
          <input type="text" class="single_input hallowin" id="explaination"/>
          <small  id="explaination_error" style="color:tomato;font-size:2rem;"></small>
          <label class="hallowin">ইংৰাজী অৰ্থ</label>
          <input type="text" class="single_input hallowin" id="english"/>
          <small  id="english_error" style="color:tomato;font-size:2rem;"></small>
          <label class="hallowin">ইংৰাজী অনুবাদ</label>
          <input type="text" class="single_input hallowin" id="translate" placeholder="ইয়াত অসমীয়া শব্দটোৰ উচ্চাৰণ ইংৰাজীত টাইপ কৰক"/>
          <small  id="translate_error" style="color:tomato;font-size:2rem;"></small>
          <label class="hallowin">কীৱৰ্ড</label>
          <input type="text" class="single_input hallowin" id="keyword"/>
          <small  id="keyword_error" style="color:tomato;font-size:2rem;"></small>
          <label class="hallowin">অডিঅ'</label>
          
        <div class="mp3">
          <div  id="present_sound" style="height:5rem;width:50%;display:none;text-align: center;color:#1DA1F2;">
<i class="fa fa-music fa-5x" aria-hidden="true"></i></div>

          <div  id="remove_sound" style="height:5rem;width:50%;display:none;background-color:#1DA1F2;position: relative;text-align: center;color:#ecf0f3"><i class="fa fa-plus fa-5x" aria-hidden="true"></i></div>

          <input type="file" id="upload"  accept=".mp3"/>
          <audio id="audio" controls class="audiplay">
          <source src="" id="src"/>
          </audio>
        </div>
        <small  id="audio_error" style="color:tomato;font-size:2rem;"></small>
        <small  id="image_error" style="color:tomato;font-size:2rem;margin-left:5rem;"></small>
        
        <div class="drop-zone">
          <img src="" alt="" id="present_image" style=" width: 100%;height:38vh;display:none;">
          <span class="drop-zone__prompt" id="prompt">ছবিখন ইয়াত ড্ৰপ কৰক বা আপলোড কৰিবলৈ ক্লিক কৰক</span>
          <input type="file" name="image" class="drop-zone__input"  id="image" accept=".jpeg,.png,.jpg">
        </div> 
      </div>
    </form>
  </div>


  <div class="modal-footer">
    <div class="row">
      {{-- <div class="inline"> --}}
      <button id="asm_kb" class=" col mr-2 button-xyz" type="button">কিবর্ড</button>  
        <button class=" col button-xyz" id="submit_update">তথ্য সংৰক্ষণ কৰিবলৈ</button>
      {{-- </div> --}}
    </div>
  </div>
</div>
   
   
<link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/admin/wordinsert.css')}}">  
<script type="text/javascript" src="{{asset('../asset/js/admin/submitUpdate.js')}}"></script>

@endsection