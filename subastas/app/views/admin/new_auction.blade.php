@extends('layouts.main')
@section('content')
<br><br>
<link href="{{asset('css/datepicker.css')}}" rel="stylesheet" xmlns="http://www.w3.org/1999/html">

<link href="{{asset('css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-timepicker.min.js')}}"></script>
<style>

    .form-container{
        width: 100%;
    }
</style>
<script>
    $(function(){
        $('#timepicker2').timepicker();
        $('.items_select').click(function(e){
            e.preventDefault();
            $('#show_item').val($(this).text());
            $('#item_id').val($(this).attr('id'));
        });

        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd'
        }).on('changeDate', function(){
                $(this).blur();
            });
    });

</script>
<h1 style="text-align: center">Registrar Subasta Nueva</h1>

<div style="width: 80%; margin-right: auto; margin-left: auto">

    {{ Form::open(array('url' => 'admin/rnew_auction', 'id'=>'formm')) }}
    <div class="modal-body">
        <div class="form-container">

            <label for="exampleInputEmail1" style="margin-bottom: 20px">Articulo</label>
            <br>
            <div class="form-group" style="position: relative; margin-bottom: 30px; margin-top: -10px;">

                <div class="dropdown" style="float: left; width: 45%; margin-top: -5px">
                    <a style="width: 100%; text-align: left" href="#" id="drop2" role="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown">Seleccionar Articulo <b class="caret"></b></a>
                    <ul style="width: 100%" class="dropdown-menu" role="menu" aria-labelledby="drop2">
                        <?php
                        foreach($articulos as $a)
                        {
                            ?>
                            <li role="presentation"><a class="items_select" role="menuitem" tabindex="-1" href="#" id="<?php echo $a->id; ?>"><?php echo $a->name; ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div><input type="text" class="form-control" style="position: absolute;width: 45%; right: 0px" id="show_item" value="<?php echo $articulos[0]->name; ?>"  disabled>
                <input type="hidden" id="item_id" name="item_id" value="<?php echo $articulos[0]->id; ?>">
            </div>
            <br>
            <label for="exampleInputEmail1">Hora De Fin (Hora del servidor: <?php  echo $now;  ?>)</label>
            <div class="form-group" style="position: relative">

                <input type="text" class="datepicker form-control" placeholder="Fecha Fin" name="end_date" style="width: 45%; float: left" />
                <div class="bootstrap-timepicker" style="position: absolute;width: 45%; right: 0px">
                    <input id="timepicker2" type="text" class="form-control" name="end_time">
                </div>
                <br>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <input type="submit" style="font-size: 20px" class="btn btn-primary" value="Guardar">
    </div>
    {{ Form::close() }}
</div>

@endsection