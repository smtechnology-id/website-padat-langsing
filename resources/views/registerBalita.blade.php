<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register Account Balita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100 justify-content-center p-2">
                                    <h4>Pendaftaran Akun Balita</h4>
                                    <form action="{{ route('registerBalitaPost') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-2">
                                                    <label for="nama_anak">Nama Anak</label>
                                                    <input type="text" name="nama_anak" id="nama_anak"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="nik">NIK</label>
                                                    <input type="number" name="nik" id="nik"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="nama_ibu">Nama Ibu</label>
                                                    <input type="text" name="nama_ibu" id="nama_ibu"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="berat_badan">Berat Badan</label>
                                                    <input type="number" name="berat_badan" id="berat_badan"
                                                        class="form-control" required>
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
                                            </div>
                                            <div class="col-md-6">
                                                <p>Account</p>
                                                <div class="form-group mb-2">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                    </form>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>
                document.write(new Date().getFullYear())
            </script> © Velonic - Theme by Techzaa
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>
