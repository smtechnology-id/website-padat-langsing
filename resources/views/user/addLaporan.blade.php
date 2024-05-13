@extends('layouts.app')

@section('content')
    <div class="row">
        <h3>Tambah Laporan Harian</h3>
        <hr>
        <form action="{{ route('user.addLaporanPost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="tanggal">Tanggal</label>
                <table class="table table-borderless">
                    <tr>
                        <td>Hari</td>
                        <td>:</td>
                        <td>{{ $tanggalSekarang->format('l') }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>{{ $tanggalSekarang->format('d') }} {{ $tanggalSekarang->format('F') }},
                            {{ $tanggalSekarang->format('Y') }}</td>
                    </tr>
                </table>

            </div>
            <div class="form-group mb-2">
                <label for="jumlah_dimakan">Jumlah yang Dimakan</label>
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_dimakan" id="quarter_portion"
                                    value="1/4 Porsi">
                                <label class="form-check-label" for="quarter_portion">
                                    1/4 Porsi
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_dimakan" id="half_portion"
                                    value="1/2 Porsi">
                                <label class="form-check-label" for="half_portion">
                                    1/2 Porsi
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_dimakan" id="quarters_portion"
                                    value="3/4 Porsi">
                                <label class="form-check-label" for="three-quarters_portion">
                                    3/4 Porsi
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_dimakan" id="one_portion"
                                    value="3/4 Porsi">
                                <label class="form-check-label" for="one_portion">
                                    1 Porsi
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group mb-2">
                <label for="foto_jumlah_dimakan">Foto Jumlah yang Dimakan</label>
                <input type="file" name="foto_jumlah_dimakan" id="foto_jumlah_dimakan" class="form-control" required
                    accept="image/*">
            </div>
            <div class="form-group mb-2">
                <label for="alasan">Alasan</label>
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alasan" id="quarter_portion"
                                    value="Tidak Suka">
                                <label class="form-check-label" for="quarter_portion">
                                    Tidak Suka
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alasan" id="quarter_portion"
                                    value="Tidak Nafsu Makan">
                                <label class="form-check-label" for="quarter_portion">
                                    Tidak Nafsu Makan
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alasan" id="quarter_portion"
                                    value="Sudah kenyang">
                                <label class="form-check-label" for="quarter_portion">
                                    Sudah kenyang
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alasan" id="quarter_portion"
                                    value="Sedang sakit">
                                <label class="form-check-label" for="quarter_portion">
                                    Sedang sakit
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group mb-2">
                <label for="jumlah_tidak_dimakan">Jumlah yang Tidak Dimakan</label>
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_tidak_dimakan"
                                    id="quarter_portion" value="1/4 Porsi">
                                <label class="form-check-label" for="quarter_portion">
                                    1/4 Porsi
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_tidak_dimakan"
                                    id="quarter_portion" value="1/2 Porsi">
                                <label class="form-check-label" for="quarter_portion">
                                    1/2 Porsi
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_tidak_dimakan"
                                    id="quarter_portion" value="3/4 Porsi">
                                <label class="form-check-label" for="quarter_portion">
                                    3/4 Porsi
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jumlah_tidak_dimakan"
                                    id="quarter_portion" value="3/4 Porsi">
                                <label class="form-check-label" for="quarter_portion">
                                    1 Porsi
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group mb-2">
                <label for="foto_jumlah_tidak_dimakan">Foto Jumlah yang Tidak Dimakan</label>
                <input type="file" name="foto_jumlah_tidak_dimakan" id="foto_jumlah_tidak_dimakan"
                    class="form-control" required accept="image/*">
            </div>
            <div class="form-group mb-2">
                <label for="foto_jumlah_tidak_dimakan">
                    @if (Auth::user()->jenis_pasien == 'ibu')
                        Apakah Ibu sudah meminum obat tambah darah
                        @else
                        Apakah Anak sudah meminum minum Taburia 
                    @endif
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaan_tambahan"
                                        id="quarter_portion" value="Ya">
                                    <label class="form-check-label" for="quarter_portion">
                                        Ya
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaan_tambahan"
                                        id="quarter_portion" value="Tidak">
                                    <label class="form-check-label" for="quarter_portion">
                                        Tidak
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </label>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
@endsection
