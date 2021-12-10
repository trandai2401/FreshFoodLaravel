@extends('masterlayout.web.header')

@section('sanpham')
    <link rel="stylesheet" href="../style/profile-voucher/profile-voucher.css">
    <!-- Part 2: Main -->
    <div class="main_body" style="width: 100%; position: relative; top: 10px;">

        <!-- Part 2.1: Ảnh banner chứa lable -->
        <div class="banner">
            <div class="img_banner_bg w-100">
                <img src="{{ asset('image/chitietSP/banner-ChiTietSP.png') }}" alt="">
            </div>
            <div class="parth_content">
                <h4><b>{{ $nongsan->tenNongSan }}</b></h4>
                <span> <a href="#"> Trang chủ</a> / <a href="#">{{ $nongsan->danhmuc->tenDanhMuc }}</a>
                    /<b>{{ $nongsan->tenNongSan }}</b> </span>
            </div>
        </div>

        <!-- Part 2.2: sản phẩm -->
        <div class="container profile-product  d-flex justify-content-around">
            <!-- ảnh sản phẩm -->
            <div class="slide-left">

                <div class="heart_btn bg-transparent border-0">
                    <button class="bg-transparent border-0">
                        <span class="iconify" data-icon="bi:heart-fill"
                            style="color: #f2b500; font-size: 35px;"></span>
                    </button>
                </div>

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <?php $active = 'active'; ?>
                        @foreach ($nongsan->hinhanh as $hinhanh)
                            <div class="carousel-item {{ $active }} border-1">
                                <img src="{{ asset($hinhanh->src) }}" d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block text-left text-light">
                                </div>
                            </div>
                            <?php $active = ''; ?>
                        @endforeach



                        {{-- <div class="carousel-item border-1">
                            <img src="../image/landing/card/bơ.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block text-left text-light">

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="../image/landing/card/chuối vàng.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block text-left text-light">

                            </div>
                        </div> --}}
                    </div>
                    <hr>

                    <ol class="carousel-indicators" style="margin-bottom: -60px; height: 60px;">
                        <?php $active = 'active'; ?>
                        @foreach ($nongsan->hinhanh as $hinhanh)
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ $active }}">
                                <img src="{{ asset($hinhanh->src) }}" class="d-block w-100" alt="...">
                            </li>
                            <?php $active = ''; ?>
                        @endforeach

                        {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1">
                            <img src="../image/landing/card/chanh vàng.png" class="d-block w-100" alt="...">
                        </li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2">
                            <img src="../image/landing/card/cà chua bi.png" class="d-block w-100" alt="...">
                        </li> --}}
                    </ol>

                    <div style="margin-top: 80px;">
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="iconify" aria-hidden="true" data-icon="eva:arrow-ios-back-fill"
                                style="color: #ffbf00; font-size: 40px;"></span>
                            <!-- <span class="carousel-control-prev-icon" ></span> -->
                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="iconify" aria-hidden="true" data-icon="ic:round-navigate-next"
                                style="color: #ffbf00;font-size: 40px;"></span>

                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>

            </div>


            <!-- CHi tiết sản phẩm -->
            <div class="content_right">
                <p class="tenSP"><b> {{ $nongsan->tenNongSan }}</b></p>
                <p class="giaSP">{{ number_format($nongsan->gia, 0, ',', '.') }} đ</p>

                <?= $nongsan->noidung ?>

                <p class="title_TrongLuong"> <b>Trọng lượng (kg)</b></p>
                <div class="trongLuong">
                    <button class="btnDau btn_dautru rounded-circle border-0 text-dark px-2">-</button>
                    <input class="input_trongLuong pl-1" type="number" value="1" id="input_trongLuong">
                    <button class="btnDau btn_daucong rounded-circle border-0 text-dark px-2">+</button>
                </div>
                <div class="btn_themGioHang mt-4">
                    <button id="add-nongsan-giohang" value="{{ $nongsan->id }}" class="py-2 px-3" type="">Thêm vào
                        giỏ hàng</button>
                </div>

            </div>

        </div>

        <!-- Part 2.3: Sản phẩm liên quan -->
        <div class="container SPlienquan card_product_right">
            <!-- Tilte  -->
            <div class="d-flex mt-4 mb-2">
                <span class="iconify" data-icon="mdi:shield-star" style="color: #ffba57; font-size: 40px;"></span>
                <h4 class="mt-2 mx-3">Sản phẩm liên quan</h4>
            </div>

            <div class="row product">
                <div class="col-3 card_product">
                    <div class="card">
                        <img class="card-img-top" src="../image/landing/card/bơ.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2"></lable>
                                </input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt Cà rốt Đà</a></p>
                            <div class="text_price"><span class="mx-4"><b>50.000đ</b></span> </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 card_product">
                    <div class="card">
                        <img class="card-img-top" src="../image/landing/card/bưởi.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2"></lable>
                                </input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price"><span class="mx-4"><b>50.000đ</b></span> </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 card_product">
                    <div class="card">
                        <img class="card-img-top" src="../image/landing/card/cam.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2"></lable>
                                </input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price"><span class="mx-4"><b>50.000đ</b></span> </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 card_product">
                    <div class="card">
                        <img class="card-img-top" src="../image/landing/card/cam.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2"></lable>
                                </input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price"><span class="mx-4"><b>50.000đ</b></span> </div>
                        </div>
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
        var btnAdd = document.getElementById('add-nongsan-giohang');
        btnAdd.addEventListener('click', function() {
            var soluong = document.getElementById('input_trongLuong');
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('idNongSan', this.value);
            form.append('soLuong', soluong.value);
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
        })
    </script>
    <script type=" text/javascript " src=" ../js/home.js "></script>
    <script src=" https://use.fontawesome.com/3af9727d51.js "></script>
    <script src=" https://code.iconify.design/2/2.0.3/iconify.min.js "></script>
    <script src=" https://code.iconify.design/2/2.0.4/iconify.min.js "></script>

@endsection
