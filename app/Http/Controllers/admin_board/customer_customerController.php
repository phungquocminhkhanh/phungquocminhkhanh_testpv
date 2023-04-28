<?php

namespace App\Http\Controllers\admin_board;

use App\customer_customer;
use App\blog_blog;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class customer_customerController extends Controller
{
   
    public function list(Request $request)
    {
        
        $query=DB::table('tbl_customer_customer');
        if(!empty($request->id_customer))
        {
            $query->where('id',$request->id_customer);
        }
        if(!empty($request->filter))
        {
            $filter=$request->filter;
            $query->where(function($query) use ($filter){
                $query->where('customer_phone', 'like', '%'.$filter.'%');
                $query->orWhere('customer_fullname', 'like', '%'.$filter.'%');
            });
            
        }
        $customer=$query->get();
        $data=[
            "success"=>"true",
            "data"=> $customer
        ];
        return response()->json($data);
    }


    public function create(Request $request)
    {

        // $check=customer_customer::where('customer_phone',$request->customer_phone)
        // ->where('id_business',Auth::user()->id_business)->get();
        // if(count($check)>0 && $request->customer_phone!="")
        // {
        //     return response()->json([
        //     'status' => 300,
        //     'message'=>"Số điện thoại này đã được sử dụng",
        // ],200);
        // }
        //nhớ check điều ràng buộc
        $code='KH'.substr(time(),-6);
        $cus=new customer_customer();
        $cus->customer_code=$code;
        $cus->customer_fullname=$request->customer_fullname;
        $cus->customer_password=md5($request->customer_password);
        $cus->customer_phone=$request->customer_phone;
        $cus->save();
        return response()->json([
            'success' =>"true",
            'message'=>"Thêm thành công",
        ],200);
    }

    public function update(Request $request)
    {

        $data_update=[];
        if(!empty($request->customer_fullname))
        {
            $data_update["customer_fullname"]=$request->customer_fullname;
        }
        if(!empty($request->customer_phone))
        {
            $data_update["customer_phone"]=$request->customer_phone;
        }
        customer_customer::where('id',$request->id_customer)->update($data_update);
        return response()->json([
            'success' =>"true",
            'message'=>"Cập nhật thành công",
        ],200);


    }
    public function delete(Request $request)
    {

        try
        {
            $check=blog_blog::where('id_customer',$request->id_customer)->get();
           
            if(count($check)>0)
            {
                return response()->json([
                    'success' =>"true",
                    'message'=>"Không thể xóa khách hàng đã viết blog",
                ]);
            }
            customer_customer::where('id',$request->id_customer)->delete();
            return response()->json([
                'success' =>"true",
                'message'=>"Xóa thành công",
            ]);
        }
        catch(Exception $e)
        {

            return response()->json([
                'success' =>"false",
                'message'=>"Xóa thất bại",
            ]);

        }
    }
}
