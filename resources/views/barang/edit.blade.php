@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Barang</h4>
                    </div>
                    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control @error('[product_name]') is-invalid @enderror"
                                    name="product_name" value="{{ $barang->product_name }}">
                                @error('product_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                    name="brand" value="{{ $barang->brand }}">
                                @error('brand')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ $barang->price }}">
                                @error('price')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Model No</label>
                                <input type="text" class="form-control @error('model_no') is-invalid @enderror"
                                    name="model_no" value="{{ $barang->model_no }}">
                                @error('model_no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary my-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
