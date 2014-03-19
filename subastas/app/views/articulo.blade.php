@extends('layouts.main')
@section('content')
<style>
    .image-cont{
        height: 350px;
        width: 100%;
        position: relative;

        border:1px solid #a1a1a1;
        border-top-left-radius:8px;
        border-top-right-radius:8px;
        background-image: url("{{asset('img/ipad-mini.jpg')}}");
        /*
        background: -moz-linear-gradient(top right, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 40%, rgba(255, 255, 255, 0.98) 100%), url("{{asset('img/party.png')}}") no-repeat;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(40%,rgba(0,0,0,0)), color-stop(100%, rgb(253, 253, 253))), url("{{asset('img/party.png')}}") no-repeat;
        background: -webkit-linear-gradient(top right, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%, rgb(250, 250, 250) 100%), url("{{asset('img/party.png')}}") no-repeat;
        background: -o-linear-gradient(top right, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%, rgb(248, 248, 248) 100%), url("{{asset('img/party.png')}}") no-repeat;
        background: -ms-linear-gradient(top right, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%, rgb(250, 250, 250) 100%), url("{{asset('img/party.png')}}") no-repeat;
        background: linear-gradient(to bottom left, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 40%, rgb(251, 251, 251) 100%), url("{{asset('img/party.png')}}") no-repeat;
        */

    }
    .item-name{
        text-align:center ;
        font-size: 60px;
        color: #272727;
        text-shadow:1px 1px #716d73;
        font-weight: bold;
        margin-left: -10px;
    }
    .alldata{
        width: 100%;
        height: 600px;
        border:1px solid #a1a1a1;
        border-bottom-left-radius:8px;
        border-bottom-right-radius:8px;
    }
    .table-cont{
        width: 300px;
        margin-right: auto;
        margin-left: auto;
        margin-top: 20px;
    }
    .info-container{
        width: 750px;
        margin-left: 30px;
        margin-top: 40px;
        font-size: 25px
    }
    .tab-container{
        width: 100%; height: 100px
    }
    a{
        color: #0d0d0d;
        text-decoration: none;
    }
    .tab-info-container{
        max-width: 80%; margin-left: auto;margin-right: auto;
    }
    .inv{
        visibility: hidden;
    }

</style>

<div class="image-cont">
</div>

<div class="alldata">
    <div><h1 class="item-name">iPad Mini 2
        <span class="pull-right" style="margin-right: 35px; margin-left: 35px; color: red">
        00:00:12
        </span>
            <a  href="#">
                <span class="label label-success pull-right">
                    Ofertar &raquo;
                </span>
            </a>
        </h1>
    </div>
    <div class="table-cont pull-right">
        <h2   style="margin-left: 80px; margin-top: -15px"><span class="label label-success"><span class="glyphicon glyphicon-star"></span> Mark</span></h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody>
            <tr style="">
                <td>1</td>
                <td>Mark</td>
                <td>Hace 5 segunto(s)</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Hace 10 segunto(s)</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Larry</td>
                <td>Hace 15 segunto(s)</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Larry</td>
                <td>Hace 25 segunto(s)</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Larry</td>
                <td>Hace 40 segunto(s)</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Larry</td>
                <td>Hace 1 minuto(s)</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Larry</td>
                <td>Hace 1 minuto(s)</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Larry</td>
                <td>Hace 1 minuto(s)</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Larry</td>
                <td>Hace 2 minuto(s)</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Larry</td>
                <td>Hace 2 minuto(s)</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="info-container">
        <div class="tab-container" >
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#home" data-toggle="tab">General</a></li>
                <li><a href="#profile" data-toggle="tab">Descripcion</a></li>
                <li><a href="#messages" data-toggle="tab">Comprar</a></li>
            </ul>
        </div>

        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <div class="tab-info-container">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Estado</td>
                            <td>
                                <span class="label label-success ">
                                    Activo
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Numero de Ofertas</td>
                            <td>
                                <span class="label label-danger ">
                                    Menor al promedio
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="tab-pane fade" id="profile">
                <div class="tab-info-container">
                    <p>Lorem Ipsum este texto tiene formato eso quiere decir que puede haber titulos </p><h2>Como este</h2><p> Y muchas mas coasas xD</p>
                    <p style="text-align: center"> O puede estar centrado!</p>
                </div>
            </div>
            <div class="tab-pane fade" id="messages">
                <div class="tab-info-container">
                    <h2 style="text-align: center">Comprar iPad Mini 2 Nuevo</h2>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Puntos Invertidos</td>
                            <td>
                                <span class="label label-success ">
                                    250
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Descuento</td>
                            <td>
                                <span class="label label-success ">
                                    $250,000 COP
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Precio Final</td>
                            <td>
                                <span class="label label-success ">
                                    $750,000 COP
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <form name="_xclick" method="post" style="margin-left: 337px">
                        <input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" id="subm" alt="Make payments with PayPal - it's fast, free and secure!">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

