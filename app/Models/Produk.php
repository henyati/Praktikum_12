<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;
    // hubungin table produk
    protected $table = 'produk';

    // matiin inputan timestamps
    public $timestamps = false;

    // kolom yang bisa diisi
    protected $fillable = [
        'kode',             // Kode produk
        'nama',             // Nama produk
        'harga_jual',       // Harga jual produk
        'harga_beli',       // Harga beli produk
        'stok',             // Jumlah stok produk
        'min_stok',         // Jumlah minimal stok produk
        'deskripsi',        // Deskripsi produk
        'kategori_produk_id',// ID kategori produk
    ];

    // buat fungsi untuk relasi
    public function kategori_produk() 
    {
        return $this->belongsTo(kategoriProduk::class);
    }

    // bikin code mysql nampilin semua data
    public static function getAllProduk() {
        
        //return DB::table('produk')->get();

        // Mengambil semua data produk dan menggabungkannya dengan kategori produk terkait
        $alldata = DB::table('produk')
            ->join('kategori_produk', 'produk.kategori_produk_id', '=', 'kategori_produk.id')
            ->select('produk.*', 'kategori_produk.nama as nama_kategori')
            ->get();
        return $alldata;
    }
}
