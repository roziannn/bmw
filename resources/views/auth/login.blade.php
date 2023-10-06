<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body style="background-image: url(/bgwelcome.jpg)">
    <div class="container-fluid d-flex justify-content-center m-5">
        <div class="col-4  d-flex justify-content-center m-5">
            <div class="card-body shadow rounded pt-2" style="background-color: aliceblue">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal form-material text-center" method="post" action="/login/masuk/admin">
                    @csrf
                    <img src="https://img.freepik.com/premium-vector/call-center-technical-support-customer-online-consultation-flat-illustration-vector_128772-1123.jpg?w=2000" alt="homepage" class="light-logo mt-2" style="width: 180px; border-radius: 30px;">

                    <div class="form-group m-10" id="login-alert"></div>

                    <hr>
                    <h4 class="box-title m-b-20 m-t-10 text-center">Login</h4>

                    <div class="col-9 ms-5 mt-3">
                        <div class="mb-3">
                            <input type="text" id="form3Example1" class="form-control form-control-md"
                                name="username" placeholder="username" />
                        </div>
                        @error('username')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-9 ms-5">
                        <div class="mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-md"
                                name="password" placeholder="password" />
                        </div>
                        @error('password')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center align-items-top">
                        <!-- Checkbox -->

                        <div class="text-center">
                            <div class="row"> <button type="submit"
                                    class=" btn btn-secondary border-0 rounded">Login</button>
                                {{-- <p class="small fw-bold mt-2 pt-1 mb-0">Belum Punya Akun? <a href="/daftar"
                                        class="login">Daftar</a></p> --}}
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>

</html>
