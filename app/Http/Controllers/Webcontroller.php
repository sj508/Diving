<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;
use Mail;

class Webcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*public function __construct()
    {
        $this->middleware('auth:customer');
  
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*if (Auth::guard('customer')->check()) {
    
        $user = Auth::guard('customer')->user();
        echo $user_id = $user->name;

      }
      else{
        echo "No";
      }
      die;*/
      //$user = Auth::user()->id;
      //dd($user); 
    //dd(Auth::guard('customer')->check());

        $courses = DB::table('courses')->select('*')->get(); 
        $tour = DB::table('tour')->select('*')->get();
        $accesories = DB::table('product')
          ->join('category', 'product.category_id', '=', 'category.id')
          ->select('product.*', 'category.name as cat_name')
          ->limit(4)->get();
        $banner = DB::table('banner')->get(); 
        $client = DB::table('our_client')->get(); 
        $advertisement = DB::table('advertisement')->where('page_id', 1)
        ->where('status', 1)
        ->get();

        $ourteam = DB::table('our_team')->where('status', 1)->get();
        $content = DB::table('content')->get();

        return view('web.home', ['courses' => $courses, 'tour' => $tour, 'accesories' => $accesories, 'banner' => $banner, 'client' => $client, 'advertisement' => $advertisement, 'ourteam' => $ourteam, 'content' => $content]);
    }


    public function userlogout()
    {
        //Auth::logout();
        auth()->guard('customer')->logout();
      /*  dd(url('/'));*/
        return redirect('/');

       
    }


      public function terms()
    {
        $content = DB::table('content')->get();
        return view('web.term_condition', ['content' => $content]);
    }

      public function privacy_policy()
    {
        $content = DB::table('content')->get();
        return view('web.privacy_policy', ['content' => $content]);
    }


      public function subscribe(Request $request)
    {
         $input['email'] =$request->email;
         $result = DB::table('subscription')->insert(array($input));

         if($result){

           return redirect()->back()->with('subscri', 'subscribe successfully');

        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
        
    }


  public function contact_us()
    {
        $banner = DB::table('banner')->get();
        return view('web.contact', ['banner' => $banner]);
    }


      public function post_contact_us(Request $request)
    { 
      // echo"<pre>";
      // $data = $request->input();
      // print_r($data); die;
      $first_name = $request->first_name;
      $last_name = $request->last_name;
      $email = $request->email;
      $phone = $request->phone;
      $comment = $request->comment;

      $user = 'developermactosys@gmail.com';

      Mail::send('web.email_contact',['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'phone' => $phone, 'comment' => $comment],
      function($message) use ($user){
        $message->to($user);
        $message->subject("Contact Us");
      });
      return redirect()->back()->with('message', 'Thank you for Contact Us!.');
        
    }


        public function membership_plan()
    {
         $membership = DB::table('packages')->get();
        return view('web.membership', ['membership' => $membership]);
    }


      public function gallery()
    {
        $gallery = DB::table('gallery')->get();
        return view('web.gallery', ['gallery' => $gallery]);
    }


     public function ourteam()
    {
       $ourteam = DB::table('our_team')->where('status', 1)->get();
       $banner = DB::table('banner')->get();
        return view('web.team', ['ourteam' => $ourteam, 'banner' => $banner]);
    }

      public function about_us()
    {
       $content = DB::table('content')->get();
       $banner = DB::table('banner')->get();
       $client = DB::table('our_client')->get(); 
       $accessories = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.*', 'category.name as cat_name')->limit(4)
            ->get();
           return view('web.about_us', ['content' => $content, 'banner' => $banner, 'client' => $client, 'accessories' => $accessories]);
    }




  public function addfav(Request $request)
    {
     

      if($user = Auth::guard('customer')->user()){
              $user_id = $user->id;
              $pro_id = $request->id;
              $value = DB::table('wish_list')->where('user_id', $user_id)
              ->where('product_id', $pro_id)->first();
       if($value == null)
       {
              
              $input['user_id'] = $user_id;
              $input['product_id'] = $pro_id;
              $addfav = DB::table('wish_list')->insert(array($input));
              return redirect()->back();

       }else
        {
              $addfav =DB::table('wish_list')->where('user_id', $user_id)
              ->where('product_id', $pro_id)->delete();
              return redirect()->back();
        }
      }  
      else{

              return redirect()->back();
      }    
           
    }


    public function addfav_course(Request $request)
    {
     

      if($user = Auth::guard('customer')->user()){
              $user_id = $user->id;
              $pro_id = $request->id;
              $value = DB::table('wish_list')->where('user_id', $user_id)
              ->where('course_id', $pro_id)->first();
       if($value == null)
       {
              
              $input['user_id'] = $user_id;
              $input['course_id'] = $pro_id;
              $addfav = DB::table('wish_list')->insert(array($input));
              return redirect()->back();

       }else
        {
              $addfav =DB::table('wish_list')->where('user_id', $user_id)
              ->where('course_id', $pro_id)->delete();
              return redirect()->back();
        }
      }  
      else{

              return redirect()->back();
      }    
           
    }


   public function product_detail(Request $request){
       /* $data = $request->id;
          Print_r($data); die;*/
        //echo $id;
        $id = $request->id;
        $data['getSingleProduct'] = DB::table('product')->where('id', $id)->first();
        $data['getGalleryProductImage'] = DB::table('product_images')->where('product_id', $id)->first();
        $cat_id = $data['getSingleProduct']->category_id;
        $data['getRelatedProduct'] = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.*', 'category.name as cat_name')
            ->get();
        $banner = DB::table('banner')->get();
        $advertisement = DB::table('advertisement')->where('page_id', 10)
        ->where('status', 1)
        ->get();

       if($user = Auth::guard('customer')->user()){
              $user_id = $user->id;  
             $fav = DB::table('wish_list')->where('user_id', $user_id)
          ->where('product_id', $id)->first();

        }
        else{
            return view('web.product_detail',$data, ['banner' => $banner, 'advertisement' => $advertisement]);
        }
           return view('web.product_detail',$data, ['fav' => $fav, 'banner' => $banner, 'advertisement' => $advertisement]);
    }
    
    
    public function registration()
    {
    
        return view('web.register');
    }


     public function post_registration( Request $request)
    {
    

        $customMessages = [
          'required' => 'Please fill passwod.',
          'required' => 'Please confirm fill passwod.',
          'same' => 'Confirm password is not matched.'
         ];


         $validator = Validator::make($request->all(), [
            'password'      => 'required|min:6',
            'cnf_password'      => 'required|same:password',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

             $Hpassword = bcrypt($request->password);

            $destinationPath = base_path() . '/images/avatar/';
            $photo = $request->img;
            if(!empty($photo)){ 
            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());
             $photo_name = '1_'.time().$photo->getClientOriginalName();

              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['address'] =$request->address;
              $input['password'] =$Hpassword;
              $input['mobile'] =$request->mobile;
              $input['city'] =$request->city;
              $input['zip_code'] =$request->zip_code;
              $input['image'] =$photo_name;

            $result = DB::table('customer')->insert(array($input));

}
else{
              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['address'] =$request->address;
               $input['password'] =$Hpassword;
              $input['mobile'] =$request->mobile;
              $input['city'] =$request->city;
              $input['zip_code'] =$request->zip_code;

         $result = DB::table('customer')->insert(array($input));
     }
 }
        if($result){
             return redirect()->back()->with('message', 'Register successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Register not  .');
        }

    }

  

   public function my_account()
    {
      if (Auth::guard('customer')->check()) {
    
          $user = Auth::guard('customer')->user();
          $user_id = $user->id;
          $getcustomer = DB::table('customer')->where('id', $user_id)->first();


          return view('web.my_account', ['getcustomer' => $getcustomer]);

      }
      else{

       return redirect()->back();

      }
        
    }


      public function update_my_account(Request $request)
    {
          // echo"<pre>";
          // $data = $request->input();
          // print_r($data); die;
            $id = $request->id;

          $customMessages = [
         
          'required' => 'Please fill DOB.'
         
         ];
         $validator = Validator::make($request->all(), [
            'dob'            => 'required',
         
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

            $destinationPath = base_path() . '/images/avatar/';
            $photo = $request->img;
            if(!empty($photo)){ 
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
             $photo_name = '/'.time().$photo->getClientOriginalName();

              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['mobile'] =$request->mobile;
              $input['address'] =$request->address;
              $input['city'] = $request->city;
              $input['zip_code'] = $request->zip_code;
              $input['dob'] = $request->dob;
              $input['gender'] = $request->gender;
              $input['image'] =$photo_name;

          $result = DB::table('customer')->where('id', $id)->update($input);

}
else{
              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['mobile'] =$request->mobile;
              $input['address'] =$request->address;
              $input['city'] = $request->city;
              $input['zip_code'] = $request->zip_code;
              $input['dob'] = $request->dob;
              $input['gender'] = $request->gender;

              $result = DB::table('customer')->where('id', $id)->update($input);

     }
   }
        if($result){
             return redirect()->back()->with('message', 'Profile has been Update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Select any edit one value .');
        }

        
    }


    public function change_password()
    {

       if (Auth::guard('customer')->check()) {
    
          $user = Auth::guard('customer')->user();
          $user_id = $user->id;
           $getcustomer = DB::table('customer')->where('id', $user_id)->first();
          return view('web.change_password', ['getcustomer' => $getcustomer]);

      }
      else{
        return redirect()->back();

      }
     
        
    }


    public function post_change_password(Request $request)
    {
        // $data = $request->input();
        //   Print_r($data); die; 
      $id = $request->id;
      $customMessages = [
          'required' => 'Please fill passwod.',
          'required' => 'Please confirm fill passwod.',
          'same'     => 'Confirm password is not matched.'
         ];


         $validator = Validator::make($request->all(), [
            'password'      => 'required|min:6',
            'cnf_password'      => 'required|same:password',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{        

          $Hpassword = bcrypt($request->password);
          $doneUpdata = DB::table('customer')->where('id',$id)->update(['password'=>$Hpassword]);
        
          if($doneUpdata){
           return redirect()->back()->with('message', "Password has been changed");
           
          }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
          }
        }   
              
    }



    public function my_wish_list()
    {

       if (Auth::guard('customer')->check()) {
    
          $user = Auth::guard('customer')->user();
          $user_id = $user->id;
           $getcustomer = DB::table('customer')->where('id', $user_id)->first();
           $getwishlist = DB::table('wish_list')->where('wish_list.user_id', $user_id)
          ->join('product', 'wish_list.product_id', '=', 'product.id')
          ->select('wish_list.*', 'product.image', 'product.id as pro_id', 'product.name as pro_name', 'product.discount_price as pro_price')
           ->get();
          return view('web.my_wishlist', ['getcustomer' => $getcustomer, 'getwishlist' => $getwishlist]);

      }
      else{
        return redirect()->back();
      }    
    }


     public function delete_wishlist(Request $request)
    {

      $id = $request->id;
     $userdelete =DB::table('wish_list')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Remove item successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }



 public function my_order()
    {
      if (Auth::guard('customer')->check()) {
    
          $user = Auth::guard('customer')->user();
          $user_id = $user->id;
          $getcustomer = DB::table('customer')->where('id', $user_id)->first();
          
          $orderdetail = DB::table('order_detail')->where('order_detail.user_id', $user_id)
          ->join('product', 'order_detail.name', '=', 'product.id')
          ->select('order_detail.*', 'product.image', 'product.id as pro_id', 'product.name as pro_name', 'product.discount_price as pro_price', 'product.brand')
          ->get();

          return view('web.my_order', ['getcustomer' => $getcustomer, 'orderdetail' => $orderdetail]);

      }
      else{

       return redirect()->back();

      }
        
    }








}
