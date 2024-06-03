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
                @if(Auth::user())
                    <li><a href="{{route('user.loggedin')}}">Home</a></li>
                @endif
                <li><a href="{{route('user.index')}}">Home</a></li>
                <li><a href="{{route('test1')}}">Start Test</a></li>
                <li><a href="{{route('AllProgram')}}">Compare Courses</a></li>

                <li><button class="btnLogin-popup" type="button" onclick = "redirectToLogin()">Login</button></li>

                @if(Auth::user())
                <li>
                    <form action="{{route('user.logout')}}" method="get">
                        <button type="submit" class="btnLogin-popup">
                            Logout
                        </button>
                    </form>
                </li>
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
        
    <div class = "Container" style="display: flex; align-items: center; flex-direction: column;">
        <h3>
            @if(session()->has('error'))
                {{session('error')}}
            @endif
        </h3><br>
        <form action="{{route('user.index')}}" method="GET">
            <button type="submit" class="StartTestButton">
                Login Again
            </button>
        </form>
    </div>

    <script>
        //dynamically adjust contnet height to header
        window.addEventListener('DOMContentLoaded', () => {
            const headerHeight = document.querySelector('header').offsetHeight;
            const container = document.querySelector('.Container');
            container.style.marginTop = `${headerHeight}px`;
        });
    </script>
</body>