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
        <div class="phone"><i class="fa fa-phone"></i>+1 234 567 8900</div>
        <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
        <nav class="main-menu top-menu">
            <ul>
                <li><a href="/index">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="/index">Rooms</a></li>
                <li><a href="amenities.html">Amenities</a></li>
                <li><a href="/login">Booking</a></li>
                <li class="active"><a href="login.html">Login</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header Section End -->

    <!-- Login Section Start -->
    <div id="login">
        <div class="container">
            <div class="section-header">
                <h2>Login</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis,
                    enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row" style="padding-left: 12%">
                <div class="col-md-8">
                    <div class="login-form">
                        <form>
                            <div class="control-group">
                                <label>Your Email</label>
                                <input type="email" id="user-email" class="form-control" />
                            </div>
                            <div id="otp-message"></div>
                            <div class="control-group">
                                <label>Your OTP</label>
                                <input type="number" id="otp" class="form-control" />
                            </div>
                            <div id="login-message"></div>
                            <br> 
                            <div class="button text-center"><button type="button" id="btn-login">Login</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="login-form">
                        <div class="button" style="margin-top: 10%"><button type="button" id="btn-sendOTP">Send
                                OTP</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->

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

    <!-- Contact Javascript File -->
    <script src="assets/user/js/jqBootstrapValidation.min.js"></script>
    <script src="assets/user/js/contact.js"></script>

    <!-- Main Javascript File -->
    <script src="assets/user/js/main.js"></script>

    <!-- Send OTP for email -->
    <script>
        $(document).ready(function() {
            $('#btn-sendOTP').on('click', function(e) {
                e.preventDefault();

                var email = $('#user-email').val();

                $.ajax({
                    url: 'http://backendhotelmanager.test:8080/api/user/send-otp',
                    method: 'POST',
                    data: {
                        email: email
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#otp-message').text(response.message).css('color', 'green');                   
                        } else {
                            $('#otp-message').text('Failed to send OTP: ' + response
                                .message).css('color', 'red');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Parse JSON response text
                        var response = JSON.parse(xhr.responseText);
                        // Lấy message từ phản hồi JSON
                        var message = response.message.email;

                        $('#otp-message').text(message).css('color', 'red');
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>

    <!-- Login with OTP -->
    <script>
        $(document).ready(function() {
            $('#btn-login').on('click', function(e) {
                e.preventDefault();

                var email = $('#user-email').val();
                var otp = $('#otp').val();

                if (email) {
                    $.ajax({
                        url: 'http://backendhotelmanager.test:8080/api/user/login',
                        method: 'POST',
                        data: {
                            Email: email,
                            OTP: otp
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status) {
                                $('#login-message').text(response.message).css('color',
                                    'green');
                                    window.location.href = '/index';
                            } else {
                                $('#login-message').text('Failed to login: ' + response.message)
                                    .css('color', 'red');
                            }
                        },
                        error: function(xhr, status, error) {
                            // Parse JSON response text
                            var response = JSON.parse(xhr.responseText);
                            // Lấy đối tượng message từ phản hồi JSON
                            var messages = response.message;
                            $('#login-message').text('Failed to login: ' + messages)
                                    .css('color', 'red');
                            console.log('Error:', error);
                        }
                    });
                } else {
                    $('#login-message').text('Please enter your email address.').css('color', 'red');
                }
            });
        });
    </script>

</body>

</html>
