@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <h1>Bienvenido a la página principal de cursos</h1>
    <a href="{{ route('cursos.create') }}">Crear curso</a>
    <ul>

        @foreach ($cursos as $curso)
            <li>
                {{-- <a href="{{ route('cursos.show', $curso->nombre) }}">{{ $curso->nombre }}</a> Cambio $curso->nombre por solamente $curso porque ya le indiqué qeu la búsquea furea por el slug --}}
                <a href="{{ route('cursos.show', $curso) }}">{{ $curso->nombre}}</a>

            </li>
        @endforeach
    </ul>

    {{ $cursos->links() }}
@endsection
