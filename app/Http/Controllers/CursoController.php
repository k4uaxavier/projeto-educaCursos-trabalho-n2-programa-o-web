<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('categoria')->latest()->get();
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('admin.cursos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'          => 'required|string|max:150',
            'categoria_id'  => 'required|exists:categorias,id',
            'modalidade'    => 'required|in:online,presencial,ead',
            'carga_horaria' => 'required|integer|min:1',
        ]);

        Curso::create([
            'nome'          => $request->nome,
            'descricao'     => $request->descricao,
            'categoria_id'  => $request->categoria_id,
            'modalidade'    => $request->modalidade,
            'carga_horaria' => $request->carga_horaria,
            'ativo'         => $request->boolean('ativo'),
            'criado_por'    => 1, // será substituído por auth()->id()
        ]);

        return redirect()->route('admin.cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    public function show(string $id)
    {
        $curso = Curso::with(['categoria', 'inscricoes'])->findOrFail($id);
        return view('admin.cursos.show', compact('curso'));
    }

    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();
        return view('admin.cursos.edit', compact('curso', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);
        $request->validate([
            'nome'          => 'required|string|max:150',
            'categoria_id'  => 'required|exists:categorias,id',
            'modalidade'    => 'required|in:online,presencial,ead',
            'carga_horaria' => 'required|integer|min:1',
        ]);

        $curso->update([
            'nome'          => $request->nome,
            'descricao'     => $request->descricao,
            'categoria_id'  => $request->categoria_id,
            'modalidade'    => $request->modalidade,
            'carga_horaria' => $request->carga_horaria,
            'ativo'         => $request->boolean('ativo'),
        ]);

        return redirect()->route('admin.cursos.index')->with('success', 'Curso atualizado!');
    }

    public function destroy(string $id)
    {
        Curso::destroy($id);
        return redirect()->route('admin.cursos.index')->with('success', 'Curso removido!');
    }
}
