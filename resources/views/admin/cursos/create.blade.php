@extends('layouts.admin')
@section('title','Novo Curso')
@section('page-title','Novo Curso')
@section('breadcrumb') / <a href="{{ route('admin.cursos.index') }}">Cursos</a> / Novo @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <form action="{{ route('admin.cursos.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Nome do Curso *</label>
                            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                                   value="{{ old('nome') }}" placeholder="Ex: Python para Data Science" required>
                            @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Descrição</label>
                            <textarea name="descricao" class="form-control" rows="4" placeholder="Descreva o conteúdo do curso...">{{ old('descricao') }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Categoria *</label>
                            <select name="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror" required>
                                <option value="">Selecione...</option>
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Modalidade *</label>
                            <select name="modalidade" class="form-select @error('modalidade') is-invalid @enderror" required>
                                <option value="">Selecione...</option>
                                <option value="online" {{ old('modalidade')=='online' ? 'selected':'' }}>Online</option>
                                <option value="presencial" {{ old('modalidade')=='presencial' ? 'selected':'' }}>Presencial</option>
                                <option value="ead" {{ old('modalidade')=='ead' ? 'selected':'' }}>EAD</option>
                            </select>
                            @error('modalidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Carga Horária (h) *</label>
                            <input type="number" name="carga_horaria" class="form-control @error('carga_horaria') is-invalid @enderror"
                                   value="{{ old('carga_horaria') }}" min="1" placeholder="Ex: 40" required>
                            @error('carga_horaria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="ativo" id="ativo" value="1"
                                       {{ old('ativo', true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="ativo" style="font-size:0.88rem">Curso ativo (visível na plataforma)</label>
                            </div>
                        </div>
                        <div class="col-12 d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-primary-ec px-4">
                                <i class="bi bi-check-lg me-1"></i> Salvar Curso
                            </button>
                            <a href="{{ route('admin.cursos.index') }}" class="btn btn-light px-4">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
