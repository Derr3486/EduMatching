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
        <h3 class="Logo">
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo"> EduMatching
        </h3>

        <div class="navigation">

            <input type="checkbox" class="toggle-menu">
            <div class="hamburger"></div>

            <ul class="menu">
                <li><a href="{{route('user.index')}}">Home</a></li>
                <li><a href="{{route('test1')}}" class = "active">Start Test</a></li>
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
    
    <div class = "Content" >
            <h1 class = "Content1" style="text-align:center; padding-top: 20px;">Your personality type is:<br>{{ $personality}}</h1>

            <p style="margin-top: 15px; margin-bottom: 20px;">Please share with us your favourite subjects</p>

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
