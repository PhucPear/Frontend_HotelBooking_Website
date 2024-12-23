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
        <!-- User -->
        @include('User.partials.get-customer')

        <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
        <nav class="main-menu top-menu">
            <ul>
                <li><a href="/index">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="/index">Rooms</a></li>
                <li><a href="amenities.html">Amenities</a></li>
                <li class="active"><a href="booking.html">Booking</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header Section End -->

    <div id="welcome">
        <div class="container">
            <h4>Booking History</h4>
        </div>
    </div>

    <!-- Room Section Start -->
    <div id="rooms">
        <div class="container">
            <div class="row" id="booking-history">

            </div>
        </div>
    </div>
    <!-- Room Section End -->


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

    <script>
        function setElementHtml(id, data) {
            var billElement = id;
            var billHtml = `
                                 <div class="row no-gutters">
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="row no-gutters h-100">
                                <div class="col-md-4">
                                    <img src="assets/user/img/room/${data.image}" class="card-img h-100" alt="Room Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <h5 class="card-title">Room Name: ${data.name}</h5>
                                        <p class="card-text">
                                            <strong>Price: </strong> ${data.price} <br>
                                            <strong>Capacity: </strong> ${data.capacity} people
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h5 class="card-title">Booking Details</h5>
                                <p class="card-text">
                                    <strong>Date: </strong> ${data.date}<br>
                                    <strong>Amount: </strong> ${data.amount}<br>
                                    <strong>Check-in Date: </strong> ${data.check_in_date}<br>
                                    <strong>Check-out Date: </strong> ${data.check_out_date}<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                            `;
            billElement.append(billHtml);
        }
        //Display booking history
        $(document).ready(function() {
            // Lấy URL hiện tại
            var currentUrl = window.location.href;
            // Tạo đối tượng URL để dễ dàng lấy các tham số query
            var url = new URL(currentUrl);
            // Lấy giá trị của tham số 'roomID' từ URL
            var customerID = url.searchParams.get('customerID');
            $.ajax({
                url: 'http://backendhotelmanager.test:8080/api/user/booking-history',
                method: 'GET',
                data: {
                    customerID: customerID
                },
                dataType: 'json',
                success: function(data, textStatus, xhr) {
                    if (xhr.status === 200) {
                        var bills = $('#booking-history');
                        bills.empty();

                        $.each(data.bills, function(index, bill) {
                            console.log('Bills:', bill);
                            setElementHtml(bills, bill);
                        });
                    } else {
                        console.log('Error status code: ' + xhr.status);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        });
    </script>

</body>

</html>
