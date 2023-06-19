<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{URL::asset('admin/assets/img/')}}/{{$setting->logo}}" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aleri Hotel</title>

    <!-- Icon css link -->
    <link href="{{URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/stroke-icon/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/flat-icon/flaticon.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="{{URL::asset('assets/vendors/revolution/css/settings.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/revolution/css/layers.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/revolution/css/navigation.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/animate-css/animate.css')}}" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="{{URL::asset('assets/vendors/magnify-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/bootstrap-selector/bootstrap-select.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendors/lightbox/simpleLightbox.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <!--================Header Area =================-->
    <header class="main_header_area">
        <div class="header_top">
            <div class="container">
                <div class="header_top_inner">
                    <div class="pull-left">
                        <a href="#"><i class="fa fa-phone"></i>{{$setting->phone}}</a>
                        <a href="#"><i class="fa fa-envelope-o"></i>{{$setting->email}}</a>
                    </div>
                    <div class="pull-right">
                        <ul class="header_social">
                            <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{$setting->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        <a class="navbar-brand" href="/">
                            <img src="{{URL::asset('admin/assets/img/')}}/{{$setting->logo}}" alt="">
                            <img src="{{URL::asset('admin/assets/img/')}}/{{$setting->logo}}" alt="">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="/">Home
                                </a>
                            </li>
                            <li>
                                <a href="/room">Rooms</a>
                            </li>

                            <li><a href="/about">About Us</a></li>

                            <li>
                                <a href="/gallery">Gallery</a>
                            </li>


                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="search_dropdown">
                                <!-- <a class="popup-with-zoom-anim" href="#test-search"><i class="icon icon-Search"></i></a> -->
                            </li>
                            <li class="book_btn">
                                <a class="book_now_btn" href="/login">Login</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    @include('inc.flash')
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </header>
    <!--================Header Area =================-->
   
   
    @yield('content')


      <!--================Footer Area =================-->
      <footer class="footer_area">
        <div class="footer_widget_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <aside class="f_widget about_widget">
                            <!-- <img src="{{URL::asset('admin/assets/img/')}}/{{$setting->logo}}" alt=""> -->
                            <div class="ab_wd_list">
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{$setting->address}}</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{$setting->phone}}</h4>
                                        <h4>{{$setting->email}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="book_now_area">
                                <a class="book_now_btn" href="/contact">Contact us</a>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <aside class="f_widget link_widget">
                            <div class="f_title">
                                <h3>Extra Links</h3>
                            </div>
                            <ul>
                                <li><a href="/about">-  About Us</a></li>
                                <li><a href="/room">-  Rooms</a></li>
                                <li><a href="/gallery">-  Gallery</a></li>
                                <li><a href="/">-  Home</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <aside class="f_widget link_widget">
                            <div class="f_title">
                                <h3>our services</h3>
                            </div>
                            <ul>
                                <li><a href="#">-  24 Hours Electricty</a></li>
                                <li><a href="#">-  Swimming Pool</a></li>
                                <li><a href="#">-  VIP Bar</a></li>
                                <li><a href="#">-  Executive Lounge</a></li>
                                <li><a href="#">-  Restaurant</a></li>
                                <li><a href="#">-  Barbecue</a></li>
                                <li><a href="#">-  Free Wifi</a></li>
                                <li><a href="#">-  Adequate and Maximum Security</a></li>
                                <li><a href="#">-  Pool Bar</a></li>
                                <li><a href="#">-  Executive Bar</a></li>
                                <li><a href="#">-  Laundry</a></li>
                                <li><a href="#">-  Free Car Wash</a></li>


                            </ul>
                        </aside>
                    </div>
                    <!-- <div class="col-md-3 col-xs-6">
                        <aside class="f_widget instagram_widget">
                            <div class="f_title">
                                <h3>Instagram</h3>
                            </div>
                            <ul class="instagram_list" id="instafeed"></ul>
                        </aside>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="footer_copyright_area">
            <div class="container">
                <div class="pull-left">
                    <h4>Copyright © Aleri
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All rights reserved. </h4>
                </div>
                <div class="pull-right">
                    <h4>Created by:
                        <a href="#">Maxedge Team</a>
                    </h4>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{URL::asset('assets/js/jquery-2.2.4.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Rev slider js -->
    <script src="{{URL::asset('assets/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>

    <script src="{{URL::asset('assets/vendors/magnify-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/counterup/waypoints.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendors/bootstrap-selector/bootstrap-select.js')}}"></script>
    <!--        <script src="vendors/lightbox/js/lightbox.min.js"></script>-->
    <script src="{{URL::asset('assets/vendors/lightbox/simpleLightbox.min.js')}}"></script>

    <!-- instafeed-->
    <script type="text/javascript" src="{{URL::asset('assets/vendors/instafeed/instafeed.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/vendors/instafeed/script.js')}}"></script>

    <script src="{{URL::asset('assets/js/theme.js')}}"></script>
</body>

</html>