<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    public function edit($id)
    {
        $detailTransaksi = DetailTransaksi::find($id);
        return view('detail_transaksi.edit', compact('detailTransaksi'));
    }

    public function update(Request $request, $id)
    {
        $detailTransaksi = DetailTransaksi::find($id);
        $detailTransaksi->barang_id = $request->barang_id;
        $detailTransaksi->serial_no = $request->serial_no;
        $detailTransaksi->price = $request->price;
        $detailTransaksi->discount = $request->discount;
        $detailTransaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Detail Transaksi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $detailTransaksi = DetailTransaksi::find($id);
        $detailTransaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Detail Transaksi berhasil dihapus.');
    }

    protected $attributes = [
        'nomor_seri_id' => '00',
    ];
}
