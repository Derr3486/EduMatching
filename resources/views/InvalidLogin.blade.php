<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMatching</title>
    <link href="{{ asset('css/sub.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <h2 class="Logo">
            <img class="Logo-1" src="{{asset('images/Logo.jpeg')}}" width="60" height="60" alt="Logo">
            EduMatching</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup" type="button">Login</button>
        </nav>
    </header> <!-- end header-->
        
    <div style="display: flex; align-items: center; flex-direction: column;">
        <h3>
            @if(session()->has('error'))
                {{session('error')}}
            @endif
        </h3><br>
        <form action="/Index" method="GET">
            <button type="submit" class="StartTestButton">
                Login Again
            </button>
        </form>
    </div>
</body>