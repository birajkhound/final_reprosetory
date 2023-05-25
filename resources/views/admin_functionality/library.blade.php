@extends('layout.assamesekeyboard')
@extends('layout.admindashbiardlayout')
@section('header')
@parent
@stop
@section('containt')
{{-- excel --}}
<script src="https://unpkg.com/read-excel-file@4.x/bundle/read-excel-file.min.js"></script>
<div class="scroll-bg1">
  <div class="brand-title">ডাটাবেছত নতুন শব্দ যোগ কৰিবলৈ প্ৰপত্ৰ</div>
  <div id="data_inserted" style="color:rgb(13, 164, 53);font-size:2rem;"></div>
  <div id="data_validation_error" style="color:tomato;font-size:2rem;"></div>
  <div class="scroll-div1">

    <form  id="inserForm" enctype="multipart/form-data">
       <div class="inputs">
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
          <input type="file" id="upload"  accept=".mp3"/>
          <audio id="audio" controls class="audiplay">
          <source src="" id="src"/>
          </audio>
        </div>
        <small  id="audio_error" style="color:tomato;font-size:2rem;"></small>
        <small  id="image_error" style="color:tomato;font-size:2rem;margin-left:5rem;"></small>
        <div class="drop-zone">
          <span class="drop-zone__prompt">ছবিখন ইয়াত ড্ৰপ কৰক বা আপলোড কৰিবলৈ ক্লিক কৰক</span>
          <input type="file" name="image" class="drop-zone__input"  id="image" accept=".jpeg,.png,.jpg">
        </div> 
      </div>
    </form>
  </div>
</div>
<div class="modal-footer">
  <div class="row">
    {{-- <div class="inline"> --}}
    <button id="asm_kb" class="button1 hallowin col mr-2" type="button">কিবর্ড</button>  
      <button class="button1 hallowin col mr-2" data-toggle="modal" data-target="#excel_upload">EXCEL ব্যৱহাৰ কৰি তথ্য সন্নিবিষ্ট কৰিবলৈ</button>
      <button class="button1 hallowin col " id="insert">তথ্য সংৰক্ষণ কৰিবলৈ</button>
    {{-- </div> --}}
  </div>
</div>
{{-- //--------- --}}

<div class="modal fade" id="excel_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="brand-title">EXCEL ব্যৱহাৰ কৰি লাইব্ৰেৰীত তথ্য সন্নিবিষ্ট কৰক</div>
      </div>
      <div class="modal-body">
        <input type="file" id="file-input" accept=".xlsx" class="hallowin"> 
        <div id='file-input-validation' style="display:none;color:rgb(218, 9, 9);font-size: 20px;"></div>
          <strong id="strong" style="color:rgb(9, 149, 70);font-size: 20px;" ></strong> 
        <div class="scroll-bg" id="scroll-bg1" style="display: none;">
            <div class="scroll-div">
             <table>
             <thead>
                <tr>
                    <th>Word</th>
                    <th>Transliterate</th>
                    <th>Explation</th>
                    <th>English</th>
                    <th>Keyword</th>
                </tr>
             </thead>
             <tbody class="table table-striped" id="excel-table">
             <!-- table rows and columns will be added here dynamically -->
             </tbody>
             </table>
            </div>
            <div class="modal-footer">
            <div class="row">
               <input type="button" class="btn btn-primary col mr-2" id="import" value="তথ্য সংৰক্ষণ কৰক">
                <button type="button" class="btn btn-danger col" data-dismiss="modal">CLOSE</button>
            </div>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
<link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/admin/wordinsert.css')}}">    
<script type="text/javascript" src="{{asset('../asset/js/admin/insertword.js')}}"></script>
@endsection