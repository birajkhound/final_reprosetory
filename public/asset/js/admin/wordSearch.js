 document.getElementById('keyboard1').addEventListener('click',function(e){
    e.preventDefault();
    keyshowasm();
 });

//  document.getElementById('word0').addEventListener("click",function(e){
//    e.preventDefault();
//     let language = 'axom';
//     writeword(language); 
//   });
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
  
 const sendId = (id) =>{
  sessionStorage.setItem('word_id',id);
  window.location.href = 'word_update_form';
}

const addSynonim = (id) =>{
  sessionStorage.setItem('word_id',id);
  window.location.href = 'view_antonyms_synonims';
}

  var update_table = document.getElementById("update_table");
  update_table.style.display = 'none';
  document.getElementById('search').addEventListener('click',(event)=>{
   event.preventDefault();
   document.getElementById('error_msg').innerHTML = '';
   update_table.innerHTML = '';
  let word_val = document.getElementById('word0').value.trim();
  if(word_val === ""){
    document.getElementById('error_msg').innerHTML = 'আপুনি প্ৰথমে শব্দ প্ৰবিষ্ট কৰা উচিত |';
    document.querySelector('.area').style.display = 'none';
  }else{
   
   var s_word = new FormData();
   s_word.append('word_val',word_val);
   // s_word.forEach((value, key) => {
   //    console.log(key + ': ' + value);
   //  });
    var req = new XMLHttpRequest();
    req.open("POST","get_Words_Tables_data",true);
    req.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    req.onprogress = function(){
      document.getElementById('myLoader').style.display = 'block';
      }
    req.send(s_word);
    req.onreadystatechange = function(){
      if(req.readyState == 4 && req.status == 200){
        var obj = JSON.parse(req.responseText);
      //  console.log(obj);
      
        for( i=0; i< obj.words.length;i++){
         update_table.innerHTML += "<tr><td onclick='sendId("+obj.words[i]['word_id']+")'>"+obj.words[i]['word']+"</td><td onclick='addSynonim("+obj.words[i]['word_id']+")'>বিপৰীতশব্দ আৰু প্ৰতিশব্দ</td></tr>";
       }
       update_table.style.display = 'block';
       document.querySelector('.area').style.display = 'block';
      }else if(req.status == 400){
         var obj = JSON.parse(req.responseText);
         //console.log(obj);
         document.querySelector('.area').style.display = 'none';
         document.getElementById('error_msg').innerHTML = '';
         document.getElementById('error_msg').innerHTML = obj.words;
         
      }
        document.getElementById('myLoader').style.display = 'none';
   }
  }

});



