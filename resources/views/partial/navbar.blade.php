<header class="site-navbar" role="banner">
    <style>
        .col-4 {
            width: 25%;
        }
    
        .site-logo {
            white-space: nowrap; /* Menambahkan atribut nowrap */
        }
    </style>

    <div class="container">
        <div class="row align-items-center">

            <div class="col-auto">
                <div class="row"> <span class=""><img src="/logobmw.png" alt="" srcset=""
                            style="width: 50px;" class="ms-5"></span>
                    <h1 class="mb-0 site-logo mt-2 " style="margin-left: 10px;tex"><a href="/"
                            class="text-white mb-0"> BMW TEBET</a></h1>
                </div>

            </div>
            <div class="col-8 col-md-8 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        @if (Auth::user()->isCustomer())
                           
                        @elseif(Auth::user()->isAdmin())
                            <li><a href="/wo/table"><span>WO</span></a></li>
                        @endif
                    </ul>
                </nav>
            </div>


            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                    href="#" class="site-menu-toggle js-menu-toggle text-white"><span
                        class="icon-menu h3"></span></a></div>

        </div>

    </div>
    </div>

</header>
