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
        <h3>Please leave us a Feedback</h3>

        <!-- route('SaveFeedback') -->
        <form action="{{route('SaveFeedback')}}" method="post">
            @csrf
            <label>Rating of the system</label><br>
                @include('Radio',['name' => 'Rating'])
            <label>Overall experience of the system</label><br>
            <textarea name="FeedbackDetail" rows="4" cols="50"></textarea>
            <br>
            <input type="submit">
        </form>

        <br><button style = "margin-top: 10px;" onclick = "back()">Back</button>
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

        function back()
        {
            window.location.href = "{{route('AllProgram')}}";
        }
    </script>
</body>