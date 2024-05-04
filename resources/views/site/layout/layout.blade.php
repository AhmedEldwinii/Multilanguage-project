<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM - Free Bootstrap Magazine Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('site') }}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('site') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('site') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="{{ asset('site') }}/" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ asset('site') }}/index.html" class="nav-item nav-link active">Home</a>
                    <a href="{{ asset('site') }}/category.html" class="nav-item nav-link">Categories</a>
                    <a href="{{ asset('site') }}/single.html" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="{{ asset('site') }}/#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ asset('site') }}/#" class="dropdown-item">Menu item 1</a>
                            <a href="{{ asset('site') }}/#" class="dropdown-item">Menu item 2</a>
                            <a href="{{ asset('site') }}/#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>
                    <a href="{{ asset('site') }}/contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    @yield('siteIndex')



    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="{{ asset('site') }}/index.html" class="navbar-brand">
                    <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
                <p>Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ asset('site') }}/#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ asset('site') }}/#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ asset('site') }}/#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ asset('site') }}/#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ asset('site') }}/#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Categories</h4>
                <div class="d-flex flex-wrap m-n1">
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Tags</h4>
                <div class="d-flex flex-wrap m-n1">
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                    <a href="{{ asset('site') }}/" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="{{ asset('site') }}/#"><i class="fa fa-angle-right text-dark mr-2"></i>About</a>
                    <a class="text-secondary mb-2" href="{{ asset('site') }}/#"><i class="fa fa-angle-right text-dark mr-2"></i>Advertise</a>
                    <a class="text-secondary mb-2" href="{{ asset('site') }}/#"><i class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                    <a class="text-secondary mb-2" href="{{ asset('site') }}/#"><i class="fa fa-angle-right text-dark mr-2"></i>Terms & conditions</a>
                    <a class="text-secondary" href="{{ asset('site') }}/#"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href="{{ asset('site') }}/#">Your Site Name</a>. All Rights Reserved.

			<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
			Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="{{ asset('site') }}/#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('site') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('site') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('site') }}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('site') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('site') }}/js/main.js"></script>
</body>

</html>