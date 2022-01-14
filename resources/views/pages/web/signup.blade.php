@extends('masterlayout.web.header')

@section('signup')
    <link rel="stylesheet" href="{{ asset('style/sigup-style/signup-resp.css') }}">
    <div class="container login">
        <div class="row login-content p-0 m-0">
            <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12  login-content-itemone ">
                <div class="login-content-item-introduce">
                    <h3 class="content-item-heading">Hãy đến với chúng tôi</h3>
                    <p class="content-item-introduce">Đăng kí ngay để nhận những phần quà hấp dẫn cho gia đình bạn</p>

                    <div class="content-img-introduce">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/fruit-selling-fruits-to-customer-4650786-3860595.png"
                            alt="nền" class="img-introduce">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 login-content-itemtwo">
                <h3 class="content-heading-signin">Đăng kí</h3>
                <form action="" method="post" id="form">
                    @csrf
                    <div class="form-email">
                        <input type="email" placeholder="Email" name="email" required id="inputEmail"
                            class="form-control">
                    </div>
                    <div class="form-user">
                        <input type="text" placeholder="Tên đăng nhập" name="username" required id="inputUserName"
                            class="form-control">
                    </div>
                    <div class="form-user">
                        <input type="text" placeholder="Họ tên" name="name" required id="inputHoTen" class="form-control">
                    </div>
                    <div class="row form-haft">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-pass">
                            <input type="password" placeholder="Mật khẩu" name="password" required id="inputPassword"
                                class="form-control">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 form-adress">
                            <input type="text" placeholder="Địa chỉ" name="address" required id="inputDiaChi"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row form-haft">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  form-phone">
                            <input type="text" placeholder="Số điện Thoại" name="phone" required id="inputSoDienThoai"
                                class="form-control">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  form-date">
                            <input type="date" placeholder="Date of birth" name="DOB" required id="inputSinhNhat"
                                class="form-control">
                        </div>
                    </div>

                    <div class="btn-signin">
                        <input type="button" onclick="validate()" class="btn btn-signin-item text-white"
                            value="Đăng kí"></input>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var inputEmail = document.getElementById('inputEmail');
        var inputUserName = document.getElementById('inputUserName');
        var inputHoTen = document.getElementById('inputHoTen');
        var inputPassword = document.getElementById('inputPassword');
        var inputDiaChi = document.getElementById('inputDiaChi');
        var inputSoDienThoai = document.getElementById('inputSoDienThoai');
        var inputSinhNhat = document.getElementById('inputSinhNhat');

        function validate() {
            if (inputEmail.value == "" ||
                inputUserName.value == "" ||
                inputHoTen.value == "" ||
                inputPassword.value == "" ||
                inputDiaChi.value == "" ||
                inputSoDienThoai.value == "" ||
                inputSinhNhat.value == ""
            ) {
                thongBao("alert-danger", "Đã có trường dữ liệu bị nhập thiếu");

            } else {
                if (inputEmail.value.search('@') == -1) {
                    thongBao("alert-danger", "Bạn đã nhập sai email");
                } else {
                    var form = document.getElementById("form");
                    form.submit();
                }

            }
        }
    </script>

@endsection
