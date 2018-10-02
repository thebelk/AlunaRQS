<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use \Carbon\Carbon;
use App\Requisicion;
use App\Area;
use App\EstadosRequisicion;
use Auth;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		
		if(Auth::user()->hasRole(['compras','admin'])){
			$requisiciones = Requisicion::all();
		}
		else{
			$id_est_rqs = EstadosRequisicion::whereNotIn('tip_est_req',array(3,8))->get(['id']);
			$roles = Auth::user()->roles->pluck('id')->toArray();
			$roles = array_filter($roles);
			if(in_array(4,$roles)){
				$areas = Area::where('tipos_area_id',Auth::user()->area->tipoarea->id)->pluck('id');
				$requisiciones = Requisicion::whereIn('est_rqs',$id_est_rqs)->whereIn('area_id',$areas)->get();
			}
			else{
				$requisiciones = Requisicion::whereIn('est_rqs',$id_est_rqs)->where('area_id',Auth::user()->area->id)->get();
			}
		}
		$now = Carbon::now();
         return view('home')->with(compact('requisiciones','now'));
        
    }
	

}
