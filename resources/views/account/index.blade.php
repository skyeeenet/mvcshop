@extends('layouts.basic_layout')

@section('content')
    <table class="table-bordered table-striped table">
        <h3>История заказов</h3>
        <tr>
            <th>Номер заказа</th>
            <th>Дата</th>
            <th>Продукты</th>
            <th>Комментарий</th>
            <th>Итог</th>
            <th>Статус</th>
        </tr>
        <?php foreach ($history as $item): ?>
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->date }}</td>
            <?php $productsQuantity = array(); $productsQuantity = json_decode($item->products, true); ?>
            <?php $productsIds = array_keys($productsQuantity);
            $products = \App\Product::getProductsByIds($productsIds);

            ?>
            <td>
                <?php foreach ($products as $product): ?>
                <a href="/product/<?php echo $product->id; ?>"><?php echo $product->name; ?> <?php echo ' x '.$productsQuantity[$product->id]; ?></a><br>
                <?php endforeach; ?>

            </td>
            <td>
                {{ $item->comment }}
            </td>
            <td>
                {{ $item->total }}
            </td>
            <td>
                {{ \App\Order::makeStatus($item->status) }}
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    @endsection