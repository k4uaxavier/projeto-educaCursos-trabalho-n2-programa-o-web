<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel Admin') — EduCursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ec-primary: #a435f0;
            --ec-secondary: #f69c08;
            --ec-dark: #1c1d1f;
            --ec-sidebar-bg: #1c1d1f;
            --ec-sidebar-width: 250px;
        }
        body { font-family: 'Nunito', sans-serif; background: #f4f5f7; }
        h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }

        /* SIDEBAR */
        .sidebar {
            width: var(--ec-sidebar-width);
            min-height: 100vh;
            background: var(--ec-sidebar-bg);
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            transition: width 0.3s;
        }
        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            font-family: 'Poppins', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
            border-bottom: 1px solid #333;
            text-decoration: none;
        }
        .sidebar-brand span { color: var(--ec-secondary); }
        .sidebar-brand small {
            display: block;
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #888;
            margin-top: 2px;
        }
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .sidebar-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #666;
            padding: 0.75rem 1.5rem 0.25rem;
            font-weight: 700;
        }
        .sidebar .nav-link {
            color: #b0b3b8;
            padding: 0.6rem 1.5rem;
            font-size: 0.88rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }
        .sidebar .nav-link.active {
            color: var(--ec-primary);
            border-left-color: var(--ec-primary);
            background: rgba(164,53,240,0.1);
        }
        .sidebar .nav-link i { font-size: 1rem; width: 20px; text-align: center; }
        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #333;
            font-size: 0.8rem;
            color: #666;
        }

        /* TOPBAR */
        .topbar {
            margin-left: var(--ec-sidebar-width);
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 0.75rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 99;
        }
        .topbar .page-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            color: var(--ec-dark);
            margin: 0;
        }
        .topbar .topbar-right { display: flex; align-items: center; gap: 1rem; }
        .topbar .btn-icon {
            width: 36px; height: 36px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            color: #666;
            font-size: 1rem;
            transition: all 0.2s;
        }
        .topbar .btn-icon:hover { background: #e5e7eb; color: #333; }
        .topbar .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: var(--ec-primary);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800;
            font-size: 0.8rem;
            cursor: pointer;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: var(--ec-sidebar-width);
            padding: 2rem;
            min-height: calc(100vh - 65px);
        }

        /* CARDS & STATS */
        .stat-card {
            border: none;
            border-radius: 12px;
            padding: 1.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.1); }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
        }

        /* TABELAS */
        .ec-table { border-radius: 12px; overflow: hidden; }
        .ec-table thead th {
            background: #f8f9fa;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #888;
            border: none;
            padding: 0.9rem 1rem;
        }
        .ec-table tbody td {
            vertical-align: middle;
            font-size: 0.88rem;
            border-color: #f0f0f0;
            padding: 0.85rem 1rem;
        }
        .ec-table tbody tr:hover { background: #fafafa; }

        /* BADGE MODALIDADE */
        .badge-online    { background: #e8f5e9; color: #2e7d32; }
        .badge-presencial{ background: #e3f2fd; color: #1565c0; }
        .badge-ead       { background: #fff3e0; color: #e65100; }

        /* BOTÕES */
        .btn-primary-ec {
            background: var(--ec-primary);
            border: none;
            color: #fff;
            border-radius: 8px;
            font-weight: 700;
            transition: all 0.2s;
        }
        .btn-primary-ec:hover { background: #8710d8; color: #fff; }

        /* BREADCRUMB */
        .ec-breadcrumb { font-size: 0.82rem; color: #888; margin-bottom: 0.25rem; }
        .ec-breadcrumb a { color: var(--ec-primary); text-decoration: none; }

        /* ALERTS */
        @if(session('success'))
        .alert { border-radius: 8px; font-size: 0.9rem; }
        @endif

        @media (max-width: 991px) {
            .sidebar { width: 0; overflow: hidden; }
            .topbar, .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- SIDEBAR --}}
<aside class="sidebar">
    <a href="{{ url('/') }}" class="sidebar-brand">
        Edu<span>Cursos</span>
        <small>Painel Admin</small>
    </a>

    <nav class="sidebar-nav">
        <span class="sidebar-label">Principal</span>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <span class="sidebar-label mt-2">Gerenciar</span>
        <a href="{{ route('admin.cursos.index') }}" class="nav-link {{ request()->routeIs('admin.cursos.*') ? 'active' : '' }}">
            <i class="bi bi-play-btn"></i> Cursos
        </a>
        <a href="{{ route('admin.categorias.index') }}" class="nav-link {{ request()->routeIs('admin.categorias.*') ? 'active' : '' }}">
            <i class="bi bi-tag"></i> Categorias
        </a>
        <a href="{{ route('admin.inscricoes.index') }}" class="nav-link {{ request()->routeIs('admin.inscricoes.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Inscrições
        </a>
        <a href="{{ route('admin.certificados.index') }}" class="nav-link {{ request()->routeIs('admin.certificados.*') ? 'active' : '' }}">
            <i class="bi bi-award"></i> Certificados
        </a>

        <span class="sidebar-label mt-2">Sistema</span>
        <a href="#" class="nav-link">
            <i class="bi bi-people-fill"></i> Usuários
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-graph-up"></i> Métricas
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-gear"></i> Configurações
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="d-flex align-items-center gap-2">
            <div style="width:30px;height:30px;border-radius:50%;background:var(--ec-primary);display:flex;align-items:center;justify-content:center;font-size:0.75rem;color:#fff;font-weight:800">A</div>
            <div>
                <div style="color:#ccc;font-size:0.8rem;font-weight:700">Admin</div>
                <div style="font-size:0.7rem">admin@educursos.com</div>
            </div>
        </div>
    </div>
</aside>

{{-- TOPBAR --}}
<div class="topbar">
    <div>
        <div class="ec-breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Admin</a>
            @yield('breadcrumb')
        </div>
        <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
    </div>
    <div class="topbar-right">
        <a href="#" class="btn-icon"><i class="bi bi-bell"></i></a>
        <a href="{{ url('/') }}" class="btn-icon" title="Ver site"><i class="bi bi-box-arrow-up-right"></i></a>
        <div class="user-avatar">A</div>
    </div>
</div>

{{-- CONTEÚDO PRINCIPAL --}}
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
