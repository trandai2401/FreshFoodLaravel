@extends('masterlayout.web.header')

@section('login')

    <link rel="stylesheet" href="{{ asset('style/login-style/login-resp.css') }}">
    <div class="container login">
        <div class="row login-content p-0 m-0">
            <div class="col-xl-7 col-lg-6 col-md-4 col-sm-12  login-content-itemone ">
                <div class="login-content-item-introduce">
                    <h3 class="content-item-heading">Hãy đến với chúng tôi</h3>
                    <p class="content-item-introduce">Để trở thành khách hàng thành viên của shop</p>

                    <div class="content-img-introduce">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-shopping-3736818-3122116.png"
                            alt="nền" class="img-introduce">
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12 login-content-itemtwo">
                <h3 class="content-heading-login">Đăng nhập</h3>
                <form action="" method="post">
                    @csrf
                    <div class="form-user">
                        <input type="text" placeholder="Tên đăng nhập" name="username" required id=""
                            class="form-control w-100">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="form-pass">
                        <input type="password" placeholder="Mật khẩu" name="password" required id=""
                            class="form-control w-100">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="forgot-remeber d-flex justify-content-between">
                        <a href="" class="forgot-pass">Quên mật khẩu</a>
                        <label>
                            <input type="checkbox" name="">
                            Nhớ mật khẩu
                        </label>
                    </div>

                    <div class="btn-login d-flex justify-content-center mr-0">
                        <input type="submit" class="btn btn-login-item text-white mr-0" value="Đăng Nhập"></input>
                    </div>

                </form>


                <div class="d-flex justify-content-between">
                    <p>Bạn chưa có tài khoản?</p>
                    <a href="{{ route('signup', ['id' => 1]) }}" class="sign-in mx-1">Đăng kí ngay</a>
                </div>
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="..." class="rounded mr-2" alt="...">
                        <strong class="mr-auto">Bootstrap</strong>
                        <small class="text-muted">11 mins ago</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Hello, world! This is a toast message.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addNongSan(idNongSan) {
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('idNongSan', idNongSan);
            form.append('soLuong', 1);
            $.ajax({
                method: 'post',
                url: "http://localhost/FreshFoodLaravel/public/user/cart",
                context: document.body,
                data: form,
                contentType: false,
                processData: false

                // {
                //     _token: "{{ csrf_token() }}",
                //     images: imagefile
                // }
            }).done(function(result) {
                console.log(result);
                var res = JSON.parse(result);
                thongBao("alert-success", "Đã thêm " + res.soLuongThayDoi + " nông sản này vào giỏ hàng");


            }).fail(function(result) {
                console.log(result);
            })
        }
    </script>
@endsection
