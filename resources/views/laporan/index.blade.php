@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <h4 class=" mb-0">Persediaan Barang</h4>
                    @if ($barangs->isEmpty())
                        <p>Tidak ada barang tersedia saat ini.</p>
                    @else
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Barang</th>
                                    <th>Merek</th>
                                    <th>Harga</th>
                                    <th>Nomor Model</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    <tr>
                                        <td>{{ $barang->id }}</td>
                                        <td>{{ $barang->product_name }}</td>
                                        <td>{{ $barang->brand }}</td>
                                        <td>{{ $barang->price }}</td>
                                        <td>{{ $barang->model_no }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class=" mb-0">Laporan Penjualan atau Pembelian</h4>
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <div class="ml-auto">
                            <form action="{{ route('laporan.filter') }}" method="GET">
                                <div class="form-group mb-4">
                                    <label for="tipe_trans">Tipe Transaksi</label>
                                    <select name="tipe_trans" id="tipe_trans" class="form-control">
                                        <option value="">Semua</option>
                                        <option value="pembelian" @if (request('tipe_trans') == 'pembelian') selected @endif>
                                            Pembelian</option>
                                        <option value="penjualan" @if (request('tipe_trans') == 'penjualan') selected @endif>
                                            Penjualan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('laporan.index') }}" class="btn btn-danger">Reset</a>
                            </form>

                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Penjualan / Pembelian</th>
                                        <th>No. Trans</th>
                                        <th>Customer / Vendor</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $transaksi)
                                        <tr>
                                            <td>{{ $transaksi->tanggal }}</td>
                                            <td>{{ $transaksi->tipe_trans == 'penjualan' ? 'Penjualan' : 'Pembelian' }}
                                            </td>
                                            <td>{{ $transaksi->no_trans }}</td>
                                            <td>{{ $transaksi->customer }}</td>
                                            <td>$ {{ number_format($transaksi->total_harga) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
