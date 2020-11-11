<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;

class Boatlistcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');

  
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boat = DB::table('boat')->select('*')->paginate(12); 
        $banner = DB::table('banner')->get();
         $advertisement = DB::table('advertisement')->where('page_id', 3)
        ->where('status', 1)
        ->get();
        return view('web.boat_listing', ['boat' => $boat, 'banner' => $banner, 'advertisement' => $advertisement]);
    }


     public function boat_detail(Request $request)
    {
      $id = $request->id;
      /*print_r($id); die;*/
      $detail = DB::table('boat')->where('id', $id)->get();
      $gallery = DB::table('boat_images')->where('boat_id', $id)->get();

      $boat = DB::table('boat')->get();
      $banner = DB::table('banner')->get();

       $advertisement = DB::table('advertisement')->where('page_id', 4)
        ->where('status', 1)
        ->get();

      return view('web.boat_detail', ['detail' => $detail, 'gallery' => $gallery, 'boat' => $boat, 'banner' => $banner, 'advertisement' => $advertisement]);
    }



    
  








}
