<div id="search">
    <div class="container">
        <div class="form-row">
            <div class="control-group col-md-3">
                <label>Check-In</label>
                <div class="form-group">
                    <div class="input-group date" id="date-3" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#date-3" />
                        <div class="input-group-append" data-target="#date-3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group col-md-3">
                <label>Check-Out</label>
                <div class="form-group">
                    <div class="input-group date" id="date-4" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#date-4" />
                        <div class="input-group-append" data-target="#date-4" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group col-md-3">
                <div class="form-row">
                    <div class="control-group col-md-6">
                        <label>People</label>
                        <select class="custom-select">
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="control-group col-md-3">
                <button class="btn btn-block" id="search-button">Search</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#search-button').on('click', function(e) {
            e.preventDefault();

            var capacity = $('.custom-select').val();

            console.log('Capacity:', capacity);

            searchRooms(capacity);
        });
    });

    function setElementHtml(id, data) {
        var roomElement = id;
        var roomHtml = `
                             <div class="row">
                    <div class="col-md-3">
                        <div class="room-img">
                            <div class="box12">
                                <img src="assets/user/img/room/${data.image}">
                                <div class="box-content">
                                    <h3 class="title">${data.name}</h3>
                                    <ul class="icon">
                                        <li><a href="#" data-toggle="modal" data-target="#modal-id"><i class="fa fa-link"></i></a></li>
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
                            <a href="/booking?roomID=${data.id}">Book Now</a>
                        </div>
                    </div>
                </div>
                    <hr>
                        `;
        roomElement.append(roomHtml);
    }

    function searchRooms(capacity) {
        $.ajax({
            url: 'http://backendhotelmanager.test:8080/api/user/search',
            method: 'GET',
            data: {
                capacity: capacity
            },
            dataType: 'json',
            success: function(data, textStatus, xhr) {
                if (xhr.status === 200) {
                    var roomElement = $('#room-list');
                    roomElement.empty();

                    $.each(data.data, function(index, room) {
                        console.log('Rooms:', room);
                        setElementHtml(roomElement, room);
                    });
                } else {
                    console.log('Error status code:', xhr.status);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }
</script>
