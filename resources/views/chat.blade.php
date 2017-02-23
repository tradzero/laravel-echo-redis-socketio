<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>chat</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
    <div class="app">
        <div class="panel panel-primary">
            <div class="panel-heading">chatbox</div>
            <div class="panel-body">

            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type Message ...">
                    <div class="input-group-addon">
                        <button type="button" class="btn btn-info btn-xs">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.Laravel = {
            'csrfToken': '{{ csrf_field() }}',
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
                    console.log(e);
                });
        }
    </script>
</body>
</html>