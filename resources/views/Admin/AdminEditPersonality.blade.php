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
            <a href = "{{route('AdminHome')}}">Review Feedback</a>
            <a href = "{{route('AdminManageUsers')}}">Manage Users</a>
            <a href = "{{route ('AdminManagePrograms')}}">Manage Programs</a>   
            <a href = "{{route ('AdminManagePersonalities')}}">Manage Personalities</a>
            <form action="{{route('user.logout')}}" method="get">
                <button type="submit" class="btnLogin-popup">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main>
    <h1>Edit Personality</h1>
        <form method="post" action="{{route('UpdatePersonality', ['Personality' => $Personality])}}">
            @csrf
            @method('put')
            <div>
                <label>Personality</label>
                <input type="text" name="Personality" placeholder="Personality" value="{{$Personality->Personality}}"/><br>
                <label>Personality Description</label>
                <input type="text" name="PersonalityDesc" placeholder="PersonalityDesc" value="{{$Personality->PersonalityDesc}}"/><br>
            </div>
            <div>
                <input type="submit" value="Update Personality">
            </div>

            <a href='/Test'>back to home</a>
        </form>
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => 
        {
            const headerHeight = document.querySelector('header').offsetHeight;
            const sections = document.querySelectorAll('main');
            sections.forEach(section => 
            {
                section.style.marginTop = `${headerHeight}px`;
            });
        });
    </script>

</body>