<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\CmsTestimonial;

class CmsTestimonialController extends Controller
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
        if (! Gate::allows('testimonial_access')) {
            return abort(401);
        }

        $testimonials = CmsTestimonial::all();

        return view('admin.cms-testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('testimonial_create')) {
            return abort(401);
        }

        return view('admin.cms-testimonials.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('testimonial_create')) {
            return abort(401);
        }
        
        $rules = [
            'name' => 'required',
            'location' => 'required',
            'text' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $cms_testimonial = new CmsTestimonial;
            
            $cms_testimonial->name = $request->name;
            $cms_testimonial->location = $request->location;
            $cms_testimonial->text = $request->text;

            if(isset($request['image']))
            {
                $getFile = $request->file('image');
                $name = $getFile->getClientOriginalName();
                $image = str_random(5)."_".$name;
                while (file_exists("upload/admin/testimonial/".$image))
                {
                    $image = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/testimonial/",$image);
                $cms_testimonial->image = $image;
            }
            else
                {
                    $cms_testimonial->image = "";
                }

            $cms_testimonial->save();

            return redirect('admin/cms/testimonials');
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
        if (! Gate::allows('testimonial_edit')) {
            return abort(401);
        }

        $cms_testimonial = CmsTestimonial::findOrFail($id);

        return view('admin.cms-testimonials.edit', compact('cms_testimonial'));
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
        if (! Gate::allows('testimonial_edit')) {
            return abort(401);
        }
        $rules = [
            'name' => 'required',
            'location' => 'required',
            'text' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            
            // $page = CmsPage::create($request->all());

            $cms_testimonial =CmsTestimonial::findOrFail($id);
            
            $cms_testimonial->name = $request->name;
            $cms_testimonial->location = $request->location;
            $cms_testimonial->text = $request->text;

            if(isset($request['image']))
            {
                $getFile = $request->file('image');
                $name = $getFile->getClientOriginalName();
                $image = str_random(5)."_".$name;
                while (file_exists("upload/admin/testimonial/".$image))
                {
                    $image = str_random(5)."_".$name;
                }
                $getFile->move("upload/admin/testimonial/",$image);
                unlink("upload/admin/testimonial/".$cms_testimonial->image);
                $cms_testimonial->image = $image;
            }

            
            $cms_testimonial->save();

            return redirect('admin/cms/testimonials');
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
        if (! Gate::allows('testimonial_view')) {
            return abort(401);
        }
        $cms_testimonial = CmsTestimonial::findOrFail($id);

        return view('admin.cms-testimonials.show', compact('cms_testimonial'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('testimonial_delete')) {
            return abort(401);
        }

        $cms_testimonial = CmsTestimonial::findOrFail($id);
        $cms_testimonial->delete();

        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('testimonial_delete')) {
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