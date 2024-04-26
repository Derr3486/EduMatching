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
        <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo">
        EduMatching</h2>
      <nav class="navigation">
        <p>Hello {{auth()->user()->name}}</p>
        <a href="{{route('user.loggedin')}}">Home</a>
        <a href="{{route('test1')}}">Start Test</a>
        <a href="{{route('AllProgram')}}">Compare Courses</a>
        <a href="#">Contact</a>
        <form action="{{route('user.logout')}}" method="get">
            <button type="submit" class="btnLogin-popup">
                Logout
            </button>
        </form>
      </nav>
    </header>

    <main>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
        @if(session()->has('error'))
            {{session('error')}}
        @endif
    <div>

    </div>
        <div class="Container">
            <div class = "content">
                <p class="HI">HI</p>
            </div><!--end content-->
        </div><!--end container-->

        <!--Start test section-->
        <button class="StartTestButton" onclick="startTest()">Start Test</button>
</main><!--end main-->

    <!--Footer-->
    <div class="Footer"></div>

    <!--ionicons framework js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        function startTest() {
            // Redirect the user to another page
            window.location.href = "{{ route('test1') }}";
        }
    </script>
</body>
</html>
