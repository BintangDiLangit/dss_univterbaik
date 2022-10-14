@extends('layouts.master')
@section('title')
    Data Kriteria
@endsection

@section('fp')
    Data
@endsection

@section('linkfp')
    {{ route('kriteria.index') }}
@endsection

@section('sp')
    Kriteria
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
                data-bs-target="#exampleModalMessage">
                Tambah Data Kriteria
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="{{ route('kriteria.store') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Nama Kriteria:</label>
                                    <input type="text" name="nama_kriteria" class="form-control" id="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary"
                                    data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Kriteria</h6>
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
                                        ID Kriteria</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Kriteria</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria as $item)
                                    <tr>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->id_kriteria }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-center font-weight-bold">{{ $item->nm_kriteria }}</p>
                                        </td>
                                        <td class="text-xs text-center font-weight-bold">
                                            <button type="button" class="btn bg-gradient-success btn-sm-block mb-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateKriteria{{ $item->id_kriteria }}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="updateKriteria{{ $item->id_kriteria }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalMessageTitle{{ $item->id_kriteria }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel{{ $item->id_kriteria }}">Edit Data
                                                                Kriteria</h5>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('kriteria.update', $item->id_kriteria) }}"
                                                            method="post">
                                                            <div class="modal-body">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Nama
                                                                        Kriteria:</label>
                                                                    <input type="text" name="nama_kriteria"
                                                                        class="form-control"
                                                                        value="{{ $item->nm_kriteria }}" id="">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary"
                                                                    data-bs-dismiss="modal">Kembali</button>
                                                                <button type="submit"
                                                                    class="btn bg-gradient-primary">Edit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-block bg-gradient-warning mb-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification{{ $item->id_kriteria }}">Hapus
                                            </button>
                                            <div class="modal fade" id="modal-notification{{ $item->id_kriteria }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="modal-notification{{ $item->id_kriteria }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modal-title-notification">Hapus
                                                                Data</h6>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('kriteria.destroy', $item->id_kriteria) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="py-3 text-center">
                                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                                    <h4 class="text-gradient text-danger mt-4">Apakah anda
                                                                        yakin untuk menghapus data ini?</h4>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                                <button type="button"
                                                                    class="btn btn-secondary text-white ml-auto"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
