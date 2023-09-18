<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
          return view('cursos.index');
    }

    public function create(){
        return view('cursos.create');
    }

    public function show($curso){

        //compact('curso'); ['curso' => $curso]

        return view('cursos.show', compact('curso'));
        //return view('cursos.show', ['curso' => $curso]);
        //return view('cursos.show', array('curso' => $curso);
        //accedeo al archivo show de cursos y a la variable del archivo ($curso)
             
    }
}
