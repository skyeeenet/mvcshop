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
                        <li class="active">Добавить категорию</li>
                    </ol>
                </div>


                <h4>Добавить новую категорию</h4>

                <br/>

                <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            {{ csrf_field() }}

                            <p>Название</p>
                            <input type="text" name="name" placeholder="" value="">

                            <p>Порядковый номер</p>
                            <input type="text" name="sort_order" placeholder="" value="">

                            <p>Статус</p>
                            <select name="status">
                                <option value="1" selected="selected">Отображается</option>
                                <option value="0">Скрыта</option>
                            </select>

                            <br><br>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>


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