<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Text Analysis SISKO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #0f172a;
            --muted: #64748b;
            --surface: rgba(255, 255, 255, .86);
            --surface-solid: #ffffff;
            --border: rgba(15, 23, 42, .08);
            --brand: #2563eb;
            --brand-2: #7c3aed;
        }
        * {
            font-family: 'Inter', sans-serif;
        }
        body {
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, .12), transparent 32%),
                radial-gradient(circle at top right, rgba(124, 58, 237, .10), transparent 26%),
                linear-gradient(180deg, #f8fbff 0%, #eef4ff 100%);
            min-height: 100vh;
        }
        .hero {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 28px;
            background: var(--surface);
            backdrop-filter: blur(16px);
            box-shadow: 0 18px 50px rgba(15, 23, 42, .08);
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: auto -80px -80px auto;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(37, 99, 235, .14), transparent 70%);
            pointer-events: none;
        }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--brand);
            background: rgba(37, 99, 235, .08);
            border: 1px solid rgba(37, 99, 235, .12);
            padding: .45rem .75rem;
            border-radius: 999px;
        }
        .hero-title {
            letter-spacing: -.04em;
            line-height: .98;
        }
        .hero-copy {
            color: var(--muted);
            max-width: 56rem;
        }
        .metric-card {
            border: 1px solid var(--border);
            border-radius: 20px;
            background: rgba(255, 255, 255, .72);
            box-shadow: 0 8px 20px rgba(15, 23, 42, .04);
        }
        .metric-label {
            font-size: .82rem;
            color: var(--muted);
        }
        .metric-value {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -.03em;
        }
        .surface-card {
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--surface);
            backdrop-filter: blur(12px);
            box-shadow: 0 16px 38px rgba(15, 23, 42, .08);
        }
        .section-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .section-kicker {
            font-size: .78rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 700;
        }
        .section-title {
            font-weight: 800;
            letter-spacing: -.03em;
            margin-bottom: .25rem;
        }
        .section-desc {
            color: var(--muted);
            margin-bottom: 0;
            font-size: .94rem;
        }
        .action-chip {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            border-radius: 999px;
            padding: .4rem .7rem;
            font-size: .8rem;
            font-weight: 600;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #334155;
        }
        .article-box {
            max-height: 420px;
            overflow-y: auto;
            white-space: pre-wrap;
            line-height: 1.85;
            background: var(--surface-solid);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 1.1rem 1.15rem;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.7);
        }
        .article-box::-webkit-scrollbar {
            width: 10px;
        }
        .article-box::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
            border: 2px solid #fff;
        }
        .section-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }
        .page-title {
            letter-spacing: -0.03em;
        }
        .form-control {
            border-radius: 14px;
            border-color: #dbe4f0;
            padding: .8rem .95rem;
        }
        .form-control:focus {
            border-color: rgba(37, 99, 235, .45);
            box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .12);
        }
        .btn {
            border-radius: 14px;
            padding: .8rem 1rem;
            font-weight: 700;
        }
        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            border: none;
        }
        .btn-success {
            background: linear-gradient(135deg, #16a34a, #0f766e);
            border: none;
        }
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #f97316);
            border: none;
            color: #111827;
        }
        .btn-soft {
            background: #fff;
            border: 1px solid #dbe4f0;
            color: #334155;
        }
        .result-banner {
            border-radius: 18px;
            padding: .95rem 1rem;
            border: 1px solid transparent;
        }
        .result-banner.info {
            background: rgba(37, 99, 235, .08);
            border-color: rgba(37, 99, 235, .15);
        }
        .result-banner.success {
            background: rgba(22, 163, 74, .08);
            border-color: rgba(22, 163, 74, .15);
        }
        .result-banner.warning {
            background: rgba(245, 158, 11, .10);
            border-color: rgba(245, 158, 11, .18);
        }
        .table {
            overflow: hidden;
            border-radius: 18px;
        }
        .table thead th {
            background: #0f172a !important;
            color: #fff;
            border-color: #0f172a !important;
        }
        mark {
            padding: .08em .2em;
            border-radius: .35rem;
            color: inherit;
        }
        .empty-state {
            border: 1px dashed #cbd5e1;
            border-radius: 18px;
            background: #f8fafc;
            padding: 1rem;
            color: var(--muted);
        }
        @media (min-width: 992px) {
            .position-lg-sticky {
                position: sticky;
            }
        }
    </style>
</head>
<body>
<div class="container py-4 py-lg-5">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-11">
            <div class="hero p-4 p-lg-5 mb-4 mb-lg-5">
                <div class="row align-items-center g-4 position-relative">
                    <div class="col-lg-8">
                        <div class="eyebrow mb-3">Text Analysis App</div>
                        <h1 class="hero-title display-5 fw-bold mb-3">Analisis artikel SISKO dalam satu halaman yang cepat dipahami.</h1>
                        <p class="hero-copy mb-0">
                            Cari kata, ganti kata, dan urutkan kata unik tanpa pindah halaman. Hasil aksi langsung tampil dengan highlight yang jelas sehingga lebih mudah dibaca.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="row g-3">
                            <div class="col-6 col-lg-12">
                                <div class="metric-card p-3">
                                    <div class="metric-label">Mode</div>
                                    <div class="metric-value">Single page</div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="metric-card p-3">
                                    <div class="metric-label">Highlight</div>
                                    <div class="metric-value">Kuning / Hijau</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 align-items-start">
                <div class="col-12 col-lg-7">
                    <div class="card surface-card h-100">
                        <div class="card-body">
                            <div class="section-head">
                                <div>
                                    <div class="section-kicker">Konten dasar</div>
                                    <h5 class="section-title mb-1">Artikel SISKO</h5>
                                    <p class="section-desc">Artikel asli ditampilkan utuh dalam box scrollable. Di desktop, konten tetap di sisi kiri agar fokus baca lebih natural.</p>
                                </div>
                                <div class="d-none d-md-flex align-items-start">
                                    <span class="action-chip">Teks sumber utama</span>
                                </div>
                            </div>
                            <div class="article-box">{!! nl2br(e($article)) !!}</div>

                            @if(isset($searchCount))
                                <div class="result-banner info mt-4">
                                    <div class="fw-bold mb-1">Preview pencarian aktif</div>
                                    Kata ditemukan sebanyak <strong>{{ $searchCount }}</strong> kali.
                                </div>
                                <div class="article-box mt-3">{!! $searchResultArticle !!}</div>
                            @elseif(isset($replaceResultArticle))
                                <div class="result-banner success mt-4">
                                    <div class="fw-bold mb-1">Preview penggantian aktif</div>
                                    Semua kata yang cocok sudah diganti.
                                </div>
                                <div class="article-box mt-3">{!! $replaceResultArticle !!}</div>
                            @endif

                            @if(isset($sortedWords))
                                <div class="result-banner warning mt-4">
                                    <div class="fw-bold mb-1">Preview pengurutan aktif</div>
                                    Total jumlah kata unik: <strong>{{ count($sortedWords) }}</strong>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-striped align-middle mb-0">
                                        <thead class="table-dark">
                                        <tr>
                                            <th style="width:80px;">No</th>
                                            <th>Kata Unik</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sortedWords as $index => $word)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $word }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="position-lg-sticky" style="top: 1.5rem;">
                        <div class="card surface-card mb-4">
                            <div class="card-body">
                                <div class="section-head">
                                    <div>
                                        <div class="section-kicker">Aksi 1</div>
                                        <h5 class="section-title">Pencarian kata</h5>
                                        <p class="section-desc">Masukkan kata lalu klik cari untuk menyorot semua kemunculan kata tersebut secara case-insensitive.</p>
                                    </div>
                                </div>
                                <form action="{{ route('text-analysis.search') }}" method="POST" class="d-grid gap-3">
                                    @csrf
                                    <div>
                                        <label class="form-label fw-semibold text-secondary">Kata yang dicari</label>
                                        <input type="text" name="search_word" value="{{ $searchWord ?? old('search_word') }}" class="form-control" placeholder="contoh: SISKO">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                                @if(isset($searchCount))
                                    <div class="result-banner info mt-4 mb-3">
                                        <div class="fw-bold mb-1">Hasil pencarian</div>
                                        Kata ditemukan sebanyak <strong>{{ $searchCount }}</strong> kali.
                                    </div>
                                    <div class="article-box">{!! $searchResultArticle !!}</div>
                                @else
                                    <div class="empty-state mt-4">
                                        Hasil pencarian akan tampil di panel kiri setelah Anda menekan tombol <strong>Cari</strong>.
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card surface-card mb-4">
                            <div class="card-body">
                                <div class="section-head">
                                    <div>
                                        <div class="section-kicker">Aksi 2</div>
                                        <h5 class="section-title">Penggantian kata</h5>
                                        <p class="section-desc">Ganti kata lama menjadi kata baru dan lihat versi artikel hasil penggantian langsung.</p>
                                    </div>
                                </div>
                                <form action="{{ route('text-analysis.replace') }}" method="POST" class="d-grid gap-3">
                                    @csrf
                                    <div>
                                        <label class="form-label fw-semibold text-secondary">Kata yang ingin diganti</label>
                                        <input type="text" name="replace_from" value="{{ $replaceFrom ?? old('replace_from') }}" class="form-control" placeholder="contoh: adalah">
                                    </div>
                                    <div>
                                        <label class="form-label fw-semibold text-secondary">Kata pengganti</label>
                                        <input type="text" name="replace_to" value="{{ $replaceTo ?? old('replace_to') }}" class="form-control" placeholder="contoh: ialah">
                                    </div>
                                    <button type="submit" class="btn btn-success">Ganti</button>
                                </form>
                                @if(isset($replaceResultArticle))
                                    <div class="result-banner success mt-4 mb-3">
                                        <div class="fw-bold mb-1">Hasil penggantian</div>
                                        Semua kata yang cocok sudah diganti dan kata hasil penggantian diberi highlight hijau.
                                    </div>
                                    <div class="article-box">{!! $replaceResultArticle !!}</div>
                                @else
                                    <div class="empty-state mt-4">
                                        Hasil penggantian akan tampil di panel kiri setelah Anda menekan tombol <strong>Ganti</strong>.
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card surface-card">
                            <div class="card-body">
                                <div class="section-head">
                                    <div>
                                        <div class="section-kicker">Aksi 3</div>
                                        <h5 class="section-title">Pengurutan kata</h5>
                                        <p class="section-desc">Ambil kata unik, bersihkan tanda baca, lalu tampilkan dalam urutan alfabetis.</p>
                                    </div>
                                </div>
                                <form action="{{ route('text-analysis.sort') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning w-100">Urutkan Kata</button>
                                </form>
                                @if(isset($sortedWords))
                                    <div class="result-banner warning mt-4 mb-3">
                                        <div class="fw-bold mb-1">Hasil pengurutan</div>
                                        Total jumlah kata unik: <strong>{{ count($sortedWords) }}</strong>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped align-middle mb-0">
                                            <thead class="table-dark">
                                            <tr>
                                                <th style="width:80px;">No</th>
                                                <th>Kata Unik</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sortedWords as $index => $word)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $word }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="empty-state mt-4">
                                        Daftar kata unik akan tampil di panel kiri setelah Anda menekan tombol <strong>Urutkan Kata</strong>.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
