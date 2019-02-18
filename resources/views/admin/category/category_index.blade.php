@extends('admin.basic_layout')



@section('content')
    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление категориями</li>
                    </ol>
                </div>

                <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>

                <h4>Список категорий</h4>

                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID категории</th>
                        <th>Название категории</th>
                        <th>Порядковый номер</th>
                        <th>Статус</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->sort }}</td>
                        <td>{{ $category->status }}</td>
                        <td><a href="/admin/category/update/{{ $category->id }}" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/category/delete/{{ $category->id }}" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                        @endforeach
                </table>

            </div>
        </div>
    </section>

    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.cycle2.min.js"></script>
    <script src="/js/jquery.cycle2.carousel.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
    <script src="/js/price-range.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>
    @endsection