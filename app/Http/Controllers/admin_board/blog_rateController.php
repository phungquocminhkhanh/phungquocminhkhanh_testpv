<?php

namespace App\Http\Controllers\admin_board;
use App\customer_customer;
use App\blog_blog;
use App\blog_rate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class blog_rateController extends Controller
{
    public function list(Request $request)
    {
        
        $query=DB::table('tbl_blog_rate as rate')
        ->select(
            'rate.*',
            "cus.customer_fullname",
            'cus.customer_phone'
        )
        ->leftjoin('tbl_customer_customer as cus', 'cus.id', '=', 'rate.id_customer');
        if(!empty($request->id_blog))
        {
            $query->where('id_blog',$request->id_blog);
        }
        $final=$query->get();
        $data=[
            "success"=>"true",
            "data"=> $final
        ];
        return response()->json($data);
    }


    public function create(Request $request)
    {

        $rate=new blog_rate();
        $rate->id_customer=$request->id_customer;
        $rate->id_blog=$request->id_blog;
        $rate->rate_star=$request->rate_star;
        $rate->comment=$request->comment;
        $rate->save();
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
