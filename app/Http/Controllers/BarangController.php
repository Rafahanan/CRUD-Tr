<?php

namespace App\Http\Controllers;

Use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate(12);
        $barangs = Barang::with('nomor_seri')->get();
        
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $barang = Barang::create($request->only(['product_name', 'brand', 'price', 'model_no']));
            
            if (is_array($request->serial_no)) {
                foreach ($request->serial_no as $serial_no) {
                    $barang->nomor_seri()->create([
                        'serial_no' => $serial_no,
                        'price' => $request->price,
                        'prod_date' => $request->prod_date,
                        'warranty_start' => $request->warranty_start,
                        'warranty_duration' => $request->warranty_duration,
                    ]);
                }
            }

            return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->only(['product_name', 'brand', 'price', 'model_no']));

         if (is_array($request->serial_no)) {
                foreach ($request->serial_no as $serial_no) {
                    $barang->nomor_seri()->create([
                        'serial_no' => $serial_no,
                        'price' => $request->price,
                        'prod_date' => $request->prod_date,
                        'warranty_start' => $request->warranty_start,
                        'warranty_duration' => $request->warranty_duration,
                    ]);
                }
            }

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->nomor_seri()->delete();
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
