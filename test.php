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
