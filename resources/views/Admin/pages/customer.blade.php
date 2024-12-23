@extends('layouts.admin')
@section('title', 'Customer Management')

@section('content')
    <div id="alert" class="alert" style="display:none; text-align:center; font-size:large;">
    </div>

    <div style="padding-left:1%">
        <div class="table-responsive">
            <div class="table-wrapper" style="width:1600px;">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><a href="/admin/customers"><b>Customer Management</b></a></h2>
                        </div>
                        <form method="post"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            action="#">
                            <div class="input-group">
                                <input type="text" id="search" name="search"
                                    class="form-control bg-light border-0 small" spellcheck="false"
                                    placeholder="Enter name customer..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btn-search">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div style="padding-top:4px; padding-right:14px; margin-right:80px;">
                            <a href="#addObjModal" class="btn btn-success" style="font-size:medium; font-weight:bold;"
                                data-toggle="modal">Add Customer</a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-left">
                    <thead>
                        <tr>
                            <th style="width:10%">ID</th>
                            <th style="width:20%">Full Name</th>
                            <th style="width:12%">Date of Birth</th>
                            <th style="width:20%">Email</th>
                            <th style="width:14%">Phone</th>
                            <th style="width:14%">Card ID</th>
                            <th style="width:10%">Task</th>
                        </tr>
                    </thead>
                    <tbody id="content-table">

                        <!-- Content -->

                    </tbody>
                </table>
                <div class="col-md-12 d-flex justify-content-center">
                    <div style="font-size:22px;">
                        PagedListPager
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add -->
    <div id="addObjModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="name-add" class="form-control" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" id="date-add" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email-add" class="form-control" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone-add" class="form-control" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Card ID</label>
                        <input type="text" id="id-add" class="form-control" spellcheck="false">
                    </div>
                    <div id="alert-add" class="alert" style="display:none;"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-facebook" data-dismiss="modal" value="Cancel">
                    <input type="button" id="btn-add" class="btn btn-success" value="Add">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit -->
    <div id="editObjModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Edit Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="edit-customer">
                    <!-- Customer Edit -->
                </div>
                <input type="hidden" id="id-edit" />
                <div class="modal-footer">
                    <input type="button" class="btn btn-facebook" data-dismiss="modal" value="Cancel">
                    <input type="button" id="btn-edit" class="btn btn-info" value="Save">
                </div>

            </div>
        </div>
    </div>
    <!-- Delete -->
    <div id="deleteObjModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="width:440px">

                <div class="modal-header">
                    <h4 class="modal-title">Delete Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Would you like to remove this customer ?</p>
                    <div id="alert-delete" class="alert" style="display:none;">
                    </div>
                    <input type="hidden" id="id-delete" />
                    <div class="modal-footer">
                        <input type="button" class="btn btn-facebook" data-dismiss="modal" value="Cancel">
                        <input type="button" id="btn-delete" class="btn btn-danger" value="Delete">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        var apiBaseUrl = "{{ config('app.api_base_url') }}";
        // Show information employee
        function showInformationEdit(element, data) {
            var html = `
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="name-edit" class="form-control" value="${data.Full_Name}" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" id="date-edit" value="${data.Date_of_Birth}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email-edit" class="form-control" value="${data.Email}" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone-edit" class="form-control" value="${data.Phone}" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Card ID</label>
                        <input type="text" id="card-id-edit" class="form-control" value="${data.ID}" spellcheck="false">
                    </div>       
                    <div id="alert-edit" class="alert" style="display:none;"></div>    
                        `;
            element.append(html);
        }

        $(document).ready(function() {
            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $('#id-edit').val(id);
                console.log('ID ', id);
                // Show information edit
                $.ajax({
                    url: apiBaseUrl + '/admin/customers/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            var element = $('#edit-customer');
                            element.empty();
                            var data = response.data;
                            console.log('data ', data);
                            showInformationEdit(element, data);
                        } else {
                            console.log('Error status code: ', response.status);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                $('#id-delete').val(id);
                var element = $('#alert-delete');
                element.hide();
                console.log('ID ', id);
            });
        });


        function setElementHtml(element, data) {
            var html = `
                            <tr>
                                <td>${data.Customer_ID}</td>
                                <td>${data.Full_Name}</td>
                                <td>${data.Date_of_Birth}</td>
                                <td>${data.Email}</td>
                                <td>${data.Phone}</td>
                                <td>${data.ID}</td>
                                <td>
                                    <a href="#" data-target="#editObjModal" class="edit" data-toggle="modal" data-id="${data.Customer_ID}">Edit</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-target="#deleteObjModal" class="delete" data-toggle="modal" data-id="${data.Customer_ID}">Delete</a>
                                </td>
                            </tr>                     
                        `;
            element.append(html);
        }

        //Display customer list
        $(document).ready(function() {
            $.ajax({
                url: apiBaseUrl + '/admin/customers',
                method: 'GET',
                dataType: 'json',
                success: function(data, textStatus, xhr) {
                    if (xhr.status === 200) {
                        var element = $('#content-table');
                        element.empty();

                        $.each(data.data, function(index, data) {
                            setElementHtml(element, data);
                        });
                    } else {
                        console.log('Error status code: ', xhr.status);
                        $('#error-message').text('Error status code: ' + xhr.status).show();
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error: ', error);
                    $('#error-message').text('Error: ' + error).show();
                }
            });
        });

        // Search Customer
        $(document).ready(function() {
            $('#btn-search').on('click', function(e) {
                e.preventDefault();
                var name = $('#search').val();
                searchCustomer(name);
            });
        });

        function searchCustomer(name) {
            $.ajax({
                url: apiBaseUrl + '/admin/customers/search',
                method: 'GET',
                data: {
                    Name: name
                },
                dataType: 'json',
                success: function(data, textStatus, xhr) {
                    if (xhr.status === 200) {
                        var element = $('#content-table');
                        element.empty();

                        $.each(data.data, function(index, data) {
                            setElementHtml(element, data);
                        });
                    } else {
                        console.log('Error status code: ', xhr.status);
                        $('#alert').text('Error status code: ' + xhr.status).css('color', 'green');
                    }
                },
                error: function(xhr, status, error) {
                    // Parse JSON response text
                    var response = JSON.parse(xhr.responseText);
                    // Lấy đối tượng message từ phản hồi JSON
                    var messages = response.message;
                    var firstErrorMessage = '';
                    $.each(messages, function(field, errors) {
                        if (errors.length > 0) {
                            firstErrorMessage += errors;
                            return false;
                        }
                    });
                    $('#alert').text(firstErrorMessage).css('color', 'red');
                }
            });
        }

        // Delete Customer
        $(document).ready(function() {
            $('#btn-delete').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-delete').val();
                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/customers/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#alert-delete').text(response.message).css('color', 'green')
                                .show();
                            setTimeout(function() {
                                $('#alert-delete').fadeOut(function() {
                                    location.reload();
                                });
                            }, 2000);
                        } else {
                            console.log('Error status code: ', response.status).css('color',
                                'red');
                        }
                    },
                    error: function(xhr, status, error) {
                        var response = JSON.parse(xhr.responseText);
                        var messages = response.message;
                        $('#alert-delete').text('Error: ' + messages).css('color', 'red')
                    .show();
                        console.log('Error:', error);
                    }
                });
            });
        });

        // Edit Customer
        $(document).ready(function() {
            $('#btn-edit').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-edit').val();
                var name = $('#name-edit').val();
                var date = $('#date-edit').val();
                var email = $('#email-edit').val();
                var phone = $('#phone-edit').val();
                var cardID = $('#card-id-edit').val();

                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/customers/' + id,
                    method: 'PUT',
                    data: {
                        Full_Name: name,
                        Date_of_Birth: date,
                        Email: email,
                        Phone: phone,
                        ID: cardID
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#alert-edit').text(response.message).css('color', 'green')
                                .show();
                            setTimeout(function() {
                                $('#alert-edit').fadeOut(function() {
                                    location.reload();
                                });
                            }, 2000);
                        } else {
                            console.log('Error status code: ', response.status);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Parse JSON response text
                        var response = JSON.parse(xhr.responseText);
                        // Lấy đối tượng message từ phản hồi JSON
                        var messages = response.message;
                        var firstErrorMessage = '';
                        $.each(messages, function(field, errors) {
                            if (errors.length > 0) {
                                firstErrorMessage += errors;
                                return false;
                            }
                        });
                        $('#alert-edit').text('Error: ' + firstErrorMessage).css('color', 'red')
                            .show();
                    }
                });
            });
        });

        // Add Customer
        $(document).ready(function() {
            $('#btn-add').on('click', function(e) {
                e.preventDefault();
                var name = $('#name-add').val();
                var date = $('#date-add').val();
                var email = $('#email-add').val();
                var phone = $('#phone-add').val();
                var id = $('#id-add').val();

                $.ajax({
                    url: apiBaseUrl + '/admin/customers',
                    method: 'POST',
                    data: {
                        Full_Name: name,
                        Date: date,
                        Email: email,
                        Phone: phone,
                        ID: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#alert-add').text(response.message).css('color', 'green')
                                .show();
                            setTimeout(function() {
                                $('#alert-add').fadeOut(function() {
                                    location.reload();
                                });
                            }, 2000);
                        } else {
                            console.log('Error status code: ', response.status);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Parse JSON response text
                        var response = JSON.parse(xhr.responseText);
                        // Lấy đối tượng message từ phản hồi JSON
                        var messages = response.message;
                        var firstErrorMessage = '';
                        $.each(messages, function(field, errors) {
                            if (errors.length > 0) {
                                firstErrorMessage += errors;
                                return false;
                            }
                        });
                        $('#alert-add').text('Error: ' + firstErrorMessage).css('color', 'red')
                            .show();
                    }
                });
            });
        });
    </script>
@stop
