// js file to call assamese keyboard
var index = 0;
var active  = false;
$(document).ready(function(){
   $('body').on('keydown', function(e) { 
      var keyCode = e.keyCode || e.which; 

      if (keyCode == 9 && active) { 
          e.preventDefault(); 

          if(index == 0){
              $("#vow").click();
          }else if(index == 1){
              $("#conjo").click();
          }else if(index == 2){
              $("#con").click();
          }
      } 
   });
})
function keyshowasm() {
  active = true;
  $("#asm-keyboard").slideDown();
  $("#word0").attr('readonly', true);
  $('html, body').animate({
          scrollTop: $("#word0").offset().top - 40
      }, 500);

}
function showconjunction() {
  index = 2;
  $("#symbolsasm").slideUp();
  $("#numericasm").slideUp();
  $("#charasm").slideUp();
  $("#vowasm").slideUp();
  $("#conjunction").slideDown();
}
function showconsonents() {
  index = 0;
  $("#symbolsasm").slideUp();
  $("#numericasm").slideUp();
  $("#charasm").slideDown();
  $("#vowasm").slideDown();
  $("#conjunction").slideUp();
}
function showvowelsing() {
  index = 1;
  $("#symbolsasm").slideDown();
  $("#numericasm").slideDown();
  $("#charasm").slideUp();
  $("#vowasm").slideUp();
  $("#conjunction").slideUp();
}

  function back() {
      var value = document.getElementById("word0").value;
      document.getElementById("word0").value = value.substr(0, value.length - 1);
      }

  // function enter(){
  //     document.getElementById("keyboard").submit();
  // }
  

function keyhideasm() {
  active = false;
  $("#asm-keyboard").slideUp();
  $("#word0").removeAttr("readonly", "readonly");
}

$(document).mousedown(function(e) {
  var container = $("#asm-keyboard");
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    container.slideUp();
    $("#word0").removeAttr("readonly", "readonly");
  }
});

function keyvalueasm(item) {
  var input = document.keyboard.word0;
  if (document.selection) {
    input.focus();
    range = document.selection.createRange();
    range.text = item;
    range.select();
  } else if (input.selectionStart || input.selectionStart == "0") {
    var startPos = input.selectionStart;
    var endPos = input.selectionEnd;
    var cursorPos = startPos;
    var scrollTop = input.scrollTop;
    var baselength = 0;
    input.value =
      input.value.substring(0, startPos) +
      item +
      input.value.substring(endPos, input.value.length);
    cursorPos += item.length;
    input.focus();
    input.selectionStart = cursorPos;
    input.selectionEnd = cursorPos;
    input.scrollTop = scrollTop;
  } else {
    input.value += item;
    input.focus();
  }
}