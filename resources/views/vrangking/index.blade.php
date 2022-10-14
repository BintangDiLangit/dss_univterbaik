@extends('layouts.master')
@section('title')
    Data VRangking
@endsection

@section('fp')
    Data
@endsection

@section('linkfp')
    {{ route('vrangking') }}
@endsection

@section('sp')
    VRangking
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data VRangking</h6>
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
                                        ID Alternatif</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Alternatif</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vrangking as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_alternatif }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->nm_alternatif }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->rangking }}</p>
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
