@extends('masterlayout.web.header')
@section('home')
    <!-- Start main -->

    <link rel="stylesheet" href="style/landing-style/landing-page-rep.css">
    <link rel="stylesheet" href="style/landing-style/landing-page.css">

    <!-- Start main -->
    <div class="main" style="position: relative; top: 52px;">
        <!-- Part 2: danh mục  + slide -->
        <div class="container-fluid category-slide">
            <div class="row">
                <div class="col-lg-3 col-xl-3 d-sm-none d-xs-none d-none d-md-none d-lg-block px-0">
                    <ul class="list-group border-0 ml-1">


                        @foreach ($danhmucs as $danhMuc)
                            <a href="{{ route('danhmuc', ['idDanhMuc' => $danhMuc->id]) }}">
                                <li class="list-group-item py-2">
                                    <?= $danhMuc->src_icon ?></span>{{ $danhMuc->tenDanhMuc }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="image/landing/slide/Slide2.png" class="d-block w-100" alt="..."
                                    style="height: 262px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block text-left text-light">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="image/landing/slide/Slide1.png" class="d-block w-100" alt="..."
                                    style="height:  262px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block text-left text-light">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="image/landing/slide/Slide3.png" class="d-block w-100" alt="..."
                                    style="height: 262px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block text-left text-light">

                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span aria-hidden="true"><span class="iconify"
                                    data-icon="akar-icons:circle-chevron-left-fill"
                                    style="color: #216e38;font-size: 50px;"></span></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">

                            <span aria-hidden="true"><span class="iconify"
                                    data-icon="akar-icons:circle-chevron-right-fill"
                                    style="color: #216e38; font-size: 50px;"></span></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Part 3: card Khuyến mãi trong tuần -->
        <div class="container-fluid khuyenmai bg-white">
            <div class="container title_khuyenmai d-flex mb-1 bg-white">
                <span class="iconify" data-icon="whh:salealt" style="color: #216e38; font-size: 40px;"></span>
                <h4 class="pt-3 pl-4"><b>Sản phẩm mới nhất</b></h4>
            </div>
            <div class="bg_traicay_boder">
                <img src="image/landing/card/bưởi.png" alt="" class="">
            </div>


            <!-- hàng card cho sản phẩm khuyến mãi -->
            <div class="container-fluid row khuyenmai bg-white">
                @foreach ($nongSanNoiBat as $item)
                    <div class="col-3 card_khuyenmai">
                        <div class="card">
                            <div class="text_sale_off"><b> Mới </b></div>
                            <img class="card-img-top" src="{{ asset($item->hinhanh[0]->src) }}" alt="Card image cap">
                            <div class="middle d-flex">
                                <button onclick="addNongSan({{ $item->id }})" class="middle_cart mx-3"><span
                                        class="iconify" data-icon="fa-solid:cart-plus"
                                        style="color: #216e38;  font-size: 35px"></span></button>
                                <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2"></lable>
                                    </input>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text name_product"> <a
                                        href="{{ route('nongsan', ['idNongSan' => $item->id]) }}">{{ $item->tenNongSan }}</a>
                                </p>
                                <div class="">
                                    <span class="mx-4"><b>{{ number_format($item->gia, 0, '', ',') }}
                                            đ</b></span>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>

        <!-- Part 4: Hai hình ảnh banner giới thiệu  -->
        <div class="container-fluid img_gioithieu_SP">
            <div class="row d-flex justify-content-between">
                <img class="col" src="image/landing/img-gioithieu/gioithieu_01.png" alt="">
                <img class="col" src="image/landing/img-gioithieu/gioithieu_02.png" alt="">
            </div>
        </div>
    </div>


    <div class="container title-sanphamDM d-flex">
        <span class="iconify" data-icon="mdi:fruit-citrus" style="color: #216e38; font-size: 60px;"></span>
        <h4 class="pt-3 pl-4"><b>Sản phẩm theo danh mục</b></h4>
    </div>


    <!-- Part 5: Sản phẩm theo danh mục trai cay-->
    @foreach ($danhmucs as $item)
        <!-- Part 5: Sản phẩm theo danh mục trai cay-->
        <div class="container-fluid danhmuc_traicay">
            <div class="danhmuc_traicay d-flex justify-content-around">
                <div class="img_danhmuc_traicay_content">
                    <img src="{{ asset($item->src) }}" alt="">
                    <div class="text_on_img mx-4 mb-5">
                        <ul> <a href="{{ route('danhmuc', ['idDanhMuc' => $item->id]) }}"><b> Danh mục
                                    {{ $item->tenDanhMuc }}</b></a></ul>
                        <li class="pb-2"> <a href="#">Trái cây nhiệt đới</a> </li>
                        <li class="pb-2"> <a href="#">Dành cho mẹ bầu</a> </li>
                        <li class="pb-2"> <a href="#">Tăng đề kháng cho trẻ em</a> </li>
                        <li class="pb-2"> <a href="#"> Cải thiện da cho phụ nữ</a> </li>

                        <a href="{{ route('danhmuc', ['idDanhMuc' => $item->id]) }}" class="btn_danhmuc_traicay">
                            <p>Mua sắm ngay bây giờ</p>
                        </a>
                    </div>
                </div>

                <!-- Sản phẩm card -->
                <div class="row sanpham_traicay">

                    @foreach ($item->getNongSanLimit($item->id) as $nongsan)
                        <div class="col-3 card_sanpham_traicay">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($nongsan->hinhanh[0]->src) }}"
                                    alt="Card image cap">
                                <div class="middle d-flex">
                                    <button onclick="addNongSan({{ $nongsan->id }})" class="middle_cart mx-3"><span
                                            class="iconify" data-icon="fa-solid:cart-plus"
                                            style="color: #216e38;  font-size: 35px"></span></button>
                                    <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                        </lable>
                                        </input>
                                </div>
                                <div class="card-body text-center">
                                    <p class="card-text name_product"> <a
                                            href="{{ route('nongsan', ['idNongSan' => $nongsan->id]) }}">
                                            {{ $nongsan->tenNongSan }}</a></p>
                                    <div class="text_price">
                                        <span class="mx-4"><b>{{ number_format($nongsan->gia, 0, '', ',') }}
                                                đ</b></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-3 card_sanpham_traicay">
                        <div class="card">
                            <img class="card-img-top" src="image/landing/card/dứa.png" alt="Card image cap">
                            <div class="middle d-flex">
                                <button class="middle_cart mx-3"><span class="iconify"
                                        data-icon="fa-solid:cart-plus"
                                        style="color: #216e38;  font-size: 35px"></span></button>
                                <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                    </lable>
                                    </input>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                                <div class="text_price">
                                    <span class="mx-4"><b>50.000đ</b></span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 card_sanpham_traicay">
                        <div class="card">
                            <img class="card-img-top" src="image/landing/card/dâu tây.png" alt="Card image cap">
                            <div class="middle d-flex">
                                <button class="middle_cart mx-3"><span class="iconify"
                                        data-icon="fa-solid:cart-plus"
                                        style="color: #216e38;  font-size: 35px"></span></button>
                                <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                    </lable>
                                    </input>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                                <div class="text_price">
                                    <span class="mx-4"><b>50.000đ</b></span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 card_sanpham_traicay">
                        <div class="card">
                            <img class="card-img-top" src="image/landing/card/chanh vàng.png" alt="Card image cap">
                            <div class="middle d-flex">
                                <button class="middle_cart mx-3"><span class="iconify"
                                        data-icon="fa-solid:cart-plus"
                                        style="color: #216e38;  font-size: 35px"></span></button>
                                <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                    </lable>
                                    </input>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                                <div class="text_price">
                                    <span class="mx-4"><b>50.000đ</b></span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 card_sanpham_traicay">
                        <div class="card">
                            <img class="card-img-top" src="image/landing/card/chanh xanh.png" alt="Card image cap">
                            <div class="middle d-flex">
                                <button class="middle_cart mx-3"><span class="iconify"
                                        data-icon="fa-solid:cart-plus"
                                        style="color: #216e38;  font-size: 35px"></span></button>
                                <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                    </lable>
                                    </input>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                                <div class="text_price">
                                    <span class="mx-4"><b>50.000đ</b></span>

                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>
    @endforeach








    <!-- Part  10: Hình ảnh gần footer giới thiệu cho trang tin tức -->
    <div class="container-fluid img_banner_beforeFooter">
        <img src="image/landing/img-gioithieu/img-banner-beforeFooter.png" alt="">
    </div>


    <!-- Part 11: Hình ảnh giới thiệu cho trang tin tức -->
    <div class="container-fluid tintuc bg-white">

        <div class="container title-tintuc d-flex pb-4">
            <span class="iconify" data-icon="mdi:fruit-citrus" style="color: #216e38; font-size: 60px;"></span>
            <h4 class="pt-3 pl-4"><b>Tin tức bạn đọc</b></h4>
        </div>

        <!-- <div class="container title_tintuc d-flex mb-1 bg-white">
                                                                                                                                                                                                                          <span class="iconify" data-icon="bx:bxs-book-heart" style="color: #216e38; font-size: 45px;"></span>
                                                                                                                                                                                                                          <h4 class="py-4 pl-4"><b>Bảng tin bạn đọc</b></h4>
                                                                                                                                                                                                                      </div> -->

        <!-- Hình ảnh giới thiệu cho 4 card tin tức -->
        <div class="row tintuc">
            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng lắm
                                hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> | <span>Ngày:
                                25/10/2021</span></p>
                    </div>
                    <img src="image/landing/card-tintuc/tintuc_dau.jpg" alt="">

                </div>
            </div>

            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng lắm
                                hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> | <span>Ngày:
                                25/10/2021</span></p>
                    </div>
                    <img src="image/landing/card-tintuc/tintuc_trongcay.jpg" alt="">

                </div>
            </div>

            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng lắm
                                hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> | <span>Ngày:
                                25/10/2021</span></p>
                    </div>
                    <img src="image/landing/card-tintuc/tintuc_thit.jpg" alt="">

                </div>
            </div>

            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng lắm
                                hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> | <span>Ngày:
                                25/10/2021</span></p>
                    </div>
                    <img src="image/landing/card-tintuc/tintuc_ca.jpg" alt="">

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

    </div>
    <!-- End main -->

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

    <script type="text/javascript" src="bootstrap/bootstrap-4.6.0-dist/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="js/landing-page.js"></script>
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-4.6.0-dist/js/bootstrap.js"></script>




@endsection
