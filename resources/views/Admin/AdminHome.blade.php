<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Logo.jpeg">
    <title>EduMatching</title>
    <link href="{{ asset('css/Admin.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <h2 class="Logo">
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo">
            EduMatching</h2>
            <p>Hi, {{auth()->user()->name}}</p>
        <nav class="navigation">
            <a href="{{ route('AdminHome') }}">Review Feedback</a>
            <a href="{{ route('AdminManageUsers') }}">Manage Users</a>
            <a href="{{ route('AdminManagePrograms') }}">Manage Programs</a>
            <a href="{{ route('AdminManagePersonalities') }}">Manage Personalities</a>
            <form action="{{ route('user.logout') }}" method="get">
                <button type="submit" class="btnLogin-popup">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <div class="Content">
        <table id="feedbackTable">
            <thead>
                <tr>
                    <th>FeedbackID <span><button onclick="sortTable(0)">&#x25be;</button></span></th>
                    <th>Ratings (1-5)</th>
                    <th>Description</th>
                    <th>Name of user</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->feedbackID }}</td>
                    <td>{{ $feedback->rating}}</td>
                    <td>{{ $feedback->Description}}</td>
                    <td>{{ $feedback->userID }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>        
        //setting margin from the header for content
        window.addEventListener('DOMContentLoaded', () => {
            const headerHeight = document.querySelector('header').offsetHeight;
            const sections = document.querySelectorAll('.Content');
            sections.forEach(section => {
                section.style.marginTop = `${headerHeight}px`;
            });
        });
    </script>
</body>
</html>
