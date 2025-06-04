<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Help Platform</title>
    <link rel="stylesheet" href="{{asset('css/Index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h2>Registeration Form</h2>
    <div class="container" id="container">
     <!-- School Student Form -->
        <div class="form-container sign-in-container">
            <form method="post" action="{{route('schoolRegister')}}" enctype="multipart/form-data">
                @csrf
                <h1>School Student</h1>
                <div class="form-grid">
                    <div class="form-group">
                        <input type="text" placeholder="Name" name="name">
                        @error('name')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" name="email">
                        @error('email')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="pass">
                        @error('pass')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirm Password" name="pass_confirmation">
                        @error('pass_confirmation')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Address" name="address">
                        @error('address')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="National Id" name="NI">
                        @error('NI')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Age" name="age">
                        @error('age')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Level" name="level">
                        @error('level')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="School Name" name="schoolName">
                        @error('schoolName')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Phone" name="phone">
                        @error('phone')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group full-width">
                        <div class="file-input-container">
                            <input id="school-file-upload" type="file" name="doc">
                            @error('doc')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                            <label for="school-file-upload" class="custom-file-upload">
                                <i class="fas fa-upload"></i> Upload Birth Certificate
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
         <!-- University Student Form -->
        <div class="form-container sign-up-container">
            <form method="post" action="{{route('uniRegister')}}" enctype="multipart/form-data">
                @csrf
                <h1>University Student</h1>
                <div class="form-grid">
                    <div class="form-group">
                        <input type="text" placeholder="Name" name="name">
                        @error('name')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" name="email">
                        @error('email')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="pass">
                        @error('pass')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirm Password" name="pass_confirmation">
                        @error('pass_confirmation')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="National Id" name="NI">
                        @error('NI')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Age" name="age">
                        @error('age')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Address" name="address">
                        @error('address')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="University" name="uni_name">
                        @error('uni_name')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Faculty" name="faculty">
                        @error('faculty')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Level" name="level">
                        @error('level')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="University Email" name="uni_email">
                        @error('uni_email')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Phone" name="phone">
                        @error('phone')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group full-width">
                        <div class="file-input-container">
                            <input id="uni-file-upload" type="file" name="doc">
                            @error('doc')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                            <label for="uni-file-upload" class="custom-file-upload">
                                <i class="fas fa-upload"></i> Upload National ID
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>


        <!-- Overlay Panels -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="Images/ImageForSignUp2.jpg" alt="School student">
                    <div class="overlay-content">
                        <h1>Welcome</h1>
                        <p>If you are a Student in <span class="span">School</span></p>
                        <button class="ghost" id="signIn">Click Here</button>
                        <a class="Hasaccount" href="{{route('loginForm')}}">Already have an account?</a>
                    </div>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="Images/ImageForSignUp1.jpg" alt="University student">
                    <div class="overlay-content">
                        <h1>Welcome</h1>
                        <p>If you are a Student at <span class="span">University</span></p>
                        <button class="ghost" id="signUp">Click Here</button>
                        <a class="Hasaccount" href="{{route('loginForm')}}">Already have an account ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('scripts/style.js')}}"></script>
</body>
</html>