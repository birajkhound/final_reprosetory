if(typeof mobile_nav === 'undefined') {
   const mobile_nav = document.querySelector(".mobile-navbar-btn");
        const nav_header = document.querySelector(".header");
        const toggleNavbar = () => {
          nav_header.classList.toggle("active");
        };
        mobile_nav.addEventListener("click", () => toggleNavbar());}  
//----------profile
document.getElementById('profile').addEventListener('click',function(e){
  e.preventDefault();
  window.location.href = 'view_user_detail';
}); 
//----------words
document.getElementById('update').addEventListener('click',function(e){
  e.preventDefault();
  window.location.href = 'view_words_detail'; 
});  
//----------dashboard
document.getElementById('dashboard').addEventListener('click',function(e){
  e.preventDefault();
  window.location.href = '/dashboard'; 
}); 
//----------library
document.getElementById('library').addEventListener('click',function(e){
  e.preventDefault();
  window.location.href = 'view_library'; 
});  
//----------register
// document.getElementById('register').addEventListener('click',function(e){
//   e.preventDefault();
//   window.location.href = 'register'; 
// });      

const searchFun_kb = () =>{
  let filter = document.getElementById('search_kb').value.toUpperCase();
  let myTable =  document.querySelector('.table_body_kb');
  let tr = myTable.getElementsByTagName('tr');
  for(var i = 0; i<tr.length;i++){
    let td = tr[i].getElementsByTagName('td')[0];
    if(td){
      let textvalue = td.textContent || td.innerHTML;
    if(textvalue.toUpperCase().indexOf(filter)>-1){
      tr[i].style.display = "";
    }else{
      tr[i].style.display = "none";
    }}
  }
}