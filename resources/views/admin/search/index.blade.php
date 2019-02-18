@extends('admin.basic_layout')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Поиск пользователя</li>
                    </ol>
                </div>


                <h4>Поиск пользователя</h4>

                <br/>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="#" method="post">

                            {{ csrf_field() }}

                            <p>Номер телефона</p>
                            <input type="text" name="phone" placeholder="" value="">

                            <br><br>

                            <input type="submit" name="search_by_phone" class="btn btn-default" value="Поиск">
                        </form>
                    </div>
                </div>

                <?php if(isset($user)): ?>

                <table class="table-bordered table-striped table">
                    <h2>Результат поиска : </h2>
                    <tr>
                        <th>ID пользователя</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Права</th>
                    </tr>
                    <tr>
                        <form action="#" method="post">
                            {{ csrf_field() }}
                            <td><?php echo $user->id; ?></td>
                            <td><input type="text" name="email" value="<?php echo $user->email; ?>"></td>
                            <td><input type="text" name="phone" value="<?php echo $user->phone; ?>"></td>
                            <td>
                                <input type="text" name="role" value="<?php echo $user->role; ?>">
                                <input style="display:none" type="text" name="user_id" value="<?php echo $user->id; ?>">
                                <input class="btn" type="submit" name="change" value="Применить">
                            </td>
                        </form>
                    </tr>
                </table>


                <br><br>

                <?php endif; ?>


                <div class="container">

                    <table class="table-bordered table-striped table">
                        <h2>Все пользователи</h2>
                        <tr>
                            <th>ID пользователя</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Права</th>
                        </tr>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->phone; ?></td>
                            <td><?php echo $user->role; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                </div>

            </div>
        </div>
    </section>
    @endsection