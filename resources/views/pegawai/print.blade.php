<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #0f172a;
            --blue: #1d4ed8;
            --blue-soft: #eaf1ff;
            --line: #dbe3ee;
            --muted: #64748b;
        }
        body {
            background: #f3f7fc;
            color: var(--ink);
        }
        .report-shell {
            max-width: 1600px;
            margin: 0 auto;
        }
        .report-card {
            background: #fff;
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 20px;
            box-shadow: 0 16px 38px rgba(15, 23, 42, .06);
            overflow: hidden;
        }
        .report-header {
            padding: 18px 20px 16px;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.15), transparent 24%),
                linear-gradient(135deg, #0f172a 0%, #102a43 45%, #1d4ed8 100%);
            color: #fff;
        }
        .brand-line {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            border-radius: 12px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.12);
        }
        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #fff;
            overflow: hidden;
            display: grid;
            place-items: center;
            box-shadow: 0 10px 18px rgba(0,0,0,.16);
            flex: 0 0 38px;
        }
        .brand-mark img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }
        .company-name {
            font-size: .95rem;
            font-weight: 800;
            letter-spacing: -.02em;
            line-height: 1.1;
        }
        .company-subtitle {
            color: rgba(255,255,255,.76);
            font-size: .8rem;
            line-height: 1.2;
        }
        .report-title {
            font-size: clamp(1.35rem, 2vw, 1.8rem);
            font-weight: 800;
            letter-spacing: -.04em;
            line-height: 1.05;
            margin: 10px 0 8px;
        }
        .report-description {
            color: rgba(255,255,255,.82);
            max-width: 72ch;
            line-height: 1.5;
            font-size: .9rem;
        }
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
            margin-top: 14px;
        }
        .meta-item {
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 12px;
            padding: 10px 12px;
        }
        .meta-label {
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: rgba(255,255,255,.70);
            margin-bottom: 3px;
            font-weight: 700;
        }
        .meta-value {
            font-size: .86rem;
            font-weight: 700;
            line-height: 1.35;
        }
        .report-body {
            padding: 14px 18px 18px;
        }
        .summary-strip {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
            margin-bottom: 12px;
        }
        .summary-box {
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #f8fbff;
            padding: 10px 12px;
        }
        .summary-label {
            color: var(--muted);
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .summary-value {
            font-size: .98rem;
            font-weight: 800;
            color: var(--ink);
            letter-spacing: -.03em;
        }
        .table-wrap {
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
        }
        .report-card,
        .report-header,
        .summary-strip,
        .summary-box,
        .table-wrap {
            break-inside: avoid;
            page-break-inside: avoid;
        }
        table {
            margin: 0;
            width: 100%;
            table-layout: fixed;
        }
        thead {
            display: table-header-group;
        }
        thead th {
            background: #eff5ff !important;
            color: var(--ink) !important;
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            padding: 9px 10px !important;
            border-bottom: 1px solid var(--line) !important;
            white-space: nowrap;
        }
        tbody td {
            padding: 8px 10px !important;
            vertical-align: middle;
            border-color: #edf2f7 !important;
            font-size: .84rem;
        }
        tbody tr:nth-child(even) {
            background: #fbfdff;
        }
        tbody tr {
            break-inside: avoid;
            page-break-inside: avoid;
        }
        .no-print {
            margin-bottom: 14px;
        }
        .btn-soft {
            border-radius: 12px;
            font-weight: 700;
            padding: .65rem .95rem;
        }
        .stamp {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--blue-soft);
            color: var(--blue);
            font-weight: 700;
            font-size: .8rem;
        }
        @media print {
            body {
                background: #fff;
            }
            .no-print {
                display: none !important;
            }
            .report-shell {
                max-width: none;
                margin: 0;
            }
            .report-card {
                border: 0;
                border-radius: 0;
                box-shadow: none;
                overflow: visible;
            }
            .report-header {
                border-radius: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .report-body {
                padding-top: 12px;
            }
            .summary-strip {
                margin-bottom: 10px;
            }
            .table-wrap {
                overflow: visible;
            }
            table {
                font-size: .8rem;
            }
            .summary-value {
                font-size: .92rem;
            }
            .report-title {
                margin-bottom: 6px;
            }
            .report-description {
                margin-bottom: 6px;
            }
            thead th {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                padding: 8px 8px !important;
            }
            tbody td {
                padding: 7px 8px !important;
            }
            @page {
                size: landscape;
                margin: 6mm;
            }
        }
    </style>
</head>
<body class="p-3 p-lg-4">
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
              fill="#2f58b8">software company</text>
    </g>
</svg>
SVG;
    $traspacLogoDataUri = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($traspacLogoSvg);
@endphp
    <div class="report-shell">
        <div class="no-print d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <div class="stamp">
                <i class="bi bi-printer"></i>
                Print Preview
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('pegawai.index', request()->query()) }}" class="btn btn-outline-secondary btn-soft">Kembali</a>
                <button class="btn btn-primary btn-soft" onclick="window.print()">Print</button>
            </div>
        </div>

        <div class="report-card">
            <div class="report-header">
                <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
                    <div class="brand-line">
                        <div class="brand-mark">
                            <img src="{{ $traspacLogoDataUri }}" alt="TRASPAC logo">
                        </div>
                        <div>
                            <div class="company-name">PT. TRASPAC Makmur Sejahtera</div>
                            <div class="company-subtitle">Employee Management</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="stamp bg-white text-primary">
                            Laporan Data Pegawai
                        </div>
                    </div>
                </div>

                <div class="report-title">Laporan Data Pegawai</div>
                <div class="report-description">
                    Rekap daftar pegawai yang diformat khusus untuk dicetak, dengan tampilan ringkas, rapi, dan mudah dibaca oleh atasan maupun admin.
                </div>

                <div class="meta-grid">
                    <div class="meta-item">
                        <div class="meta-label">Tanggal Cetak</div>
                        <div class="meta-value">{{ now()->format('d F Y, H:i') }}</div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Filter Unit Kerja</div>
                        <div class="meta-value">
                            {{ $selectedUnitKerja ? optional($unitKerja->firstWhere('id', $selectedUnitKerja))->nama : 'Semua Unit Kerja' }}
                        </div>
                    </div>
                    <div class="meta-item">
                        <div class="meta-label">Jumlah Data</div>
                        <div class="meta-value">{{ $pegawai->count() }} Pegawai</div>
                    </div>
                </div>
            </div>

            <div class="report-body">
                <div class="summary-strip">
                    <div class="summary-box">
                        <div class="summary-label">Total Pegawai</div>
                        <div class="summary-value">{{ $pegawai->count() }}</div>
                    </div>
                    <div class="summary-box">
                        <div class="summary-label">Filter Aktif</div>
                        <div class="summary-value">{{ $selectedUnitKerja ? 'Unit Kerja' : 'Semua Data' }}</div>
                    </div>
                    <div class="summary-box">
                        <div class="summary-label">Format</div>
                        <div class="summary-value">Landscape A4</div>
                    </div>
                </div>

                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm align-middle">
                            <thead>
                                <tr>
                                    <th style="width:4%">No</th>
                                    <th style="width:9%">NIP</th>
                                    <th style="width:13%">Nama</th>
                                    <th style="width:10%">Jabatan</th>
                                    <th style="width:11%">Unit Kerja</th>
                                    <th style="width:9%">Tempat Tugas</th>
                                    <th style="width:7%">L/P</th>
                                    <th style="width:9%">Tgl Lahir</th>
                                    <th style="width:10%">No HP</th>
                                    <th style="width:18%">NPWP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pegawai as $i => $p)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td class="fw-semibold">{{ $p->nip }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->jabatan?->nama }}</td>
                                    <td>{{ $p->unitKerja?->nama }}</td>
                                    <td>{{ $p->tempat_tugas }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->tgl_lahir?->format('d-m-Y') }}</td>
                                    <td>{{ $p->no_hp }}</td>
                                    <td>{{ $p->npwp }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center text-secondary py-5">
                                        Tidak ada data pegawai untuk dicetak.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
