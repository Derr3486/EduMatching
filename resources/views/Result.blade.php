<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Logo.jpeg">
    <title>EduMatching</title>
    <link href="{{ asset('css/test1.css') }}" rel="stylesheet">
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
                <a href="{{route('user.loggedin')}}">Home</a>
            

            @else
            <a href="{{route('user.index')}}">Home</a>
            @endif
            <a href="{{route('test1')}}">Start Test</a>
            <a href="{{route('AllProgram')}}">Compare Courses</a>
            <a href="#">Contact</a>

            @if(Auth::user())
                <form action="{{route('user.logout')}}" method="get">
                    <button type="submit" class="btnLogin-popup">
                        Logout
                    </button>
                </form>
            @else
            <button class="btnLogin-popup" type="button" onclick = "redirectToLogin()">Login</button>
            @endif
            <script>
                function redirectToLogin() {
                // Redirect to the login page
                window.location.href = "{{ route('user.index') }}";

                // Display a notification
                alert("You will be redirected to the homepage for login.");}
             </script>
        </nav>
    </header>
    
    <div class = "Content" >
            <h1 class = "Content1">Your personality type is:<br>{{ $personality}}</h1>

            <p class = "Content2">Please share with us your favourite subjects</p>

            <button class="NextPage" onclick = "NextPage()">Favourite subjects</button>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => 
        {
            const headerHeight = document.querySelector('header').offsetHeight;
            const sections = document.querySelectorAll('.Content');
            sections.forEach(section => 
            {
                section.style.marginTop = `${headerHeight}px`;
            });
        });

        function NextPage()
        {
            window.location.href = "{{route('p2')}}";
        };
    </script>
</body>
</html>
