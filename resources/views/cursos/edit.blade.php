@extends('layouts.plantilla')

@section('title', 'Cursos edit')

@section('content')
    <h1>En esta pagina podrás editar un curso</h1>
    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        
        {{-- Directiva de seguridad que expira la página --}}
        @csrf 

        {{-- Directiva que hace que se reconozca el método put --}}
        @method('put')

        <label for="">
            Nombre: <br>
            <input type="text" name="nombre" value="{{ $curso->nombre }}">
        </label><br>

        <label for="">
            Descripción: <br>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5">{{ $curso->descripcion }}</textarea>
        </label><br>

        <label for="">
            Categoría: <br>
            <input type="text" name="categoria" value="{{ $curso->categoria }}">
        </label><br>

        <input type="submit" value="Actualizar formulario">
    </form>
@endsection
