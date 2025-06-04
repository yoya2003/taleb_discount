<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/F-Login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
</head>
<body class="body">
    <div class="wrapper">
        <div class="form-container" id="sign-in1">
            <form method="post" action="{{route('login')}}">
                @csrf
                <h2>Login</h2>
                <div class="form-group">
                    <input type="text" name="email">
                    @error('email')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                    <i class="fas fa-envelope"></i>
                    <label for="">Email</label>
                </div>
                <div class="form-group">
                    <input type="password" name="pass">
                    @error('pass')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                    <i class="fas fa-lock"></i>
                    <label for="">Password</label>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                
                <div class="divider">or</div>
                
                <div class="link">
                    <p style="font-size: large">Don't have an account?</p><br><a href="{{route('showSchool')}}" class="signin-link">Student Sign Up</a>
                    <a href="{{route('vendorForm')}}" class="signin-link"><br>Vendor Sign Up</a>
                </div>    
            </form>
        </div>
    </div>
</body>
</html>