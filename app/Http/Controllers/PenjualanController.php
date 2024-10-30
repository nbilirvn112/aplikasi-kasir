<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\User;
use App\Models\Produk;
use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class penjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::OrderBy('id', 'desc')->get();
        return view('home.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Penjualan::Create([
            'id_user' => Auth::user()->id,
            'status' => 'Belum selesai',
            'total' => 0,
            'diskon' => 0,
            'bayar' => 0,
            'kembali' => 0,
        ]);

        return redirect()->back();
    }

    public function transaksi($id)
    {
        $penjualan = Penjualan::find($id);
        $detailpenjualan = DetailPenjualan::where('nobon', $id)
        ->select('id_produk', 'nobon', 'harga', Db::raw('count(*) as total'))
        ->groupBy('id_produk', 'nobon', 'harga')
        ->get();

        $barangCounts = $detailpenjualan->pluck('total', 'id_Produk');

        return view('home.penjualan.tambah', compact('detailpenjualan','barangCounts', 'penjualan'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Penjualan::create([
     'id_user' => Auth::user()->id,
     'bayar' => 0,
     'status' =>'Belum Selesai',
     'diskon' => 0,
     'total' => 0,
     'kembali' => 0,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Penjualan::find($id);
        return view('home.penjualan.edit', compact('pelanggan', 'penjualan'));
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
       $penjualan = Penjualan::find($id);

       $penjualan->update([
        'total' =>$request->ttl,
        'status' => 'selesai'
       ]);
       return redirect('/penjualan')->with('succes', 'berhasil');
    }

    public function cetak($id)
    {
        $penjualan = Penjualan::with(['barang'])
        ->where($id);
        $produk = Produk::all();
        $penjualan = Penjualan::find($id);
        return view('home.penjualan.struk', compact('penjualan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan = Penjualan::find($id);

        Storage::delete('public/products/' . $penjualan->gambar);

        $penjualan->delete();

        return redirect('/penjualan')->with(['succes' => 'data berhasil di hapus!']);
    }
}
