<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;

class Tourlistcontroller extends Controller
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
        $tours = DB::table('tour')->select('*')->paginate(12); 
       $banner = DB::table('banner')->get();
       $advertisement = DB::table('advertisement')->where('page_id', 7)
        ->where('status', 1)
        ->get();
        return view('web.tour_listing', ['tours' => $tours, 'banner' => $banner, 'advertisement' => $advertisement]);
    }


     public function tour_detail(Request $request)
    {
      $id = $request->id;
      /*print_r($id); die;*/
      $detail = DB::table('tour')->where('id', $id)->get();

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

         //  echo"<pre>";
         // print_r($reuired_accessories);die;

      $tours = DB::table('tour')->get(); 
      $banner = DB::table('banner')->get();

        return view('web.tour_detail', ['detail' => $detail, 'tours' => $tours, 'reuired_accessories' => $reuired_accessories, 'banner' => $banner]);
    }

   
   public function search(Request $request)
    {   
        $type = $request->type;
        if($type){

                $tours = DB::table('tour')->where('type','like',"%{$type}%")->get(); 
                 return ($tours);

        }
        else{
        $name = $request->name;
        if($name == null)
        {
                $tours = DB::table('tour')->select('*')->paginate(12); 
                return view('web.tour_listing', ['tours' => $tours]);
        }else{

                 $tours = DB::table('tour')->where('name','like',"%{$name}%")->paginate(12); 
                 return view('web.tour_listing', ['tours' => $tours]);
        }  
      }      
    }

    
   public function tour_inquery(Request $request)
    {

              $input['name'] =$request->name;
              $input['email'] =$request->email;
              $input['to_date'] =$request->to_date;
              $input['from_date'] =$request->from_date;
              $input['adult'] =$request->adult;
              $input['child'] =$request->child;
              $input['senior'] =$request->senior;
              $input['comment'] =$request->comment; 
              $input['to_tour'] =$request->to_tour;
              $input['from_tour'] =$request->from_tour;
// echo"<pre>";
// print_r($input); die;                     

            $result = DB::table('tour_request')->insert(array($input));
     
        if($result){

           return redirect()->back()->with('message', 'Tour Inquery add successfully .');

        }
        else{

            return redirect()->back()->with('message', 'Network Problem .');
        }
             
    }


  public function search_tours(Request $request)
    {   
       // echo "<pre>";
       // print_r($request->id);
       // die;
        $id = $request->id;
        $intype = 'Inside Kuwait';
       
        if($id == '1'){ 
              
                $tours = DB::table('tour')->where('type','like',"%{$intype}%")->paginate(12); 
                $banner = DB::table('banner')->get();
                $advertisement = DB::table('advertisement')->where('page_id', 7)
                  ->where('status', 1)
                  ->get();
                  // echo"<pre>";
                  // print_r($tours); die;
              return view('web.tour_listing', ['tours' => $tours, 'banner' => $banner, 'advertisement' => $advertisement]);

        }
        elseif($id == '2'){
                 $outtype = 'Outside Kuwait';
         
                $tours = DB::table('tour')->where('type','like',"%{$outtype}%")->paginate(12); 
                $banner = DB::table('banner')->get();
                $advertisement = DB::table('advertisement')->where('page_id', 7)
                  ->where('status', 1)
                  ->get();

              return view('web.tour_listing', ['tours' => $tours, 'banner' => $banner, 'advertisement' => $advertisement]);

      } else{

           return redirect()->back();

      }


    }





}
