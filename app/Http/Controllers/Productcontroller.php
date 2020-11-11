<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use url;
use Validator;
use Auth;
use Session;


class Productcontroller extends Controller
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

      $product_cat = DB::table('category')->select('*')->get();
        // echo "<pre>";
        // print_r($users_type); die;
       // $users = DB::table('users')->get();

        $users = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.*', 'category.name as cat_name')
            ->get();



        return view('product', ['users' => $users, 'product_cat' => $product_cat]);
       
    }



    public function create(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/
           $result = DB::table('category')->insert(
     array(
            'name'   =>   $request->name
     )
);
        if($result){
             return redirect()->back()->with('message', 'Category type has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


    public function subcreate(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/
       $customMessages = [
          'requireds' => 'Please fill .',
          'required' => 'Please fill.'
          
         ];


         $validator = Validator::make($request->all(), [
            'name'      => 'required',
         'subcategory'  => 'required',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{

              $input['name'] =$request->name;
              $input['subcategory'] =$request->subcategory;
           $result = DB::table('category')->insert(array($input));
    }    if($result){
             return redirect()->back()->with('message', ' Sub Category type has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }



 public function addproduct(Request $request){
      
       /*  $data = $request->img;
          Print_r($data); die;*/
       /* $data =$request->type;
        Print_r($data); die;*/

            $destinationPath = base_path() . '/images/product/';  
            $photo = $request->img;           
            $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
             $photo_name = '/'.time().$photo->getClientOriginalName();

            $types = implode(',', $request->type);
            $section_type = implode(',', $request->section_type);

             $discountper = $request->discount_percentage;
             $price = $request->price;
             $discount_pr =  ($price * $discountper / 100);
             $discount_price =($price - $discount_pr);

              $input['name'] =$request->name;
              $input['category_id'] =$request->category_id;
              $input['subcategory_id'] =$request->subcategory_id;
              $input['price'] =$request->price;
              $input['discount_price'] =$discount_price;
              $input['discount_percentage'] =$request->discount_percentage;
              $input['description'] =$request->description;
              $input['short_description'] =$request->short_description;
              $input['type'] =  $types;
              $input['brand'] = $request->brand;
              $input['section_type'] = $section_type;
              $input['quantity'] = $request->quantity;
              $input['image'] =$photo_name;

// print_r($input); die;
           $result = DB::table('product')->insert(
     array($input));
      $id = DB::getPdo()->lastInsertId();
 /* print_r($id); die;*/
     
        if($result){

           return redirect('loadgallery/'.$id)->with('message', ' Product add successfully .');

        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


public function loadgallery($id){

  return view('uploadgallery', ['id' => $id]);

}



 public function uploadgallery(Request $request){
      
         /*$data = $request->input();
          Print_r($data); die;*/
          $photo = $request->img; 
          // Print_r($photo); die;

         if($photo){
        foreach ($photo as $key => $galleryphoto) {

            $destinationPath = base_path() . '/images/gallery/';       
            $galleryphoto->move($destinationPath,  '/'.time().$galleryphoto->getClientOriginalName());
             $multi[] = ('/'.time().$galleryphoto->getClientOriginalName());

             }
          }
            $getgallery = implode(",",$multi);

              $input['image'] =$getgallery;
              $input['product_id'] = $request->id;

           $result = DB::table('product_images')->insert(
     array($input));
     
        if($result){
             return redirect('product')->with('message', 'Gallery has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


 public function edit_product(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $product_cat = DB::table('category')->select('*')->get();
      $product = DB::table('product')->find($id);


     return view('edit_product',['product' => $product, 'product_cat' => $product_cat]);
              
    }


 public function post_edit_product(Request $request)
    {
       // $data = $request->input();
       //    Print_r($data); die;
            $id = $request->id;

           $destinationPath = base_path() . '/images/product/';
            $photo = $request->img;
           /* Print_r($photo); die;*/
           if(!empty($photo)){ 
            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());
             $photo_name = '1_'.time().$photo->getClientOriginalName();

               $input['name'] =$request->name;
              $input['category_id'] =$request->category_id;
              $input['subcategory_id'] =$request->subcategory_id;
              $input['price'] =$request->price;
              $input['discount_price'] =$request->discount_price;
              $input['description'] =$request->description;
              $input['short_description'] =$request->short_description;
              //$input['type'] =  $types;
               $input['quantity'] = $request->quantity;
              $input['image'] =$photo_name;



           $result = DB::table('product')->where('id', $id)->update($input);
}
else{

              $input['name'] =$request->name;
              $input['category_id'] =$request->category_id;
              $input['subcategory_id'] =$request->subcategory_id;
              $input['price'] =$request->price;
              $input['discount_price'] =$request->discount_price;
              $input['description'] =$request->description;
               $input['short_description'] =$request->short_description;
              //$input['type'] =  $types;
               $input['quantity'] = $request->quantity;

           $result = DB::table('product')->where('id', $id)->update($input);

}

        if($result){
             return redirect()->back()->with('message', 'Product has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Product not update .');
        }
              
    }




 public function delete_product(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('product')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Product has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }







}
