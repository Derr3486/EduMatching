<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Logo.jpeg">
    <title>EduMatching</title>
    <link href="{{ asset('css/recommendation.css') }}" rel="stylesheet">
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
                <li><a href="#">Contact</a></li>

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

        @if(session()->has('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @else
            @if(count($programDetails) > 0)
            <div class="Personality">
                <h3 style = "color: #162938;">{{ $programDetails[0]->personality->Personality }}</h3>
                <h4 style="margin-top: 15px;">{{ $programDetails[0]->personality->PersonalityDesc }}</h4>
            </div>

            <div class="program">
                <h2>Recommended Programs</h2>
                <ul class = "programList">
                    @foreach($programDetails as $recommendation)
                        <li class = "programItems">
                            <h4 style = "margin-bottom: 30px; text-align:left;">{{ $recommendation->ProgramName }}</h4>
                            <h5 style ="text-align:justify">{{ $recommendation->ProgramDesc }}</h5>
                        </li>
                    @endforeach
                </ul>
            </div>
            @else
                <p>No recommendations found.</p>
            @endif
        @endif
        <div class = "buttonGroup">
            <form method="post" action="{{ route('sendMail') }}">
                @csrf
                <button type="submit">Send me a copy</button>
            </form><!--use form because need to pass to controller for sending email-->

            <button onclick="nextPage()">Compare Courses</button>   
        </div>
    </div>

    <script>
        function nextPage() {
            window.location.href = "{{ route('AllProgram') }}";
        }

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
</html>
