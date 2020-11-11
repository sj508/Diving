<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;

class Courseslistcontroller extends Controller
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
        $courses = DB::table('courses')->select('*')->paginate(12); 
       $banner = DB::table('banner')->get();
        $advertisement = DB::table('advertisement')->where('page_id', 5)
        ->where('status', 1)
        ->get();
        return view('web.courses', ['courses' => $courses, 'banner' => $banner, 'advertisement' => $advertisement]);
    }




     public function courses_detail(Request $request)
    {
      $id = $request->id;
      /*print_r($id); die;*/
      $detail = DB::table('courses')->where('courses.id', $id)
      ->join('courses_images', 'courses_images.courses_id', '=', 'courses.id')
      ->select('courses.*', 'courses_images.image as course_gallery')
      ->get();

      $get_data = $detail[0]->required_accessories;
      $get_acces = explode(",",$get_data);
      $reuired_accessories=array();
      foreach ($get_acces as $key ) {

      $result = DB::table('product')->where('product.id', $key)
      ->join('category', 'category.id', '=', 'product.category_id')
      ->select('product.*', 'category.name as cat_name')
      ->get();
        array_push($reuired_accessories, $result[0]);
     }

        // echo"<pre>";
        // print_r($reuired_accessories);die;

      $courses = DB::table('courses')->get(); 
      $banner = DB::table('banner')->get();
      $advertisement = DB::table('advertisement')->where('page_id', 6)
        ->where('status', 1)
        ->get();
      $certification = DB::table('certification')->get();

      if($user = Auth::guard('customer')->user()){
          $user_id = $user->id;  
         $fav = DB::table('wish_list')->where('user_id', $user_id)
            ->where('course_id', $id)->first();
        }else{

            return view('web.courses_detail',['detail' => $detail, 'courses' => $courses, 'reuired_accessories' => $reuired_accessories, 'banner' => $banner, 'advertisement' => $advertisement, 'certification' => $certification]);
        }

        return view('web.courses_detail', ['detail' => $detail, 'courses' => $courses, 'fav' => $fav, 'reuired_accessories' => $reuired_accessories, 'banner' => $banner, 'advertisement' => $advertisement, 'certification' => $certification]);
    }


    public function search(Request $request)
    {
      /*echo"<pre>";
        $data = $request->input();
        print_r($data); die;*/
        $name = $request->name;
        if($name == null)
        {
                $courses = DB::table('courses')->select('*')->paginate(12); 
                return view('web.courses', ['courses' => $courses]);
        }else{

                 $courses = DB::table('courses')->where('name','like',"%{$name}%")->paginate(12); 
                 return view('web.courses', ['courses' => $courses]);
        }        
    }

    
   








}
