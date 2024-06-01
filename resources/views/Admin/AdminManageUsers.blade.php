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
                <li><a href="{{ route('AdminManageUsers') }}" class="active">Manage Users</a></li>
                <li><a href="{{ route('AdminManagePrograms') }}">Manage Programs</a></li>
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
        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->userID }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>#</td>
            </tr>
            @endforeach
        </table>

        <div class="bottom">
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
        </div> <!--end division for form-->
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
    </script>
</body>
