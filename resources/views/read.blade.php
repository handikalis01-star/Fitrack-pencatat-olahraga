<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h1>Daftar Barang</h1>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('barang.create') }}" class="btn">+ Tambah Barang</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga Satuan</th>
                <th>Total Nilai</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($barangs as $index => $barang)
                <tr>

                    <td>{{ $index + 1 }}</td>


                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->stok }}</td>


                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>

                  
                    <td>Rp {{ number_format($barang->stok * $barang->harga, 0, ',', '.') }}</td>
                </tr>
            @empty
             
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>