@extends('layouts.main')
@section('content')
    <!-- From: http://cdn.sockjs.org/ -->
    <script src="http://cdn.sockjs.org/sockjs-0.3.min.js"></script>
 
    <!-- From RabbitMQ-Web-Stomp examples -->
    <script src="{{asset('js/stomp.js')}}"></script>
 
    <!-- Our example app -->
    <script src="{{asset('js/listener-app.js')}}"></script>
    <style>
        .minisubasta{
            border:1px solid #a1a1a1; border-radius:15px;
            max-width: 32%;
            margin-left: 10px;
            margin-bottom: 10px;
        }
        .price{
            color: #00aa00;
            text-align: center;
        }
        .img-cont{
            width: 100%;
            height: 165px;
            position: relative;
        }
        .img{
            height: 100%;
            width: 100%;
            position:absolute;
            /*
            background:
                -webkit-linear-gradient(left,
                rgba(0,0,0,0.6) 0%,
                rgba(0,0,0,0) 20%,
                rgba(0,0,0,0) 80%,
                rgba(0,0,0,0.6) 100%
                );
                */
        }
        .titles:hover{
            text-decoration: none;

        }
        .titles{
            color:inherit;
        }

    </style>
    <script>
        $(document).ready(function (){

            get_time();

            $(".ofertar").click(function(e){
                e.preventDefault();
                var aucid=$(this).attr('id').substring(1);
                var aa="add_time/"+aucid;
                $.ajax({
                    type: "get",
                    url: aa
                }).complete(function(msg){
                        var r=msg.responseText.split("@");
                        console.log(msg);
                        $("#"+r[0]).text(r[1]);
                        sec[r[0]]=time_to_seconds(r[1]);
                });
            });
        });

        var sec={};

        function get_time()
        {

            $('.timee').each(function()
            {
                

                var aa="time/"+$(this).attr('id');
                $.ajax({
                    type: "get",
                    url: aa
                }).complete(function(msg){
                        var r=msg.responseText.split("@");
                        console.log("B: "+r[1]);
                        $("#"+r[0]).text(r[1]);
                        sec[r[0]]=time_to_seconds(r[1]);
                        setInterval(function(){
                            run_timers(r[0]);
                        }, 1000);
                });
            });
        }
        function run_timers(idd)
        {
            $("#"+idd).text(seconds_to_time(sec[idd]));
            sec[idd]--;
        }

        
        function seconds_to_time(totalSec)
        {
            var hours = parseInt( totalSec / 3600 ) % 24;
            var minutes = parseInt( totalSec / 60 ) % 60;
            var seconds = totalSec % 60;

            var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
            return result;
        }
        function time_to_seconds(time)
        {
            var arr=time.split(":");
            var hours = parseInt(arr[0]);
            var minutes = parseInt(arr[1]);
            var seconds = parseInt(arr[2]);

            seconds+= (hours*3600)+(minutes*60);

            return seconds;
        }
        
    </script>



    <!-- Jumbotron -->
    <div class="jumbotron">
        <h1 >Subastas 2.0</h1>
        <p class="lead">Compra objetos de lujo por precios increiblemente bajos y sin arriesgar nada!</p>
        <p><a class="btn btn-lg btn-success" href="{{URL('como-funciona')}}" role="button">Como funciona</a></p>
    </div>
    <div class="row">
    <?php
    $tam=count($auctions)>6?6:count($auctions);
    for($i=0;$i<$tam;$i++)
    {
        if($i<3)
        {
            ?>
            <div class="col-lg-4 minisubasta">
                <h2><a href="#" class="titles"><?php  echo $auctions[$i]->item->name; ?></a><span class="label label-danger pull-right timee" id="<?php  echo $auctions[$i]->id; ?>"></span></h2>
                <div class="img-cont"><img src="<?php  echo $auctions[$i]->item->image; ?>" class="img" /></div>
                <h4 class="price">
                    $
                    <?php
                        $bids=$auctions[$i]->bids;
                        if(count($bids)>0)
                        {
                            echo $bids[count($bids)-1]->value;
                        }
                        else{
                            echo 0;
                        }
                    ?>
                    COP
                </h4><hr>
                <p><a class="btn btn-success btn-lg bid ofertar" href="#" role="button" id="o<?php  echo $auctions[$i]->id; ?>">>Ofertar Ahora &raquo;</a></p>
            </div>
        <?php
        }
        elseif($i=3){
        ?>
        </div>
        <hr style="border-color: #a0a0a0">
        <div class="row">
            <div class="col-lg-4 minisubasta">
                <h2><a href="#" class="titles"><?php  echo $auctions[$i]->item->name; ?></a><span class="label label-danger pull-right timee" id="<?php  echo $auctions[$i]->id; ?>"></span></h2>
                <div class="img-cont"><img src="<?php  echo $auctions[$i]->item->image; ?>" class="img" /></div>
                <h4 class="price">
                    $
                    <?php
                    $bids=$auctions[$i]->bids;
                    if(count($bids)>0)
                    {
                        echo $bids[count($bids)-1]->value;
                    }
                    else{
                        echo 0;
                    }
                    ?>
                    COP
                </h4><hr>
                <p><a class="btn btn-success btn-lg bid ofertar" href="#" role="button" id="o<?php  echo $auctions[$i]->id; ?>">>Ofertar Ahora &raquo;</a></p>
            </div>
        <?php
        }
        else{
            ?>
            <div class="col-lg-4 minisubasta">
                <h2><a href="#" class="titles"><?php  echo $auctions[$i]->item->name; ?></a><span class="label label-danger pull-right timee" id="<?php  echo $auctions[$i]->id; ?>"></span></h2>
                <div class="img-cont"><img src="<?php  echo $auctions[$i]->item->image; ?>" class="img" /></div>
                <h4 class="price">
                    $
                    <?php
                    $bids=$auctions[$i]->bids;
                    if(count($bids)>0)
                    {
                        echo $bids[count($bids)-1]->value;
                    }
                    else{
                        echo 0;
                    }
                    ?>
                    COP
                </h4><hr>
                <p><a class="btn btn-success btn-lg bid ofertar" href="#" role="button" id="o<?php  echo $auctions[$i]->id; ?>">>Ofertar Ahora &raquo;</a></p>
            </div>
            <?php
        }
    }
    ?>
    </div>
@endsection
