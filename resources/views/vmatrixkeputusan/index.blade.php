@extends('layouts.master')
@section('title')
    Data VMatrixKeputusan
@endsection

@section('fp')
    Data
@endsection

@section('linkfp')
    {{ route('vmatrixkeputusan') }}
@endsection

@section('sp')
    VMatrixKeputusan
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data VMatrixKeputusan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        No.</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        ID VMatrixKeputusan</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        ID Alternatif</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Nama Alternatif</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        ID Kriteria</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Nama Kriteria</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        ID Bobot</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Value Bobot</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Nilai</th>
                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Nama Skala</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vmatrixkeputusan as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_matrix }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_alternatif }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->nm_alternatif }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_kriteria }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->nm_kriteria }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_bobot }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->valuebobot }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->nilai }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->nm_skala }}</p>
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
