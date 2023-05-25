{{-- @extends('layout.admindashbiardlayout')
@section('header')
@parent
@stop
@section('containt')
        <div>
     <center>     
    <h1> Registation Page</h1>
    <br>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
        <label for="name">name:</label>
        <input type="text" id="name" class="" name="name"  required >
        @error('name')
        <span>{{$message}}</span>
						@enderror
                    </div>
                    <br>
                    <div>
        <label for="email">email:</label>
        <input type="email" id="email" class="" name="email" required>
        @error('email')
        <span>{{$message}}</span>
						@enderror
                    </div>
                    <br>
                    <div>
        <label for="password">password:</label>
        <input type="password" id="password" class="" name="password" required autocomplete="new-password">
        @error('password')
        <span>{{$message}}</span>
						@enderror
                    </div>
                    <br>
                    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input id="password_confirmation" class="" type="password" name="password_confirmation" required>
        @error('password_confirmation')
					<span>{{$message}}</span>	
						@enderror
                    </div>
                    <br>
        
        <button>register</button>
    </form>
</center>
</div>
@endsection --}}