@extends('admin.layouts.app')
@section('konten')
    @if(Auth::user()->role != 'manager' && Auth::user()->role != 'staff')

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/kartu/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="kode" class="form-control" id=""
                                    placeholder="Tambahkan Kode">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="nama" class="form-control" id=""
                                    placeholder="Tambahkan Nama">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="diskon" class="form-control" id=""
                                    placeholder="Tambahkan Diskon">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="iuran" class="form-control" id=""
                                    placeholder="Tambahkan Iuran">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Kartu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <a href="" class="btn btn-lg btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus"></i></a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Diskon</th>
                                <th>Iuran</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Diskon</th>
                                <th>Iuran</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @php $no=1 @endphp
                            @foreach ($kartu as $k)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $k->kode }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>{{ $k->diskon }}</td>
                                    <td>{{ $k->iuran }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        @php
            abort(403, 'Forbidden');
        @endphp
    @endif
@endsection
