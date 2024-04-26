<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=JejuGothic&display=swap" rel="stylesheet">
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">
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
    <h1>Edit a user</h1>
    <form method="post" action="{{route('user.update',['user'=>$user])}}">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$user->name}}"/><br>
            <label>Email</label>
            <input type="text" name="email" placeholder="Email" value="{{$user->email}}"/><br>
            <label>Password</label>
            <input type="text" name="password" placeholder="Password" value="{{$user->password}}"/><br>
        </div>
        <div>
            <input type="submit" value="Update User">
        </div>

        <a href='/Test'>back to home</a>
    </form>
</body>