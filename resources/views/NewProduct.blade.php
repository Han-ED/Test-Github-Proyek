<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Nama Produk</label>
            <input type="text" placeholder="Nama Produk" name="Nama_Produk">
        </div>
        <div>
            <label for="jenis">Jenis Produk</label>
            <input type="text" placeholder="Jenis Produk" name="Jenis_Product">
        </div>
        <div>
            <label for="harga">Harga Produk</label>
            <input type="number" placeholder="Harga Produk" name="Harga">
        </div>
        <div>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="Tanggal">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit">KIRIM</button>
    </form>
</body>
</html>
