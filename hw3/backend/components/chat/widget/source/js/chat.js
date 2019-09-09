let coon;
let chat = {
    coon: null,
    send: function (mess) {
        this.coon.send(mess);
    }
};

$(document).ready(function () {
        chat.coon = new WebSocket('ws://10.63.0.240:8123');
        chat.coon.onopen = function (e) {
            console.log('open connection');
        };

        chat.coon.onmessage = function (e) {
            let $el = $('li.messages-menu ul.menu li:first').clone();
            $el.find('p').text(e.data);
            $el.find('h4').text('Websocket user');
            $el.prependTo('li.messages-menu ul.menu');

            let cnt = $('li.messages-menu ul.menu li').length;
            $('li.messages-menu span.label-success').text(cnt);
            $('li.messages-menu li.header').text('You have ' + cnt + ' messages');
        }
    }
);