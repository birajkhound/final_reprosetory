var myData = sessionStorage.getItem('word_id');
let x = JSON.parse(myData);
//console.log(x);
var id = x;
var ants = new FormData;
ants.append('id',id);
var Req = new XMLHttpRequest();
Req.open("POST","add_antonyms_synonims",true);
Req.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
Req.onprogress = function(){
  document.getElementById('myLoader').style.display = 'block';
}
Req.send(ants);

Req.onreadystatechange = function(){
if(Req.readyState == 4 && Req.status == 200){
var word_details = JSON.parse(Req.responseText);
document.getElementById('title').innerHTML = word_details.this_word[0].word+"ৰ বিপৰীত আৰু প্ৰতিশব্দ যোগ কৰালৈ-";
  
}
document.getElementById('myLoader').style.display = 'none';
}
//delete synonyms
function dlt_sy_name(synonym,word){
  // console.log(synonym);
  // console.log(word);
  var delete_sy = new FormData;
  delete_sy.append('word',word);
  delete_sy.append('synonym',synonym);
  // delete_sy.forEach((value, key) => {
  //             	console.log(key + ': ' + value);
  //               });

  var sy_dlt_Req = new XMLHttpRequest();
  sy_dlt_Req.open("POST","delete_this_synonym",true);
  sy_dlt_Req.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
  sy_dlt_Req.onprogress = function(){
    document.getElementById('myLoader').style.display = 'block';
  }
  sy_dlt_Req.send(delete_sy);
  
  sy_dlt_Req.onreadystatechange = function(){
  if(sy_dlt_Req.readyState == 4 && sy_dlt_Req.status == 200){
    // var sy_dlt_obj = JSON.parse(sy_dlt_Req.responseText);
    //     console.log(sy_dlt_obj);
        document.getElementById(synonym).remove();
        
  }else{
    // var sy_dlt_obj = JSON.parse(sy_dlt_Req.responseText);
    // console.log(sy_dlt_obj);
  }
  document.getElementById('myLoader').style.display = 'none';
}
  }

//delete antonyms
function dlt_ant_name(antonym,word){
  // console.log(synonym);
  // console.log(word);
  var delete_ant = new FormData;
  delete_ant.append('word',word);
  delete_ant.append('antonym',antonym);
  // delete_sy.forEach((value, key) => {
  //             	console.log(key + ': ' + value);
  //               });

  var ant_dlt_Req = new XMLHttpRequest();
  ant_dlt_Req.open("POST","delete_this_antonym",true);
  ant_dlt_Req.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
  ant_dlt_Req.onprogress = function(){
    document.getElementById('myLoader').style.display = 'block';
  }
  ant_dlt_Req.send(delete_ant);
  
  ant_dlt_Req.onreadystatechange = function(){
  if(ant_dlt_Req.readyState == 4 && ant_dlt_Req.status == 200){
    // var ant_dlt_obj = JSON.parse(ant_dlt_Req.responseText);
    //     console.log(ant_dlt_obj);
        document.getElementById(antonym).remove();
       
  }else{
    // var ant_dlt_obj = JSON.parse(ant_dlt_Req.responseText);
    // console.log(ant_dlt_obj);
  }
  document.getElementById('myLoader').style.display = 'none';
}
  }


//toggle function
var toggled = true;
const toggleFunction = (element) =>{
        if(!toggled){
            toggled = true;      
            document.getElementById(element).style.display = "none";
            return;
        }
        if(toggled){
            toggled = false;
            document.getElementById(element).style.display = "block";
            var sy_an_data = new FormData();
            sy_an_data.append('word_id',id);
            // sy_data.forEach((value, key) => {
            //   	console.log(key + ': ' + value);
            //     });
    
                var sy_an_R = new XMLHttpRequest();
                sy_an_R.open("POST",element+'_chech_availability',true);
                sy_an_R.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                sy_an_R.onprogress = function(){
                  document.getElementById('myLoader').style.display = 'block';
                }
                sy_an_R.send(sy_an_data);
    
                sy_an_R.onreadystatechange = function(){
                  if(sy_an_R.readyState == 4 && sy_an_R.status == 200){
                    var sy_an_obj = JSON.parse(sy_an_R.responseText);
                //  console.log(sy_an_obj);
                 if(sy_an_obj.sy_available != null){
                  document.getElementById('area_to_add_synonyms').style.display = 'none'; 
                  document.getElementById('area_to display_existing_synonyms').style.display = 'block';
                var available_sy_table = document.getElementById('present_synonyms'); 
                available_sy_table.innerHTML = '';
                for( i=0; i< sy_an_obj.sy_available.length;i++){
                  // console.log(i);
                  // console.log(sy_obj.sy_available[i]['word']);
                  // console.log(sy_obj.sy_available[i]['word_id']);
                  available_sy_table.innerHTML += "<tr id="+sy_an_obj.sy_available[i]['word_id']+"><td onclick='dlt_sy_name("+sy_an_obj.sy_available[i]['word_id']+","+id+")'><img src='asset/logo/delete4.png' class='synonym_checkbox' alt=''/></td><td><label class='table_lable'>"+sy_an_obj.sy_available[i]['word']+"</label></td></tr>";
                }
               
                }
                if(sy_an_obj.ant_available != null){
                  document.getElementById('area_to_add_antonyms').style.display = 'none'; 
                  document.getElementById('area_to display_existing_antonyms').style.display = 'block';
                var available_ant_table = document.getElementById('present_antonyms'); 
                available_ant_table.innerHTML = '';
                for( i=0; i< sy_an_obj.ant_available.length;i++){
                  // console.log(i);
                  // console.log(sy_obj.sy_available[i]['word']);
                  // console.log(sy_obj.sy_available[i]['word_id']);
                  available_ant_table.innerHTML += "<tr id="+sy_an_obj.ant_available[i]['word_id']+"><td onclick='dlt_ant_name("+sy_an_obj.ant_available[i]['word_id']+","+id+")'><img src='asset/logo/delete4.png' class='synonym_checkbox' alt=''/></td><td><label class='table_lable'>"+sy_an_obj.ant_available[i]['word']+"</label></td></tr>";
                }
                
                }
                                
                  }else if(sy_an_R.status == 400){
                    // var sy_an_obj = JSON.parse(sy_an_R.responseText);
                    // console.log(sy_an_obj);
                  //  console.log(sy_R.responseText);
                  }
                  document.getElementById('myLoader').style.display = 'none'; 
                  }
            return;
        }
    }



        //function to use keyboard anywhere
        // const IdAndName = {
        //     input_ids : "word0",
        //     form_ids : "keyboard",
      
        //  get IDandName(){
        //  let result = [IdAndName.input_ids,IdAndName.form_ids];
        //   return result;
        // },
        //       set IDandName(dataArr){
        //     this.input_ids = dataArr[0];
        //     this.form_ids = dataArr[1];  
        // },
        // };
        // //format to set data
        // let dataArr = ['test1','test2'];
        // IdAndName.IDandName = dataArr;
        // //format to get data
        // console.log(IdAndName);
        // console.log(IdAndName.IDandName[0]);
        // console.log(IdAndName.IDandName[1]);
      
        // function Conversion(field,form){
        //   let find = document.getElementById('word0');
        //   if(find){
        //     document.getElementById('word0').name = IdAndName.IDandName[0];
        //     document.getElementById('word0').id = IdAndName.IDandName[0];
        //     document.getElementById('keyboard').name = IdAndName.IDandName[1];
        //     document.getElementById('keyboard').id = IdAndName.IDandName[1];
        //     input_ids = document.getElementById(field).id;
        //     form_ids = document.getElementById(form).id;
        //      let dataArr = [input_ids,form_ids];
        //       IdAndName.IDandName = dataArr;
        //     document.getElementById(field).name = "word0";
        //     document.getElementById(field).id = "word0";
        //     document.getElementById(form).name = "keyboard";
        //     document.getElementById(form).id = "keyboard";
        //   }else{
        //       input_ids = document.getElementById(field).id;
        //       form_ids = document.getElementById(form).id;
        //        let dataArr = [input_ids,form_ids];
        //         IdAndName.IDandName = dataArr;
        //       document.getElementById(field).name = "word0";
        //       document.getElementById(field).id = "word0";
        //       document.getElementById(form).name = "keyboard";
        //       document.getElementById(form).id = "keyboard";}
      
        // }
        // function submitConversion(){
        //   let find = document.getElementById('word0');
        //   if(find){
        //     document.getElementById('word0').name = IdAndName.IDandName[0];
        //     document.getElementById('word0').id = IdAndName.IDandName[0];
        //     document.getElementById('keyboard').name = IdAndName.IDandName[1];
        //     document.getElementById('keyboard').id = IdAndName.IDandName[1];}
        // }
      





//----------------antonyms--------------------
document.getElementById('antonyms').addEventListener('click',function(){  
  toggleFunction('antonyms_area');
  document.getElementById('synonyms_area').style.display = 'none'; 
  document.getElementById('error_msg_for_antonyms').innerHTML ='';
  document.getElementById('antonyms_search_input').value = '';
  });

  document.getElementById('add_more_antonym').addEventListener('click',function(){
    document.getElementById('area_to_add_antonyms').style.display = 'block'; 
    document.getElementById('area_to display_existing_antonyms').style.display = 'none';
      });


// document.getElementById('antonyms_kb').addEventListener('click',function(e){
//   e.preventDefault();
//   keyshowasm();
// });

// document.getElementById('antonyms_search_input').addEventListener("click",function(e){
//   e.preventDefault();
//   Conversion('antonyms_search_input','antonyms_search_form');
//   let language = 'axom';
//       writeword(language); 
// });

var namelist = document.getElementById('selected_antonyms');
var text = 'আপুনি নিৰ্বাচন কৰা বিপৰীত শব্দ : ';
var idArray = [];
var valueArray = [];
function readCheckbox(){
  var antonyms_area = document.getElementById('scroll-bg-antonym');
  var checkboxes = antonyms_area.querySelectorAll('.antonym_checkbox');
 for(var checkbox of checkboxes){
     checkbox.addEventListener('click',function(){
         if(this.checked == true){
            idArray.push(this.id);
            namelist.value = text + idArray.join('/');
            valueArray.push(this.value);
         }else{
            idArray = idArray.filter(e => e !== this.id);
            namelist.value = text + idArray.join('/');
            valueArray = valueArray.filter(e => e !== this.value);
         }
    })
 }
}
//------------------------------------------------------
    antonyms_table = document.getElementById('add_antonyms_selectlist_items');
    document.querySelector('.antonyms_search_input').addEventListener('input',(event)=>{
        event.preventDefault();
        // submitConversion();
        document.getElementById('success_msg_for_antonyms').innerHTML = '';
        document.getElementById('error_msg_for_antonyms').innerHTML = '';
        antonyms_table.innerHTML = '';
       let word_val = document.querySelector('.antonyms_search_input').value.trim();
       if(word_val === ""){
         document.getElementById('error_msg_for_antonyms').innerHTML = 'আপুনি প্ৰথমে শব্দ প্ৰবিষ্ট কৰা উচিত |';
         document.getElementById('scroll-div-antonym').style.display = 'none';
        //  namelist = '';
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
              if(id != obj.words[i]['word_id'] ){
              antonyms_table.innerHTML += "<tr><input type='checkbox' class='antonym_checkbox' value="+obj.words[i]['word_id']+" id="+obj.words[i]['word']+"><label class='table_lable'>"+obj.words[i]['word']+"</label></tr>";
            }}
            readCheckbox();
            document.getElementById('scroll-div-antonym').style.display = 'block';
           }else if(req.status == 400){
              var obj = JSON.parse(req.responseText);
              //console.log(obj);
              document.getElementById('error_msg_for_antonyms').innerHTML = '';
              document.getElementById('error_msg_for_antonyms').innerHTML = obj.words;
              document.getElementById('scroll-div-antonym').style.display = 'none';
           }
           
            document.getElementById('myLoader').style.display = 'none';
         
        }
       }
     
     });


     document.getElementById('submit_antonyms').addEventListener("click",function(e){
      e.preventDefault();
      if(valueArray.length == 0){
        antonyms_table.innerHTML = '';
        document.getElementById('success_msg_for_antonyms').innerHTML = '';
        document.getElementById('error_msg_for_antonyms').innerHTML = '';
        document.getElementById('error_msg_for_antonyms').innerHTML = 'আপুনি অন্ততঃ এটা শব্দ নিৰ্বাচন কৰিব লাগিব।';
        document.getElementById('scroll-div-antonym').style.display = 'none';
        document.getElementById('selected_antonyms').value = '';
        document.getElementById('antonyms_search_input').value = '';
      }else{
      // console.log(valueArray);
      // console.log(id);
      var antonyms = JSON.stringify(valueArray);
      var ant_data = new FormData();
      ant_data.append('word',id);
      ant_data.append('antonyms',antonyms);
      // ant_data.forEach((value, key) => {
      //   	console.log(key + ': ' + value);
      //     });

          var ant_R = new XMLHttpRequest();
          ant_R.open("POST","insert_antonyms",true);
          ant_R.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
          ant_R.onprogress = function(){
            document.getElementById('myLoader').style.display = 'block';
          }
          ant_R.send(ant_data);

          ant_R.onreadystatechange = function(){
            if(ant_R.readyState == 4 && ant_R.status == 200){
              var ant_obj = JSON.parse(ant_R.responseText);
            // console.log(ant_obj);   
              antonyms_table.innerHTML = '';
              // namelist.value = '';
              // valueArray ='';
              document.getElementById('antonyms_search_input').value = '';
              document.getElementById('success_msg_for_antonyms').innerHTML = '';
              document.getElementById('error_msg_for_antonyms').innerHTML = '';
              document.getElementById('success_msg_for_antonyms').innerHTML = ant_obj.ant_Inserted;
              document.getElementById('scroll-div-antonym').style.display = 'none';
            }
              else if(ant_R.status == 400){
                var ant_obj = JSON.parse(ant_R.responseText);
             // console.log(ant_obj); 
              antonyms_table.innerHTML = '';
            //   namelist.value = '';
            //  valueArray ='';
              document.getElementById('antonyms_search_input').value = '';
              document.getElementById('success_msg_for_antonyms').innerHTML = '';
              document.getElementById('error_msg_for_antonyms').innerHTML = '';
              document.getElementById('error_msg_for_antonyms').innerHTML = ant_obj.ant_Inserted_error;
              document.getElementById('scroll-div-antonym').style.display = 'none';

              }else{
                // var ant_obj = JSON.parse(ant_R.responseText);
                // console.log(ant_obj); 
              }
                document.getElementById('myLoader').style.display = 'none';
            }




    }
  });


//------------synonyms---------------------------------
document.getElementById('synonyms').addEventListener('click',function(){      
  toggleFunction('synonyms_area');
  document.getElementById('antonyms_area').style.display = 'none';
  document.getElementById('error_msg_for_synonym').innerHTML ='';
  document.getElementById('synonyms_search_input').value = '';
  });

  document.getElementById('add_more_synonym').addEventListener('click',function(){
    document.getElementById('area_to_add_synonyms').style.display = 'block'; 
    document.getElementById('area_to display_existing_synonyms').style.display = 'none';
      });

  

  // document.getElementById('synonims_kb').addEventListener('click',function(e){
  //   e.preventDefault();
  //   keyshowasm();
  // });

//   document.getElementById('synonyms_search_input').addEventListener("click",function(e){
//     e.preventDefault();
//     Conversion('synonyms_search_input','search_synonym_form');
//     let language = 'axom';
//         writeword(language); 
// });

var synonymnamelist = document.getElementById('selected_synonyms');
var synonymtext = 'আপুনি নিৰ্বাচন কৰা প্ৰতিশব্দ : ';
var synonymidArray = [];
var synonymValueArray = [];
function synonymReadCheckbox(){
  var synonyms_area = document.getElementById('scroll-bg-synonym');
  var checkboxes = synonyms_area.querySelectorAll('.synonym_checkbox');
 for(var checkbox of checkboxes){
     checkbox.addEventListener('click',function(){
         if(this.checked == true){
            synonymidArray.push(this.id);
            synonymnamelist.value = synonymtext + synonymidArray.join('/');
            synonymValueArray.push(this.value);
         }else{
            synonymidArray = synonymidArray.filter(e => e !== this.id);
            synonymnamelist.value = synonymtext + synonymidArray.join('/');
            synonymValueArray = synonymValueArray.filter(e => e !== this.value);
         }
    })
 }
}
//------------------------------------------------------

    synonyms_table = document.getElementById('add_synonyms_selectlist_items');
    document.querySelector('.synonyms_search_input').addEventListener('input',(event)=>{
        event.preventDefault();
        // submitConversion();
        document.getElementById('success_msg_for_synonym').innerHTML = '';
        document.getElementById('error_msg_for_synonym').innerHTML = '';
        synonyms_table.innerHTML = '';
       let word_val = document.querySelector('.synonyms_search_input').value.trim();
       if(word_val === ""){
         document.getElementById('error_msg_for_synonym').innerHTML = 'আপুনি প্ৰথমে শব্দ প্ৰবিষ্ট কৰা উচিত |';
         document.getElementById('scroll-div-synonym').style.display = 'none';
        //  synonymnamelist.value = '';
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
              if(id != obj.words[i]['word_id'] ){
              synonyms_table.innerHTML += "<tr class='p-5'><input type='checkbox' class='synonym_checkbox' value="+obj.words[i]['word_id']+" id="+obj.words[i]['word']+"><label class='table_lable'>"+obj.words[i]['word']+"</label></tr>";
            }}
            synonymReadCheckbox();
            document.getElementById('scroll-div-synonym').style.display = 'block';
           }else if(req.status == 400){
              var obj = JSON.parse(req.responseText);
              //console.log(obj);
              document.getElementById('error_msg_for_synonym').innerHTML = '';
              document.getElementById('error_msg_for_synonym').innerHTML = obj.words;
              document.getElementById('scroll-div-synonym').style.display = 'none';
           }
 document.getElementById('myLoader').style.display = 'none';
        }
       }
     
     });


     document.getElementById('submit_synonyms').addEventListener("click",function(e){
      e.preventDefault();
      if(synonymValueArray.length == 0){
        synonyms_table.innerHTML = '';
        synonymnamelist.value = '';
        document.getElementById('success_msg_for_synonym').innerHTML = '';
        document.getElementById('synonyms_search_input').value = '';
        document.getElementById('error_msg_for_synonym').innerHTML = '';
        document.getElementById('error_msg_for_synonym').innerHTML = 'আপুনি অন্ততঃ এটা শব্দ নিৰ্বাচন কৰিব লাগিব।';
        document.getElementById('scroll-div-synonym').style.display = 'none';
      }else{
        var synonyms = JSON.stringify(synonymValueArray);
        var sy_data = new FormData();
        sy_data.append('word',id);
        sy_data.append('synonyms',synonyms);
        // sy_data.forEach((value, key) => {
        //   	console.log(key + ': ' + value);
        //     });

            var sy_R = new XMLHttpRequest();
            sy_R.open("POST","insert_synonyms",true);
            sy_R.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            sy_R.onprogress = function(){
              document.getElementById('myLoader').style.display = 'block';
            }
            sy_R.send(sy_data);

            sy_R.onreadystatechange = function(){
              if(sy_R.readyState == 4 && sy_R.status == 200){
                var sy_obj = JSON.parse(sy_R.responseText);
               // console.log(sy_obj);   
                synonyms_table.innerHTML = '';
                // synonymnamelist.value = '';
                // synonymValueArray ='';
                document.getElementById('synonyms_search_input').value = '';
                document.getElementById('success_msg_for_synonym').innerHTML = '';
                document.getElementById('error_msg_for_synonym').innerHTML = '';
                document.getElementById('success_msg_for_synonym').innerHTML = sy_obj.sy_Inserted;
                document.getElementById('scroll-div-synonym').style.display = 'none';
              }
                else if(sy_R.status == 400){
                  var sy_obj = JSON.parse(sy_R.responseText);
               // console.log(sy_obj); 
                synonyms_table.innerHTML = '';
                // synonymnamelist.value = '';
                // synonymValueArray ='';
                document.getElementById('synonyms_search_input').value = '';
                document.getElementById('success_msg_for_synonym').innerHTML = '';
                document.getElementById('error_msg_for_synonym').innerHTML = '';
                document.getElementById('error_msg_for_synonym').innerHTML = sy_obj.sy_Inserted_error;
                document.getElementById('scroll-div-synonym').style.display = 'none';

                }
                  document.getElementById('myLoader').style.display = 'none';
              }
    }
  });