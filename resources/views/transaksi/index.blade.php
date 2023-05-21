@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h4 class="mb-0">Daftar Transaksi</h4>
                        <div class="ml-auto">
                            <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3 mt-3">Tambah Transaksi</a>
                            <a href="{{ route('laporan.index') }}" class="btn btn-secondary mb-3 mt-3">Laporan Transaksi</a>
                        </div>
                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">No. Transaksi</th>
                                <th scope="col">Customer / Vendor</th>
                                <th scope="col">Tipe Transaksi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $key => $t)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $t->tanggal }}</td>
                                    <td>{{ $t->no_trans }}</td>
                                    <td>{{ $t->customer }}</td>
                                    <td>{{ $t->tipe_trans }}</td>
                                    <td>
                                        <a href="{{ route('transaksi.show', $t->id) }}"
                                            class="btn btn-sm btn-info">Detail</a>
                                        <a href="{{ route('transaksi.edit', $t->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
