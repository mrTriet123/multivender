<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\CmsBanner;
use App\TypeBanner;

class CmsBannerController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = \Auth::user();
        // dd(in_array($user->role_id, [1]));
        if (! Gate::allows('banner_access')) {
            return abort(401);
        }

        $banners = CmsBanner::all();

        return view('admin.cms-banners.index',compact('banners'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('banner_create')) {
            return abort(401);
        }
        $type_banners = TypeBanner::get();

        return view('admin.cms-banners.create', compact('type_banners'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('banner_create')) {
            return abort(401);
        }

        $rules = [
            'title' => 'required',
            'type_banners' => 'required',
            'url' => 'required',
            'open_link' => 'required',
        ];

        if($request['type_banners'] == 2)
        {
            $rules = [
                'title' => 'required',
                'type_banners' => 'required',
                'text' => 'required|min:3',
                'url' => 'required',
                'open_link' => 'required',
            ];
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $cms_banner = new CmsBanner;
            
            $cms_banner->title = $request->title;
            $cms_banner->type_banner_id = $request->type_banners;
            $cms_banner->html = (($request->text == null) ? " " : $request->text);
            $cms_banner->url = $request->url;
            $cms_banner->openlink = (($request->open_link == 1) ? "Yes" : "No");

            if(isset($request['image']))
            {
                $getFile = $request->file('image');
                $name = $getFile->getClientOriginalName();
                $image = str_random(5)."_".$name;
                while (file_exists("upload/admin/banner/".$image))
                {
                    $image = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/banner/",$image);
                $cms_banner->image = $image;
            }
            else
                {
                    $cms_banner->image = "";
                }


            $cms_banner->save();

            return redirect('admin/cms/banners');
        }
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('banner_edit')) {
            return abort(401);
        }
        $type_banners = TypeBanner::get();

        $cms_banner = CmsBanner::findOrFail($id);

        return view('admin.cms-banners.edit', compact('cms_banner', 'type_banners'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'type_banners' => 'required',
            'url' => 'required',
            'open_link' => 'required',
        ];

        if($request['type_banners'] == 2)
        {
            $rules = [
                'title' => 'required',
                'type_banners' => 'required',
                'text' => 'required|min:3',
                'url' => 'required',
                'open_link' => 'required',
            ];
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());
            
            $cms_banner = CmsBanner::findOrFail($id);
            
            $cms_banner->title = $request->title;
            $cms_banner->type_banner_id = $request->type_banners;
            $cms_banner->html = (($request->text == null) ? " " : $request->text);
            $cms_banner->url = $request->url;
            $cms_banner->openlink = (($request->open_link == 1) ? "Yes" : "No");

            if(isset($request['image']))
            {
                $getFile = $request->file('image');
                $name = $getFile->getClientOriginalName();
                $image = str_random(5)."_".$name;
                while (file_exists("upload/admin/banner/".$image))
                {
                    $image = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/banner/",$image);
                unlink("upload/admin/banner/".$cms_banner->$image);
                $cms_banner->image = $image;
            }

            $cms_banner->save();

            return redirect('admin/cms/banners');
        }
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('banner_view')) {
            return abort(401);
        }
        $cms_banner = CmsBanner::findOrFail($id);

        return view('admin.cms-banners.show', compact('cms_banner'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('banner_delete')) {
            return abort(401);
        }
        $cms_banner = CmsBanner::findOrFail($id);
        $cms_banner->delete();

        return redirect()->route('admin.banners.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('banner_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CmsBanner::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
