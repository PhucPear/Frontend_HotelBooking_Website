@extends('layouts.admin')
@section('title', 'Room Type Management')

@section('content')
    <div id="alert" class="alert" style="display:none; text-align:center; font-size:large;">
    </div>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper" style="width:1000px;">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><a href="/admin/room-types"><b>Room Type Management</b></a></h2>
                        </div>
                        <form method="post"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            action="#">
                            <div class="input-group">
                                <input type="text" id="search" name="search"
                                    class="form-control bg-light border-0 small" spellcheck="false"
                                    placeholder="Enter name room type..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btn-search">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div style="padding-top:4px; padding-right:4px;">
                            <a href="#addEmployeeModal" class="btn btn-success" style="font-size:medium; font-weight:bold;"
                                data-toggle="modal">Add Room Type</a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-left">
                    <thead>
                        <tr>
                            <th style="width:16%">ID</th>
                            <th style="width:30%">Name</th>
                            <th style="width:20%">Price</th>
                            <th style="width:18%">Capacity</th>
                            <th style="width:16%">Task</th>
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
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog" style="display:grid; justify-content:center;">
            <div class="modal-content" style="width:500px">
                <div class="modal-header">
                    <h4 class="modal-title">Add Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name-add" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" id="price-add" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" id="capacity-add" class="form-control">
                    </div>
                    <div id="alert-add" class="alert text-center" style="display:none;"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-facebook" data-dismiss="modal" value="Cancel">
                    <input type="button" id="btn-add" class="btn btn-success" value="Add">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog" style="display:grid; justify-content:center;">
            <div class="modal-content" style="width:500px">

                <div class="modal-header">
                    <h4 class="modal-title">Edit Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="edit-room-type">
                    <!-- Room Edit -->
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
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="width:440px">

                <div class="modal-header">
                    <h4 class="modal-title">Delete Room Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Would you like to remove this room type ?</p>
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
        // Show information edit room
        function showInformationEdit(element, data) {
            var html = `
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name-edit" class="form-control" value="${data.Name}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" id="price-edit" class="form-control" value="${data.Price}">
                    </div>
                    <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" id="capacity-edit" class="form-control" value="${data.Capacity}">
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
                    url: apiBaseUrl + '/admin/room-types/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            var element = $('#edit-room-type');
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
                                <td>${data.Type_ID}</td>
                                <td>${data.Name}</td>                             
                                <td>$${data.Price}</td>
                                <td>${data.Capacity}</td>
                                <td>
                                    <a href="#" data-target="#editEmployeeModal" class="edit" data-toggle="modal" data-id="${data.Type_ID}">Edit</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-target="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="${data.Type_ID}">Delete</a>
                                </td>
                            </tr>                     
                        `;
            element.append(html);
        }

        //Display room list
        $(document).ready(function() {
            $.ajax({
                url: apiBaseUrl + '/admin/room-types',
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

        // Search room
        $(document).ready(function() {
            $('#btn-search').on('click', function(e) {
                e.preventDefault();
                var name = $('#search').val();
                searchRoomType(name);
            });
        });

        function searchRoomType(name) {
            $.ajax({
                url: apiBaseUrl + '/admin/room-types/search',
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
                        $('#alert').text('Error status code: ' + xhr.status).css('color', 'red').show();
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
                    $('#alert').text(firstErrorMessage).css('color', 'red').show();
                }
            });
        }

        // Delete Room Type
        $(document).ready(function() {
            $('#btn-delete').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-delete').val();
                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/room-types/' + id,
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
                        var response = JSON.parse(xhr.responseText);
                        var messages = response.message;
                        $('#alert-delete').text('Error: ' + messages).css('color', 'red')
                    .show();
                        console.log('Error:', error);
                    }
                });
            });
        });

        // Edit Room Type
        $(document).ready(function() {
            $('#btn-edit').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-edit').val();
                var name = $('#name-edit').val();
                var price = $('#price-edit').val();
                var capacity = $('#capacity-edit').val();

                $.ajax({
                    url: apiBaseUrl + '/admin/room-types/' + id,
                    method: 'PUT',
                    data: {
                        Name: name,
                        Price: price,
                        Capacity: capacity
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
                        $('#alert-edit').text('Error: ' + firstErrorMessage).css('color', 'red').show();
                    }
                });
            });
        });

        // Add Room Type
        $(document).ready(function() {
            $('#btn-add').on('click', function(e) {
                e.preventDefault();
                var name = $('#name-add').val();
                var price = $('#price-add').val();
                var capacity = $('#capacity-add').val();

                $.ajax({
                    url: apiBaseUrl + '/admin/room-types',
                    method: 'POST',
                    data: {
                        Name: name,
                        Price: price,
                        Capacity: capacity
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
