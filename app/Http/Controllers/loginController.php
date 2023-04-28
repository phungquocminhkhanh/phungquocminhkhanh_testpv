<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\account_acount;
use App\customer_customer;
use Exception;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();

class loginController extends Controller
{
    public function login(Request $request)
    {

 
        if(Auth::attempt(['account_username' => $request->account_username, 'password' =>md5($request->account_password)]))
        {
            $admin=Auth::user();
            Session::put("type_admin","admin");
            Session::put("data_admin",$admin);
            return Redirect("/dashboard");
        }
        else
        {
            Session::put("mess","Username hoặc password không đúng");
            return Redirect("/");
        }
    }
    public function logout()
    {

        Auth::logout();
        return Redirect("/");

    }
    public function cus_login(Request $request)
    {
       
        $customer=customer_customer::where('customer_phone',$request->account_username)->where('customer_password',md5($request->account_password))->get();

        if(count($customer)>0)
        {

            Session::put("data_customer",$customer[0]);
                   
            Session::put("block","");
            Session::put("mess","");
            Session::put("mess_block","");
            return Redirect(route('customer_home'));
        }
        else
        {
            
            
            Session::put("mess",$b->message);

            
            return Redirect(route('customer_login'));
        }
    }
   
    public function cus_logout(Request $request)
    {
        
        Session::put("data_customer",'');
        return Redirect("/");
    }
   



}
