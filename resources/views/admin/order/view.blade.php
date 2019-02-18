@extends('admin.basic_layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/order">Управление заказами</a></li>
                        <li class="active">Просмотр заказа</li>
                    </ol>
                </div>


                <h4>Просмотр заказа #{{ $order->id }}</h4>
                <br/>




                <h5>Информация о заказе</h5>
                <table class="table-admin-small table-bordered table-striped table">
                    <tr>
                        <td>Номер заказа</td>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <td>Имя клиента</td>
                        <td>{{ $order->first_name }}</td>
                    </tr>
                    <tr>
                        <td>Фамилия клиента</td>
                        <td>{{ $order->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Телефон клиента</td>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td>Комментарий клиента</td>
                        <td>{{ $order->comment }}</td>
                    </tr>

                    <tr>
                        <td><b>Статус заказа</b></td>
                        <td>{{ App\Order::makeStatus($order->status) }}</td>
                    </tr>
                    <tr>
                        <td><b>Дата заказа</b></td>
                        <td>{{ $order->date }}</td>
                    </tr>
                </table>

                <h5>Товары в заказе</h5>

                <table class="table-admin-medium table-bordered table-striped table ">
                    <tr>
                        <th>ID товара</th>
                        <th>Артикул товара</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $productsQuantity[$product->id] }}</td>
                    </tr>
                    @endforeach
                </table>

                <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>
        </div>


    </section>
@endsection