<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // jalanin fungsi getAllProduk
       $produk = Produk::getAllProduk();

       // kirim datanya
       return view('admin.produk.produk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // isi nya data dari tabel kategori
        $kategori_produk = KategoriProduk::all();

        // isi data dari produk
        $produk = Produk::all();

        // kirim data ke view
        return view('admin.produk.create', compact('kategori_produk', 'produk'));
    }

    /**
     * Simpan sumber daya yang baru dibuat di penyimpanan.
     */
    public function store(Request $request)
    {
         //membuat tambah data
         $produk = new Produk;
         // mengases data kode didatabase  = inputan dari user
         $produk->kode = $request->kode;
         $produk->nama = $request->nama;
         $produk->harga_jual = $request->harga_jual;
         $produk->harga_beli = $request->harga_beli;
         $produk->stok = $request->stok;
         $produk->min_stok = $request->min_stok;
         $produk->deskripsi = $request->deskripsi;
         $produk->kategori_produk_id = $request->kategori_produk_id;
         // untuk menyimpan data dari user inputan ke database
         $produk->save();
         // alihin ke data produk
         return redirect('produk');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //arahkan ke halaman edit
        $kategori_produk = KategoriProduk::all();
        $produk = Produk::where('id', $id)->get();
        return view('admin.produk.edit', compact(
            'produk',
            'kategori_produk'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $produk = Produk::find($request->id);
        $produk->kode = $request->kode;
        $produk->nama = $request->nama;
        $produk->harga_jual = $request->harga_jual;
        $produk->harga_beli = $request->harga_beli;
        $produk->stok = $request->stok;
        $produk->min_stok = $request->min_stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori_produk_id = $request->kategori_produk_id;
        $produk->save();
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari bdata berdasarkan id trs simpan ke variabel produk
        $produk = Produk::find($id);
        // hapus data nya
        $produk->delete();
        // balikin kehalaman tabel produk
        return redirect('produk');

    }
}
