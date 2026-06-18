<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #222; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; font-size: 16px; }
        .header p { margin: 2px 0; font-size: 11px; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 6px 8px; text-align: left; vertical-align: top; }
        th { background-color: #f0f0f0; }
        .text-center { text-align: center; }
        .no-data { text-align: center; padding: 20px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $title }}</h2>
        <p>Tanggal cetak: {{ $date }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="25%">Nama Kategori</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $kategori)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>{{ $kategori->deskripsi ?: '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="no-data">Belum ada data kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>