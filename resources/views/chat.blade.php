<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>chat</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <style>
        .right > .direct-chat-text {
            background: #3c8dbc;
            border-color: #3c8dbc;
            color: #fff;
        }
        .direct-chat-text {
            border-radius: 5px;
            position: relative;
            padding: 5px 10px;
            background: #d2d6de;
            border: 1px solid #d2d6de;
            margin-top: 5px;
            color: #444;
        }
        .direct-chat-text {
            display: block;
        }
        .direct-chat-text:after, .direct-chat-text:before {
            position: absolute;
            right: 100%;
            top: 15px;
            border: solid transparent;
            border-right-color: #d2d6de;
            content: ' ';
            height: 0;
            width: 0;
            pointer-events: none;
        }
        .right > .direct-chat-text:after,
        .right > .direct-chat-text:before {
            right: auto;
            left: 100%;
            border-right-color: transparent;
            border-left-color: #3c8dbc;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">chatbox</div>
                    <div class="panel-body">
                        <template v-for="message in messageArray">
                            <div class="msg" v-if="message.self">
                                <div class="direct-chat-text">@{{ message.self }}</div>
                            </div>
                            <div class="msg right" v-if="message.other">
                                <div class="direct-chat-text">@{{ message.other }}</div>
                            </div>
                        </template>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input type="text" class="form-control" v-model="msg" placeholder="Type Message ...">
                            <div class="input-group-addon">
                                <button type="button" @click="sendMsg" class="btn btn-info btn-xs">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
    <script>
        window.Laravel = {
            'csrfToken': '{{ csrf_token() }}',
        };
    </script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="{{ asset('/js/echo.js') }}"></script>
    <script>
        if(typeof io === "undefined"){
            alert('please check your laravel-echo-server status!');
        }else{
            Echo.channel('everyone')
                .listen('SendMsgEvent', function (e) {
                    if (e.msg) {
                        app.listenMsg(e.msg);
                    }
                });
        }
    </script>
</body>
</html>