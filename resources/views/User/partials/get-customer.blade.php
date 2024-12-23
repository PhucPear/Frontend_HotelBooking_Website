<div id="user">

</div>
<script>
    // Display customer information
    $(document).ready(function() {
        $.ajax({
            url: 'http://backendhotelmanager.test:8080/api/user/get-customer',
            method: 'GET',
            dataType: 'json',
            success: function(data, textStatus, xhr) {
                var user = $('#user');
                user.empty();
                if (xhr.status === 200) {
                    var customer = data.Customer;
                    var userHtml =
                        `<a href="/booking-history?customerID=${customer.Customer_ID}">
                        <div class="phone" style="margin-right: 10%"><i class="fa fa-user"></i>${customer.Full_Name}</div>
                                        </a>
                        <a href="#" id="btn-logout">
                        <div class="phone" style="margin-right: 4%; padding-left: 2%"><i class="fa fa-sign-out"></i>Logout</div>
                        </a>
                        <input type="hidden" id="email-login" value="${customer.Email}">
                        `;

                    user.append(userHtml);
                }
            },
            error: function(xhr, status, error) {
                var user = $('#user');
                user.empty();
                var loginHtml = `<a href="/login">
                    <div class="phone" style="margin-right: 10%"><i class="fa fa-user"></i>Login</div>
                                    </a>`;
                user.append(loginHtml);
                console.log('Error: ' + error);
                console.log('Response:', xhr.responseText);
            }
        });
    });
</script>
<!-- Logout -->
<script>
    // Gắn sự kiện click cho nút Logout bằng delegation
    $(document).on('click', '#btn-logout', function(e) {
        e.preventDefault();
        var email = $('#email-login').val();
        console.log('Logout email: ' + email);
        $.ajax({
            url: 'http://backendhotelmanager.test:8080/api/user/logout',
            method: 'POST',
            data: {
                Email: email
            },
            success: function(data, textStatus, xhr) {
                if (xhr.status === 200) {
                    window.location.href = '/login';
                } else {
                    console.log('Logout failed: ' + xhr.status);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });
</script>
