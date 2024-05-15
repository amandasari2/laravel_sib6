<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;
    // memanggil table yang akan digunakan
    protected $table = 'jenis_produk';

    // manggil kolom yang ada di table (sesuai dengan yang ada di dalam table)
    protected $fillable = ['nama'];

    // penanda atau pemanggilan class produk untuk relas one to many
    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
