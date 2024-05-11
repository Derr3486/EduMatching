
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
                        Name
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
</div> <!--end wrapper-->
