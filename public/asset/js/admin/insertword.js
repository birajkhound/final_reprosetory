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
// document.getElementById('keyword').addEventListener("click",function(e){
// 	e.preventDefault();
// 	Conversion('keyword','inserForm');
// 	let language = 'axom';
// 	    writeword(language); 
// });

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
}
});


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


//form submit
	document.getElementById('insert').addEventListener("click",function(e){
		e.preventDefault();
		submitConversion();
		var word = document.getElementById("word").value ;
		var explanation = document.getElementById("explaination").value ;
		var english = document.getElementById("english").value ;
		var translate = document.getElementById("translate").value.toLowerCase() ;
		var keyword = document.getElementById("keyword").value ;
		var audio = document.getElementById("upload").files[0];
		var image = document.getElementById("image").files[0];
		document.getElementById('data_inserted').innerHTML = '';
		document.getElementById('data_validation_error').innerHTML = '';
		document.getElementById('word_error').innerHTML = '';
		document.getElementById('explaination_error').innerHTML = '';
		document.getElementById('english_error').innerHTML = '';
		document.getElementById('translate_error').innerHTML = '';
		document.getElementById('keyword_error').innerHTML = '';
		document.getElementById('audio_error').innerHTML = '';
		document.getElementById('image_error').innerHTML = '';
	   
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
		if(document.getElementById("upload").value == ""){
			document.getElementById('audio_error').innerHTML = "অডিঅ' ক্ষেত্ৰৰ প্ৰয়োজন";
		  }else{
			if(audio.size<102400){ 
            let f_name = audio.name;
            let f_audio = f_name.substring(f_name.lastIndexOf('.') + 1);
            let allowedtypes = ['mp3'];
            if(!allowedtypes.includes(f_audio)){
             document.getElementById('audio_error').innerHTML = "অডিঅ’ ফাইলটো .mp3 বিন্যাসৰ আৰু আকাৰ 100kb তকৈ কম হ'ব লাগে।";
         } else{
          a_x = 1;
         }}else{
			document.getElementById('audio_error').innerHTML = "অডিঅ’ ফাইলটো .mp3 বিন্যাসৰ আৰু আকাৰ 100kb তকৈ কম হ'ব লাগে।";
		 }
          }

		  let i_x = 0;
		  
		  if(document.getElementById("image").value !== ""){
			if(image.size<102400){
			let f_name = image.name;
            let f_image = f_name.substring(f_name.lastIndexOf('.') + 1);
            let allowedtypes = ['jpeg','png','jpg'];
            if(!allowedtypes.includes(f_image)){
             document.getElementById('image_error').innerHTML = "ছবিখন .jpeg , .png বা .jpg বিন্যাসৰ হ'ব লাগে";
			 i_x = 1;
            }else{ i_x = 2;}}
			else{
				document.getElementById('image_error').innerHTML = "ছবিখন .jpeg , .png বা .jpg বিন্যাসৰ আৰু আকাৰ 100kb তকৈ কম হ'ব লাগে।";
			 i_x = 1;
			}
		}
		

			let insert_data = new FormData();
			if(word != "" && w_v == 0 && explanation != "" && translate != "" &&keyword != "" && english != "" && a_x == 1 && i_x == 0){
				insert_data.append("word",word); 
				insert_data.append("explanation",explanation); 
				insert_data.append("translate",translate); 
				insert_data.append("keyword",keyword); 
				insert_data.append("english",english); 
				insert_data.append("audio",audio); 
			  }
			  else if(word != "" && w_v == 0 && explanation != "" && translate != "" && keyword != "" && english != "" && a_x == 1 && i_x == 2){
				insert_data.append("word",word); 
				insert_data.append("explanation",explanation); 
				insert_data.append("translate",translate); 
				insert_data.append("keyword",keyword); 
				insert_data.append("english",english); 
				insert_data.append("audio",audio); 
				insert_data.append("image",image);
			  } 
			

			  if(word != "" && w_v == 0 && explanation != "" && translate != "" && keyword != "" && english != "" && a_x == 1 && (i_x == 0 || i_x == 2)){
				// insert_data.forEach((value, key) => {
				// 	console.log(key + ': ' + value);
				//   });
			  var  insReq= new XMLHttpRequest();
			  insReq.open("POST","insert_word_form",true);
			  insReq.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
			  insReq.onprogress = function(){
				document.getElementById('myLoader').style.display = 'block';
			  }
			insReq.send(insert_data);
			insReq.onreadystatechange = function(){
			  if(insReq.readyState == 4 && insReq.status == 200){
				var insObj = JSON.parse(insReq.responseText);
			      	//console.log(objt.Updated);
			       // console.log(insObj);
					document.getElementById('data_inserted').innerHTML = insObj.inserted;
			}else if(insReq.status == 400){
				//var insObj = JSON.parse(insReq.responseText);
			      	//console.log(objt.Updated);
			       // console.log(insObj);
					document.getElementById('data_validation_error').innerHTML = 'তথ্যসমূহ পুনৰ পৰীক্ষা কৰাৰ প্ৰয়োজন।';
				 ///console.log(insReq.responseText);
			  }else{
				console.log(insReq.responseText);
			  }
				document.getElementById('myLoader').style.display = 'none';
			}
			}
	});
	




















 //read excel file
 const input = document.getElementById('file-input');
 const table = document.getElementById('excel-table');
 let str = document.getElementById("strong");
 input.addEventListener('change', (event) => {
	 str.innerHTML ='';
	 const file = event.target.files[0];
if(input.value === "" ){
 document.getElementById('file-input-validation').innerHTML ='';
 document.getElementById('file-input-validation').innerHTML ='insert file field ৰ প্ৰয়োজন আৰু ই .xlsx বিন্যাসৰ হব লাগে ।';
 document.getElementById('file-input-validation').style.display = 'block';
 table.innerHTML = '';
 document.getElementById('scroll-bg1').style.display = "none";
}else{
let f_name = file.name;
let f_exe = f_name.substring(f_name.lastIndexOf('.') + 1);
let allowedtypes = ['xlsx'];
if(allowedtypes.includes(f_exe)){
 document.getElementById('file-input-validation').innerHTML ='';

 readXlsxFile(file).then((rows) => {
		 // Clear the table
		 table.innerHTML = '';

		 // Add the rows to the table
		 rows.forEach((row) => {
			 const tr = document.createElement('tr');
			 row.forEach((cell) => {
				 const td = document.createElement('td');
				 td.textContent = cell;
				 tr.appendChild(td);
			 });
			 table.appendChild(tr);
		 });
	 });
	 document.getElementById('scroll-bg1').style.display = "block";
}
else{
 document.getElementById('file-input-validation').innerHTML ='';
 document.getElementById('file-input-validation').innerHTML ='invalid file format file should be in .xlsx format';
 document.getElementById('file-input-validation').style.display = 'block';
 table.innerHTML = '';
 document.getElementById('scroll-bg1').style.display = "none";
}
}
});


//________________________________________
document.getElementById('import').addEventListener('click',function(){

//form array of exel data    
 let tableArray = [];
let table = document.getElementById("excel-table");
for (let i = 0, row; row = table.rows[i]; i++) {
let rowArray = [];
for (let j = 0, col; col = row.cells[j]; j++) {
 rowArray.push(col.innerHTML);
}
tableArray.push(rowArray);
}  
//console.log(tableArray);
let excel_data1 = JSON.stringify(tableArray); 
//console.log(excel_data1);

//send data
let ex_data = new FormData();
ex_data.append("words",excel_data1); 
var xhr = new XMLHttpRequest();
xhr.open("POST","insert_word_excel",true);
xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
xhr.onprogress = function(){
	document.getElementById('myLoader').style.display = 'block';
  }
//xhr.setRequestHeader("Content-Type","application/json;charset=UTF-8");
xhr.send(ex_data);

xhr.onreadystatechange = function(){
//console.log(xhr.readyState);
if(xhr.readyState == 4 && xhr.status == 200){
var obj1 = JSON.parse(xhr.responseText);
str.innerHTML = '';
str.innerHTML = obj1.Inserted;
table.innerHTML = '';
document.getElementById('scroll-bg1').style.display = "none";

//console.log(obj1)
}
//______________
//condition to check http errors  
//  else{
// console.log(xhr.responseText);
// }
	document.getElementById('myLoader').style.display = 'none';

}
});