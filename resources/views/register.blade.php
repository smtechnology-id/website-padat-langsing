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
                                <img src="https://img.freepik.com/premium-vector/hospital-building-icon-flat-style-medical-clinic-vector-illustration-isolated-background-medicine-sign-business-concept_157943-656.jpg" alt=""
                                    class="img-fluid rounded h-100" style="object-fit: cover">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">

                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Register</h4>
                                        <p class="text-muted mb-3">Register Your Account With
                                        </p>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!-- form -->
                                        <form action="{{ route('registerPost') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Account</label>
                                                <input class="form-control" type="name" name="name" id="name"
                                                    required="" placeholder="Enter your name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" name="email"
                                                    id="emailaddress" required="" placeholder="Enter your email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="telp" class="form-label">Nomor Telephone</label>
                                                <input class="form-control" type="telp" name="telp" id="telp"
                                                    required="" placeholder="Enter your telp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Alamat Lengkap</label>
                                                <textarea name="address" id="address" class="form-control" cols="30" rows="3"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" name="password"
                                                    required="" id="password" placeholder="Enter your password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Password
                                                    Confirmation</label>
                                                <input class="form-control" type="password"
                                                    name="password_confirmation" required=""
                                                    id="password_confirmation" placeholder="Enter your password">
                                            </div>
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-primary w-100 mb-2" type="submit"><i
                                                        class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Register</span> </button>
                                                        <a href="{{ route('login') }}" class="btn btn-soft-primary w-100">Login</a>
                                            </div>
                                        </form>
                                        <!-- end form-->
                                    </div>
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
