@extends('admin.basic_layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление заказами</li>
                    </ol>
                </div>

                <h4>Список заказов</h4>

                <br/>


                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Имя покупателя</th>
                        <th>Телефон покупателя</th>
                        <th>Дата оформления</th>
                        <th>Статус</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($orderList as $order)
                    <tr>
                        <td>
                            <a href="/admin/order/view/{{ $order->id }}">
                                {{ $order->id }}
                            </a>
                        </td>
                        <td>{{ $order->first_name.' '.$order->last_name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ App\Order::makeStatus($order->status) }}</td>
                        <td><a href="/admin/order/view/{{ $order->id }}" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/order/update/{{ $order->id }}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/order/delete/{{ $order->id }}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </section>
    @endsection