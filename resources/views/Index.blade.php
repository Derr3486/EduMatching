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
      <h2 class="Logo">
        <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo">
        EduMatching</h2>
      <nav class="navigation">
        <a href="{{route('user.index')}}">Home</a>
        <a href="{{route('test1')}}">Start Test</a>
        <a href="{{route('AllProgram')}}">Compare Courses</a>
        <a href="#">Contact</a>
        <button class="btnLogin-popup" type="button">Login</button>
      </nav>
    </header>

    <main>
        <div class="Container">
            <div class = "content">
                <p class="HI">HI</p>
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
        <button class="StartTestButton">Start Test</button>
</main><!--end main-->

    <!--Footer-->
    <div class="Footer"></div>

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
