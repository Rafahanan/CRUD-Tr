<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NomorSeri;

class NomorSeriController extends Controller
{
    public function updateStatus($id)
    {
        $nomorSeri = NomorSeri::find($id);
        $nomorSeri->used = 1;
        $nomorSeri->save();

        return redirect()->route('transaksi.index')->with('success', 'Status Nomor Seri berhasil diupdate.');
    }
    
}