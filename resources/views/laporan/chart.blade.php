@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Laporan Penjualan dan Pembelian</h1>
                <form action="{{ route('laporan.chart') }}" method="get">
                    <div class="form-group">
                        <label for="month">Pilih Bulan:</label>
                        <select class="form-control" id="month" name="month">
                            <option value="">Semua</option>
                            @foreach ($months as $m)
                                <option value="{{ $m->month }}"
                                    {{ (old('month') ?? $month) == $m->month ? 'selected' : '' }}>{{ $m->month }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day">Pilih Hari:</label>
                        <input type="date" class="form-control" id="day" name="day"
                            value="{{ isset($day) ? \Carbon\Carbon::parse($day)->format('Y-m-d') : old('day') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </form>
                <hr>
                <h2>Grafik Penjualan dan Pembelian</h2>
                <canvas id="penjualanPembelianChart"></canvas>
                <hr>
                <h2>Grafik Profit</h2>

                <canvas id="myChart"></canvas>
            </div>

            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: [{
                            label: 'Total Harga',
                            data: {!! json_encode($data) !!},
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
