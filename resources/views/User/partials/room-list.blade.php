<div class="col-md-12" id="room-list">

</div>

<script>
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
    // Display room list
    $(document).ready(function() {
        $.ajax({
            url: 'http://backendhotelmanager.test:8080/api/user/rooms',
            method: 'GET',
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
                    $('#error-message').text('Error status code: ' + xhr.status).show();
                }
            },
            error: function(xhr, status, error) {
                $('#error-message').text('Error: ' + error).show();
            }
        });
    });
</script>
