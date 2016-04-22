<?php

namespace Chatty\Http\Controllers;

use Auth;

use Chatty\Models\Status;



class HomeController extends Controller
{

    public function index() {

        // show timeline if user is authenticated
        if (Auth::check()) {

            // get the statuses (own and from friends) 
            // (but filter out the replies - see Status model!)
            $statuses = 
                Status::notReply()
                    ->where( 
                        function($query) {
                            return $query->where('user_id', Auth::user()->id)
                                ->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
                        })
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            // provide statuses and replies to the view
            return view('timeline.index')
                ->with('statuses', $statuses);

		}


        // for guests, simply show the home page


		return view('home');
	}


    //this will simply return a view

    public function _zish_index(Request $request)
    {
        session_start();
        if(isset($_SESSION['lang']))
        \App::setLocale($_SESSION['lang']);
        return view("home_landing"); //"return  the home view";
    }//end index

//function to create a new user
    public function _zish_create(Request $request)
    {
        //to-do send user a welcome email when he/she creates a profile

        //first check to see that the email is not already taken
        //then \Hash the users password 
        //store the user record and redirect to homepage with session
       
            /*$user           = new tbl_Seller;
            $user->id       = date("hhmmss");
            $user->name     = $_REQUEST['name'];
            $user->surname  = $_REQUEST['surname'];
            $user->email    = $_REQUEST['email'];
            $user->password = \Hash::make($_REQUEST['password']);
            $user->save();*/


        $id       = date("hhmmss");
        $name     = $_REQUEST['name'];
        $surname  = $_REQUEST['surname'];
        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        
       
        //check user email not exist
        $EmailExist = DB::table('tbl_seller')->where('email', $email)->value("EMAIL");

        if($EmailExist!=NULL)
        {
             echo "this email is in use";
             //echo msgTranslator('en','email_exist');
        }
        else if($EmailExist==NULL)
        {
            $values = array('seller_id' => $id,'name' => $name, 'surname' => $surname, 'email'=>$email,'password'=>\Hash::make($password) );
            DB::table('tbl_seller')->insert($values);
            session_start();
            $_SESSION['loginuser']=$email;
            //Session::put('loginuser', $email);//auto create a session
            echo "good";
        }
    }



    //this is the controller that will authenticate a user 
    public function _zish_login(Request $request)
    {

        $email       = $_REQUEST["email"];
        $pass        = $_REQUEST["pass"];
     

        
        $storedPassword = DB::table('tbl_seller')->where('email','=', $email)->value("PASSWORD");



        

        if ( \Hash::check($pass , $storedPassword) )
        {
            session_start();
            $_SESSION['loginuser']=$email;
            //Session::put('loginuser', $email);//auto create a session
            echo "good";//paswords match proceed
           
        }
        else
        {
            echo "bad";//passwords dont match die
        }


       






    }//function login



//function to send an email from the home page to the admin
    public function _zish_SendEmail(Request $request)
    {
            

            $data = array(
                'name'     => $_GET['name'],
                'company'  => $_GET['company'],
                'email'    => $_GET['email'],
                'msg'  => $_GET['msg']//dont use keyword message

            );

          $success_ =   \Mail::send('userfeedback', $data, function($message)
            {
                $message->to('zishumbak@gmail.com', 'kudzai zishumba')->subject('plus afrik user feedback');
            });      
        
        echo $success_;

    }//end send email


    //funciton to change the language
 
     public function _zish_ChangeLang()
    {
          session_start();
          $lang = $_GET['lang'];
          $_SESSION['lang']=$_GET['lang'];
          echo "good";
          //App::setLocale(Session::get('lang', 'en'));
    }

    


}//class



