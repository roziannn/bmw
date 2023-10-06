<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BMW TEBET </title>
    <link rel="icon" type="image/x-icon" href="/startbootstrap-grayscale-master/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/startbootstrap-grayscale-master/dist/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    {{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">BMW TEBET</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav> --}}
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    {{-- <img src="" alt="" class="w-25"> --}}
                    <h1 class="mx-auto my-0 text-uppercase">Let's repair</h1>
                    <h2 class="text-white-50 mx-auto mt-5 mb-2">Masukan Nomor Polisi Kendaraan Anda</h2>
                    <form action="/login/masuk/customer" method="post">
                        @csrf
                        <div class="input-group input-group-lg flex-nowrap mb-2 mt-2">
                            <input type="text" class="form-control" placeholder="No Polisi" aria-label="plat_nomor"
                                name="no_polisi" aria-describedby="addon-wrapping">
                        </div>
                        <button type="submit" class="border-0"
                            style="color: white;background-color: rgb(34, 132, 132);width: 100px;height: 50px;border-radius:10px;">Masuk</button>
                    </form>

                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    {{-- <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Kenyamanan Anda adalah Prioritas Kami</h2>
                    <p class="text-white-50">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, id. Repellendus error ipsam
                        quam animi facilis, eveniet odit magnam, sapiente vero voluptatum rerum, cumque ea enim quis
                        soluta ad beatae.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="/startbootstrap-grayscale-master/dist/assets/img/dashboard-car.jpg"
                alt="..." />
        </div>
    </section> --}}
    <!-- Projects-->
    {{-- <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-6 col-lg-5"><img class="img-fluid mb-3 mb-lg-0"
                        src="/startbootstrap-grayscale-master/dist/assets/img/bg-masthead.jpg" alt="..." /></div>
                <div class="col-xl-6 col-lg-6">
                    <div class="featured-text text-center text-lg-left">
                        <h4>- Formulir -</h4>
                        <form action="">
                            <div class="input-group input-group-lg flex-nowrap mb-2 mt-2">
                                <input type="text" class="form-control" placeholder="Email" aria-label="email"
                                    aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="text" class="form-control" placeholder="Nama" aria-label="nama"
                                    aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="text" class="form-control" placeholder="No Polisi"
                                    aria-label="plat_nomor" aria-describedby="addon-wrapping">
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Pilih Jenis Mobil</option>
                                <option value="1">BMW SPORT</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <div class="input-group input-group-lg flex-nowrap mb-2">
                                <input type="date" class="form-control" placeholder="tanggal Booking"
                                    aria-label="tanggal_booking" aria-describedby="addon-wrapping">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Confirm</button>
                            <p class="fs-5">Pelanggan lama? <a href="/customer/masuk">klik disini</a></p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}
    <!-- Signup-->
    {{-- <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white ">Contact us For More Information</h2>

                </div>
            </div>
        </div>
    </section> --}}
    <!-- Contact-->
    {{-- <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section> --}}
    <!-- Footer-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/startbootstrap-grayscale-master/dist/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
