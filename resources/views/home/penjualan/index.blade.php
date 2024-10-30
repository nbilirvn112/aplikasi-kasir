@extends('layouts.master');
@section('title', 'Penjualan');
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
                                <h3>Halaman Data penjualan</h3>
                                <a class="btn btn-primary" href="/penjualan/tambah">tambahin dongs</a>
                             </div>
                            <div class="card-body">
                                <div class="table-resposive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No .</th>
                                                <th scope="col">kasir</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Bayar</th>
                                                <th scope="col">Diskon</th>
                                                <th scope="col">Kembali</th>
                                                <th scope="col">Tanggal Transaksi</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Actor</th>
                                                
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($penjualan as $penjualan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penjualan->user}}</td>
                                                <td>{{ $penjualan->total }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $penjualan->created_at }}</td>
                                          
                                                <td>
                                                    @if ($penjualan->status == 'Belum selesai')
                                                    <a class="btn btn-primary" href="/penjualan/transaksi/{{ $penjualan->id }}">Lengkapi transaksi</a>
                                                    @else ($penjualan->status == 'Selesai')
                                                    <a class="btn btn-primary" href="/penjualan/struk/{{ $penjualan->id }}">Cetak struk</a>
                                                    
                                                    @endif
                                                
                                                    <td><a class="btn btn-danger "href="/penjualan/{{ $penjualan->id }}/delete" 
                                                        oneclick="return confirm('yakin mau hapus? ')">delete</a>
                                            </tr></td>

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