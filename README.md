
## Thông tin dự án

- Đây là dư án quản lý và đăng tải blog, cho phép người dùng đăng tải nội dung blog lên trang.

## Hướng dẫn cài đặt
- Bạn cần cày đặt Composer, xampp, Git Bash
- Đầu tiên clone dự án từ github về máy (https://github.com/phungquocminhkhanh/phungquocminhkhanh_testpv.git)
- Chọn thư mục dự án vừa clone về và chạy git bash, tiền hành update composer và package bằng lệnh : "composer update"
- Sau khi update xong tìm đến file .env.example đổi thành .env
- Tạo key dự án bằng lệnh : "php artisan key:generate"
- Mở trình quản lý mysql : mà tạo database mới, xong import file "test_pv.sql" đã có trong thư mục dự án
- Để chạy dự án gõ lệnh : "php artisan serve"


## Điều chỉnh lại code

- Điều chỉnh tên database : trong file env tìm kiếm dòng DB_DATABASE=   và điên tên database vừa tạo
- Cặt đặt lại đăng nhập authen:
   + Đi đến thư file :  vendor\laravel\framework\src\Illuminate\Auth\EloquentUserProvider.php
   + Tìm đến funtion validateCredentials và cập nhật mới nội dung code như sau:

     	public function validateCredentials(UserContract $user, array $credentials)
	    {
	        $plain = $credentials['password'];

	        if($plain==$user->getAuthPassword())
	        {
	            return true;
	        }
	        return false;
	        //return $this->hasher->check($plain, $user->getAuthPassword());
	    }


