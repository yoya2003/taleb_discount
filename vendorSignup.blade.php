<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('../css/Login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Vendor Signup</title>
</head>

<body class="body">
    <div class="wrapper">
        <div class="form-container sign-in sign-in-vendor">
            <form method="post" action="{{route('vendorRegister')}}" enctype="multipart/form-data">
                @csrf
                <h2 class="Edit">SignUp as a Vendors</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <input type="text" required name="b_name">
                        @error('b_name')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-user"></i>
                        <label for="">Business Name</label>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required>
                        @error('email')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-inbox"></i>
                        <label for="">Email</label>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" required>
                        @error('phone')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-phone"></i>
                        <label for="">Phone</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" required>
                        @error('description')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-align-left"></i>
                        <label for="">Description</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" required>
                        @error('address')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-map-marker-alt"></i>
                        <label for="">Address</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address_2">
                        @error('address_2')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-map-marker-alt"></i>
                        <label for="">Address2</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" required>
                        @error('pass')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-lock"></i>
                        <label for="">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass_confirmation" required>
                        @error('pass_confirmation')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-lock"></i>
                        <label for="">Confirm Password</label>
                    </div>
                    <div class="form-group">
                        <input type="url" name="website">
                        @error('website')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-globe"></i>
                        <label for="">Website</label>
                    </div>
                    <div class="form-group">
                        <input type="url" name="facebook">
                        @error('facebook')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fab fa-facebook"></i>
                        <label for="">Facebook</label>
                    </div>
                    <div class="form-group">
                        <input type="file" name="logo">
                        @error('logo')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-image"></i>
                        <label for="logo">Upload Your Logo</label>
                    </div>
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <br>
                <a class="Hasaccount" href="{{route('loginForm')}}">Already have an account?</a>
                <br>
            </form>
        </div>
    </div>
</body>
</html>