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
        @if ($kategori)
            <p>Kategori: {{ $kategori->nama }}</p>
        @endif
        @if ($tipeEvent)
            <p>Tipe Event: {{ $tipeEvent }}</p>
        @endif
        <p>Tanggal cetak: {{ $date }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th class="text-center" width="4%">No</th>
                <th width="12%">Tanggal Event</th>
                <th width="13%">Tipe Event</th>
                <th width="16%">Tanaman</th>
                <th width="14%">Kategori</th>
                <th width="13%">Lokasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $event)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($event->tgl_event)->format('d/m/Y') }}</td>
                <td>{{ $event->tipe_event }}</td>
                <td>{{ $event->plant->nama_tanaman ?? '-' }}</td>
                <td>{{ $event->plant->kategori->nama ?? '-' }}</td>
                <td>{{ $event->lokasi }}</td>
                <td>{{ $event->keterangan ?: '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="no-data">Belum ada data event.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>