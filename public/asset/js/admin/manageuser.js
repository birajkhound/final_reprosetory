//getting authanticated user details
var req = new XMLHttpRequest();
req.open("GET","authanticated_user",true);
req.onprogress = function(){
   document.getElementById('myLoader').style.display = 'block';
  }
req.send();
req.onreadystatechange = function(){
  if(req.readyState == 4 && req.status == 200){
    var myData = req.responseText;
    let x = JSON.parse(myData);
    document.getElementById('admin_id').value = x.userdetails.id ;
    document.getElementById('admin_name').value = x.userdetails.name.toUpperCase();
    document.getElementById('admin_email').value = x.userdetails.email.toUpperCase();
}else if(req.status == 400){
 window.location.href = 'logout'; 
}
   document.getElementById('myLoader').style.display = 'none';
}

//Change_email
    document.getElementById('change_email_button').addEventListener('click',function(e){
        e.preventDefault();
        let auth_id = document.getElementById('admin_id').value;
        let auth_new_email = document.getElementById('new_email').value.trim();
      let auth_password = document.getElementById('admin_password').value.trim();
      let email_chainged = document.getElementById("email_change_success");
      document.getElementById('admin_password_error').innerHTML = '';
      document.getElementById('new_email_error').innerHTML = '';
      email_chainged.innerHTML = '';
        let  e_v = 0;
        let p_v =0;
        if(auth_new_email === ''){
             document.getElementById('new_email_error').innerHTML = 'Email fiels is required';
             e_v = 1;
          }
          else{
             if(auth_new_email.indexOf('@') < 1 || auth_new_email.lastIndexOf('.') < auth_new_email.indexOf('@') + 2 || auth_new_email.lastIndexOf('.') === auth_new_email.length -1){
                document.getElementById('new_email_error').innerHTML = 'invalid email';  
                e_v = 1;
             }
          }
          if(auth_password === ''){
             document.getElementById('admin_password_error').innerHTML = 'Password fiels is required';
             p_v = 1;
          }
          else{
             if( auth_password.length >= 8 && (auth_password.indexOf('@') !== -1 ||auth_password.indexOf('#') !== -1||auth_password.indexOf('$') !== -1|| auth_password.indexOf('%') !== -1||  auth_password.indexOf('&') !== -1 || auth_password.indexOf('*') !== 
                -1)){p_v =0;}
             else{
                document.getElementById('admin_password_error').innerHTML = 'password should be greaterthan equal to 8 character and it should contain special character';
                p_v =1;
             }}
    
             if(p_v == 0 && e_v == 0){
              let email_data = new FormData();
              email_data.append("auth_id",auth_id);
              email_data.append("email",auth_new_email);
              email_data.append("password",auth_password);
            //   email_data.forEach((value, key) => {
            //     console.log(key + ': ' + value);
            //   });
              var  emailR= new XMLHttpRequest();
              emailR.open("POST","change_user_mail",true);
              emailR.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
              emailR.onprogress = function(){
               document.getElementById('myLoader').style.display = 'block';
              }
              emailR.send(email_data);
              emailR.onreadystatechange = function(){
              if(emailR.readyState == 4 && emailR.status == 200){
                var emailobj = JSON.parse(emailR.responseText);
                email_chainged.innerHTML = emailobj.email_change;
            }else if(emailR.status == 400){
               var emailobj = JSON.parse(emailR.responseText);
                  email_chainged.innerHTML = 'Invalid Credentials';
                  //email_chainged.innerHTML = emailobj.email_error.password[0];
                  // email_chainged.innerHTML = emailobj.email_error.email[0];
                  // email_chainged.innerHTML = emailobj.email_error.auth_id[0]; 
            }
               document.getElementById('myLoader').style.display = 'none';
             }
             }
      });

//change_password
document.getElementById('change_password_button').addEventListener('click',function(e){
    e.preventDefault();
    let auth_id = document.getElementById('admin_id').value;
    let auth_old_password = document.getElementById('old_password').value.trim();
    let auth_new_password = document.getElementById('new_password').value.trim();
    let auth_confirm_password = document.getElementById('new_confirm_password').value.trim();
    let password_chainged = document.getElementById("password_change_success");
  document.getElementById('new_password_error').innerHTML = '';
  document.getElementById('new_confirm_password_error').innerHTML = '';
  document.getElementById('old_password_error').innerHTML = '';
  password_chainged.innerHTML = '';
    let o_p = 0;
    let  n_p = 0;
    let c_p =0;
    if(auth_old_password === ''){
         document.getElementById('old_password_error').innerHTML = 'Old password is required';
         o_p = 1;
      }
  
      if(auth_new_password === ''){
         document.getElementById('new_password_error').innerHTML = 'New password fiels is required';
         n_p = 1;
      }
      else{
         if( auth_new_password.length >= 8 && (auth_new_password.indexOf('@') !== -1 ||auth_new_password.indexOf('#') !== -1||auth_new_password.indexOf('$') !== -1|| auth_new_password.indexOf('%') !== -1||  auth_new_password.indexOf('&') !== -1 || auth_new_password.indexOf('*') !== 
            -1)){n_p = 0;}
         else{
            document.getElementById('new_password_error').innerHTML = 'password should be greaterthan equal to 8 character and it should contain special character';
            n_p =1;
         }}
         if(auth_confirm_password === ''){
          document.getElementById('new_confirm_password_error').innerHTML = 'Confirm password is required';
          c_p = 1;
         }
         else if(auth_confirm_password !== auth_new_password){
          document.getElementById('new_confirm_password_error').innerHTML = 'Confirm password and new password should match';
          c_p = 1;
         }
  
         if(o_p == 0 && c_p == 0 && n_p == 0){
          let password_data = new FormData();
          password_data.append("id",auth_id);
          password_data.append("old_password",auth_old_password);
          password_data.append("new_password",auth_new_password);
          password_data.append("new_password_confirmation",auth_confirm_password);
         //  password_data.forEach((value, key) => {
         //    console.log(key + ': ' + value);
         //  });
          var  passR= new XMLHttpRequest();
          passR.open("POST","change_user_password",true);
          passR.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
          passR.onprogress = function(){
				document.getElementById('myLoader').style.display = 'block';
			  }
          passR.send(password_data);
          passR.onreadystatechange = function(){
          if(passR.readyState == 4 && passR.status == 200){
            var passobj = JSON.parse(passR.responseText);
            password_chainged.innerHTML = passobj.pass_change;
         }else if(passR.status == 400){
            var passobj = JSON.parse(passR.responseText);
            console.log(passobj);
            password_chainged.innerHTML = 'Invalid Credentials';
            //password_chainged.innerHTML = passobj.password_change.password[0];
            // password_chainged.innerHTML = passobj.password_change.email[0];
            // password_chainged.innerHTML = passobj.password_change.auth_id[0]; 
         }
				document.getElementById('myLoader').style.display = 'none';
      }
  }
});      