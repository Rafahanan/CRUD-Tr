<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Barang;


class LaporanController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
     
        $barangs = Barang::with('nomor_seri')->get();
        $barangTersedia = Barang::whereHas('nomor_seri', function ($query) {
            $query->where('used', 0);
        })
        ->with(['nomor_seri' => function ($query) {
            $query->where('used', 0);
        }])
        ->get();

    

        return view('/laporan.index', compact('barangs', 'transaksi' ));
    }

    public function filter(Request $request)
    {

        $barangs = Barang::with('nomor_seri')->get();
        $barangTersedia = Barang::whereHas('nomor_seri', function ($query) {
            $query->where('used', 0);
        })
        ->with(['nomor_seri' => function ($query) {
            $query->where('used', 0);
        }])
        ->get();

        $validatedData = $request->validate([
            'tipe_trans' => 'nullable|string|in:pembelian,penjualan',
        ]);

        $transaksi = Transaksi::query()
        ->when($validatedData['tipe_trans'] ?? null, function ($query, $tipe_trans) {
            return $query->where('tipe_trans', $tipe_trans);
        })
        ->with('detailTransaksi')
        ->get()
        ->map(function ($transaksi) {
            $totalHarga = $transaksi->detailTransaksi->sum(function ($detailTransaksi) {
                return ($detailTransaksi->price - $detailTransaksi->discount);
            });
            $transaksi->total_harga = $totalHarga;
            return $transaksi;
        });

    return view('laporan.index', compact('transaksi','barangs' ));
    }

    
   


}

