@extends('masterlayout.web.header')
@section('user-profile')
    <link rel="stylesheet" href="{{ asset('style/Userprofile-style/Userprofile-reps.css') }}">
    <!-- part 2: Content -->
    <div class="container">
        <div class="row d-flex">

            <!--left-service  -->
            <div class="left-service">
                <p class="ml-4 mt-3"><strong>Quản lý cá nhân</strong></p>
                <ul class="list-group border-0 w-100 border-0 bg-transparent" id="">
                    <li class="list-group-item py-2 border-0 d-flex justify-content-between">
                        <span class="iconify ml-2 mr-5" data-icon="ant-design:shopping-cart-outlined" data-width="30"
                            data-height="30" style="font-size: 16px;"></span>
                        <p style="width: 150px; margin-right: 100px;">Giỏ hàng</p>
                        <p style=" margin-bottom:0 ">{{ count($user->giohang[0]->itemGioHang) }}</p>
                    </li>
                    <li class="list-group-item py-2 border-0 d-flex justify-content-between">
                        <span class="iconify ml-2 mr-5" data-icon="carbon:favorite" data-width="24" data-height="24"
                            style="font-size: 16px;"></span>
                        <p style="width: 150px; margin-right: 100px;">Yêu thích</p>
                        <p style=" margin-bottom:0 ">12</p>
                    </li>
                    <li class="list-group-item py-2 border-0 d-flex justify-content-between">
                        <span class="iconify ml-2 mr-5" data-icon="bx:bxs-discount" data-width="24" data-height="24"></span>
                        <p style="width: 150px; margin-right: 100px;">Hóa đơn</p>
                        <p style=" margin-bottom:0 ">12</p>
                    </li>
                    <li class="list-group-item py-2 border-0 d-flex">
                        <span class="iconify ml-2 mr-5" data-icon="ant-design:user-outlined" data-width="24"
                            data-height="24" style="font-size: 16px;"></span>
                        <p style="width: 150px; margin-right: 100px;">Tài khoản</p>
                    </li>
                </ul>
            </div>


            <!-- right_service -->
            <div class="right_service ">
                <!-- Title and button -->
                <div class="my-profile">
                    <div class="my-profile-heading d-flex">
                        <span class="iconify " data-icon="fa-solid:user-alt" data-width="50" data-height="50"></span>
                        <h1>Tài khoản</h1>
                    </div>
                    <button type="button" class="btn btn-outline-success">Chỉnh sửa</button>
                </div>

                <!-- Item 1 -->
                <div class="profile-personal">
                    <div class="personal-avt">
                        <img src="https://scontent.fdad3-5.fna.fbcdn.net/v/t39.30808-6/253820876_2683673498593359_7965052091545304256_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=JwMlLGnAoIcAX8jCb8L&tn=_hwzGROOIBNPS-pg&_nc_ht=scontent.fdad3-5.fna&oh=05f3bd2ec18a8981ad2962b3e3d7241e&oe=61B9D25A"
                            alt="">
                    </div>
                    <div class="personal-information">
                        <b class="personal-name">
                            {{ $user->name }}
                        </b>
                        <p class="personal-adress">
                            {{ $user->diachi }}
                        </p>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="profile-personal-name">
                    <div class="personal-name-tilte">

                        <p>Họ tên</p>
                        <p>Ngày sinh</p>
                        <p>Số điện thoại</p>
                    </div>
                    <div class="personal-name-item">

                        <p>{{ $user->name }}</p>

                        <?php
                        
                        $date = new DateTime($user->ngaysinh);
                        $date->format('d-m-Y H:i:s'); ?>
                        <p>{{ $date->format('d-m-Y') }}</p>
                        <p>{{ $user->sodienthoai }}</p>
                    </div>
                </div>
                <!-- Item 3  -->
                <div class="profile-personal-adress">
                    <div class="personal-adress-tilte">
                        <p>Địa chỉ</p>
                        <p>Số tài khoản</p>
                    </div>
                    <div class="personal-adress-item">
                        <p> {{ $user->diachi }}</p>
                        <p>{{ $user->sodienthoai }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Part 12: Footer -->
    <div class="container-fluid footer mt-5">
        <div class="row row_footer">
            <div class="col-lg-4 col-md-4 col-sm-12 image">
                <div class="frame">
                    <img class="logo_footer pt-4"
                        src="https://cdni.iconscout.com/illustration/premium/thumb/healthy-food-2358006-1969921.png"
                        alt="logo-footer">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 contract">
                <div class="frame">
                    <h6 class="text-uppercase fw-bold">
                        Contact Us
                    </h6>
                    <p>
                        <a href="#!" class="text_reset">36 Ong Ich Khiem,Da nang, VietNam</a>
                    </p>
                    <p>
                        <a href="#!" class="text_reset">Email: yourvoucher.help@gmail.com</a>
                    </p>
                    <p>
                        <a href="#!" class="text_reset">Phone: +84 905 589 210 </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 aboutus">
                <div class="frame">
                    <h6 class="text-uppercase fw-bold">
                        About us
                    </h6>
                    <p>
                        <a href="#!" class="text_reset">Our store</a>
                    </p>
                    <p>
                        <a href="#!" class="text_reset">Your voucher</a>
                    </p>
                    <div class="footer_icon">
                        <a href="">
                            <span class="iconify " data-icon="bx:bxl-facebook-circle"></span>
                        </a>
                        <a href="">
                            <span class="iconify" data-icon="ant-design:twitter-circle-filled" data-width="24"
                                data-height="24"></span>
                        </a>
                        <a href="">
                            <span class="iconify" data-icon="akar-icons:instagram-fill" data-width="24"
                                data-height="24"></span>
                        </a>
                        <a href="">
                            <span class="iconify" data-icon="akar-icons:google-contained-fill" data-width="24"
                                data-height="24"></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
