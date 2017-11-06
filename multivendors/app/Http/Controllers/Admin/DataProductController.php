<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use App\DataProduct;

class DataProductController extends Controller
{
    public function postData(Request $request){

        $rules = [
            'product' => 'required',
            'subtract' => 'required',
            'inventory' => 'required|numeric',
            // 'youtube' => 'required',
            'date_available' => 'required',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'length_class' => 'required',
            'weight' => 'required|numeric',
            'weight_class' => 'required',
            'sort_order' => 'required|numeric',
            'featured' => 'required',
            'enable_cod' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ],200);
        }else{
            $data_product = new DataProduct;

            $data_product->product_id = $request['product'];
            $data_product->subtract_stock = (($request['subtract'] == 1) ? "Yes" : "No");
            $data_product->track_inventory = (($request['inventory'] == 1) ? "Track" : "Do not track");
            if($data_product->track_inventory == "Do not track"){
                $data_product->alert_stock_level = 0;
            }else{
                $data_product->alert_stock_level = $request['alert'];
            }
            $data_product->youtube_video = $request['youtube'];
            $data_product->date_available = $request['date_available'];

            $dimensions = [];
            $dimensions[] = $request['length'];
            $dimensions[] = $request['width'];
            $dimensions[] = $request['height'];
            $data_product->dimensions = implode('|', $dimensions);

            switch ($request['length_class']) {
                case 1:
                    $data_product->length_class = "Centimeter";
                    break;
                case 2:
                    $data_product->length_class = "Millimeters";
                    break;
                case 3:
                    $data_product->length_class = "Inch";
                    break;
                default:
                   echo "Please option!";
            }
            $data_product->weight = $request['weight'];

            switch ($request['weight_class']) {
                case 1:
                    $data_product->weight_class = "Kilogram";
                    break;
                case 2:
                    $data_product->weight_class = "Grams";
                    break;
                case 3:
                    $data_product->weight_class = "Pounds";
                    break;
                case 4:
                    $data_product->weight_class = "Ounce";
                    break;
                case 5:
                    $data_product->weight_class = "Litres";
                    break;
                case 6:
                    $data_product->weight_class = "Mili Litres";
                    break;
                default:
                   echo "Please option!";
            }

            $data_product->sort_order = $request['sort_order'];
            $data_product->featured_product = (($request['featured'] == 1) ? "Yes" : "No");
            $data_product->enable_COD = (($request['enable_cod'] == 1) ? "Yes" : "No");

            $data_product->save();

            return response()->json([
                'error' => false,
                'messages' => "Create success!"
            ],200);
        }
    }

    public function postEdit($id,Request $request){

        $data_product = DataProduct::where('product_id',$id)->first();
        
        $rules = [
                'sort_order' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors()
            ],200);
        }else {
            $data_product->subtract_stock = (($request['subtract'] == 1) ? "Yes" : "No");
            $data_product->track_inventory = (($request['inventory'] == 1) ? "Track" : "Do not track");
            if($data_product->track_inventory == "Do not track"){
                $data_product->alert_stock_level = 0;
            }else{
                $data_product->alert_stock_level = $request['alert'];
            }
            $data_product->youtube_video = $request['youtube'];
            $data_product->date_available = $request['date_available'];
            $data_product->sort_order = $request['sort_order'];
            $data_product->featured_product = (($request['featured'] == 1) ? "Yes" : "No");
            $data_product->save();
            return response()->json([
                'error' => false,
                'messages' => "Edit success !"
            ],200);
        }
    }
}
