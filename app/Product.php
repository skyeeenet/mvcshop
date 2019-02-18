<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public static function getLatestProducts() {

        return DB::table('product')->where('is_new','1')->get();
    }

    public static function getProductById ($id) {

        return DB::table('product')->where('id', $id)->first();
    }

    public static function getAllProducts() {

        return DB::table('product')->paginate(15);
    }

    public static function getProductsByCategoryId($id) {

        return DB::table('product')->where('category_id', $id)->paginate(16);
    }

    public static function getProductsByIds($ids) {

        return DB::table('product')->where('status', 1)->whereIn('id', $ids)->get();
    }

    public static function getProductList() {

        return DB::table('product')->get();
    }

    public static function removeProductById($id) {

        DB::table('product')->delete($id);

        return true;
    }

    public static function createProduct($input) {

        DB::table('product')->insert([
            'name'=>$input[0],'category_id'=>$input[1],'code'=>$input[2],
            'price'=>$input[3],'availability'=>$input[6],'brand'=>$input[4],
            'image'=>$input[10],'description'=>$input[5],'is_new'=>$input[7],
            'is_recommended'=>$input[8],'status'=>$input[9]
        ]);
        return $input;
    }

    public static function getImage($img) {

        return '/'.$img;
    }

    public static function updateProduct($input) {

        DB::table('product')->where('id', $input[11])->update([
            'name'=>$input[0],'category_id'=>$input[1],'code'=>$input[2],
            'price'=>$input[3],'availability'=>$input[6],'brand'=>$input[4],
            'image'=>$input[10],'description'=>$input[5],'is_new'=>$input[7],
            'is_recommended'=>$input[8],'status'=>$input[9]
        ]);

        return true;
    }

    public static function addCommentToPropductViaId($id, $email, $name, $comment) {

        $comment = strip_tags($comment);

        DB::table('comments')->insert([
            'product_id' => $id, 'email' => $email, 'name'=> $name, 'comment' => $comment
        ]);

        return true;
    }

    public static function getCommentsById($id) {

        return DB::table('comments')->where('product_id',$id)->paginate(5);
    }

    public static function getRelatedProducts() {

        return DB::table('product')->where('is_recommended', 1)->paginate(6);
    }

    public static function getNewProducts() {

        return DB::table('product')->where('is_new',1)->paginate(6);
    }

    public static function getProductBySearch($productName) {

        return DB::table('product')->where('name', 'like', $productName)->paginate(12);
    }
}
