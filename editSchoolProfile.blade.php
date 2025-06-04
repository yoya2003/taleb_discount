<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/AddVendor.css')}}">
</head>

<body>
    <div class="vendor-form-container">
        <h1><i class="fas fa-store-alt"></i>Edit You Profile</h1>
        <form id="vendor-profile-form" method="post" action="{{route('updateSchoolProfile')}}"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Student Information Section -->
            <section class="form-section">
                <h2><i class="fas fa-info-circle"></i>Student Information</h2>
                <div class="form-group">
                    <label for="business-name">Student Name</label>
                    <input type="text" id="business-name" name="name" value="{{ old('name', $school->name) }}">
                    @error('name')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="business-description">National ID*</label>
                    <input type="number" id="business-name" name="NI" value="{{ old('NI', $school->NI) }}">
                    @error('NI')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="schoolName">School Name</label>
                    <input type="text" id="business-name" name="schoolName"
                        value="{{ old('schoolName', $school->schoolName) }}">
                    @error('schoolName')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="schoolName">Level*</label>
                    <input type="text" id="business-name" name="level" value="{{ old('level', $school->level) }}">
                    @error('level')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="business-description">Age*</label>
                    <input type="number" id="business-name" name="age" value="{{ old('age', $school->age) }}">
                    @error('age')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Birthdate Certificate*</label>
                    <input type="file" id="logo-upload" name="doc" value="{{ old('doc', $school->doc) }}"
                        accept="image/*" class="hidden-upload">
                    @error('doc')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                    <small>Recommended size: 300×300px (square)</small>
                </div>
    </section>
    <!-- Contact Information -->
    <section class="form-section">
        <h2><i class="fas fa-address-book"></i> Contact Information</h2>
        <div class="branch-entry">
        <div class="form-row">
            <div class="form-group">
                <label for="address">address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $school->address) }}">
                @error('address')
                <p style="color:red;">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="website">email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $school->email) }}">
                    @error('email')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" id="phone" name="phone" value="{{ old('phone', $school->phone) }}">
                    @error('phone')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            </div>
        </div>
        
    </section>
    <div class="form-actions">
        <button type="submit" class="submit-btn"><i class="fas fa-save"></i> Save Changes</button>
        <button type="button" class="cancel-btn"><a href="{{route('home')}}">Cancel</a></button>
    </div>
    </form>
    </div>
    {{--
    <script src="{{asset('../scripts/AddVendor.js')}}"></script> --}}
</body>

</html>