
@extends('layout.assamesekeyboard')
@extends('layout.guestlayout')
@section('header')
@parent
@stop


@section('content')
<link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/guest/home.css')}}">
    <div class="search-back">
        <div class="search-front ">
           <div class="search_form shadow">
            <select id="language" onchange="getLanguageValue()" class="lang_select bg-success">
              <option value="english">ইংৰাজী</option>
              <option value="axom">অসমীয়া</option>
            </select>
                <form name="keyboard" id="keyboard" enctype="multipart/form-data" style="width:100%;display: flex;">
                  <input type="text" class="searchTerm" id="word0" name="word0" placeholder="Type In English .....">
                  <button type="submit" id="search" class="searchButton bg-success"><i class="fa fa-search"></i></button>
                </form>
              <button class="button1 btn bg-success" id="assamese_kb">কিবৰ্ড</button>
            </div>
            <div class="autocomplete" id="autocomplete"><label id="sugestion0"></label>/<label id="sugestion1"></label>/<label id="sugestion2"></label>/<label id="sugestion3"></label>/<label id="sugestion4"></label></div> 
        </div> 
        
        
    </div>
    
    <div class="result">
        <button type="button" class="close" id="dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <small id ="success_msg" style="color: rgb(8, 158, 63);font-size:2rem;margin-top:1rem;text-allign:center;position:relative;"></small>
            <small id ="error_msg" style="color: brown;font-size:2rem;margin-top:1rem;text-allign:center;position:relative;"></small>
            <div id="word"></div>
            <div id="word1"></div>
            <div id="word2"></div>
            <div id="word3"></div>
            <input type="text" style="display: none;" id="temp_audio">
            <div id="explaination"></div>
            <div id="english"></div>
            <div id="translate"></div>
            <div id="keyword"></div>
            <div id="audio" style="display: none;"><label>উচ্চাৰণ :</label> <i class='fa fa-music' aria-hidden='true'></i></div>
            <div id="image" data-toggle='modal' data-target='#imageModal' style="display: none;"><label>ছবি :</label> <i class='fa fa-camera' aria-hidden='true'></i></div>
            <div id="synonyms" style="display: none;"></div>
            <div id="antonyms" style="display: none;"></div>
    </div>

    {{-- <div class="scrolling"><p><a href="http://astec.assam.gov.in" >অসম বিজ্ঞান প্ৰযুক্তিবিদ্যা আৰু পৰিৱেশ পৰিষদৰ সহযোগত</a>,<a href="http://jecassam.ac.in" > যোৰহাট অভিযান্ত্ৰিক মহাবিদ্যালয়ৰ </a><a href="https://jecassam.ac.in/post-graduate/computer-application/" >কম্পিউটাৰ প্ৰয়োগ বিভাগৰ দ্বাৰা বিকশিত</a>,&copy; ASTEC (২০১৬ - ১৭)</p></div> --}}
<div class="keyboard_area">
    <div class="text-back-keyboard">
      <div>
          <div class="text-heading">KEYBOARD</div>
          <div class="text-subheading">How To Type Assamese</div>
          <br>
    <div class="text-content"> <p>অসমীয়া কিবর্ড খন সক্ৰিয় বা নিষ্ক্ৰীয় কৰিবলৈ "কিবর্ড" বুটামটো ক্লিক কৰক। লগতে আপোনাৰ কম্পিউটাৰৰ লগত থকা ইংৰাজী কিবর্ডৰ সহায়ত অসমীয়া লিখিবলৈ ইয়াত উল্লেখ থকা ধৰনে কিবোৰ টিপক। উদাহৰণস্বৰূপে 'অ' লিখিবলৈ 'a' টিপক, 'ক' লিখিবলৈ "ka" টিপক। a(অ), aa(আ), i(ই),ii(ঈ), u(উ), uu(ঊ), wr(ঋ), e(এ), oi(ঐ), o(ও), ou(ঔ), ka(ক), kha(খ),ga(গ), gha(ঘ), nga(ঙ), cha(চ), so(ছ), jo(জ), jho(ঝ), nya(ঞ), to(ট), tho(ঠ), do(ড), dho(ঢ), no(ণ),ta(ত), tha(থ), da(দ), dha(ধ), na(ন), po(প), fo(ফ), bo(ব), vo(ভ), mo(ম), zo(য), ro(ৰ), lo(ল), wba(ৱ), xha(শ), xa(ষ), sa(স), ho(হ), khy(ক্ষ), dr(ড়), dhr(ঢ়), yo(য়),A(া),I(ি),II(ী),U(ু),UU(ূ),WR(ৃ),E(ে),OI(ৈ),O(ো),OW(ৌ),ht(ৎ), nu(ং), bkh(ঃ), cn(ঁ)। যুক্তাক্ষৰৰ বাবে (`) টিপিব ।<p> </div>
  
      </div>
  </div>
</div>

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
  
  <script type="text/javascript" src="{{asset('../asset/js/guest/index.js')}}"></script>
  @endsection
