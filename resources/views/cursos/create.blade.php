@extends('layouts.plantilla')

@section('title', 'Cursos create')

@section('content')
    <h1>En esta pagina podrás crear un curso</h1>
    <form action="{{route('cursos.store')}}" method="POST">
        @csrf
        <label for="">Nombre: <br> <input type="text" name="nombre"></label><br>
        <label for="">Descripción: <br> <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea></label><br>
        <label for="">Categoría: <br> <input type="text" name="categoria"></label><br>
        <input type="submit" value="Enviar formulario">        
    </form>
@endsection
