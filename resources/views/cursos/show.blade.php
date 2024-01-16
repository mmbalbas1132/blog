@extends('layouts.plantilla')

@section('title', 'Curso ' . $curso->nombre)

@section('content')
    <h1>Bienvenido al curso: {{ $curso->nombre }}</h1>
    <a href="{{ route('cursos.index') }}">Volver a cursos</a><br>
    <a href="{{ route('cursos.edit', $curso) }}">Editar curso</a>
    <p><strong>Categoría: </strong>{{ $curso->categoria }}</p>
    <p>{{ $curso->descripcion }}</p>

    <form action="{{route('cursos.destroy', $curso )}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar curso</button>
    </form>
@endsection
