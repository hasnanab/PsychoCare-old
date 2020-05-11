<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('1be904462b8fc1e25e70', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</head>
<body>
<h1>Pusher Test</h1>
<p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
</p>
<form action="/sendMessage" method="post">
    @csrf
    <div class="input-group">
        <input type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
    </div>
    <input type="submit" value="SEND" class="btn btn-success"/>
</form>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        }
    }
</script>

{{--<script>--}}
{{--    export default {--}}
{{--        props: ['messages']--}}
{{--    };--}}
{{--</script>--}}
</body>
