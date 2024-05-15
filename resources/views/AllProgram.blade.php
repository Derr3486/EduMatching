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
            <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo"> EduMatching
        </h2>

        @if(Auth::user())
            <p>Hi, {{auth()->user()->name}}</p>
        @endif

        <nav class="navigation">
            @if(Auth::user())
                <a href="{{route('user.loggedin')}}">Home</a>
            

            @else
            <a href="{{route('user.index')}}">Home</a>
            @endif
            <a href="{{route('test1')}}">Start Test</a>
            <a href="{{route('AllProgram')}}">Compare Courses</a>
            <a href="#">Contact</a>

            @if(Auth::user())
                <form action="{{route('user.logout')}}" method="get">
                    <button type="submit" class="btnLogin-popup">
                        Logout
                    </button>
                </form>
            @else
            <button class="btnLogin-popup" type="button" onclick = "redirectToLogin()">Login</button>
            @endif
            <script>
                function redirectToLogin() {
                // Redirect to the login page
                window.location.href = "{{ route('user.index') }}";

                // Display a notification
                alert("You will be redirected to the homepage for login.");}
             </script>
        </nav>
    </header>

    <div class = "Content">
        <h1 style="text-align:center;">All Programs</h1>
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
                <table border="1">
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
                <div style ="margin-top: 12px;">
                    <input type="submit" value="View Selected Programs">   
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
                        selectionLimitMessage.textContent = 'You have reached the maximum selection limit.';
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
