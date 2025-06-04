<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('../css/AddVendor.css')}}">
</head>
<body>
    <div class="vendor-form-container">
        <h1><i class="fas fa-store-alt"></i>Edit You Profile</h1>
        <form id="vendor-profile-form" method="post" action="{{route('updateVendorProfile')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Business Information Section -->
            <section class="form-section">
                <h2><i class="fas fa-info-circle"></i> Business Information</h2>
                <div class="form-group">
                    <label for="business-name">Business Name*</label>
                    <input type="text" id="business-name" name="b_name" value="{{ old('b_name', $vendor->b_name) }}" required>
                    @error('b_name')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="business-name" name="email" value="{{ old('email', $vendor->email) }}" required>
                    @error('email')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="business-description">Description*</label>
                    <textarea id="business-description" name="description" rows="4" required>{{ old('description', $vendor->description) }}</textarea>
                    @error('description')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Business Logo*</label>
                    <div class="image-upload-box logo-upload">
                        <div class="image-preview-container">
                            <img id="logo-preview" src="{{ asset('storage/' . $vendor->logo) }}" alt="Logo Preview">

                            <div class="edit-overlay">
                                <button type="button" class="edit-button">Upload Logo</button>
                            </div>
                        </div>
                        <input type="file" id="logo-upload" name="logo" value="{{ old('logo', $vendor->logo) }}" accept="image/*" class="hidden-upload">
                        @error('logo')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                        <small>Recommended size: 300×300px (square)</small>
                    </div>
                </div>
            </section>
              <!-- Business Images Section -->
            <section class="form-section" id="images-form">
                <h2><i class="fas fa-images"></i> Business Images</h2>
                <p>Upload 5 Images For Your Profile</p>
                <div class="image-grid">
                    <!-- Image 1 -->
                    <div class="image-upload-box">
                        <div class="image-preview-container">
                            <img id="image-preview-1" src="../Images/unnamed.png">
                            <div class="edit-overlay">
                                <button type="button" class="edit-button">Upload Image</button>
                            </div>
                        </div>
                        <input type="file" id="image-upload-1" name="photo1" accept="image/*" class="hidden-upload">
                        @error('photo1')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Image 2 -->
                    <div class="image-upload-box">
                        <div class="image-preview-container">
                            <img id="image-preview-2" src="../Images/unnamed.png" >
                            <div class="edit-overlay">
                                <button type="button" class="edit-button">Upload Image</button>
                            </div>
                        </div>
                        <input type="file" id="image-upload-2" name="photo2" accept="image/*" class="hidden-upload">
                        @error('photo2')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Image 3 -->
                    <div class="image-upload-box">
                        <div class="image-preview-container">
                            <img id="image-preview-3" src="../Images/unnamed.png" >
                            <div class="edit-overlay">
                                <button type="button" class="edit-button">Upload Image</button>
                            </div>
                        </div>
                        <input type="file" id="image-upload-3" name="photo3" accept="image/*" class="hidden-upload">
                        @error('photo3')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Image 4 -->
                    <div class="image-upload-box">
                        <div class="image-preview-container">
                            <img id="image-preview-4" src="../Images/unnamed.png" >
                            <div class="edit-overlay">
                                <button type="button" class="edit-button">Upload Image</button>
                            </div>
                        </div>
                        <input type="file" id="image-upload-4" name="photo4" accept="image/*" class="hidden-upload">
                        @error('photo4')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Image 5 -->
                    <div class="image-upload-box">
                        <div class="image-preview-container">
                            <img id="image-preview-5" src="../Images/unnamed.png">
                            <div class="edit-overlay">
                                <button type="button" class="edit-button">Upload Image</button>
                            </div>
                        </div>
                        <input type="file" id="image-upload-5" name="photo5" accept="image/*" class="hidden-upload">
                        @error('photo5')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>
            <!-- Contact Information -->
            <section class="form-section">
                <h2><i class="fas fa-address-book"></i> Contact Information</h2>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" id="website" name="website" value="{{ old('website', $vendor->website) }}" placeholder="https://">
                    @error('website')
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="url" id="facebook" name="facebook" value="{{ old('facebook', $vendor->facebook) }}" placeholder="https://facebook.com/yourpage">
                        @error('facebook')
                        <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>
            <!-- Branch Locations -->
            <section class="form-section">
                <h2><i class="fas fa-map-marker-alt"></i> Branch Locations</h2>
                <div id="branches-container">
                    <div class="branch-entry">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Main Branch*</label>
                                <input type="text" name="address" value="{{ old('address', $vendor->address) }}" required>
                                @error('address')
                                <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Branch 2*</label>
                                <input type="text" name="address_2" value="{{ old('address_2', $vendor->address_2) }}" required>
                                @error('b_name')
                                <p style="color:red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone', $vendor->phone) }}">
                            @error('phone')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="button" class="remove-branch-btn"><i class="fas fa-trash"></i>Remove Branch</button>
                    </div>
                </div>
                <button type="button" id="add-branch-btn" class="add-branch-btn"><i class="fas fa-plus"></i> Add Another Branch</button>
            </section>
            <!-- Form Submission -->
            <div class="form-actions">
                <button type="submit" class="submit-btn"><i class="fas fa-save"></i> Save Changes</button>
                <button type="button" class="cancel-btn">Cancel</button>
            </div>
        </form>
    </div>
    {{-- <script src="{{asset('../scripts/AddVendor.js')}}"></script> --}}
</body>
</html>