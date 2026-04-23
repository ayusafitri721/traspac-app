<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TRASPAC App') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-bg: #0f172a;
            --sidebar-bg-2: #102a43;
            --sidebar-line: rgba(255,255,255,.08);
            --sidebar-text: rgba(255,255,255,.78);
            --sidebar-text-strong: #fff;
            --brand-orange: #f59e0b;
            --brand-navy: #0f172a;
            --brand-blue: #1d4ed8;
        }
        body { background: #eef3f9; }
        .app-shell {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .app-header {
            height: 66px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 18px 0 20px;
        }
        .app-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }
        .app-logo {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #fff;
            display: grid;
            place-items: center;
            overflow: hidden;
            box-shadow: 0 10px 22px rgba(29, 78, 216, .18);
            flex: 0 0 42px;
        }
        .app-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }
        .app-logo-fallback {
            display: none;
            width: 100%;
            height: 100%;
            place-items: center;
            background: linear-gradient(135deg, var(--brand-navy), var(--brand-blue));
            color: #fff;
            font-weight: 800;
            font-size: .92rem;
        }
        .app-brand-text {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .app-brand-text .title {
            font-weight: 800;
            letter-spacing: -.02em;
            color: #0f172a;
            line-height: 1.1;
        }
        .app-brand-text .subtitle {
            color: #94a3b8;
            font-size: .82rem;
            line-height: 1.1;
        }
        .app-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .app-body {
            flex: 1;
            display: flex;
            min-height: 0;
        }
        .sidebar {
            min-height: 100vh;
            color: #0f172a;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            box-shadow: 10px 0 30px rgba(15, 23, 42, .04);
        }
        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 12px 24px rgba(29, 78, 216, .18);
            flex: 0 0 36px;
        }
        .brand-mark img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }
        .brand-mark-fallback {
            display: none;
            width: 100%;
            height: 100%;
            place-items: center;
            background: linear-gradient(135deg, #1d4ed8, #14b8a6);
            color: #fff;
            font-size: .78rem;
            font-weight: 800;
        }
        .sidebar .nav-link {
            color: #334155;
            border-radius: 14px;
            padding: .8rem .95rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar .nav-link:hover {
            color: #0f172a;
            background: #f8fafc;
        }
        .sidebar .nav-link.active {
            color: #0f172a;
            background: #dbeafe;
            border: 1px solid #93c5fd;
        }
        .sidebar .section-label {
            color: #94a3b8;
            font-size: .75rem;
            letter-spacing: .12em;
            text-transform: uppercase;
        }
        .tree-list {
            max-height: 280px;
            overflow: auto;
            padding-right: 4px;
        }
        .tree-list a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: .55rem .7rem;
            border-radius: 12px;
            color: #334155;
            text-decoration: none;
        }
        .tree-list a:hover {
            color: #0f172a;
            background: #f8fafc;
        }
        .tree-list a.active {
            color: #0f172a;
            background: #dbeafe;
            border: 1px solid #93c5fd;
            font-weight: 700;
        }
        .tree-list a::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #94a3b8;
            flex: 0 0 6px;
        }
        .tree-list a.active::before {
            background: #1d4ed8;
        }
        .sidebar .bi {
            color: #475569;
        }
        .sidebar .nav-link.active .bi,
        .sidebar .nav-link:hover .bi {
            color: #1e40af;
        }
        main .bi {
            font-size: 1rem !important;
            line-height: 1;
            vertical-align: middle;
        }
        main .btn .bi,
        main .badge .bi,
        main .nav-link .bi,
        main .dropdown-toggle .bi {
            font-size: .95rem !important;
        }
        main .fs-1,
        main .fs-2,
        main .fs-3,
        main .fs-4,
        main .fs-5,
        main .fs-6 {
            font-size: inherit !important;
        }
        .topbar {
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 18px;
            background: rgba(255,255,255,.8);
            backdrop-filter: blur(12px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, .05);
        }
        .topbar .brand {
            font-weight: 800;
            letter-spacing: -.02em;
        }
        .topbar .subtitle {
            color: #64748b;
            font-size: .86rem;
        }
        .topnav {
            position: sticky;
            top: 0;
            z-index: 1020;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(12px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, .04);
        }
        .topnav .brand {
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--brand-navy);
        }
        .topnav .subtitle {
            color: #64748b;
            font-size: .86rem;
        }
    </style>
    @stack('styles')
</head>
<body>
@php
    $traspacLogoSvg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 213" role="img" aria-label="TRASPAC software company">
    <rect width="900" height="213" fill="#ffffff"/>
    <g transform="translate(0, 8)">
        <text x="18" y="105"
              font-family="Arial, Helvetica, sans-serif"
              font-size="98"
              font-weight="800"
              letter-spacing="-4"
              fill="#2f58b8">TRASPAC</text>
        <text x="181" y="182"
              font-family="Arial, Helvetica, sans-serif"
              font-size="64"
              font-weight="800"
              fill="#f59e0b">software company</text>
    </g>
</svg>
SVG;
    $traspacLogoDataUri = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($traspacLogoSvg);
@endphp
<div class="app-shell">
    <header class="app-header">
        <div class="app-brand">
            <div class="app-logo">
                <img src="{{ $traspacLogoDataUri }}" alt="TRASPAC logo">
                <div class="app-logo-fallback">TR</div>
            </div>
            <div class="app-brand-text">
                <div class="title">TRASPAC App</div>
            </div>
        </div>
        <div class="app-user">
            <form action="{{ route('logout') }}" method="POST" class="m-0" id="logoutForm">
                @csrf
                <button type="submit" class="btn btn-outline-secondary rounded-3 fw-semibold px-3" id="logoutButton">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <div class="app-body">
        <aside class="col-lg-2 sidebar p-3 p-xl-4">
            <div class="section-label mb-2">Main Menu</div>
            <nav class="nav flex-column gap-1 mb-4">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('pegawai.*') && !request()->filled('unit_kerja_id') ? 'active' : '' }}" href="{{ route('pegawai.index') }}">
                    <i class="bi bi-people"></i> Pegawai
                </a>
            </nav>
            <hr class="border-secondary border-opacity-10 my-3">
            <div class="section-label mb-2">Unit Kerja</div>
            <button class="btn btn-link text-decoration-none p-0 w-100 d-flex align-items-center justify-content-between mb-2"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#unitKerjaMenu"
                    aria-expanded="{{ request()->filled('unit_kerja_id') ? 'true' : 'false' }}"
                    aria-controls="unitKerjaMenu">
                <span class="fw-semibold">Lihat unit kerja</span>
                <i class="bi bi-chevron-down small"></i>
            </button>
            @php
                $selectedUnitKerja = $selectedUnitKerja ?? request('unit_kerja_id');
                $showUnitKerjaMenu = request()->filled('unit_kerja_id') || filled($selectedUnitKerja);
            @endphp
            <div class="collapse {{ $showUnitKerjaMenu ? 'show' : '' }}" id="unitKerjaMenu">
                <div class="tree-list small">
                    @foreach(\App\Models\UnitKerja::orderBy('nama')->get() as $uk)
                        <a href="{{ route('pegawai.index', ['unit_kerja_id' => $uk->id]) }}" class="{{ (string) $selectedUnitKerja === (string) $uk->id ? 'active' : '' }}">
                            <span>{{ $uk->nama }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </aside>
        <main class="col-lg-10 p-4 p-xl-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('login_success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: @json(session('login_success')),
        confirmButtonColor: '#102a43'
    });
    @endif

    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: @json(session('success')),
        confirmButtonColor: '#102a43'
    });
    @endif

    const logoutForm = document.getElementById('logoutForm');
    const logoutButton = document.getElementById('logoutButton');
    if (logoutForm && logoutButton) {
        logoutForm.addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                icon: 'question',
                title: 'Logout?',
                text: 'Kamu akan keluar dari aplikasi.',
                showCancelButton: true,
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#102a43',
                cancelButtonColor: '#64748b'
            }).then(result => {
                if (result.isConfirmed) {
                    logoutForm.submit();
                }
            });
        });
    }
</script>
@stack('scripts')
</body>
</html>
