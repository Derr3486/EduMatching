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
        <h3 class="Logo">
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo"> EduMatching
        </h3>

        <div class="navigation">

            <input type="checkbox" class="toggle-menu">
            <div class="hamburger"></div>

            <ul class="menu">
                <li><a href="{{ route('AdminHome') }}">Review Feedback</a></li>
                <li><a href="{{ route('AdminManageUsers') }}">Manage Users</a></li>
                <li><a href="{{ route('AdminManagePrograms') }}" class="active">Manage Programs</a></li>
                <li><a href="{{ route('AdminManagePersonalities') }}">Manage Personalities</a></li>
                <li>
                    <form action="{{ route('user.logout') }}" method="get">
                        <button type="submit" class="btnLogin-popup">
                            Logout
                        </button>
                    </form> 
                </li>
            </ul> 
        </div>
    </header>

    <div class = "Content">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form id="AddProgram" method="post" action="{{route('StoreProgram')}}">
            @csrf
            <label>Program Name</label>
            <input type = "text" name = "ProgramName"> <br>

            <label>Program Description</label>
            <input type = "text" name = "ProgramDesc"><br>

            <label>Relative Personality ID</label>
            <input type = "text" name = "PersonalityID"><br>

            <!-- <button type="submit">Add Program</button><br> -->
        </form>
        <button onclick="submit()">Add Program</button>
        <button onclick = "back()">Back to Manage Program</button>
        
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
            window.location.href = '{{ route('AdminManagePrograms') }}';
        }

        function submit()
        {
            document.getElementById('AddProgram').submit();
        }
    </script>
</body>