<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('1be904462b8fc1e25e70', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('form-submitted', function (data) {
            // alert(JSON.stringify(data));
            if (data.room_chat === $('#room_id').val() && data.to === $('#user_id').val()) {
                // code for notification put in this
                $(".pesan").prepend(`<span> ${data.from} - ${data.pesan} </span>`)
            }
        });
    </script>
</head>
<body>
<div class="container">

    <div>{{$to->nama}}</div>
    @foreach($pesan as $p)
        {{$p->from}} - {{$p->pesan}} </br>
    @endforeach
    <div class="pesan"></div>
    <div>
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
        <input type="hidden" name="room_id" id="room_id" value="{{$room->id}}">
        <input name="chat" id="chat" type="text">
        <input type="button" class="kirim" value="send">
    </div>
</div>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script>
    $(".kirim").on("click", () => {
        sendRequest();
    });

    $("#chat").on('keypress',function(e) {
        if(e.which === 13) {
            sendRequest();
        }
    });

    let sendRequest = () => {
        $.ajax({
            type: 'POST',
            url: '/sender',
            data: {
                '_token': $('input[name=_token]').val(),
                'chat': $("#chat").val(),
                'user_id': $("#user_id").val(),
                'room_id': $("#room_id").val()
            },
            success: function (data) {
                $("#chat").val("");
                $(".pesan").prepend(`<span> ${data.from} - ${data.pesan} </span>`);
                console.log(data);
            }
        });
    }
</script>
</body>
</html>
