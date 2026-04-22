<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | {{ config('app.name', 'TRASPAC Employee Management') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --bg: #eef3f9;
            --panel: #ffffff;
            --ink: #0f172a;
            --muted: #64748b;
            --line: #d9e2ec;
            --navy: #102a43;
            --blue: #1d4ed8;
            --teal: #0f766e;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: var(--ink);
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(29, 78, 216, .10), transparent 26%),
                radial-gradient(circle at bottom right, rgba(15, 118, 110, .10), transparent 22%),
                var(--bg);
        }
        .shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
        }
        .frame {
            width: min(1240px, 100%);
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            border-radius: 24px;
            overflow: hidden;
            background: var(--panel);
            border: 1px solid rgba(15, 23, 42, .08);
            box-shadow: 0 28px 80px rgba(15, 23, 42, .12);
        }
        .hero {
            padding: 54px 56px;
            background:
                linear-gradient(135deg, rgba(16, 42, 67, .98), rgba(30, 64, 175, .96)),
                radial-gradient(circle at top right, rgba(255,255,255,.14), transparent 28%);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            width: fit-content;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.14);
            font-size: .82rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }
        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #fff;
            opacity: .9;
        }
        .title {
            margin: 26px 0 14px;
            font-size: clamp(2.2rem, 4.2vw, 3.8rem);
            line-height: 1.02;
            letter-spacing: -.04em;
            font-weight: 800;
            max-width: 11ch;
        }
        .copy {
            max-width: 52ch;
            color: rgba(255,255,255,.78);
            line-height: 1.8;
            font-size: 1rem;
        }
        .feature-row {
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }
        .feature {
            padding: 16px;
            border-radius: 16px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.10);
        }
        .feature strong {
            display: block;
            font-size: .94rem;
            margin-bottom: 4px;
        }
        .feature span {
            display: block;
            color: rgba(255,255,255,.72);
            line-height: 1.5;
            font-size: .88rem;
        }
        .login-panel {
            padding: 54px 50px;
            background: #fff;
        }
        .form-wrap {
            max-width: 420px;
            margin: 0 auto;
        }
        .eyebrow {
            color: var(--blue);
            font-size: .82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
        }
        .form-title {
            margin: 10px 0 8px;
            font-size: 2rem;
            line-height: 1.15;
            letter-spacing: -.03em;
            font-weight: 800;
        }
        .form-copy {
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 28px;
        }
        .form-label {
            color: #334155;
            font-weight: 600;
            font-size: .92rem;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 14px;
            border: 1px solid var(--line);
            padding: 14px 16px;
            box-shadow: none !important;
            font-size: .98rem;
        }
        .form-control:focus {
            border-color: rgba(29, 78, 216, .45);
            box-shadow: 0 0 0 .22rem rgba(29, 78, 216, .08) !important;
        }
        .login-btn {
            border: 0;
            border-radius: 14px;
            padding: 14px 18px;
            font-weight: 700;
            background: linear-gradient(135deg, rgba(16, 42, 67, .98), rgba(30, 64, 175, .96));
            box-shadow: 0 14px 24px rgba(16, 42, 67, .20);
        }
        .login-btn:hover { filter: brightness(.98); }
        .meta {
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid #e5ebf2;
            color: var(--muted);
            font-size: .9rem;
        }
        .alert { border-radius: 14px; }
        @media (max-width: 992px) {
            .frame { grid-template-columns: 1fr; }
            .hero, .login-panel { padding: 32px 24px; }
            .feature-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="shell">
    <div class="frame">
        <section class="hero">
            <div>
                <div class="brand"><span class="dot"></span> PT. TRASPAC Makmur Sejahtera</div>
                <h1 class="title">Employee Management</h1>
                <p class="copy">
                    Sistem pengelolaan pegawai untuk administrasi internal yang rapi, cepat, dan mudah digunakan.
                </p>
            </div>

            <div class="feature-row">
                <div class="feature">
                    <strong>Admin only</strong>
                    <span>Akses login tunggal untuk pengelolaan data.</span>
                </div>
                <div class="feature">
                    <strong>Clean workflow</strong>
                    <span>Fokus pada data, tanpa tampilan yang ramai.</span>
                </div>
                <div class="feature">
                    <strong>Professional</strong>
                    <span>Desain corporate yang cocok untuk sistem perusahaan.</span>
                </div>
            </div>
        </section>

        <section class="login-panel">
            <div class="form-wrap">
                <div class="eyebrow">Admin Access</div>
                <div class="form-title">Masuk ke sistem</div>
                <div class="form-copy">
                    Gunakan kredensial admin untuk membuka dashboard dan data pegawai.
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Toggle password visibility">
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary login-btn w-100">Masuk</button>
                </form>

                <div class="meta">Login hanya tersedia untuk admin sistem.</div>
            </div>
        </section>
    </div>
</div>
<script>
    @if(session('login_success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: @json(session('login_success')),
        confirmButtonColor: '#102a43'
    });
    @endif

    @if(session('login_error'))
    Swal.fire({
        icon: 'error',
        title: 'Gagal Login',
        text: @json(session('login_error')),
        confirmButtonColor: '#102a43'
    });
    @endif

    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');

    togglePassword.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        togglePasswordIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
    });
</script>
</body>
</html>
