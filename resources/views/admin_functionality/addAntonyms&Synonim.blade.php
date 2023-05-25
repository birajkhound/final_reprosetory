@extends('layout.assamesekeyboard')
@extends('layout.admindashbiardlayout')
@section('header')
@parent
@stop
@section('containt')
<br><br>
<div class="page-title" id="title"></div>
<div class="inline">
    <button  class="button1" id="synonyms" type="button">প্ৰতিশব্দ যোগ কৰিবলৈ</button>  
    <button class="button1" id="antonyms" type="button">বিপৰীত শব্দ যোগ কৰিবলৈ</button>
</div>
<center>

<div id="synonyms_area" class="area" >
    <div id="area_to display_existing_synonyms" style="display:none;">

        <div class="page-title">উপলব্ধ প্ৰতিশব্দসমূহ হ'ল -</div>
            <div class="scroll-bg">
                <div class="scroll-div">
                   <table id="present_synonyms">
                   {{-- words are shown here --}}
                   </table>
                </div>
            </div>
          
        <div  id="add_more_synonym" class="add_more_btn"><i class="fa fa-plus fa-4x" aria-hidden="true"></i></div>
    </div>          
    {{-- to add synonyms     --}}
    <div id="area_to_add_synonyms">
        <div style="text-align: center;">
           <input id="selected_synonyms" class="single_input" readonly>
           <button class="button-xyz1" id="submit_synonyms"><i class="fa fa-save"></i></button>
        </div>
    <form id="search_synonym_form" enctype="multipart/form-data">
        <div class="search_bar">
            <div class="search">
                {{-- <button id="synonims_kb" class="button-xyz" type="button"><i class='far fa-keyboard'></i></button>   --}}
                 <input type="text" class="searchTerm synonyms_search_input" id="synonyms_search_input"  placeholder="প্ৰতিশব্দ যোগ কৰিবলৈ টাইপ কৰক">
                 {{-- <button type="submit" id="synonyms_search_btn"class="searchButton">
                 <i class="fa fa-search"></i>
                 </button> --}}
                </form>
            </div>
         </div>
         {{-- ////////// --}}
         
         <div class="scroll-bg" id="scroll-bg-synonym">
            <div id="success_msg_for_synonym" style="color: rgb(8, 117, 59);font-size:3rem"></div>
            <div id="error_msg_for_synonym" style="color: brown;font-size:3rem"></div>
             <div class="scroll-div" style="display: none;" id="scroll-div-synonym">
             <table >
                <tbody id="add_synonyms_selectlist_items" >
                {{-- words are shown here --}}
                </tbody>
             </table>
             </div>
         </div>
    </div>
</div> 


<div id="antonyms_area" class="area">
    {{-- area  to view existing antonyms--}}
    <div id="area_to display_existing_antonyms" style="display:none;">

        <div class="page-title">উপলব্ধ বিপৰীত শব্দসমূহ হ'ল -</div>
            <div class="scroll-bg">
                <div class="scroll-div">
                   <table id="present_antonyms">
                   {{-- words are shown here --}}
                   </table>
                </div>
            </div>
          
        <div  id="add_more_antonym" class="add_more_btn"><i class="fa fa-plus fa-4x" aria-hidden="true"></i></div>
    </div>          
    {{-- to add synonyms     --}}
    <div id="area_to_add_antonyms">
    <div style="text-align: center;">
    <input id="selected_antonyms" class="single_input" readonly>
    <button class="button-xyz1" id="submit_antonyms"><i class="fa fa-save"></i></button>
    </div>
    <form  id="antonyms_search_form" enctype="multipart/form-data"  >
        <div class="search_bar">
            <div class="search">
                {{-- <button id="antonyms_kb" class="button-xyz" type="button"><i class='far fa-keyboard'></i></button>   --}}
                 <input type="text" class="searchTerm antonyms_search_input" id="antonyms_search_input"  placeholder="বিপৰীত শব্দ যোগ কৰিবলৈ টাইপ কৰক">
                 {{-- <button type="submit" id="antonyms_search_btn" class="searchButton">
                 <i class="fa fa-search"></i>
                 </button> --}}
                </form>
            </div>
         </div>
{{-- ////////// --}}
         
         <div class="scroll-bg" id="scroll-bg-antonym">
            <div id="success_msg_for_antonyms" style="color: rgb(8, 117, 59);font-size:3rem"></div>
            <div id="error_msg_for_antonyms" style="color: brown;font-size:3rem"></div>
             <div class="scroll-div" style="display: none;" id="scroll-div-antonym">
             <table >
                <tbody id="add_antonyms_selectlist_items">
                {{-- words are shown here --}}
                </tbody>
             </table>
             </div>
         </div>
</div>
</center>

<link type="text/css" rel="stylesheet" href="{{asset('../asset/css/admin/antonymsAndsynonyms.css')}}"> 
<script type="text/javascript" src="{{asset('../asset/js/admin/antonymsAndsynonyms.js')}}"></script>
@endsection