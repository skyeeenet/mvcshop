@extends('layouts.basic_layout')

@section('content')

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">

            <!-- TABLE-WITH-PRODUCTS-IN-CART BEGIN -->

            <div class="col-md-8">

            <form method="post" action="#">
                <table cellspacing="0" class="shop_table cart">
                    <thead>
                    <tr>
                        <th class="product-remove">&nbsp;</th>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                    <tr class="cart_item">
                        <td class="product-remove">
                            <a title="Remove this item" class="remove" href="/cart/remove/{{ $product->id }}">×</a>
                        </td>

                        <td class="product-thumbnail">
                            <a href="/product/{{ $product->id }}"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ asset($product->image) }}"></a>
                        </td>

                        <td class="product-name">
                            <a href="/product/{{ $product->id }}">{{ $product->name }}</a>
                        </td>

                        <td class="product-price">
                            <span class="amount">{{ $product->price }}</span>
                        </td>

                        <td class="product-quantity">
                            <div class="quantity buttons_added">
                                <button class="plus_minus"><a class="plus_minus" href="/deduct/{{ $product->id }}">-</a></button>
                                <input type="number" size="4" class="input-text qty text" title="Qty" value="{{ $productsInCart[$product->id] }}" min="0" step="1">
                                <!--<input type="button" class="plus" value="+">-->
                                <button class="plus_minus"><a class="plus_minus" href="/add/{{ $product->id }}">+</a></button>
                            </div>
                        </td>

                        <td class="product-subtotal">
                            <span class="amount">{{ $product->price * $productsInCart[$product->id] }}</span>
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td class="actions" colspan="6">
                            <!--<div class="coupon">
                                <label for="coupon_code">Coupon:</label>
                                <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                            </div>-->
                            <form action="#" method="post">
                                {{ csrf_field() }}
                                <input type="submit" value="Оформить заказ" name="submit" class="checkout-button button alt wc-forward">
                            </form>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>

            </div>

            <!-- TABLE-WITH-PRODUCTS-IN-CART END -->

            <div class="cart_totals col-md-6">
                <h2>Итого</h2>

                <table cellspacing="0">
                    <tbody>
                    <tr class="cart-subtotal">
                        <th>Сумма</th>
                        <td><span class="amount">{{ $totalPrice }}</span></td>
                    </tr>

                    <tr class="shipping">
                        <th>Стоимость доставки</th>
                        <td>Бесплатная доставка</td>
                    </tr>

                    <tr class="order-total">
                        <th>Итог</th>
                        <td><strong><span class="amount">{{ $totalPrice }}</span></strong> </td>
                    </tr>
                    </tbody>
                </table>
            </div>


    </div>
        </div>
        </div>
@endsection