<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Logo.jpeg">
    <title>EduMatching</title>
    <link href="{{ asset('css/test2.css') }}" rel="stylesheet">
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

    <div class="Content">
        <h1 class = "title">Favourite Subject</h1>

        <form method="post" action="{{route('catch')}}">
            @csrf
            <div class="Subject">
                <label>Subject:</label>
                    <select name="Favourite Subject">
                    <option value="" disabled selected>Select your favourite subject...</option>

                    <option name="Subject" value="Science">Science</option>
                    <option name="Subject" value="Biology">Biology</option>
                    <option name="Subject" value="Physics">Physics</option>
                    <option name="Subject" value="Chemistry">Chemistry</option>
                    <option name="Subject" value="Mathematics">Mathematics</option>
                    <option name="Subject" value="General Studies">General Studies</option>
                    <option name="Subject" value="Communication Skills">Communication Skills</option>
                    <option name="Subject" value="ICT">ICT</option>
                    <option name="Subject" value="Economics">Economics</option>
                    <option name="Subject" value="Accounting">Accounting</option>
                    <option name="Subject" value="Language">Language</option>
                    <option name="Subject" value="Isalmic">Isalmic Study</option>
                    <option name="Subject" value="Arts">Arts</option>
                    <option name="Subject" value="">N/A</option>
                </select>
            </div>
            <br>
            <button type="submit">Next</button>
        </form>
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
    </script>
</body>