@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Menambah Barang</div>
                    <form method="POST" action="{{ route('barang.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control @error('[product_name]') is-invalid @enderror"
                                    name="product_name" value="{{ old('product_name') }}">
                                @error('product_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                    name="brand" value="{{ old('brand') }}">
                                @error('brand')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Model No</label>
                                <input type="text" class="form-control @error('model_no') is-invalid @enderror"
                                    name="model_no" value="{{ old('model_no') }}">
                                @error('model_no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Serial No</label>
                                <div id="serial-no-container">
                                    <input type="text" class="form-control @error('serial_no') is-invalid @enderror"
                                        name="serial_no[]" value="{{ old('serial_no.0') }}" required>
                                </div>
                                <button type="button" class="btn btn-secondary my-4" id="add-serial-no">Add
                                    More</button>
                                @error('serial_no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Prod Date</label>
                                <input type="date" class="form-control @error('prod_date') is-invalid @enderror"
                                    name="prod_date" value="{{ old('prod_date') }}">
                                @error('prod_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warranty Start</label>
                                <input type="date" class="form-control @error('warranty_start') is-invalid @enderror"
                                    name="warranty_start" value="{{ old('warranty_start') }}">
                                @error('warranty_start')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warranty Durration(Years)</label>
                                <input type="number" class="form-control @error('warranty_duration') is-invalid @enderror"
                                    name="warranty_duration" value="{{ old('warranty_duration') }}">
                                @error('warranty_duration')
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


<script>
    document.getElementById('add-serial-no').addEventListener('click', function() {
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'serial_no[]';
        input.required = true;
        input.value = generateSerialNo();

        var container = document.querySelector('form div:last-child');
        container.insertBefore(input, this);
    });

    function generateSerialNo() {
        var characters = '0123456789';
        var serialNo = 'I';
        for (var i = 0; i < 5; i++) {
            var index = Math.floor(Math.random() * characters.length);
            serialNo += characters[index];
        }
        return serialNo;
    }
</script>
