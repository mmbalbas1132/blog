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
            <input type="text" name="nombre" value="{{ old('nombre', $curso->nombre) }}">
        </label><br>
        @error('nombre')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror

        <label for="">
            Slug:
            <br>
            <input type="text" name="slug" value="{{ old('slug', $curso->slug) }}">
        </label>
        @error('slug')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror
        <br>


        <label for="">
            Descripción: <br>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5">{{ old('descripcion', $curso->descripcion) }}</textarea>
        </label><br>
        @error('descripcion')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror

        <label for="">
            Categoría: <br>
            <input type="text" name="categoria" value="{{old('categoria', $curso->categoria  ) }}">
        </label><br>
        @error('categoria')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror

        <input type="submit" value="Actualizar formulario">
    </form>
    <a href="{{ route('cursos.index') }}">Página principal</a>
@endsection
