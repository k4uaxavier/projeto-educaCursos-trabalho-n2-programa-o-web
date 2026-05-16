<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    public function index()
    {
        return response()->json(Certificado::all());
    }

    public function store(Request $request)
    {
        $certificado = Certificado::create($request->all());
        return response()->json(['message' => 'Certificado emitido!', 'data' => $certificado], 201);
    }

    public function show(string $id)
    {
        return response()->json(Certificado::findOrFail($id));
    }
}