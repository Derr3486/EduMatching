<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>

<body>
    <nav>
        <a href = "#">Review Feedback</a>
        <a href = "#">Manage Users</a>
        <a href = "#">Manage Programs</a>   
        <a href = "#">Manage Personalities</a>  
    <nav>

    <div>
        Create an Admin

        <form method="post" action="{{route('admin.store')}}">
            @csrf
            <label>Name</label>
            <input type = "text" name = "name"> <br>

            <label>Email</label>
            <input type = "email" name = "email"><br>

            <label>Password</label>
            <input type = "password" name = "password"><br>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
