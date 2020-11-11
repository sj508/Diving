<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use url;
use Validator;
use Auth;
use Session;
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
        //dd(Auth::guard('web')->check());
         $user = Auth::guard('web')->user();
         $user_id = $user->id;

        $classses = DB::table('classes')->where('tranner_name',$user_id)->count();
        $assigend_class = DB::table('classes')->where('classes.tranner_name',$user_id)
        ->join('courses', 'classes.courses_name', '=', 'courses.id')
        ->select('classes.*', 'courses.name as cour_name')
        ->paginate(5);
        $accessories = DB::table('request_accessories')->where('tranner_id',$user_id)
        ->where('status',2)
        ->count();
        $pending = DB::table('request_accessories')->where('tranner_id',$user_id)
        ->where('status',1)
        ->count();
        // print_r($accessories); die;
        return view('home', ['classses' => $classses, 'accessories' => $accessories, 'pending' => $pending, 'assigend_class' => $assigend_class]);
    }

    public function profile()
    {
            
        return view('profile');
    }

  public function getLogout(){
  
     Auth::logout();
    //auth()->guard('web')->logout();
     return redirect('/admin')->with('message', 'Logout successfully .');
}

 public function view_banner()
    {
        $users =  DB::table('banner')->get();
        return view('view_banner',['users' => $users]);
    }

 public function banner()
    {
    
        return view('add_banner');
    }




public function upload_banner(Request $request)
    {
         /*$data = $request->input();
          Print_r($data); die;*/
          $photo = $request->img; 

         if($photo){
        foreach ($photo as $key => $galleryphoto) {

            $destinationPath = base_path() . '/images/banner/';       
            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());
            $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());

             }
          }
            $getgallery = implode(",",$multi);

              $input['image'] =$getgallery;
              $input['page_id'] = $request->page_id;
              $input['heading'] = $request->heading;
              $input['short_description'] = $request->short_description;

            
           $result = DB::table('banner')->insert(array($input));
  
        if($result){
             return redirect()->back()->with('message', 'Banner has been Add successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Network Problem .');
        }

    }

    public function edit_banner(Request $request)
    {
        $id = $request->id;
      $banner = DB::table('banner')->find($id);

     return view('edit_banner',['banner' => $banner]);
    }


    public function post_edit_banner(Request $request)
    {
       //  echo"<pre>";
       // $data = $request->input();
       // Print_r($data); die;

            $id = $request->id;
            $photo = $request->img; 
         
         if($photo){
        foreach ($photo as $key => $galleryphoto) {

            $destinationPath = base_path() . '/images/banner/';       
            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());
            $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());

             }
          
            $getgallery = implode(",",$multi);

              $input['short_description'] =$request->short_description;
              $input['heading'] =$request->heading;
              $input['image'] =$getgallery;

           $result = DB::table('banner')->where('id', $id)->update($input);
}
else{

              $input['short_description'] =$request->short_description;
              $input['heading'] =$request->heading;
    
           $result = DB::table('banner')->where('id', $id)->update($input);

}
        if($result){
             return redirect()->back()->with('message', 'Banner has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Banner not update .');
        }
              
    }


    public function delete_banner(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('banner')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Banner has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }


 public function add_gallery()
    {
        $gallery =DB::table('gallery')->get();
        return view('add_gallery', ['gallery' => $gallery]);
    }


 public function upload_gallery(Request $request)
    {

       $customMessages = [
          'required' => 'Please select Images.',      
         ];

         $validator = Validator::make($request->all(), [
            'img'      => 'required',          
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

        $photo = $request->img; 

         if($photo){
        foreach ($photo as $key => $galleryphoto) {

            $destinationPath = base_path() . '/images/gallery/';       
            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());
            $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());

             }
          }
            $getgallery = implode(",",$multi);

            $input['image'] =$getgallery;
            $result = DB::table('gallery')->insert(array($input));
        }
        if($result){

           return redirect()->back()->with('message', ' Gallery add successfully .');

        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    
    }


public function delete_gallery(Request $request)
    {
      
      $id = $request->id;
     $userdelete =DB::table('gallery')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Gallery has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }


    public function add_client(Request $request)
    {
          $client =DB::table('our_client')->get();

          return view('our_client', ['client' => $client]);
    }


     public function upload_client(Request $request)
    {
            $destinationPath = base_path() . '/images/ourclient/';  
            $photo = $request->img;           
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
            $photo_name = '/'.time().$photo->getClientOriginalName();

            $input['image'] =$photo_name;
            $result = DB::table('our_client')->insert(array($input));

        if($result){

           return redirect()->back()->with('message', ' Client add successfully .');

        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    
    }

public function delete_client(Request $request)
    {
      
      $id = $request->id;
     $userdelete =DB::table('our_client')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Client has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }


 public function add_advertisement()
    {

        return view('add_advertisement');
    }



 public function post_advertisement(Request $request)
    {
        $page_id = $request->page_id;
        $limit =DB::table('advertisement')->where('page_id', $page_id)->count();

        if($limit == 2){
           return redirect()->back()->with('alert', ' Only two advertisement add per page .');
        }else{

            $input['page_id'] = $request->page_id;
            $input['title'] = $request->title;
            $input['price'] =$request->price;
            $input['discount_percentage'] =$request->discount_percentage;
            $input['short_description'] =$request->short_description;
            $result = DB::table('advertisement')->insert(array($input));
          }
        if($result){

           return redirect()->back()->with('message', ' Advertisement add successfully .');

        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    
    }


     public function view_advertisement()
    {
        $users =  DB::table('advertisement')->get();
        return view('view_advertisement',['users' => $users]);
    }


public function delete_adver(Request $request)
    {
      
      $id = $request->id;
     $userdelete =DB::table('advertisement')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Advertisement has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }


    public function status_advert(Request $request)
    {
      /*$data = $request->id;
          Print_r($data); die;  */
      /*  $user = User::find($id);*/
      $id = $request->id;
       $detail = DB::table('advertisement')->select('status')->find($id);

       if($detail->status == 1){

            $input['status'] = '0';
        $userupdate =DB::table('advertisement')->where('id', $id)->update($input);
       }else{

           $input['status'] = '1';
        $userupdate =DB::table('advertisement')->where('id', $id)->update($input);
       }


    if($userupdate){
           return redirect()->back();
           
    }else{
            return redirect()->back();
             
       }    
    }



 public function edit_advertisement(Request $request)
    {
        $id = $request->id;
      $add_list = DB::table('advertisement')->find($id);

     return view('edit_advertisement',['add_list' => $add_list]);
    }



 public function post_edit_advertisement(Request $request)
    {

            $id = $request->id;

            $input['page_id'] = $request->page_id;
            $input['title'] = $request->title;
            $input['price'] =$request->price;
            $input['discount_percentage'] =$request->discount_percentage;
            $input['short_description'] =$request->short_description;
    
           $result = DB::table('advertisement')->where('id', $id)->update($input);


        if($result){
             return redirect()->back()->with('message', 'Advertisement has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Advertisement not update .');
        }
    
    }


      public function web_content()
    {    
        return view('web_content');
    }

      public function get_content(Request $request)
    {
        $id = $request->id;

        $get_list = DB::table('content')->where('page_id', $id)->get();    
        return ($get_list);
    }



    public function post_content(Request $request)
    {
          echo"<pre>";
          $data = $request->input();
          print_r($data); die;


        $page_id = $request->page_id;

       $get_content = DB::table('content')->where('page_id', $page_id)->get(); 
       if($get_content){

        $input['description'] = $request->description;

        $result = DB::table('content')->where('page_id', $page_id)->update($input); 

       }else{


        $input['description'] = $request->description;
        $input['page_id'] = $request->page_id;

        $result = DB::table('content')->insert(array($input)); 

        } 

        if($result){
           return redirect()->back()->with('message', 'Content has been update successfully .');
      }
      else{

          return redirect()->back()->with('message', 'Content not update .');
      }
        
    }
    

  public function store()
    {  
        $users =  DB::table('store')->get();
        return view('view_store',['users' => $users]);
    }

  public function add_store()
    {
            
        return view('add_store');
    }


    public function post_add_store(Request $request)
    {
        // echo"<pre>";
        // $data = $request->input();
        // print_r($data); die;

        $customMessages = [
          'required' => 'Please fill name.',
          'required' => 'Please fill address.',
          'required' => 'Please fill open time.',
          'required' => 'Please fill close time.',
          'required' => 'Please fill off days.'
        
         
         ];


         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'address'      => 'required',
            'open_time'      => 'required',
            'close_time'      => 'required',
            'off_day'      => 'required',
          
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
            
        $offdays = implode(",", $request->off_day);

        $input['name'] = $request->name;
        $input['address'] = $request->address;
        $input['open_time'] = $request->open_time;
        $input['close_time'] = $request->close_time;
        $input['off_day'] = $offdays;

        $result = DB::table('store')->insert(array($input)); 

        } 

        if($result){
           return redirect()->back()->with('message', 'Store has been Add successfully .');
      }
      else{

          return redirect()->back()->with('message', 'Store not register .');
      }
       

    }



  public function status_store(Request $request)
    {
      /*$data = $request->id;
          Print_r($data); die;  */
      /*  $user = User::find($id);*/
      $id = $request->id;
       $detail = DB::table('store')->select('status')->find($id);

       if($detail->status == 1){

            $input['status'] = '0';
        $userupdate =DB::table('store')->where('id', $id)->update($input);
       }else{

           $input['status'] = '1';
        $userupdate =DB::table('store')->where('id', $id)->update($input);
       }


    if($userupdate){
           return redirect()->back();
           
    }else{
            return redirect()->back();
             
       }    
    }


public function delete_store(Request $request)
    {
      
      $id = $request->id;
     $userdelete =DB::table('store')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Store has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }



 public function edit_store(Request $request)
    {
      $id = $request->id;
      $edit_stores = DB::table('store')->find($id);
     return view('edit_store',['edit_stores' => $edit_stores]);
   }




 public function post_edit_store(Request $request)
    {
            // echo"<pre>";
            // $data = $request->input();
            // print_r($data); die;
          $customMessages = [
          'required' => 'Please fill name.',
          'required' => 'Please fill address.',
          'required' => 'Please fill open time.',
          'required' => 'Please fill close time.',
          'required' => 'Please fill off days.'
        
         
         ];

         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'address'      => 'required',
            'open_time'      => 'required',
            'close_time'      => 'required',
            'off_day'      => 'required',
          
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

             $id = $request->id;
            $offdays = implode(",", $request->off_day);

            $input['name'] = $request->name;
            $input['address'] = $request->address;
            $input['open_time'] =$request->open_time;
            $input['close_time'] =$request->close_time;
            $input['off_day'] =$offdays;
    
           $result = DB::table('store')->where('id', $id)->update($input);

         }
        if($result){
             return redirect()->back()->with('message', 'Store has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Store not update .');
        }
    
    }




public function team()
    {         
         $users =  DB::table('our_team')->get();
        return view('view_team',['users' => $users]);
    }


public function add_team()
    {         
        return view('add_team');
    }


     public function post_add_team(Request $request)
    {
            //  echo"<pre>";
            // $data = $request->input();
            // print_r($data); die;

      $customMessages = [
          'required' => 'Please fill name.',
          'required' => 'Please fill designation.',    
         
         ];

         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'designation'      => 'required',
            
         
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

            $destinationPath = base_path() . '/images/ourteam/';  
            $photo = $request->img;           
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
            $photo_name = '/'.time().$photo->getClientOriginalName();

            $input['name'] =$request->name;
            $input['designation'] =$request->designation;
            $input['linkdin'] =$request->linkdin;
            $input['facebook'] =$request->facebook;
            $input['twitter'] =$request->twitter;
            $input['email'] =$request->email;
            $input['image'] =$photo_name;

            $result = DB::table('our_team')->insert(array($input));
          }  

        if($result){

           return redirect()->back()->with('message', ' Team add successfully .');

        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    
    }



  public function status_team(Request $request)
    {
      /*$data = $request->id;
          Print_r($data); die;  */
      /*  $user = User::find($id);*/
      $id = $request->id;
       $detail = DB::table('our_team')->select('status')->find($id);

       if($detail->status == 1){

            $input['status'] = '0';
        $userupdate =DB::table('our_team')->where('id', $id)->update($input);
       }else{

           $input['status'] = '1';
        $userupdate =DB::table('our_team')->where('id', $id)->update($input);
       }


    if($userupdate){
           return redirect()->back();
           
    }else{
            return redirect()->back();
             
       }    
    }


    public function delete_team(Request $request)
    {
      
      $id = $request->id;
     $userdelete =DB::table('our_team')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Member has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }



 public function edit_team(Request $request)
    {
      $id = $request->id;
      $our_teams = DB::table('our_team')->find($id);
     return view('edit_team',['our_teams' => $our_teams]);
   }


public function post_edit_team(Request $request)
    {
            // echo"<pre>";
            // $data = $request->input();
            // print_r($data); die;
        $id = $request->id;
          $customMessages = [
            'required' => 'Please fill name.',
          'required' => 'Please fill designation.',    
         
         ];

         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'designation'      => 'required',
          
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

            $photo = $request->img; 

            if($photo){
            $destinationPath = base_path() . '/images/ourteam/';            
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
            $photo_name = '/'.time().$photo->getClientOriginalName();

            $input['name'] =$request->name;
            $input['designation'] =$request->designation;
            $input['linkdin'] =$request->linkdin;
            $input['facebook'] =$request->facebook;
            $input['twitter'] =$request->twitter;
            $input['email'] =$request->email;
            $input['image'] =$photo_name;
    
           $result = DB::table('our_team')->where('id', $id)->update($input);
           
          }else{

            $input['name'] =$request->name;
            $input['designation'] =$request->designation;
            $input['linkdin'] =$request->linkdin;
            $input['facebook'] =$request->facebook;
            $input['twitter'] =$request->twitter;
            $input['email'] =$request->email;
    
           $result = DB::table('our_team')->where('id', $id)->update($input);

         }

        }
        if($result){
             return redirect()->back()->with('message', 'Team has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Store not update .');
        }
    
    }



 public function view_subscribe()
    {
      $users = DB::table('subscription')->get();
      return view('subscribe',['users' => $users]);
   }


  public function delete_subscribe(Request $request)
    {
      
      $id = $request->id;
     $userdelete =DB::table('subscription')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Subscriber has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }




     public function certification()
    {
        $users = DB::table('certification')->get();
        return view('certification', ['users' => $users]);
    }


 public function post_certification(Request $request)
    {
        $customMessages = [
          'required' => 'Please fill Agency Name.'
         
         ];

         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

        $input['name'] = $request->name;

        $result = DB::table('certification')->insert(array($input)); 

        } 

        if($result){
           return redirect()->back()->with('message', 'Certificate has been Add successfully .');
      }
      else{

          return redirect()->back()->with('message', 'Certificate not register .');
      }
       

    }


    public function delete_certification(Request $request)
    {
      
      $id = $request->id;
     $userdelete =DB::table('certification')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "certification has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }


     
}
