<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Keluar</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Barang Keluar</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangKeluar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>{{ $item->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>