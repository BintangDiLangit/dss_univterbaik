@extends('layouts.master')
@section('title')
    Data Bobot
@endsection

@section('fp')
    Data
@endsection

@section('linkfp')
    {{ route('bobot.index') }}
@endsection

@section('sp')
    Bobot
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Bobot</h6>
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
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID Bobot</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID Kriteria</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Value Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bobot as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_bobot }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_kriteria }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->valuebobot }}</p>
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
