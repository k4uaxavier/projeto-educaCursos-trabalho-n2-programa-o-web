@extends('layouts.admin')
@section('title','Cursos')
@section('page-title','Cursos')
@section('breadcrumb') / <a href="{{ route('admin.cursos.index') }}">Cursos</a> @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p style="color:#888;font-size:0.88rem;margin:0">{{ $cursos->count() }} curso(s) cadastrado(s)</p>
    <a href="{{ route('admin.cursos.create') }}" class="btn btn-primary-ec">
        <i class="bi bi-plus-lg me-1"></i> Novo Curso
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius:12px">
    <div class="card-body p-0">
        @if($cursos->isEmpty())
            <div class="text-center py-5" style="color:#aaa">
                <i class="bi bi-play-btn" style="font-size:3rem;display:block;margin-bottom:0.75rem"></i>
                Nenhum curso cadastrado ainda.
                <div class="mt-2"><a href="{{ route('admin.cursos.create') }}" style="color:#a435f0;font-weight:700">Criar curso</a></div>
            </div>
        @else
        <div class="table-responsive">
            <table class="table ec-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Curso</th>
                        <th>Categoria</th>
                        <th>Modalidade</th>
                        <th>Carga Horária</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                    <tr>
                        <td style="color:#aaa">{{ $curso->id }}</td>
                        <td>
                            <div style="font-weight:700">{{ $curso->nome }}</div>
                            <div style="font-size:0.75rem;color:#aaa">{{ Str::limit($curso->descricao, 45) }}</div>
                        </td>
                        <td style="font-size:0.85rem;color:#555">{{ $curso->categoria->nome ?? '—' }}</td>
                        <td>
                            <span class="badge rounded-pill badge-{{ $curso->modalidade }}">{{ ucfirst($curso->modalidade) }}</span>
                        </td>
                        <td style="font-size:0.85rem">{{ $curso->carga_horaria }}h</td>
                        <td>
                            <span class="badge rounded-pill" style="{{ $curso->ativo ? 'background:#e8f5e9;color:#2e7d32' : 'background:#fce4ec;color:#c62828' }}">
                                {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.cursos.show', $curso->id) }}" class="btn btn-sm" style="background:#f4f5f7;color:#555;border-radius:6px" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.cursos.edit', $curso->id) }}" class="btn btn-sm" style="background:#e3f2fd;color:#1565c0;border-radius:6px" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.cursos.destroy', $curso->id) }}" method="POST" onsubmit="return confirm('Excluir este curso?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm" style="background:#fce4ec;color:#c62828;border-radius:6px" title="Excluir">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
