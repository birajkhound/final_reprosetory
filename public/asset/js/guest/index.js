
function getLanguageValue(){
    var lang = document.getElementById('language').value;
    if(lang == 'axom'){
        writeword(lang);
    document.getElementById('word0').placeholder = "অসমীয়াত টাইপ কৰক..." ;
    document.getElementById('word0').value = ''; 
    }else if(lang == 'english'){
       writeword(lang); 
    document.getElementById('word0').placeholder = "Type In English .....";
    document.getElementById('word0').value = ''; 
    }
}

    document.getElementById('assamese_kb').addEventListener('click',function(e){
        e.preventDefault();
    keyshowasm();
});  
function clearDivs(){
    document.getElementById('error_msg').innerHTML = '';
    document.getElementById('word').innerHTML = '';
    document.getElementById('explaination').innerHTML = '';
    document.getElementById('english').innerHTML = '';
    document.getElementById('translate').innerHTML = '';
    document.getElementById('keyword').innerHTML = '';
    document.getElementById('synonyms').innerHTML = '';
    document.getElementById('antonyms').innerHTML = '';
    document.getElementById('present_image').src = '';
    document.getElementById('temp_audio').value = '';
    document.getElementById('success_msg').innerHTML = '';
    document.getElementById('word1').innerHTML = '';
    document.getElementById('word2').innerHTML = '';
    document.getElementById('word3').innerHTML = '';
    document.getElementById('sugestion0').innerHTML  = '';
    document.getElementById('sugestion1').innerHTML  = '';
    document.getElementById('sugestion2').innerHTML  = '';
    document.getElementById('sugestion3').innerHTML  = '';
    document.getElementById('sugestion4').innerHTML  = '';
    document.getElementById('autocomplete').style.display = 'none';
    
    }  
document.getElementById('dismiss').addEventListener('click',function(e){
    e.preventDefault();
    clearDivs();
    document.querySelector('.result').style.display = 'none';
})

function searchOnClick(rWord){
    clearDivs();
    let search_data = new FormData();
	search_data.append('word_val',rWord);
    //   search_data.forEach((value, key) => {
    //             console.log(key + ': ' + value);
    //           });
	var  wordReq = new XMLHttpRequest();
	wordReq.open("POST","users_searcing_word",true);
	wordReq.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    wordReq.onprogress = function(){
        document.getElementById('myLoader').style.display = 'block';
        }
    wordReq.send(search_data);
    wordReq.onreadystatechange = function(){
	if(wordReq.readyState == 4 && wordReq.status == 200){
    var obj = JSON.parse(wordReq.responseText);
    // console.log(obj);
    document.getElementById('success_msg').innerHTML = 'আপুনি বিচৰা শব্দটো-';
    document.getElementById('word').innerHTML = "শব্দ : "+obj.words[0].word;
    document.getElementById('explaination').innerHTML = "অৰ্থ বিৱৰণ : "+obj.words[0].explanation;
    document.getElementById('english').innerHTML = "ইংৰাজী : "+obj.words[0].english;
    // document.getElementById('translate').innerHTML = "অনুবাদ : "+obj.words[0].translate;
    document.getElementById('keyword').innerHTML = "কীৱৰ্ড : "+obj.words[0].keywords;
    if(obj.words[0].antonyms != null){
    document.getElementById('synonyms').innerHTML = "বিপৰীত শব্দ : "+obj.words[0].antonyms;
    document.getElementById('synonyms').style.display = 'block';
}
if(obj.words[0].synonyms != null){
    document.getElementById('antonyms').innerHTML = "প্ৰতি শব্দ : "+obj.words[0].synonyms;
    document.getElementById('antonyms').style.display = 'block';
}
if(obj.words[0].sound != null){
    document.getElementById('audio').style.display = 'block';
    document.getElementById('temp_audio').value = obj.words[0].sound;
}
if(obj.words[0].image != null){

    document.getElementById('present_image').src = "../../../uploads/images/"+obj.words[0].image;
    document.getElementById('image').style.display = 'block';
}
    document.querySelector('.result').style.display = 'block';



    }
        document.getElementById('myLoader').style.display = 'none';
    }}

    document.getElementById('audio').addEventListener('click',function(){
        var music = document.getElementById('temp_audio').value; 
        let au = new Audio("../../../uploads/audios/"+music);
        au.play();
    });
    

document.getElementById('search').addEventListener('click',function(e){
    e.preventDefault();
    clearDivs();
   
    let word_val = document.getElementById('word0').value.trim();

if(word_val == ''){ 
    document.getElementById('audio').style.display = 'none';
        document.getElementById('image').style.display = 'none';
    document.getElementById('error_msg').innerHTML = 'অনুগ্ৰহ কৰি শব্দ সন্নিবিষ্ট কৰক।';
    document.querySelector('.result').style.display = 'block';
}else if(word_val.length >50){
    document.getElementById('audio').style.display = 'none';
    document.getElementById('image').style.display = 'none';
document.getElementById('error_msg').innerHTML = 'শব্দৰ দৈৰ্ঘ্য ৫০ আখৰতকৈ বেছি হ’ব নালাগে।';
document.querySelector('.result').style.display = 'block'; 
}
else{
    
    let search_data = new FormData();
	search_data.append('word_val',word_val);
    //   search_data.forEach((value, key) => {
    //             console.log(key + ': ' + value);
    //           });
	var  wordReq = new XMLHttpRequest();
	wordReq.open("POST","users_searcing_word",true);
	wordReq.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    wordReq.onprogress = function(){
        document.getElementById('myLoader').style.display = 'block';
        }
    wordReq.send(search_data);
    wordReq.onreadystatechange = function(){
	if(wordReq.readyState == 4 && wordReq.status == 200){
    var obj = JSON.parse(wordReq.responseText);
    // console.log(obj);
    document.getElementById('success_msg').innerHTML = 'আপুনি বিচৰা শব্দটো-';
    document.getElementById('word').innerHTML = "শব্দ : "+obj.words[0].word;
    document.getElementById('explaination').innerHTML = "অৰ্থ বিৱৰণ : "+obj.words[0].explanation;
    document.getElementById('english').innerHTML = "ইংৰাজী : "+obj.words[0].english;
    // document.getElementById('translate').innerHTML = "অনুবাদ : "+obj.words[0].translate;
    document.getElementById('keyword').innerHTML = "কীৱৰ্ড : "+obj.words[0].keywords;
    if(obj.words[0].antonyms != null){
    document.getElementById('synonyms').innerHTML = "বিপৰীত শব্দ : "+obj.words[0].antonyms;
    document.getElementById('synonyms').style.display = 'block';
}
if(obj.words[0].synonyms != null){
    document.getElementById('antonyms').innerHTML = "প্ৰতি শব্দ : "+obj.words[0].synonyms;
    document.getElementById('antonyms').style.display = 'block';
}
if(obj.words[0].sound != null){
    document.getElementById('audio').style.display = 'block';
    document.getElementById('temp_audio').value = obj.words[0].sound;
}
if(obj.words[0].image != null){

    document.getElementById('present_image').src = "../../../uploads/images/"+obj.words[0].image;
    document.getElementById('image').style.display = 'block';
}
    document.querySelector('.result').style.display = 'block';
  

    }
    else if(wordReq.status == 201){
        var obj = JSON.parse(wordReq.responseText);
        // console.log(obj); 
        document.getElementById('audio').style.display = 'none';
        document.getElementById('image').style.display = 'none';
    document.getElementById('success_msg').innerHTML = "আপুনি বিচৰা শব্দটো পোৱা নগ'ল কিন্তু আপুনি তলত দিয়া শব্দবোৰৰ বিষয়ে জানিব বিচাৰিবনিকি।";
    if(obj.words[0].word != null){
    document.getElementById('word1').innerHTML = "১) "+obj.words[0].word;
    document.querySelector('.result').style.display = 'block';
    document.getElementById('myLoader').style.display = 'none';
    document.getElementById('word1').addEventListener('click',function(){
        let sWord = JSON.stringify(obj.words[0].word);
        searchOnClick(sWord);
    });
}if(obj.words[1].word != null){
    document.getElementById('word2').innerHTML = "২) "+obj.words[1].word;
    document.querySelector('.result').style.display = 'block';
    document.getElementById('myLoader').style.display = 'none';
    document.getElementById('word2').addEventListener('click',function(){
        let sWord = JSON.stringify(obj.words[1].word);
        searchOnClick(sWord);
    });
}
if(obj.words[2].word != null){
    document.getElementById('word3').innerHTML = "৩) "+obj.words[2].word;
    document.querySelector('.result').style.display = 'block';
    document.getElementById('myLoader').style.display = 'none';
    document.getElementById('word3').addEventListener('click',function(){
        let sWord = JSON.stringify(obj.words[2].word);
        searchOnClick(sWord);
    })
} 
    
   
  
    }
    else if(wordReq.status == 400){
        var obj = JSON.parse(wordReq.responseText);
        document.getElementById('audio').style.display = 'none';
        document.getElementById('image').style.display = 'none';
        // console.log(obj); 
        document.getElementById('error_msg').innerHTML = obj.words;
        document.querySelector('.result').style.display = 'block';
    }
        document.getElementById('myLoader').style.display = 'none';
    }
}

})
document.getElementById('sugestion0').addEventListener('click',function(){
    document.getElementById("word0").value = '';
    document.getElementById("word0").value = document.getElementById('sugestion0').innerHTML;
   })
   document.getElementById('sugestion1').addEventListener('click',function(){
    document.getElementById("word0").value = '';
    document.getElementById("word0").value = document.getElementById('sugestion1').innerHTML;
   })
   document.getElementById('sugestion2').addEventListener('click',function(){
    document.getElementById("word0").value = '';
    document.getElementById("word0").value = document.getElementById('sugestion2').innerHTML;
   })
   document.getElementById('sugestion3').addEventListener('click',function(){
    document.getElementById("word0").value = '';
    document.getElementById("word0").value = document.getElementById('sugestion3').innerHTML;
   })
   document.getElementById('sugestion4').addEventListener('click',function(){
    document.getElementById("word0").value = '';
    document.getElementById("word0").value = document.getElementById('sugestion4').innerHTML;
   })

document.getElementById("word0").addEventListener('input',function(){
    clearDivs();
    document.getElementById('autocomplete').style.display = 'none';
	var word = document.getElementById("word0").value;
	//console.log(word);
	let check_data = new FormData();
	check_data.append('word_val',word);
	var  wordReq= new XMLHttpRequest();
	wordReq.open("POST","users_searcing_word_prediction",true);
	wordReq.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    wordReq.send(check_data);
    wordReq.onreadystatechange = function(){
	if(wordReq.readyState == 4 && wordReq.status == 200){
	  var wordObj = JSON.parse(wordReq.responseText);
    //   console.log(wordObj.word_checked);

    if(wordObj.word_checked[0].word != null){
    document.getElementById('sugestion0').innerHTML  = " "+ wordObj.word_checked[0].word +" ";
    document.getElementById('autocomplete').style.display = 'block';
}
 if(wordObj.word_checked[1].word != null){
    document.getElementById('sugestion1').innerHTML  = " "+ wordObj.word_checked[1].word +" ";
    document.getElementById('autocomplete').style.display = 'block';
}
    if(wordObj.word_checked[2].word != null){
    document.getElementById('sugestion2').innerHTML  = " "+ wordObj.word_checked[2].word +" ";
    document.getElementById('autocomplete').style.display = 'block';
}
    if(wordObj.word_checked[3].word != null){
    document.getElementById('sugestion3').innerHTML  = " "+ wordObj.word_checked[3].word +" ";
    document.getElementById('autocomplete').style.display = 'block';
}
    if(wordObj.word_checked[4].word != null){
    document.getElementById('sugestion4').innerHTML  = " "+ wordObj.word_checked[4].word +" ";
    document.getElementById('autocomplete').style.display = 'block';
}
   
  }
  
//   else if(wordReq.status == 400){
// 	console.log(responseText);}
}

});


