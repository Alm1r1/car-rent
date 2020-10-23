<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::id();
        $makinat=\App\User::find($user)->makinat()->where('fshire','=',0)->get();
        $imazhet=array();
        foreach($makinat as $value){
            $imazh=\App\Imazh::where('makina_id','=',$value->id)
                ->pluck("img_path")
                ->first()
            ;
            $imazhet[$value->id]=$imazh;
        }

        return view('Profile')->with(['makinat'=>$makinat])->with(['imazhet'=>$imazhet]);
    }
}
