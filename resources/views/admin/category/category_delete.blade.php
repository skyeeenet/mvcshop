@extends('admin.basic_layout')

@section('head')
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/category">Управление категориями</a></li>
                        <li class="active">Удалить категорию</li>
                    </ol>
                </div>


                <h4>Удалить категорию #{{ $id }}</h4>


                <p>Вы действительно хотите удалить эту категорию?</p>

                <form method="post">

                    {{ csrf_field() }}
                    <input type="submit" name="submit" value="Удалить" />
                </form>

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