@extends('layouts.basic_layout')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Поиск</h2>
                        <form action="/search" method="get">
                            <input type="text" name="productName" placeholder="Поиск продуктов...">
                            <input type="submit" name="submit" value="Найти">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Другие продукты</h2>

                        @foreach($newProducts as $product)
                        <div class="thubmnail-recent">
                            <img src="/{{ $product->image }}" class="recent-thumb" alt="">
                            <h2><a href="/product/{{ $product->id }}">{{ $product->name }}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>${{ $product->price }}</ins>
                            </div>
                        </div>
                        @endforeach

                    </div>

                   <!-- <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div> -->
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="/">Главная</a>
                            <a href="/category/{{ $product->category_id }}">{{ \App\Category::getCategoryNameById($product->category_id) }}</a>
                            <a href="">{{ $product->name }}</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{asset($product->image)}}" alt="">
                                    </div>

                                    <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                        <img src="img/product-thumb-4.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->name }}</h2>
                                    <div class="product-inner-price">
                                        <ins>{{ $product->price }}</ins> <del>$800.00</del>
                                    </div>

                                    <form action="" class="cart">

                                        <button class="add_to_cart_button add-to-cart" type="submit" data-id="{{ $product->id }}">Добавить в корзину</button>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>Категория: <a href="/category/{{ $product->category_id }}">{{ App\Category::getCategoryNameById($product->category_id) }}</a>. <!--Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. --></p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Описание</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Отзывы</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Описание продукта</h2>
                                                <p>{{ $product->description }}</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Отзывы</h2>
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                </ul>

                                                @if(isset($comments))
                                                <div>
                                                   @foreach($comments as $comment)
                                                       <div class="comment_box text-center">
                                                           <h3>{{ $comment->name }}</h3>
                                                           <p>{{ $comment->comment }}</p>
                                                       </div>
                                                       @endforeach
                                                </div>
                                                @endif

                                                <div class="submit-review">
                                                    <form action="#" method="post">
                                                        {{ csrf_field() }}
                                                        <p><label for="name">Имя</label> <input name="name" type="text" value="@if(isset($user)) {{ $user->name }} @endif"></p>
                                                        <p><label for="email">Email</label> <input name="email" type="email" value="@if(isset($user)) {{ $user->email }} @endif"></p>

                                                        <p><label for="review">Ваш отзыв</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                        <p><input type="submit" name="submit" value="Отправить"></p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Рекомендации</h2>
                            <div class="related-products-carousel">

                                @foreach($relatedProducts as $product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ '/'.$product->image }}" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add_to_cart_button add-to-cart add-to-cart-link add-to-cart-link" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="/product/{{ $product->id }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">{{ $product->name }}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>{{ '$'.$product->price }}</ins>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection