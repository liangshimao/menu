
//var sServer = 'ws://127.0.0.1:9520';
var websocket = new WebSocket(sServer);
websocket.onclose = function (evt) {
    console.log("Disconnected");
};

//监听连接打开
websocket.onopen = function (evt) {
    var data = '{"type":"newBackend"}';
    websocket.send(data);
};
//监听
websocket.onmessage = function (evt) {
    var data = JSON.parse(evt.data);
    switch(data.type) {
        case "newOrder":
            newOrder(data);
            break;
    }
};

//有新的订单了.
function newOrder(data)
{
    
}
