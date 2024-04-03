<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn & SignUp</title>
    <link rel="stylesheet" type="text/css" href="/frontend/Login/login_style.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form method="POST" action="{{ route('login.submit') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Sign In</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <input type="submit" value="Login" class="btn solid">

                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </form>

            <form method="POST" action="{{ route('register.submit') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Sign Up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="Username" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <input type="submit" class="btn solid">

                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here?</h3>
                <p>Sign up now and join our community!</p>
                <button class="btn transparent" id="sign-up-btn">Sign Up</button>
            </div>
            <img src="/frontend/Login/img/log.svg" class="image" alt="">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us?</h3>
                <p>Sign in to your account.</p>
                <button class="btn transparent" id="sign-in-btn">Sign In</button>
            </div>
            <img src="/frontend/Login/img/register.svg" class="image" alt="">
        </div>
    </div>
</div>
<script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener('click', () =>{
        container.classList.add("sign-up-mode");
        document.querySelector('.sign-up-form').setAttribute('action', "{{ route('register.submit') }}");
    });

    sign_in_btn.addEventListener('click', () =>{
        container.classList.remove("sign-up-mode");
        document.querySelector('.sign-in-form').setAttribute('action', "{{ route('login.submit') }}");
    });
</script>
</body>
</html>
