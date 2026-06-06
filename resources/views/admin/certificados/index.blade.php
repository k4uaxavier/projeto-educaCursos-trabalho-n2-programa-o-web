@extends('layouts.admin')
@section('title','Certificados')
@section('page-title','Certificados')
@section('breadcrumb') / <a href="{{ route('admin.certificados.index') }}">Certificados</a> @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p style="color:#888;font-size:0.88rem;margin:0">{{ $certificados->count() }} certificado(s) emitido(s)</p>
</div>

<div class="card border-0 shadow-sm" style="border-radius:12px">
    <div class="card-body p-0">
        @if($certificados->isEmpty())
            <div class="text-center py-5" style="color:#aaa">
                <i class="bi bi-award" style="font-size:3rem;display:block;margin-bottom:0.75rem"></i>
                Nenhum certificado emitido ainda.
            </div>
        @else
        <div class="table-responsive">
            <table class="table ec-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Código Único</th>
                        <th>Inscrição</th>
                        <th>Via</th>
                        <th>Emitido por</th>
                        <th>Emitido em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificados as $cert)
                    <tr>
                        <td style="color:#aaa">{{ $cert->id }}</td>
                        <td>
                            <code style="background:#f4f5f7;padding:2px 8px;border-radius:4px;font-size:0.78rem">
                                {{ Str::limit($cert->codigo_unico, 20) }}
                            </code>
                        </td>
                        <td style="font-size:0.85rem">#{{ $cert->inscricao_id }}</td>
                        <td>
                            <span class="badge rounded-pill" style="background:#e3f2fd;color:#1565c0">{{ $cert->via }}ª via</span>
                        </td>
                        <td style="font-size:0.85rem;color:#555">{{ $cert->emitido_por ?? '—' }}</td>
                        <td style="font-size:0.8rem;color:#888">
                            {{ $cert->emitido_em ? \Carbon\Carbon::parse($cert->emitido_em)->format('d/m/Y') : '—' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.certificados.show', $cert->id) }}" class="btn btn-sm" style="background:#f4f5f7;color:#555;border-radius:6px">
                                <i class="bi bi-eye"></i>
                            </a>
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
