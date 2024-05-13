@extends('layouts.app')


@section('content')
    <div class="row mb-5">

        <h2>Data Pasien</h2>
        <hr>
        <h5>Data Pasien Ibu Hamil</h5>
        <div class="table-responsive">
            <table class="table table-borderless">
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                    data-bs-target="#standard-modal">Tambah
                    Pasien Ibu Hamil</button>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIK</td>
                        <td>Tanggal Lahir</td>
                        <td>Nama Suami</td>
                        <td>Berat Badan</td>
                        <td>Lingkar Lengan Atas</td>
                        <td>Alamat</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($mother as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama_lengkap }}</td>
                            <td>{{ $data->nik }}</td>
                            <td>{{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->nama_suami }}</td>
                            <td>{{ $data->berat_badan }}</td>
                            <td>{{ $data->lingkar_lengan_atas }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#updateModal{{ $data->id }}">Update</button>
                                <div id="updateModal{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Tambah Pasien Ibu Hamil
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.updatePasien') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-2">
                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                            class="form-control" required
                                                            value="{{ $data->nama_lengkap }}">
                                                        <input type="hidden" name="id" id="id"
                                                            class="form-control" required value="{{ $data->id }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="nik">NIK</label>
                                                        <input type="number" name="nik" id="nik"
                                                            class="form-control" required value="{{ $data->nik }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                            class="form-control" required
                                                            value="{{ $data->tanggal_lahir }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="nama_suami">Nama Suami</label>
                                                        <input type="text" name="nama_suami" id="nama_suami"
                                                            class="form-control" required value="{{ $data->nama_suami }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="berat_badan">Berat Badan</label>
                                                        <input type="number" name="berat_badan" id="berat_badan"
                                                            class="form-control" required value="{{ $data->berat_badan }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="lingkar_lengan_atas">Lingkar Lengan Atas</label>
                                                        <input type="number" name="lingkar_lengan_atas"
                                                            id="lingkar_lengan_atas" class="form-control" required
                                                            value="{{ $data->lingkar_lengan_atas }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="alamat">Alamat Lengkap</label>
                                                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3">{{ $data->alamat }}</textarea>
                                                    </div>
                                                    <hr>
                                                    <p>Account</p>
                                                    <div class="form-group mb-2">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" value="{{ $data->user->email }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="password">Password</label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control">
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
                                                <p>Apakah Anda Yakin Ingin Menghapus Data Ini ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('admin.deletePasien', ['id' => $data->id]) }}"
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
    </div>
    <div class="row mb-5">
        <h5>Data Pasien Balita</h5>
        <div class="table-responsive">
            <table class="table table-borderless">
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                    data-bs-target="#addChildren">Tambah
                    Pasien Balita</button>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIK</td>
                        <td>Tanggal Lahir</td>
                        <td>Nama Ibu</td>
                        <td>Berat Badan</td>
                        <td>Panjang Badan</td>
                        <td>Alamat</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($balita as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_anak }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->berat_badan }}</td>
                            <td>{{ $item->panjang_badan }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#updateModalBalita{{ $item->id }}">Update</button>
                                <div id="updateModalBalita{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="standard-modalLabel">Tambah Pasien Ibu Hamil
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.updatePasienBalita') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-2">
                                                        <label for="nama_anak">Nama Anak</label>
                                                        <input type="text" name="nama_anak" id="nama_anak" class="form-control" required value="{{ $item->nama_anak }}">
                                                        <input type="text" name="id" id="id" class="form-control" required value="{{ $item->id }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="nik">NIK</label>
                                                        <input type="number" name="nik" id="nik" class="form-control" required value="{{ $item->nik }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="{{ $item->tanggal_lahir }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="nama_ibu">Nama Ibu</label>
                                                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required value="{{ $item->nama_ibu }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="berat_badan">Berat Badan</label>
                                                        <input type="number" name="berat_badan" id="berat_badan" class="form-control" required value="{{ $item->berat_badan }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="panjang_badan">Panjang Badan</label>
                                                        <input type="number" name="panjang_badan" id="panjang_badan"
                                                            class="form-control" required value="{{ $item->panjang_badan }}">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label for="alamat">Alamat Lengkap</label>
                                                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3">{{ $item->alamat }}</textarea>
                                                    </div>
                                                    <hr>
                                                    <p>Account</p>
                                                    <div class="form-group mb-2">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" value="{{ $item->email }}">
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
                                    data-bs-target="#deleteDataBalita{{ $item->id }}">Delete</button>
                                <div id="deleteDataBalita{{ $item->id }}" class="modal fade" tabindex="-1"
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
                                                <p>Apakah Anda Yakin Ingin Menghapus Data Ini ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('admin.deletePasienBalita', ['id' => $item->id]) }}"
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
    </div>
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Tambah Pasien Ibu hamil</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.addPasien') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="nik">NIK</label>
                            <input type="number" name="nik" id="nik" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama_suami">Nama Suami</label>
                            <input type="text" name="nama_suami" id="nama_suami" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="berat_badan">Berat Badan</label>
                            <input type="number" name="berat_badan" id="berat_badan" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="lingkar_lengan_atas">Lingkar Lengan Atas</label>
                            <input type="number" name="lingkar_lengan_atas" id="lingkar_lengan_atas" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <hr>
                        <p>Account</p>
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
    <div id="addChildren" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Tambah Pasien Balita</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.addPasienBalita') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="nama_anak">Nama Anak</label>
                            <input type="text" name="nama_anak" id="nama_anak" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="nik">NIK</label>
                            <input type="number" name="nik" id="nik" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="berat_badan">Berat Badan</label>
                            <input type="number" name="berat_badan" id="berat_badan" class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="panjang_badan">Panjang Badan</label>
                            <input type="number" name="panjang_badan" id="panjang_badan"
                                class="form-control" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <hr>
                        <p>Account</p>
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
