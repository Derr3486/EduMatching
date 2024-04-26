<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=JejuGothic&display=swap" rel="stylesheet">
</head>

<body>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <h1>Create a personality</h1>
    <form method="post" action="{{route('storeMatch')}}">
        @csrf
        @method('post')
        <div>
            <label>Personality</label>
            <input type="text" name="Personality" placeholder="Personality"/><br>
            <label>Subject</label>
            <input type="text" name="Subject" placeholder="Subject"/><br>
            <label>Program</label>
            <input type="text" name="Program" placeholder="Program"/><br>
        </div>
        <div>
            <input type="submit" value="Create Match">
        </div>
        
        <a href='/home'>back to home</a>
    </form>
</body>