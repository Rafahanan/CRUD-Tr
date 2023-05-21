@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Transaksi</h1>
                <table class="table">
                    <tbody>

                        <tr>
                            <td>Tanggal</td>
                            <td>{{ $transaksi->tanggal }}</td>
                        </tr>
                        <tr>
                            <td>No. Trans</td>
                            <td>{{ $transaksi->no_trans }}</td>
                        </tr>
                        <tr>
                            <td>Customer / Vendor</td>
                            <td>{{ $transaksi->customer }}</td>
                        </tr>
                        <tr>
                            <td>Tipe Trans</td>
                            <td>{{ $transaksi->tipe_trans }}</td>
                        </tr>
                        @if ($transaksi->detailTransaksi)
                            @foreach ($transaksi->detailTransaksi as $detailTransaksi)
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>{{ $detailTransaksi->barang->product_name }}</td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td>{{ $detailTransaksi->barang->brand }}</td>
                                </tr>
                                <tr>
                                    <td>No. Model</td>
                                    <td>{{ $detailTransaksi->barang->model_no }}</td>
                                </tr>
                                <tr>
                                    <td>No. Serial</td>
                                    <td>{{ $detailTransaksi->serial_no }}</td>
                                </tr>

                                <tr>
                                    <td>Price</td>
                                    <td>{{ $detailTransaksi->price }}</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>{{ $detailTransaksi->discount }}</td>
                                </tr>
                    </tbody>
                    @endforeach
                    @endif

                </table>
                <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
