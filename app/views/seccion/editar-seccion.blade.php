@extends($project_name.'-master')

@section('head')@stop
@section('header')@stop

@section('contenido')
<div>
    {{ Form::open(array('url' => 'admin/seccion/editar')) }}
    <h2>carga y modificación de secciones</h2>
    <input class="block anchoTotal marginBottom" type="text" name="titulo" value="{{ $seccion->titulo }}" placeholder="Nombre de la Sección">
    <div class="floatRight">
        <a onclick="cancelarPopup('agregar-seccion');" class="btnGris marginRight5">Cancelar</a>
        <input type="submit" value="Guardar" class="btn">
    </div>
    {{Form::hidden('id', $seccion->id)}}
    {{Form::close()}}
</div>
@stop

@section('footer')@stop