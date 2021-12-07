<?php

namespace App\Http\Controllers;

use App\Models\userHasChild;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $affiliatorChilds = userHasChild::where('from_refferd_user_id', auth()->user()->id)->get();
        return view('Affiliator_dashboard',compact('affiliatorChilds'));
    }
}
