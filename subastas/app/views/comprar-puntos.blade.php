@extends('layouts.main')
@section('content')

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
        height: 100%;width: auto;position:absolute;margin-left: 70px;
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
    h4{
        text-align: center;
    }

</style>

<br><br>
<div class="jumbotron">
    <h1 >Comprar Puntos</h1>
    <p class="lead">Compra puntos para bla bla bla!!! Wooohoooo!!!</p>

</div>
<br><br>
<!-- Example row of columns -->
<div class="row">
    <div class="col-lg-4 minisubasta">
        <h4>$5,000 COP</h2>
        <div class="img-cont"><img src="{{asset('img/auction_hammer2.png')}}" class="img" /></div>
        <h2 class="price">50 Puntos</h4><hr>
        <input style="width: 150px; height: auto" type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" id="subm" alt="Make payments with PayPal - it's fast, free and secure!">
        <br><br>
    </div>
    <div class="col-lg-4 minisubasta">
        <h4>$15,000 COP</h2>
            <div class="img-cont"><img src="{{asset('img/auction_hammer3.png')}}" class="img" /></div>
            <h2 class="price">150 Puntos</h4><hr>
        <input style="width: 150px; height: auto" type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" id="subm" alt="Make payments with PayPal - it's fast, free and secure!">
        <br><br>
    </div>
    <div class="col-lg-4 minisubasta">
        <h4>$50,000 COP</h2>
            <div class="img-cont"><img src="{{asset('img/auction_hammer4.png')}}" class="img" /></div>
            <h2 class="price">500 Puntos</h4><hr>
        <input style="width: 150px; height: auto" type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" id="subm" alt="Make payments with PayPal - it's fast, free and secure!">
        <br><br>
    </div>
</div>


@endsection
