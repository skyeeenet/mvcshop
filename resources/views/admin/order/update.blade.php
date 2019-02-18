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
                        <li class="active">Редактировать заказ</li>
                    </ol>
                </div>


                <h4>Редактировать заказ #{{ $id }}</h4>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            {{ csrf_field() }}

                            <p>Имя клиента</p>
                            <input type="text" name="firstName" placeholder="" value="{{ $order->first_name }}">

                            <p>Фамилия клиента</p>
                            <input type="text" name="lastName" placeholder="" value="{{ $order->last_name }}">

                            <p>Телефон клиента</p>
                            <input type="text" name="userPhone" placeholder="" value="{{ $order->phone }}">

                            <p>Комментарий клиента</p>
                            <input type="text" name="userComment" placeholder="" value="{{ $order->comment }}">

                            <p>Дата оформления заказа</p>
                            <input type="text" name="date" placeholder="" value="{{ $order->date }}">

                            <p>Статус</p>
                            <select name="status">
                                <option value="1" <?php if ($order->status == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                                <option value="2" <?php if ($order->status == 2) echo ' selected="selected"'; ?>>В обработке</option>
                                <option value="3" <?php if ($order->status == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                                <option value="4" <?php if ($order->status == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                            </select>
                            <br>
                            <br>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection