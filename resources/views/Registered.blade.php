<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMatching</title>
    <link href="{{ asset('css/sub.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <h2 class="Logo">
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo"> EduMatching
        </h2>

        @if(Auth::user())
            <p>Hi, {{auth()->user()->name}}</p>
        @endif

        <nav class="navigation">
            @if(Auth::user())
                <a href="{{route('user.loggedin')}}">Home</a>>
            @endif

            <a href="{{route('user.index')}}">Home</a>
            <a href="{{route('test1')}}">Start Test</a>
            <a href="{{route('AllProgram')}}">Compare Courses</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup" type="button" onclick = "redirectToLogin()">Login</button>
            
            <script>
                function redirectToLogin() {
                // Redirect to the login page
                window.location.href = "{{ route('user.index') }}";

                // Display a notification
                alert("You will be redirected to the homepage for login.");}
             </script>

            @if(Auth::user())
                <form action="{{route('user.logout')}}" method="get">
                    <button type="submit" class="btnLogin-popup">
                        Logout
                    </button>
                </form>
            @endif
        </nav>
    </header>

    <div style="display: flex; align-items: center; flex-direction: column;">
        <h3>Registered Sucessfully!</h3><br>
        <form action="/" method="GET">
            <button type="submit" class="StartTestButton">
                Go to Login
            </button>
        </form>
    </div>
</body>