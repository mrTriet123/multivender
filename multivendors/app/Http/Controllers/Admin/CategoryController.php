<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('path', 'asc')->get();

        return view('admin.categories.index',compact('categories'));
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
        $rules = [
            'name' => 'required',
            'description' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            $category = new Category;
            
            $category->name = $request->name;
            $category->slug = changeTitle($category->name);
            $category->description = $request->description;

            if($request['categories'] == 0){
                $cate = Category::where('parent_id',0)->get();
                if(empty($cate)){
                    $category->path = 001;
                    $category->parent_id = 0;
                }else{
                    $arr_cate = [];
                    foreach ($cate as $ca) {
                        # code...
                        $arr_cate[] = $ca->path;
                    }
                    $getMax = max($arr_cate);
                    $number = (int)$getMax;
                    $gan = $number + 1;
                    $path = "00".$gan;

                    $category->path = $path;
                    $category->parent_id = 0;
                }

            }else{
                $cate_parents = Category::where('parent_id',$request['categories'])->get();
                $cate_path = Category::where('id',$request['categories'])->first();
                    
                    if(count($cate_parents) > 0){
                        $arr_cate = [];
                        foreach ($cate_parents as $key => $cate_parent) {
                            $arr_cate[] = $cate_parent->path;
                        }
                        $getMax = max($arr_cate);
                        $test_str = explode(".", $getMax);
                        $arr = array_pop($test_str);
                        $number = (int)$arr;
                        $gan = $number + 1;
                        $path = $cate_path['path'].".00".$gan;

                        $category->path = $path;
                    }else {

                        $path = $cate_path['path'].".001";
                        $category->path = $path;
                        
                    }

                $category->parent_id = $cate_path['id'];
                    
            }
            
            if(isset($request['banner']))
            {
                $getFile = $request->file('banner');
                $name = $getFile->getClientOriginalName();
                $banner = str_random(5)."_".$name;
                while (file_exists("upload/admin/category/".$banner))
                {
                    $banner = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/category/",$banner);
                $category->banner = $banner;
            }
            else
                {
                    $category->banner = "";
                }

            $category->save();

            return redirect('admin/categories');
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
        dd('view');
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
        
        $category = Category::findOrFail($id);
        // $categories = Category::where('path','<',$category->path)->orderBy('path', 'asc')->get();
        $path = $category->path.'%';
        $categories = Category::where('path', 'NOT LIKE', $path)->orderBy('path', 'asc')->get();

        return view('admin.categories.edit',compact('category','categories'));
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

            $category = Category::findOrFail($id);
            $path = $category->path.'%';
            $categories = Category::where('path', 'like', $path)->get();
            $path_old = $category->path;

            $category->name = $request['name'];
            if($request['categories'] == 0){
                $cate = Category::where('parent_id',0)->get();
                $arr_cate = [];
                foreach ($cate as $ca) {
                    # code...
                    $arr_cate[] = $ca->path;
                }
                $getMax = max($arr_cate);
                $number = (int)$getMax;
                $gan = $number + 1;
                $path_new = "00".$gan;
                

                // $array_cate_rep = [];
                foreach ($categories as $catego) {
                    # code...
                    $array_cate = $catego->path;
                    $array_cate_rep = str_replace( $path_old, $path_new, $array_cate );
                    $catego->path = $array_cate_rep;

                    $catego->save();
                }                

                $category->parent_id = 0;

            }else{
                $cate_parents = Category::where('parent_id',$request['categories'])->get();
                $cate_path = Category::where('id',$request['categories'])->first();
                    
                    if(count($cate_parents) > 0){
                        $arr_cate = [];
                        foreach ($cate_parents as $key => $cate_parent) {
                            $arr_cate[] = $cate_parent->path;
                        }
                        $getMax = max($arr_cate);
                        $test_str = explode(".", $getMax);
                        $arr = array_pop($test_str);
                        $number = (int)$arr;
                        $gan = $number + 1;
                        $path_new = $cate_path['path'].".00".$gan;

                        foreach ($categories as $catego) {
                            # code...
                            $array_cate = $catego->path;
                            $array_cate_rep = str_replace( $path_old, $path_new, $array_cate );
                            $catego->path = $array_cate_rep;

                            $catego->save();
                        }
                    }else {
                        $path_new = $cate_path['path'].".001";
                        $array_cate_rep = [];
                        foreach ($categories as $catego) {
                            # code...
                            $array_cate = $catego->path;
                            $array_cate_rep = str_replace( $path_old, $path_new, $array_cate );
                            $catego->path = $array_cate_rep;

                            $catego->save();
                        }                 
                    }

                $category->parent_id = $cate_path['id'];          
            }

            if(isset($request['banner']))
            {
                $getFile = $request->file('banner');
                $name = $getFile->getClientOriginalName();
                $banner = str_random(5)."_".$name;
                while (file_exists("upload/admin/category/".$banner))
                {
                    $banner = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/category/",$banner);
                if(!empty($category->$banner)){
                   unlink("upload/admin/category/".$category->$banner); 
                }
                $category->banner = $banner;
            }

            $category->description = $request['description'];

            $category->save();
        }

        return redirect('admin/manager/categories');
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
        $category = Category::findOrFail($id);
        $path = $category->path.'%';
        $categories = Category::where('path', 'like', $path)->get();

        foreach ($categories as $catego) {
            # code...
            $catego->delete();
        }

        return redirect('admin/categories');
    }

    public function checkDelete(Request $request) {
        
        if(!empty($request['id'])){
            $categories = Category::whereIn('id', $request['id'])->get();

            foreach ($categories as $category) {
                # code...
                $path = $category->path.'%';
                $categories_path = Category::where('path', 'like', $path)->get();
                foreach ($categories_path as $catego) {
                    # code...
                    $catego->delete();
                }
            }

            return response()->json([
                'result' => 1,
            ],200);
        }else{
            return response()->json([
                'result' => 0,
            ],200);
        }
    }
}
