<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register Account </title>
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
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="https://img.freepik.com/premium-vector/hospital-building-icon-flat-style-medical-clinic-vector-illustration-isolated-background-medicine-sign-business-concept_157943-656.jpg"
                                    alt="" class="img-fluid rounded h-100" style="object-fit: cover">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100 justify-content-center p-2">
                                    <h4>Pendaftaran Akun</h4>
                                    <a href="{{ route('registerBalita') }}" class="btn btn-primary mb-2">Daftar Sebagai Balita</a>
                                    <a href="{{ route('registerMother') }}" class="btn btn-primary mb-2">Daftar Sebagai Ibu Hamil</a>
                                    <a href="{{ route('registerKader') }}" class="btn btn-primary mb-2">Daftar Sebagai Kader Kesehatan</a>
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
