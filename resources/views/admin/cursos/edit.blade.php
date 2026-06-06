@extends('layouts.admin')
@section('title','Editar Curso')
@section('page-title','Editar Curso')
@section('breadcrumb') / <a href="{{ route('admin.cursos.index') }}">Cursos</a> / Editar @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:12px">
            <div class="card-body p-4">
                <form action="{{ route('admin.cursos.update', $curso->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Nome do Curso *</label>
                            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                                   value="{{ old('nome', $curso->nome) }}" required>
                            @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Descrição</label>
                            <textarea name="descricao" class="form-control" rows="4">{{ old('descricao', $curso->descricao) }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Categoria *</label>
                            <select name="categoria_id" class="form-select" required>
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->id }}" {{ old('categoria_id', $curso->categoria_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Modalidade *</label>
                            <select name="modalidade" class="form-select" required>
                                <option value="online"     {{ old('modalidade', $curso->modalidade)=='online'     ? 'selected':'' }}>Online</option>
                                <option value="presencial" {{ old('modalidade', $curso->modalidade)=='presencial' ? 'selected':'' }}>Presencial</option>
                                <option value="ead"        {{ old('modalidade', $curso->modalidade)=='ead'        ? 'selected':'' }}>EAD</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:0.88rem">Carga Horária (h) *</label>
                            <input type="number" name="carga_horaria" class="form-control"
                                   value="{{ old('carga_horaria', $curso->carga_horaria) }}" min="1" required>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="ativo" id="ativo" value="1"
                                       {{ old('ativo', $curso->ativo) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="ativo" style="font-size:0.88rem">Curso ativo</label>
                            </div>
                        </div>
                        <div class="col-12 d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-primary-ec px-4">
                                <i class="bi bi-check-lg me-1"></i> Atualizar
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
