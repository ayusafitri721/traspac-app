<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      @media print { .no-print { display: none; } @page { size: landscape; } }
    </style>
</head>
<body class="p-4">
    <div class="no-print mb-3 d-flex gap-2">
        <a href="{{ route('pegawai.index', request()->query()) }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary" onclick="window.print()">Print</button>
    </div>
    <div class="text-center mb-4">
        <h4 class="mb-0">PT. TRASPAC Makmur Sejahtera</h4>
        <div>Laporan Data Pegawai</div>
        @if($selectedUnitKerja)
            <div class="small">Filter Unit Kerja: {{ optional($unitKerja->firstWhere('id', $selectedUnitKerja))->nama }}</div>
        @endif
    </div>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th><th>NIP</th><th>Nama</th><th>Tempat Lahir</th><th>Tgl Lahir</th><th>L/P</th>
                <th>Gol</th><th>Eselon</th><th>Jabatan</th><th>Tempat Tugas</th><th>Agama</th>
                <th>Unit Kerja</th><th>No HP</th><th>NPWP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $i => $p)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $p->nip }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->tempat_lahir }}</td>
                <td>{{ $p->tgl_lahir?->format('d-m-Y') }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->golongan?->kode }}</td>
                <td>{{ $p->eselon?->kode }}</td>
                <td>{{ $p->jabatan?->nama }}</td>
                <td>{{ $p->tempat_tugas }}</td>
                <td>{{ $p->agama?->nama }}</td>
                <td>{{ $p->unitKerja?->nama }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>{{ $p->npwp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
