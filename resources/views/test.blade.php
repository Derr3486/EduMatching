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
                <li><a href="{{route('test1')}}">Start Test</a></li>
                <li><a href="{{route('AllProgram')}}">Compare Courses</a></li>
                <li><a href="#">Contact</a></li>

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

    <main>
        <form id="sectionForm" action="#" method="POST">
            @csrf
            <!-- Section 1 questions-->
            <div class="section current-section" id="section1">
                <div class= "LeftSide"><h2>Section 1</h2></div>
                    <div class = "RightSide">
                        <div>I enjoy working with my hands to build or fix things.</div>
                        @include('Radio',['name' => 'section1-q1'])

                        <div>I like working outdoors and being physically active.</div>
                        @include('Radio',['name' => 'section1-q2'])

                        <div>I prefer practical, hands-on tasks over theoretical or abstract concepts.</div>
                        @include('Radio',['name' => 'section1-q3'])

                        <div>I like working with tools, machinery, or equipment.</div>
                        @include('Radio',['name' => 'section1-q4'])

                        <div> I enjoy outdoor activities such as gardening, hiking, or camping.</div>
                        @include('Radio',['name' => 'section1-q5'])

                    <button type="button" onclick="nextSection('section2')">Next</button>
                </div><!--End Right Side-->
            </div>          
        </form>
    </main>

    <script>
        //dynamically adjust content margin top height
        window.addEventListener('DOMContentLoaded', () => 
        {
            const headerHeight = document.querySelector('header').offsetHeight;
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => 
            {
                section.style.marginTop = `${headerHeight}px`;
            });
        });
        </script>

</body>
</html>