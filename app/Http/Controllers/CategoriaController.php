<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::latest()->get();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:80|unique:categorias,nome']);
        Categoria::create($request->only('nome', 'descricao'));
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $request->validate(['nome' => 'required|string|max:80|unique:categorias,nome,'.$id]);
        $categoria->update($request->only('nome', 'descricao'));
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada!');
    }

    public function destroy(string $id)
    {
        Categoria::destroy($id);
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria removida!');
    }
}
