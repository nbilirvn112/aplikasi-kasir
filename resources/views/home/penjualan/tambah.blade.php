@extends('layouts.master');
@section('title', 'Penjualan');
@section('content');
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Data penjualan</h3>
                            <a class="btn btn-warning" href="/penjualan">Kembali</a>
                            </div>  
                            <div class="card-body">
                            <form action="/penjualan/simpan" method="post" enctype="multipart/form-data">
                                @csrf
                            
                              <div class="mb-3">
                                <input
                                 type="hidden"
                                 name="nobon"
                                 value="{{ $penjualan->id }}"
                                 id=""
                                 />
                              </div>

                              <div class="mb-3">
                                <input
                                 type="text"
                                 class="form-controler"
                                 name="id_barang"
                                 placeholder="Kode Barang"
                                 autofocus
                                 id="id_produk"
                                 />
                                 @if (session('error'))
                                 <p style="color : red"><i>Barang tidak di temukan</i></p>
                                 @endif
                              </div>
                              <div class="col-1">
                                <div class="mb-3">
                                    <input 
                                    type="number"
                                    class="form-controler"
                                    name="qty"
                                    min="1"
                                    value="1"
                                    Required
                                    aria-describedby="helpId"
                                    placeholder="">
                                </div>
                                <div class="coll-md-1">
                                    <button type="submit" class="btn btn-primary">check</button>
                                </div>
                              </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No. bon</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Sub Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp
                        @foreach (@$detailpenjualan as $detailpenjualan)
                        @php

                        $subtotal =
                        $detailpenjualan->barang->harga =
                        ($barangCounts[$detailpenjualan->id_produk] ?? 0);

                        $total += subtotal;
                        @endphp

                        <tr class="">
                            <td>{{ $detailpenjualan->nostruk }}</td>
                            <td>{{ $detailpenjualan->produk->namaproduk }}</td>
                            <td>{{ $detailproduk->produk->harga }}</td>
                            <td>{{ $produkcounts[$detailpenjualan->id_produk] ?? 0 }}</td>
                            <td>
                                {{ $detailpenjualan->produk->harga * ($produkcounts[$detailpenjualan->id_produk] ?? 0) }}
                            </td>
                            <td>
                                <a href="/detailpenjualan/delet/{{ $detailpenjualan->id_produk }}/{{ $detailpenjualan->nostruk }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="/penjualan/update/{{ $penjualan->id }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Bayar</label>
                        <input 
                        type="text"
                        class="form-control"
                        name="bayar"
                        id=""
                        aria-describedy="helpId"
                        pleaceholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Total belanja</label>
                        <input 
                        type="text"
                        class="form-control"
                        name="subtotal"
                        value="{{ $total }}"
                        id="subtotal"
                        aria-describedy="helpId"
                        pleaceholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Diskon</label>
                        <input 
                        type="text"
                        class="form-control"
                        name="diskon"
                        id="diskon"
                        aria-describedy="helpId"
                        pleaceholder=""
                        />
                    </div>
                    Total
                    <h1 style="color: black">
                        Rp. {{ number_format($total) }}
                        <br>
                    </h1>
                    <button class="btn btn-primary" type="submit">simpan</button>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection