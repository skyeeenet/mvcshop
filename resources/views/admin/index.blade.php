@extends('admin.basic_layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4>Добрый день, администратор!</h4>
                </div>


                <div class="col-md-12">
                    <p>Вам доступны такие возможности:</p>
                </div>

                <ul>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li><a href="/admin/search">Поиск пользователя</a></li>
                </ul>

            </div>
        </div>
    </section>
    @endsection