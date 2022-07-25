<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Mart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/front_assets/css/mystyles.css" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{url('/')}}/front_assets/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{route('user.wishlists')}}"><i class="fa fa-heart"></i> <span>{{$wishlistcount}}</span></a></li>
                <li><a href="{{route('user.cart')}}" class="cart-icon-qty"><i class="fa fa-shopping-bag"></i> <span>{{$cartcount}}</span></a></li>
            </ul>
            <div class="header__cart__price">item:  <span>RS: {{$usercartprice}}</span></div>
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="{{url('/')}}/front_assets/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> -->
            <div class="header__top__right__auth">
                @guest
                <a href="{{route('user.login')}}"><i class="fa fa-user"></i> Login</a>
                @endguest
                @auth('web')
                <a href="{{route('user.dashboard')}}"><i class="fa fa-user"></i> Dashboard</a>
                @endif
                
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('main')}}">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        @foreach($universal_pages as $page)
                        <li><a href="{{route('page-show',$page->slug)}}">{{$page->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <!-- <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> ab.razzaq32@yahoo.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div> -->
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> ab.razzaq32@yahoo.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <!-- <div class="header__top__right__language">
                                <img src="{{url('/')}}/front_assets/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                                @guest
                                <a href="{{route('user.login')}}"><i class="fa fa-user"></i> Login</a>
                                @endguest
                                @auth('web')
                                <a href="{{route('user.dashboard')}}"><i class="fa fa-user"></i> Dashboard</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('main')}}"><img src="{{url('/')}}/front_assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class=""><a href="{{route('main')}}">Home</a></li>
                            <li><a href="{{route('shop')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    @foreach($universal_pages as $page)
                                    <li><a href="{{route('page-show',$page->slug)}}">{{$page->title}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{route('user.wishlists')}}"><i class="fa fa-heart"></i> <span>{{$wishlistcount}}</span></a></li>
                            <li><a href="{{route('user.cart')}}" class=""><i class="fa fa-shopping-bag"></i> <span class="cart-icon-qty">{{$cartcount}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>RS: {{$usercartprice}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    
    @yield('content')
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route('main')}}"><img src="{{url('/')}}/front_assets/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Lahore</li>
                            <li>Phone: +92 3096021606</li>
                            <li>Email: ab.razzaq32@yahoo.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            @foreach($universal_links as $link)
                            <li><a href="{{$link->link}}">{{$link->title}}</a></li>
                            @endforeach
                            
                        </ul>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p>Developed by Abdul Razzaq</p></div>
                        <div class="footer__copyright__payment"><img src="{{url('/')}}/front_assets/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{url('/')}}/front_assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('/')}}/front_assets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/front_assets/js/jquery.nice-select.min.js"></script>
    <script src="{{url('/')}}/front_assets/js/jquery-ui.min.js"></script>
    <script src="{{url('/')}}/front_assets/js/jquery.slicknav.js"></script>
    <script src="{{url('/')}}/front_assets/js/mixitup.min.js"></script>
    <script src="{{url('/')}}/front_assets/js/owl.carousel.min.js"></script>
    <script src="{{url('/')}}/front_assets/js/main.js"></script>
    <script src="{{url('/')}}/front_assets/js/myscripts.js"></script>

<script type="text/javascript">
var APP_URL = {!! json_encode(url('/')) !!}
</script>

</body>

</html>