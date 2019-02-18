<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>eElectronics - HTML eCommerce Template</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{!! URL::asset('css/style.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('css/owl.carousel.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('css/responsive.css') !!}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $categories = \App\Category::getCategoryList(); ?>
<?php $user = \Illuminate\Support\Facades\Auth::user(); ?>
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="/account"><i class="fa fa-user"></i> Мой аккаунт</a></li>
                        <li><a href="/cart"><i class="fa fa-user"></i> Корзина</a></li>
                        <li><a href="/checkout"><i class="fa fa-user"></i> Оформление</a></li>
                        <li>
                            <form action="/search" method="get">
                            <li><i class="fa fa-search"></i><input class="test" type="text" name="productName"></li>
                            <li><input class="btn test" type="submit" value="Найти"></li>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">

                    <ul class="list-unstyled list-inline">
                        @if(!(\Illuminate\Support\Facades\Auth::check()))
                            <li><a href="/login"><i class="fa fa-user"></i> Войти</a></li>
                        @else

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">@if(isset($user)) Добро пожаловать,<b>{{ ' '.$user->name }}</b> @endif</span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/account">Мой аккаунт</a></li>
                                <form action="{{ route('logout') }}" method="post">
                                    {{ csrf_field() }}
                                    <input class="li_btn" type="submit" value="Выйти">
                                    <!--<li><a href="#">Выйти</a></li> -->
                                </form>
                            </ul>
                        </li>
                        @endif
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="/">e<span>Electronics</span></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="/cart">Корзина <i class="fa fa-shopping-cart"></i> <span class="product-count">{{ \App\Cart::countItems() }}</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    @if(isset($active))
                    <li @if($active == 0) class="active" @endif><a href="/">Главная</a></li>
                    <li @if($active == 1) class="active" @endif><a href="/catalog">Каталог</a></li>
                    <li @if($active == 3) class="active" @endif><a href="/cart">Корзина</a></li>
                    <li @if($active == 4) class="active" @endif><a href="/checkout">Оформление</a></li>
                    <li @if($active == 5) class="active" @endif><a href="/delivery">Доставка</a></li>
                    @else
                        <li><a href="/">Главная</a></li>
                        <li><a href="/catalog">Каталог</a></li>
                        <li><a href="/cart">Корзина</a></li>
                        <li><a href="/checkout">Оформление</a></li>
                        <li><a href="/delivery">Доставка</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->

@yield('content')

<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>e<span>Electronics</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Навигация</h2>
                    <ul>
                        <li><a href="/account">Мой аккаунт</a></li>
                        <li><a href="/contact">Связаться с нами</a></li>
                        <li><a href="/comments">Отзывы о нас</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>

                        @foreach($categories as $category)
                            <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2015 eElectronics. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="{!! URL::asset('js/owl.carousel.min.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.sticky.js') !!}"></script>

<!-- jQuery easing -->
<script src="{!! URL::asset('js/jquery.easing.1.3.min.js') !!}"></script>

<!-- Main Script -->
<script src="{!! URL::asset('js/main.js') !!}"></script>

<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");

            $.ajax({
                type: "POST",
                url: '/cart/addAjax/'+id,
                data: { id:id, _token: '{{csrf_token()}}' },
                success: function (response) {

                    $('.product-count').html(response);
                },
                error: function (value, textStatus, errorThrown) {
                    console.log(value);

                },
            });
            return false;
        });
    });
</script>
</body>

