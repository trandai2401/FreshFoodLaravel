@extends('masterlayout.web.header')
@section('user-profile')
<base href="{{asset('')}}">
<link rel="stylesheet" href="{{ asset('style/Editprofile-style/Editprofile-resp.css') }}">

<!-- part 2: Content -->
<div class="container" style="position: relative; top: 55px; margin-bottom: 90px;">
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

            <!-- right -->
            <div class="right_service ">
                <div class="my-profile">
                    <div class="my-profile-heading d-flex">
                        <span class="iconify " data-icon="fa-solid:user-alt" data-width="50" data-height="50"></span>
                        <h1>Tài khoản</h1>
                    </div>
                    <button type="button" class="btn btn-outline-success">Chỉnh sửa</button>
                </div>

                <!--  -->
                <div class="profile-personal">
                    <div class="personal-avt-full">
                        <div class="personal-avt">
                            <img src="../image/Userprofile/avatar.jpg" alt="">
                        </div>
                        <div class="personal-information">
                            <span class="iconify" data-icon="ant-design:camera-filled" data-width="18" data-height="18"></span>
                        </div>
                    </div>
                    <div class="profile-personal-name">
                        <div class="personal-name-tilte">
                            <p>First name</p>
                            <p>Last name</p>
                        </div>
                        <div class="personal-name-item">
                            <input type="text" name="Firstname" id="" class="form-control">
                            <input type="text" name="Lastname" id="" class="form-control">
                        </div>
                    </div>
                    <div class="profile-personal-name">
                        <div class="personal-name-tilte">
                            <p>Email</p>
                            <p>Phone</p>
                        </div>
                        <div class="personal-name-item">
                            <input type="email" name="Email"  id="" class="form-control">
                            <input type="text" name="Phone" id="" class="form-control">
                        </div>
                    </div>
                    <div class="profile-personal-name">
                        <div class="personal-name-tilte">
                            <p>Date of birth</p>
                            <p>Card number</p>
                        </div>
                        <div class="personal-name-item">
                            <input type="date" name="dateofbirth" id="" class="form-control">
                            <input type="text" name="Cardnumber" id="" class="form-control">
                        </div>
                    </div>
                    <div class="profile-personal-name">
                        <div class="personal-name-tilte">
                            <p>Adress</p>
                        </div>
                        <div class="personal-name-item">
                            <input type="text" name="Adress" id="" class="form-control">
                            <button type="button" class="btn text   -white" style="margin-right: 155px; background-color: #216e38;" >Save changes</button>
                        </div>
                    </div>
                </div>
                <!--  -->
                
            </div>
        </div>
    </div>

    @endsection