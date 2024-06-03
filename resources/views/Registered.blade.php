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
        <h3 class="Logo">
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo"> EduMatching
        </h3>

        <div class="navigation">

            <input type="checkbox" class="toggle-menu">
            <div class="hamburger"></div>

            <ul class="menu">
                <li><a href="{{route('user.index')}}">Home</a></li>
                <li><a href="{{route('test1')}}">Start Test</a></li>
                <li><a href="{{route('AllProgram')}}">Compare Courses</a></li>

                @if(Auth::user())
                <li>
                    <form action="{{route('user.logout')}}" method="get">
                        <button type="submit" class="btnLogin-popup">
                            Logout
                        </button>
                    </form>
                </li>
                @else
                    <li><button class="btnLogin-popup" type="button" onclick = "redirectToLogin()">Login</button></li>
                @endif
            </ul> 
            
            <script>
                function redirectToLogin() {
                // Redirect to the login page
                window.location.href = "{{ route('user.index') }}";

                // Display a notification
                alert("You will be redirected to the homepage for login.");}
            </script>
        </div>
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