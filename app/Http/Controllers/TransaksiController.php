<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\NomorSeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        $transaksis = Transaksi::all();

        return view('transaksi.index', compact('transaksis'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        $nomorSeris = NomorSeri::where('used', 0)->get();

        return view('transaksi.create', compact('barangs', 'nomorSeris'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->tanggal = $request->input('tanggal');
        $transaksi->no_trans = $request->input('no_trans');
        $transaksi->customer = $request->input('customer');
        $transaksi->tipe_trans = $request->input('tipe_trans');
        $transaksi->save();

        $detailTransaksi = new DetailTransaksi();
        $detailTransaksi->transaksi_id = $transaksi->id;
        $detailTransaksi->barang_id = $request->input('barang_id');
        $detailTransaksi->serial_no = $request->input('serial_no');
        $detailTransaksi->price = $request->input('price');
        $detailTransaksi->discount = $request->input('discount');
        $detailTransaksi->save();

        $nomorSeri = NomorSeri::where('serial_no', $request->input('serial_no'))->first();
        if ($transaksi->tipe_trans == 'pembelian') {
            $nomorSeri->used = 0;
        } else {
            $nomorSeri->used = 1;
        }
        $nomorSeri->save();

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
    return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'no_trans' => 'required|string|max:255',
            'customer' => 'required|string|max:255',
            'tipe_trans' => 'required|string|in:pembelian,penjualan',
        ]);

        $transaksi->update($validatedData);

        return redirect()->route('transaksi.show', $transaksi->id)->with('success', 'Transaksi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        DetailTransaksi::where('transaksi_id', $id)->delete();
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }


    public function laporan(Request $request)
    {
        $transaksis = Transaksi::query();

        if ($request->has('tipe_trans')) {
            $transaksis->where('tipe_trans', $request->tipe_trans);
        }

        $penjualan = $transaksis->where('tipe_trans', 'penjualan')->get();
        $pembelian = $transaksis->where('tipe_trans', 'pembelian')->get();

        $barang = Barang::all();

        return view('transaksi.laporan', compact('penjualan', 'pembelian', 'barang'));
    }

}
