@extends('layout.guestlayout')
@section('header')
@parent
@stop
@section('content')
<div class="email">
<div class="text-back-email">
    <div style="width:100%">
        <div class="text-heading"> আমাৰ সৈতে যোগাযোগ কৰিবলৈ- </div>
        <small id ="success_msg" style="color: rgb(14, 163, 69);font-size:2rem;margin-top:1rem;text-allign:right;position:relative;"></small>
        <small id ="error_msg" style="color: brown;font-size:2rem;margin-top:1rem;text-allign:right;position:relative;"></small>
        <form action="" class="email_form" id="email_form" name="email_form">
        <label for="">Name</label>
        <small id ="error_msg_for_name" style="color: brown;font-size:1.2rem;margin-top:1rem;text-allign:right;position:relative;"></small>
        <input type="text" id="senders_name" class="form-control border border-info"  placeholder="ইয়াত আপোনাৰ নাম লিখক" >
        <label for="">Email</label>
        <small id ="error_msg_for_email" style="color: brown;font-size:1.2rem;margin-top:1rem;text-allign:right;position:relative;"></small>
        <input type="email" id="senders_email" class="form-control border border-info"  placeholder="ইয়াত আপোনাৰ ইমেইল আইডিটো লিখক"> 
        <label for="">Subject</label>
        <small id ="error_msg_for_subject" style="color: brown;font-size:1.2rem;margin-top:1rem;text-allign:right;position:relative;"></small>
        <input type="text" id="subject_of_email"  class="form-control border border-info" placeholder="ইয়াত ইমেইলৰ বিষয় লিখক">
        <label for="">Message</label>
        <small id ="error_msg_for_content" style="color: brown;font-size:1.2rem;margin-top:1rem;text-allign:right;position:relative;"></small>
        <textarea name="" id="email_content"  class="form-control border border-info" placeholder="ইয়াত বাৰ্তাটো দিয়ক আৰু ই সৰ্বাধিক ২০০ আখৰৰ হ'ব লাগে।" ></textarea>
        <button type="submit" class="email_button" id="send_mail"><i class="fa fa-paper-plane" aria-hidden="true"></i> SEND</button>
        
      </form>
    </div>
</div>
</div> 
<link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/guest/email.css')}}">
<script type="text/javascript" src="{{asset('../asset/js/guest/email.js')}}"></script>
@endsection