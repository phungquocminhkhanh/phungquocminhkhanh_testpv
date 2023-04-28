<?php

namespace App\Http\Controllers\admin_board;
use App\customer_customer;
use App\blog_blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class blog_blogController extends Controller
{
    public function list(Request $request)
    {
        
        $query=DB::table('tbl_blog_blog as blog')
        ->select(
            'blog.*',
            "cus.customer_fullname",
            'cus.customer_phone'
        )
        ->leftjoin('tbl_customer_customer as cus', 'cus.id', '=', 'blog.id_customer');
        if(!empty($request->id_customer))
        {
            $query->where('blog.id_customer',$request->id_customer);
        }
        if(!empty($request->id_blog))
        {
            $query->where('blog.id',$request->id_blog);
        }
        if(!empty($request->filter))
        {
            $filter=$request->filter;
            $query->where(function($query) use ($filter){
                $query->where('blog.title', 'like', '%'.$filter.'%');
            });
            
        }
        $blog=$query->get();
        $data=[
            "success"=>"true",
            "data"=> $blog
        ];
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
       if($validation->passes())
       {
            $image = $request->file('icon');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('images/blog', $new_name);

            $product=new blog_blog;
            if(!empty($request->id_customer))
            {
                $product->id_customer=$request->id_customer;
            }
            $product->title=$request->title;
            $product->content_short=$request->content_short;
            $product->content=$request->content;
            $product->icon='images/blog/'.$new_name;
            $product->save();
            return response()->json([
                "success"=>"true",
                'message'   => 'Thêm thành công',
            ]);
        }
        else
        {
            return response()->json([
                "success"=>"false",
             'message'   => "Thêm thất bại",
            ]);
        }
    }
    public function update(Request $request)
    {

        $data_update=[];

        if(empty($request->id_blog))
        {
            return response()->json([
                'success' =>"false",
                'message'=>"Lỗi dữ liệu truyền lên",
            ],200);
        }

        if(!empty($request->title))
        {
            $data_update["title"]=$request->title;
        }
        if(!empty($request->content_short))
        {
            $data_update["content_short"]=$request->content_short;
        }
        if(!empty($request->content))
        {
            $data_update["content"]=$request->content;
        }

        if(!empty($request->file('icon')))
        {
            $validation = Validator::make($request->all(), [
                    'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            if($validation->passes())
            {
                $pro=blog_blog::where('id',$request->id_blog)->get();
                $filePath ="".$pro[0]->icon;
                if (file_exists($filePath))
                {
                    unlink($filePath);// xoa ảnh củ
                }
                $image = $request->file('icon');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move("images/blog", $new_name);
                $url_new='images/blog/'.$new_name;
                $data_update["icon"]=$url_new;
            }   
        }
        


        blog_blog::where('id',$request->id_blog)->update($data_update);
        return response()->json([
            'success' =>"true",
            'message'=>"Cập nhật thành công",
        ],200);


    }

    public function delete(Request $request)
    {
        if(empty($request->id_blog))
        {
            return response()->json([
                'success' =>"false",
                'message'=>"Lỗi dữ liệu truyền lên",
            ],200);
        }
        try
        {
            $pro=blog_blog::where('id',$request->id_blog)->get();
            $filePath ="".$pro[0]->icon;
            if (file_exists($filePath))
            {
                unlink($filePath);// xoa ảnh củ
            }    
            blog_blog::where('id',$request->id_blog)->delete();

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
