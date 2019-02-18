<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    function __construct() {

        $this->middleware('checkRole');
    }

    public function actionProduct(Request $request) {

        $productsList = Product::getProductList();

        return view('admin.product.index', compact('productsList'));
    }

    public function actionDelete($id) {

        $product_id = intval($id);

        Product::removeProductById($product_id);

        return redirect('/admin/product');
    }

    public function actionCreate(Request $request) {

        $categoriesList = Category::getCategoryList();

        if ($request->submit) {

            $this->validate($request,[
                'name' => 'required|max:190|min:2',
                'code' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'brand' => 'required',
                'image' => 'required',
                'description' => 'required',
                'availability' => 'required',
                'is_new' => 'required',
                'is_recommended' => 'required',
                'status' => 'required'
            ]);

            $file = $request->file('image');

            $original_name = $file->getClientOriginalName();

            $file->move(public_path().'/img', $original_name);

            $params = [
                $name = $request->name,
                $category_id = $request->category_id,
                $code = $request->code,
                $price = $request->price,
                $brand = $request->brand,
                $description = $request->description,
                $availability = $request->availability,
                $is_new = $request->is_new,
                $is_recommended = $request->is_recommended,
                $status = $request->status,
                $image = 'img/'.$original_name,
            ];

            if(Product::createProduct($params)) {

                return redirect('/admin/product');
            }
        }

        return view('admin.product.create', compact('categoriesList'));
    }

    public function actionUpdate(Request $request) {

        $id = intval($request->id);

        if ($request->submit) {

           /* $this->validate($request,[
                'name' => 'required|max:190|min:2',
                'code' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'brand' => 'required',
                'description' => 'required',
                'availability' => 'required',
                'is_new' => 'required',
                'is_recommended' => 'required',
                'status' => 'required',
                'image'=>'required'
            ]);*/

            $original_name = $request->image;

            if($request->image_file) {

                $file = $request->file('image_file');

                $original_name = $file->getClientOriginalName();

                $file->move(public_path().'/img', $original_name);

                $original_name = 'img/'.$original_name;
            }

            $params = [
                $name = $request->name,
                $category_id = $request->category_id,
                $code = $request->code,
                $price = $request->price,
                $brand = $request->brand,
                $description = $request->description,
                $availability = $request->availability,
                $is_new = $request->is_new,
                $is_recommended = $request->is_recommended,
                $status = $request->status,
                $image = $original_name,
                $id,
            ];

            if(Product::updateProduct($params)) {

                return redirect('/admin/product');
            }
        }

        $product = Product::getProductById($id);

        $categoriesList = Category::getCategoryList();

        return view('admin.product.update', compact('id', 'product', 'categoriesList'));
    }
}
