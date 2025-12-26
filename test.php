<header>

    <!-- Top Info Bar -->
    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="top-left">
                <a href="https://wa.me/94761414557" target="_blank" class="top-link">
                    <i class="fa-brands fa-whatsapp fa-lg"></i> +94 76 1414 557
                </a>
                <a href="mailto:info@airportparking.lk" class="top-link">
                    <i class="fa-regular fa-envelope fa-lg"></i> info@airportparking.lk
                </a>
            </div>
            <div class="top-right">
                <a href="https://www.skyscanner.net/" class="top-link" target="_blank">
                    <i class="fa-solid fa-plane"></i> Flight Info
                </a>
                <a href="https://srilankarentacar.com/" class="top-btn" target="_blank">
                    Rent a Car
                </a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-lg-0">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="navbar-brand" href="./">
                <img src="assets/images/logo.png" alt="Explore Vacations | Logo">
            </a>

            <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Explore Vacations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
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
