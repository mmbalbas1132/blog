@extends('layouts.plantilla')

@section('title', 'Home') 

@section('content')
<h1>Bienvenido a la pagina principal</h1><br><br>
<a href="{{route('cursos.index')}}"><h2>Ir a cursos</h2></a>


@endsection

