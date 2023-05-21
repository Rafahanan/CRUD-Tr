@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tambah Transaksi</h1>
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_trans">No. Trans</label>
                        <input type="text" name="no_trans" id="no_trans" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="customer_vendor">Customer / Vendor</label>
                        <input type="text" name="customer" id="customer" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe_trans">Tipe Trans</label>
                        <select name="tipe_trans" id="tipe_trans" class="form-control" required>
                            <option value="pembelian">Pembelian</option>
                            <option value="penjualan">Penjualan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="barang_id">Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control" required>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->product_name }} - {{ $barang->brand }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="serial_no">Nomor Seri</label>
                        <select name="serial_no" id="serial_no" class="form-control" required>
                            @foreach ($nomorSeris as $nomorSeri)
                                <option value="{{ $nomorSeri->serial_no }}">{{ $nomorSeri->serial_no }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">Diskon</label>
                        <input type="number" name="discount" id="discount" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
