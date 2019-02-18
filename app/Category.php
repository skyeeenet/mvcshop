<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public static function getCategoryList() {

        return DB::table('category')->get();
    }

    public static function deleteCategoryById($id) {

        DB::table('category')->where('id', $id)->delete();

        return true;
    }

    public static function createNewCategory($name, $sort, $status) {

        DB::table('category')->insert(
            ['name'=>$name, 'sort'=>$sort, 'status'=>$status]);

        return true;
    }

    public static function getCategoryNameById($id) {

        return DB::table('category')->where('id', $id)->first()->name;
    }

    public static function updateCategory() {


    }

}
