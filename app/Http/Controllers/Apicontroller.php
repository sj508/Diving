<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use url;
use Validator;
use Auth;
use Session;
use Hash;
use Mail;

class Apicontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct(Request $request) {
         $request->headers->set('Accept', 'application/json');
        if ($request->header('Content-Type') != "application/json")  {
            $request->headers->set('Content-Type', 'application/json');
        }
    }

    public function index()
    {
        $response = [];
        $response['code'] = 302;
        $response['status'] = false;
        $response['message'] = 'Invalid Access';
        echo str_replace('\/','/',json_encode($response));

    }




  public function login(Request $request)
    {   
        $return_id = $request->return_id;
        $name = $request->return_name;
        $return_email = $request->return_email;
        $email_id = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $login_type = $request->login_type;
        $device_token = $request->device_token;
        $device_type = $request->device_type;

        $validator = Validator::make($request->all(), [
            'device_token' => 'required',
            'device_type' => 'required',
            'password'      => 'min:6',
        ]);
        if ($validator->fails()) {
            $error_msg = [];
            foreach ($validator->messages()->all() as $key => $value) {
                array_push($error_msg, $value);
            }
            if ($error_msg) {
                return array(
                    'status' => false,
                    'code' => 201,
                    'message' => $error_msg[0],
                    'data' => $request->all()
                );
            }
        }else{
          if($login_type == 1){
          $user = DB::table('customer')->where('email', $email_id)->first(); 
          if($user == null){

              $data['status'] = "false";
              $data['message'] = "invalid email & password";

          }else{
          $verify = password_verify($password, $user->password);  
          if($verify){

             $data['status'] = "true";
             $data['data'] = $user;
             $data['message'] = "success"; 
            if($device_token != ""){

              $user_id  = $user->id;

              $setdata['device_token'] = $device_token;
              $setdata['device_type'] = $device_type;
              $setdata['login_status'] = true;

              $result = DB::table('customer')->where('id', $user_id)->update($setdata);

            }
          }else{  
             
               $data['status'] = "false";
               $data['message'] = "invalid email & password";       
            } 
          }
          }elseif ($phone) {
            $user = DB::table('customer')->where('mobile', $phone)->first(); 
          
            if(!empty($user)){
 
                     $this->otpsend($user->mobile, $user->id);  

                     $data['status'] = "true";
                     $data['message'] = "Otp send your mobile Number";
     
            }else{

                    $data['status'] = "false";
                    $data['message'] = "invalid Phone Number";
            }

          }elseif ($login_type == 2) {
            $user = DB::table('customer')->where('email', $email_id)->where('login_type', $login_type)->first();
           if(!empty($user)){
              $user_id  = $user->id;

              $setdata['device_token'] = $device_token;
              $setdata['device_type'] = $device_type;
              $setdata['login_status'] = true;
              $result = DB::table('customer')->where('id', $user_id)->update($setdata);
                
               $data['status'] = "true";
               $data['message'] = "Google login successfully";     
            }else{

                $input['device_token'] = $device_token;
                $input['device_type'] = $device_type;
                $input['google_id'] = $return_id;
                $input['email'] = $return_email;
                $input['name'] = $name;
                $input['login_status'] = true;
                $input['login_type'] = "2";

                $result = DB::table('customer')->insert($input);

                $data['status'] = "true";
               $data['message'] = "Google login successfully";

            }
          }elseif ($login_type == 3) {
            $user = DB::table('customer')->where('email', $email_id)->where('login_type', $login_type)->first();
           if(!empty($user)){
              $user_id  = $user->id;

              $setdata['device_token'] = $device_token;
              $setdata['device_type'] = $device_type;
              $setdata['login_status'] = true;
              $result = DB::table('customer')->where('id', $user_id)->update($setdata);
                
               $data['status'] = "true";
               $data['message'] = "Facebook login successfully";     
            }else{

                $input['device_token'] = $device_token;
                $input['device_type'] = $device_type;
                $input['facebook_id'] = $return_id;
                $input['email'] = $return_email;
                $input['name'] = $name;
                $input['login_status'] = true;
                $input['login_type'] = "3";

                $result = DB::table('customer')->insert($input);

                $data['status'] = "true";
                $data['message'] = "Facebook login successfully";

            }
          }
      
          }

         echo json_encode($data);          
    }



    public function otpsend($mobile, $id)
    {
           //$mobileNumber1 = $_REQUEST['mobile'];
            $mobileNumber1 = $mobile; 
            $mobileNumber = $mobileNumber1; 
            $_SESSION['mobileno'] = $mobileNumber1;

            $otp = rand(1000,9999);
            if(isset($_POST['resend']) && $_POST['resend']== "resendotp")
            {
              unset($_SESSION['otp']);
            }
            $_SESSION['mobileno'] = $mobileNumber1;
            $_SESSION['otp']= $otp;

            $msg="Diving OTP to verify your mobile. Your OTP is $otp";

            $authKey = "165696A2BgiNm2OkJ596cb9c6"; 

            $senderId = "mctsys";

            $message = urlencode($msg);

            //Define route 
            $route = "template";
            //Prepare you post parameters
            $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route
            );

            //API URL
            $url="https://control.msg91.com/sendhttp.php";

            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));


            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //get response
            $output = curl_exec($ch);
            if($output){
                $checkdata = DB::table('otp_verify')->where('user_id', $id)->where('mobile', $mobile)->get();
                $last_id = DB::getPdo()->lastInsertId();
                if(!$checkdata->isEmpty()){
                    $setdata['otp'] = $otp;
                    $result = DB::table('otp_verify')->where('id', $last_id)->update($setdata);
                }else{

                  $input['user_id'] = $id;
                  $input['otp'] = $otp;
                  $input['mobile'] = $mobile;
                  $result = DB::table('otp_verify')->insert(array($input));

                }
            }

    }



    public function otpverify(Request $request)
    {
        $otp = $request->otp;
        $phone = $request->phone;
        $device_token = $request->device_token;
        $device_type = $request->device_type;

        $validator = Validator::make($request->all(), [
            'otp' => 'required',
            'phone' => 'required',
            'device_token' => 'required',
            'device_type' => 'required',
        ]);
        if ($validator->fails()) {
            $error_msg = [];
            foreach ($validator->messages()->all() as $key => $value) {
                array_push($error_msg, $value);
            }
            if ($error_msg) {
                return array(
                    'status' => false,
                    'code' => 201,
                    'message' => $error_msg[0],
                    'data' => $request->all()
                );
            }
        }else{

            $checkdata = DB::table('otp_verify')->where('mobile', $phone)->where('otp', $otp)->first(); 
            //print_r($checkdata->id); die;
            
            if(!empty($checkdata)){
                 $id = $checkdata->id;
                $recorddelete =DB::table('otp_verify')->where('id', $id)->delete();

                $setdata['device_token'] = $device_token;
                $setdata['device_type'] = $device_type;
                $setdata['login_status'] = true;

                $result = DB::table('customer')->where('mobile', $phone)->update($setdata);

               $data['status'] = "true";
               $data['message'] = "Login successfully";
     
            }else{

              $data['status'] = "false";
              $data['message'] = "Otp not match";
            }
        }
         echo json_encode($data);
    }



     public function signup(Request $request)
    {   
        $validator = Validator::make($_POST, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            $error_msg = [];
            foreach ($validator->messages()->all() as $key => $value) {
                array_push($error_msg, $value);
            }
            if ($error_msg) {
                return array(
                    'status' => false,
                    'code' => 201,
                    'message' => $error_msg[0],
                    'data' => $_POST
                );
            }
        }else{

            $photo = $request->image;
            if($photo){
                  $destinationPath = base_path() . '/images/avatar/';
                  $photo->move($destinationPath,  '/'.time().$photo->getClientOriginalName());
                  $photo_name = '/'.time().$photo->getClientOriginalName();

                  $Hpassword = bcrypt($request->password);
                  $input['name'] = $_POST['first_name'];
                  $input['last_name'] = $_POST['last_name'];
                  $input['email'] = $_POST['email'];
                  $input['password'] = $Hpassword;
                  $input['image'] = $photo_name;

                  $result = DB::table('customer')->insert(array($input));
                  if($result){
                       $data['status'] = "true";
                       $data['message'] = "Registration successfully";

                  }else{
                      $data['status'] = "false";
                      $data['message'] = "Something Wrong";
                  }

                }else{

                  $Hpassword = bcrypt($request->password);
                  $input['name'] = $_POST['first_name'];
                  $input['last_name'] = $_POST['last_name'];
                  $input['email'] = $_POST['email'];
                  $input['password'] = $Hpassword;

                  $result = DB::table('customer')->insert(array($input));
                  if($result){
                       $data['status'] = "true";
                       $data['message'] = "Registration successfully";

                  }else{
                      $data['status'] = "false";
                      $data['message'] = "Something Wrong";
                  }

                }

              }
              echo json_encode($data); 
    } 



    public function logout(Request $request){
        $user_id =  User::find($request->user_id);
        if($user_id){
            $user_id->login_status = false;
            $user_id->save();
            return response()->json([ 
              "status"=>true,
              'code'=>200,
              "message"=>"Logout successfully"
            ]);
        }else{
            return response()->json([ 
              "status"=>false,
              'code'=>201,
              "message"=>"User does not"
            ]);
          }
    }



     public function forgotpassword(Request $request)
     {   
            $email = $request->email; 
            //$user = User::whereEmail($request->email)->first();
            $user = DB::table('customer')->where('email', $email)->first();
            if(!empty($user)){
               $new_password = rand(100000,999999); 
               $Hpassword = bcrypt($new_password);

                $setdata['password'] = $Hpassword;
                $result = DB::table('customer')->where('id', $user->id)->update($setdata);

                $this->sendResetEmail($request->email, $new_password);

               $data['status'] = "true";
               $data['message'] = "password send to your email id.";
 
            }else{

                $data['status'] = "false";
                $data['message'] = "Email not exist .";
            }
            echo json_encode($data); 
     }


        public function sendResetEmail($email,$code){

              $userdetail = DB::table('customer')->where('email', $email)->select('name')->first();
              Mail::send('email_forgot_app',['email' => $email, 'code' => $code, 'userdetail' => $userdetail],
              function($message) use ($email){
                $message->to($email);
                $message->subject("Rest password.");
              });
     }





}


