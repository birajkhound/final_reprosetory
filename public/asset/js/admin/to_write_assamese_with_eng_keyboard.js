// to_write_assamese_using_eng_keyboard

function writeword(language)
{
	var lang = language;
	if(lang=='axom')
	{
		document.getElementById("word0").onkeyup=function(){writeassamese()};
		// alert('axom');
	}
	else
	{
		document.getElementById("word0").onkeyup=function(){};
	}
	
}
//FUNCTION TO CONVERT KEYBOARD QWERTY INTO ASSAMESE LETTER----
var letter;
function writeassamese() {
letter = document.keyboard.word0.value; 
// vowel and symbol
letter = letter.replace(/a/g, "অ");
letter = letter.replace(/aa/g, "আ");
letter = letter.replace(/i/g, "ই");
letter = letter.replace(/ii/g, "ঈ");
letter = letter.replace(/u/g, "উ");
letter = letter.replace(/uu/g, "ঊ");
letter = letter.replace(/wr/g, "ঋ");
letter = letter.replace(/e/g, "এ");
letter = letter.replace(/oi/g, "ঐ");
letter = letter.replace(/o/g, "ও");
letter = letter.replace(/ow/g, "ঔ");
letter = letter.replace(/ওw/g, "ঔ");

letter = letter.replace(/অঅ/g, "আ");
letter = letter.replace(/ইই/g, "ঈ");
letter = letter.replace(/উউ/g, "ঊ");

letter = letter.replace(/ওই/g, "ঐ");
letter = letter.replace(/ওউ/g, "ঔ");
//letter = letter.replace(/re/g, "ঋ");

// vowel pronounciation symbol



//consonants

/* letter = letter.replace(/n/g, "ন্");
letter = letter.replace(/k/g, "ক্");
letter = letter.replace(/g/g, "গ্");
letter = letter.replace(/c/g, "চ্");
letter = letter.replace(/j/g, "জ্");
letter = letter.replace(/T/g, "ট্");
letter = letter.replace(/D/g, "ড্");
letter = letter.replace(/N/g, "ণ্");
letter = letter.replace(/t/g, "ত্");
letter = letter.replace(/d/g, "দ্");
letter = letter.replace(/p/g, "প্");
letter = letter.replace(/b/g, "ব্");
letter = letter.replace(/m/g, "ম্");
letter = letter.replace(/Y/g, "য়্");  
letter = letter.replace(/R/g, "ড়্")
letter = letter.replace(/y/g, "য্");
letter = letter.replace(/r/g, "ৰ্");
letter = letter.replace(/l/g, "ল্");
letter = letter.replace(/v/g,"ৱ্");
letter = letter.replace(/h/g, "হ্");
letter = letter.replace(/S/g, "ষ্");
letter = letter.replace(/s/g, "স্");
letter = letter.replace(/G/g, "ঙ্");
letter = letter.replace(/J/g, "ঞ্");
letter = letter.replace(/ন্গ্/g, "ঙ্");
letter = letter.replace(/ন্জ্/g, "ঞ্");
letter = letter.replace(/ক্হ্/g, "খ্");
letter = letter.replace(/গ্হ্/g, "ঘ্");
letter = letter.replace(/চ্হ্/g, "ছ্");
letter = letter.replace(/জ্হ্/g, "ঝ্");
letter = letter.replace(/ট্হ্/g, "ঠ্");
letter = letter.replace(/ড্হ্/g, "ঢ্");
letter = letter.replace(/ত্হ্/g, "থ্");
letter = letter.replace(/দ্হ্/g, "ধ্");
letter = letter.replace(/প্হ্/g, "ফ্");
letter = letter.replace(/ব্হ্/g, "ভ্");
letter = letter.replace(/ড়্হ্/g, "ঢ়্");
letter = letter.replace(/স্হ্/g, "শ্");
letter = letter.replace(/ৰ্ৰি/g, "ঋ");
letter = letter.replace(/X/g, "ক্ষ"); */
// ponctuation mark
letter = letter.replace(/\|/g, "।");
letter = letter.replace(/\//g, "।");
letter = letter.replace(/।।/g, "॥");    

//CONSONANTS WITH VOWEL

letter = letter.replace(/ka/g, "ক");
letter = letter.replace(/kঅ/g, "ক");
letter = letter.replace(/kha/g, "খ");
letter = letter.replace(/khঅ/g, "খ");
letter = letter.replace(/ga/g, "গ");
letter = letter.replace(/gঅ/g, "গ");
letter = letter.replace(/ghঅ/g, "ঘ");
letter = letter.replace(/nগ/g, "ঙ");
letter = letter.replace(/chঅ/g, "চ");;
letter = letter.replace(/sও/g, "ছ");
letter = letter.replace(/jও/g, "জ");
letter = letter.replace(/jhও/g, "ঝ");
letter = letter.replace(/nyঅ/g, "ঞ");
letter = letter.replace(/tও/g, "ট");
letter = letter.replace(/thও/g, "ঠ");
letter = letter.replace(/dও/g, "ড");
letter = letter.replace(/dhও/g, "ঢ");
letter = letter.replace(/nও/g, "ণ");
letter = letter.replace(/tঅ/g, "ত");
letter = letter.replace(/thঅ/g, "থ");
letter = letter.replace(/dঅ/g, "দ");
letter = letter.replace(/dhঅ/g, "ধ");
letter = letter.replace(/nঅ/g, "ন");
letter = letter.replace(/pও/g, "প");
letter = letter.replace(/fও/g, "ফ");
letter = letter.replace(/bও/g, "ব");
letter = letter.replace(/vও/g, "ভ");
letter = letter.replace(/mও/g, "ম");
letter = letter.replace(/zও/g, "য");
letter = letter.replace(/rও/g, "ৰ");
letter = letter.replace(/lও/g, "ল");
letter = letter.replace(/wb/g, "ৱ");
letter = letter.replace(/xhঅ/g, "শ");
letter = letter.replace(/xঅ/g, "ষ");
letter = letter.replace(/sঅ/g, "স");
letter = letter.replace(/hও/g, "হ");
letter = letter.replace(/khy/g, "ক্ষ");
letter = letter.replace(/dr/g, "ঢ়");
letter = letter.replace(/dhr/g, "ড়");
letter = letter.replace(/yও/g, "য়");
letter = letter.replace(/A/g, "া"); 
letter = letter.replace(/I/g, "ি");
letter = letter.replace(/II/g, "ী");
letter = letter.replace(/U/g, "ু");
letter = letter.replace(/UU/g, "ূ");
letter = letter.replace(/িি/g, "ী");
letter = letter.replace(/ুু/g, "ূ");
letter = letter.replace(/OI/g, "ৈ");
letter = letter.replace(/োি/g, "ৈ");
letter = letter.replace(/OW/g, "ৌ");
letter = letter.replace(/োW/g, "ৌ");
letter = letter.replace(/WR/g, "ৃ");
letter = letter.replace(/Wড়্/g, "ৃ");
letter = letter.replace(/E/g, "ে");
letter = letter.replace(/O/g, "ো");
//letter = letter.replace(/য়্অ/g, "য়");
letter = letter.replace(/`/g,"্");

// anusvara and khandatta
letter = letter.replace(/ht/g, "ৎ");
//Anusvara
letter = letter.replace(/nউ/g, "ং");

// candrabindu 
letter = letter.replace(/cn/g, "ঁ");
// visarga
letter = letter.replace(/bkh/g, "ঃ");
// assamese number system
letter = letter.replace(/0/g, "০");
letter = letter.replace(/1/g, "১");
letter = letter.replace(/2/g, "২");
letter = letter.replace(/3/g, "৩");
letter = letter.replace(/4/g, "৪");
letter = letter.replace(/5/g, "৫");
letter = letter.replace(/6/g, "৬");
letter = letter.replace(/7/g, "৭");
letter = letter.replace(/8/g, "৮");
letter = letter.replace(/9/g, "৯");

document.keyboard.word0.value=letter;
var obj=document.keyboard.word0;
obj.focus();
obj.scrollTop=obj.scrollHeight;
}

//FUNCTION TO INSERT CHARACTER----------------------
  function keyvalue(item) { 
		var input = document.keyboard.word0;
		 if (document.selection) { 
            input.focus();
			range = document.selection.createRange() ;
			range.text = item ;
            range.select(); 
		}
		else if (input.selectionStart || input.selectionStart == '0') {
		var startPos = input.selectionStart;
		var endPos = input.selectionEnd;
		var cursorPos = startPos;
		var scrollTop = input.scrollTop;
		var baselength = 0;
		input.value = input.value.substring(0, startPos)+ item+ input.value.substring(endPos, input.value.length);
		cursorPos += item.length;
		input.focus();
		input.selectionStart = cursorPos;
		input.selectionEnd = cursorPos;
		input.scrollTop = scrollTop;
		}
	else {
		input.value += item;
		input.focus();
	}
}