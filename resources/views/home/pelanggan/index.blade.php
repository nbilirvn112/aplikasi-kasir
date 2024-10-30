@extends('layouts.master');
@section('title', 'pelanggan');
@section('content');
<div class="content-wrapper">
    <section class="content">
        <div class="cointaner-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                             <h3>Halaman Data pelanggan</h3>
                             <a class="btn btn-primary" href="/pelanggan/tambah">Tambah</a>
                             </div>
                            <div class="card-body">
                                <div class="table-resposive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">NO</th> 
                                                <th scope="col">Nama pelanggan</th>
                                                <th scope="col">alamat</th>
                                                <th scope="col">no telp</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pelanggan as $pelanggan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pelanggan->nama_pelanggan }}</td>
                                                <td>{{ $pelanggan->alamat }}</td>
                                                <td>{{ $pelanggan->no_telp }}</td>
                                                <td><a class="btn btn-warning "href="/pelanggan/{{ $pelanggan->id }}/show">Edit</a>
                                                    <a class="btn btn-danger "href="/pelanggan/{{ $pelanggan->id }}/delete" 
                                                        oneclick="return confirm('yakin mau hapus? ')">delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection