<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function index()
    {
        return response()->json(Inscricao::all());
    }

    public function store(Request $request)
    {
        $inscricao = Inscricao::create($request->all());
        return response()->json(['message' => 'Inscrição realizada!', 'data' => $inscricao], 201);
    }

    public function show(string $id)
    {
        return response()->json(Inscricao::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->update($request->all());
        return response()->json(['message' => 'Progresso da inscrição atualizado!', 'data' => $inscricao]);
    }

    public function destroy(string $id)
    {
        Inscricao::destroy($id);
        return response()->json(['message' => 'Inscrição cancelada!']);
    }
}