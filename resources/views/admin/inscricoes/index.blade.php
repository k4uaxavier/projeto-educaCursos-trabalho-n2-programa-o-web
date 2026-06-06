@extends('layouts.admin')
@section('title','Inscrições')
@section('page-title','Inscrições')
@section('breadcrumb') / <a href="{{ route('admin.inscricoes.index') }}">Inscrições</a> @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p style="color:#888;font-size:0.88rem;margin:0">{{ $inscricoes->count() }} inscrição(ões)</p>
</div>

<div class="card border-0 shadow-sm" style="border-radius:12px">
    <div class="card-body p-0">
        @if($inscricoes->isEmpty())
            <div class="text-center py-5" style="color:#aaa">
                <i class="bi bi-people" style="font-size:3rem;display:block;margin-bottom:0.75rem"></i>
                Nenhuma inscrição registrada ainda.
            </div>
        @else
        <div class="table-responsive">
            <table class="table ec-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Progresso</th>
                        <th>Status</th>
                        <th>Inscrito em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscricoes as $insc)
                    <tr>
                        <td style="color:#aaa">{{ $insc->id }}</td>
                        <td style="font-weight:700;font-size:0.88rem">{{ $insc->usuario->nome ?? 'ID '.$insc->usuario_id }}</td>
                        <td style="font-size:0.85rem;color:#555">{{ $insc->curso->nome ?? 'ID '.$insc->curso_id }}</td>
                        <td style="min-width:120px">
                            <div style="font-size:0.75rem;color:#888;margin-bottom:3px">{{ number_format($insc->progresso ?? 0, 1) }}%</div>
                            <div style="height:6px;background:#f0f0f0;border-radius:3px">
                                <div style="width:{{ $insc->progresso ?? 0 }}%;height:100%;background:linear-gradient(90deg,#a435f0,#f69c08);border-radius:3px"></div>
                            </div>
                        </td>
                        <td>
                            @php
                            $statusColor = match($insc->status ?? '') {
                                'ativa'     => 'background:#e3f2fd;color:#1565c0',
                                'concluida' => 'background:#e8f5e9;color:#2e7d32',
                                'cancelada' => 'background:#fce4ec;color:#c62828',
                                default     => 'background:#f4f5f7;color:#666',
                            };
                            @endphp
                            <span class="badge rounded-pill" style="{{ $statusColor }}">{{ ucfirst($insc->status ?? 'ativa') }}</span>
                        </td>
                        <td style="font-size:0.8rem;color:#888">
                            {{ $insc->inscrito_em ? \Carbon\Carbon::parse($insc->inscrito_em)->format('d/m/Y') : '—' }}
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.inscricoes.show', $insc->id) }}" class="btn btn-sm" style="background:#f4f5f7;color:#555;border-radius:6px">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.inscricoes.destroy', $insc->id) }}" method="POST" onsubmit="return confirm('Cancelar esta inscrição?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm" style="background:#fce4ec;color:#c62828;border-radius:6px">
                                        <i class="bi bi-x-lg"></i>
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
