<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL HOTEL | Responsive Travel & Tourism Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="assets/user/img/favicon.ico" rel="icon">
    <link href="assets/user/img/apple-favicon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">

    <!-- Vendor CSS File -->
    <link href="assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/user/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/user/vendor/animate/animate.min.css" rel="stylesheet">
    <link href="assets/user/vendor/slick/slick.css" rel="stylesheet">
    <link href="assets/user/vendor/slick/slick-theme.css" rel="stylesheet">
    <link href="assets/user/vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="assets/user/css/hover-style.css" rel="stylesheet">
    <link href="assets/user/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Header Section Start -->
    <header id="header">
        <a href="/index" class="logo"><img src="assets/user/img/logo.jpg" alt="logo"></a>
        <!-- User -->
        @include('User.partials.get-customer')

        <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
        <nav class="main-menu top-menu">
            <ul>
                <li class="active"><a href="/index">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="/index">Rooms</a></li>
                <li><a href="amenities.html">Amenities</a></li>
                <li><a href="booking.html">Booking</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header Section End -->

    <!-- Header Slider Start -->
    <div id="headerSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
            <li data-target="#headerSlider" data-slide-to="1"></li>
            <li data-target="#headerSlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/user/img/slider/header-slider-1.jpg" alt="Royal Hotel">
                <div class="carousel-caption">
                    <h1 class="animated fadeInRight">Nullam mattis</h1>
                </div>
            </div>

            <div class="carousel-item">
                <img src="assets/user/img/slider/header-slider-2.jpg" alt="Royal Hotel">
                <div class="carousel-caption">
                    <h1 class="animated fadeInLeft">Lorem ipsum</h1>
                </div>
            </div>

            <div class="carousel-item">
                <img src="assets/user/img/slider/header-slider-3.jpg" alt="Royal Hotel">
                <div class="carousel-caption">
                    <h1 class="animated fadeInRight">Phasellus ultrices</h1>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Header Slider End -->

    <!-- Search Section Start -->
    @include('User.partials.search-room')
    <!-- Search Section End -->

    <!-- Welcome Section Start -->
    <div id="welcome">
        <div class="container">
            <h3>Welcome to Royal Hotel</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas gravida sollicitudin turpis id posuere.
                Fusce nec rhoncus nibh. Fusce arcu libero, euismod eget commodo at, venenatis a nisi. Sed faucibus metus
                sed leo vulputate blandit.</p>
            <a href="#">Book Now</a>
        </div>
    </div>
    <!-- Welcome Section End -->

    <!-- Amenities Section Start -->
    <div id="amenities" class="home-amenities">
        <div class="container">
            <div class="section-header">
                <h2>Amenities & Services</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis,
                    enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-2"></i>
                    <h3>Air Conditioner</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-3"></i>
                    <h3>Bathtub</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-4"></i>
                    <h3>Shower</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-6"></i>
                    <h3>Television</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-7"></i>
                    <h3>WiFi</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-8"></i>
                    <h3>Telephone</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-9"></i>
                    <h3>Mini Bar</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 icons">
                    <i class="icon icon-10"></i>
                    <h3>Kitchen</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Amenities Section Start -->

    <!-- Room Section Start -->
    <div id="rooms">
        <div class="container">
            <div class="section-header">
                <h2>Our Rooms</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis,
                    enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row">

                @include('User.partials.room-list')

            </div>
        </div>
    </div>
    <!-- Room Section End -->

    <!-- Modal for Room Section Start -->
    <div id="modal-id" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="port-slider">
                                <div><img src="assets/user/img/room-slider/room-1.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-2.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-3.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-4.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-5.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-6.jpg"></div>
                            </div>
                            <div class="port-slider-nav">
                                <div><img src="assets/user/img/room-slider/room-1.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-2.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-3.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-4.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-5.jpg"></div>
                                <div><img src="assets/user/img/room-slider/room-6.jpg"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2>Lorem ipsum dolor</h2>
                            <p>
                                Lorem ipsum dolor viverra purus imperdiet rhoncus imperdiet. Suspendisse vulputate
                                condimentum ligula sollicitudin hendrerit. Phasellus luctus, elit et ultrices interdum,
                                neque mi pellentesque massorci. Nam in cursus ex, nec mattis lectus. Curabitur quis
                                elementum nunc. Mauris iaculis, justo eu aliquam sagittis, arcu eros cursus libero, sit
                                amet eleifend dolor odio at lacus.
                            </p>
                            <div class="modal-link">
                                <a href="#">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Room Section End -->

    <!-- Subscribe Section Start -->
    <div id="subscribe">
        <div class="container">
            <div class="section-header">
                <h2>Subscribe for Special Offer</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis,
                    enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="subscribe-form">
                        <form>
                            <input type="email" required="required" placeholder="Enter your email here" />
                            <button>submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe Section End -->

    <!-- Booking Section Start -->
    <div id="booking">
        <div class="container">
            <div class="section-header">
                <h2>Room Booking</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis,
                    enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="booking-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="bookingForm" novalidate="novalidate">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" id="fname"
                                        placeholder="E.g. John" required="required"
                                        data-validation-required-message="Please enter first name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="lname"
                                        placeholder="E.g. Sina" required="required"
                                        data-validation-required-message="Please enter last name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" id="mobile"
                                        placeholder="E.g. +1 234 567 8900" required="required"
                                        data-validation-required-message="Please enter your mobile number" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="E.g. email@example.com" required="required"
                                        data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Check-In</label>
                                    <input type="text" class="form-control datetimepicker-input" id="date-1"
                                        data-toggle="datetimepicker" data-target="#date-1"
                                        placeholder="E.g. MM/DD/YYYY" required="required"
                                        data-validation-required-message="Please enter date" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Check-Out</label>
                                    <input type="text" class="form-control datetimepicker-input" id="date-2"
                                        data-toggle="datetimepicker" data-target="#date-2"
                                        placeholder="E.g. MM/DD/YYYY" required="required"
                                        data-validation-required-message="Please enter date" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label>Special Request</label>
                                <input type="text" class="form-control" id="request"
                                    placeholder="E.g. Special Request" required="required"
                                    data-validation-required-message="Please enter your special request" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="button"><button type="submit" id="bookingButton">Book Now</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Section End -->

    <!-- Call Section Start -->
    <div id="call-us">
        <div class="container">
            <div class="section-header">
                <h2>Click Below to Call Us</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis,
                    enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="tel:+12345678900">+1 234 567 8900</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call Section End -->

    <!-- Footer Section Start -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="social">
                        <a href="">
                            <li class="fa fa-instagram"></li>
                        </a>
                        <a href="">
                            <li class="fa fa-twitter"></li>
                        </a>
                        <a href="">
                            <li class="fa fa-facebook-f"></li>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <p>Copyright &#169; 2045 <a href="">Your Site Name</a> All Rights Reserved.</p>

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JavaScript File -->
    <script src="assets/user/vendor/jquery/jquery.min.js"></script>
    <script src="assets/user/vendor/jquery/jquery-migrate.min.js"></script>
    <script src="assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/user/vendor/easing/easing.min.js"></script>
    <script src="assets/user/vendor/stickyjs/sticky.js"></script>
    <script src="assets/user/vendor/superfish/hoverIntent.js"></script>
    <script src="assets/user/vendor/superfish/superfish.min.js"></script>
    <script src="assets/user/vendor/wow/wow.min.js"></script>
    <script src="assets/user/vendor/slick/slick.min.js"></script>
    <script src="assets/user/vendor/tempusdominus/js/moment.min.js"></script>
    <script src="assets/user/vendor/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/user/vendor/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Booking Javascript File -->
    <script src="assets/user/js/booking.js"></script>
    <script src="assets/user/js/jqBootstrapValidation.min.js"></script>

    <!-- Main Javascript File -->
    <script src="assets/user/js/main.js"></script>
</body>

</html>
