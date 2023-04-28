<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Events\sendMessage;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;



Route::get('/', function () {
   return view('customer.pages.home');
})->name('customer_home');;
Route::get('/admin', function () {
    $check=isset(Auth::user()->id)?Auth::user()->id:"";
    if($check)
    {
        return Redirect('/dashboard');
    }
    return view('admin.login');
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //tra ve gia tri
});
Route::get('/dashboard', function () {
    $check=isset(Auth::user()->id)?Auth::user()->id:"";
    if($check)
    {
        $r=DB::table('tbl_account_authorize')
        ->join('tbl_account_permission','tbl_account_permission.id','=','tbl_account_authorize.grant_permission')
        ->select('tbl_account_permission.permission')
        ->where('tbl_account_authorize.id_admin',Auth::user()->id)
        ->get();
        return view('admin.dashboard')->with("permission",$r);
    }
    return view('admin.login');
});

Route::group(['prefix' => 'page'], function () {
    Route::post('login', 'loginController@login');
    Route::get('logout', 'loginController@logout');
    Route::post('send-otp', 'loginController@send_otp');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('manage-customer',['middleware' => 'auth.roles_admin:module_customer', function () {
        $data=[];
        $per=DB::table('tbl_account_authorize')
                ->join('tbl_account_permission','tbl_account_permission.id','=','tbl_account_authorize.grant_permission')
                ->select('tbl_account_permission.permission')
                ->where('tbl_account_authorize.id_admin',Auth::user()->id)
                ->get();
        $data['permission']= $per;  
        return view('admin.customer',$data);
    }]);

    Route::get('manage-blog',['middleware' => 'auth.roles_admin:module_blog', function () {
        $data=[];
        $per=DB::table('tbl_account_authorize')
                ->join('tbl_account_permission','tbl_account_permission.id','=','tbl_account_authorize.grant_permission')
                ->select('tbl_account_permission.permission')
                ->where('tbl_account_authorize.id_admin',Auth::user()->id)
                ->get();
        $data['permission']= $per;  
        return view('admin.blog',$data);
    }]);
});


Route::group(['prefix' => 'customer'], function () {

    Route::post('cus-login', 'loginController@cus_login');
    Route::get('cus-logout', 'loginController@cus_logout')->name('customer_logout');
    Route::post('send-otp', 'loginController@send_otp');

    Route::get('/login',function() {
        return view('customer.pages.login');
    })->name('customer_login');

    Route::get('/blog',function() {
        return view('customer.pages.blog');
    })->name('customer_blog');

    Route::get('/blog_manager',function() {
        return view('customer.pages.blog_manager');
    })->name('manager_blog');
});

