@extends('layouts.admin')
@section('title', 'Room Management')

@section('content')
    <div id="alert" class="alert" style="display:none; text-align:center; font-size:large;">
    </div>

    <div style="padding-left:10%">
        <div class="table-responsive">
            <div class="table-wrapper" style="width:1300px;">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><a href="/admin/rooms"><b>Room Management</b></a></h2>
                        </div>
                        <form method="post"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            action="#">
                            <div class="input-group">
                                <input type="number" id="search" name="search"
                                    class="form-control bg-light border-0 small" spellcheck="false"
                                    placeholder="Enter id room..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btn-search">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div style="padding-top:4px; padding-right:4px;">
                            <a href="#addEmployeeModal" class="btn btn-success" style="font-size:medium; font-weight:bold;"
                                data-toggle="modal">Add Room</a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-left">
                    <thead>
                        <tr>
                            <th style="width:16%">ID</th>
                            <th style="width:30%">Room Type</th>
                            <th style="width:14%">Status</th>
                            <th style="width:26%">Image</th>
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
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog" style="display:grid; justify-content:center;">
            <div class="modal-content" style="width:500px">
                <div class="modal-header">
                    <h4 class="modal-title">Add Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Room Type</label>
                        <select class="form-control" id="room-type-add">
                            <!-- Room Type -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="status-add">
                            <option value="Empty">Empty</option>
                            <option value="Full">Full</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" id="image-add" class="form-control" accept="image/*">
                        <div id="image-preview" style="margin-top: 10px;">
                            <img id="image-display" src="" alt="Selected Image"
                                style="display: none; max-width: 436px;" />
                        </div>
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
                <div class="modal-body" id="edit-room">
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
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Delete Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Would you like to remove this room ?</p>
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
                        <label>Room Type</label>
                        <select class="form-control" id="room-type-edit">
                            <!-- Room Type -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="status-edit">
                             <option value="Empty" ${data.Status == 'Empty' ? 'selected' : ''}>Empty</option>
                             <option value="Full" ${data.Status == 'Full' ? 'selected' : ''}>Full</option>                          
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" id="image-edit" class="form-control" accept="image/*">
                        <div style="margin-top: 10px;">
                            <img id="current-image-edit" src="" alt="Selected Image"
                                style="display: none; max-width: 436px;" />
                        </div>
                    </div>                                                                     
                    <div id="alert-edit" class="alert" style="display:none;"></div>    
                        `;
            element.append(html);
            var id = data.Type_ID;
            fetchRoomTypes(id);
            var image = data.Image;
            var baseUrl = "{{ asset('assets/user/img/room') }}";
            var imageUrl = baseUrl + '/' + image;
            $('#current-image-edit').attr('src', imageUrl).show();;
        }

        $(document).ready(function() {
            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $('#id-edit').val(id);
                console.log('ID ', id);
                // Show information edit
                $.ajax({
                    url: apiBaseUrl + '/admin/rooms/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            var element = $('#edit-room');
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
                                <td>${data.id}</td>
                                <td>${data.name}</td>                             
                                <td>${data.status}</td>
                                <td><img src="{{ asset('assets/user/img/room/${data.image}') }}" alt="Room Image" class="mr-3" width="160" height="80"></td>
                                <td>
                                    <a href="#" data-target="#editEmployeeModal" class="edit" data-toggle="modal" data-id="${data.id}">Edit</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-target="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="${data.id}">Delete</a>
                                </td>
                            </tr>                     
                        `;
            element.append(html);
        }

        //Display room list
        $(document).ready(function() {
            $.ajax({
                url: apiBaseUrl + '/admin/rooms',
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
                var id = $('#search').val();
                searchRoom(id);
            });
        });

        function searchRoom(id) {
            $.ajax({
                url: apiBaseUrl + '/admin/rooms/search',
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

        // Delete Room
        $(document).ready(function() {
            $('#btn-delete').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-delete').val();
                console.log('ID: ', id);
                $.ajax({
                    url: apiBaseUrl + '/admin/rooms/' + id,
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
                        $('#alert-delete').text('Error: ' + error).css('color', 'red').show();
                        console.log('Error:', error);
                    }
                });
            });
        });

        // Edit Room
        $(document).ready(function() {
            $('#btn-edit').on('click', function(e) {
                e.preventDefault();
                var id = $('#id-edit').val();
                var type = $('#room-type-edit').val();
                var status = $('#status-edit').val();
                var image = $('#image-edit')[0].files[0].name;

                console.log('ID: ', id);
                console.log('Status: ', status);
                $.ajax({
                    url: apiBaseUrl + '/admin/rooms/' + id,
                    method: 'PUT',
                    data: {
                        Type: type,
                        Status: status,
                        Image: image
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

        // Add Room
        $(document).ready(function() {
            $('#btn-add').on('click', function(e) {
                e.preventDefault();
                var type = $('#room-type-add').val();
                var status = $('#status-add').val();
                var image = $('#image-add')[0].files[0].name;
                console.log('Image: ', image);
                $.ajax({
                    url: apiBaseUrl + '/admin/rooms',
                    method: 'POST',
                    data: {
                        Type: type,
                        Status: status,
                        Image: image
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

        // Display room type
        function setRoomTypeElementHtml(element, data) {
            var html = `
                        <option value="${data.Type_ID}">Name: ${data.Name} | Price: ${data.Price} | Capacity: ${data.Capacity}</option>             
                        `;
            element.append(html);
        }

        function setRoomTypeElementHtml(element, data, id) {
            var html = `
                        <option value="${data.Type_ID}" ${data.Type_ID == id ? 'selected' : ''}>Name: ${data.Name} | Price: ${data.Price} | Capacity: ${data.Capacity}</option>             
                        `;
            element.append(html);
        }

        //Display add room type list
        $(document).ready(function() {
            $.ajax({
                url: apiBaseUrl + '/admin/room-types',
                method: 'GET',
                dataType: 'json',
                success: function(data, textStatus, xhr) {
                    if (xhr.status === 200) {
                        var element = $('#room-type-add');
                        element.empty();

                        $.each(data.data, function(index, data) {
                            setRoomTypeElementHtml(element, data);
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

        //Display edit room type list
        function fetchRoomTypes(id) {
            $.ajax({
                url: apiBaseUrl + '/admin/room-types',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === true) {
                        var element = $('#room-type-edit');
                        element.empty();

                        $.each(response.data, function(index, roomType) {
                            setRoomTypeElementHtml(element, roomType, id);
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



        document.getElementById('image-add').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Hiển thị hình ảnh
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageDisplay = document.getElementById('image-display');
                    imageDisplay.src = e.target.result;
                    imageDisplay.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@stop
