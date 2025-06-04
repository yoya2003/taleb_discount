<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="{{asset('css/About.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <header>
        <div class="header1">
            <div class="foriamgeinheader">
                <img src="Images/Logo.jpg" class="logo">
            </div>

            <nav class="homeform" id="homeform">
                <a href="{{route('home')}}">Home</a>
                <a href="{{route('about')}}">About</a>
                <a href="{{route('feedback')}}">FeedBack</a>
                <a href="{{route('index')}}">Sign Out</a>
            </nav>
            <button class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <main class="about-container">
        <section class="about-hero">
            <h1 class="about-title">ٍSome Student Help other Students</h1>
            <p class="slogan">"One Click, Countless Student Savings!"</p>
        </section>

        <section class="about-content">
            <div class="about-text">
                <h2>Website Description</h2>
                <p>Welcome to our unique platform where elegance meets functionality. We specialize in creating
                    memorable experiences through our carefully curated services. Our team is dedicated to providing
                    exceptional quality and personalized attention to every detail, ensuring your complete satisfaction.
                </p>
                    

            </div>

            <div class="about-media">
                <div class="about-text">
                    <h2>How to Use Website</h2>
                    <div class="video-container">
                        <iframe width="800" height="800" src="https://www.youtube.com/embed/yourvideoid" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>

            </div>

        </section>
        <div class="contact-info">
            <div>
            <h2>Get In Touch</h2>
            <p><i class="fas fa-phone"></i> Phone: <a href="01225087241">01225087241</a></p>
            <div class="social-links">
                <a href="https://facebook.com/yourpage" target="_blank" class="social-icon">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="https://instagram.com/yourpage" target="_blank" class="social-icon">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
            </div>
            </div>
        </div>

    </main>

    <script src="scripts/About.js"></script>
</body>

</html>