<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Logo.jpeg">
    <title>EduMatching</title>
    <link href="{{ asset('css/sub.css') }}" rel="stylesheet">
</head>

<body>
    <header>
      <h4 class="Logo">
        <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo">
        EduMatching</h4>
      <nav class="navigation">
        <a href="{{route('user.index')}}" class = "active">Home</a>
        <a href="{{route('test1')}}">Start Test</a>
        <a href="{{route('AllProgram')}}">Compare Courses</a>
        <a href="#">Contact</a>
        <button class="btnLogin-popup" type="button">Login</button>
      </nav>
    </header>

    <main>
        <div class="Container">
            <div class = "content">
                <p class="Description">
                    Welcome to EduMatching!<br>
                    <br>
                    This website uses the Holland's RIASEC model to help you find the best undergraduate programs based on your personality and interests. Here's how it works:<br>
                    <br>
                    1. Start the Test: Click the button to begin.<br>
                    2. Complete the Personality Test: Answer a series of questions to determine your personality type.<br>
                    3. Input Your Favorite Subject: Enter your favorite subject to get personalized program recommendations.<br>
                    <br>
                    Let's get started and find the perfect program for you!
                </p>
            </div><!--end content-->
            <!--Pop up Login-->
            <div class="wrapper">
                <!-- sclose button -->
                <span class="close">
                    <ion-icon name="close-circle-outline"></ion-icon>
                </span>
                <div class="form-box login">
                    <!-- Form Title -->
                    <h2>Login</h2>
                     <!-- form content -->
                    <form action="{{route('user.login')}}" method="post">
                        @csrf
                        @method('post')
                        <!-- Email -->
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="mail-outline"></ion-icon>
                            </span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <!-- password -->
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                            </span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <!-- forgot password -->
                        <div class="Forget-password">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="SubmitBtn">Login</button>
                        <!-- register -->
                        <div class="Register">
                            <p>Don't have an account? <a href="#" class="Register-link">Register</a></p>
                        </div>
                    </form> <!--end form -->
                </div>
                
                <!-- popup register -->
                <div class="form-box register">
                    <!-- Form Title -->
                    <h2>Register</h2>
                    <!-- form content -->
                    <form method="post" action="{{route('user.store')}}">
                        @csrf
                        @method('post')
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="person-outline"></ion-icon>
                            </span>
                            <input type="text" name="name" required>
                            <label>Name</label>
                        </div>
                        <!-- Email -->
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="mail-outline"></ion-icon>
                            </span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <!-- password -->
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                            </span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="SubmitBtn">Submit</button>
                        <!-- Back to login -->
                        <div class="Register">
                            <p>Already have an account? <a href="#" class="Login-link">Login</a></p>
                        </div>
                    </form> <!--end form-->
                </div>
            </div><!--End Wrapper-->
        </div><!--end container-->
        
        <!--Start test section-->
        <div class="StartSection">
            <button onclick="StartTest()" class="StartTestButton">Start Test</button>
        </div>
    </main><!--end main-->

    <!--ionicons framework js-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- java script-->
    <script>

        //dynamically adjust content top margin
        window.addEventListener('DOMContentLoaded', () => {
            const headerHeight = document.querySelector('header').offsetHeight;
            const container = document.querySelector('.Container');
            container.style.marginTop = `${headerHeight}px`;
        });

        function StartTest() {
            window.location.href = "{{route('test1')}}"; // Replace '/nextPage' with the URL of the next page
        }

        const wrapper = document.querySelector('.wrapper');
        const loginLink = document.querySelector('.Login-link');
        const registerLink = document.querySelector('.Register-link');
        const btnPopup = document.querySelector('.btnLogin-popup');
        const close = document.querySelector('.close');

        registerLink.addEventListener('click',()=>{
            wrapper.classList.add('active');
        });

        loginLink.addEventListener('click',()=>{
            wrapper.classList.remove('active');
        });

        btnPopup.addEventListener('click',()=>{
            wrapper.classList.add('active-popup');
        });

        close.addEventListener('click',()=>{
            wrapper.classList.remove('active-popup');
        });
    </script>

</body>
</html>
