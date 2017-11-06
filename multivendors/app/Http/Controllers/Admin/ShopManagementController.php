<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\ShopManagement;
use App\Country;
use App\State;

class ShopManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shops = ShopManagement::all();

        return view('admin.shops.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $shop = ShopManagement::findOrFail($id);
        $countries = Country::all();
        $states = State::all(); 

        return view('admin.shops.edit',compact('shop','countries','states'));
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
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());
            
            $shop = ShopManagement::findOrFail($id);
            
            $shop->name = $request->name;
            $shop->slug = changeTitle($shop->name);
            $shop->active = (($request->active) == 1) ? "Yes" : "No";
            $shop->description = $request->description;
            $shop->featured_shop = (($request->featured_shop) == 1) ? "Yes" : "No";
            $shop->phone = $request->phone;
            $shop->address = $request->address;
            $shop->postcode = $request->postcode;
            $shop->country_id = $request->country;
            $shop->state_id = $request->states;
            // $shop->payment_policy = (($request->payment_policy == null) ? " " : $request->payment_policy);
            // $shop->delivery_policy = (($request->delivery_policy == null) ? " " : $request->delivery_policy);
            // $shop->refund_policy = (($request->refund_policy == null) ? " " : $request->refund_policy);
            // $shop->additional_information = (($request->additional_information == null) ? " " : $request->additional_information);
            // $shop->seller_information = (($request->seller_information == null) ? " " : $request->seller_information);
            // $shop->meta_tag_title = $request->meta_tag_title;
            // $shop->meta_tag_keywords = $request->meta_tag_keywords;
            // $shop->meta_tag_description = (($request->meta_tag_description == null) ? " " : $request->meta_tag_description);
            $shop->payment_policy = $request->payment_policy;
            $shop->delivery_policy = $request->delivery_policy;
            $shop->refund_policy = $request->refund_policy;
            $shop->additional_information = $request->additional_information;
            $shop->seller_information = $request->seller_information;
            $shop->meta_tag_title = $request->meta_tag_title;
            $shop->meta_tag_keywords = $request->meta_tag_keywords;
            $shop->meta_tag_description = $request->meta_tag_description;

            if(isset($request['logo']))
            {
                $getFile = $request->file('logo');
                $name = $getFile->getClientOriginalName();
                $logo = str_random(5)."_".$name;
                while (file_exists("upload/admin/shop/logo/".$logo))
                {
                    $logo = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/shop/logo/",$logo);
                // unlink("upload/admin/shop/logo/".$shop->$logo);
                $shop->logo = $logo;
            }

            if(isset($request['banner']))
            {
                $getFile = $request->file('banner');
                $name = $getFile->getClientOriginalName();
                $banner = str_random(5)."_".$name;
                while (file_exists("upload/admin/shop/banner/".$banner))
                {
                    $banner = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/shop/banner/",$banner);
                // unlink("upload/admin/shop/banner/".$shop->$banner);
                $shop->banner = $banner;
            }

            $shop->save();

            return redirect('admin/manager/shops');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('shop_delete')) {
            return abort(401);
        }
        $shop = ShopManagement::findOrFail($id);
        $shop->delete();

        return redirect()->route('admin.shops.index');
    }
}
