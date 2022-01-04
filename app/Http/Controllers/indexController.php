<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userHasChild;
use App\Models\userWorkAnalysis;

class indexController extends Controller
{
    public function index()
    {
        $affiliatorChilds = userHasChild::where('from_refferd_user_id', auth()->user()->id)->get();
        return view('dashboard',compact('affiliatorChilds'));
    }

    public function user($refferCode = null)
    {

        if(!is_null($refferCode)){

            $reffered_user = User::where('reffer_code', $refferCode)->first();
            if($reffered_user){
               $userWork = userWorkAnalysis::where('user_id', $reffered_user->id)->first();
               $userWork->total_clicks = $userWork->total_clicks + 1;
               $userWork->save();
            }else{
                $refferCode = null;
            }

        }
        return view('home', compact('refferCode'));
    }
}
