<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/HomeAndCover.css')}}">
    <link rel="shortcut icon" href="Images/hero.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Link Swiper's CSS -->
    <title>Home</title><!--Comment1-->
</head>

<body>
    <header>
        <div class="header1">
            <div class="foriamgeinheader">
                <img src="Images/Logo.jpg" class="logo"><!--comment8-->
            </div>
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="What are you looking for?">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>
            <div class="filter-dropdown" id="filterDropdown">
                <button class="Filter" id="filterButton">
                    <i class="fas fa-filter"></i> Filter
                    <span class="selected-category" id="selectedCategory"></span>
                </button>
                <div class="dropdown-content" id="dropdownContent">
                    <div class="dropdown-header">Select Category</div>
                    <a href="all-products.html" data-category="all"><i class="fas fa-layer-group"></i> All</a>
                    <a href="supplies.html" data-category="supplies"><i class="fas fa-pencil-alt"></i> Supplies</a>
                    <a href="tech.html" data-category="tech"><i class="fas fa-laptop"></i> Tech</a>
                    <a href="medical.html" data-category="medical"><i class="fas fa-medkit"></i> Medical</a>
                    <a href="engineering.html" data-category="engineering"><i class="fas fa-cogs"></i> Engineering</a>
                    <a href="workspaces.html" data-category="workspaces"><i class="fas fa-chair"></i> Working Spaces</a>
                    <a href="uniform.html" data-category="uniform"><i class="fas fa-tshirt"></i> Uniform</a>
                </div>
            </div>
            <nav class="homeform" id="homeform">
                <a href="{{route('home')}}">Home</a>
                <a href="{{route('about')}}">About</a>
                <a href="{{route('feedback')}}">Feedback</a>
                <a href="{{ session()->has('student_id') ? route('schoolProfile') : route('uniProfile') }}">Profile</a>
                <a href="{{route('logout')}}">LogOut</a>
            </nav>
            <button class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    <section class="First Firstt" id="First">
        <img class="photo1-bg" src="Images/photo2.png" alt="">
        <div class="photo1-content container">
            <h2>"One Click, Countless Student Savings!</h2><!--comment3-->
            {{-- <div class="photo1-btn">
                <a href="#" class="btn">
                    <span>view products</span>
                    <img src="Images/arrow-right.png" alt="">
                </a>
            </div> --}}
            <div class="photo1-image">
                <img src="Images/photo1.jpg" alt="">
            </div>
        </div>
        <div class="category container" id="category">
            <a href="#products">
                <img class="scroll-button" src="Images/bottom-scroll.png" alt="">
            </a>
            <div class="category-content">
                <div class="image-wrapper">
                    <span></span>
                    <img src="Images/Category/category-bg.png" alt="" class="category-img-1">
                    <img src="Images/Category/category-bg.png" alt="" class="category-img-2">
                </div>
                <h2>View Vendors</h2>
                <!-- Swiper -->
                <div class="swiper categorySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($vendors as $vendor)
                        <div class="swiper-slide">
                            <div class="category-box">
                                <img src="{{ asset('storage/' . $vendor->logo) }}" alt="{{ $vendor->b_name }}">
                                <h3>{{ $vendor->b_name }}</h3><!--comment4-->
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-btn">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <section class="products container" id="products">
            <p class="product-desc">professional equipment,Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Deserunt error ea delectus assumenda, sapiente eum totam cum ipsum ex velit perferendis eaque
                perspiciatis, ducimus voluptatum id quidem neque quae expedita.</p>
            <div class="product-contect">
                <div class="product-box">
                    <span>30%</span>
                    <img src="Images/product-1.png" alt="">
                    <h2>Folding camping table</h2>
                    <div class="rating">
                        <i class="ri-star-fill"></i>
                        <p>4.5</p>
                    </div>
                    <div class="p-info">
                        <div class="units">
                            <p>200 units left</p>
                            <h3>Dreem 2000</h3>
                        </div>
                    </div>
                </div>
                <div class="product-box">
                    <span>30%</span>
                    <img src="Images/product-2.png" alt="">
                    <h2>Folding camping</h2>
                    <div class="rating">
                        <i class="ri-star-fill"></i>
                        <p>4.5</p>
                    </div>
                    <div class="p-info">
                        <div class="units">
                            <p>200 units left</p>
                            <h3>samer we ail</h3>
                        </div>
                    </div>
                </div>
                <div class="product-box">
                    <span>30%</span>
                    <img src="Images/product-3.png" alt="">
                    <h2>Folding camping table</h2>
                    <div class="rating">
                        <i class="ri-star-fill"></i>
                        <p>4.5</p>
                    </div>
                    <div class="p-info">
                        <div class="units">
                            <p>200 units left</p>
                            <h3>mktba alwan</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="backpack container" id="backpack">
            <div class="backpack-contect">
                <img src="Images/backpack-grid.png" alt="" class="backpack-grid">
                <h2>sponser item <br><span>bugs</span></h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos nobis repudiandae iure quasi
                    voluptatum aut ex facilis quo neque sequi, veritatis repellat corporis voluptate libero
                    exercitationem officiis pariatur alias tenetur!</p>
                <a href="#" class="btn">
                    <span>View more</span>
                    <img src="Images/arrow-right.png" alt="">
                </a>
            </div>
            <img class="sponser" src="Images/Category/category-4.jpg" alt="" class="backpack-img">
        </section>
    </section>
    <section class="selling container" id="selling">
        <div class="selling-heading">
            <h2>Offers</h2> <!---------------------------- OFFERS----------------------------->
            <a href="{{route('viewOffer')}}" class="btn">
                <span>View Offers</span>
                <img src="Images/arrow-right.png" alt="">
            </a>
        </div>
        <div class="swiper selling-slider">
            <div class="swiper-wrapper">

                @foreach ($offers as $offer)
                @foreach ($vendors as $vendor)
                <div class="swiper-slide">
                    <div class="product-box">
                        <span>{{ $offer->percentage }}%</span>
                        <img src="{{ asset('storage/' . $offer->img) }}" alt="">
                        <h2>{{ $offer->p_name }}</h2>
                        <div class="rating">
                            {{-- <i class="ri-star-fill"></i> --}}
                            <p>{{ $offer->description }}</p>
                        </div>
                        <div class="p-info">
                            <div class="units">
                                <p>{{ $offer->status }}</p>
                                <h3>{{ $vendor->b_name }}</h3>   
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endforeach
            </div>
        </div>
        <div class="slides-control">
            <div class="swiper-pagination"></div>
            <div class="swiper-btn">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        </div>
    </section>
    <section class="brands" id="brands">
        <h2 class="heading">Brands</h2>
        <div class="brand-container">
            @foreach ($vendors as $vendor)
            <div class="brand-content container">

                <div class="brand-box">
                    <img src="{{ asset('storage/' . $vendor->logo) }}" alt="{{ $vendor->b_name }}">
                </div>

            </div>
            @endforeach
        </div>
    </section>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{asset('scripts/Home.js')}}"></script>
</body>

</html>