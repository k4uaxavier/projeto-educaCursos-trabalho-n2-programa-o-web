@extends('layouts.admin')
@section('title','Categorias')
@section('page-title','Categorias')
@section('breadcrumb') / <a href="{{ route('admin.categorias.index') }}">Categorias</a> @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p style="color:#888;font-size:0.88rem;margin:0">{{ $categorias->count() }} categoria(s) cadastrada(s)</p>
    </div>
    <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary-ec">
        <i class="bi bi-plus-lg me-1"></i> Nova Categoria
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius:12px">
    <div class="card-body p-0">
        @if($categorias->isEmpty())
            <div class="text-center py-5" style="color:#aaa">
                <i class="bi bi-tag" style="font-size:3rem;display:block;margin-bottom:0.75rem"></i>
                Nenhuma categoria cadastrada ainda.
                <div class="mt-2"><a href="{{ route('admin.categorias.create') }}" style="color:#a435f0;font-weight:700">Criar categoria</a></div>
            </div>
        @else
        <div class="table-responsive">
            <table class="table ec-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Criada em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $cat)
                    <tr>
                        <td style="color:#aaa">{{ $cat->id }}</td>
                        <td>
                            <div style="font-weight:700">{{ $cat->nome }}</div>
                        </td>
                        <td style="color:#888;max-width:250px">
                            {{ Str::limit($cat->descricao, 60) ?? '—' }}
                        </td>
                        <td style="color:#888;font-size:0.8rem">
                            {{ $cat->criado_em ? \Carbon\Carbon::parse($cat->criado_em)->format('d/m/Y') : '—' }}
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.categorias.edit', $cat->id) }}" class="btn btn-sm" style="background:#e3f2fd;color:#1565c0;border-radius:6px" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.categorias.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Excluir esta categoria?')">
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
