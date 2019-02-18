@extends('admin.basic_layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/product">Управление товарами</a></li>
                        <li class="active">Редактировать товар</li>
                    </ol>
                </div>

                <h4>Добавить новый товар</h4>

                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <p>Название товара</p>
                            <input type="text" name="name" placeholder="" value="">

                            <p>Артикул</p>
                            <input type="text" name="code" placeholder="" value="">

                            <p>Стоимость, $</p>
                            <input type="text" name="price" placeholder="" value="">

                            <p>Категория</p>

                            <select name="category_id">
                                @foreach($categoriesList as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                @endforeach
                            </select>

                            <br/><br/>

                            <p>Производитель</p>
                            <input type="text" name="brand" placeholder="" value="">

                            <p>Изображение товара</p>
                            <input type="file" name="image" placeholder="" value="">

                            <p>Детальное описание</p>
                            <textarea name="description"></textarea>

                            <br/><br/>

                            <p>Наличие на складе</p>
                            <select name="availability">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>

                            <br/><br/>

                            <p>Новинка</p>
                            <select name="is_new">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>

                            <br/><br/>

                            <p>Рекомендуемые</p>
                            <select name="is_recommended">
                                <option value="1" selected="selected">Да</option>
                                <option value="0">Нет</option>
                            </select>

                            <br/><br/>

                            <p>Статус</p>
                            <select name="status">
                                <option value="1" selected="selected">Отображается</option>
                                <option value="0">Скрыт</option>
                            </select>

                            <br/><br/>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                            <br/><br/>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endsection