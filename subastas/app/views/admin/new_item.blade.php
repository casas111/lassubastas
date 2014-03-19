@extends('layouts.main')
@section('content')
<br><br>


<script src="{{asset('bootstrap-wysiwyg-master/external/jquery.hotkeys.js')}}"></script>
<script src="{{asset('bootstrap-wysiwyg-master/external/google-code-prettify/prettify.js')}}"></script>
<link href="{{asset('bootstrap-wysiwyg-master/index.css')}}" rel="stylesheet">
<script src="{{asset('bootstrap-wysiwyg-master/bootstrap-wysiwyg.js')}}"></script>


<script>
    $(function(){
        $("#editor").wysiwyg();
        $("#formm").submit(function(e){
            $("#new_item_description").val($("#editor").html());
        });
    });
</script>
<style>
    #editor {overflow:scroll; height:300px; font-size: 16px}
    .form-container{
        width: 100%;

    }
    input{
        font-size: 16px;
    }
</style>
<h1 style="text-align: center">Registrar Articulo Nuevo</h1>

<div style="width: 80%; margin-right: auto; margin-left: auto">

        {{ Form::open(array('url' => 'admin/rnew_item', 'files' => true,'id'=>'formm')) }}
        <div class="modal-body">
            <div class="form-container">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="iPad Mini" name="nombre">
                </div>
                <div class="form-group desc-container">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" title="Font"><i class="glyphicon glyphicon-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="glyphicon glyphicon-text-height"></i>&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="glyphicon glyphicon-bold"></i></a>
                            <a class="btn btn-default" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="glyphicon glyphicon-italic"></i></a>
                            <a class="btn btn-default" data-edit="strikethrough" title="Strikethrough"><i class="glyphicon glyphicon-strikethrough"></i></a>
                            <a class="btn btn-default" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="glyphicon glyphicon-underline"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="insertunorderedlist" title="Bullet list"><i class="glyphicon glyphicon-list-ul"></i></a>
                            <a class="btn btn-default" data-edit="insertorderedlist" title="Number list"><i class="glyphicon glyphicon-list-ol"></i></a>
                            <a class="btn btn-default" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="glyphicon glyphicon-indent-left"></i></a>
                            <a class="btn btn-default" data-edit="indent" title="Indent (Tab)"><i class="glyphicon glyphicon-indent-right"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="glyphicon glyphicon-align-left"></i></a>
                            <a class="btn btn-default" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="glyphicon glyphicon-align-center"></i></a>
                            <a class="btn btn-default" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="glyphicon glyphicon-align-right"></i></a>
                            <a class="btn btn-default" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="glyphicon glyphicon-align-justify"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="glyphicon glyphicon-link"></i></a>
                            <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                <button class="btn btn-default" type="button">Add</button>
                            </div>
                            <a class="btn btn-default" data-edit="unlink" title="Remove Hyperlink"><i class="glyphicon glyphicon-cut"></i></a>

                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="glyphicon glyphicon-picture"></i></a>

                        </div>

                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="glyphicon glyphicon-undo"></i></a>
                            <a class="btn btn-default" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="glyphicon glyphicon-repeat"></i></a>
                        </div>

                        <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
                    </div>
                    <div id='editor'></div>
                    <textarea style="display: none" id="new_item_description" name="descripcion" ></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Costo (COP)</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="200000 OJO que es sin comas ni puntos" name="costo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Imagen</label>
                    <input  type="file" placeholder="browse" id="imagen_item" name="imagen_item" accept="image/*"/>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" style="font-size: 20px" class="btn btn-primary" value="Guardar">
        </div>
    {{ Form::close() }}
</div>
@endsection