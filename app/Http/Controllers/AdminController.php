<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\Inscricao;
use App\Models\Certificado;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalCursos'       => Curso::count(),
            'totalCategorias'   => Categoria::count(),
            'totalInscricoes'   => Inscricao::count(),
            'totalCertificados' => Certificado::count(),
            'cursosRecentes'    => Curso::latest('criado_em')->take(5)->get(),
        ]);
    }
}
