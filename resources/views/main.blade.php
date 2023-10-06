<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Document</title> --}}

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="/navbarcustomer/website-menu-03/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/navbarcustomer/website-menu-03/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/navbarcustomer/website-menu-03/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/navbarcustomer/website-menu-03/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/boxicons/css/boxicons.css') }}">
    <title>BMW | {{ $title }}</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="/jquerydatatables.js"></script>
    <link href="/datatables.css" rel="stylesheet" />
    <link href="/select2.css" rel="stylesheet" />
    <script src="/select2.js"></script>
</head>

<body>
    {{-- <div class="h-100" style="min-height: 100vh;"> --}}
    @include('partial.navbar')
    <section class="main-content masthead">
        @yield('content')
    </section>
    {{-- </div> --}}

    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div>
    </footer>
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
