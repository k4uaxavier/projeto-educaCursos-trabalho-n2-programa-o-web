<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return response()->json($cursos); // Retorna os cursos em formato JSON
    }

    public function store(Request $request)
    {
        $curso = Curso::create($request->all());
        return response()->json(['message' => 'Curso criado com sucesso!', 'data' => $curso], 201);
    }

    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);
        return response()->json($curso);
    }

    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return response()->json(['message' => 'Curso atualizado!', 'data' => $curso]);
    }

    public function destroy(string $id)
    {
        Curso::destroy($id);
        return response()->json(['message' => 'Curso deletado com sucesso!']);
    }
}