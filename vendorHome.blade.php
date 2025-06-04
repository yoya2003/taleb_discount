<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('../css/Vendor.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Vendor Profile</title><!--Comment1-->
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <img src="{{asset('../Images/Logo.jpg')}}" class="logo" alt="Logo">
            </div>
            

            <nav class="navigation" id="navigation">
                <a href="{{route('vendorHome')}}">Home</a>
                <a href="{{route('about')}}">About</a>
                <a href="{{route('vendorProfile')}}">My Profile</a>
                <a href="{{route('logout')}}">Sign Out</a>
            </nav>

            <button class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    <div class="section">
        @if ($vendor->photo1 || $vendor->photo2 || $vendor->photo3 || $vendor->photo4 || $vendor->photo5)
        <div class="Slider">
            <div class="Slide">
                <input type="radio" name="radio" id="radio1" checked>
                <input type="radio" name="radio" id="radio2">
                <input type="radio" name="radio" id="radio3">
                <input type="radio" name="radio" id="radio4">
                <input type="radio" name="radio" id="radio5">
                <div class="st First">
                    <img src="{{ $vendor->photo1 ? asset('storage/' . $vendor->photo1) : asset('Images/default.jpg') }}" alt="Slide 1">
                </div>
                <div class="st">
                    <img src="{{ $vendor->photo2 ? asset('storage/' . $vendor->photo2) : asset('Images/default.jpg') }}" alt="Slide 2">
                </div>
                <div class="st">
                    <img src="{{ $vendor->photo3 ? asset('storage/' . $vendor->photo3) : asset('Images/default.jpg') }}" alt="Slide 3">
                </div>
                <div class="st">
                    <img src="{{ $vendor->photo4 ? asset('storage/' . $vendor->photo4) : asset('Images/default.jpg') }}" alt="Slide 4">
                </div>
                <div class="st">
                    <img src="{{ $vendor->photo5 ? asset('storage/' . $vendor->photo5) : asset('Images/default.jpg') }}" alt="Slide 5">
                </div>

                <div class="nav-auto">
                    <div class="a-b1"></div>
                    <div class="a-b2"></div>
                    <div class="a-b3"></div>
                    <div class="a-b4"></div>
                    <div class="a-b5"></div>
                </div>
            </div>
            <div class="nav-m">
                <label for="radio1" class="m-btn"></label>
                <label for="radio2" class="m-btn"></label>
                <label for="radio3" class="m-btn"></label>
                <label for="radio4" class="m-btn"></label>
                <label for="radio5" class="m-btn"></label>
            </div>
        </div>
        @else
        {{-- Default Image View --}}
        <div class="Slider">
            <div class="Slide">
                <div class="st First">
                    <img src="{{ asset('Images/default.jpg') }}" alt="Default Slide">
                </div>
            </div>
        </div>
        @endif
    </div>


    <div class="search-container SandA">
        <div class="Menu">
        <div class="search-container SandB">
            <div class="search-box">
                <input type="text" name="query" value="{{ request('query') }}" class="search-input" placeholder="Search for offers..."><button class="search-btn"><i class="fas fa-search"></i></button>
                <div class="search-underline"></div>
            </div>
        </div>
        <div class="search-box Add">
            <div class="add-product">Add product</div>
            <button class="search-btn" id="btnplus">
                <a href="{{route('showOffer')}}"><i class="fas fa-plus"></i></a>
            </button>
            <div class="search-underline"></div>
        </div>
        <div class="search-box Add">
            <div class="add-product">View transactions</div>
            <button class="search-btn" id="btnplus">
                <a href="{{route('viewTransaction')}}"><i class="fas fa-eye"></i></a>
            </button>
            <div class="search-underline"></div>
        </div></div>
    </div>
    <div class="product-grid">
        @foreach($offers as $offer)
        <!-- Product 1 -->
        <div class="product-card">
            <div class="badge">{{ $offer->percentage }}%</div>
            <div class="product-tumb">
                <img src="{{ asset('storage/' . $offer->img) }}" alt="Product 1">
            </div>
            <div class="product-details">
                {{-- <span class="product-category">Electronics</span> --}}
                <h4><a href="">{{ $offer->p_name }}</a></h4>
                <p>{{ $offer->description }}</p>
                <div class="product-bottom-details">
                    <div class="product-price">
                        <small>{{ $offer->price }}LE.</small>{{ $offer->price_after }}LE.
                    </div>
                    <div class="product-stock in-stock">
                        {{ $offer->units > 0 ? 'In Stock' : 'Out of Stock' }}
                    </div>
                </div>
                <div class="product-bottom-details RemoveAndEdit">
                    <div class="product-price"><a href="{{route('deleteOffer', $offer->o_id)}}"><i class="fa-solid fa-trash"></i></a></div>
                    <div class="product-stock low-stock">
                        <a href="{{ route('editOffer', $offer->o_id) }}"><i class="fa-solid fa-user-pen"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="confirmation-modal" id="confirmationModal">
        <div class="modal-content">

    <script src="{{ asset('../scripts/VendorProfile.js') }}"></script>



</body>

</html>