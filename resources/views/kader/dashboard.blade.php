@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="row">
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-purple">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-wallet-2-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Jumlah Laporan Hari Ini</h6>
                        <h2 class="my-2">{{$laporanCountToday}}</h2>
                        <p class="mb-0">
                            <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-pink">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-eye-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Total Laporan</h6>
                        <h2 class="my-2">{{$laporanCount}}</h2>
                        <p class="mb-0">
                            <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div> <!-- end col-->
        </div>
    </div>
@endsection