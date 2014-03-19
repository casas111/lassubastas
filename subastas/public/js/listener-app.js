
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
        if(r[0]=="done")
        {
        	if(r[3]=="winnerqwe")
        	{
        		$("#"+r[1]).text("00:00:00");
        		alert("Felicitaciones! Has ganado un "+r[2]);
        	}
        	else
        	{
        		$("#"+r[1]).text("00:00:00");
        		//TODO no se q hacer aca
        	}
        }
        else
        {
        	$("#"+r[0]).text(r[1]);
	        sec[r[0]]=time_to_seconds(r[1]);
	        $("#price"+r[0]).text(r[2]);
	        $("#winner"+r[0]).text(r[3]);
        }

    });
};
var on_error=function(){console.log("error");};

client.connect('guest','guest',on_connect,on_error,'/');
