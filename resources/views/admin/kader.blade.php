@extends('layouts.app')

@section('content')
    <div class="row">
        <table class="table table-borderless">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                data-bs-target="#addKader">Tambah
                Kader Kesehatan</button>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($kader as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal"
                                data-bs-target="#updateModal{{ $data->id }}">Update</button>
                            <div id="updateModal{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="standard-modalLabel">Update Data Kader Kesehatan
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.updateKaderKesehatan') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <label for="name">Nama Kader</label>
                                                    <input type="text" name="name" id="name" class="form-control" required value="{{$data->name}}">
                                                    <input type="hidden" name="id" id="id" class="form-control" value="{{$data->id}}" required>
                                                    <input type="hidden" name="jenis_pasien" id="jenis_pasien" class="form-control" value="kader" required>
                                                    <input type="hidden" name="level" id="level" class="form-control" value="kader" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" required value="{{$data->email}}">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password" class="form-control">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                                data-bs-target="#deleteData{{ $data->id }}">Delete</button>
                            <div id="deleteData{{ $data->id }}" class="modal fade" tabindex="-1"
                                role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="standard-modalLabel">Tambah Pasien Ibu Hamil
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="{{ route('admin.deleteKader', ['id' => $data->id]) }}"
                                                class="btn btn-danger">Delete</a>

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="addKader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Tambah Kader</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.addKaderKesehatan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Nama Kader</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <input type="hidden" name="jenis_pasien" id="jenis_pasien" class="form-control" value="kader" required>
                        <input type="hidden" name="level" id="level" class="form-control" value="kader" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection