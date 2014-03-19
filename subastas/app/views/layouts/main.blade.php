<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <style>
        .form-container{
            width: 500px;
            margin-right: auto;
            margin-left: auto;
            font-size: 30px;
            margin-top: 60px;
        }
        .hammer{
            width: 50px;
            height: auto;
            margin-left: -5px;
        }
        .puntos-con{
            position: absolute;
            right: 10px;
        }
        .bb{
            background-image:url('{{asset("img/bg.jpg")}}');
        }
        .container{
            background-color: #fafafa;
        }
        .welcome{
            font-size: 25px;
            color: #626666;
        }
        nav{
            font-size: 20px;
        }

    </style>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <script>
        
    </script>

</head>
<body class="bb" >


<div class="container">


    <br>
    <?php
    if (Auth::check())
    {
    ?>
    <div style="position:relative; height: 80px "><div class="puntos-con"><h4><span class="welcome"><?php echo Auth::user()->name; ?></span> | Puntos: <img src="{{asset('img/auction_hammer.png')}}" class="hammer">
        <span id="user_poinsss"> <?php echo Auth::user()->points; ?></span></h4></div></div>
    <?php
    }else{echo '<br>';}
    ?>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL('inicio')}}">Subastas</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php
                    if (Request::is('/') || Request::is('inicio'))
                    {
                        echo 'class="active"';
                    }
                    ?>><a href="{{URL('inicio')}}">Subastas Activas</a></li>
                    <li <?php
                    if (Request::is('comprar-puntos'))
                    {
                        echo 'class="active"';
                    }
                    ?>><a href="{{URL('comprar-puntos')}}">Comprar Puntos</a></li>
                    <li <?php
                    if (Request::is('como-funciona'))
                    {
                        echo 'class="active"';
                    }
                    ?>><a href="{{URL('como-funciona')}}">Como Funciona</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (Auth::check())
                    {
                        ?>
                        <li><a href="{{url('logout')}}">Sign Out</a></li>
                    <?php
                    }
                    else{
                        ?>
                        <li><a href="#" data-toggle="modal" data-target="#reg" >Registrarme</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#signin">Sign In</a></li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <br>
    <?php
    if (Auth::check() && Auth::user()->type=="Admin")
    {
    ?>
    <nav class="navbar navbar-default" role="navigation" style="background-color: #a6eaaa">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Admin Panel</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li <?php
                    if (Request::is('admin/new_item'))
                    {
                        echo 'class="active"';
                    }
                    ?>><a href="{{URL('admin/new_item')}}">Agregar Articulo </a></li>

                    <li  <?php
                    if (Request::is('admin/new_auction'))
                    {
                        echo 'class="active"';
                    }
                    ?>><a href="{{URL('admin/new_auction')}}">Crear Subasta </a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?php
    }
    $m=$errors->first();
    if(isset($errors) && !empty($m))
    {
        $arr=explode("@",$m);
        if($arr[0]=='E'){
        ?>
        <div class="alert alert-danger">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Error!</strong> <?php echo $arr[1]; ?>
        </div>
        <?php
        }
        elseif($arr[0]=='A')
        {
            ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Alerta!</strong> <?php echo $arr[1]; ?>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="alert alert-warning">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Alerta!</strong> <?php echo $arr[1]; ?>
            </div>
        <?php
        }
    }

    ?>
    @yield('content')
    <br>
    <hr style="border-color: #a0a0a0">
    <!-- Site footer -->
    <div class="footer">
        <p>&copy; Company 2014</p>
    </div>

</div> <!-- /container -->






<!--MODALS-->

<div class="modal fade" id="signin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 style="text-align: center">Iniciar sesion</h1>
            </div>
            <form role="form" method="post" action="{{url('signin')}}">
                <div class="modal-body">
                    <div class="form-container">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ejemplo@mail.com" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" style="font-size: 20px" class="btn btn-primary" value="Sign In">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="reg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 style="text-align: center">Crear Cuenta</h1>
            </div>
            <form role="form" method="post" action="{{url('registrar')}}">
                <div class="modal-body">
                    <div class="form-container">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Juanito Mendieta" name="uname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ejemplo@mail.com" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" style="font-size: 20px" class="btn btn-primary" value="Registrarme">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</body>
</html>