<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kartu;

class KartuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ini adalah controller yang menggunakan tulisan Eloquent ORM
    public function index()
    {
        //
        $kartu = Kartu::all();
        return view ('admin.kartu.index',compact('kartu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menuliskan kode dengan menggunakan karakteristik eloquent
        // Kartu adalah variabel, new adalah pendeklarasikan kelas yang ada dimodel
        // kartu adalah class yang dari model
        $kartu = new Kartu;
        $kartu->kode = $request->kode;
        $kartu->nama = $request->nama;
        $kartu->diskon = $request->diskon;
        $kartu->iuran = $request->iuran;
        // $kartu->updated_at = $request->updated_at;
        $kartu->save();
        return redirect('admin/kartu');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
