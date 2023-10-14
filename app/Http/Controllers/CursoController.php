<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){

      $cursos = Curso::paginate();

        
          return view('cursos.index', compact('cursos'));
    }

    public function create(){
        return view('cursos.create');
    }

    public function show($id){


        $curso = Curso::find($id);
        //compact('curso'); ['curso' => $curso]

        return view('cursos.show', compact('curso'));
        //return view('cursos.show', ['curso' => $curso]);
        //return view('cursos.show', array('curso' => $curso);
        //accedeo al archivo show de cursos y a la variable del archivo ($curso)
             
    }
}
