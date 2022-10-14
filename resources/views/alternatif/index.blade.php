@extends('layouts.master')
@section('title')
    Data Alternatif
@endsection

@section('fp')
    Data
@endsection

@section('linkfp')
    {{ route('alternatif.index') }}
@endsection

@section('sp')
    Alternatif
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
                data-bs-target="#exampleModalMessage">
                Tambah Data Alternatif
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="{{ route('alternatif.store') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Nama Alternatif:</label>
                                    <input type="text" name="nama_alternatif" class="form-control" id="">
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
                    <h6>Daftar Data Alternatif</h6>
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
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatif as $item)
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
                                        <td class="text-xs text-center font-weight-bold">
                                            <button type="button" class="btn bg-gradient-success btn-sm-block mb-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateAlternatif{{ $item->id_alternatif }}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="updateAlternatif{{ $item->id_alternatif }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalMessageTitle{{ $item->id_alternatif }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel{{ $item->id_alternatif }}">Edit Data
                                                                Alternatif</h5>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('alternatif.update', $item->id_alternatif) }}"
                                                            method="post">
                                                            <div class="modal-body">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Nama
                                                                        Alternatif:</label>
                                                                    <input type="text" name="nama_alternatif"
                                                                        class="form-control"
                                                                        value="{{ $item->nm_alternatif }}" id="">
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
                                                data-bs-target="#modal-notification{{ $item->id_alternatif }}">Hapus
                                            </button>
                                            <div class="modal fade" id="modal-notification{{ $item->id_alternatif }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="modal-notification{{ $item->id_alternatif }}"
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
                                                        <form
                                                            action="{{ route('alternatif.destroy', $item->id_alternatif) }}"
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
