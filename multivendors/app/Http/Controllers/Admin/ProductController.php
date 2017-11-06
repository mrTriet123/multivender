<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Product;
use App\Category;
use App\Brand;
use App\ShopManagement;
use App\DataProduct;
use App\SeoProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = ShopManagement::all();
        $categories = Category::all();
        $brands = Brand::all();

        $data_product = DataProduct::all();
        $product_id = [];
        foreach ($data_product as $data_pro) {
            # code...
            $product_id[] = $data_pro->product->id;
        }
        $data_products = Product::whereNotIn('id', $product_id)->get();

        $seo_products = SeoProduct::all();
        $seo_product_id = [];
        foreach ($seo_products as $seo_pro) {
            # code...
            $seo_product_id[] = $seo_pro->product->id;
        }
        $product_seo = Product::whereNotIn('id', $seo_product_id)->get();

        return view('admin.products.create',compact('shops','categories','brands','data_products','product_seo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'shops'=> 'required',
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'mini_quantity' => 'required',
            'brands' => 'required',
            'categories' => 'required',
            'model' => 'required',
            'sku' => 'required',
            'condition' => 'required',
            'active' => 'required',
            // 'tag' => 'required',
            'description' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            $product = new Product;
            $product->shop_id = $request['shops'];
            $product->name = $request['name'];
            $product->slug = changeTitle($product->name);
            $product->price = $request['price'];
            $product->quantity = $request['quantity'];
            $product->minimum_quantity = $request['mini_quantity'];
            $product->brand_id = $request['brands'];
            $product->category_id = $request['categories'];
            $product->model = $request['model'];
            $product->sku = $request['sku'];
            if($request['condition'] == 1){
                $product->condition = "New";
            }
            if($request['condition'] == 2){
                $product->condition = "Used";
            }
            if($request['condition'] == 3){
                $product->condition = "Refurbished";
            }
            $product->status = (($request['active'] == 1) ? 'Yes' : 'No');
            $product->description = $request['description'];
            $product->tags = $request['tag'];
            if(isset($request['image']))
            {
                
                $images = [];
                $img_files = $request['image'];

                foreach ($img_files as $key => $img_file) {

                    $name = $img_file->getClientOriginalName();
                    $image = str_random(5)."_".$name;

                    $img_file->move("upload/admin/product/photos/",$image);

                    $images[] = $image;
                }

                $product->photo = implode("|",$images);        
            }else{
                $product->photo = "";
            }

            $product->save();

            return redirect('admin/manager/products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $shops = ShopManagement::all();
        $categories = Category::all();
        $brands = Brand::all();
        $data_product = DataProduct::where('product_id',$product['id'])->first();
        $seo_product = SeoProduct::where('product_id',$product['id'])->first();

        return view('admin.products.edit',compact('product','shops','categories','brands','data_product','seo_product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $rules = [
            'shops'=> 'required',
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'mini_quantity' => 'required',
            'brands' => 'required',
            'categories' => 'required',
            'model' => 'required',
            'sku' => 'required',
            'condition' => 'required',
            'active' => 'required',
            // 'tag' => 'required',
            'description' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            $product = Product::findOrFail($id);

            $product->shop_id = $request['shops'];
            $product->name = $request['name'];
            $product->slug = changeTitle($product->name);
            $product->price = $request['price'];
            $product->quantity = $request['quantity'];
            $product->minimum_quantity = $request['mini_quantity'];
            $product->brand_id = $request['brands'];
            $product->category_id = $request['categories'];
            $product->model = $request['model'];
            $product->sku = $request['sku'];
            if($request['condition'] == 1){
                $product->condition = "New";
            }
            if($request['condition'] == 2){
                $product->condition = "Used";
            }
            if($request['condition'] == 3){
                $product->condition = "Refurbished";
            }
            $product->status = (($request['active'] == 1) ? 'Yes' : 'No');
            $product->description = $request['description'];
            $product->tags = $request['tag'];
            if(isset($request['image']))
            {
                
                $images = [];
                $img_files = $request['image'];

                foreach ($img_files as $key => $img_file) {

                    $name = $img_file->getClientOriginalName();
                    $image = str_random(5)."_".$name;

                    $img_file->move("upload/admin/product/photos/",$image);
                    // unlink("upload/admin/product/photos/".$name);

                    $images[] = $image;
                }

                $product->photo = implode("|",$images);        
            }

            $product->save();
        }

        return redirect('admin/manager/products');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (! Gate::allows('shop_delete')) {
            return abort(401);
        } 

        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
