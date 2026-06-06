@extends('layouts.app')

@section('title', 'EduCursos — Aprenda sem limites')

@push('styles')
<style>
    /* HERO */
    .hero-section {
        background: linear-gradient(135deg, #1c1d1f 0%, #2d1b69 50%, #1c1d1f 100%);
        padding: 5rem 0 4rem;
        position: relative;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 600px; height: 600px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(164,53,240,0.15) 0%, transparent 70%);
    }
    .hero-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(246,156,8,0.1) 0%, transparent 70%);
    }
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: rgba(246,156,8,0.15);
        border: 1px solid rgba(246,156,8,0.3);
        color: #f69c08;
        padding: 0.3rem 0.9rem;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .hero-title {
        font-size: clamp(2rem, 5vw, 3.2rem);
        font-weight: 900;
        color: #fff;
        line-height: 1.15;
        margin-bottom: 1.25rem;
    }
    .hero-title .highlight { color: #a435f0; }
    .hero-subtitle {
        color: #b0b3b8;
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 2rem;
        max-width: 500px;
    }
    .hero-stats {
        display: flex;
        gap: 2rem;
        margin-top: 2.5rem;
        flex-wrap: wrap;
    }
    .hero-stat-value {
        font-family: 'Poppins', sans-serif;
        font-size: 1.6rem;
        font-weight: 800;
        color: #fff;
        line-height: 1;
    }
    .hero-stat-label { color: #888; font-size: 0.8rem; margin-top: 2px; }
    .hero-image-area {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 16px;
        padding: 2rem;
        backdrop-filter: blur(10px);
    }
    .hero-course-preview {
        background: #fff;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .course-preview-icon {
        width: 44px; height: 44px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    .course-preview-bar {
        height: 6px;
        border-radius: 3px;
        background: #f0f0f0;
        margin-top: 5px;
    }
    .course-preview-bar-fill {
        height: 100%;
        border-radius: 3px;
        background: linear-gradient(90deg, #a435f0, #f69c08);
    }

    /* CATEGORIAS */
    .categories-section { padding: 4rem 0; background: #f7f9fa; }
    .section-header { margin-bottom: 2.5rem; }
    .section-label {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #a435f0;
        margin-bottom: 0.5rem;
    }
    .section-title { font-size: 1.8rem; font-weight: 800; color: #1c1d1f; }
    .category-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.25s;
        text-decoration: none;
        color: inherit;
        display: block;
    }
    .category-card:hover {
        border-color: #a435f0;
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(164,53,240,0.12);
        color: inherit;
    }
    .category-icon {
        width: 56px; height: 56px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
    }
    .category-name { font-weight: 800; font-size: 0.9rem; color: #1c1d1f; }
    .category-count { font-size: 0.78rem; color: #888; margin-top: 2px; }

    /* CURSOS */
    .courses-section { padding: 4rem 0; }
    .course-card {
        border: 1px solid #e8e8e8;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.25s;
        background: #fff;
        height: 100%;
    }
    .course-card:hover {
        box-shadow: 0 12px 28px rgba(0,0,0,0.1);
        transform: translateY(-4px);
    }
    .course-card-thumb {
        height: 160px;
        display: flex; align-items: center; justify-content: center;
        font-size: 3rem;
        position: relative;
    }
    .course-badge-modal {
        position: absolute;
        top: 0.75rem; right: 0.75rem;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 0.25rem 0.6rem;
        border-radius: 30px;
    }
    .course-card-body { padding: 1.25rem; }
    .course-category-tag {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #a435f0;
        margin-bottom: 0.4rem;
    }
    .course-title { font-weight: 800; font-size: 0.95rem; color: #1c1d1f; line-height: 1.4; margin-bottom: 0.6rem; }
    .course-meta { font-size: 0.78rem; color: #888; display: flex; gap: 1rem; }
    .course-price { font-weight: 800; font-size: 1.1rem; color: #1c1d1f; }
    .course-price-old { font-size: 0.8rem; color: #aaa; text-decoration: line-through; }

    /* COMO FUNCIONA */
    .how-section { padding: 4rem 0; background: #1c1d1f; }
    .how-step-number {
        width: 48px; height: 48px;
        border-radius: 50%;
        background: var(--ec-primary, #a435f0);
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 1.1rem;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem;
    }
    .how-step-title { font-weight: 800; color: #fff; font-size: 1rem; }
    .how-step-desc { color: #888; font-size: 0.85rem; line-height: 1.6; }

    /* CTA */
    .cta-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, #a435f0, #6910a8);
        text-align: center;
    }
    .cta-section h2 { color: #fff; font-size: 2rem; font-weight: 900; }
    .cta-section p { color: rgba(255,255,255,0.8); font-size: 1rem; }
    .btn-cta-white {
        background: #fff;
        color: #a435f0;
        font-weight: 800;
        padding: 0.75rem 2.5rem;
        border-radius: 8px;
        border: none;
        font-size: 1rem;
        transition: all 0.2s;
    }
    .btn-cta-white:hover { background: #f0e0ff; color: #6910a8; }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6" style="position:relative;z-index:1">
                <div class="hero-badge">
                    <i class="bi bi-lightning-charge-fill"></i> + de 500 cursos disponíveis
                </div>
                <h1 class="hero-title">
                    Aprenda as habilidades <span class="highlight">do futuro</span>, hoje.
                </h1>
                <p class="hero-subtitle">
                    Cursos online, EAD e presenciais com certificado reconhecido.
                    Do iniciante ao especialista — no seu ritmo.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#cursos" class="btn btn-primary-ec btn-lg px-4" style="background:#a435f0;border:none;border-radius:8px;font-weight:800;color:#fff">
                        Explorar cursos <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="#" class="btn btn-lg px-4" style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);color:#fff;border-radius:8px;font-weight:700">
                        <i class="bi bi-play-circle me-1"></i> Como funciona
                    </a>
                </div>
                <div class="hero-stats">
                    <div>
                        <div class="hero-stat-value">12k+</div>
                        <div class="hero-stat-label">Alunos ativos</div>
                    </div>
                    <div style="width:1px;background:#333"></div>
                    <div>
                        <div class="hero-stat-value">500+</div>
                        <div class="hero-stat-label">Cursos</div>
                    </div>
                    <div style="width:1px;background:#333"></div>
                    <div>
                        <div class="hero-stat-value">98%</div>
                        <div class="hero-stat-label">Satisfação</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1" style="position:relative;z-index:1">
                <div class="hero-image-area">
                    <div style="color:#888;font-size:0.7rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:1rem">
                        <i class="bi bi-mortarboard-fill me-1" style="color:#f69c08"></i> Seus cursos em andamento
                    </div>
                    <div class="hero-course-preview">
                        <div class="course-preview-icon" style="background:#e8f5e9">🐍</div>
                        <div style="flex:1">
                            <div style="font-size:0.85rem;font-weight:700;color:#1c1d1f">Python para Data Science</div>
                            <div class="course-preview-bar"><div class="course-preview-bar-fill" style="width:72%"></div></div>
                            <div style="font-size:0.7rem;color:#888;margin-top:3px">72% concluído</div>
                        </div>
                    </div>
                    <div class="hero-course-preview">
                        <div class="course-preview-icon" style="background:#e3f2fd">⚛️</div>
                        <div style="flex:1">
                            <div style="font-size:0.85rem;font-weight:700;color:#1c1d1f">React do Zero ao Avançado</div>
                            <div class="course-preview-bar"><div class="course-preview-bar-fill" style="width:40%"></div></div>
                            <div style="font-size:0.7rem;color:#888;margin-top:3px">40% concluído</div>
                        </div>
                    </div>
                    <div class="hero-course-preview" style="margin-bottom:0">
                        <div class="course-preview-icon" style="background:#fff3e0">🎨</div>
                        <div style="flex:1">
                            <div style="font-size:0.85rem;font-weight:700;color:#1c1d1f">UI/UX Design na Prática</div>
                            <div class="course-preview-bar"><div class="course-preview-bar-fill" style="width:15%"></div></div>
                            <div style="font-size:0.7rem;color:#888;margin-top:3px">15% concluído</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CATEGORIAS --}}
<section class="categories-section">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Explore por área</div>
            <h2 class="section-title">Categorias em destaque</h2>
        </div>
        <div class="row g-3">
            @php
            $cats = [
                ['icon'=>'💻','name'=>'Programação','count'=>'124 cursos','bg'=>'#e8f5e9','color'=>'#2e7d32'],
                ['icon'=>'📊','name'=>'Data Science','count'=>'87 cursos','bg'=>'#e3f2fd','color'=>'#1565c0'],
                ['icon'=>'🎨','name'=>'Design','count'=>'65 cursos','bg'=>'#fce4ec','color'=>'#c62828'],
                ['icon'=>'📱','name'=>'Mobile','count'=>'48 cursos','bg'=>'#fff3e0','color'=>'#e65100'],
                ['icon'=>'🔒','name'=>'Segurança','count'=>'36 cursos','bg'=>'#f3e5f5','color'=>'#6a1b9a'],
                ['icon'=>'📈','name'=>'Negócios','count'=>'59 cursos','bg'=>'#e0f2f1','color'=>'#00695c'],
                ['icon'=>'🤖','name'=>'Inteligência Artificial','count'=>'42 cursos','bg'=>'#e8eaf6','color'=>'#283593'],
                ['icon'=>'🎥','name'=>'Produção de Conteúdo','count'=>'33 cursos','bg'=>'#fff8e1','color'=>'#f57f17'],
            ];
            @endphp
            @foreach($cats as $cat)
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="category-card">
                    <div class="category-icon" style="background:{{ $cat['bg'] }}">
                        {{ $cat['icon'] }}
                    </div>
                    <div class="category-name">{{ $cat['name'] }}</div>
                    <div class="category-count">{{ $cat['count'] }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CURSOS EM DESTAQUE --}}
<section class="courses-section" id="cursos">
    <div class="container">
        <div class="d-flex align-items-end justify-content-between section-header">
            <div>
                <div class="section-label">Mais populares</div>
                <h2 class="section-title">Cursos em destaque</h2>
            </div>
            <a href="#" style="color:#a435f0;font-weight:700;font-size:0.88rem;text-decoration:none">
                Ver todos <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        @php
        $courses = [
            ['emoji'=>'🐍','bg'=>'#e8f5e9','cat'=>'Programação','title'=>'Python para Data Science e Machine Learning','hrs'=>'42h','alunos'=>'8.2k','modal'=>'Online','price'=>'R$ 89,90','old'=>'R$ 199,00'],
            ['emoji'=>'⚛️','bg'=>'#e3f2fd','cat'=>'Front-end','title'=>'React do Zero ao Avançado — 2025','hrs'=>'38h','alunos'=>'6.7k','modal'=>'Online','price'=>'R$ 79,90','old'=>'R$ 189,00'],
            ['emoji'=>'🐘','bg'=>'#f3e5f5','cat'=>'Back-end','title'=>'PHP & Laravel — Aplicações Web Modernas','hrs'=>'50h','alunos'=>'5.1k','modal'=>'EAD','price'=>'R$ 99,90','old'=>'R$ 229,00'],
            ['emoji'=>'🎨','bg'=>'#fce4ec','cat'=>'Design','title'=>'UI/UX Design na Prática com Figma','hrs'=>'24h','alunos'=>'4.3k','modal'=>'Online','price'=>'Grátis','old'=>null],
        ];
        @endphp

        <div class="row g-4">
            @foreach($courses as $c)
            <div class="col-sm-6 col-lg-3">
                <div class="course-card">
                    <div class="course-card-thumb" style="background:{{ $c['bg'] }}">
                        <span style="font-size:3.5rem">{{ $c['emoji'] }}</span>
                        <span class="course-badge-modal badge
                            @if($c['modal']=='Online') badge-online
                            @elseif($c['modal']=='EAD') badge-ead
                            @else badge-presencial @endif">
                            {{ $c['modal'] }}
                        </span>
                    </div>
                    <div class="course-card-body">
                        <div class="course-category-tag">{{ $c['cat'] }}</div>
                        <div class="course-title">{{ $c['title'] }}</div>
                        <div class="course-meta mb-3">
                            <span><i class="bi bi-clock me-1"></i>{{ $c['hrs'] }}</span>
                            <span><i class="bi bi-people me-1"></i>{{ $c['alunos'] }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="course-price">{{ $c['price'] }}</span>
                                @if($c['old'])
                                    <span class="course-price-old ms-1">{{ $c['old'] }}</span>
                                @endif
                            </div>
                            <a href="#" class="btn btn-sm" style="background:#a435f0;color:#fff;border-radius:6px;font-weight:700;font-size:0.75rem">
                                Ver curso
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- COMO FUNCIONA --}}
<section class="how-section">
    <div class="container">
        <div class="text-center mb-4">
            <div class="section-label" style="color:#f69c08">Simples assim</div>
            <h2 class="section-title" style="color:#fff">Como o EduCursos funciona</h2>
        </div>
        <div class="row g-4 text-center">
            @php
            $steps = [
                ['n'=>'1','icon'=>'bi-person-plus','title'=>'Crie sua conta','desc'=>'Cadastro gratuito em menos de 1 minuto. Nenhum cartão necessário.'],
                ['n'=>'2','icon'=>'bi-search','title'=>'Escolha um curso','desc'=>'Mais de 500 cursos em diversas áreas. Filtre por modalidade, categoria ou nível.'],
                ['n'=>'3','icon'=>'bi-play-circle','title'=>'Aprenda no seu ritmo','desc'=>'Acesse as aulas quando e onde quiser. Online, EAD ou presencial.'],
                ['n'=>'4','icon'=>'bi-award','title'=>'Receba seu certificado','desc'=>'Conclusão 100%? Seu certificado é gerado automaticamente e validável.'],
            ];
            @endphp
            @foreach($steps as $s)
            <div class="col-sm-6 col-lg-3">
                <div class="how-step-number">{{ $s['n'] }}</div>
                <i class="bi {{ $s['icon'] }}" style="font-size:2rem;color:#a435f0;margin-bottom:0.75rem;display:block"></i>
                <div class="how-step-title mb-2">{{ $s['title'] }}</div>
                <div class="how-step-desc">{{ $s['desc'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <div class="container">
        <h2 class="mb-3">Pronto para começar?</h2>
        <p class="mb-4">Junte-se a mais de 12.000 alunos que já estão aprendendo.</p>
        <a href="#" class="btn btn-cta-white btn-lg">
            Começar agora — é grátis <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</section>

@endsection
