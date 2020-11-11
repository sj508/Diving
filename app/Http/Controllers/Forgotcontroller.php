<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use url;
use App\Customer;
use Auth;
use Session;
use Validator;
use Paginate;
use Mail;


class Forgotcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 /*   public function __construct()
    {
        $this->middleware('auth'); 

    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 
       public function forgot_password()
    {
    
        return view('web.forgot');
    }

    
     public function password(Request $request){

       /* $data = $request->input();
        print_r($data); die;*/
        $email = $request->email; 
        //$user = User::whereEmail($request->email)->first();
        $user = DB::table('customer')->where('email', $email)->first();
        if($user == null){
          return redirect()->back()->with('message', 'Email not exist .');
        }

            DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60)
        ]);

            $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {

            return redirect()->back()->with('message', 'Rest Link send to your email id.');

        } else {
        
         return redirect()->back()->withErrors('message', 'A Network Error occurred. Please try again.');
        }
  
       
    }


     public function sendResetEmail($user,$code){

              $userdetail = DB::table('customer')->where('email', $user)->select('name')->first();
              Mail::send('web.email',['user' => $user, 'code' => $code, 'userdetail' => $userdetail],
              function($message) use ($user){
                $message->to($user);
                $message->subject("Rest password.");
              });
              return redirect()->back()->with('message', 'Rest Link send to your email id.');

     }


     public function rest_password(Request $request){

            // echo"<pre>";
            // $code = $request->code;
            // print_r($code); die;
            $code = $request->code;
            $detail = DB::table('password_resets')->where('token', $code)->get();
            if($detail){

                return view('web.rest_password',['detail' => $detail]);
            }
            else{

                return redirect('web.forgot_password')->back()->with('message', 'Network Error.');

            }
            

     }


     public function post_rest_password(Request $request){

             // echo"<pre>";
             // $data = $request->input();
             // print_r($data); die;
        $email = $request->email;
        $check_email = $request->check_email;

        $customMessages = [
          'required' => 'Please fill password.',
          'required' => 'Please confirm fill password.',
          'same' => 'Confirm password is not matched.'

         ];


         $validator = Validator::make($request->all(), [
            'password'      => 'required|min:6',
            'cnf_password'  => 'required|same:password',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
            
            if($email == $check_email){

            $Hpassword = bcrypt($request->password);
            $detail = DB::table('customer')->where('email', $email)->update(['password'=>$Hpassword]);
            $remove = DB::table('password_resets')->where('email',$email)->delete();

            }else{
                
                return redirect()->back()->with('message', 'Email Does not Match');
            }  

        }
        if($detail){

                return redirect('web.forgot_password')->with('message', 'Password Reset Sucessfully');
        }
        else{

            return redirect('web.forgot_password')->with('message', 'Network Error.');

        }
            

     }













}
