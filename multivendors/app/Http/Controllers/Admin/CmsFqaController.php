<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Validator;

use App\CmsFqa;
use App\FqaCategory;

class CmsFqaController extends Controller
{
    /**
     * Display a listing of CmsFqa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $CmsFqa = \Auth::CmsFqa();
        // dd(in_array($CmsFqa->role_id, [1]));
        if (! Gate::allows('fqa_access')) {
            return abort(401);
        }

        $fqas = CmsFqa::all();

        return view('admin.cms-fqas.index',compact('fqas'));
    }

    /**
     * Show the form for creating new CmsFqa.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('fqa_create')) {
            return abort(401);
        }
        $fqa_categories = FqaCategory::get();

        return view('admin.cms-fqas.create', compact('fqa_categories'));
    }

    /**
     * Store a newly created CmsFqa in storage.
     *
     * @param  \App\Http\Requests\StoreCmsFqasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('fqa_create')) {
            return abort(401);
        }

        $rules = [
            'fqa_categories' => 'required',
            'question' => 'required',
            'description' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $cms_fqa = new CmsFqa;
            
            $cms_fqa->fqa_category_id = $request->fqa_categories;
            $cms_fqa->question = $request->question;
            $cms_fqa->description = $request->description;
            $cms_fqa->save();

            return redirect('admin/cms/fqas');
        }
    }


    /**
     * Show the form for editing CmsFqa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('fqa_edit')) {
            return abort(401);
        }
        $cms_fqa = CmsFqa::findOrFail($id);

        $fqa_categories = FqaCategory::get();

        return view('admin.cms-fqas.edit', compact('cms_fqa','fqa_categories'));
    }

    /**
     * Update CmsFqa in storage.
     *
     * @param  \App\Http\Requests\UpdateCmsFqasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'question' => 'required',
            'description' => 'required|min:3',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            // dd('1');
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            // dd('2');
            $cms_fqa = CmsFqa::findOrFail($id);
            
            $cms_fqa->fqa_category_id = $request->fqa_categories;
            $cms_fqa->question = $request->question;
            $cms_fqa->description = $request->description;
            $cms_fqa->save();

            return redirect('admin/cms/fqas');
        }
    }


    /**
     * Display CmsFqa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('fqa_view')) {
            return abort(401);
        }

        $cms_fqa = CmsFqa::findOrFail($id);

        return view('admin.cms-fqas.show', compact('cms_fqa'));
    }


    /**
     * Remove CmsFqa from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('fqa_delete')) {
            return abort(401);
        }
        $CmsFqa = CmsFqa::findOrFail($id);
        $CmsFqa->delete();

        return redirect()->route('admin.cms-fqas.index');
    }

    /**
     * Delete all selected CmsFqa at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('fqa_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CmsFqa::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
