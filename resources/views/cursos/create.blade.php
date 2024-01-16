@extends('layouts.plantilla')

@section('title', 'Cursos create')

@section('content')
    <h1>
        En esta pagina podrás crear un curso</h1>
    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        {{-- @csrf ES UNA DIRECTIVA DE BLADE QUE AGREGA UN IMPUT OCULTO CON UN TOLKEN POR SEGURIDAD --}}

        {{-- value="{{old('nombre')}}" old("nombre) es una directiva de laravel que recuarda lo introducido en el formulario hasta que se complete todo lo requerido --}}
        <label for="">
            Nombre:
            <br>
            <input type="text" name="nombre" value="{{ old('nombre') }}">
        </label>
        @error('nombre')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror
        <br>

        <label for="">
            Slug:
            <br>
            <input type="text" name="slug" value="{{ old('slug') }}">
        </label>
        @error('slug')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror
        <br>


        <label for="">Descripción: <br>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5">{{ old('descripcion') }}</textarea>
        </label>
        @error('descripcion')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror
        <br>
        <label for="">Categoría: <br> <input type="text" name="categoria" value="{{ old('categoria') }}"></label>
        @error('categoria')
            {{-- @error('nombre') es una directiva de laravel que nos muestra el error de que el nombre es obligatorio --}}
            <br>
            <span>*{{ $message }}</span>
            <br>
        @enderror
        <br><br>
        <input type="submit" value="Enviar formulario">
    </form><br>
    <a href="{{ route('cursos.index') }}">Página principal</a>
@endsection
