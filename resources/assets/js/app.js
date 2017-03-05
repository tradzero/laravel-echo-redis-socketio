require('./bootstrap');

app = new Vue({
    el: '#app',
    data: {
        msg: '',
        messageArray: [],
    },
    methods: {
        sendMsg: function () {
            var self = this;
            if (this.msg) {
                axios.post('chat',{
                    message: this.msg,
                }).then(function (response) {
                    if (response.data.result == 'ok') {
                        self.pushMsg(self.msg);
                        self.msg = '';
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            }else{
                alert('type something...');
            }
        },
        pushMsg: function (msg) {
            this.messageArray.push({
                self: msg,
            });
        },
        listenMsg: function (msg) {
            this.messageArray.push({
                other: msg,
            });
        }
    }
});