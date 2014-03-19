
Stomp.WebSocketClass = SockJS;
var output;
var ws=new SockJS('http://'+window.location.hostname+':15674/stomp');
var client=Stomp.over(ws);
client.heartbeat.outgoing=0;

client.heartbeat.incoming=0;
var on_connect = function(x) {
    console.log('connected');
    id = client.subscribe("/exchange/myqueue/#",function(d){
        console.log('woohoo: '+d.body);
        var r=d.body.split("@");
        $("#"+r[0]).text(r[1]);
        sec[r[0]]=time_to_seconds(r[1]);
        
    });
};
var on_error=function(){console.log("error");};

client.connect('guest','guest',on_connect,on_error,'/');
