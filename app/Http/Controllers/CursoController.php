<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {

        $cursos = Curso::orderBy('id', 'desc')->paginate();


        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $curso = new Curso;

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show', $curso);
    }

    public function show(Curso $curso)
    {
        //compact('curso'); ['curso' => $curso]

        return view('cursos.show', compact('curso'));
        //return view('cursos.show', ['curso' => $curso]);
        //return view('cursos.show', array('curso' => $curso);
        //accedo al archivo show de cursos y a la variable del archivo ($curso)

    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();

        return redirect()->route('cursos.show', $curso);

       
    }
}
