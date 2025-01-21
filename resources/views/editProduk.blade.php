<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h2>Edit Produk</h2>
    <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nama Produk</label>
            <input type="text" placeholder="Nama Produk" name="Nama_Produk" value="{{$product->Nama_Produk}}">
        </div>
        <div>
            <label for="jenis">Jenis Produk</label>
            <input type="text" placeholder="Jenis Produk" name="Jenis_Product" value="{{$product->Jenis_Product}}">
        </div>
        <div>
            <label for="harga">Harga Produk</label>
            <input type="number" placeholder="Harga Produk" name="Harga" value="{{$product->Harga}}">
        </div>
        <div>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="Tanggal" value="{{$product->Tanggal}}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <input type="hidden" value="{{$product->id}}" name="id">
        <button type="submit">KIRIM</button>
    </form>
</body>
</html>
