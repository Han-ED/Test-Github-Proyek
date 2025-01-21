<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }
    public function home(){
        return view('home');
    }

    public function master(){
        return view('master');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $produk = new Product();

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Menyimpan gambar di storage/app/public/images
            $produk->image_path = $imagePath; // Simpan path gambar di database
        }

        $produk->fill($data);
        $produk->save();
        return redirect('/');


        // $validatedData = $request->validate([
        //     'namaProduk' => 'required|string|max:255',
        //     'jenisProduk' => 'required|string|max:255',
        //     'hargaProduk' => 'required|numeric|min:0',
        //     'stokProduk' => 'required|integer|min:0',
        //     'tanggal' => 'required|date',
        // ]);

        // $produk = new Product();
        // $produk->fill($validatedData);
        // $produk->save();

        // return redirect('/');
    }

    public function delete($id){
        //$produk = Product::where('id_produk', $id)->firstOrFail();
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/');
    }

    public function edit($id){
        //$produk = Product::where('id_produk', $id)->firstOrFail();
        $product = Product::findOrFail($id);
        return view('editProduk', [
            'product' => $product
        ]);
    }

    public function update(request $request){
        $data = $request->all();
        $id =  $request->id;
        $product = Product::find($id);
        $product -> fill($data);
        $product -> save();

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Menyimpan gambar di storage/app/public/images
            $product->image_path = $imagePath; // Simpan path gambar di database
        }

        return redirect('/product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
       //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

}
