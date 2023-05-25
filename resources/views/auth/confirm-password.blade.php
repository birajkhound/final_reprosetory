{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Assamese Dictionary') }}</title>

    turbo_link start
   tailwind CSS start 
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
    tailwind CSS end 
  <script src="{{asset('js/app.js')}}"></script>
    turbo_link end
</head>
<body>
    
    <div class="mb-4 text-sm text-gray-600">
        <p>This is a secure area of the application. Please confirm your password before continuing.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password">
                            
                         @error('password')
                         {{$message}}
                         @enderror
                            
        </div>

        <div class="flex justify-end mt-4">
            <button>
                Confirm
            <button>
        </div>
    </form>
</body>
</html> --}}
