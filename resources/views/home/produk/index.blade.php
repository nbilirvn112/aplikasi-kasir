@extends('layouts.master');
@section('title', 'Produk');
@section('content');
<div class="content-wrapper">
    <section class="content">
        <div class="cointaner-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                             @if(session('succes'))
                                <div class="alert alert-info" >
                                    {{ session('succes')}}
                                </div>
                                @endif
                                <h3>Halaman Data produk</h3>
                                <a class="btn btn-primary" href="/produk/tambah">tambahin dongs</a>
                             </div>
                            <div class="card-body">
                                <div class="table-resposive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO .</th>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Nama produk</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Stok</th>
                                                <th scope="col">barcode</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($produk as $produk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('storage/products/'.$produk->gambar) }}" 
                                                    class="rounded" style="width: 50px">
                                                </td>
                                                <td>{{ $produk->nama_produk }}</td>
                                                <td>Rp. {{ number_format($produk->harga) }}</td>
                                                <td>{{ $produk->stok }}</td>
                                                <td>{{ $produk->barcode }}</td>
                                                <td><a class="btn btn-warning "href="/produk/{{ $produk->id }}/show">Edit</a>
                                                    <a class="btn btn-danger "href="/produk/{{ $produk->id }}/delete" 
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