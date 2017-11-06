<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (! Gate::allows('brand_access')) {
            return abort(401);
        }

        $brands = Brand::all();

        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (! Gate::allows('testimonial_create')) {
            return abort(401);
        }

        return view('admin.brands.create');
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
        if (! Gate::allows('testimonial_create')) {
            return abort(401);
        }
        
        $rules = [
            'name' => 'required',
            'description' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $brand = new Brand;
            
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->slug = changeTitle($brand->name);

            if(isset($request['logo']))
            {
                $getFile = $request->file('logo');
                $name = $getFile->getClientOriginalName();
                $logo = str_random(5)."_".$name;
                while (file_exists("upload/admin/brand/".$logo))
                {
                    $logo = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/brand/",$logo);
                $brand->logo = $logo;
            }
            else
                {
                    $brand->logo = "";
                }

            $brand->save();

            return redirect('admin/product/brands');
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
        if (! Gate::allows('testimonial_view')) {
            return abort(401);
        }

        $brand = Brand::findOrFail($id);

        return view('admin.brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('testimonial_edit')) {
            return abort(401);
        }

        $brand = Brand::findOrFail($id);

        return view('admin.brands.edit', compact('brand'));
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
            'name' => 'required',
            'description' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $brand = Brand::findOrFail($id);
            
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->slug = changeTitle($brand->name);

            if(isset($request['logo']))
            {
                $getFile = $request->file('logo');
                $name = $getFile->getClientOriginalName();
                $logo = str_random(5)."_".$name;
                while (file_exists("upload/admin/brand/".$logo))
                {
                    $logo = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/brand/",$logo);
                // unlink("upload/admin/brand/".$brand->logo);
                $brand->logo = $logo;
            }

            $brand->save();

            return redirect('admin/product/brands');
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
        if (! Gate::allows('brand_delete')) {
            return abort(401);
        }
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brands.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('brand_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Brand::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
