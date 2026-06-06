<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    public function index()
    {
        $certificados = Certificado::with('inscricao')->latest()->get();
        return view('admin.certificados.index', compact('certificados'));
    }

    public function create() { return redirect()->route('admin.certificados.index'); }

    public function store(Request $request)
    {
        Certificado::create($request->all());
        return redirect()->route('admin.certificados.index')->with('success', 'Certificado emitido!');
    }

    public function show(string $id)
    {
        $certificado = Certificado::with(['inscricao.usuario', 'inscricao.curso'])->findOrFail($id);
        return view('admin.certificados.show', compact('certificado'));
    }

    public function edit(string $id) { return redirect()->route('admin.certificados.index'); }
    public function update(Request $request, string $id) { return redirect()->route('admin.certificados.index'); }
    public function destroy(string $id)
    {
        Certificado::destroy($id);
        return redirect()->route('admin.certificados.index')->with('success', 'Certificado removido!');
    }
}
