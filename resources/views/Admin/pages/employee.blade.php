@extends('layouts.admin')
@section('title', 'Employees Management')

@section('content')
    <div id="alert" class="alert" style="display:none; text-align:center; font-size:large;">
    </div>

    <div style="padding-left:10%">
        <div class="table-responsive">
            <div class="table-wrapper" style="width:1300px;">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><a href="/admin/employees"><b>Employee Management</b></a></h2>
                        </div>
                        <form method="post"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            action="#">
                            <div class="input-group">
                                <input type="text" id="search" name="search"
                                    class="form-control bg-light border-0 small" spellcheck="false"
                                    placeholder="Enter name employee..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btn-search">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div style="padding-top:4px; padding-right:4px;">
                            <a href="#addObjModal" class="btn btn-success" style="font-size:medium; font-weight:bold;"
                                data-toggle="modal">Add Employee</a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-left">
                    <thead>
                        <tr>
                            <th style="width:10%">ID</th>
                            <th style="width:20%">Full Name</th>
                            <th style="width:40%">Email</th>
                            <th style="width:16%">Position</th>
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
    <!-- Add -->
    <div id="addObjModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="name-add" class="form-control" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email-add" class="form-control" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control" id="position-add">
                            <option value="EMP">EMPLOYEE</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>
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
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="edit-employee">
                    <!-- Employee Edit -->
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
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Would you like to remove this employee ?</p>
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
                        <label>Email</label>
                        <input type="email" id="email-edit" class="form-control" value="${data.Email}" spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="name-edit" class="form-control" value="${data.Full_Name}">
                    </div>                                     
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="position-edit">
                            <option value="ADMIN" ${data.Position == 'ADMIN' ? 'selected' : ''}>ADMIN</option>
                            <option value="EMP" ${data.Position == 'EMP' ? 'selected' : ''}>EMPLOYEE</option>
                        </select>          
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
                    url: apiBaseUrl + '/admin/employees/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            var element = $('#edit-employee');
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
                console.log('ID ', id);
            });
        });


        function setElementHtml(element, data) {
            var html = `
                            <tr>
                                <td>${data.Employee_ID}</td>
                                <td>${data.Full_Name}</td>
                                <td>${data.Email}</td>
                                <td>${data.Position}</td>
                                <td>
                                    <a href="#" data-target="#editObjModal" class="edit" data-toggle="modal" data-id="${data.Employee_ID}">Edit</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-target="#deleteObjModal" class="delete" data-toggle="modal" data-id="${data.Employee_ID}">Delete</a>
                                </td>
                            </tr>                     
                        `;
            element.append(html);
        }

        //Display employee list
        $(document).ready(function() {
            $.ajax({
                url: apiBaseUrl + '/admin/employees',
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

        // Search employee
        $(document).ready(function() {
            $('#btn-search').on('click', function(e) {
                e.preventDefault();
                var name = $('#search').val();
                searchEmployee(name);
            });
        });

        function searchEmployee(name) {
            $.ajax({
                url: apiBaseUrl + '/admin/employees/search',
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
                    $('#alert').text(firstErrorMessage).css('color', 'red');
                }
            });
        }

        // Delete Employee
        $(document).ready(function() {
            $('#btn-delete').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-delete').val();
                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/employees/' + id,
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
                            console.log('Error status code: ', response.status);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#alert-delete').text('Error: ' + error).show();
                        console.log('Error:', error);
                    }
                });
            });
        });

        // Edit Employee
        $(document).ready(function() {
            $('#btn-edit').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-edit').val();
                var email = $('#email-edit').val();
                var name = $('#name-edit').val();
                var position = $('#position-edit').val();

                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/employees/' + id,
                    method: 'PUT',
                    data: {
                        Email: email,
                        Full_Name: name,
                        Position: position
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
                        var messages = response.errors;
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

        // Add Employee
        $(document).ready(function() {
            $('#btn-add').on('click', function(e) {
                e.preventDefault();
                var name = $('#name-add').val();
                var email = $('#email-add').val();
                var position = $('#position-add').val();

                $.ajax({
                    url: apiBaseUrl + '/admin/employees',
                    method: 'POST',
                    data: {
                        Email: email,
                        Full_Name: name,
                        Position: position
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
                        var messages = response.errors;
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
