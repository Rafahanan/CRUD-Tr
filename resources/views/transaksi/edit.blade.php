@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Transaksi</h1>
                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                            value="{{ $transaksi->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label for="no_trans">No. Trans</label>
                        <input type="text" name="no_trans" id="no_trans" class="form-control"
                            value="{{ $transaksi->no_trans }}">
                    </div>
                    <div class="form-group">
                        <label for="customer">Customer / Vendor</label>
                        <input type="text" name="customer" id="customer" class="form-control"
                            value="{{ $transaksi->customer }}">
                    </div>
                    <div class="form-group">
                        <label for="tipe_trans">Tipe Trans</label>
                        <select name="tipe_trans" id="tipe_trans" class="form-control">
                            <option value="pembelian" @if ($transaksi->tipe_trans == 'pembelian') selected @endif>Pembelian</option>
                            <option value="penjualan" @if ($transaksi->tipe_trans == 'penjualan') selected @endif>Penjualan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-danger mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
