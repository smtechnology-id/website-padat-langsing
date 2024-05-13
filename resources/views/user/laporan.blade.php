@extends('layouts.app')

@section('content')
    <div class="row">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Tanggal</td>
                    <td>Detail Laporan</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($laporan as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                data-bs-target="#detailLaporan{{ $data->id }}">Lihat Laporan</button>
                            <div id="detailLaporan{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="standard-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="standard-modalLabel">Detail Laporan</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td>{{ $data->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>:</td>
                                                    <td>{{ $data->tanggal }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Yang Dimakan</td>
                                                    <td>:</td>
                                                    <td><b>{{ $data->jumlah_dimakan }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Yang Tidak Dimakan</td>
                                                    <td>:</td>
                                                    <td><b>{{ $data->jumlah_tidak_dimakan }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alasan</td>
                                                    <td>:</td>
                                                    <td><b>{{ $data->alasan }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @if (Auth::user()->jenis_pasien == 'ibu')
                                                            Obat Tambah Darah
                                                        @else
                                                            Minum Taburia
                                                        @endif
                                                    </td>
                                                    <td>:</td>
                                                    <td><b>{{ $data->pertanyaan_tambahan }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Foto Jumlah Dimakan</td>
                                                    <td>:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><img
                                                            style="width: 350px; height: 100%; object-fit: cover;"
                                                            src="{{ asset('storage/laporan/' . $data->foto_jumlah_dimakan) }}"
                                                            alt="" srcset=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Foto Jumlah Tidak Dimakan</td>
                                                    <td>:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><img
                                                            style="width: 350px; height: 100%; object-fit: cover;"
                                                            src="{{ asset('storage/laporan/' . $data->foto_jumlah_tidak_dimakan) }}"
                                                            alt="" srcset=""></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </td>
                    </tr>
                @endforeach


                </tr>
            </tbody>
        </table>
    </div>
@endsection
