@extends('layout.admindashbiardlayout')
@section('header')
@parent
@stop
@section('containt')    
    <div class="container">
        <div class="brand-title">ADMIN DETAILS</div>
        <input type="text" id="admin_id" style="display:none;"/>
        <div class="inputs">
          <label>NAME</label>
          <input type="text" class="single_input" id="admin_name" readonly/>
          <label>EMAIL</label>
          <input type="email" class="single_input" id="admin_email" readonly/>
          <div class="modal-footer">
            <div class="row">
          <button type="submit"  class="col mr-2" data-toggle="modal" data-target="#email_change_modal">CHANGE EMAIL</button>
          <button type="submit" class="col"  data-toggle="modal" data-target="#password_change_modal">CHANGE PASSWORD</button>
            </div>
          </div>
        </div>
    </div>

{{-- Email_Change_Modal --}}
<div class="modal fade" id="email_change_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="brand-title">CHANGE EMAIL</div>
      <div id="email_change_success" style="color:tomato;font-size: 20px;"></div>
      </div>
      <div class="modal-body">
        <form>
        <input type="text" class="single_input1 border border-dark mb-1" placeholder="Enter New Email" id="new_email"  autocomplete="off">
        <small  id="new_email_error" style="color:tomato;"></small>
        <br>
        <input type="password" class="single_input1 border border-dark mb-1" placeholder="Enter Your Password" id="admin_password" autocomplete="off">
        <small id="admin_password_error" style="color:tomato;"></small>   
      </div>
      <div class="modal-footer">
        <div class="row">
        <button type="button" class=" btn btn-primary col mr-3" id="change_email_button">SAVE CHANGES</button>
      </form>
        <button type="button" class="btn btn-danger col" data-dismiss="modal">CLOSE</button>
      </div>
      </div>
    </div>
  </div>
</div>
{{-- Password_Change_Modal --}}
<div class="modal fade" id="password_change_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="brand-title font-weight-bold">Change Password</div>
        <div id="password_change_success" style="color:tomato;font-size: 20px;"></div>
      </div>
      <div class="modal-body">
        <form>
        <input type="password" class="single_input1 border border-dark mb-1" placeholder="Enter Your Old Password" id="old_password" autocomplete="off">
        <small  id="old_password_error" style="color:tomato;"></small>
        <br>
        <input type="password" class="single_input1 border border-dark mb-1" placeholder="Enter Your New Password" id="new_password" autocomplete="off">
        <small  id="new_password_error" style="color:tomato;"></small>
        <br>
        <input type="password" class="single_input1 border border-dark mb-1 text-dark" placeholder="Confirm Your New Password" id="new_confirm_password" autocomplete="off">
        <small  id="new_confirm_password_error" style="color:tomato;"></small>
      </div>
      <div class="modal-footer">
        <div class="row">
          
        <button type="button" class="btn btn-primary col mr-3" id="change_password_button">SAVE CHANGES</button>
      </form>
        <button type="button" class="btn btn-danger col" data-dismiss="modal">CLOSE</button>
      </div>
      </div>
    </div>
  </div>
</div>
    <link type="text/css" rel="stylesheet" href="{{ asset('../asset/css/admin/adminprofile.css')}}">
    <script type="text/javascript" src="{{asset('../asset/js/admin/manageuser.js')}}"></script>
@endsection