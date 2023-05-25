 function clrNotification(){
     document.getElementById('data_inserted').innerHTML = '';
     document.getElementById('data_validation_error').innerHTML = '';
     document.getElementById('word_error').innerHTML = '';
     document.getElementById('explaination_error').innerHTML = '';
     document.getElementById('english_error').innerHTML = '';
     document.getElementById('translate_error').innerHTML = '';
     document.getElementById('keyword_error').innerHTML = '';
     document.getElementById('audio_error').innerHTML = '';
     document.getElementById('image_error').innerHTML = '';}  

clrNotification();

    var word = document.getElementById("word") ;
    var explanation = document.getElementById("explaination") ;
    var english = document.getElementById("english") ;
    var translate = document.getElementById("translate") ;
    var keyword = document.getElementById("keyword") ;
    var audio = document.getElementById("upload");
    var image = document.getElementById("image");
	var old_image = document.getElementById('old_image');
	var old_audio = document.getElementById('old_audio');

	
var myData = sessionStorage.getItem('word_id');
let x = JSON.parse(myData);
// console.log(x);
var newId = word_id = x;
var ants = new FormData;
ants.append('id',newId);
var Req = new XMLHttpRequest();
Req.open("POST","find_details_of_this_word",true);
Req.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
Req.onprogress = function(){
	document.getElementById('myLoader').style.display = 'block';
  }
Req.send(ants);

Req.onreadystatechange = function(){
if(Req.readyState == 4 && Req.status == 200){
var word_details = JSON.parse(Req.responseText);
word.value = word_details.wordUp.word;
explanation.value = word_details.wordUp.explanation;
english.value = word_details.wordUp.english;
translate.value = word_details.wordUp.translate;
keyword.value = word_details.wordUp.keywords;
if(word_details.wordUp.sound !== null){
	old_audio.value = word_details.wordUp.sound;
	const ctx = new AudioContext();
	let au;
	fetch("../../../uploads/audios/"+word_details.wordUp.sound)
	 .then(data=>data.arrayBuffer())
	 .then(arrayBuffer => ctx.decodeAudioData(arrayBuffer))
	 .then(decodeAudio =>{
		au = decodeAudio;
	 });
	 function playback(){
		const playsound = ctx.createBufferSource();
		playsound.buffer = au;
		playsound.connect(ctx.destination);
		playsound.start(ctx.currentTime);
	 }
	 document.getElementById('upload').style.display = 'none';
	 document.getElementById('audio').style.display = 'none';
	 document.getElementById('present_sound').addEventListener('click',playback);
	 document.getElementById('present_sound').style.display = 'block';
	 document.getElementById('remove_sound').style.display = 'block';
}
if(word_details.wordUp.image !== null){
     old_image.value = word_details.wordUp.image;
		 //fatch and view image
			document.getElementById('present_image').src = "../../../uploads/images/"+word_details.wordUp.image;
			document.getElementById('present_image').style.display ='block';
			document.getElementById('prompt').style.display = 'none';
			document.getElementById('image').style.display = 'none';
	}
}
	document.getElementById('myLoader').style.display = 'none';
}
//to add new audio 
 document.getElementById('remove_sound').addEventListener('click',function(e){
	e.preventDefault();
	document.getElementById('upload').style.display = 'block';
 document.getElementById('audio').style.display = 'block';
 document.getElementById('present_sound').remove();
 document.getElementById('remove_sound').remove();
 })
//audio preview
function handleFiles(event) {
    var files = event.target.files;
    $("#src").attr("src", URL.createObjectURL(files[0]));
    document.getElementById("audio").load();
    }
document.getElementById("upload").addEventListener("change", handleFiles, false); 



//image Preview
document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
	const dropZoneElement = inputElement.closest(".drop-zone");

	dropZoneElement.addEventListener("click", (e) => {
		inputElement.click();
	});

	inputElement.addEventListener("change", (e) => {
		if (inputElement.files.length) {
			updateThumbnail(dropZoneElement, inputElement.files[0]);
		}
	});

	dropZoneElement.addEventListener("dragover", (e) => {
		e.preventDefault();
		dropZoneElement.classList.add("drop-zone--over");
	});

	["dragleave", "dragend"].forEach((type) => {
		dropZoneElement.addEventListener(type, (e) => {
			dropZoneElement.classList.remove("drop-zone--over");
		});
	});

	dropZoneElement.addEventListener("drop", (e) => {
		e.preventDefault();

		if (e.dataTransfer.files.length) {
			inputElement.files = e.dataTransfer.files;
			updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
		}

		dropZoneElement.classList.remove("drop-zone--over");
	});
});

function updateThumbnail(dropZoneElement, file) {
	document.getElementById('present_image').style.display = 'none';
	let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

	// First time - remove the prompt
	if (dropZoneElement.querySelector(".drop-zone__prompt")) {
		dropZoneElement.querySelector(".drop-zone__prompt").remove();
	}

	// First time - there is no thumbnail element, so lets create it
	if (!thumbnailElement) {
		thumbnailElement = document.createElement("div");
		thumbnailElement.classList.add("drop-zone__thumb");
		dropZoneElement.appendChild(thumbnailElement);
	}

	thumbnailElement.dataset.label = file.name;

	// Show thumbnail for image files
	if (file.type.startsWith("image/")) {
		const reader = new FileReader();

		reader.readAsDataURL(file);
		reader.onload = () => {
			thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
		};
	} else {
		thumbnailElement.style.backgroundImage = null;
	}
}
//keyboard button
document.getElementById('asm_kb').addEventListener('click',function(e){
	e.preventDefault();
	keyshowasm();
 }); 

//check availability of word
let w_v = 0;
document.querySelector(".single_input").addEventListener('input',function(){
	var word = document.querySelector(".single_input").value;
	//console.log(word);
	let check_data = new FormData();
	check_data.append('word',word);
	var  wordReq= new XMLHttpRequest();
	wordReq.open("POST","check_availability",true);
	wordReq.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
	wordReq.onprogress = function(){
		document.getElementById('myLoader').style.display = 'block';
	  }
    wordReq.send(check_data);
    wordReq.onreadystatechange = function(){
	if(wordReq.readyState == 4 && wordReq.status == 200){
	  var wordObj = JSON.parse(wordReq.responseText);
	        document.getElementById('data_validation_error').innerHTML = '';
			document.getElementById('data_inserted').innerHTML = '';
			document.getElementById('data_validation_error').innerHTML = wordObj.word_checked;
			w_v = 1;
  }else if(wordReq.status == 400){
	var wordObj= JSON.parse(wordReq.responseText);
	document.getElementById('data_validation_error').innerHTML = '';
	document.getElementById('data_inserted').innerHTML = '';
	document.getElementById('data_inserted').innerHTML = wordObj.word_checked;
	w_v = 0;
	}
		document.getElementById('myLoader').style.display = 'none';
}
}); 

    //function to use keyboard anywhere
	const IdAndName = {
		input_ids : "word0",
		form_ids : "keyboard",
  
	 get IDandName(){
	 let result = [IdAndName.input_ids,IdAndName.form_ids];
	  return result;
	},
		  set IDandName(dataArr){
		this.input_ids = dataArr[0];
		this.form_ids = dataArr[1];  
	},
	};
	// //format to set data
	// let dataArr = ['test1','test2'];
	// IdAndName.IDandName = dataArr;
	// //format to get data
	// console.log(IdAndName);
	// console.log(IdAndName.IDandName[0]);
	// console.log(IdAndName.IDandName[1]);
  
	function Conversion(field,form){
	  let find = document.getElementById('word0');
	  if(find){
		document.getElementById('word0').name = IdAndName.IDandName[0];
		document.getElementById('word0').id = IdAndName.IDandName[0];
		document.getElementById('keyboard').name = IdAndName.IDandName[1];
		document.getElementById('keyboard').id = IdAndName.IDandName[1];
		input_ids = document.getElementById(field).id;
		form_ids = document.getElementById(form).id;
		 let dataArr = [input_ids,form_ids];
		  IdAndName.IDandName = dataArr;
		document.getElementById(field).name = "word0";
		document.getElementById(field).id = "word0";
		document.getElementById(form).name = "keyboard";
		document.getElementById(form).id = "keyboard";
	  }else{
		  input_ids = document.getElementById(field).id;
		  form_ids = document.getElementById(form).id;
		   let dataArr = [input_ids,form_ids];
			IdAndName.IDandName = dataArr;
		  document.getElementById(field).name = "word0";
		  document.getElementById(field).id = "word0";
		  document.getElementById(form).name = "keyboard";
		  document.getElementById(form).id = "keyboard";}
  
	}
	function submitConversion(){
	  let find = document.getElementById('word0');
	  if(find){
		document.getElementById('word0').name = IdAndName.IDandName[0];
		document.getElementById('word0').id = IdAndName.IDandName[0];
		document.getElementById('keyboard').name = IdAndName.IDandName[1];
		document.getElementById('keyboard').id = IdAndName.IDandName[1];}
	}
  
  document.getElementById('word').addEventListener("click",function(e){
	  e.preventDefault();
	  Conversion('word','inserForm');
	  let language = 'axom';
		  writeword(language); 
  });
  document.getElementById('explaination').addEventListener("click",function(e){
	  e.preventDefault();
	  Conversion('explaination','inserForm');
	  let language = 'axom';
		  writeword(language); 
  });


  //form submit
	document.getElementById('submit_update').addEventListener("click",function(e){
		e.preventDefault();
		submitConversion();
		clrNotification();
		var word = document.getElementById("word").value ;
		var explanation = document.getElementById("explaination").value ;
		var english = document.getElementById("english").value ;
		var translate = document.getElementById("translate").value.toLowerCase();
		var keyword = document.getElementById("keyword").value ;
		var audio = document.getElementById("upload").files[0];
		var image = document.getElementById("image").files[0];
		var myaudio = document.getElementById('old_audio').value;
		var myimage = document.getElementById('old_image').value;
	   
		if(word == ""){
		  document.getElementById('word_error').innerHTML = 'শব্দ ক্ষেত্ৰৰ প্ৰয়োজন';
		}
		if(explanation == ""){
		  document.getElementById('explaination_error').innerHTML = 'ব্যাখ্যা ক্ষেত্ৰৰ প্ৰয়োজন';
		}
		if(english == ""){
			document.getElementById('english_error').innerHTML = 'ইংৰাজী ক্ষেত্ৰৰ প্ৰয়োজন';
		  }
		if(translate == ""){
		  document.getElementById('translate_error').innerHTML = 'ইংৰাজী অনুবাদ ক্ষেত্ৰৰ প্ৰয়োজন';
		}
		if(keyword == ""){
		  document.getElementById('keyword_error').innerHTML = 'কীৱৰ্ড ক্ষেত্ৰৰ প্ৰয়োজন';
		}

		let a_x = 0;
		if(document.getElementById("upload").value !== ""){
			if(audio.size<102400){
			let f_name = audio.name;
            let f_audio = f_name.substring(f_name.lastIndexOf('.') + 1);
            let allowedtypes = ['mp3'];
            if(!allowedtypes.includes(f_audio)){
             document.getElementById('audio_error').innerHTML = "অডিঅ’ ফাইলটো .mp3 ফৰ্মেটৰ আৰু আকাৰ 100kb তকৈ কম হ'ব লাগে।";
			 a_x = 2;
            }else{
				a_x = 1;
			} 
          }else{
			document.getElementById('audio_error').innerHTML = "অডিঅ’ ফাইলটো .mp3 ফৰ্মেটৰ আৰু আকাৰ 100kb তকৈ কম হ'ব লাগে।";
			a_x = 2;
		  }}

		  let i_x = 0;
		  if(document.getElementById("image").value !== ""){
			if(image.size<102400){
			let f_name = image.name;
            let f_image = f_name.substring(f_name.lastIndexOf('.') + 1);
            let allowedtypes = ['jpeg','png','jpg'];
            if(!allowedtypes.includes(f_image)){
             document.getElementById('image_error').innerHTML = "ছবিখন .jpeg , .png বা .jpg বিন্যাসৰ হ'ব লাগে";
			 i_x = 2;
            }else{i_x = 1;}}
			else{
				document.getElementById('image_error').innerHTML = "ছবিখন .jpeg , .png বা .jpg বিন্যাসৰ আৰু আকাৰ 100kb তকৈ কম হ'ব লাগে।";
			 i_x = 2;
			}
		}

			let update_data = new FormData();
			if(word != "" && w_v == 0 && explanation != "" && translate != "" &&keyword != "" && english != "" && a_x == 0 && i_x == 0){
                update_data.append("word_id",word_id); 
				update_data.append("word",word); 
				update_data.append("explanation",explanation); 
				update_data.append("translate",translate); 
				update_data.append("keyword",keyword); 
				update_data.append("english",english);  
			  }
			else if(word != "" && w_v == 0 && explanation != "" && translate != "" &&keyword != "" && english != "" && a_x == 1 && i_x == 0){
                update_data.append("word_id",word_id); 
				update_data.append("word",word); 
				update_data.append("explanation",explanation); 
				update_data.append("translate",translate); 
				update_data.append("keyword",keyword); 
				update_data.append("english",english); 
				update_data.append("audio",audio); 
				if(myaudio != ''){
				update_data.append("old_audio",myaudio);}
			  }
			  else if(word != "" && w_v == 0 && explanation != "" && translate != "" && keyword != "" && english != "" && a_x == 1 && i_x == 1){  
				update_data.append("word_id",word_id); 
				update_data.append("word",word); 
				update_data.append("explanation",explanation); 
				update_data.append("translate",translate); 
				update_data.append("keyword",keyword); 
				update_data.append("english",english); 
				update_data.append("audio",audio); 
				update_data.append("image",image);
				if(myaudio != '' && myimage != ''){
				update_data.append("old_image",myimage);
				update_data.append("old_audio",myaudio);}
			  } 
			  else if(word != "" && w_v == 0 && explanation != "" && translate != "" && keyword != "" && english != "" && a_x == 0 && i_x == 1){
                update_data.append("word_id",word_id); 
				update_data.append("word",word); 
				update_data.append("explanation",explanation); 
				update_data.append("translate",translate); 
				update_data.append("keyword",keyword); 
				update_data.append("english",english);  
				update_data.append("image",image);
				if(myimage != ''){
				update_data.append("old_image",myimage); }
			  } 
			

			  if(word != "" && w_v == 0 && explanation != "" && translate != "" && keyword != "" && english != "" && a_x != 2 &&  i_x != 2){
				// update_data.forEach((value, key) => {
				// 	console.log(key + ': ' + value);
				//   });
			  var  updReq= new XMLHttpRequest();
			  updReq.open("POST","submitUpdate",true);
			  updReq.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
			  updReq.onprogress = function(){
				document.getElementById('myLoader').style.display = 'block';
			  }
			updReq.send(update_data);
			updReq.onreadystatechange = function(){
			  if(updReq.readyState == 4 && updReq.status == 200){
				var updObj = JSON.parse(updReq.responseText);
			      	//console.log(objt.Updated);
			       // console.log(insObj);
					document.getElementById('data_inserted').innerHTML = updObj.updated;
			}
			else if(updReq.status == 400){
				//var insObj = JSON.parse(insReq.responseText);
			      	//console.log(objt.Updated);
			      // console.log(updReq.responseText);
					document.getElementById('data_validation_error').innerHTML = 'তথ্যসমূহ পুনৰ পৰীক্ষা কৰাৰ প্ৰয়োজন।';
				 ///console.log(insReq.responseText);
			  }
				document.getElementById('myLoader').style.display = 'none';
			}
			}else{
				document.getElementById('data_validation_error').innerHTML = 'তথ্যসমূহ পুনৰ পৰীক্ষা কৰাৰ প্ৰয়োজন।';
			 }
	});