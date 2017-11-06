<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\SeoProduct;

class SeoProductController extends Controller
{
    //
    public function postCreate(Request $request){
        $rules = [
            'seo_products' => 'required',
            'meta_tag_title' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ],200);
        }else{
            $seo_product = new SeoProduct;
            $seo_product->product_id = $request['seo_products'];
            $seo_product->meta_tag_title = $request['meta_tag_title'];
            $seo_product->meta_tag_description = $request['meta_tag_description'];
            $seo_product->meta_tag_keywords = changeTitle($seo_product->meta_tag_description);
            $seo_product->save();

            return response()->json([
                'error' => false,
                'messages' => "Create success!"
            ],200);
        }
    }

    public function postEdit($id,Request $request){

        $seo_product = SeoProduct::where('product_id',$id)->first();
        
        $rules = [
                'meta_tag_title' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {

            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ],200);
        }else {
            $seo_product->meta_tag_title = $request['meta_tag_title'];
            $seo_product->meta_tag_description = $request['meta_tag_description'];
            $seo_product->meta_tag_keywords = changeTitle($seo_product->meta_tag_description);
            $seo_product->save();
            return response()->json([
                'error' => false,
                'messages' => "Edit success !"
            ],200);
        }
    }
}
