@extends('masterlayout.web.header')
@section('user-profile')
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="{{ asset('style/Editprofile-style/Editprofile-resp.css') }}">
    <link rel="stylesheet" href="{{ asset('style/hoaDonMuaHang.css') }}">

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
                        <?php $user = Auth::user(); ?>
                        <p style=" margin-bottom:0 ">{{ count($user->hoadon) }}</p>
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

                        <h5 style="color: #216e38;"> <b>Danh sách hóa đơn</b> </h5>
                    </div>

                </div>
                <div class="danhsach_hoadon row">
                    @foreach ($hoaDons as $item)
                        <div class="col-12 card_hoadon" onclick="Redirect('{{ $item->id }}');">
                            <img src="https://cdn-icons-png.flaticon.com/128/859/859322.png" alt="">
                            <div class="card_hoadon_content">
                                <a href="#"> <strong>Hóa đơn số</strong> <label id="maHoaDon" for="">
                                        {{ $item->id }}</label> </a>
                                <p class="my-0">Ngày thanh toán: <label for="">{{ $item->created_at }}</label>
                                </p>
                                <p class="my-0">Trạng thái đơn hàng: <label
                                        for="">{{ $item->trangthai->tentrangthai }}</label></p>
                            </div>
                        </div>
                    @endforeach
                    <!-- Pagination // phân trang button -->
                    <div class="container pagination  d-flex">
                        <nav aria-label="Page navigation example" style="margin: auto;">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <?php $soLuongTrang = ceil(
                                    count(
                                        App\Models\hoadon::select('*')
                                            ->where('id_user', $user->id)
                                            ->get(),
                                    ) / 6,
                                ); ?>
                                <a href=""></a>
                                @for ($i = 1; $i <= $soLuongTrang; $i++)

                                    <li class="page-item "><a id="page-item-{{ $i }}"
                                            href="http://localhost/FreshFoodLaravel/public/user/danhsachHoadon?trangDuocChon={{ $i }}"
                                            class="page-link">{{ $i }}</a>
                                    </li>


                                @endfor
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>

        </div>


    </div>

    <!-- Footer -->
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

    <script>
        function Redirect(idHoaDon) {
            window.location = "http://localhost/FreshFoodLaravel/public/user/chiTietHD/" + idHoaDon;
        }

        //http://localhost/FreshFoodLaravel/public/user/danhsachHoadon
    </script>


@endsection
