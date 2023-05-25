
<!-- Assamese Keyboard php -->

<div id="asm-keyboard" name="asm-keyboard" style="display:none;">
  <div class="close-key">
    <!-- <label class="switch">
      <input type="checkbox" onclick="showconjunction()" />
      <span class="slider round"></span>
    </label> -->
    <div onclick="keyhideasm()" class="close">
      <span aria-hidden="true">&times;</span>
    </div>
    <fieldset>
      <div class="switch-toggle switch-candy-blue mb-2">
        <input id="week" name="view" type="radio" checked>
        <label for="week" id="con" onclick="showconsonents()">আখৰ</label>
    
        <input id="month" name="view" type="radio">
        <label for="month" id="vow" onclick="showvowelsing()">চিন</label>

        <input id="day" name="view" type="radio">
        <label for="day" id="conjo" onclick="showconjunction()">যুক্তাক্ষৰ</label>
    
        <a></a>
      </div>

    </fieldset>
  
  </div>
  <div id="conjunction" style="display:none;">
  <input type="button" class="key" onclick="keyvalue('ম্প')" value="ম্প">
<input type="button" class="key" onclick="keyvalue('ৰ্ষ')" value="ৰ্ষ">
<input type="button" class="key" onclick="keyvalue('দ্র')" value="দ্র">
<input type="button" class="key" onclick="keyvalue('ল্ল')" value="ল্ল">
<input type="button" class="key" onclick="keyvalue('ন্ত')" value="ন্ত">
<input type="button" class="key" onclick="keyvalue('ল্প')" value="ল্প">
<input type="button" class="key" onclick="keyvalue('প্র')" value="প্র">
<input type="button" class="key" onclick="keyvalue('ধ্ৰু')" value="ধ্ৰু">
<input type="button" class="key" onclick="keyvalue('ম্ম')" value="ম্ম">
<input type="button" class="key" onclick="keyvalue('ন্ন')" value="ন্ন">
<input type="button" class="key" onclick="keyvalue('ত্য')" value="ত্য">
<input type="button" class="key" onclick="keyvalue('ত্র')" value="ত্র">
<input type="button" class="key" onclick="keyvalue('ন্তু')" value="ন্তু">
<input type="button" class="key" onclick="keyvalue('ম্ভ')" value="ম্ভ">
<input type="button" class="key" onclick="keyvalue('হ্ল')" value="হ্ল">
<input type="button" class="key" onclick="keyvalue('ষ্ক')" value="ষ্ক">
    <input type="button" class="key" value="ল্গ" onclick="keyvalueasm('ল্গ')" />
    <input type="button" class="key" onclick="keyvalueasm('ক্স')" value="ক্স" />
    <input type="button" class="key" onclick="keyvalueasm('ল্ল')" value="ল্ল" />
    <input type="button" class="key" onclick="keyvalueasm('ঞ্জ')" value="ঞ্জ" />
    <input type="button" class="key" onclick="keyvalueasm('হ্ন')" value="হ্ন" />
    <input type="button" class="key" onclick="keyvalueasm('ল্প')" value="ল্প" />
    <input type="button" class="key" onclick="keyvalueasm('ক্ক')" value="ক্ক" />
    <input type="button" class="key" onclick="keyvalueasm('ক্ত')" value="ক্ত" />
    <input type="button" class="key" onclick="keyvalueasm('ত্ত')" value="ত্ত" />
    <input type="button" class="key" onclick="keyvalueasm('দ্দ')" value="দ্দ" />
    <input type="button" class="key" onclick="keyvalueasm('ত্ব')" value="ত্ব" />
    <input type="button" class="key" onclick="keyvalueasm('ঞ্চ')" value="ঞ্চ" />
    <input type="button" class="key" onclick="keyvalueasm('চ্চ')" value="চ্চ" />
    <input type="button" class="key" onclick="keyvalueasm('ণ্ঠ')" value="ণ্ঠ" />
    <input type="button" class="key" onclick="keyvalueasm('ণ্ঢ')" value="ণ্ঢ" />
    <input type="button" class="key" onclick="keyvalueasm('দ্ব')" value="দ্ব" />
    <input type="button" class="key" onclick="keyvalueasm('ব্দ')" value="ব্দ" />
    <input type="button" class="key" onclick="keyvalueasm('ষ্ট')" value="ষ্ট" />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('শ্র​')"
      value="শ্র​"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('স্র​')"
      value="স্র​"
    />
    <input type="button" value="স্ব" onclick="keyvalueasm('স্ব')" class="key" />
    <input type="button" value="দ্ধ" onclick="keyvalueasm('দ্ধ')" class="key" />
    <input type="button" value="ম্ভ" onclick="keyvalueasm('ম্ভ')" class="key" />
    <input type="button" value="ন্দ" onclick="keyvalueasm('ন্দ')" class="key" />
    <input type="button" value="ণ্ড" onclick="keyvalueasm('ণ্ড')" class="key" />
    <input type="button" class="key" onclick="keyvalueasm('শ্ব')" value="শ্ব" />
    <input type="button" class="key" onclick="keyvalueasm('ন্স')" value="ন্স" />
    <input type="button" class="key" onclick="keyvalueasm('স্ন')" value="স্ন" />
    <input type="button" class="key" onclick="keyvalueasm('গ্ধ')" value="গ্ধ" />
    <input type="button" class="key" onclick="keyvalueasm('গ্ন')" value="গ্ন" />
    <input type="button" class="key" onclick="keyvalueasm('ঙ্ক')" value="ঙ্ক" />
    <input type="button" class="key" onclick="keyvalueasm('ঙ্গ')" value="ঙ্গ" />
    <input type="button" class="key" onclick="keyvalueasm('জ্জ')" value="জ্জ" />
    <input type="button" class="key" onclick="keyvalueasm('ঞ্ছ')" value="ঞ্ছ" />
    <input type="button" class="key" onclick="keyvalueasm('ট্ট')" value="ট্ট" />
    <input type="button" class="key" onclick="keyvalueasm('দ্ভ')" value="দ্ভ" />
    <input type="button" class="key" onclick="keyvalueasm('ত্ব')" value="ত্ব" />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('ত্থ​')"
      value="ত্থ​"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('ত্ম​')"
      value="ত্ম​"
    />
    <!-- <input
      type="button"
      value="ত্ৰু"
      onclick="keyvalueasm('ত্ৰু')"
      class="key"
    /> -->
    <input type="button" value="ধ্ব" onclick="keyvalueasm('ধ্ব')" class="key" />
    <input type="button" value="ন্ম" onclick="keyvalueasm('ন্ম')" class="key" />
    <input type="button" value="ন্থ" onclick="keyvalueasm('ন্থ')" class="key" />
    <input type="button" value="ন্ধ" onclick="keyvalueasm('ন্ধ')" class="key" />
    <input type="button" class="key" onclick="keyvalueasm('প্ত')" value="প্ত" />
    <input type="button" class="key" onclick="keyvalueasm('প্ল')" value="প্ল" />
    <input type="button" class="key" onclick="keyvalueasm('ব্ধ')" value="ব্ধ" />
    <input type="button" class="key" onclick="keyvalueasm('ম্ন')" value="ম্ন" />
    <input type="button" class="key" onclick="keyvalueasm('ম্ব')" value="ম্ব" />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('শ্ন​')"
      value="শ্ন​"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('শ্ব​')"
      value="শ্ব​"
    />
    <input type="button" value="শ্ম" onclick="keyvalueasm('শ্ম')" class="key" />
    <input type="button" value="ষ্ক" onclick="keyvalueasm('ষ্ক')" class="key" />
    <input type="button" value="ষ্ণ" onclick="keyvalueasm('ষ্ণ')" class="key" />
    <input type="button" value="ষ্প" onclick="keyvalueasm('ষ্প')" class="key" />
    <input type="button" value="হৃ" onclick="keyvalueasm('হৃ')" class="key" />
    <input type="button" class="key" onclick="keyvalueasm('ষ্ম')" value="ষ্ম" />
    <input type="button" class="key" onclick="keyvalueasm('হ্ম')" value="হ্ম" />
    <input type="button" class="key" onclick="keyvalueasm('ধ্ৰ')" value="ধ্ৰ" />
    <input type="button" class="key" onclick="keyvalueasm('ড°')" value="ড°" />
    <input type="button" class="key-back-1" onclick="back()" value="&#9003;">
    <input type="button" class="key-back" onclick="keyvalueasm('\u{0020}')" value="SPACE">
    {{-- <input type="button" class="key-enter" onclick="enter()" value="GO:সন্ধান"> --}}
  </div>
  <div id="symbolsasm" style="display:none;">
    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09BE}')"
      value="া"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09BF}')"
      value="ি"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09C0}')"
      value="ী"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09C1}')"
      value="ু"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09C2}')"
      value="ূ"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09C3}')"
      value="ৃ"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09C7}')"
      value="ে"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09C8}')"
      value="ৈ"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09CB}')"
      value="ো"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09CC}')"
      value="ৌ"
    />
    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('্য')"
      value="্য"
    />
    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09CD}')"
      value="্"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{09CE}')"
      value="ৎ"
    />

    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{0981}')"
      value="ঁ"
    />
    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{0982}')"
      value="ং"
    />
    <input
      type="button"
      class="key"
      title="#"
      onclick="keyvalueasm('\u{0983}')"
      value="ঃ"
    />
  </div>
  <div id="numericasm" style="display:none;">
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09E6}')"
      value="০"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09E7}')"
      value="১"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09E8}')"
      value="২"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09E9}')"
      value="৩"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09EA}')"
      value="৪"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09EB}')"
      value="৫"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09EC}')"
      value="৬"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09ED}')"
      value="৭"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09EE}')"
      value="৮"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09EF}')"
      value="৯"
    />
    <input type="button" class="key-back-1" onclick="back()" value="&#9003;">
    <input type="button" class="key-back" onclick="keyvalueasm('\u{0020}')" value="SPACE">
    {{-- <input type="button" class="key-enter" onclick="enter()" value="GO:সন্ধান"> --}}
  </div>
  <div id="vowasm">
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0985}')"
      value="অ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0986}')"
      value="আ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0987}')"
      value="ই"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0988}')"
      value="ঈ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0989}')"
      value="উ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{098A}')"
      value="ঊ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{098B}')"
      value="ঋ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{098F}')"
      value="এ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0990}')"
      value="ঐ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0993}')"
      value="ও"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0994}')"
      value="ঔ"
    />
  </div>
  <div id="charasm">
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0995}')"
      value="ক"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0996}')"
      value="খ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0997}')"
      value="গ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0998}')"
      value="ঘ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{0999}')"
      value="ঙ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{099A}')"
      value="চ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{099B}')"
      value="ছ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{099C}')"
      value="জ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{099D}')"
      value="ঝ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{099E}')"
      value="ঞ"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{099F}')"
      value="ট"
    />
    <input
      type="button"
      class="key"
      onclick="keyvalueasm('\u{09A0}')"
      value="ঠ"
    />
    <input
      type="button"
      value="ড"
      onclick="keyvalueasm('\u{09A1}')"
      class="key"
    />
    <input
      type="button"
      value="ঢ"
      onclick="keyvalueasm('\u{09A2}')"
      class="key"
    />
    <input
      type="button"
      value="ণ"
      onclick="keyvalueasm('\u{09A3}')"
      class="key"
    />
    <input
      type="button"
      value="ত"
      onclick="keyvalueasm('\u{09A4}')"
      class="key"
    />
    <input
      type="button"
      value="থ"
      onclick="keyvalueasm('\u{09A5}')"
      class="key"
    />
    <input
      type="button"
      value="দ"
      onclick="keyvalueasm('\u{09A6}')"
      class="key"
    />
    <input
      type="button"
      value="ধ"
      onclick="keyvalueasm('\u{09A7}')"
      class="key"
    />
    <input
      type="button"
      value="ন"
      onclick="keyvalueasm('\u{09A8}')"
      class="key"
    />
    <input
      type="button"
      value="প"
      onclick="keyvalueasm('\u{09AA}')"
      class="key"
    />
    <input
      type="button"
      value="ফ"
      onclick="keyvalueasm('\u{09AB}')"
      class="key"
    />
    <input
      type="button"
      value="ব"
      onclick="keyvalueasm('\u{09AC}')"
      class="key"
    />
    <input
      type="button"
      value="ভ"
      onclick="keyvalueasm('\u{09AD}')"
      class="key"
    />
    <input
      type="button"
      value="ম"
      onclick="keyvalueasm('\u{09AE}')"
      class="key"
    />
    <input
      type="button"
      value="য"
      onclick="keyvalueasm('\u{09AF}')"
      class="key"
    />
    <input type="button" value="ৰ" onclick="keyvalueasm('ৰ')" class="key" />
    <input
      type="button"
      value="ল"
      onclick="keyvalueasm('\u{09B2}')"
      class="key"
    />
    <input type="button" value="ৱ" onclick="keyvalueasm('ৱ')" class="key" />
    <input
      type="button"
      value="শ"
      onclick="keyvalueasm('\u{09B6}')"
      class="key"
    />
    <input
      type="button"
      value="ষ"
      onclick="keyvalueasm('\u{09B7}')"
      class="key"
    />
    <input
      type="button"
      value="স"
      onclick="keyvalueasm('\u{09B8}')"
      class="key"
    />
    <input
      type="button"
      value="হ"
      onclick="keyvalueasm('\u{09B9}')"
      class="key"
    />

    <input type="button" value="ক্ষ" onclick="keyvalueasm('ক্ষ')" class="key" />

    <input
      type="button"
      value="ড়"
      onclick="keyvalueasm('\u{09DC}')"
      class="key"
    />
    <input
      type="button"
      value="ঢ়"
      onclick="keyvalueasm('\u{09DD}')"
      class="key"
    />
    <input
    type="button"
    value="য়"
    onclick="keyvalueasm('\u{09DF}')"
    class="key"
  />
    <input type="button" class="key-back-1" onclick="back()" value="&#9003;">
    <input type="button" class="key-back" onclick="keyvalueasm('\u{0020}')" value="SPACE">
    {{-- <input type="button" class="key-enter" onclick="enter()" value="GO:সন্ধান"> --}}
    <!-- <input type="button" value="𑜐" onclick="keyvalueasm('\u{1171A}')" class="key"> -->
  </div>
</div>
