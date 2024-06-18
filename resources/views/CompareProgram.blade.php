<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.jpeg') }}">
    <title>EduMatching</title>
    <link href="{{ asset('css/test2.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <h3 class="Logo">
            <img class="Logo-1" src="{{ asset('images/Logo.jpeg') }}" width="60" height="60" alt="Logo"> EduMatching
        </h3>

        <div class="navigation">

            <input type="checkbox" class="toggle-menu">
            <div class="hamburger"></div>

            <ul class="menu">
                <li><a href="{{route('user.index')}}">Home</a></li>
                <li><a href="{{route('test1')}}">Start Test</a></li>
                <li><a href="{{route('AllProgram')}}"  class = "active">Compare Courses</a></li>

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

    <div class = "Content">
        <!-- <h2 style="padding-top: 15px; text-align:center;">Compare Programs</h2> -->
        <div class="program">
            <h2>Compare Programs</h2>
            <ul class = "programList">
                @foreach($selectedPrograms as $program)
                    <li class = "programItems">
                        <h4 style = "margin-bottom: 30px; text-align:left;">{{ $program->ProgramName }}</h4>
                        <h5 style ="text-align:justify">{{ $program->ProgramDesc }}</h5>
                    </li>
                @endforeach
            </ul>
        </div>
            
        <button onclick = "back()">Back to All Programs</button>
    </div>

    <script>
         //dynamically adjust content margin top height
         window.addEventListener('DOMContentLoaded', () => 
        {
            const headerHeight = document.querySelector('header').offsetHeight;
            const sections = document.querySelectorAll('.Content');
            sections.forEach(section => 
            {
                section.style.marginTop = `${headerHeight}px`;
            });
        });

        function back()
        {
            window.location.href = "{{route('AllProgram')}}";
        }
    </script>
</body>