document.getElementById('download').addEventListener('click',function(e){
   e.preventDefault();
   // var doc = new jsPDF();
   // doc.fromHTML(document.getElementById('update_table'),5,5);
   // doc.save("words.pdf");
   printJS({
      printable: 'scroll-bg',
      type: 'html',
      targetStyles: ['*'],
      header: 'ডাটাবেছত বৰ্তমান উপলব্ধ শব্দ'
   })
})

document.getElementById('keyboard1').addEventListener('click',function(e){
    e.preventDefault();
     keyshowasm();
 });

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

//audio play
   const  playAudio=(music)=>{
      if(music !== null){
         let au = new Audio("../../../uploads/audios/"+music);
         au.play();
      }else{
         alert("অডিঅ' এতিয়াও আপলোড কৰা হোৱা নাই।");
      }
   }

//image 
const displayImg=(image)=>{
   if(image != null){
      document.getElementById('image_absent').innerHTML = '';
   document.getElementById('present_image').src = "../../../uploads/images/"+image;}
   else{
      document.getElementById('image_absent').innerHTML = '';
      document.getElementById('present_image').src = '';
      document.getElementById('image_absent').innerHTML = 'ছবি উপলব্ধ নহয়।';
   }
}

  var library_table = document.getElementById("library_table");
  document.getElementById('search').addEventListener('click',(event)=>{
   event.preventDefault();
   document.getElementById('error_msg').innerHTML = '';
   library_table.innerHTML = '';
  let word_val = document.getElementById('word0').value.trim();
  if(word_val === ""){
    document.getElementById('error_msg').innerHTML = 'আপুনি প্ৰথমে শব্দ প্ৰবিষ্ট কৰা উচিত |';
    document.querySelector('.area').style.display = 'none';
  }else{

   var s_word = new FormData();
   s_word.append('word_val',word_val);
//    s_word.forEach((value, key) => {
//       console.log(key + ': ' + value);
//     });
    var req = new XMLHttpRequest();
    req.open("POST","search_in_library",true);
    req.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    req.onprogress = function(){
      document.getElementById('myLoader').style.display = 'block';
     }
    req.send(s_word);
   //  onprogress = function(event) {
    req.onreadystatechange = function(){
      if(req.readyState == 4 && req.status == 200){

        var obj = JSON.parse(req.responseText);
        // console.log(obj);
      
        for( i=0; i< obj.words.length;i++){
         let image = JSON.stringify(obj.words[i]['image']);
         let sound = JSON.stringify(obj.words[i]['sound']);
         library_table.innerHTML += "<tr><td>শব্দ: "+obj.words[i]['word']+"</td><td>অৰ্থ: "+obj.words[i]['explanation']+"</td><td>ইংৰাজী: "+obj.words[i]['english']+"</td><td>অনুবাদ: "+obj.words[i]['translate']+"</td><td>কীৱৰ্ড: "+obj.words[i]['keywords']+"</td><td onclick='playAudio("+sound+")' class='music'><i class='fa fa-music fa-2x' aria-hidden='true'></i></td><td onclick='displayImg("+image+")' class='image'><button type='button'  data-toggle='modal' data-target='#imageModal'><i class='fa fa-camera fa-2x' aria-hidden='true'></i></button></td><td>বিপৰীত শব্দ: "+obj.words[i]['antonyms']+"<br>প্ৰতি শব্দ: "+obj.words[i]['synonyms']+"</td></tr>";
         
       }
       library_table.style.display = 'block';
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
  }  });