<?php  return array (
  'resourceClass' => 'MODX\\Revolution\\modDocument',
  'resource' => 
  array (
    'id' => 3,
    'type' => 'document',
    'pagetitle' => 'tours',
    'longtitle' => '',
    'description' => '',
    'alias' => 'tours',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '<body id="toursPage">
    <!-- Hero starts -->
    <section id="hero">
        <img src="assets/images/tour-hero.jpg" alt="Explore Vacations - Tours">
        <div class="hero-content">
            <h1>Tours</h1>
        </div>
    </section>
    <!-- Hero ends -->

    <!-- Tour Theme section starts -->
    <section id="tour-theme" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="heading text-center">Discover Our Tour Themes</h2>
                    <p class="supportive-text mb-0 text-center">Select a theme and customize your tour. Explore various options and create a journey that suits your interests, whether it\'s adventure, culture, wildlife, or relaxation...</p>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="d-flex justify-content-end mb-3">
                        <a id="customizeBtn" href="#" class="btn btn-primary d-none">Customize Your Tour</a>
                    </div>                    
                    [[!ToursDB]]
                </div>
            </div>
        </div>
    </section>
    <!-- Tour Theme section ends -->

    <script>
        const selectedThemes = new Set();
        const cards = document.querySelectorAll(\'.selectable-card\');
        const customizeBtn = document.getElementById(\'customizeBtn\');

        cards.forEach(card => {
            card.addEventListener(\'click\', () => {
                const id = card.getAttribute(\'data-theme-id\');

                if (selectedThemes.has(id)) {
                    selectedThemes.delete(id);
                    card.classList.remove(\'selected\');
                } else {
                    selectedThemes.add(id);
                    card.classList.add(\'selected\');
                }

                // Show/hide button
                if (selectedThemes.size > 0) {
                    customizeBtn.classList.remove(\'d-none\');
                } else {
                    customizeBtn.classList.add(\'d-none\');
                }

                const url = new URL("[[~8]]", window.location.href);
                url.searchParams.set(\'themes\', Array.from(selectedThemes).join(\',\'));
                customizeBtn.href = url.pathname + url.search;
            });
        });

    </script>
</body>',
    'richtext' => 1,
    'template' => 2,
    'menuindex' => 2,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1765879148,
    'editedby' => 1,
    'editedon' => 1765883877,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1765879320,
    'publishedby' => 1,
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
<body id="toursPage">
    <!-- Hero starts -->
    <section id="hero">
        <img src="assets/images/tour-hero.jpg" alt="Explore Vacations - Tours">
        <div class="hero-content">
            <h1>Tours</h1>
        </div>
    </section>
    <!-- Hero ends -->

    <!-- Tour Theme section starts -->
    <section id="tour-theme" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="heading text-center">Discover Our Tour Themes</h2>
                    <p class="supportive-text mb-0 text-center">Select a theme and customize your tour. Explore various options and create a journey that suits your interests, whether it\'s adventure, culture, wildlife, or relaxation...</p>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="d-flex justify-content-end mb-3">
                        <a id="customizeBtn" href="#" class="btn btn-primary d-none">Customize Your Tour</a>
                    </div>                    
                    [[!ToursDB]]
                </div>
            </div>
        </div>
    </section>
    <!-- Tour Theme section ends -->

    <script>
        const selectedThemes = new Set();
        const cards = document.querySelectorAll(\'.selectable-card\');
        const customizeBtn = document.getElementById(\'customizeBtn\');

        cards.forEach(card => {
            card.addEventListener(\'click\', () => {
                const id = card.getAttribute(\'data-theme-id\');

                if (selectedThemes.has(id)) {
                    selectedThemes.delete(id);
                    card.classList.remove(\'selected\');
                } else {
                    selectedThemes.add(id);
                    card.classList.add(\'selected\');
                }

                // Show/hide button
                if (selectedThemes.size > 0) {
                    customizeBtn.classList.remove(\'d-none\');
                } else {
                    customizeBtn.classList.add(\'d-none\');
                }

                const url = new URL("index.php?id=8", window.location.href);
                url.searchParams.set(\'themes\', Array.from(selectedThemes).join(\',\'));
                customizeBtn.href = url.pathname + url.search;
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
    '[[~8]]' => 'index.php?id=8',
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
      'ToursDB' => 
      array (
        'fields' => 
        array (
          'id' => 3,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'ToursDB',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => 'include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';

    $query = "SELECT * FROM tour_themes";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    if (count($themes) > 0) {
        echo \'<div class="row g-4">\';

        foreach ($themes as $row) {

            $images = json_decode($row[\'theme_images\'], true);

            if (!$images || count($images) === 0) {
                $imgPath = \'assets/images/default-theme.jpg\';
            } else {
                $imgPath = \'assets/\' . ltrim($images[0], \'/\');
            }

            echo \'
                <div class="col-md-4 col-lg-3">
                    <div class="theme-card card h-100 shadow-sm selectable-card" data-theme-id="\' . $row[\'id\'] . \'">
                        <img src="\' . $imgPath . \'" class="card-img-top" alt="\' . htmlspecialchars($row[\'theme_name\']) . \'">
                        <div class="card-body text-center">
                            <h3 class="card-title">\' . htmlspecialchars($row[\'theme_name\']) . \'</h3>
                        </div>
                    </div>
                </div>
            \';
        }

        echo \'</div>\';
    } else {
        echo "<p class=\'text-center mt-4\'>No tour themes found.</p>";
    }',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';

    $query = "SELECT * FROM tour_themes";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    if (count($themes) > 0) {
        echo \'<div class="row g-4">\';

        foreach ($themes as $row) {

            $images = json_decode($row[\'theme_images\'], true);

            if (!$images || count($images) === 0) {
                $imgPath = \'assets/images/default-theme.jpg\';
            } else {
                $imgPath = \'assets/\' . ltrim($images[0], \'/\');
            }

            echo \'
                <div class="col-md-4 col-lg-3">
                    <div class="theme-card card h-100 shadow-sm selectable-card" data-theme-id="\' . $row[\'id\'] . \'">
                        <img src="\' . $imgPath . \'" class="card-img-top" alt="\' . htmlspecialchars($row[\'theme_name\']) . \'">
                        <div class="card-body text-center">
                            <h3 class="card-title">\' . htmlspecialchars($row[\'theme_name\']) . \'</h3>
                        </div>
                    </div>
                </div>
            \';
        }

        echo \'</div>\';
    } else {
        echo "<p class=\'text-center mt-4\'>No tour themes found.</p>";
    }',
        ),
        'policies' => 
        array (
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