@extends('layouts.admin')
@section('title','Detalhes da Inscrição')
@section('page-title','Inscrição #{{ $inscricao->id }}')
@section('breadcrumb') / <a href="{{ route('admin.inscricoes.index') }}">Inscrições</a> / Detalhes @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <div style="font-size:0.85rem">
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Aluno</span>
                        <span style="font-weight:700">{{ $inscricao->usuario->nome ?? 'ID '.$inscricao->usuario_id }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Curso</span>
                        <span style="font-weight:700">{{ $inscricao->curso->nome ?? 'ID '.$inscricao->curso_id }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Status</span>
                        <span style="font-weight:700">{{ ucfirst($inscricao->status ?? 'ativa') }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Progresso</span>
                        <span style="font-weight:700">{{ number_format($inscricao->progresso ?? 0, 1) }}%</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Inscrito em</span>
                        <span style="font-weight:700">{{ $inscricao->inscrito_em ? \Carbon\Carbon::parse($inscricao->inscrito_em)->format('d/m/Y H:i') : '—' }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span style="color:#888">Concluído em</span>
                        <span style="font-weight:700">{{ $inscricao->concluido_em ? \Carbon\Carbon::parse($inscricao->concluido_em)->format('d/m/Y H:i') : 'Em andamento' }}</span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.inscricoes.index') }}" class="btn btn-light">← Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
