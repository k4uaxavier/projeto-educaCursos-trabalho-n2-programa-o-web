@extends('layouts.admin')
@section('title','Certificado')
@section('page-title','Certificado #{{ $certificado->id }}')
@section('breadcrumb') / <a href="{{ route('admin.certificados.index') }}">Certificados</a> / Detalhes @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        {{-- Preview do certificado --}}
        <div class="card border-0 shadow-sm mb-4" style="border-radius:12px;background:linear-gradient(135deg,#1c1d1f,#2d1b69);padding:3rem;text-align:center">
            <div style="color:#f69c08;font-size:0.7rem;font-weight:800;letter-spacing:2px;text-transform:uppercase;margin-bottom:0.75rem">
                EduCursos — Certificado de Conclusão
            </div>
            <div style="color:#fff;font-size:1.5rem;font-weight:900;font-family:'Poppins',sans-serif;margin-bottom:0.5rem">
                {{ $certificado->inscricao->usuario->nome ?? 'Aluno' }}
            </div>
            <div style="color:#b0b3b8;font-size:0.88rem;margin-bottom:1.5rem">
                concluiu com êxito o curso
            </div>
            <div style="color:#a435f0;font-size:1.1rem;font-weight:800;margin-bottom:1.5rem">
                {{ $certificado->inscricao->curso->nome ?? '—' }}
            </div>
            <div style="background:rgba(255,255,255,0.1);border-radius:8px;padding:0.6rem 1rem;display:inline-block;margin:0 auto">
                <code style="color:#f69c08;font-size:0.78rem">{{ $certificado->codigo_unico }}</code>
            </div>
            <div style="color:#666;font-size:0.75rem;margin-top:1rem">
                {{ $certificado->emitido_em ? \Carbon\Carbon::parse($certificado->emitido_em)->format('d \d\e F \d\e Y') : '' }}
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <div style="font-size:0.85rem">
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Código de validação</span>
                        <code>{{ $certificado->codigo_unico }}</code>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span style="color:#888">Via</span>
                        <span style="font-weight:700">{{ $certificado->via }}ª via</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span style="color:#888">Emitido em</span>
                        <span style="font-weight:700">{{ $certificado->emitido_em ? \Carbon\Carbon::parse($certificado->emitido_em)->format('d/m/Y H:i') : '—' }}</span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.certificados.index') }}" class="btn btn-light">← Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
