<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $barcode =$request->input('id_produk');
        $scan = Produk::where('barcode', $barcode)->first();

        if($scan) {

            $qty = $request->input('qty');

            for ($i = 0; $i < $qty; $i++) {

                DetailPenjualan::create([
                    'nobon' => $request->nobon,
                    'id_produk' => $request->scan,
                    'harga' => $request->nobon,
                    'jumlahproduk' => $request->nobon,
                    'subtotal' => $request->nobon,
                    'jumlah' => $request->nobon,
                ]);
            }
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'produk tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan = Penjualan::find($id);
        return view('update', compact('penjualan'));
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
    public function destroy(string $id_produk, $nobon)
    {
        $detail = DetailPenjualan::where('nobon', $nobon)
        ->where('id_produk',$id_produk);

        if ($detail) {
            $detail->delete();
            return redirect()->back()->with('succes', 'Produk berhasil di hapus');
        } else {
            return redirect('/');
        }
    }
}
