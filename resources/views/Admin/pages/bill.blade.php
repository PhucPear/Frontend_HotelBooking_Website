@extends('layouts.admin')
@section('title', 'Bill Management')

@section('content')
    <div id="alert" class="alert" style="display:none; text-align:center; font-size:large;">
    </div>

    <div style="padding-left:1%">
        <div class="table-responsive">
            <div class="table-wrapper" style="width:1600px;">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><a href="/admin/bills"><b>Bill Management</b></a></h2>
                        </div>
                        <form method="post"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            action="#">
                            <div class="input-group">
                                <input type="number" id="search" name="search"
                                    class="form-control bg-light border-0 small" spellcheck="false"
                                    placeholder="Enter id bill..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btn-search">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <table class="table table-striped table-hover text-left">
                    <thead>
                        <tr>
                            <th style="width:10%">ID</th>
                            <th style="width:16%">Date</th>
                            <th style="width:12%">Amount</th>
                            <th style="width:12%">Payments</th>
                            <th style="width:10%">Employee</th>
                            <th style="width:10%">Customer</th>
                            <th style="width:16%">Status</th>
                            <th style="width:14%">Task</th>
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
    <!-- Details  -->
    <div id="detailsObjModal" class="modal fade">
        <div class="modal-dialog" style="display:grid; justify-content:center;">
            <div class="modal-content" style="width:1000px">
                <div class="modal-header">
                    <h4 class="modal-title">Details Bill</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover text-left">
                        <thead>
                            <tr>
                                <th style="width:12%">Bill ID</th>
                                <th style="width:10%">Order</th>
                                <th style="width:12%">Room ID</th>
                                <th style="width:25%">Check in Date</th>
                                <th style="width:25%">Check out Date</th>
                                <th style="width:16%">Task</th>
                            </tr>
                        </thead>
                        <tbody id="content-details">

                            <!-- Content -->

                        </tbody>
                    </table>
                    <div id="alert-add" class="alert" style="display:none;"></div>
                    <input type="hidden" id="id-details-bill" />
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
                    <h4 class="modal-title">Edit Bill</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="edit-bill">
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
                    <h4 class="modal-title">Delete Bill</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Would you like to remove this bill ?</p>
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

    <!-- Edit Details -->
    <div id="edit-details" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Edit Details Bill</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="edit-details-bill">
                    <!-- Details Bill Edit -->
                </div>
                <input type="hidden" id="id-edit-details" />
                <div class="modal-footer">
                    <input type="button" class="btn btn-facebook" data-dismiss="modal" value="Cancel">
                    <input type="button" id="btn-edit" class="btn btn-info" value="Save">
                </div>

            </div>
        </div>
    </div>

    <!-- Delete Details Bill -->
    <div id="delete-details" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="width:440px">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Details Bill</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Would you like to remove this details bill ?</p>
                    <div id="alert-delete-details" class="alert" style="display:none;">
                    </div>
                    <input type="hidden" id="id-delete-details" />
                    <div class="modal-footer">
                        <input type="button" class="btn btn-facebook" data-dismiss="modal" value="Cancel">
                        <input type="button" id="btn-delete-details" class="btn btn-danger" value="Delete">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        var apiBaseUrl = "{{ config('app.api_base_url') }}";
        // Show information bill
        function showInformationEdit(element, data) {
            var html = `
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" id="amount-edit" class="form-control" value="${data.Amount}">
                    </div>
                    <div class="form-group">
                        <label>Payments</label>
                        <input type="text" id="payments-edit" value="${data.Payments}" class="form-control" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Employee</label>
                        <select class="form-control" id="employee-edit">
                            <!-- Employee -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" id="status-edit" class="form-control" value="${data.Status}" spellcheck="false">
                    </div>                    
                    <div id="alert-edit" class="alert" style="display:none;"></div>    
                        `;
            element.append(html);
            var id = data.Employee_ID;
            fetchEmployee(id);
        }

        $(document).ready(function() {
            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $('#id-edit').val(id);
                console.log('ID ', id);
                // Show information edit
                $.ajax({
                    url: apiBaseUrl + '/admin/bills/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            var element = $('#edit-bill');
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

        function setEmployeeElementHtml(element, data, id) {
            var html = `
                        <option value="${data.Employee_ID}" ${data.Employee_ID == id ? 'selected' : ''}>${data.Full_Name}</option>             
                        `;
            element.append(html);
        }

        //Display edit Employee list
        function fetchEmployee(id) {
            $.ajax({
                url: apiBaseUrl + '/admin/employees',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === true) {
                        var element = $('#employee-edit');
                        element.empty();

                        $.each(response.data, function(index, roomType) {
                            setEmployeeElementHtml(element, roomType, id);
                        });
                    } else {
                        console.error('Error status code: ', response.status);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error: ', error);
                }
            });
        }

        $(document).ready(function() {
            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                $('#id-delete').val(id);
                var element = $('#alert-delete');
                element.hide();
                console.log('ID ', id);
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.details', function() {
                var id = $(this).data('id');
                $('#id-details-bill').val(id);
                console.log('ID ', id);
            });
        });   

        $(document).ready(function() {
            $(document).on('click', '.details-delete', function() {
                var id = $('#id-details-bill').val();
                console.log('ID Details: ', id);

                var order = $(this).data('id');
                $('#id-delete-details').val(id);
                console.log('Order: ', order);

                var element = $('#alert-delete-details');
                element.hide();
            });
        });

        function setElementHtml(element, data) {
            var html = `
                            <tr>
                                <td>${data.Bill_ID}</td>
                                <td>${data.Date}</td>
                                <td>${data.Amount}</td>
                                <td>${data.Payments}</td>
                                <td>${data.Employee_ID}</td>
                                <td>${data.Customer_ID}</td>
                                <td>${data.Status}</td>
                                <td>
                                    <a href="#" data-target="#detailsObjModal" class="details" data-toggle="modal" data-id="${data.Bill_ID}">Details</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-target="#editObjModal" class="edit" data-toggle="modal" data-id="${data.Bill_ID}">Edit</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-target="#deleteObjModal" class="delete" data-toggle="modal" data-id="${data.Bill_ID}">Delete</a>
                                </td>
                            </tr>                     
                        `;
            element.append(html);
        }

        //Display bill list
        $(document).ready(function() {
            $.ajax({
                url: apiBaseUrl + '/admin/bills',
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

        function setDetailsBillElementHtml(element, data) {
            var html = `
                            <tr>                               
                                <td>${data.Bill_ID}</td>
                                <td>${data.Order}</td>
                                <td>${data.Room_ID}</td>
                                <td>${data.Check_in_Date}</td>
                                <td>${data.Check_out_Date}</td>
                                <td>
                                    <a href="#" data-target="#edit-details" style="color:#FFC107" class="details-edit" data-toggle="modal" data-id="${data.Order}">Edit</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-target="#delete-details" style="color:#F44336" class="details-delete" data-toggle="modal" data-id="${data.Order}">Delete</a>
                                </td>
                            </tr>                     
                        `;
            element.append(html);
        }

        //Display details bill list
        $(document).ready(function() {
            $(document).on('click', '.details', function() {
                var id = $(this).data('id');
                $('#id-details-bill').val(id);

                $.ajax({
                    url: apiBaseUrl + '/admin/bills/getDetailsBill/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            var element = $('#content-details');
                            element.empty();

                            $.each(response.data, function(index, data) {
                                setDetailsBillElementHtml(element, data);
                            });
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

        // Search Bill
        $(document).ready(function() {
            $('#btn-search').on('click', function(e) {
                e.preventDefault();
                var id = $('#search').val();
                searchBill(id);
            });
        });

        function searchBill(id) {
            $.ajax({
                url: apiBaseUrl + '/admin/bills/search',
                method: 'GET',
                data: {
                    id: id
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

        // Delete Bill
        $(document).ready(function() {
            $('#btn-delete').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-delete').val();
                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/bills/' + id,
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

        // Edit Bill
        $(document).ready(function() {
            $('#btn-edit').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-edit').val();
                var amount = $('#amount-edit').val();
                var payments = $('#payments-edit').val();
                var employee = $('#employee-edit').val();
                var status = $('#status-edit').val();

                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/bills/' + id,
                    method: 'PUT',
                    data: {
                        Amount: amount,
                        Payments: payments,
                        Employee_ID: employee,
                        Status: status
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

        // Delete Details Bill
        $(document).ready(function() {
            $('#btn-delete-details').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-details-bill').val();                    
                var order = $('#id-delete-details').val();

                $.ajax({
                    url: apiBaseUrl + '/admin/details-bills/delete-details-bill',
                    method: 'POST',
                    data: {
                        id: id,
                        order: order                      
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            $('#alert-delete-details').text(response.message).css('color', 'green')
                                .show();
                            setTimeout(function() {
                                $('#alert-delete-details').fadeOut(function() {
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
                        $('#alert-delete-details').text('Error: ' + messages).css('color', 'red')
                            .show();
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>
@stop
