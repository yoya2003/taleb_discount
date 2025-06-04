<!DOCTYPE html>
<html lang="en">
<head>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/HomeAndCover.css')}}">
    <!--<link rel="shortcut icon" href="Images/hero.png">--> <!--Comment2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Taleb Discount</title><!--Comment1-->
</head>
<body>
        <header>
            <div class="header1">
                <div class="foriamgeinheader">
                    <img src="{{asset('Images/Logo.jpg')}}" class="logo"><!--Comment3-->
                </div>
                
                <nav class="homeform" id="homeform">
                    <div class="line"></div>
                    <a href="{{route('showSchool')}}">Home</a>
                    <a href="{{route('about')}}">About Us</a>
                    <a href="{{route('loginForm')}}">Login</a>
                </nav>
                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </header>
        <section class="First" id="First">
            <div class="Cover">
            <div class="photo1-content container photo1-content1" ><!--Comment3-->
                <img src="{{asset('Images/PhotoForCover.jpeg')}}" alt="" class="ImgForCover">
                <a class="CoverImgLink" href="{{route('showSchool')}}"><h2>"One Click, For Students!</h2></a>
            </div>
            <div class="photo1-content container photo1-content1" ><!--Comment3-->
                <img src="{{asset('Images/PhotoForCover2.jpg')}}" alt="" class="ImgForCover">
                <a class="CoverImgLink" href="{{route('vendorForm')}}"><h2>"One Click, For Vendors!</h2></a><!--Comment4-->
            </div>
            
        </div>
            <section class="products container" id="products">
                <p class="product-desc"id=product-desc>"One Click, Countless Student Savings!</p>

        </section>
        <section class="brands" id="brands">
            <h2 class="heading">Brands</h2>
            <div class="brand-container">
                <div class="brand-content container">
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-1.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-2.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-3.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-4.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-5.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-6.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-7.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-8.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-9.jpg')}}" alt="">
                    </div>
                    <div class="brand-box">
                        <img src="{{asset('Images/brand-10.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </section>
     </section>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{asset('scripts/Home.js')}}"></script>
</body>
</html>