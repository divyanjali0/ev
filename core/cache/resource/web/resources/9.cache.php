<?php  return array (
  'resourceClass' => 'MODX\\Revolution\\modDocument',
  'resource' => 
  array (
    'id' => 9,
    'type' => 'document',
    'pagetitle' => 'customize-tour',
    'longtitle' => '',
    'description' => '',
    'alias' => 'customize-tour',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '[[!CustomizeTour]]',
    'richtext' => 1,
    'template' => 2,
    'menuindex' => 8,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1765883930,
    'editedby' => 1,
    'editedon' => 1765884000,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1765884000,
    'publishedby' => 1,
    'menutitle' => '',
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'MODX\\Revolution\\modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'customize-tour.html',
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
<!-- Scroll to Top Button -->
<button id="scrollTopBtn" title="Go to top"><img src="assets/images/top-icon.png" alt="top-icon" class="img-fluid" style="
    width: 20px;
    height: 20px;
    display: flex;
"></button>

</body>

<script>
//Get the button
const scrollTopBtn = document.getElementById("scrollTopBtn");

// Show button when user scrolls down 100px
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
}

// Scroll to top smoothly when clicked
scrollTopBtn.addEventListener(\'click\', () => {
    window.scrollTo({
        top: 0,
        behavior: \'smooth\'
    });
});
</script>

</html>
<header>

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Left: Contact info -->
            <div class="top-left d-flex flex-column flex-md-row align-items-center">
                <a href="https://wa.me/94761414554" target="_blank" class="top-link">
                    <i class="fa-brands fa-whatsapp fa-lg"></i> +94 76 1414 554
                </a>
                <a href="mailto:info@explorevacations.lk" class="top-link">
                    <i class="fa-regular fa-envelope fa-lg"></i> info@explorevacations.lk
                </a>
            </div>

            <!-- Center: Get a Quote button -->
            <div class="top-center">
                <a href="index.php?id=3" class="top-btn">
                    Get a Quote
                </a>
            </div>

            <!-- Right: Language dropdown -->
            <div class="top-right mt-2 mt-md-0">
               <div class="lang-dropdown" id="langDropdown">
                  <div class="lang-selected">
                      <img src="assets/flags/uk.webp" alt="English">
                      <span>EN</span>
                      <i class="fa-solid fa-chevron-down"></i>
                  </div>

                  <ul class="lang-options">
                  
                    <li>
                      <a href="./">
                        <img src="assets/flags/uk.webp">
                        <span>English</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?id=11">
                        <img src="assets/flags/china.webp">
                        <span>中文</span>
                      </a>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="navbar-brand" href="./">
                <!-- Default logo -->
                <img src="assets/images/logo-header.png" alt="Explore Vacations | Logo" class="logo logo-default img-fluid">

                <!-- Scrolled logo -->
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="logo logo-scrolled img-fluid">
            </a>

            <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="img-fluid" style="width: 50%;">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
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

</header>





<script>
  window.addEventListener("scroll", function () {
      const navbar = document.querySelector(".navbar");

      if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
      } else {
          navbar.classList.remove("scrolled");
      }
  });
</script>



<script>
const langDropdown = document.getElementById("langDropdown");
const langSelected = langDropdown.querySelector(".lang-selected");
const langOptions = langDropdown.querySelector(".lang-options");

// Load saved language on page load
window.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem("selectedLang");
    if (savedLang) {
        const [imgSrc, text] = savedLang.split("||");
        langSelected.querySelector("img").src = imgSrc;
        langSelected.querySelector("span").textContent = text;
    }
});

// Toggle dropdown
langSelected.addEventListener("click", () => {
    langOptions.classList.toggle("show");
});

// Close dropdown if clicked outside
document.addEventListener("click", (e) => {
    if (!langDropdown.contains(e.target)) {
        langOptions.classList.remove("show");
    }
});

// Update selected language and save
langOptions.querySelectorAll("li").forEach((li) => {
    li.addEventListener("click", () => {
        const img = li.querySelector("img").src;
        const text = li.querySelector("span").textContent;

        // Update display
        langSelected.querySelector("img").src = img;
        langSelected.querySelector("span").textContent = text;

        // Save to localStorage
        localStorage.setItem("selectedLang", img + "||" + text);

        // Close dropdown
        langOptions.classList.remove("show");

        // Navigate if <a> exists
        const link = li.querySelector("a");
        if (link) {
            window.location.href = link.href;
        }
    });
});

</script>


[[!CustomizeTour]]
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
                    <li class="d-flex align-items-center">
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <div class="d-inline-block">
                            <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a> 
                            <a href="mailto:reservations@explorevacations.lk">reservations@explorevacations.lk</a> 
                            <a href="mailto:travels@explorevacations.lk">travels@explorevacations.lk</a>
                        </div>
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
<!-- Scroll to Top Button -->
<button id="scrollTopBtn" title="Go to top"><img src="assets/images/top-icon.png" alt="top-icon" class="img-fluid" style="
    width: 20px;
    height: 20px;
    display: flex;
"></button>

</body>

<script>
//Get the button
const scrollTopBtn = document.getElementById("scrollTopBtn");

// Show button when user scrolls down 100px
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
}

// Scroll to top smoothly when clicked
scrollTopBtn.addEventListener(\'click\', () => {
    window.scrollTo({
        top: 0,
        behavior: \'smooth\'
    });
});
</script>

</html>',
    '[[~3]]' => 'index.php?id=3',
    '[[~11]]' => 'index.php?id=11',
    '[[~2]]' => 'index.php?id=2',
    '[[~4]]' => 'index.php?id=4',
    '[[~5]]' => 'index.php?id=5',
    '[[~7]]' => 'index.php?id=7',
    '[[$navbar?]]' => '<header>

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Left: Contact info -->
            <div class="top-left d-flex flex-column flex-md-row align-items-center">
                <a href="https://wa.me/94761414554" target="_blank" class="top-link">
                    <i class="fa-brands fa-whatsapp fa-lg"></i> +94 76 1414 554
                </a>
                <a href="mailto:info@explorevacations.lk" class="top-link">
                    <i class="fa-regular fa-envelope fa-lg"></i> info@explorevacations.lk
                </a>
            </div>

            <!-- Center: Get a Quote button -->
            <div class="top-center">
                <a href="index.php?id=3" class="top-btn">
                    Get a Quote
                </a>
            </div>

            <!-- Right: Language dropdown -->
            <div class="top-right mt-2 mt-md-0">
               <div class="lang-dropdown" id="langDropdown">
                  <div class="lang-selected">
                      <img src="assets/flags/uk.webp" alt="English">
                      <span>EN</span>
                      <i class="fa-solid fa-chevron-down"></i>
                  </div>

                  <ul class="lang-options">
                  
                    <li>
                      <a href="./">
                        <img src="assets/flags/uk.webp">
                        <span>English</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?id=11">
                        <img src="assets/flags/china.webp">
                        <span>中文</span>
                      </a>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="navbar-brand" href="./">
                <!-- Default logo -->
                <img src="assets/images/logo-header.png" alt="Explore Vacations | Logo" class="logo logo-default img-fluid">

                <!-- Scrolled logo -->
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="logo logo-scrolled img-fluid">
            </a>

            <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="img-fluid" style="width: 50%;">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
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

</header>





<script>
  window.addEventListener("scroll", function () {
      const navbar = document.querySelector(".navbar");

      if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
      } else {
          navbar.classList.remove("scrolled");
      }
  });
</script>



<script>
const langDropdown = document.getElementById("langDropdown");
const langSelected = langDropdown.querySelector(".lang-selected");
const langOptions = langDropdown.querySelector(".lang-options");

// Load saved language on page load
window.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem("selectedLang");
    if (savedLang) {
        const [imgSrc, text] = savedLang.split("||");
        langSelected.querySelector("img").src = imgSrc;
        langSelected.querySelector("span").textContent = text;
    }
});

// Toggle dropdown
langSelected.addEventListener("click", () => {
    langOptions.classList.toggle("show");
});

// Close dropdown if clicked outside
document.addEventListener("click", (e) => {
    if (!langDropdown.contains(e.target)) {
        langOptions.classList.remove("show");
    }
});

// Update selected language and save
langOptions.querySelectorAll("li").forEach((li) => {
    li.addEventListener("click", () => {
        const img = li.querySelector("img").src;
        const text = li.querySelector("span").textContent;

        // Update display
        langSelected.querySelector("img").src = img;
        langSelected.querySelector("span").textContent = text;

        // Save to localStorage
        localStorage.setItem("selectedLang", img + "||" + text);

        // Close dropdown
        langOptions.classList.remove("show");

        // Navigate if <a> exists
        const link = li.querySelector("a");
        if (link) {
            window.location.href = link.href;
        }
    });
});

</script>

',
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
                    <li class="d-flex align-items-center">
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <div class="d-inline-block">
                            <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a> 
                            <a href="mailto:reservations@explorevacations.lk">reservations@explorevacations.lk</a> 
                            <a href="mailto:travels@explorevacations.lk">travels@explorevacations.lk</a>
                        </div>
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
    '[[~8]]' => 'index.php?id=8',
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
<!-- Scroll to Top Button -->
<button id="scrollTopBtn" title="Go to top"><img src="assets/images/top-icon.png" alt="top-icon" class="img-fluid" style="
    width: 20px;
    height: 20px;
    display: flex;
"></button>

</body>

<script>
//Get the button
const scrollTopBtn = document.getElementById("scrollTopBtn");

// Show button when user scrolls down 100px
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
}

// Scroll to top smoothly when clicked
scrollTopBtn.addEventListener(\'click\', () => {
    window.scrollTo({
        top: 0,
        behavior: \'smooth\'
    });
});
</script>

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
<!-- Scroll to Top Button -->
<button id="scrollTopBtn" title="Go to top"><img src="assets/images/top-icon.png" alt="top-icon" class="img-fluid" style="
    width: 20px;
    height: 20px;
    display: flex;
"></button>

</body>

<script>
//Get the button
const scrollTopBtn = document.getElementById("scrollTopBtn");

// Show button when user scrolls down 100px
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
}

// Scroll to top smoothly when clicked
scrollTopBtn.addEventListener(\'click\', () => {
    window.scrollTo({
        top: 0,
        behavior: \'smooth\'
    });
});
</script>

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

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Left: Contact info -->
            <div class="top-left d-flex flex-column flex-md-row align-items-center">
                <a href="https://wa.me/94761414554" target="_blank" class="top-link">
                    <i class="fa-brands fa-whatsapp fa-lg"></i> +94 76 1414 554
                </a>
                <a href="mailto:info@explorevacations.lk" class="top-link">
                    <i class="fa-regular fa-envelope fa-lg"></i> info@explorevacations.lk
                </a>
            </div>

            <!-- Center: Get a Quote button -->
            <div class="top-center">
                <a href="[[~3]]" class="top-btn">
                    Get a Quote
                </a>
            </div>

            <!-- Right: Language dropdown -->
            <div class="top-right mt-2 mt-md-0">
               <div class="lang-dropdown" id="langDropdown">
                  <div class="lang-selected">
                      <img src="assets/flags/uk.webp" alt="English">
                      <span>EN</span>
                      <i class="fa-solid fa-chevron-down"></i>
                  </div>

                  <ul class="lang-options">
                  
                    <li>
                      <a href="./">
                        <img src="assets/flags/uk.webp">
                        <span>English</span>
                      </a>
                    </li>
                    <li>
                      <a href="[[~11]]">
                        <img src="assets/flags/china.webp">
                        <span>中文</span>
                      </a>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="navbar-brand" href="./">
                <!-- Default logo -->
                <img src="assets/images/logo-header.png" alt="Explore Vacations | Logo" class="logo logo-default img-fluid">

                <!-- Scrolled logo -->
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="logo logo-scrolled img-fluid">
            </a>

            <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="img-fluid" style="width: 50%;">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
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

</header>





<script>
  window.addEventListener("scroll", function () {
      const navbar = document.querySelector(".navbar");

      if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
      } else {
          navbar.classList.remove("scrolled");
      }
  });
</script>



<script>
const langDropdown = document.getElementById("langDropdown");
const langSelected = langDropdown.querySelector(".lang-selected");
const langOptions = langDropdown.querySelector(".lang-options");

// Load saved language on page load
window.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem("selectedLang");
    if (savedLang) {
        const [imgSrc, text] = savedLang.split("||");
        langSelected.querySelector("img").src = imgSrc;
        langSelected.querySelector("span").textContent = text;
    }
});

// Toggle dropdown
langSelected.addEventListener("click", () => {
    langOptions.classList.toggle("show");
});

// Close dropdown if clicked outside
document.addEventListener("click", (e) => {
    if (!langDropdown.contains(e.target)) {
        langOptions.classList.remove("show");
    }
});

// Update selected language and save
langOptions.querySelectorAll("li").forEach((li) => {
    li.addEventListener("click", () => {
        const img = li.querySelector("img").src;
        const text = li.querySelector("span").textContent;

        // Update display
        langSelected.querySelector("img").src = img;
        langSelected.querySelector("span").textContent = text;

        // Save to localStorage
        localStorage.setItem("selectedLang", img + "||" + text);

        // Close dropdown
        langOptions.classList.remove("show");

        // Navigate if <a> exists
        const link = li.querySelector("a");
        if (link) {
            window.location.href = link.href;
        }
    });
});

</script>

',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<header>

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Left: Contact info -->
            <div class="top-left d-flex flex-column flex-md-row align-items-center">
                <a href="https://wa.me/94761414554" target="_blank" class="top-link">
                    <i class="fa-brands fa-whatsapp fa-lg"></i> +94 76 1414 554
                </a>
                <a href="mailto:info@explorevacations.lk" class="top-link">
                    <i class="fa-regular fa-envelope fa-lg"></i> info@explorevacations.lk
                </a>
            </div>

            <!-- Center: Get a Quote button -->
            <div class="top-center">
                <a href="[[~3]]" class="top-btn">
                    Get a Quote
                </a>
            </div>

            <!-- Right: Language dropdown -->
            <div class="top-right mt-2 mt-md-0">
               <div class="lang-dropdown" id="langDropdown">
                  <div class="lang-selected">
                      <img src="assets/flags/uk.webp" alt="English">
                      <span>EN</span>
                      <i class="fa-solid fa-chevron-down"></i>
                  </div>

                  <ul class="lang-options">
                  
                    <li>
                      <a href="./">
                        <img src="assets/flags/uk.webp">
                        <span>English</span>
                      </a>
                    </li>
                    <li>
                      <a href="[[~11]]">
                        <img src="assets/flags/china.webp">
                        <span>中文</span>
                      </a>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="navbar-brand" href="./">
                <!-- Default logo -->
                <img src="assets/images/logo-header.png" alt="Explore Vacations | Logo" class="logo logo-default img-fluid">

                <!-- Scrolled logo -->
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="logo logo-scrolled img-fluid">
            </a>

            <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <img src="assets/images/logo.png" alt="Explore Vacations | Logo" class="img-fluid" style="width: 50%;">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
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

</header>





<script>
  window.addEventListener("scroll", function () {
      const navbar = document.querySelector(".navbar");

      if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
      } else {
          navbar.classList.remove("scrolled");
      }
  });
</script>



<script>
const langDropdown = document.getElementById("langDropdown");
const langSelected = langDropdown.querySelector(".lang-selected");
const langOptions = langDropdown.querySelector(".lang-options");

// Load saved language on page load
window.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem("selectedLang");
    if (savedLang) {
        const [imgSrc, text] = savedLang.split("||");
        langSelected.querySelector("img").src = imgSrc;
        langSelected.querySelector("span").textContent = text;
    }
});

// Toggle dropdown
langSelected.addEventListener("click", () => {
    langOptions.classList.toggle("show");
});

// Close dropdown if clicked outside
document.addEventListener("click", (e) => {
    if (!langDropdown.contains(e.target)) {
        langOptions.classList.remove("show");
    }
});

// Update selected language and save
langOptions.querySelectorAll("li").forEach((li) => {
    li.addEventListener("click", () => {
        const img = li.querySelector("img").src;
        const text = li.querySelector("span").textContent;

        // Update display
        langSelected.querySelector("img").src = img;
        langSelected.querySelector("span").textContent = text;

        // Save to localStorage
        localStorage.setItem("selectedLang", img + "||" + text);

        // Close dropdown
        langOptions.classList.remove("show");

        // Navigate if <a> exists
        const link = li.querySelector("a");
        if (link) {
            window.location.href = link.href;
        }
    });
});

</script>

',
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
                    <li class="d-flex align-items-center">
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <div class="d-inline-block">
                            <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a> 
                            <a href="mailto:reservations@explorevacations.lk">reservations@explorevacations.lk</a> 
                            <a href="mailto:travels@explorevacations.lk">travels@explorevacations.lk</a>
                        </div>
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
                    <li class="d-flex align-items-center">
                        <img src="assets/images/icons/footer-email.svg" alt="Explore Vacations | Footer Contact Icon" class="me-1">
                        <div class="d-inline-block">
                            <a href="mailto:info@explorevacations.lk">info@explorevacations.lk</a> 
                            <a href="mailto:reservations@explorevacations.lk">reservations@explorevacations.lk</a> 
                            <a href="mailto:travels@explorevacations.lk">travels@explorevacations.lk</a>
                        </div>
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
      'CustomizeTour' => 
      array (
        'fields' => 
        array (
          'id' => 6,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'CustomizeTour',
          'description' => '',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => 'ob_start();

include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';
    include \'assets/includes/save_itenary.php\';

    // Get selected city IDs
    $cityIDs = isset($_GET[\'cities\']) ? $_GET[\'cities\'] : \'\';
    $cityIDsArray = array_filter(explode(\',\', $cityIDs));

    $selectedCities = [];

    if (!empty($cityIDsArray)) {
        $placeholders = rtrim(str_repeat(\'?,\', count($cityIDsArray)), \',\');
        $query = "
            SELECT id, name
            FROM cities
            WHERE id IN ($placeholders)
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute($cityIDsArray);
        $selectedCities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Get selected theme IDs from URL
    $themeIDs = isset($_GET[\'themes\']) ? $_GET[\'themes\'] : \'\';
    $themeIDsArray = array_filter(explode(",", $themeIDs));

    $themesData = [];
    $allImages = [];

    if (!empty($themeIDsArray)) {

        // Create dynamic placeholders (?, ?, ?)
        $placeholders = rtrim(str_repeat(\'?,\', count($themeIDsArray)), \',\');
        $query = "SELECT * FROM tour_themes WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($query);
        $stmt->execute($themeIDsArray);
        $themesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Collect all images into one array
        foreach ($themesData as $theme) {
            $images = json_decode($theme[\'theme_images\'], true);

            if ($images) {
                foreach ($images as $img) {
                    $allImages[] = $img;
                }
            }
        }
    }

    // Fetch country codes from DB
    $countryCodes = [];
    try {
        $stmt = $conn->prepare("SELECT country_name, country_code FROM country_codes ORDER BY country_name ASC");
        $stmt->execute();
        $countryCodes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Handle error
        error_log("Error fetching country codes: " . $e->getMessage());
    }

?>

<head>
    <style>
        .is-invalid {
            border-color: #dc3545;
        }

        .dropdown-menu {
            display: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            max-height: 500px; 
        }

        .input-group-sm > .btn, .input-group-sm > .form-control {
            height: 30px;
            font-size: 0.875rem;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5rem;
            justify-content: flex-start;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            cursor: pointer;
            margin-right: 5px;
            transition: color 0.2s;
        }

        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: gold;
        }
    </style>
</head>

<body id="toursCustomizePage">
    <!-- Hero section starts -->
    <section id="hero">
        <img src="assets/images/cutomize-tour-hero.jpg" alt="Explore Vacations - Tours">
        <div class="hero-content">
            <h1>Customize Tours</h1>
        </div>
    </section>
    <!-- Hero section ends -->

    <!-- Customize Tours section starts -->
    <section id="customize-tour" class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="[[~8]]">Cities</a></li>
                    <?php if (!empty($themesData)): ?>
                        <?php foreach ($themesData as $t): ?>
                            <li class="breadcrumb-item active">
                                <?php echo htmlspecialchars($t[\'theme_name\']); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>
            </nav>

            <h2 class="heading mb-4">Plan Your Tour..</h2>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div id="tourCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php if (!empty($allImages)): ?>
                                    <?php foreach ($allImages as $index => $img): ?>
                                        <div class="carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>">
                                            <img src="assets/<?php echo ltrim($img, \'/\'); ?>" class="d-block w-100 rounded" alt="Tour Image">
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="carousel-item active">
                                        <img src="assets/images/default-theme.jpg" class="d-block w-100 rounded" alt="No Image">
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="carousel-indicators">
                                <?php foreach ($allImages as $index => $img): ?>
                                    <button type="button" data-bs-target="#tourCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? \'active\' : \'\'; ?>" aria-current="<?php echo $index === 0 ? \'true\' : \'false\'; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

           <div id="customizeForm">
                <div class="intro row align-items-center mt-4">
                    <div class="col">
                        <p class="mb-0">
                            ✨Customize your trip, and send us your plan. We\'ll guide you through the next steps and put together a full itinerary with cozy stays 🏨, fun activities 🎉, and all the details you need...
                        </p>
                    </div>
                </div>
                <hr>

                <form method="post" action="" id="customTourForm">
                    <div class="row g-4">
                        <!-- Right Column -->
                        <div class="col-lg-7">
                            <!-- Dates & Guests -->
                            <div class="card mb-4 border-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Dates<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="date" class="form-control text-center" name="start_date" placeholder="Start Date">
                                            <input type="date" class="form-control text-center" name="end_date" placeholder="End Date">
                                            <input type="text" class="form-control text-center" name="nights" placeholder="Nights" min="1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Guests<span class="text-danger">*</span></label>
                                        <div class="dropdown">
                                            <button class="form-control text-start" type="button" id="guestDropdownButton">
                                                2 Adults, 0 Children, 0 Infants
                                            </button>
                                            <div class="dropdown-menu p-3" id="guestDropdownMenu" style="min-width: 250px;">
                                                <!-- Adults -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Adults</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="adults">-</button>
                                                        <input type="number" class="form-control text-center" id="adults" value="2" min="1" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="adults">+</button>
                                                    </div>
                                                </div>
                                                <!-- Children 6-11 -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Children (6-11)</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="children_6_11">-</button>
                                                        <input type="number" class="form-control text-center" id="children_6_11" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="children_6_11">+</button>
                                                    </div>
                                                </div>
                                                <!-- Children 12+ -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Children (12+)</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="children_above_11">-</button>
                                                        <input type="number" class="form-control text-center" id="children_above_11" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="children_above_11">+</button>
                                                    </div>
                                                </div>
                                                <!-- Infants -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Infants</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="infants">-</button>
                                                        <input type="number" class="form-control text-center" id="infants" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="infants">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="adults" id="adults_hidden">
                                        <input type="hidden" name="children_6_11" id="children_6_11_hidden">
                                        <input type="hidden" name="children_above_11" id="children_above_11_hidden">
                                        <input type="hidden" name="infants" id="infants_hidden">
                                    </div>

                                    <!-- Hotel Rating -->
                                    <div class="col-12 col-md-6 mt-3">
                                        <label class="form-label fw-semibold">Preferred Hotel Rating<span class="text-danger">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating3" value="3">
                                                <label class="form-check-label" for="rating3">3 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating4" value="4">
                                                <label class="form-check-label" for="rating4">4 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating5" value="5">
                                                <label class="form-check-label" for="rating5">5 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pickup / Dropoff -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="pickupLocation" class="form-label fw-semibold">Pickup Location<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pickupLocation" name="pickupLocation" placeholder="Enter pickup location" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dropoffLocation" class="form-label fw-semibold">Dropoff Location<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="dropoffLocation" name="dropoffLocation" placeholder="Enter dropoff location" required>
                                </div>
                            </div>

                            <!-- Meal Plan & Allergy -->
                            <div class="row g-3 mb-4">
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold d-block">Preferred Meal Plan<span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan1" value="Breakfast Only">
                                        <label class="form-check-label" for="mealPlan1">Breakfast Only</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan2" value="Half Board">
                                        <label class="form-check-label" for="mealPlan2">Half Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan3" value="Full Board">
                                        <label class="form-check-label" for="mealPlan3">Full Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan4" value="All Inclusive">
                                        <label class="form-check-label" for="mealPlan4">All Inclusive</label>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold d-block">Do you have any meal allergy issues?<span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealAllergy" id="mealAllergyYes" value="Yes">
                                        <label class="form-check-label" for="mealAllergyYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealAllergy" id="mealAllergyNo" value="No">
                                        <label class="form-check-label" for="mealAllergyNo">No</label>
                                    </div>
                                    <div class="mt-2" id="allergyDetails" style="display:none;">
                                        <input type="text" class="form-control" name="allergy_reason" placeholder="Please specify your allergy">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label fw-semibold d-block">Bed Types & Quantity</label>

                                    <div class="col-12 d-flex flex-column flex-sm-row gap-3">

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Single Room</span>
                                            <input type="number" name="bed_types[single]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Double Room</span>
                                            <input type="number" name="bed_types[double]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Twin Room</span>
                                            <input type="number" name="bed_types[twin]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Triple Room</span>
                                            <input type="number" name="bed_types[triple]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Personal Info & Submit -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    <label for="title" class="form-label fw-semibold small">Title<span class="text-danger">*</span></label>
                                    <select class="form-select" id="title" name="title" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Prof">Prof</option>
                                    </select>
                                </div>

                                <div class="col-md-8">
                                    <label for="fullName" class="form-label fw-semibold">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="whatsappCode" class="form-label fw-semibold small mt-2">Code<span class="text-danger">*</span></label>
                                    <select class="form-select" id="whatsappCode" name="whatsappCode" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($countryCodes as $c): ?>
                                            <option value="<?php echo htmlspecialchars($c[\'country_code\']); ?>">
                                                <?php echo htmlspecialchars($c[\'country_name\'] . \' (\' . $c[\'country_code\'] . \')\'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <label for="whatsapp" class="form-label fw-semibold mt-2">WhatsApp Number<span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter WhatsApp number" required> -->
                                </div>

                                <div class="col-md-3">
                                    <!-- <label for="whatsappCode" class="form-label fw-semibold small">Code<span class="text-danger">*</span></label>
                                    <select class="form-select" id="whatsappCode" name="whatsappCode" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($countryCodes as $c): ?>
                                            <option value="<?php echo htmlspecialchars($c[\'country_code\']); ?>">
                                                <?php echo htmlspecialchars($c[\'country_name\'] . \' (\' . $c[\'country_code\'] . \')\'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    <label for="whatsapp" class="form-label fw-semibold mt-2">WhatsApp Number<span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter WhatsApp" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="country" class="form-label fw-semibold">Country<span class="text-danger">*</span></label>
                                    <select class="form-select" id="country" name="country" required>
                                        <option value="" selected disabled>Select your country</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="flightNumber" class="form-label fw-semibold">Flight Number</label>
                                    <input type="text" class="form-control" id="flightNumber" name="flightNumber" placeholder="Enter flight number">
                                </div>

                                <div class="col-12">
                                    <label for="remarks" class="form-label fw-semibold">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="4" placeholder="Please specify any additional requirements or information not covered above."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Left Column -->
                        <div class="col-lg-5 border-start ps-4">
                            <!-- Vehicle Selection -->
                            <div class="mb-4">
                                <h3 name="vehicleId">Select Preferred Vehicle</h3>
                                <small class="text-danger d-block mb-3">**For indicative purposes only</small>

                                <div class="row g-4">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM vehicles ORDER BY id ASC");
                                    $stmt->execute();
                                    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    if (!empty($vehicles)):
                                        foreach ($vehicles as $v):
                                            $id = (int)$v[\'id\'];
                                            $category = htmlspecialchars($v[\'category\']);
                                            $passengers = htmlspecialchars($v[\'passenger_count\']);
                                            $image = htmlspecialchars($v[\'image\'] ?: \'assets/images/vehicles/default.jpg\');
                                    ?>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card h-100 text-center shadow-sm vehicle-card" data-vehicle-id="<?= $id ?>">
                                            <img src="<?= $image ?>" class="card-img-top img-fluid" alt="<?= $category ?>" style="height:10rem;object-fit:cover;">
                                            <div class="card-body d-flex flex-column justify-content-center" style="padding:0;">
                                                <h3><?= $category ?></h3>
                                                <p class="card-text">Passengers: <?= $passengers ?></p>
                                                <input class="form-check-input d-none" type="radio" name="vehicle_id" id="vehicle<?= $id ?>" value="<?= $id ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        endforeach;
                                    else:
                                    ?>
                                    <div class="col">
                                        <p class="text-center">No vehicles found.</p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($selectedCities)): ?>
                            <!-- Selected Cities -->
                            <div class="mb-4">
                                <h3>Selected Cities</h3>
                                <div class="row">
                                    <?php foreach ($selectedCities as $city): ?>
                                        <div class="col-md-6 col-lg-6 mb-2">
                                            <div class="card p-2 text-center" style="border-radius:0;">
                                                <?php echo htmlspecialchars($city[\'name\']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Tour Map -->
                            <div class="mb-4">
                                <h3>Tour Map</h3>
                                <div id="map" style="height:250px;width:100%;"></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div id="formError" class="alert alert-danger d-none"></div>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary submit-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- Customize Tours section ends -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHmbwBrk0OKY0Nhp9FrR_zn8HKLGZ54OU&libraries=places&callback=initMap" async defer></script>

    <script>
        const btn = document.getElementById(\'guestDropdownButton\');
        const menu = document.getElementById(\'guestDropdownMenu\');
        const ids = [\'adults\',\'children_6_11\',\'children_above_11\',\'infants\'];

        btn.addEventListener(\'click\', () => menu.classList.toggle(\'show\'));
        document.addEventListener(\'click\', e => { if(!btn.contains(e.target)&&!menu.contains(e.target)) menu.classList.remove(\'show\'); });

        function update() {
            const adults = +document.getElementById(\'adults\').value;
            const children = ids.slice(1).reduce((s,id)=>s + +document.getElementById(id).value,0);
            btn.textContent = `${adults} Adults, ${children} Children`;

            document.getElementById(\'adults_hidden\').value = adults;
            document.getElementById(\'children_6_11_hidden\').value = document.getElementById(\'children_6_11\').value;
            document.getElementById(\'children_above_11_hidden\').value = document.getElementById(\'children_above_11\').value;
            document.getElementById(\'infants_hidden\').value = document.getElementById(\'infants\').value;
        }

        document.querySelectorAll(\'.increment,.decrement\').forEach(b=>{
            b.addEventListener(\'click\', ()=>{
                const i = document.getElementById(b.dataset.target);
                const min = +i.min||0;
                i.value = Math.max(min, +i.value + (b.classList.contains(\'increment\')?1:-1));
                update();
            });
        });

        update();

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const start = document.querySelector(\'input[name="start_date"]\');
            const end = document.querySelector(\'input[name="end_date"]\');
            const nights = document.querySelector(\'input[name="nights"]\');
            const today = new Date().toISOString().split(\'T\')[0];

            start.min = today;
            end.min = today;

            const calcNights = () => {
                const diff = (new Date(end.value) - new Date(start.value)) / (1000 * 60 * 60 * 24);
                nights.value = diff > 0 ? `${diff} night${diff > 1 ? \'s\' : \'\'}` : \'\';
            };

            start.addEventListener(\'change\', () => {
                if (end.value && new Date(end.value) < new Date(start.value)) end.value = nights.value = \'\';
                end.min = start.value;
                calcNights();
            });

            end.addEventListener(\'change\', calcNights);
        });
    </script>

    <script>
        let map;
        let geocoder;
        let bounds;
        let markers = [];
        let pathCoordinates = []; 

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: { lat: 7.8731, lng: 80.7718 } 
            });

            geocoder = new google.maps.Geocoder();
            bounds = new google.maps.LatLngBounds();

            const selectedCities = <?php echo json_encode($selectedCities); ?>;

            if (selectedCities.length === 0) return;

            // Create numbered markers
            let geocodePromises = selectedCities.map((city, index) => geocodeCity(city.name, index + 1));

            Promise.all(geocodePromises).then(coords => {
                pathCoordinates = coords.filter(c => c !== null); 

                if (pathCoordinates.length > 1) {
                    const tourPath = new google.maps.Polyline({
                        path: pathCoordinates,
                        geodesic: true,
                        strokeColor: \'#FF0000\',
                        strokeOpacity: 0.7,
                        strokeWeight: 4
                    });
                    tourPath.setMap(map);
                }

                bounds = new google.maps.LatLngBounds();
                pathCoordinates.forEach(coord => bounds.extend(coord));
                map.fitBounds(bounds);
            });

            initAutocomplete();
        }

        function geocodeCity(cityName, labelNumber) {
            return new Promise((resolve, reject) => {
                geocoder.geocode({ address: cityName + \', Sri Lanka\' }, (results, status) => {
                    if (status === \'OK\') {
                        const location = results[0].geometry.location;

                        new google.maps.Marker({
                            map: map,
                            position: location,
                            title: cityName,
                            label: {
                                text: labelNumber.toString(),
                                color: "white",
                                fontWeight: "bold"
                            }
                        });

                        resolve(location);
                    } else {
                        console.warn(\'Geocode failed for:\', cityName, status);
                        resolve(null); 
                    }
                });
            });
        }

        function initAutocomplete() {
            const pickupInput = document.getElementById(\'pickupLocation\');
            const dropoffInput = document.getElementById(\'dropoffLocation\');

            const options = {
                types: [\'geocode\', \'establishment\'],
                componentRestrictions: { country: \'LK\' } 
            };

            if (pickupInput) {
                new google.maps.places.Autocomplete(pickupInput, options);
            }

            if (dropoffInput) {
                new google.maps.places.Autocomplete(dropoffInput, options);
            }
        }
    </script>

    <script>
        const yesRadio = document.getElementById(\'mealAllergyYes\');
        const noRadio = document.getElementById(\'mealAllergyNo\');
        const allergyInput = document.getElementById(\'allergyDetails\');

        yesRadio.addEventListener(\'change\', () => {
            allergyInput.style.display = yesRadio.checked ? \'block\' : \'none\';
        });

        noRadio.addEventListener(\'change\', () => {
            allergyInput.style.display = \'none\';
        });
    </script>

<script defer>
    document.addEventListener("DOMContentLoaded", () => {
        const countrySelect = document.getElementById("country");
        if (!countrySelect) {
            console.error("Select element not found");
            return;
        }

        fetch("https://restcountries.com/v3.1/all?fields=name")
            .then(res => res.json())
            .then(data => {
                data
                    .sort((a, b) => a.name.common.localeCompare(b.name.common))
                    .forEach(c =>
                        countrySelect.add(
                            new Option(c.name.common, c.name.common)
                        )
                    );
            })
            .catch(err => console.error("Error fetching countries:", err));
    });
</script>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            <?php if (!empty($_SESSION[\'itinerary_success\']) && !empty($_SESSION[\'pdf_to_download\'])): ?>
                Swal.fire({
                    icon: \'success\',
                    title: \'Submitted Successfully\',
                    text: \'Your tour request has been received.\',
                    confirmButtonText: \'Download Itinerary\'
                }).then(() => {
                    window.open(\'<?php echo $_SESSION[\'pdf_to_download\']; ?>\', \'_blank\');
                    window.location.reload();
                    window.location.href = \'./\'; 
                });
                <?php
                unset($_SESSION[\'itinerary_success\'], $_SESSION[\'pdf_to_download\']);
                ?>
            <?php endif; ?>
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("customTourForm");
            const submitBtn = form.querySelector(".submit-button");
            const errorBox = document.getElementById("formError");

            form.addEventListener("submit", function (e) {
                errorBox.classList.add("d-none");
                errorBox.innerHTML = "";

                let errors = [];

                // ======================
                // Basic required fields
                // ======================
                const requiredFields = [
                    { id: "pickupLocation", label: "Pickup Location" },
                    { id: "dropoffLocation", label: "Dropoff Location" },
                    { id: "title", label: "Title" },
                    { id: "fullName", label: "Full Name" },
                    { id: "email", label: "Email" },
                    { id: "whatsappCode", label: "WhatsApp Code" },
                    { id: "whatsapp", label: "WhatsApp Number" },
                    { id: "country", label: "Country" },
                ];

                requiredFields.forEach(field => {
                    const el = document.getElementById(field.id);
                    if (!el || !el.value.trim()) {
                        errors.push(field.label);
                        el?.classList.add("is-invalid");
                    } else {
                        el.classList.remove("is-invalid");
                    }
                });

                // ======================
                // Dates validation
                // ======================
                const startDate = document.querySelector(\'input[name="start_date"]\');
                const endDate   = document.querySelector(\'input[name="end_date"]\');
                const nights    = document.querySelector(\'input[name="nights"]\');

                if (!startDate.value) errors.push("Start Date");
                if (!endDate.value) errors.push("End Date");
                if (!nights.value) errors.push("Number of Nights");

                // ======================
                // Hotel rating
                // ======================
                if (!document.querySelector(\'input[name="hotelRating"]:checked\')) {
                    errors.push("Preferred Hotel Rating");
                }

                // ======================
                // Meal plan
                // ======================
                if (!document.querySelector(\'input[name="mealPlan"]:checked\')) {
                    errors.push("Meal Plan");
                }

                // ======================
                // Vehicle
                // ======================
                if (!document.querySelector(\'input[name="vehicle_id"]:checked\')) {
                    errors.push("Select Preferred Vehicle");
                }


                // ======================
                // Allergy issues
                // ======================
                const allergyYes = document.getElementById("mealAllergyYes");
                const allergyNo  = document.getElementById("mealAllergyNo");
                const allergyReason = document.querySelector(\'input[name="allergy_reason"]\');

                if (!allergyYes.checked && !allergyNo.checked) {
                    errors.push("Meal Allergy Selection");
                }

                if (allergyYes.checked && (!allergyReason || !allergyReason.value.trim())) {
                    errors.push("Allergy Details");
                    allergyReason?.classList.add("is-invalid");
                } else {
                    allergyReason?.classList.remove("is-invalid");
                }

                if (errors.length > 0) {
                    e.preventDefault();

                    errorBox.innerHTML = `
                        <strong>Please fill the following required fields:</strong>
                        <ul class="mb-0">
                            ${[...new Set(errors)].map(e => `<li>${e}</li>`).join("")}
                        </ul>
                    `;
                    errorBox.classList.remove("d-none");

                    submitBtn.disabled = false;
                    submitBtn.innerHTML = "Submit";
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.innerHTML = "Submitting...";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".vehicle-card");

            cards.forEach(card => {
                card.addEventListener("click", function() {
                    cards.forEach(c => c.classList.remove("selected"));
                    this.classList.add("selected");
                    const radio = this.querySelector(\'input[type="radio"]\');
                    if(radio) radio.checked = true;
                });
            });
        });
    </script>

</body>

<?php
return ob_get_clean();',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'ob_start();

include (\'config-details.php\');
    include \'assets/includes/db_connect.php\';
    include \'assets/includes/save_itenary.php\';

    // Get selected city IDs
    $cityIDs = isset($_GET[\'cities\']) ? $_GET[\'cities\'] : \'\';
    $cityIDsArray = array_filter(explode(\',\', $cityIDs));

    $selectedCities = [];

    if (!empty($cityIDsArray)) {
        $placeholders = rtrim(str_repeat(\'?,\', count($cityIDsArray)), \',\');
        $query = "
            SELECT id, name
            FROM cities
            WHERE id IN ($placeholders)
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute($cityIDsArray);
        $selectedCities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Get selected theme IDs from URL
    $themeIDs = isset($_GET[\'themes\']) ? $_GET[\'themes\'] : \'\';
    $themeIDsArray = array_filter(explode(",", $themeIDs));

    $themesData = [];
    $allImages = [];

    if (!empty($themeIDsArray)) {

        // Create dynamic placeholders (?, ?, ?)
        $placeholders = rtrim(str_repeat(\'?,\', count($themeIDsArray)), \',\');
        $query = "SELECT * FROM tour_themes WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($query);
        $stmt->execute($themeIDsArray);
        $themesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Collect all images into one array
        foreach ($themesData as $theme) {
            $images = json_decode($theme[\'theme_images\'], true);

            if ($images) {
                foreach ($images as $img) {
                    $allImages[] = $img;
                }
            }
        }
    }

    // Fetch country codes from DB
    $countryCodes = [];
    try {
        $stmt = $conn->prepare("SELECT country_name, country_code FROM country_codes ORDER BY country_name ASC");
        $stmt->execute();
        $countryCodes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Handle error
        error_log("Error fetching country codes: " . $e->getMessage());
    }

?>

<head>
    <style>
        .is-invalid {
            border-color: #dc3545;
        }

        .dropdown-menu {
            display: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            max-height: 500px; 
        }

        .input-group-sm > .btn, .input-group-sm > .form-control {
            height: 30px;
            font-size: 0.875rem;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5rem;
            justify-content: flex-start;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            cursor: pointer;
            margin-right: 5px;
            transition: color 0.2s;
        }

        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: gold;
        }
    </style>
</head>

<body id="toursCustomizePage">
    <!-- Hero section starts -->
    <section id="hero">
        <img src="assets/images/cutomize-tour-hero.jpg" alt="Explore Vacations - Tours">
        <div class="hero-content">
            <h1>Customize Tours</h1>
        </div>
    </section>
    <!-- Hero section ends -->

    <!-- Customize Tours section starts -->
    <section id="customize-tour" class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="[[~8]]">Cities</a></li>
                    <?php if (!empty($themesData)): ?>
                        <?php foreach ($themesData as $t): ?>
                            <li class="breadcrumb-item active">
                                <?php echo htmlspecialchars($t[\'theme_name\']); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>
            </nav>

            <h2 class="heading mb-4">Plan Your Tour..</h2>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div id="tourCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php if (!empty($allImages)): ?>
                                    <?php foreach ($allImages as $index => $img): ?>
                                        <div class="carousel-item <?php echo $index === 0 ? \'active\' : \'\'; ?>">
                                            <img src="assets/<?php echo ltrim($img, \'/\'); ?>" class="d-block w-100 rounded" alt="Tour Image">
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="carousel-item active">
                                        <img src="assets/images/default-theme.jpg" class="d-block w-100 rounded" alt="No Image">
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="carousel-indicators">
                                <?php foreach ($allImages as $index => $img): ?>
                                    <button type="button" data-bs-target="#tourCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? \'active\' : \'\'; ?>" aria-current="<?php echo $index === 0 ? \'true\' : \'false\'; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

           <div id="customizeForm">
                <div class="intro row align-items-center mt-4">
                    <div class="col">
                        <p class="mb-0">
                            ✨Customize your trip, and send us your plan. We\'ll guide you through the next steps and put together a full itinerary with cozy stays 🏨, fun activities 🎉, and all the details you need...
                        </p>
                    </div>
                </div>
                <hr>

                <form method="post" action="" id="customTourForm">
                    <div class="row g-4">
                        <!-- Right Column -->
                        <div class="col-lg-7">
                            <!-- Dates & Guests -->
                            <div class="card mb-4 border-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label fw-semibold">Dates<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="date" class="form-control text-center" name="start_date" placeholder="Start Date">
                                            <input type="date" class="form-control text-center" name="end_date" placeholder="End Date">
                                            <input type="text" class="form-control text-center" name="nights" placeholder="Nights" min="1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Guests<span class="text-danger">*</span></label>
                                        <div class="dropdown">
                                            <button class="form-control text-start" type="button" id="guestDropdownButton">
                                                2 Adults, 0 Children, 0 Infants
                                            </button>
                                            <div class="dropdown-menu p-3" id="guestDropdownMenu" style="min-width: 250px;">
                                                <!-- Adults -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Adults</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="adults">-</button>
                                                        <input type="number" class="form-control text-center" id="adults" value="2" min="1" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="adults">+</button>
                                                    </div>
                                                </div>
                                                <!-- Children 6-11 -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Children (6-11)</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="children_6_11">-</button>
                                                        <input type="number" class="form-control text-center" id="children_6_11" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="children_6_11">+</button>
                                                    </div>
                                                </div>
                                                <!-- Children 12+ -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Children (12+)</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="children_above_11">-</button>
                                                        <input type="number" class="form-control text-center" id="children_above_11" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="children_above_11">+</button>
                                                    </div>
                                                </div>
                                                <!-- Infants -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span>Infants</span>
                                                    <div class="input-group input-group-sm" style="width: 100px;">
                                                        <button class="btn btn-outline-secondary decrement" type="button" data-target="infants">-</button>
                                                        <input type="number" class="form-control text-center" id="infants" value="0" min="0" readonly>
                                                        <button class="btn btn-outline-secondary increment" type="button" data-target="infants">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="adults" id="adults_hidden">
                                        <input type="hidden" name="children_6_11" id="children_6_11_hidden">
                                        <input type="hidden" name="children_above_11" id="children_above_11_hidden">
                                        <input type="hidden" name="infants" id="infants_hidden">
                                    </div>

                                    <!-- Hotel Rating -->
                                    <div class="col-12 col-md-6 mt-3">
                                        <label class="form-label fw-semibold">Preferred Hotel Rating<span class="text-danger">*</span></label>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating3" value="3">
                                                <label class="form-check-label" for="rating3">3 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating4" value="4">
                                                <label class="form-check-label" for="rating4">4 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hotelRating" id="rating5" value="5">
                                                <label class="form-check-label" for="rating5">5 <span style="color:#ab9629">&#9733;</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pickup / Dropoff -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="pickupLocation" class="form-label fw-semibold">Pickup Location<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pickupLocation" name="pickupLocation" placeholder="Enter pickup location" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dropoffLocation" class="form-label fw-semibold">Dropoff Location<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="dropoffLocation" name="dropoffLocation" placeholder="Enter dropoff location" required>
                                </div>
                            </div>

                            <!-- Meal Plan & Allergy -->
                            <div class="row g-3 mb-4">
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold d-block">Preferred Meal Plan<span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan1" value="Breakfast Only">
                                        <label class="form-check-label" for="mealPlan1">Breakfast Only</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan2" value="Half Board">
                                        <label class="form-check-label" for="mealPlan2">Half Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan3" value="Full Board">
                                        <label class="form-check-label" for="mealPlan3">Full Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealPlan" id="mealPlan4" value="All Inclusive">
                                        <label class="form-check-label" for="mealPlan4">All Inclusive</label>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-semibold d-block">Do you have any meal allergy issues?<span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealAllergy" id="mealAllergyYes" value="Yes">
                                        <label class="form-check-label" for="mealAllergyYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="mealAllergy" id="mealAllergyNo" value="No">
                                        <label class="form-check-label" for="mealAllergyNo">No</label>
                                    </div>
                                    <div class="mt-2" id="allergyDetails" style="display:none;">
                                        <input type="text" class="form-control" name="allergy_reason" placeholder="Please specify your allergy">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label fw-semibold d-block">Bed Types & Quantity</label>

                                    <div class="col-12 d-flex flex-column flex-sm-row gap-3">

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Single Room</span>
                                            <input type="number" name="bed_types[single]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Double Room</span>
                                            <input type="number" name="bed_types[double]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Twin Room</span>
                                            <input type="number" name="bed_types[twin]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mb-2 w-100">
                                            <span>Triple Room</span>
                                            <input type="number" name="bed_types[triple]" class="form-control w-25 pe-0" min="0" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Personal Info & Submit -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-2">
                                    <label for="title" class="form-label fw-semibold small">Title<span class="text-danger">*</span></label>
                                    <select class="form-select" id="title" name="title" required>
                                        <option value="" selected disabled>Select</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Dr">Dr</option>
                                        <option value="Prof">Prof</option>
                                    </select>
                                </div>

                                <div class="col-md-8">
                                    <label for="fullName" class="form-label fw-semibold">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="whatsappCode" class="form-label fw-semibold small mt-2">Code<span class="text-danger">*</span></label>
                                    <select class="form-select" id="whatsappCode" name="whatsappCode" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($countryCodes as $c): ?>
                                            <option value="<?php echo htmlspecialchars($c[\'country_code\']); ?>">
                                                <?php echo htmlspecialchars($c[\'country_name\'] . \' (\' . $c[\'country_code\'] . \')\'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <label for="whatsapp" class="form-label fw-semibold mt-2">WhatsApp Number<span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter WhatsApp number" required> -->
                                </div>

                                <div class="col-md-3">
                                    <!-- <label for="whatsappCode" class="form-label fw-semibold small">Code<span class="text-danger">*</span></label>
                                    <select class="form-select" id="whatsappCode" name="whatsappCode" required>
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($countryCodes as $c): ?>
                                            <option value="<?php echo htmlspecialchars($c[\'country_code\']); ?>">
                                                <?php echo htmlspecialchars($c[\'country_name\'] . \' (\' . $c[\'country_code\'] . \')\'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    <label for="whatsapp" class="form-label fw-semibold mt-2">WhatsApp Number<span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control" id="whatsapp" name="whatsapp" placeholder="Enter WhatsApp" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="country" class="form-label fw-semibold">Country<span class="text-danger">*</span></label>
                                    <select class="form-select" id="country" name="country" required>
                                        <option value="" selected disabled>Select your country</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="flightNumber" class="form-label fw-semibold">Flight Number</label>
                                    <input type="text" class="form-control" id="flightNumber" name="flightNumber" placeholder="Enter flight number">
                                </div>

                                <div class="col-12">
                                    <label for="remarks" class="form-label fw-semibold">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="4" placeholder="Please specify any additional requirements or information not covered above."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Left Column -->
                        <div class="col-lg-5 border-start ps-4">
                            <!-- Vehicle Selection -->
                            <div class="mb-4">
                                <h3 name="vehicleId">Select Preferred Vehicle</h3>
                                <small class="text-danger d-block mb-3">**For indicative purposes only</small>

                                <div class="row g-4">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM vehicles ORDER BY id ASC");
                                    $stmt->execute();
                                    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    if (!empty($vehicles)):
                                        foreach ($vehicles as $v):
                                            $id = (int)$v[\'id\'];
                                            $category = htmlspecialchars($v[\'category\']);
                                            $passengers = htmlspecialchars($v[\'passenger_count\']);
                                            $image = htmlspecialchars($v[\'image\'] ?: \'assets/images/vehicles/default.jpg\');
                                    ?>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card h-100 text-center shadow-sm vehicle-card" data-vehicle-id="<?= $id ?>">
                                            <img src="<?= $image ?>" class="card-img-top img-fluid" alt="<?= $category ?>" style="height:10rem;object-fit:cover;">
                                            <div class="card-body d-flex flex-column justify-content-center" style="padding:0;">
                                                <h3><?= $category ?></h3>
                                                <p class="card-text">Passengers: <?= $passengers ?></p>
                                                <input class="form-check-input d-none" type="radio" name="vehicle_id" id="vehicle<?= $id ?>" value="<?= $id ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        endforeach;
                                    else:
                                    ?>
                                    <div class="col">
                                        <p class="text-center">No vehicles found.</p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($selectedCities)): ?>
                            <!-- Selected Cities -->
                            <div class="mb-4">
                                <h3>Selected Cities</h3>
                                <div class="row">
                                    <?php foreach ($selectedCities as $city): ?>
                                        <div class="col-md-6 col-lg-6 mb-2">
                                            <div class="card p-2 text-center" style="border-radius:0;">
                                                <?php echo htmlspecialchars($city[\'name\']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Tour Map -->
                            <div class="mb-4">
                                <h3>Tour Map</h3>
                                <div id="map" style="height:250px;width:100%;"></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div id="formError" class="alert alert-danger d-none"></div>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary submit-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- Customize Tours section ends -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHmbwBrk0OKY0Nhp9FrR_zn8HKLGZ54OU&libraries=places&callback=initMap" async defer></script>

    <script>
        const btn = document.getElementById(\'guestDropdownButton\');
        const menu = document.getElementById(\'guestDropdownMenu\');
        const ids = [\'adults\',\'children_6_11\',\'children_above_11\',\'infants\'];

        btn.addEventListener(\'click\', () => menu.classList.toggle(\'show\'));
        document.addEventListener(\'click\', e => { if(!btn.contains(e.target)&&!menu.contains(e.target)) menu.classList.remove(\'show\'); });

        function update() {
            const adults = +document.getElementById(\'adults\').value;
            const children = ids.slice(1).reduce((s,id)=>s + +document.getElementById(id).value,0);
            btn.textContent = `${adults} Adults, ${children} Children`;

            document.getElementById(\'adults_hidden\').value = adults;
            document.getElementById(\'children_6_11_hidden\').value = document.getElementById(\'children_6_11\').value;
            document.getElementById(\'children_above_11_hidden\').value = document.getElementById(\'children_above_11\').value;
            document.getElementById(\'infants_hidden\').value = document.getElementById(\'infants\').value;
        }

        document.querySelectorAll(\'.increment,.decrement\').forEach(b=>{
            b.addEventListener(\'click\', ()=>{
                const i = document.getElementById(b.dataset.target);
                const min = +i.min||0;
                i.value = Math.max(min, +i.value + (b.classList.contains(\'increment\')?1:-1));
                update();
            });
        });

        update();

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const start = document.querySelector(\'input[name="start_date"]\');
            const end = document.querySelector(\'input[name="end_date"]\');
            const nights = document.querySelector(\'input[name="nights"]\');
            const today = new Date().toISOString().split(\'T\')[0];

            start.min = today;
            end.min = today;

            const calcNights = () => {
                const diff = (new Date(end.value) - new Date(start.value)) / (1000 * 60 * 60 * 24);
                nights.value = diff > 0 ? `${diff} night${diff > 1 ? \'s\' : \'\'}` : \'\';
            };

            start.addEventListener(\'change\', () => {
                if (end.value && new Date(end.value) < new Date(start.value)) end.value = nights.value = \'\';
                end.min = start.value;
                calcNights();
            });

            end.addEventListener(\'change\', calcNights);
        });
    </script>

    <script>
        let map;
        let geocoder;
        let bounds;
        let markers = [];
        let pathCoordinates = []; 

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: { lat: 7.8731, lng: 80.7718 } 
            });

            geocoder = new google.maps.Geocoder();
            bounds = new google.maps.LatLngBounds();

            const selectedCities = <?php echo json_encode($selectedCities); ?>;

            if (selectedCities.length === 0) return;

            // Create numbered markers
            let geocodePromises = selectedCities.map((city, index) => geocodeCity(city.name, index + 1));

            Promise.all(geocodePromises).then(coords => {
                pathCoordinates = coords.filter(c => c !== null); 

                if (pathCoordinates.length > 1) {
                    const tourPath = new google.maps.Polyline({
                        path: pathCoordinates,
                        geodesic: true,
                        strokeColor: \'#FF0000\',
                        strokeOpacity: 0.7,
                        strokeWeight: 4
                    });
                    tourPath.setMap(map);
                }

                bounds = new google.maps.LatLngBounds();
                pathCoordinates.forEach(coord => bounds.extend(coord));
                map.fitBounds(bounds);
            });

            initAutocomplete();
        }

        function geocodeCity(cityName, labelNumber) {
            return new Promise((resolve, reject) => {
                geocoder.geocode({ address: cityName + \', Sri Lanka\' }, (results, status) => {
                    if (status === \'OK\') {
                        const location = results[0].geometry.location;

                        new google.maps.Marker({
                            map: map,
                            position: location,
                            title: cityName,
                            label: {
                                text: labelNumber.toString(),
                                color: "white",
                                fontWeight: "bold"
                            }
                        });

                        resolve(location);
                    } else {
                        console.warn(\'Geocode failed for:\', cityName, status);
                        resolve(null); 
                    }
                });
            });
        }

        function initAutocomplete() {
            const pickupInput = document.getElementById(\'pickupLocation\');
            const dropoffInput = document.getElementById(\'dropoffLocation\');

            const options = {
                types: [\'geocode\', \'establishment\'],
                componentRestrictions: { country: \'LK\' } 
            };

            if (pickupInput) {
                new google.maps.places.Autocomplete(pickupInput, options);
            }

            if (dropoffInput) {
                new google.maps.places.Autocomplete(dropoffInput, options);
            }
        }
    </script>

    <script>
        const yesRadio = document.getElementById(\'mealAllergyYes\');
        const noRadio = document.getElementById(\'mealAllergyNo\');
        const allergyInput = document.getElementById(\'allergyDetails\');

        yesRadio.addEventListener(\'change\', () => {
            allergyInput.style.display = yesRadio.checked ? \'block\' : \'none\';
        });

        noRadio.addEventListener(\'change\', () => {
            allergyInput.style.display = \'none\';
        });
    </script>

<script defer>
    document.addEventListener("DOMContentLoaded", () => {
        const countrySelect = document.getElementById("country");
        if (!countrySelect) {
            console.error("Select element not found");
            return;
        }

        fetch("https://restcountries.com/v3.1/all?fields=name")
            .then(res => res.json())
            .then(data => {
                data
                    .sort((a, b) => a.name.common.localeCompare(b.name.common))
                    .forEach(c =>
                        countrySelect.add(
                            new Option(c.name.common, c.name.common)
                        )
                    );
            })
            .catch(err => console.error("Error fetching countries:", err));
    });
</script>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            <?php if (!empty($_SESSION[\'itinerary_success\']) && !empty($_SESSION[\'pdf_to_download\'])): ?>
                Swal.fire({
                    icon: \'success\',
                    title: \'Submitted Successfully\',
                    text: \'Your tour request has been received.\',
                    confirmButtonText: \'Download Itinerary\'
                }).then(() => {
                    window.open(\'<?php echo $_SESSION[\'pdf_to_download\']; ?>\', \'_blank\');
                    window.location.reload();
                    window.location.href = \'./\'; 
                });
                <?php
                unset($_SESSION[\'itinerary_success\'], $_SESSION[\'pdf_to_download\']);
                ?>
            <?php endif; ?>
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("customTourForm");
            const submitBtn = form.querySelector(".submit-button");
            const errorBox = document.getElementById("formError");

            form.addEventListener("submit", function (e) {
                errorBox.classList.add("d-none");
                errorBox.innerHTML = "";

                let errors = [];

                // ======================
                // Basic required fields
                // ======================
                const requiredFields = [
                    { id: "pickupLocation", label: "Pickup Location" },
                    { id: "dropoffLocation", label: "Dropoff Location" },
                    { id: "title", label: "Title" },
                    { id: "fullName", label: "Full Name" },
                    { id: "email", label: "Email" },
                    { id: "whatsappCode", label: "WhatsApp Code" },
                    { id: "whatsapp", label: "WhatsApp Number" },
                    { id: "country", label: "Country" },
                ];

                requiredFields.forEach(field => {
                    const el = document.getElementById(field.id);
                    if (!el || !el.value.trim()) {
                        errors.push(field.label);
                        el?.classList.add("is-invalid");
                    } else {
                        el.classList.remove("is-invalid");
                    }
                });

                // ======================
                // Dates validation
                // ======================
                const startDate = document.querySelector(\'input[name="start_date"]\');
                const endDate   = document.querySelector(\'input[name="end_date"]\');
                const nights    = document.querySelector(\'input[name="nights"]\');

                if (!startDate.value) errors.push("Start Date");
                if (!endDate.value) errors.push("End Date");
                if (!nights.value) errors.push("Number of Nights");

                // ======================
                // Hotel rating
                // ======================
                if (!document.querySelector(\'input[name="hotelRating"]:checked\')) {
                    errors.push("Preferred Hotel Rating");
                }

                // ======================
                // Meal plan
                // ======================
                if (!document.querySelector(\'input[name="mealPlan"]:checked\')) {
                    errors.push("Meal Plan");
                }

                // ======================
                // Vehicle
                // ======================
                if (!document.querySelector(\'input[name="vehicle_id"]:checked\')) {
                    errors.push("Select Preferred Vehicle");
                }


                // ======================
                // Allergy issues
                // ======================
                const allergyYes = document.getElementById("mealAllergyYes");
                const allergyNo  = document.getElementById("mealAllergyNo");
                const allergyReason = document.querySelector(\'input[name="allergy_reason"]\');

                if (!allergyYes.checked && !allergyNo.checked) {
                    errors.push("Meal Allergy Selection");
                }

                if (allergyYes.checked && (!allergyReason || !allergyReason.value.trim())) {
                    errors.push("Allergy Details");
                    allergyReason?.classList.add("is-invalid");
                } else {
                    allergyReason?.classList.remove("is-invalid");
                }

                if (errors.length > 0) {
                    e.preventDefault();

                    errorBox.innerHTML = `
                        <strong>Please fill the following required fields:</strong>
                        <ul class="mb-0">
                            ${[...new Set(errors)].map(e => `<li>${e}</li>`).join("")}
                        </ul>
                    `;
                    errorBox.classList.remove("d-none");

                    submitBtn.disabled = false;
                    submitBtn.innerHTML = "Submit";
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.innerHTML = "Submitting...";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".vehicle-card");

            cards.forEach(card => {
                card.addEventListener("click", function() {
                    cards.forEach(c => c.classList.remove("selected"));
                    this.classList.add("selected");
                    const radio = this.querySelector(\'input[type="radio"]\');
                    if(radio) radio.checked = true;
                });
            });
        });
    </script>

</body>

<?php
return ob_get_clean();',
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