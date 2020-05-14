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
    <div clas="input-group">
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }
    </style>
</head>
<body>

<h2>Chat Messages</h2>

<div class="container">
{{--    <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">--}}
    <p>Hello. How are you today?</p>
    <span class="time-right">11:00</span>
</div>

<div class="container darker">
{{--    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">--}}
    <p>Hey! I'm fine. Thanks for asking!</p>
    <span class="time-left">11:01</span>
</div>

<div class="container">
{{--    <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">--}}
    <p>Sweet! So, what do you wanna do today?</p>
    <span class="time-right">11:02</span>
</div>

<div class="container darker">
{{--    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">--}}
    <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
    <span class="time-left">11:05</span>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
