@extends('layouts.basic_layout')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
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
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            @if(\Illuminate\Support\Facades\Auth::guest())
                            <div class="woocommerce-info">Уже есть аккаунт ? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Авторизироваться</a>
                            </div>

                            <form id="login-form-wrap" class="login collapse" method="post" action="/login">

                                {{ csrf_field() }}

                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                                <p class="form-row form-row-first">
                                    <label for="username">Email <span class="required">*</span>
                                    </label>
                                    <input type="text" id="email" name="email" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Password <span class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" class="input-text">
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                                </p>
                                <p class="lost_password">
                                    <a href="#">Lost your password?</a>
                                </p>

                                <div class="clear"></div>
                            </form>

                            @endif

                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                </p>

                                <p class="form-row form-row-last">
                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                </p>

                                <div class="clear"></div>
                            </form>
                            <!-- ОТПРАВКА ЗАКАЗА -->
                            <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">
                                {{ csrf_field() }}
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Детали доставки</h3>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Имя <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Фамилия <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_last_name" name="billing_last_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Номер отделения почты<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Отделение №" id="billing_address_1" name="billing_post_number" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Город <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Город" id="billing_city" name="billing_city" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_email" name="billing_email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_phone" name="billing_phone" class="input-text ">
                                            </p>

                                            <p id="billing_comment_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_comment">Комментарий к заказу <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Комментарий" id="billing_comment" name="billing_comment" class="input-text ">
                                                <input type="hidden">
                                            </p>
                                            <div class="clear"></div>

                                        </div>
                                    </div>


                                </div>

                                <h3 id="order_review_heading">@lang('checkout.your_order')</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">@lang('checkout.product')</th>
                                            <th class="product-total">@lang('checkout.total')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $product->name }} <strong class="product-quantity">× {{ $productsInCart[$product->id] }}</strong> </td>
                                            <td class="product-total">
                                                <span class="amount">{{ $product->price * $productsInCart[$product->id] }}</span> </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        <tr class="cart-subtotal">
                                            <th>@lang('checkout.with_out_delivery')</th>
                                            <td><span class="amount">{{ $totalPrice }}</span>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>@lang('checkout.delivery')</th>
                                            <td>

                                                Free Shipping
                                                <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                            </td>
                                        </tr>


                                        <tr class="order-total">
                                            <th>@lang('checkout.total')</th>
                                            <td><strong><span class="amount">{{ $totalPrice }}</span></strong> </td>
                                        </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bank" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">@lang('checkout.pay_method_bank')</label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>@lang('checkout.bank_info')</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_cheque">
                                                <input type="radio" data-order_button_text="" value="cash" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_cheque">@lang('checkout.pay_method_cash')</label>
                                                <div class="payment_box payment_method_cheque">
                                                    <p>@lang('checkout.cash_info')</p>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="@lang('checkout.place_order')" id="place_order" name="submit" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection