@extends('admin.basic_layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление товарами</li>
                    </ol>
                </div>

                <div class="col-md-12">
                    <button class="btn"><a href="/admin/product/create">Добавить товар</a></button>
                </div>


                <h4>Список товаров</h4>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID товара</th>
                        <th>Артикул</th>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><a href="/admin/product/update/{{ $product->id }}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/product/delete/{{ $product->id }}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </section>
    @endsection