<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class AjaxController extends Controller
{
    //
    public function showState($shop){
    	$id = $_GET['country_id'];
    	$states = State::where('country_id',$id)->get();

    	return view('admin.ajax.state',compact('states'));
    }
    
}
