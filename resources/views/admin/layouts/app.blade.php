<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') E- ASSESMENT as</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v3.2.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="/panel-assets/media/logos/favicon.ico">
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6//assets/css/line.css">
    <!-- Slider -->
    <link rel="stylesheet" href="/assets/css/tiny-slider.css" />
    <!-- Main Css -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="/assets/css/colors/default.css" rel="stylesheet" id="color-opt">
    @stack('css')
</head>

<body>
    <header id="topnav" class="defaultscroll sticky">
        <div class="container">
            <a class="logo" href="/">
                <img src="/panel-assets/media/logos/logojippv3.png" height="75px" width="190px"
                    class="logo-light-mode" alt="">
                <img src="/panel-assets/media/logos/logojippv3.png" height="75px" width="190px" class="logo-dark-mode"
                    alt="">
            </a>
        </div>
        <!--end container-->
    </header>
    <!--end header-->
    <!-- Navbar End -->
    @yield('content')
    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="#" class="logo-footer">
                                <img src="/assets/images/logosulsel300.png" height="140" width="130"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-lg-8">
                            <h5 class="elementor-image-box-title">PEMERINTAH PROV. SULAWESI SELATAN</h5>
                            <p class="mt-4">l. Urip Sumoharjo No.269, Panaikang,<br>
                                Kec. Panakkukang,<br>
                                Kota Makassar,<br>
                                Sulawesi Selatan 90231</p>
                            <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                            data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                            data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                            data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                            data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                            </ul>
                            <!--end icon-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <div class="row">
                        <div class="col">
                            <img src="/assets/images/sipakatau.png" alt="sipakatau" height="70" width="150">
                        </div>
                        <div class="col">
                            <img src="/assets/images/panrb.png" alt="panrb" height="60" width="160">
                        </div>
                        <div class="col">
                            <img src="/assets/images/giz.png" alt="giz" height="70" width="170">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <img src="/assets/images/bangga.png" alt="bangga melayani bangsa" height="70"
                                width="150">
                        </div>
                        <div class="col">
                            <img src="/assets/images/kompak.png" alt="kompak" height="80" width="150">
                        </div>
                        <div class="col">
                            <img src="/assets/images/bakti.png" alt="bakti" height="60" width="150">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-start">
                        <p class="mb-0">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Jaringan Inovasi Pelayanan Publik Sulawesi Selatan</i>
                        </p>
                    </div>
            </div>
        </div>
    </footer>
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i
            data-feather="arrow-up" class="icons"></i></a>



    <!-- javascript -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!-- SLIDER -->
    <script src="/assets/js/tiny-slider.js "></script>
    <!-- Icons -->
    <script src="/assets/js/feather.min.js"></script>
    <!-- Main Js -->
    <script src="/assets/js/plugins.init.js"></script>
    <!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="/assets/js/app.js"></script>
    <!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    @stack('script')
</body>

</html>
