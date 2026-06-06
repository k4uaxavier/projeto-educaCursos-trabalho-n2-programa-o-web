@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb') / Dashboard @endsection

@section('content')

{{-- STAT CARDS --}}
<div class="row g-4 mb-4">
    @php
    $stats = [
        ['label'=>'Cursos ativos','value'=>$totalCursos ?? 0,'icon'=>'bi-play-btn-fill','bg'=>'#f3e5f5','color'=>'#a435f0'],
        ['label'=>'Categorias','value'=>$totalCategorias ?? 0,'icon'=>'bi-tag-fill','bg'=>'#fff3e0','color'=>'#f69c08'],
        ['label'=>'Inscrições','value'=>$totalInscricoes ?? 0,'icon'=>'bi-people-fill','bg'=>'#e3f2fd','color'=>'#1565c0'],
        ['label'=>'Certificados emitidos','value'=>$totalCertificados ?? 0,'icon'=>'bi-award-fill','bg'=>'#e8f5e9','color'=>'#2e7d32'],
    ];
    @endphp
    @foreach($stats as $s)
    <div class="col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div style="font-size:0.78rem;color:#888;font-weight:700;text-transform:uppercase;letter-spacing:0.8px">{{ $s['label'] }}</div>
                    <div style="font-size:2rem;font-weight:900;color:#1c1d1f;font-family:'Poppins',sans-serif;line-height:1.2;margin-top:4px">
                        {{ number_format($s['value']) }}
                    </div>
                </div>
                <div class="stat-icon" style="background:{{ $s['bg'] }};color:{{ $s['color'] }}">
                    <i class="bi {{ $s['icon'] }}"></i>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row g-4">
    {{-- Ações rápidas --}}
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:12px">
            <div class="card-body p-4">
                <h6 style="font-weight:800;margin-bottom:1.25rem">Ações Rápidas</h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.cursos.create') }}" class="btn btn-primary-ec text-start">
                        <i class="bi bi-plus-circle me-2"></i> Novo Curso
                    </a>
                    <a href="{{ route('admin.categorias.create') }}" class="btn text-start" style="background:#fff3e0;color:#e65100;font-weight:700;border-radius:8px">
                        <i class="bi bi-plus-circle me-2"></i> Nova Categoria
                    </a>
                    <a href="{{ route('admin.inscricoes.index') }}" class="btn text-start" style="background:#e3f2fd;color:#1565c0;font-weight:700;border-radius:8px">
                        <i class="bi bi-people me-2"></i> Ver Inscrições
                    </a>
                    <a href="{{ route('admin.certificados.index') }}" class="btn text-start" style="background:#e8f5e9;color:#2e7d32;font-weight:700;border-radius:8px">
                        <i class="bi bi-award me-2"></i> Ver Certificados
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Últimos cursos --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 style="font-weight:800;margin:0">Cursos Recentes</h6>
                    <a href="{{ route('admin.cursos.index') }}" style="font-size:0.82rem;color:#a435f0;font-weight:700;text-decoration:none">
                        Ver todos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                @if(isset($cursosRecentes) && $cursosRecentes->count())
                <div class="table-responsive">
                    <table class="table ec-table mb-0">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Modalidade</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursosRecentes as $curso)
                            <tr>
                                <td>
                                    <div style="font-weight:700;font-size:0.88rem">{{ $curso->nome }}</div>
                                    <div style="font-size:0.75rem;color:#888">{{ $curso->carga_horaria }}h</div>
                                </td>
                                <td>
                                    <span class="badge rounded-pill badge-{{ $curso->modalidade }}">{{ ucfirst($curso->modalidade) }}</span>
                                </td>
                                <td>
                                    <span class="badge rounded-pill" style="{{ $curso->ativo ? 'background:#e8f5e9;color:#2e7d32' : 'background:#fce4ec;color:#c62828' }}">
                                        {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.cursos.edit', $curso->id) }}" class="btn btn-sm" style="background:#f4f5f7;color:#555;border-radius:6px">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4" style="color:#aaa">
                    <i class="bi bi-inbox" style="font-size:2.5rem;display:block;margin-bottom:0.5rem"></i>
                    Nenhum curso cadastrado ainda.
                    <div class="mt-2">
                        <a href="{{ route('admin.cursos.create') }}" style="color:#a435f0;font-weight:700;font-size:0.85rem">Criar o primeiro curso</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
