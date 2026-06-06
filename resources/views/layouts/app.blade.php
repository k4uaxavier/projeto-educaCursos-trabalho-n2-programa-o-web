<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduCursos') — Aprenda sem limites</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ec-primary:   #a435f0;
            --ec-secondary: #f69c08;
            --ec-dark:      #1c1d1f;
            --ec-gray:      #6a6f73;
            --ec-light:     #f7f9fa;
            --ec-white:     #ffffff;
            --ec-success:   #1e6055;
            --ec-danger:    #d93025;
            --ec-radius:    8px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            color: var(--ec-dark);
            background: var(--ec-white);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        /* ── NAVBAR ── */
        .ec-navbar {
            background: var(--ec-dark);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        .ec-navbar .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--ec-white) !important;
            letter-spacing: -0.5px;
        }

        .ec-navbar .navbar-brand span {
            color: var(--ec-secondary);
        }

        .ec-navbar .nav-search {
            flex: 1;
            max-width: 500px;
            margin: 0 1.5rem;
        }

        .ec-navbar .nav-search .form-control {
            border-radius: 30px 0 0 30px;
            border: none;
            padding: 0.5rem 1.2rem;
            font-size: 0.9rem;
            background: #fff;
        }

        .ec-navbar .nav-search .btn-search {
            border-radius: 0 30px 30px 0;
            background: var(--ec-secondary);
            border: none;
            color: var(--ec-dark);
            padding: 0.5rem 1.2rem;
            font-weight: 700;
        }

        .ec-navbar .nav-link {
            color: #ccc !important;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 0.4rem 0.75rem !important;
            transition: color 0.2s;
        }

        .ec-navbar .nav-link:hover { color: var(--ec-white) !important; }

        .ec-navbar .btn-entrar {
            border: 1px solid #ccc;
            color: var(--ec-white);
            background: transparent;
            border-radius: var(--ec-radius);
            padding: 0.4rem 1rem;
            font-size: 0.88rem;
            font-weight: 700;
            transition: all 0.2s;
        }

        .ec-navbar .btn-entrar:hover {
            background: var(--ec-white);
            color: var(--ec-dark);
        }

        .ec-navbar .btn-cadastrar {
            background: var(--ec-primary);
            color: var(--ec-white);
            border: none;
            border-radius: var(--ec-radius);
            padding: 0.4rem 1rem;
            font-size: 0.88rem;
            font-weight: 700;
            transition: all 0.2s;
        }

        .ec-navbar .btn-cadastrar:hover {
            background: #8710d8;
        }

        /* ── FOOTER ── */
        .ec-footer {
            background: var(--ec-dark);
            color: #ccc;
            padding: 3rem 0 1.5rem;
            font-size: 0.9rem;
        }

        .ec-footer h6 {
            color: var(--ec-white);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 1rem;
        }

        .ec-footer a {
            color: #aaa;
            text-decoration: none;
            display: block;
            margin-bottom: 0.4rem;
            transition: color 0.2s;
        }

        .ec-footer a:hover { color: var(--ec-white); }

        .ec-footer .footer-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--ec-white);
        }

        .ec-footer .footer-brand span { color: var(--ec-secondary); }

        .ec-footer hr { border-color: #333; }

        .ec-footer .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #444;
            color: #ccc;
            font-size: 1rem;
            margin-right: 0.5rem;
            transition: all 0.2s;
        }

        .ec-footer .social-icons a:hover {
            border-color: var(--ec-primary);
            color: var(--ec-primary);
        }

        @yield('extra-css')
    </style>

    @stack('styles')
</head>
<body>

    {{-- ── NAVBAR ── --}}
    <nav class="ec-navbar navbar navbar-expand-lg">
        <div class="container-fluid px-4">

            <a class="navbar-brand" href="{{ url('/') }}">
                Edu<span>Cursos</span>
            </a>

            {{-- Busca --}}
            <div class="nav-search d-none d-lg-flex">
                <input class="form-control" type="search" placeholder="Buscar cursos...">
                <button class="btn btn-search">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="#" class="btn btn-entrar me-1">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-cadastrar">Cadastre-se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ── CONTEÚDO ── --}}
    <main>
        @yield('content')
    </main>

    {{-- ── FOOTER ── --}}
    <footer class="ec-footer">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand mb-2">Edu<span>Cursos</span></div>
                    <p style="color:#aaa; font-size:0.88rem; line-height:1.7">
                        A plataforma que conecta pessoas ao conhecimento — onde e quando quiser.
                    </p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <h6>Plataforma</h6>
                    <a href="#">Cursos</a>
                    <a href="#">Categorias</a>
                    <a href="#">Certificados</a>
                    <a href="#">Blog</a>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <h6>Empresa</h6>
                    <a href="#">Sobre nós</a>
                    <a href="#">Carreiras</a>
                    <a href="#">Parceiros</a>
                    <a href="#">Contato</a>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <h6>Suporte</h6>
                    <a href="#">Central de ajuda</a>
                    <a href="#">Termos de uso</a>
                    <a href="#">Privacidade</a>
                    <a href="#">Cookies</a>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <h6>Modalidades</h6>
                    <a href="#">Online</a>
                    <a href="#">EAD</a>
                    <a href="#">Presencial</a>
                </div>
            </div>

            <hr class="my-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center" style="font-size:0.8rem; color:#666">
                <span>&copy; {{ date('Y') }} EduCursos. Todos os direitos reservados.</span>
                <span class="mt-2 mt-md-0">Feito com <i class="bi bi-heart-fill text-danger"></i> e Laravel</span>
            </div>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
