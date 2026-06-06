@extends('layouts.admin')
@section('title','Nova Categoria')
@section('page-title','Nova Categoria')
@section('breadcrumb') / <a href="{{ route('admin.categorias.index') }}">Categorias</a> / Nova @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <form action="{{ route('admin.categorias.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:0.88rem">Nome da Categoria *</label>
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                               value="{{ old('nome') }}" placeholder="Ex: Programação, Design, Negócios..." required>
                        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold" style="font-size:0.88rem">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="4"
                                  placeholder="Descreva brevemente esta categoria...">{{ old('descricao') }}</textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary-ec px-4">
                            <i class="bi bi-check-lg me-1"></i> Salvar Categoria
                        </button>
                        <a href="{{ route('admin.categorias.index') }}" class="btn btn-light px-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
