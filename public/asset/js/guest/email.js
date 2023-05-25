function cleanNotification(){
    document.getElementById('error_msg_for_name').innerHTML = '';
    document.getElementById('error_msg_for_email').innerHTML = '';
    document.getElementById('error_msg_for_subject').innerHTML = '';
    document.getElementById('error_msg_for_content').innerHTML = '';
    document.getElementById('success_msg').innerHTML = '';
    document.getElementById('error_msg').innerHTML = '';
}
document.getElementById('send_mail').addEventListener('click',function(e){
    e.preventDefault();
    let name = document.getElementById('senders_name').value;
    let email = document.getElementById('senders_email').value;
    let subject = document.getElementById('subject_of_email').value;
    let message = document.getElementById('email_content').value;
    cleanNotification();
    let n_v = 0;
    let e_v = 0;
    let s_v = 0;
    let m_v = 0;
    if(name == ''){
        document.getElementById('error_msg_for_name').innerHTML = 'Name field is required.';
        n_v = 1;
    }
    if(email == ''){
        document.getElementById('error_msg_for_email').innerHTML = 'Email field is required.';
        e_v = 1;
    }
    else if(email.indexOf('@') < 1 || email.lastIndexOf('.') < email.indexOf('@') + 2 || email.lastIndexOf('.') === email.length -1){
        document.getElementById('error_msg_for_email').innerHTML = 'Invalid email';  
        e_v = 1;
     }
    if(subject == ''){
        document.getElementById('error_msg_for_subject').innerHTML = 'Subject field is required.';
        s_v = 1;
    }else if(subject.length >50){
        document.getElementById('error_msg_for_subject').innerHTML = 'Subject fields length must be less than 50 letters.';
        s_v = 1;
    }
    if(message == ''){
        document.getElementById('error_msg_for_content').innerHTML = 'Message field is required.';
        m_v = 1;
    }else if(message.length > 200){
        document.getElementById('error_msg_for_content').innerHTML = 'Message fields length must be less than 200 letters.';
        m_v = 1;
    }

    if( m_v == 0 && s_v == 0 && e_v == 0 && n_v == 0){



        let mail_data = new FormData();
        mail_data.append('name',name);
        mail_data.append('email',email);
        mail_data.append('subject',subject);
        mail_data.append('message',message);
        //   mail_data.forEach((value, key) => {
        //             console.log(key + ': ' + value);
        //           });
        var  wordReq = new XMLHttpRequest();
        wordReq.open("POST","users_sending_mail",true);
        wordReq.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        wordReq.send(mail_data);
        document.getElementById('myLoader').style.display = 'block';
        wordReq.onreadystatechange = function(){
        if(wordReq.readyState == 4 && wordReq.status == 200){
        var obj = JSON.parse(wordReq.responseText);
        // console.log(obj);    
          document.getElementById('success_msg').innerHTML = obj.email_send;
    }else if(wordReq.status == 400){
        //console.log(responseText); 
        document.getElementById('error_msg').innerHTML = 'Something went wrong. Please try again later.';
    }

    document.getElementById('myLoader').style.display = 'none';
}

    }
});