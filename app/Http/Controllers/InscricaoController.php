<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function index()
    {
        $inscricoes = Inscricao::with(['usuario', 'curso'])->latest()->get();
        return view('admin.inscricoes.index', compact('inscricoes'));
    }

    public function create() { return redirect()->route('admin.inscricoes.index'); }

    public function store(Request $request)
    {
        Inscricao::create($request->all());
        return redirect()->route('admin.inscricoes.index')->with('success', 'Inscrição realizada!');
    }

    public function show(string $id)
    {
        $inscricao = Inscricao::with(['usuario', 'curso'])->findOrFail($id);
        return view('admin.inscricoes.show', compact('inscricao'));
    }

    public function edit(string $id) { return redirect()->route('admin.inscricoes.index'); }

    public function update(Request $request, string $id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->update($request->all());
        return redirect()->route('admin.inscricoes.index')->with('success', 'Inscrição atualizada!');
    }

    public function destroy(string $id)
    {
        Inscricao::destroy($id);
        return redirect()->route('admin.inscricoes.index')->with('success', 'Inscrição cancelada!');
    }
}
