<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\JenisProduk;
// use DB;
// library DB ini digunakan ketika menggunakan penulisan QUERY BUILDER
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //index untuk produk
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
            ->select('produk.*', 'jenis_produk.nama as jenis')
            ->get();
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis_produk = DB::table('jenis_produk')->get();
        return view('admin.produk.create', compact('jenis_produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kode' => 'required|unique:produk|max:10',
                'nama' => 'required|max:45',
                'harga_beli' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'stok' => 'required|numeric',
                'min_stok' => 'required|numeric',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ],
            [
                'kode.max' => 'Kode Maksimal 10 Karakter',
                'kode.required' => 'Kode Wajib Diisi!',
                'kode.unique' => 'Kode Tidak Boleh Sama',
                'nama.required' => 'Nama Wajib Diisi!',
                'nama.max' => 'Nama Maksimal 45 Karakter',
                'harga_beli.required' => 'Harga Beli Wajib Diisi!',
                'harga_jual.required' => 'Harga Jual Wajib Diisi!',
                'stok.required' => 'Stok Wajib Diisi!',
                'min_stok.required' => 'Minimal Stok Wajib Diisi!',
                'foto.max' => 'Foto Maksimal 2 MB',
                'foto.mimes' => 'File Ekstensi Hanya Bisa JPG, JPEG, PNG, GIF, dan SVG',
                'foto.image' => 'Foto Harus Berbentuk Image',
            ]
        );

        // proses upload data
        if (!empty($request->foto)) {
            // maka proses berikut yang dijalankan
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            // setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('admin/images'), $fileName);
        } else {
            $fileName = '';
        }

        //Tambah Data Produk
        DB::table('produk')->insert([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'min_stok' => $request->min_stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
            'jenis_produk_id' => $request->jenis_produk_id,
        ]);
        return redirect('admin/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
            ->select('produk.*', 'jenis_produk.nama as jenis')
            ->where('produk.id', $id)
            ->get();

        return view('admin.produk.detail', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //jenis_produk
        $jenis_produk = DB::table('jenis_produk')->get();
        $produk = DB::table('produk')->where('id', $id)->get();
        return view('admin.produk.edit', compact('jenis_produk', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //foto lama
        $fotoLama = DB::table('produk')->select('foto')->where('id', $id)->get();
        foreach ($fotoLama as $f1) {
            $fotoLama = $f1->foto;
        }
        // Jika foto sudah ada yang terupload
        if (!empty($request->foto)) {
            // maka proses berikut yang dijalankan
            if (!empty($fotoLama->foto)) unlink(public_path('admin/images' . $fotoLama->foto));
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            // setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('admin/images'), $fileName);
            // hapus foto lama

        } else {
            $fileName = $fotoLama;
        }
        //Tambah Data Produk
        DB::table('produk')->where('id', $id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'min_stok' => $request->min_stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
            'jenis_produk_id' => $request->jenis_produk_id,
        ]);
        return redirect('admin/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('produk')->where('id', $id)->delete();
        return redirect('admin/produk');
    }
}
