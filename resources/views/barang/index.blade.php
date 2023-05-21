@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h4 class="mb-0">Daftar Barang</h4>
                        <div class="ml-auto">
                            <a href="{{ route('barang.create') }}" class="btn btn-primary mr-2">Tambah Barang</a>
                            <a href="{{ route('transaksi.create') }}" class="btn btn-secondary">Beli Barang</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Harga</th>
                                    <th>Nomor Model</th>
                                    <th>Nomor Seri</th>
                                    <th>Tanggal Produksi</th>
                                    <th>Tanggal Garansi Berlaku</th>
                                    <th>Durasi Garansi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    @foreach ($barang->nomor_seri as $nomor_seri)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barang->product_name }}</td>
                                            <td>{{ $barang->brand }}</td>
                                            <td>{{ $barang->price }}</td>
                                            <td>{{ $barang->model_no ?? '-' }}</td>
                                            <td>{{ $nomor_seri->serial_no }}</td>
                                            <td>{{ $nomor_seri->prod_date }}</td>
                                            <td>{{ $nomor_seri->warranty_start }}</td>
                                            <td>{{ $nomor_seri->warranty_duration }} Tahun</td>
                                            <td>{{ $nomor_seri->used ? 'Terpakai' : 'Belum Terpakai' }}</td>
                                            <td>
                                                <div class="btn-group">

                                                    <a href="{{ route('barang.edit', $barang->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('barang.destroy', $barang->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
