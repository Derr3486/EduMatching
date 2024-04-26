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
        <h2 class="Logo">
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo">
            EduMatching</h2>
            <p>Hi, {{auth()->user()->name}}</p>
        <nav class="navigation">
            <a href="{{route('user.loggedin')}}">Home</a>
            <a href="{{route('test1')}}">Start Test</a>
            <a href="{{route('AllProgram')}}">Compare Courses</a>
            <a href="#">Contact</a>
            <form action="{{route('user.logout')}}" method="get">
                <button type="submit" class="btnLogin-popup">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <div class = "Content">
        @if(session()->has('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @else
            @if(count($programDetails) > 0)
                <h3>{{ $programDetails[0]->personality->Personality }}</h3>
                <h4>{{ $programDetails[0]->personality->PersonalityDesc }}</h4>

                <h4>Recommended Programs</h4>
                <ul>
                    @foreach($programDetails as $recommendation)
                        <li>
                            <h5>{{ $recommendation->ProgramName }}</h5>
                            <h5>{{ $recommendation->ProgramDesc }}</h5>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No recommendations found.</p>
            @endif
        @endif

        <form method="post" action="{{ route('sendMail') }}">
            @csrf
            <button style="margin-bottom: 10px;" type="submit">Send me a copy</button>
        </form>

        <button onclick="nextPage()">Compare Courses</button>
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
