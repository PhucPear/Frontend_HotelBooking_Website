<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL HOTEL | Responsive Travel & Tourism Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-favicon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">

    <!-- Vendor CSS File -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet">
    <link href="assets/vendor/slick/slick-theme.css" rel="stylesheet">
    <link href="assets/vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="assets/css/hover-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Header Section Start -->
    <header id="header">
        <a href="/index" class="logo"><img src="assets/img/logo.jpg" alt="logo"></a>
        <!-- User -->
        @include('User.partials.get-customer')

        <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
        <nav class="main-menu top-menu">
            <ul>
                <li><a href="/index.">Home</a></li>
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

    <!-- Room Section Start -->
    <div id="rooms">
        <div class="container">
            <div class="row" id="room">

            </div>
        </div>
    </div>
    <!-- Room Section End -->

    <!-- Booking Section Start -->
    <div id="booking">
        <div class="container">
            <div class="section-header">
                <h2>Room Booking</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="booking-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="bookingForm" novalidate="novalidate">
                            <div class="form-row">
                                <div class="control-group col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" id="full-name" />
                                </div>
                                <div class="control-group col-md-6">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" id="date-of-birth" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-md-6">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" id="phone" />
                                </div>
                                <div class="control-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-md-6">
                                    <label>Check-In</label>
                                    <input type="datetime-local" class="form-control" id="check-in" />
                                </div>
                                <div class="control-group col-md-6">
                                    <label>Check-Out</label>
                                    <input type="datetime-local" class="form-control" id="check-out" />
                                </div>
                            </div>
                            <br>
                            <div class="text-center" id="booking-message"></div>
                            <br>
                            <div class="button text-center"><button type="button"
                                    style="width: 60%; font-weight: bold;" id="btn-booking">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Section End -->

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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery/jquery-migrate.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/easing/easing.min.js"></script>
    <script src="assets/vendor/stickyjs/sticky.js"></script>
    <script src="assets/vendor/superfish/hoverIntent.js"></script>
    <script src="assets/vendor/superfish/superfish.min.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/slick/slick.min.js"></script>
    <script src="assets/vendor/tempusdominus/js/moment.min.js"></script>
    <script src="assets/vendor/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/vendor/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Booking Javascript File -->
    <script src="assets/js/booking.js"></script>
    <script src="assets/js/jqBootstrapValidation.min.js"></script>

    <!-- Main Javascript File -->
    <script src="assets/js/main.js"></script>

    <script>
        function setElementHtml(id, data) {
            var roomElement = $(id);
            roomElement.empty();

            var roomHtml = `                                             
                    <div class="col-md-3">
                        <div class="room-img">
                            <div class="box12">
                                <img src="assets/user/img/room/${data.image}">
                                <div class="box-content">
                                    <h3 class="title">${data.name}</h3>
                                    <ul class="icon">
                                        <li><a href="#" data-toggle="modal" data-target="#modal-id"><i
                                                    class="fa fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="room-des">
                            <h3><a href="#" data-toggle="modal" data-target="#modal-id">${data.name}</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <ul class="room-size">
                                <li><i class="fa fa-arrow-right"></i>Size: 260 sq ft </li>
                                <li><i class="fa fa-arrow-right"></i>Capacity: ${data.capacity} people </li>
                            </ul>
                            <ul class="room-icon">
                                <li class="icon-1"></li>
                                <li class="icon-2"></li>
                                <li class="icon-3"></li>
                                <li class="icon-4"></li>
                                <li class="icon-5"></li>
                                <li class="icon-6"></li>
                                <li class="icon-7"></li>
                                <li class="icon-8"></li>
                                <li class="icon-9"></li>
                                <li class="icon-10"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="room-rate">
                            <h3>From</h3>
                            <h1>$${data.price}</h1>
                        </div>
                    </div>        
                            `;
            roomElement.append(roomHtml);
        }
        // Display booking room information
        $(document).ready(function() {
            // Lấy URL hiện tại
            var currentUrl = window.location.href;
            // Tạo đối tượng URL để dễ dàng lấy các tham số query
            var url = new URL(currentUrl);
            // Lấy giá trị của tham số 'roomID' từ URL
            var roomID = url.searchParams.get('roomID');
            $.ajax({
                url: 'http://backendhotelmanager.test:8080/api/user/find',
                method: 'GET',
                data: {
                    roomID: roomID
                },
                dataType: 'json',
                success: function(data, textStatus, xhr) {
                    if (xhr.status === 200) {
                        var room = data.data;
                        console.log('Room:', room);
                        setElementHtml('#room', room);
                    } else {
                        console.log('Error status code:', xhr.status);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    </script>
    <!-- Booking room -->
    <script>
        $(document).ready(function() {
            $('#btn-booking').on('click', function(e) {
                e.preventDefault();
                // Lấy URL hiện tại
                var currentUrl = window.location.href;
                // Tạo đối tượng URL để dễ dàng lấy các tham số query
                var url = new URL(currentUrl);
                // Lấy giá trị của tham số 'roomID' từ URL
                var roomID = url.searchParams.get('roomID');

                var fullName = $('#full-name').val();
                var email = $('#email').val();
                var dateOfBirth = $('#date-of-birth').val();
                var phone = $('#phone').val();
                var checkIn = $('#check-in').val();
                var checkOut = $('#check-out').val();

                $.ajax({
                    url: 'http://backendhotelmanager.test:8080/api/user/booking-room',
                    method: 'POST',
                    data: {
                        Room_ID: roomID,
                        Full_Name: fullName,
                        Email: email,
                        Date_of_Birth: dateOfBirth,
                        Phone: phone,
                        Check_In: checkIn,
                        Check_Out: checkOut,
                        Return_Url: "http://frontendhotelmanager.test:8080/payment-confirmation"
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#booking-message').text(response.message).css('color',
                                'green');
                            window.location.href = response.vnpUrl;
                        } else {
                            $('#booking-message').text('Failed to login: ' + response.message)
                                .css('color', 'red');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Parse JSON response text
                        var response = JSON.parse(xhr.responseText);
                        // Lấy đối tượng message từ phản hồi JSON
                        var messages = response.message;
                        var firstErrorMessage = '';
                        if (typeof messages === 'object') {
                            // Lặp qua tất cả các trường trong đối tượng message
                            $.each(messages, function(field, errors) {
                                if (Array.isArray(errors) && errors.length > 0) {
                                    firstErrorMessage = errors[0];
                                    return false;
                                }
                            });
                        } else {
                            firstErrorMessage = messages;
                        }
                        $('#booking-message').text(firstErrorMessage).css('color', 'red');
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>
