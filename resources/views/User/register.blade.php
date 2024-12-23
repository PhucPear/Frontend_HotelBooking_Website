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
                <li><a href="booking.html">Booking</a></li>
                <li class="active"><a href="/login">Login</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header Section End -->

    <!-- Login Section Start -->
    <div id="login">
        <div class="container">
            <div class="section-header">
                <h2>Registration</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi libero. Quisque convallis,
                    enim at venenatis tincidunt.
                </p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="login-form">
                        <form>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Full Name</label>
                                    <input type="text" id="full-name" class="form-control" />
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Email</label>
                                    <input type="email" id="email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Date of Birth</label>
                                    <input type="date" id="date-of-birth" class="form-control" />
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Phone</label>
                                    <input type="number" id="phone" class="form-control" />
                                </div>
                            </div>
                            <div id="register-message"></div>
                            <div class="button text-center"><button type="button"
                                    id="btn-register">Registration</button></div>
                        </form>
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

    <!-- Register -->
    <script>
        $(document).ready(function() {
            $('#btn-register').on('click', function(e) {
                e.preventDefault();

                var fullName = $('#full-name').val();
                var email = $('#email').val();
                var dateOfBirth = $('#date-of-birth').val();
                var phone = $('#phone').val();

                $.ajax({
                    url: 'http://backendhotelmanager.test:8080/api/user/register',
                    method: 'POST',
                    data: {
                        Full_Name: fullName,
                        Email: email,
                        Date_of_Birth: dateOfBirth,
                        Phone: phone
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#register-message').text(response.message).css('color',
                                'green');
                        } else {
                            $('#register-message').text('Failed to login: ' + response.message)
                                .css('color', 'red');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Parse JSON response text
                        var response = JSON.parse(xhr.responseText);
                        // Lấy đối tượng message từ phản hồi JSON
                        var messages = response.message;
                        var firstErrorMessage = '';
                        // Lặp qua tất cả các trường trong đối tượng message
                        $.each(messages, function(field, errors) {
                            if (errors.length > 0) {
                                firstErrorMessage += errors;
                                return false;
                            }
                        });
                        $('#register-message').text(firstErrorMessage).css('color', 'red');
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>

</body>

</html>
