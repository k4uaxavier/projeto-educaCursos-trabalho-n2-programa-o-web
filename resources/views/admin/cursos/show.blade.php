@extends('layouts.admin')
@section('title', $curso->nome)
@section('page-title', $curso->nome)
@section('breadcrumb') / <a href="{{ route('admin.cursos.index') }}">Cursos</a> / Detalhes @endsection

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <span class="badge rounded-pill badge-{{ $curso->modalidade }} mb-2">{{ ucfirst($curso->modalidade) }}</span>
                        <h4 style="font-weight:800">{{ $curso->nome }}</h4>
                        <p style="color:#888;font-size:0.9rem">{{ $curso->descricao ?? 'Sem descrição.' }}</p>
                    </div>
                    <a href="{{ route('admin.cursos.edit', $curso->id) }}" class="btn btn-sm btn-primary-ec ms-3">
                        <i class="bi bi-pencil me-1"></i> Editar
                    </a>
                </div>
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div style="background:#f7f9fa;border-radius:8px;padding:1rem;text-align:center">
                            <div style="font-size:1.5rem;font-weight:900;color:#a435f0">{{ $curso->carga_horaria }}h</div>
                            <div style="font-size:0.75rem;color:#888">Carga horária</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="background:#f7f9fa;border-radius:8px;padding:1rem;text-align:center">
                            <div style="font-size:1.5rem;font-weight:900;color:#1565c0">{{ $curso->inscricoes->count() ?? 0 }}</div>
                            <div style="font-size:0.75rem;color:#888">Inscrições</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div style="background:#f7f9fa;border-radius:8px;padding:1rem;text-align:center">
                            <div style="font-size:1rem;font-weight:800;color:{{ $curso->ativo ? '#2e7d32' : '#c62828' }}">
                                {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
                            </div>
                            <div style="font-size:0.75rem;color:#888">Status</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <h6 style="font-weight:800;margin-bottom:1rem">Informações</h6>
                <div style="font-size:0.85rem">
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Categoria</span>
                        <span style="font-weight:700">{{ $curso->categoria->nome ?? '—' }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Criado por</span>
                        <span style="font-weight:700">{{ $curso->criador->nome ?? 'Admin' }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span style="color:#888">Cadastrado em</span>
                        <span style="font-weight:700">{{ $curso->criado_em ? \Carbon\Carbon::parse($curso->criado_em)->format('d/m/Y') : '—' }}</span>
                    </div>
                </div>
                <div class="mt-3 d-grid">
                    <a href="{{ route('admin.cursos.index') }}" class="btn btn-light">← Voltar para lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
