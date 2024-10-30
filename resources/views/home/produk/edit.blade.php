@extends('layouts.master');
@section('title', 'Produk');
@section('content');
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Edit Data produk</h3>
                            <a class="btn btn-primary" href="/produk">Kembali</a>
                            </div>  
                            <div class="card-body">
                            <form action="/produk/{{ $produk->id }}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">gambar</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                    
                                        name="gambar"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">nama produk</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        values="{{ old('nama_produk',$produk->nama_produk)}}"
                                        name="nama_produk"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('nama_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                
                                </div>

        
                                <div class="mb-3">
                                    <label for="" class="form-label"> harga</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        values="{{ old('harga',$produk->harga)}}"
                                        name="harga"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('harga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <div class="mb-3">
                                    <label for="" class="form-label"> stok</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        values="{{ old('stok',$produk->stok)}}"
                                        name="stok"
                                        id=""
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('stok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    

                                <button class="btn btn-primary" type="submit">update</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection