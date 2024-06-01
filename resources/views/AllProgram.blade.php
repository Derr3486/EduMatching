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
        <h3 class="Logo">
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo"> EduMatching
        </h3>

        <div class="navigation">

            <input type="checkbox" class="toggle-menu">
            <div class="hamburger"></div>

            <ul class="menu">
                <li><a href="{{route('user.index')}}">Home</a></li>
                <li><a href="{{route('test1')}}">Start Test</a></li>
                <li><a href="{{route('AllProgram')}}" class = "active">Compare Courses</a></li>
                <li><a href="#">Contact</a></li>

                @if(Auth::user())
                <li>
                    <form action="{{route('user.logout')}}" method="get">
                        <button type="submit" class="btnLogin-popup">
                            Logout
                        </button>
                    </form>
                </li>
                @else
                    <li><button class="btnLogin-popup" type="button" onclick = "redirectToLogin()">Login</button></li>
                @endif
            </ul> 
            
            <script>
                function redirectToLogin() {
                // Redirect to the login page
                window.location.href = "{{ route('user.index') }}";

                // Display a notification
                alert("You will be redirected to the homepage for login.");}
            </script>
        </div>
    </header>

    <div class = "Content">
        <h1 style="text-align:center; padding-top: 20px;">All Programs</h1>
        @if(Auth::user())
            <div style="text-align:center;">
                <button onclick="nextPage()">Feedback</button>
            <div>
        @endif

        <div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-danger">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <form id = "selectProgram" action = "{{route('compare')}}" method = "post">
            @csrf
            <div style="margin-top:15px;">
                <table>
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Program Name</th>
                            <th>Program Description</th>
                            <th>Personality</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Program as $program)
                            <tr>
                                <td>{{ $program->ProgramID }}</td>
                                <td>{{ $program->ProgramName }}</td>
                                <td>{{ $program->ProgramDesc }}</td>
                                <td>{{ $program->personality->Personality }}</td>
                                <td>
                                    <input type="checkbox" name="selectedPrograms[]" value="{{ $program->ProgramID }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div style = "margin-top:10px" id="selectionLimitMessage"></div>
                <br>
                <div style ="margin-bottom: 30px;">
                    <button type = "submit">View Selected Programs</button>
                </div>
            </div>
        </form>
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

        function nextPage() 
        {
            window.location.href = "{{route('Feedback')}}";
        }

        //limit selections to 2
        document.addEventListener('DOMContentLoaded', function() 
        {
            var form = document.getElementById('selectProgram');
            var checkboxes = form.querySelectorAll('input[type="checkbox"]');
            var maxChecked = 2;
            var checkedCount = 0;
            var selectionLimitMessage = document.getElementById('selectionLimitMessage');

            checkboxes.forEach(function(checkbox) 
            {
                checkbox.addEventListener('change', function() 
                {
                    if (this.checked) 
                    {
                        checkedCount++;
                        if (checkedCount > maxChecked) 
                        {
                            this.checked = false;
                            checkedCount--;
                        }
                    } 
                    else 
                    {
                        checkedCount--;
                    }

                    // Update the selection limit message
                    if (checkedCount === maxChecked) 
                    {
                        // alert("You have reached the maximum selection limit.");
                        selectionLimitMessage.textContent = 'You have reached the maximum selection limit.';
                        alert("You have reached the maximum selection limit.");
                    } 
                    else 
                    {
                        selectionLimitMessage.textContent = '';
                    }
                });
            });
        });
    </script>
</body>
