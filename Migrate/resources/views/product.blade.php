<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10" width="100%">
        <thead>
            <tr>
                <th>Image :</th>
                <th>Nama Produk :</th>
                <th>Jenis Produk :</th>
                <th>Harga Produk :</th>
                <th>Tanggal :</th>
                <th>Delete?</th>
                <th>Edit?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $data)
            <tr>
                <td><img src="{{ asset('storage/' . $data->image_path) }}" alt="" style="max-width: 15%; height:auto;"></td>
                <td>{{$data->Nama_Produk}}</td>
                <td>{{$data->Jenis_Product}}</td>
                <td>{{$data->Harga}}</td>
                <td>{{$data->Tanggal}}</td>
                <td>
                    <form action="{{ route('product.delete', $data->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('product.edit', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger btn-sm">Edit</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
    <button><a href="/NewProduct">New Product</button>
</body>
</html>
