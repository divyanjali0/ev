<?php  return array (
  'resourceClass' => 'MODX\\Revolution\\modDocument',
  'resource' => 
  array (
    'id' => 1,
    'type' => 'document',
    'pagetitle' => 'Home',
    'longtitle' => 'Congratulations!',
    'description' => '',
    'alias' => 'index',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '

<body id = "homePage">
    <!-- Home hero starts -->
    <section id="homeHero">
        <div class="swiper homeHeroSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <img src="assets/images/home-hero/img-1.jpg" alt="Explore Vacations"class="img-fluid d-none d-md-block">
                    <img src="assets/images/home-hero/img-1-sm.jpg" alt="Explore Vacations" class="img-fluid d-md-none">
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <img src="assets/images/home-hero/img-2.jpg" alt="Explore Vacations" class="img-fluid d-none d-md-block">
                    <img src="assets/images/home-hero/img-2-sm.jpg" alt="Explore Vacations" class="img-fluid d-md-none">
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <img src="assets/images/home-hero/img-3.jpg" alt="Explore Vacations" class="img-fluid d-none d-md-block">
                    <img src="assets/images/home-hero/img-3-sm.jpg" alt="Explore Vacations" class="img-fluid d-md-none">
                </div>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="homehero-content">
            <h1 data-aos="fade-down-right" data-aos-duration="1000">Discover Wonders<br class="d-md-none"> with<br class="d-none d-md-block"> Every Step</h1>
            <p class="mt-3" data-aos="fade-down-left" data-aos-duration="1000">Discover unforgettable journeys with Explore Vacations. <br>Adventure, relaxation, and memories that last a lifetime.</p>
            <a href="[[~3]]" class="mt-3">Plan Your Trip</a>
        </div>
    </section>
    <!-- Home hero ends -->

    <!-- Why choose us section starts -->
     <section id="why-choose-us" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div class="card">
                        <div class="card-body" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="heading mb-4">Why Choose Us?</h2>
                            <p class="supportive-text">At Explore Vacations, we are passionate about creating unforgettable travel experiences. Here’s why you should choose us for your next adventure:</p> 
                            <ul class="list-unstyled">
                                <li><img src="assets/images/icons/map-marked.svg" class="img-fluid" alt="map-marked"> <p><b>Personalized Itineraries :</b> We tailor each trip to your preferences, ensuring a unique and memorable experience.</p></li>
                                <li><img src="assets/images/icons/user-tie.svg" class="img-fluid" alt="user-tie"> <p><b>Expert Guides :</b> Our knowledgeable guides provide insights and local expertise to enrich your journey.</p></li>
                                <li><img src="assets/images/icons/headset.svg" class="img-fluid" alt="headset"> <p><b>24/7 Support :</b> We are available around the clock to assist you during your travels.</p></li>
                                <li><img src="assets/images/icons/dollar-sign.svg" class="img-fluid" alt="dollar-sign"> <p><b>Best Price Guarantee :</b> We offer competitive pricing without compromise.</p></li>
                                <li><img src="assets/images/icons/leaf.svg" class="img-fluid" alt="leaf"> <p><b>Commitment to Sustainability :</b> We prioritize eco-friendly practices to preserve the beauty of our destinations.</p></li>
                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center mt-3 mt-md-0" data-aos="fade-left" data-aos-duration="1000">
                    <img src="assets/images/why-choose-us-img.jpg" alt="Why Choose Us" class="img-fluid why-choose-us-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Service Counter section starts -->
    <section id="service-counter" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="service-counter-wrapper d-flex flex-column flex-md-row justify-content-around align-items-center">
                        <div class="counter-item text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="counter-number">500+</h2>
                            <p class="counter-label">Happy Travellders</p>
                        </div>
                        <div class="counter-item text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <h2 class="counter-number">150+</h2>
                            <p class="counter-label">Destinations Covered</p>
                        </div>
                        <div class="counter-item text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <h2 class="counter-number">50+</h2>
                            <p class="counter-label">Expert Guides</p>
                        </div>
                        <div class="mb-0 counter-item text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <h2 class="counter-number">24/7</h2>
                            <p class="counter-label">Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Counter section ends -->

    <!-- Trending Destinations section starts -->
    <section id="trending-destinations" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="heading text-center">Trending Destinations</h2>
                </div>
            </div>
            <div class="swiper myDestinationsSwiper mt-3">
                <div class="swiper-wrapper" data-aos="zoom-in" data-aos-duration="1000">

                    <!-- Sigiriya -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/1.jpg" alt="Sigiriya" class="img-fluid">
                            <h3 class="destination-name mt-2">Sigiriya</h3>
                        </div>
                    </div>

                    <!-- Kandy -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/2.jpg" alt="Kandy" class="img-fluid">
                            <h3 class="destination-name mt-2">Kandy</h3>
                        </div>
                    </div>

                    <!-- Mirissa -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/3.jpg" alt="Mirissa" class="img-fluid">
                            <h3 class="destination-name mt-2">Mirissa</h3>
                        </div>
                    </div>

                    <!-- Jaffna -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/4.jpg" alt="Jaffna" class="img-fluid">
                            <h3 class="destination-name mt-2">Jaffna</h3>
                        </div>
                    </div>

                    <!-- Galle -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/5.jpg" alt="Galle" class="img-fluid">
                            <h3 class="destination-name mt-2">Galle</h3>
                        </div>
                    </div>

                    <!-- Ella -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/6.jpg" alt="Ella" class="img-fluid">
                            <h3 class="destination-name mt-2">Ella</h3>
                        </div>
                    </div>

                    <!-- Nuwara Eliya -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/7.jpg" alt="Nuwara Eliya" class="img-fluid">
                            <h3 class="destination-name mt-2">Nuwara Eliya</h3>
                        </div>
                    </div>

                    <!-- Trincomalee -->
                    <div class="swiper-slide mb-4">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/8.jpg" alt="Trincomalee" class="img-fluid">
                            <h3 class="destination-name mt-2">Trincomalee</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- Trending Destinations section ends -->

    <!-- Beauty of Srilanka section starts -->
    <section id="beauty-of-srilanka" class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col px-0">
                    <div class="image-overlay">
                        <img src="assets/images/beauty-srilanka.png" alt="Beauty of Srilanka" class="img-fluid w-100">
                        <div class="overlay"></div> 
                        <div class="overlay-text">
                            <h2 class="heading">Journey Through Sri Lanka</h2>
                            <a href="[[~3]]" class="btn btn-primary mt-3">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Beauty of Srilanka section ends -->

    <!-- Book your trip section starts -->
    <section id="book-your-trip" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <span>Easy and Fast</span>
                    <h2 class="heading" data-aos="fade-up" data-aos-duration="1000">Book your next trip <br> in 3 easy steps</h2>
                    <ul class="list-unstyled mt-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="d-flex align-items-center mb-4">
                            <img src="assets/images/icons/destinations.svg" alt="Choose Destination" class="img-fluid">
                            <li>
                                <h3>Choose Destination</h3>
                                <p>Whether you love beaches, mountains, or cities—choose the destination that excites you.</p>
                            </li>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <img src="assets/images/icons/payment.svg" alt="Choose Payment" class="img-fluid">
                            <li>
                                <h3>Plan Your Itinerary</h3>
                                <p>Customize your trip schedule to match your interests and travel style</p>
                            </li>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/icons/travel.svg" alt="Reach Airport on Selected Date" class="img-fluid">
                            <li>
                                <h3>Begin Your Adventure</h3>
                                <p>Experience the beauty and excitement of your chosen destination to the fullest.</p>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0 d-flex justify-content-center align-items-center">
                    <img src="assets/images/book-trip.png" alt="Book your trip" class="img-fluid beauty-srilanka" data-aos="fade-left" data-aos-duration="1000">
                </div>
            </div>
        </div>
    </section>
    <!-- Book your trip section ends -->

    <!-- Popular things to do section starts -->
    <section id="popular-things-to-do" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="heading text-center">Popular Things to Do</h2>
                </div>
            </div>

            <div class="row g-4">
                <!-- Left column: 2 stacked images -->
                <div class="col-12 col-md-4">
                    <div class="popular-card mb-4">
                    <img src="assets/images/popular/1.jpg" alt="Safari">
                    <div class="overlay"></div>
                    <span class="title">Safari</span>
                    </div>
                    <div class="popular-card">
                    <img src="assets/images/popular/4.jpg" alt="Train Rides">
                    <div class="overlay"></div>
                    <span class="title">Train Rides</span>
                    </div>
                </div>

                <!-- Center column: single tall image spanning rows naturally -->
                <div class="col-12 col-md-4">
                    <div class="popular-card h-100">
                    <img src="assets/images/popular/2.jpg" alt="Visiting Temples" style="height: 100%; object-fit: cover;">
                    <div class="overlay"></div>
                    <span class="title">Visiting Temples</span>
                    </div>
                </div>

                <!-- Right column: 2 stacked images -->
                <div class="col-12 col-md-4">
                    <div class="popular-card mb-4">
                    <img src="assets/images/popular/3.jpg" alt="Tea Plantation Tours">
                    <div class="overlay"></div>
                    <span class="title">Tea Plantation Tours</span>
                    </div>
                   <div class="col-12">
                        <div class="row g-2">
                            <!-- First image -->
                            <div class="col-12 col-md-6">
                            <div class="popular-card">
                                <img src="assets/images/popular/5.jpg" alt="Rafting">
                                <div class="overlay"></div>
                                <span class="title">Rafting</span>
                            </div>
                            </div>

                            <!-- Second image -->
                            <div class="col-12 col-md-6">
                            <div class="popular-card">
                                <img src="assets/images/popular/6.jpg" alt="Shopping">
                                <div class="overlay"></div>
                                <span class="title">Shopping</span>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular things to do section ends -->

    <!-- Featured Trips section starts -->
    <section id="featured-trips" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="heading text-center">Featured Trips</h2>
                </div>
            </div>
            [[!HomeDB]]
        </div>
    </section>
    <!-- Featured Trips section ends -->

    <!--Get in Touch section starts -->
    <section id="get-in-touch" class="py-5">
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="1000">
                                    <h2 class="heading mb-3">Looking for a Personalized Trip or Tour ?</h2>
                                    <p class="supportive-text mb-4">
                                        Tell us about your travel plans, and we’ll create a custom trip just for you. From relaxing holidays to adventure tours, we handle all the details so you can enjoy a smooth and stress-free journey.
                                    </p>
                                    <a href="[[~7]]" class="btn btn-primary" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                        Inquire Now
                                    </a>
                                </div>
                                <div class="col-md-6 text-center" data-aos="fade-left" data-aos-duration="1000">
                                    <img src="assets/images/travel-cta.png" alt="Travel" class="img-fluid hover-zoom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Get in Touch section ends -->

  <!-- Customer Reviews section starts -->
    <section id="customer-reviews" class="pb-5">
        <div class="container text-center">
            <h2 class="heading">What Our Customers Say</h2>
            [[!GoogleReviews]]
        </div>
    </section>
    <!-- Customer Reviews section ends -->

    <!-- Travel Articles section starts -->
    <section id="travel-articles" class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="heading text-center">Travel Articles</h2>
                </div>
            </div>
            <div class="row mt-4 g-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/1.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Festivals of Sri Lanka: When to Visit for Culture, Rituals & Local Life</h3>
                            <a href="[[~5]]" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/2.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Hidden Cultural Gems: Temples, Forts & Ancient Cities Beyond the Usual</h3>
                            <a href="[[~5]]" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/3.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Tea Country & Colonial Charm: Discovering Hill Country Heritage</h3>
                            <a href="[[~5]]" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/1.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Festivals of Sri Lanka: When to Visit for Culture, Rituals & Local Life</h3>
                            <a href="[[~5]]" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Travel Articles section ends -->

    <script>
        const heroSwiper = new Swiper(".homeHeroSwiper", {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            speed: 800,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            }
        });
    </script>

    <script>
        var swiper = new Swiper(".myDestinationsSwiper", {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,

            autoplay: {
                delay: 2000,     
                disableOnInteraction: false,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                576: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                992: { slidesPerView: 6 },
            }
        });
    </script>

    <script>
       const slwiper = new Swiper(\'.featured-tours-swiper\', {
            slidesPerView: 1,      
            spaceBetween: 20,   
            loop: true,          
            autoplay: {           
                delay: 3000,       
                disableOnInteraction: false, 
            },
            pagination: {
                el: \'.swiper-pagination\',
                clickable: true,
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1200: { slidesPerView: 4 },
            },
        });
    </script>

    <script>
        document.querySelectorAll(\'.read-more\').forEach(btn => {
            btn.addEventListener(\'click\', function(e) {
                e.preventDefault();
                const shortText = this.parentElement.querySelector(\'.short-text\');
                const fullText = this.parentElement.querySelector(\'.full-text\');

                if (fullText.classList.contains(\'d-none\')) {
                    fullText.classList.remove(\'d-none\');
                    shortText.classList.add(\'d-none\');
                    this.textContent = "Read less";
                } else {
                    fullText.classList.add(\'d-none\');
                    shortText.classList.remove(\'d-none\');
                    this.textContent = "Read more";
                }
            });
        });
    </script>
</body>',
    'richtext' => 1,
    'template' => 2,
    'menuindex' => 0,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1765877278,
    'editedby' => 1,
    'editedon' => 1765905196,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 0,
    'publishedby' => 0,
    'menutitle' => '',
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'MODX\\Revolution\\modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => '',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => NULL,
    'alias_visible' => 1,
    '_content' => '<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo WEBSITE_DESCRIPTION; ?>">
    <meta name="keywords" content="<?php echo WEBSITE_KEYWORDS; ?>">
    <meta name="author" content="Explore Vacations">
    <meta name="robots" content="index, follow">

    <!-- Page Title -->
    <title>Explore Vacations</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Canonical URL -->
    <link rel="canonical" href="">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Swiper JS -->
    <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css">
    <!-- AOS Animations CSS -->
    <link href="node_modules/aos/dist/aos.css" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/overrides.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!-- Bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="node_modules/swiper/swiper-bundle.min.js"></script>
    <!-- AOS Animations JS -->
    <script src="node_modules/aos/dist/aos.js"></script>
    <!-- Whatsapp widget JS -->
    <script src="assets/js/whatsapp-widget.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
<header>
    <!-- Navbar starts-->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container">
            <a class="navbar-brand" href="./">
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="d-none d-lg-inline">
                <!-- <span>
                    Explore Vacations
                </span> -->
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Explore Vacations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="./" page-name="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=2" page-name="about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=3" page-name="tours">Tours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=4" page-name="faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=5" page-name="blogs">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=7" page-name="contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar ends-->
</header>


<body id = "homePage">
    <!-- Home hero starts -->
    <section id="homeHero">
        <div class="swiper homeHeroSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <img src="assets/images/home-hero/img-1.jpg" alt="Explore Vacations"class="img-fluid d-none d-md-block">
                    <img src="assets/images/home-hero/img-1-sm.jpg" alt="Explore Vacations" class="img-fluid d-md-none">
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <img src="assets/images/home-hero/img-2.jpg" alt="Explore Vacations" class="img-fluid d-none d-md-block">
                    <img src="assets/images/home-hero/img-2-sm.jpg" alt="Explore Vacations" class="img-fluid d-md-none">
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <img src="assets/images/home-hero/img-3.jpg" alt="Explore Vacations" class="img-fluid d-none d-md-block">
                    <img src="assets/images/home-hero/img-3-sm.jpg" alt="Explore Vacations" class="img-fluid d-md-none">
                </div>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="homehero-content">
            <h1 data-aos="fade-down-right" data-aos-duration="1000">Discover Wonders<br class="d-md-none"> with<br class="d-none d-md-block"> Every Step</h1>
            <p class="mt-3" data-aos="fade-down-left" data-aos-duration="1000">Discover unforgettable journeys with Explore Vacations. <br>Adventure, relaxation, and memories that last a lifetime.</p>
            <a href="index.php?id=3" class="mt-3">Plan Your Trip</a>
        </div>
    </section>
    <!-- Home hero ends -->

    <!-- Why choose us section starts -->
     <section id="why-choose-us" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div class="card">
                        <div class="card-body" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="heading mb-4">Why Choose Us?</h2>
                            <p class="supportive-text">At Explore Vacations, we are passionate about creating unforgettable travel experiences. Here’s why you should choose us for your next adventure:</p> 
                            <ul class="list-unstyled">
                                <li><img src="assets/images/icons/map-marked.svg" class="img-fluid" alt="map-marked"> <p><b>Personalized Itineraries :</b> We tailor each trip to your preferences, ensuring a unique and memorable experience.</p></li>
                                <li><img src="assets/images/icons/user-tie.svg" class="img-fluid" alt="user-tie"> <p><b>Expert Guides :</b> Our knowledgeable guides provide insights and local expertise to enrich your journey.</p></li>
                                <li><img src="assets/images/icons/headset.svg" class="img-fluid" alt="headset"> <p><b>24/7 Support :</b> We are available around the clock to assist you during your travels.</p></li>
                                <li><img src="assets/images/icons/dollar-sign.svg" class="img-fluid" alt="dollar-sign"> <p><b>Best Price Guarantee :</b> We offer competitive pricing without compromise.</p></li>
                                <li><img src="assets/images/icons/leaf.svg" class="img-fluid" alt="leaf"> <p><b>Commitment to Sustainability :</b> We prioritize eco-friendly practices to preserve the beauty of our destinations.</p></li>
                            </ul>
                        </div> 
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center mt-3 mt-md-0" data-aos="fade-left" data-aos-duration="1000">
                    <img src="assets/images/why-choose-us-img.jpg" alt="Why Choose Us" class="img-fluid why-choose-us-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Service Counter section starts -->
    <section id="service-counter" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="service-counter-wrapper d-flex flex-column flex-md-row justify-content-around align-items-center">
                        <div class="counter-item text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h2 class="counter-number">500+</h2>
                            <p class="counter-label">Happy Travellders</p>
                        </div>
                        <div class="counter-item text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <h2 class="counter-number">150+</h2>
                            <p class="counter-label">Destinations Covered</p>
                        </div>
                        <div class="counter-item text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <h2 class="counter-number">50+</h2>
                            <p class="counter-label">Expert Guides</p>
                        </div>
                        <div class="mb-0 counter-item text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <h2 class="counter-number">24/7</h2>
                            <p class="counter-label">Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Counter section ends -->

    <!-- Trending Destinations section starts -->
    <section id="trending-destinations" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="heading text-center">Trending Destinations</h2>
                </div>
            </div>
            <div class="swiper myDestinationsSwiper mt-3">
                <div class="swiper-wrapper" data-aos="zoom-in" data-aos-duration="1000">

                    <!-- Sigiriya -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/1.jpg" alt="Sigiriya" class="img-fluid">
                            <h3 class="destination-name mt-2">Sigiriya</h3>
                        </div>
                    </div>

                    <!-- Kandy -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/2.jpg" alt="Kandy" class="img-fluid">
                            <h3 class="destination-name mt-2">Kandy</h3>
                        </div>
                    </div>

                    <!-- Mirissa -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/3.jpg" alt="Mirissa" class="img-fluid">
                            <h3 class="destination-name mt-2">Mirissa</h3>
                        </div>
                    </div>

                    <!-- Jaffna -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/4.jpg" alt="Jaffna" class="img-fluid">
                            <h3 class="destination-name mt-2">Jaffna</h3>
                        </div>
                    </div>

                    <!-- Galle -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/5.jpg" alt="Galle" class="img-fluid">
                            <h3 class="destination-name mt-2">Galle</h3>
                        </div>
                    </div>

                    <!-- Ella -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/6.jpg" alt="Ella" class="img-fluid">
                            <h3 class="destination-name mt-2">Ella</h3>
                        </div>
                    </div>

                    <!-- Nuwara Eliya -->
                    <div class="swiper-slide">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/7.jpg" alt="Nuwara Eliya" class="img-fluid">
                            <h3 class="destination-name mt-2">Nuwara Eliya</h3>
                        </div>
                    </div>

                    <!-- Trincomalee -->
                    <div class="swiper-slide mb-4">
                        <div class="destination-item text-center">
                            <img src="assets/images/trending-destinations/8.jpg" alt="Trincomalee" class="img-fluid">
                            <h3 class="destination-name mt-2">Trincomalee</h3>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- Trending Destinations section ends -->

    <!-- Beauty of Srilanka section starts -->
    <section id="beauty-of-srilanka" class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col px-0">
                    <div class="image-overlay">
                        <img src="assets/images/beauty-srilanka.png" alt="Beauty of Srilanka" class="img-fluid w-100">
                        <div class="overlay"></div> 
                        <div class="overlay-text">
                            <h2 class="heading">Journey Through Sri Lanka</h2>
                            <a href="index.php?id=3" class="btn btn-primary mt-3">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Beauty of Srilanka section ends -->

    <!-- Book your trip section starts -->
    <section id="book-your-trip" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <span>Easy and Fast</span>
                    <h2 class="heading" data-aos="fade-up" data-aos-duration="1000">Book your next trip <br> in 3 easy steps</h2>
                    <ul class="list-unstyled mt-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="d-flex align-items-center mb-4">
                            <img src="assets/images/icons/destinations.svg" alt="Choose Destination" class="img-fluid">
                            <li>
                                <h3>Choose Destination</h3>
                                <p>Whether you love beaches, mountains, or cities—choose the destination that excites you.</p>
                            </li>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <img src="assets/images/icons/payment.svg" alt="Choose Payment" class="img-fluid">
                            <li>
                                <h3>Plan Your Itinerary</h3>
                                <p>Customize your trip schedule to match your interests and travel style</p>
                            </li>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/icons/travel.svg" alt="Reach Airport on Selected Date" class="img-fluid">
                            <li>
                                <h3>Begin Your Adventure</h3>
                                <p>Experience the beauty and excitement of your chosen destination to the fullest.</p>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0 d-flex justify-content-center align-items-center">
                    <img src="assets/images/book-trip.png" alt="Book your trip" class="img-fluid beauty-srilanka" data-aos="fade-left" data-aos-duration="1000">
                </div>
            </div>
        </div>
    </section>
    <!-- Book your trip section ends -->

    <!-- Popular things to do section starts -->
    <section id="popular-things-to-do" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="heading text-center">Popular Things to Do</h2>
                </div>
            </div>

            <div class="row g-4">
                <!-- Left column: 2 stacked images -->
                <div class="col-12 col-md-4">
                    <div class="popular-card mb-4">
                    <img src="assets/images/popular/1.jpg" alt="Safari">
                    <div class="overlay"></div>
                    <span class="title">Safari</span>
                    </div>
                    <div class="popular-card">
                    <img src="assets/images/popular/4.jpg" alt="Train Rides">
                    <div class="overlay"></div>
                    <span class="title">Train Rides</span>
                    </div>
                </div>

                <!-- Center column: single tall image spanning rows naturally -->
                <div class="col-12 col-md-4">
                    <div class="popular-card h-100">
                    <img src="assets/images/popular/2.jpg" alt="Visiting Temples" style="height: 100%; object-fit: cover;">
                    <div class="overlay"></div>
                    <span class="title">Visiting Temples</span>
                    </div>
                </div>

                <!-- Right column: 2 stacked images -->
                <div class="col-12 col-md-4">
                    <div class="popular-card mb-4">
                    <img src="assets/images/popular/3.jpg" alt="Tea Plantation Tours">
                    <div class="overlay"></div>
                    <span class="title">Tea Plantation Tours</span>
                    </div>
                   <div class="col-12">
                        <div class="row g-2">
                            <!-- First image -->
                            <div class="col-12 col-md-6">
                            <div class="popular-card">
                                <img src="assets/images/popular/5.jpg" alt="Rafting">
                                <div class="overlay"></div>
                                <span class="title">Rafting</span>
                            </div>
                            </div>

                            <!-- Second image -->
                            <div class="col-12 col-md-6">
                            <div class="popular-card">
                                <img src="assets/images/popular/6.jpg" alt="Shopping">
                                <div class="overlay"></div>
                                <span class="title">Shopping</span>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular things to do section ends -->

    <!-- Featured Trips section starts -->
    <section id="featured-trips" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="heading text-center">Featured Trips</h2>
                </div>
            </div>
            [[!HomeDB]]
        </div>
    </section>
    <!-- Featured Trips section ends -->

    <!--Get in Touch section starts -->
    <section id="get-in-touch" class="py-5">
        <div class="container">
            <div class="row">   
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-duration="1000">
                                    <h2 class="heading mb-3">Looking for a Personalized Trip or Tour ?</h2>
                                    <p class="supportive-text mb-4">
                                        Tell us about your travel plans, and we’ll create a custom trip just for you. From relaxing holidays to adventure tours, we handle all the details so you can enjoy a smooth and stress-free journey.
                                    </p>
                                    <a href="index.php?id=7" class="btn btn-primary" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                                        Inquire Now
                                    </a>
                                </div>
                                <div class="col-md-6 text-center" data-aos="fade-left" data-aos-duration="1000">
                                    <img src="assets/images/travel-cta.png" alt="Travel" class="img-fluid hover-zoom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Get in Touch section ends -->

  <!-- Customer Reviews section starts -->
    <section id="customer-reviews" class="pb-5">
        <div class="container text-center">
            <h2 class="heading">What Our Customers Say</h2>
            [[!GoogleReviews]]
        </div>
    </section>
    <!-- Customer Reviews section ends -->

    <!-- Travel Articles section starts -->
    <section id="travel-articles" class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="heading text-center">Travel Articles</h2>
                </div>
            </div>
            <div class="row mt-4 g-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/1.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Festivals of Sri Lanka: When to Visit for Culture, Rituals & Local Life</h3>
                            <a href="index.php?id=5" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/2.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Hidden Cultural Gems: Temples, Forts & Ancient Cities Beyond the Usual</h3>
                            <a href="index.php?id=5" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/3.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Tea Country & Colonial Charm: Discovering Hill Country Heritage</h3>
                            <a href="index.php?id=5" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="assets/images/festivals/1.jpg" alt="Travel Articles" class="img-fluid">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">April 6 2024 | By Test</p>
                            <h3 class="card-title">Festivals of Sri Lanka: When to Visit for Culture, Rituals & Local Life</h3>
                            <a href="index.php?id=5" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Travel Articles section ends -->

    <script>
        const heroSwiper = new Swiper(".homeHeroSwiper", {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            speed: 800,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            }
        });
    </script>

    <script>
        var swiper = new Swiper(".myDestinationsSwiper", {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,

            autoplay: {
                delay: 2000,     
                disableOnInteraction: false,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                576: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                992: { slidesPerView: 6 },
            }
        });
    </script>

    <script>
       const slwiper = new Swiper(\'.featured-tours-swiper\', {
            slidesPerView: 1,      
            spaceBetween: 20,   
            loop: true,          
            autoplay: {           
                delay: 3000,       
                disableOnInteraction: false, 
            },
            pagination: {
                el: \'.swiper-pagination\',
                clickable: true,
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1200: { slidesPerView: 4 },
            },
        });
    </script>

    <script>
        document.querySelectorAll(\'.read-more\').forEach(btn => {
            btn.addEventListener(\'click\', function(e) {
                e.preventDefault();
                const shortText = this.parentElement.querySelector(\'.short-text\');
                const fullText = this.parentElement.querySelector(\'.full-text\');

                if (fullText.classList.contains(\'d-none\')) {
                    fullText.classList.remove(\'d-none\');
                    shortText.classList.add(\'d-none\');
                    this.textContent = "Read less";
                } else {
                    fullText.classList.add(\'d-none\');
                    shortText.classList.remove(\'d-none\');
                    this.textContent = "Read more";
                }
            });
        });
    </script>
</body>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col order-lg-1 ">
                <h6 class="footer-logo m-0"><img src="assets/images/footer-logo.png" alt="Explore Vacations | Logo"></h6>
                <p class="my-3 my-lg-4">Join us in exploring Sri Lanka, <br>where adventure meets excellence.</p>
                <ul class="list-unstyled d-flex" id="footer-social-list">
                    <li class="me-2">
                        <a href="https://www.facebook.com/explorevacationssrilanka" target="_blank" alt="facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="https://www.instagram.com/explorevacationssrilanka/" target="_blank" alt="instragram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="ms-2">
                        <a href="https://wa.me/+94761414554" target="_blank" alt="whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-2">
                <h6 class="my-4 mt-lg-0">Links</h6>
                <ul class="list-unstyled" id="footer-nav-link-list">
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a href="index.php?id=2">About Us</a>
                    </li>
                    <li>
                        <a href="index.php?id=4">FAQ</a>
                    </li>
                    <li>
                        <a href="index.php?id=5">Blogs</a>
                    </li>
                    <li>
                        <a href="index.php?id=7">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-4">
                <h6 class="my-4 mt-lg-0">Contact</h6>
                <ul class="list-unstyled" id="footer-contact-list">
                    <li>
                        <img src="assets/images/icons/footer-phone.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="tel:+94761414554">+94 76 1414 554</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-location.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="https://maps.app.goo.gl/Coi2NuS2utwZLLhC6" target="_blank">371/5 Negombo Rd, Seeduwa</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="m-0 py-4">Designed and Developed by <a href="" target="_blank">Explore Vacations</a>. <br class="d-md-none">© 2025</p>
            </div>
        </div>
    </div>
</footer>

<!--Whatsapp widget-->
<div id="whatsapp-widget">
    <div class="chat-header" id="chat-header">
        <div class="avatar-container">
            <img src="assets/images/whatsapp-img.jpg" alt="logo">
            <div class="online-dot"></div>
        </div>
        <div class="chat-header-info">
            <span style="transform: translateY(2px);">Explore Vacations</span>
            <div style="color: #eeeeee;">online</div>

        </div>
        <button class="close-btn" id="close-btn">&times;</button>
    </div>
    <div class="chat-content" id="chat-content">
    </div>
    <div class="message-input" id="message-input">
        <button class="whatsapp-btn" id="whatsapp-btn">Chat in WhatsApp</button>
    </div>
    <div class="chat-icon" id="chat-icon">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </div>
</div>',
    '_isForward' => false,
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'icon' => '',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'elementCache' => 
  array (
    '[[$header?]]' => '<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo WEBSITE_DESCRIPTION; ?>">
    <meta name="keywords" content="<?php echo WEBSITE_KEYWORDS; ?>">
    <meta name="author" content="Explore Vacations">
    <meta name="robots" content="index, follow">

    <!-- Page Title -->
    <title>Explore Vacations</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Canonical URL -->
    <link rel="canonical" href="">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Swiper JS -->
    <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css">
    <!-- AOS Animations CSS -->
    <link href="node_modules/aos/dist/aos.css" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/overrides.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!-- Bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="node_modules/swiper/swiper-bundle.min.js"></script>
    <!-- AOS Animations JS -->
    <script src="node_modules/aos/dist/aos.js"></script>
    <!-- Whatsapp widget JS -->
    <script src="assets/js/whatsapp-widget.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>',
    '[[~2]]' => 'index.php?id=2',
    '[[~3]]' => 'index.php?id=3',
    '[[~4]]' => 'index.php?id=4',
    '[[~5]]' => 'index.php?id=5',
    '[[~7]]' => 'index.php?id=7',
    '[[$navbar?]]' => '<header>
    <!-- Navbar starts-->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container">
            <a class="navbar-brand" href="./">
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="d-none d-lg-inline">
                <!-- <span>
                    Explore Vacations
                </span> -->
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Explore Vacations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="./" page-name="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=2" page-name="about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=3" page-name="tours">Tours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=4" page-name="faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=5" page-name="blogs">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?id=7" page-name="contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar ends-->
</header>',
    '[[$footer?]]' => '<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col order-lg-1 ">
                <h6 class="footer-logo m-0"><img src="assets/images/footer-logo.png" alt="Explore Vacations | Logo"></h6>
                <p class="my-3 my-lg-4">Join us in exploring Sri Lanka, <br>where adventure meets excellence.</p>
                <ul class="list-unstyled d-flex" id="footer-social-list">
                    <li class="me-2">
                        <a href="https://www.facebook.com/explorevacationssrilanka" target="_blank" alt="facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="https://www.instagram.com/explorevacationssrilanka/" target="_blank" alt="instragram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="ms-2">
                        <a href="https://wa.me/+94761414554" target="_blank" alt="whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-2">
                <h6 class="my-4 mt-lg-0">Links</h6>
                <ul class="list-unstyled" id="footer-nav-link-list">
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a href="index.php?id=2">About Us</a>
                    </li>
                    <li>
                        <a href="index.php?id=4">FAQ</a>
                    </li>
                    <li>
                        <a href="index.php?id=5">Blogs</a>
                    </li>
                    <li>
                        <a href="index.php?id=7">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-4">
                <h6 class="my-4 mt-lg-0">Contact</h6>
                <ul class="list-unstyled" id="footer-contact-list">
                    <li>
                        <img src="assets/images/icons/footer-phone.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="tel:+94761414554">+94 76 1414 554</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-location.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="https://maps.app.goo.gl/Coi2NuS2utwZLLhC6" target="_blank">371/5 Negombo Rd, Seeduwa</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="m-0 py-4">Designed and Developed by <a href="" target="_blank">Explore Vacations</a>. <br class="d-md-none">© 2025</p>
            </div>
        </div>
    </div>
</footer>

<!--Whatsapp widget-->
<div id="whatsapp-widget">
    <div class="chat-header" id="chat-header">
        <div class="avatar-container">
            <img src="assets/images/whatsapp-img.jpg" alt="logo">
            <div class="online-dot"></div>
        </div>
        <div class="chat-header-info">
            <span style="transform: translateY(2px);">Explore Vacations</span>
            <div style="color: #eeeeee;">online</div>

        </div>
        <button class="close-btn" id="close-btn">&times;</button>
    </div>
    <div class="chat-content" id="chat-content">
    </div>
    <div class="message-input" id="message-input">
        <button class="whatsapp-btn" id="whatsapp-btn">Chat in WhatsApp</button>
    </div>
    <div class="chat-icon" id="chat-icon">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </div>
</div>',
  ),
  'sourceCache' => 
  array (
    'MODX\\Revolution\\modChunk' => 
    array (
      'header' => 
      array (
        'fields' => 
        array (
          'id' => 3,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'header',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo WEBSITE_DESCRIPTION; ?>">
    <meta name="keywords" content="<?php echo WEBSITE_KEYWORDS; ?>">
    <meta name="author" content="Explore Vacations">
    <meta name="robots" content="index, follow">

    <!-- Page Title -->
    <title>Explore Vacations</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Canonical URL -->
    <link rel="canonical" href="">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Swiper JS -->
    <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css">
    <!-- AOS Animations CSS -->
    <link href="node_modules/aos/dist/aos.css" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/overrides.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!-- Bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="node_modules/swiper/swiper-bundle.min.js"></script>
    <!-- AOS Animations JS -->
    <script src="node_modules/aos/dist/aos.js"></script>
    <!-- Whatsapp widget JS -->
    <script src="assets/js/whatsapp-widget.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo WEBSITE_DESCRIPTION; ?>">
    <meta name="keywords" content="<?php echo WEBSITE_KEYWORDS; ?>">
    <meta name="author" content="Explore Vacations">
    <meta name="robots" content="index, follow">

    <!-- Page Title -->
    <title>Explore Vacations</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Canonical URL -->
    <link rel="canonical" href="">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Swiper JS -->
    <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css">
    <!-- AOS Animations CSS -->
    <link href="node_modules/aos/dist/aos.css" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/overrides.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!-- Bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="node_modules/swiper/swiper-bundle.min.js"></script>
    <!-- AOS Animations JS -->
    <script src="node_modules/aos/dist/aos.js"></script>
    <!-- Whatsapp widget JS -->
    <script src="assets/js/whatsapp-widget.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'MODX\\Revolution\\Sources\\modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'navbar' => 
      array (
        'fields' => 
        array (
          'id' => 2,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'navbar',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '<header>
    <!-- Navbar starts-->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container">
            <a class="navbar-brand" href="./">
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="d-none d-lg-inline">
                <!-- <span>
                    Explore Vacations
                </span> -->
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Explore Vacations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="./" page-name="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~2]]" page-name="about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~3]]" page-name="tours">Tours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~4]]" page-name="faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~5]]" page-name="blogs">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~7]]" page-name="contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar ends-->
</header>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<header>
    <!-- Navbar starts-->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container">
            <a class="navbar-brand" href="./">
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="d-none d-lg-inline">
                <!-- <span>
                    Explore Vacations
                </span> -->
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Explore Vacations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="./" page-name="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~2]]" page-name="about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~3]]" page-name="tours">Tours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~4]]" page-name="faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~5]]" page-name="blogs">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="[[~7]]" page-name="contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar ends-->
</header>',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'MODX\\Revolution\\Sources\\modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'footer' => 
      array (
        'fields' => 
        array (
          'id' => 1,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'footer',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col order-lg-1 ">
                <h6 class="footer-logo m-0"><img src="assets/images/footer-logo.png" alt="Explore Vacations | Logo"></h6>
                <p class="my-3 my-lg-4">Join us in exploring Sri Lanka, <br>where adventure meets excellence.</p>
                <ul class="list-unstyled d-flex" id="footer-social-list">
                    <li class="me-2">
                        <a href="https://www.facebook.com/explorevacationssrilanka" target="_blank" alt="facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="https://www.instagram.com/explorevacationssrilanka/" target="_blank" alt="instragram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="ms-2">
                        <a href="https://wa.me/+94761414554" target="_blank" alt="whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-2">
                <h6 class="my-4 mt-lg-0">Links</h6>
                <ul class="list-unstyled" id="footer-nav-link-list">
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a href="[[~2]]">About Us</a>
                    </li>
                    <li>
                        <a href="[[~4]]">FAQ</a>
                    </li>
                    <li>
                        <a href="[[~5]]">Blogs</a>
                    </li>
                    <li>
                        <a href="[[~7]]">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-4">
                <h6 class="my-4 mt-lg-0">Contact</h6>
                <ul class="list-unstyled" id="footer-contact-list">
                    <li>
                        <img src="assets/images/icons/footer-phone.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="tel:+94761414554">+94 76 1414 554</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-location.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="https://maps.app.goo.gl/Coi2NuS2utwZLLhC6" target="_blank">371/5 Negombo Rd, Seeduwa</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="m-0 py-4">Designed and Developed by <a href="" target="_blank">Explore Vacations</a>. <br class="d-md-none">© 2025</p>
            </div>
        </div>
    </div>
</footer>

<!--Whatsapp widget-->
<div id="whatsapp-widget">
    <div class="chat-header" id="chat-header">
        <div class="avatar-container">
            <img src="assets/images/whatsapp-img.jpg" alt="logo">
            <div class="online-dot"></div>
        </div>
        <div class="chat-header-info">
            <span style="transform: translateY(2px);">Explore Vacations</span>
            <div style="color: #eeeeee;">online</div>

        </div>
        <button class="close-btn" id="close-btn">&times;</button>
    </div>
    <div class="chat-content" id="chat-content">
    </div>
    <div class="message-input" id="message-input">
        <button class="whatsapp-btn" id="whatsapp-btn">Chat in WhatsApp</button>
    </div>
    <div class="chat-icon" id="chat-icon">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </div>
</div>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col order-lg-1 ">
                <h6 class="footer-logo m-0"><img src="assets/images/footer-logo.png" alt="Explore Vacations | Logo"></h6>
                <p class="my-3 my-lg-4">Join us in exploring Sri Lanka, <br>where adventure meets excellence.</p>
                <ul class="list-unstyled d-flex" id="footer-social-list">
                    <li class="me-2">
                        <a href="https://www.facebook.com/explorevacationssrilanka" target="_blank" alt="facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="https://www.instagram.com/explorevacationssrilanka/" target="_blank" alt="instragram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="ms-2">
                        <a href="https://wa.me/+94761414554" target="_blank" alt="whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-2">
                <h6 class="my-4 mt-lg-0">Links</h6>
                <ul class="list-unstyled" id="footer-nav-link-list">
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a href="[[~2]]">About Us</a>
                    </li>
                    <li>
                        <a href="[[~4]]">FAQ</a>
                    </li>
                    <li>
                        <a href="[[~5]]">Blogs</a>
                    </li>
                    <li>
                        <a href="[[~7]]">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4 order-lg-4">
                <h6 class="my-4 mt-lg-0">Contact</h6>
                <ul class="list-unstyled" id="footer-contact-list">
                    <li>
                        <img src="assets/images/icons/footer-phone.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="tel:+94761414554">+94 76 1414 554</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a>
                    </li>
                    <li>
                        <img src="assets/images/icons/footer-location.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <a href="https://maps.app.goo.gl/Coi2NuS2utwZLLhC6" target="_blank">371/5 Negombo Rd, Seeduwa</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="m-0 py-4">Designed and Developed by <a href="" target="_blank">Explore Vacations</a>. <br class="d-md-none">© 2025</p>
            </div>
        </div>
    </div>
</footer>

<!--Whatsapp widget-->
<div id="whatsapp-widget">
    <div class="chat-header" id="chat-header">
        <div class="avatar-container">
            <img src="assets/images/whatsapp-img.jpg" alt="logo">
            <div class="online-dot"></div>
        </div>
        <div class="chat-header-info">
            <span style="transform: translateY(2px);">Explore Vacations</span>
            <div style="color: #eeeeee;">online</div>

        </div>
        <button class="close-btn" id="close-btn">&times;</button>
    </div>
    <div class="chat-content" id="chat-content">
    </div>
    <div class="message-input" id="message-input">
        <button class="whatsapp-btn" id="whatsapp-btn">Chat in WhatsApp</button>
    </div>
    <div class="chat-icon" id="chat-icon">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </div>
</div>',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'MODX\\Revolution\\Sources\\modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'MODX\\Revolution\\modSnippet' => 
    array (
      'HomeDB' => 
      array (
        'fields' => 
        array (
          'id' => 1,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'HomeDB',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => 'include \'assets/includes/db_connect.php\';
$stmt = $conn->query("
    SELECT id, name, description, image, days, reviews
    FROM tours
    ORDER BY id ASC
");
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (!empty($tours)): ?>
<div class="swiper featured-tours-swiper">
    <div class="swiper-wrapper mb-5">

        <?php foreach ($tours as $tour): ?>
            <div class="swiper-slide">
                <div class="card h-100">

                    <img
                        src="assets/images/featured-trips/<?php echo htmlspecialchars($tour[\'image\']); ?>"
                        alt="<?php echo htmlspecialchars($tour[\'name\']); ?>"
                        class="img-fluid"
                    >

                    <div class="card-body" style="height:200px;">
                        <h3 class="card-title">
                            <?php echo htmlspecialchars($tour[\'name\']); ?>
                        </h3>

                        <p class="card-text">
                            <?php echo htmlspecialchars($tour[\'description\']); ?>
                        </p>

                        <hr class="mt-1">

                        <div class="d-flex justify-content-between">
                            <span><?php echo (int)$tour[\'days\']; ?> Days</span>
                            <span>
                                <?php echo (float)$tour[\'reviews\']; ?> ★
                                (<?php echo (int)$tour[\'reviews\']; ?> reviews)
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="swiper-pagination"></div>
</div>
<?php endif;',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'include \'assets/includes/db_connect.php\';
$stmt = $conn->query("
    SELECT id, name, description, image, days, reviews
    FROM tours
    ORDER BY id ASC
");
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (!empty($tours)): ?>
<div class="swiper featured-tours-swiper">
    <div class="swiper-wrapper mb-5">

        <?php foreach ($tours as $tour): ?>
            <div class="swiper-slide">
                <div class="card h-100">

                    <img
                        src="assets/images/featured-trips/<?php echo htmlspecialchars($tour[\'image\']); ?>"
                        alt="<?php echo htmlspecialchars($tour[\'name\']); ?>"
                        class="img-fluid"
                    >

                    <div class="card-body" style="height:200px;">
                        <h3 class="card-title">
                            <?php echo htmlspecialchars($tour[\'name\']); ?>
                        </h3>

                        <p class="card-text">
                            <?php echo htmlspecialchars($tour[\'description\']); ?>
                        </p>

                        <hr class="mt-1">

                        <div class="d-flex justify-content-between">
                            <span><?php echo (int)$tour[\'days\']; ?> Days</span>
                            <span>
                                <?php echo (float)$tour[\'reviews\']; ?> ★
                                (<?php echo (int)$tour[\'reviews\']; ?> reviews)
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="swiper-pagination"></div>
</div>
<?php endif;',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'MODX\\Revolution\\Sources\\modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
      'GoogleReviews' => 
      array (
        'fields' => 
        array (
          'id' => 2,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'GoogleReviews',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => 'include \'assets/includes/db_connect.php\';

$apiKey  = "AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM";
$placeId = "ChIJpV-pH0vw4joREeE9so6gzEI";

$url = "https://maps.googleapis.com/maps/api/place/details/json"
     . "?place_id={$placeId}"
     . "&fields=rating,reviews.author_name,reviews.text,"
     . "reviews.relative_time_description,reviews.profile_photo_url,"
     . "reviews.rating"
     . "&key={$apiKey}";

$response = @file_get_contents($url);
$data = $response ? json_decode($response, true) : [];

$reviews = $data[\'result\'][\'reviews\'] ?? [];
?>

<?php if (!empty($reviews)): ?>
<div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner text-center">

        <?php foreach ($reviews as $index => $review): ?>
            <div class="carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>">
                <div class="review-content px-3">

                    <img
                        src="<?php echo htmlspecialchars($review[\'profile_photo_url\'] ?? \'\'); ?>"
                        onerror="this.src=\'assets/images/default-user.png\';"
                        class="mb-3 rounded-circle"
                        width="90"
                        height="90"
                        alt="User Photo"
                    >

                    <!-- Rating Stars -->
                    <div class="mb-2">
                        <?php
                            $rating = isset($review[\'rating\']) ? (int) round($review[\'rating\']) : 0;
                            for ($i = 1; $i <= 5; $i++):
                                echo \'<span style="color:#cab449ff;">&#9733;</span>\';
                            endfor;
                        ?>
                    </div>

                    <!-- Review Text -->
                    <?php
                        $full   = trim($review[\'text\'] ?? \'\');
                        $short  = mb_substr($full, 0, 220);
                        $isLong = mb_strlen($full) > 220;
                    ?>
                    <p class="review-text">
                        <span class="short-text">
                            <?php echo htmlspecialchars($short . ($isLong ? \'...\' : \'\')); ?>
                        </span>

                        <?php if ($isLong): ?>
                            <span class="full-text d-none">
                                <?php echo htmlspecialchars($full); ?>
                            </span>
                            <a href="#" class="read-more text-decoration-none ms-1">
                                Read more
                            </a>
                        <?php endif; ?>
                    </p>

                    <h5 class="mt-3 mb-0">
                        <?php echo ucwords(strtolower($review[\'author_name\'] ?? \'\')); ?>
                    </h5>
                    <small class="text-muted">
                        <?php echo htmlspecialchars($review[\'relative_time_description\'] ?? \'\'); ?>
                    </small>

                </div>
            </div>
        <?php endforeach; ?>
</div>
                <div class="swiper-pagination"></div>

    </div>
</div>
<?php endif;',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'include \'assets/includes/db_connect.php\';

$apiKey  = "AIzaSyBl50Q8W4ZF2_EkOJ1lnRoVxO1IdjIupjM";
$placeId = "ChIJpV-pH0vw4joREeE9so6gzEI";

$url = "https://maps.googleapis.com/maps/api/place/details/json"
     . "?place_id={$placeId}"
     . "&fields=rating,reviews.author_name,reviews.text,"
     . "reviews.relative_time_description,reviews.profile_photo_url,"
     . "reviews.rating"
     . "&key={$apiKey}";

$response = @file_get_contents($url);
$data = $response ? json_decode($response, true) : [];

$reviews = $data[\'result\'][\'reviews\'] ?? [];
?>

<?php if (!empty($reviews)): ?>
<div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner text-center">

        <?php foreach ($reviews as $index => $review): ?>
            <div class="carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>">
                <div class="review-content px-3">

                    <img
                        src="<?php echo htmlspecialchars($review[\'profile_photo_url\'] ?? \'\'); ?>"
                        onerror="this.src=\'assets/images/default-user.png\';"
                        class="mb-3 rounded-circle"
                        width="90"
                        height="90"
                        alt="User Photo"
                    >

                    <!-- Rating Stars -->
                    <div class="mb-2">
                        <?php
                            $rating = isset($review[\'rating\']) ? (int) round($review[\'rating\']) : 0;
                            for ($i = 1; $i <= 5; $i++):
                                echo \'<span style="color:#cab449ff;">&#9733;</span>\';
                            endfor;
                        ?>
                    </div>

                    <!-- Review Text -->
                    <?php
                        $full   = trim($review[\'text\'] ?? \'\');
                        $short  = mb_substr($full, 0, 220);
                        $isLong = mb_strlen($full) > 220;
                    ?>
                    <p class="review-text">
                        <span class="short-text">
                            <?php echo htmlspecialchars($short . ($isLong ? \'...\' : \'\')); ?>
                        </span>

                        <?php if ($isLong): ?>
                            <span class="full-text d-none">
                                <?php echo htmlspecialchars($full); ?>
                            </span>
                            <a href="#" class="read-more text-decoration-none ms-1">
                                Read more
                            </a>
                        <?php endif; ?>
                    </p>

                    <h5 class="mt-3 mb-0">
                        <?php echo ucwords(strtolower($review[\'author_name\'] ?? \'\')); ?>
                    </h5>
                    <small class="text-muted">
                        <?php echo htmlspecialchars($review[\'relative_time_description\'] ?? \'\'); ?>
                    </small>

                </div>
            </div>
        <?php endforeach; ?>
</div>
                <div class="swiper-pagination"></div>

    </div>
</div>
<?php endif;',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'MODX\\Revolution\\Sources\\modFileMediaSource',
          'properties' => 
          array (
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'MODX\\Revolution\\modTemplateVar' => 
    array (
    ),
  ),
);