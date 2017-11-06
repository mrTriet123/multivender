<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use App\CmsPage;
use Validator;

class CmsPageController extends Controller

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
        if (! Gate::allows('page_access')) {
            return abort(401);
        }

        $pages = CmsPage::all();

        return view('admin.cms-pages.index',compact('pages'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('page_create')) {
            return abort(401);
        }

        return view('admin.cms-pages.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('page_create')) {
            return abort(401);
        }

        $rules = [
            'title' => 'required|unique:cms_pages',
            'content' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $cms_page = new CmsPage;
            
            $cms_page->title = $request->title;
            $cms_page->urlkey = changeTitle($request->title);
            $cms_page->content = $request->content;
            $cms_page->save();

            return redirect('admin/cms/pages');
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
        if (! Gate::allows('page_edit')) {
            return abort(401);
        }

        $page = CmsPage::findOrFail($id);

        return view('admin.cms-pages.edit', compact('page'));
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
        if (! Gate::allows('page_edit')) {
            return abort(401);
        }
        $rules = [
            'title' => 'required',
            'content' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $cms_page = CmsPage::findOrFail($id);
            
            $cms_page->title = $request->title;
            $cms_page->urlkey = changeTitle($request->title);
            $cms_page->content = $request->content;

            $cms_page->save();

            return redirect('admin/cms/pages');
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
        if (! Gate::allows('page_view')) {
            return abort(401);
        }
        $page = CmsPage::findOrFail($id);

        return view('admin.cms-pages.show', compact('page'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('page_delete')) {
            return abort(401);
        }
        $page = CmsPage::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        dd('asd');
        if (! Gate::allows('page_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}