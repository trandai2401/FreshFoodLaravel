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
                        <li class="list-group-item py-2 text-center" style="background-color:#ffe923; color: #216e38;">
                            </span>Danh mục hiện có</li>
                        <a href="#">
                            <li class="list-group-item py-2"><span class="iconify ml-2 mr-5"
                                    data-icon="fluent:food-apple-20-filled" style="font-size: 25px;"></span>Trái cây
                            </li>
                        </a>
                        <a href="#">
                            <li class="list-group-item py-2"><span class="iconify ml-2 mr-5" data-icon="dashicons:carrot"
                                    style="font-size: 25px;"></span>Rau củ</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item py-2"><span class="iconify ml-2 mr-5" data-icon="whh:coffeebean"
                                    style="font-size: 23px;"></span>Thực phẩm khô</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item py-2"><span class="iconify ml-2 mr-5" data-icon="ph:fish-fill"
                                    style="font-size: 27px;"></span>Hải sản</li>
                        </a>
                        <a href="#">
                            <li class="list-group-item py-2"><span class="iconify ml-2 mr-5"
                                    data-icon="emojione-monotone:meat-on-bone" style="font-size: 25px;"></span>Thịt tươi
                            </li>
                        </a>
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
                <h4 class="pt-3 pl-4"><b>Khuyến mãi trong tuần</b></h4>
            </div>
            <div class="bg_traicay_boder">
                <img src="image/landing/card/bưởi.png" alt="" class="">
            </div>


            <!-- hàng card cho sản phẩm khuyến mãi -->
            <div class="container-fluid row khuyenmai bg-white">
                <div class="col-3 card_khuyenmai">
                    <div class="card">
                        <div class="text_sale_off"><b> -21% </b></div>
                        <img class="card-img-top" src="image/landing/card/cà rốt.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2"></lable>
                                </input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt Cà rốt Đà Lạt Cà rốt Đà Lạ</a>
                            </p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>
                                <span style="color: rgb(165, 165, 165);"><del>65.000đ</del></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 card_khuyenmai">
                    <div class="card">
                        <div class="text_sale_off"><b> -21% </b></div>
                        <img class="card-img-top" src="image/landing/card/cà rốt.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2"></lable>
                                </input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt Cà rốt Đà Lạt Cà rốt Đà Lạ</a>
                            </p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>
                                <span style="color: rgb(165, 165, 165);"><del>65.000đ</del></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 card_khuyenmai">
                    <div class="card">
                        <div class="text_sale_off"><b> -21% </b></div>
                        <img class="card-img-top" src="image/landing/card/cà rốt.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt Cà rốt Đà Lạt Cà rốt Đà
                                    Lạ</a></p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>
                                <span style="color: rgb(165, 165, 165);"><del>65.000đ</del></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 card_khuyenmai">
                    <div class="card">
                        <div class="text_sale_off"><b> -21% </b></div>
                        <img class="card-img-top" src="image/landing/card/cà rốt.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt Cà rốt Đà Lạt Cà rốt Đà
                                    Lạ</a></p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>
                                <span style="color: rgb(165, 165, 165);"><del>65.000đ</del></span>
                            </div>
                        </div>
                    </div>
                </div>

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

    <!-- Part 5: Sản phẩm theo danh mục trai cay-->
    <div class="container-fluid danhmuc_traicay">
        <div class="danhmuc_traicay d-flex justify-content-around">
            <div class="img_danhmuc_traicay_content">
                <img src="image/landing/img-sanphamtheodanhmuc/Trái cây.png" alt="">
                <div class="text_on_img mx-4 mb-5">
                    <ul> <a href="#"><b> Danh mục trái cây</b></a></ul>
                    <li class="pb-2"> <a href="#">Trái cây nhiệt đới</a> </li>
                    <li class="pb-2"> <a href="#">Dành cho mẹ bầu</a> </li>
                    <li class="pb-2"> <a href="#">Tăng đề kháng cho trẻ em</a> </li>
                    <li class="pb-2"> <a href="#"> Cải thiện da cho phụ nữ</a> </li>

                    <a href="#" class="btn_danhmuc_traicay">
                        <p>Mua sắm ngay bây giờ</p>
                    </a>
                </div>
            </div>

            <!-- Sản phẩm card -->
            <div class="row sanpham_traicay">
                <div class="col-3 card_sanpham_traicay">
                    <div class="card">
                        <img class="card-img-top" src="image/landing/card/dứa.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
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
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
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
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
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
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- Part 6: Sản phẩm theo danh mục Rau củ  -->
    <div class="container-fluid danhmuc_raucu">
        <div class="danhmuc_raucu d-flex justify-content-around">

            <!-- sản phẩm card -->
            <div class="row sanpham_raucu">
                <div class="col-3 card_sanpham_raucu">
                    <div class="card">
                        <img class="card-img-top" src="image/landing/card/cần tây.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 card_sanpham_raucu">
                    <div class="card">
                        <img class="card-img-top" src="image/landing/card/củ cả trắng.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 card_sanpham_raucu">
                    <div class="card">
                        <img class="card-img-top" src="image/landing/card/củ dền đỏ.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 card_sanpham_raucu">
                    <div class="card">
                        <img class="card-img-top" src="image/landing/card/cà chua bi.png" alt="Card image cap">
                        <div class="middle d-flex">
                            <button class="middle_cart mx-3"><span class="iconify" data-icon="fa-solid:cart-plus"
                                    style="color: #216e38;  font-size: 35px"></span></button>
                            <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                                </lable></input>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text name_product"> <a href="#"> Cà rốt Đà Lạt</a></p>
                            <div class="text_price">
                                <span class="mx-4"><b>50.000đ</b></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="img_danhmuc_raucu_content">
                <img src="image/landing/img-sanphamtheodanhmuc/Củ quả.png" alt="">
                <div class="text_on_img mx-4 mb-5">
                    <ul> <a href="#"><b> Danh mục rau củ</b></a></ul>
                    <li class="pb-2"> <a href="#">Rau củ nhiệt đới</a> </li>
                    <li class="pb-2"> <a href="#">Dành cho mẹ bầu</a> </li>
                    <li class="pb-2"> <a href="#">Tăng đề kháng cho trẻ em</a> </li>
                    <li class="pb-2"> <a href="#"> Cải thiện da cho phụ nữ</a> </li>

                    <a href="#" class="btn_danhmuc_raucu">
                        <p>Mua sắm ngay bây giờ</p>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <!-- Part  10: Hình ảnh gần footer giới thiệu cho trang tin tức -->
    <div class="container-fluid img_banner_beforeFooter">
        <img src="image/landing/img-gioithieu/img-banner-beforeFooter.png" alt="">
    </div>


    <!-- Part 11: Hình ảnh giới thiệu cho trang tin tức -->
    <div class="container-fluid tintuc bg-white">
        <div class="container title_tintuc d-flex mb-1 bg-white">
            <span class="iconify" data-icon="bx:bxs-book-heart" style="color: #216e38; font-size: 45px;"></span>
            <h4 class="pt-3 pl-4"><b>Bảng tin bạn đọc</b></h4>
        </div>

        <!-- Hình ảnh giới thiệu cho 4 card tin tức -->
        <div class="row tintuc">
            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng
                                lắm hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> |
                            <span>Ngày: 25/10/2021</span>
                        </p>
                    </div>
                    <img src="image/landing/card-tintuc/tintuc_dau.jpg" alt="">

                </div>
            </div>

            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng
                                lắm hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> |
                            <span>Ngày: 25/10/2021</span>
                        </p>
                    </div>
                    <img src="image/landing/card-tintuc/tintuc_trongcay.jpg" alt="">

                </div>
            </div>

            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng
                                lắm hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> |
                            <span>Ngày: 25/10/2021</span>
                        </p>
                    </div>
                    <img src="image/landing/card-tintuc/tintuc_thit.jpg" alt="">

                </div>
            </div>

            <div class="col-3">
                <div class="card_tintuc">
                    <div class="card-text">
                        <a href="#"> <b>Cách chế biến rau tươi tại nhà không bị gì gì đó, mà nó dài lắm, dài kinh khủng
                                lắm hahahaaa</b></a>
                        <p class="text-success" style="font-size: 13px;"> <span>Tác giả: Thu Hồng</span> |
                            <span>Ngày: 25/10/2021</span>
                        </p>
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



    <script type="text/javascript" src="bootstrap/bootstrap-4.6.0-dist/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="js/landing-page.js"></script>
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-4.6.0-dist/js/bootstrap.js"></script>




@endsection
