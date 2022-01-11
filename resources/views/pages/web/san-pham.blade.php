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
                    <label id="sosao_TB" for="">4.5</label>
                    <span class="iconify" data-icon="bi:star-fill"
                        style="color: #ffb416; font-size: 20px; position: relative; top: -3px;"></span>
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


            <!-- Chi tiết sản phẩm -->
            <div class="content_right">
                <p class="tenSP my-0"><b> {{ $nongsan->tenNongSan }}</b></p>
                <p class="giaSP my-0">{{ number_format($nongsan->gia, 0, ',', '.') }} đ</p>
                <p class="soluongSP my-0"> Hiện có:<b> <label for="">{{ $nongsan->soluong }}</label> (kg) </b></p>
                <p class="diaDiemSP my-0"> Nơi sản xuất: <b><label for=""> {{ $nongsan->noisanxuat }}</label> <b></p>

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

        <!-- Part 2.4: Đánh giá bình luận -->
        <div class="container SPlienquan card_comment_user">
            @if ($idItemHoaDon != 0)
                <div id="remove_div">
                    <!-- Tilte  -->
                    <div class="d-flex mt-4 mb-2">
                        <span class="iconify" data-icon="mdi:flower-outline"
                            style="color: #177a4c; font-size: 40px;"></span>
                        <h4 class="mt-2 mx-3">Bình luận - Đánh giá</h4>
                    </div>

                    <!-- Phần bình luận -->
                    <div class="container comment_content">
                        <div class="d-flex">
                            <b class="mx-5">Tài khoản:</b> <label id="tenUser_BL" for="" style="color: #216e38;"> {{$user->name}}</label>
                            <br>

                        </div>
                        <!-- Đánh giá -->
                        <!-- sao đánh giá -->
                        <div class="star-widget d-flex" style="margin-left: 50px; margin-bottom: 10px;">
                            <div class="d-flex" style="flex-flow: row-reverse; justify-content: flex-start">
                                <input class="mx-1 mt-2 rate" type="radio" name="rate" id="rate-1" value="5">
                                <label for="rate-1" class="fas fa-star fa-2x mr-2 mt-1"></label>
                                <input class="mx-1 mt-2 rate" type="radio" name="rate" id="rate-2" value="4">
                                <label for="rate-2" class="fas fa-star  fa-2x mr-2 mt-1"></label>
                                <input class="mx-1 mt-2 rate" type="radio" name="rate" id="rate-3" value="3">
                                <label for="rate-3" class="fas fa-star  fa-2x mr-2 mt-1"></label>
                                <input class="mx-1 mt-2 rate" type="radio" name="rate" id="rate-4" value="2">
                                <label for="rate-4" class="fas fa-star  fa-2x mr-2 mt-1"></label>
                                <input class="mx-1 mt-2 rate" type="radio" name="rate" id="rate-5" value="1">
                                <label for="rate-5" class="fas fa-star  fa-2x mr-2 mt-1"></label>
                            </div>
                        </div>
                        <div class="d-flex noidung mx-5">
                            <div class="form-group" style="width: 70%">
                                <label for="textarea_content_text" style="font-size: 12px; font-weight: 800;">Cảm ơn bạn đã
                                    sử
                                    dụng sản phẩm của chúng tôi</label>
                                <textarea class="form-control" id="textarea_content_text" rows="2"></textarea>
                            </div>

                            <div class="btn_themBL mx-5" style="width: 20%; position: relative; top: 50px;">
                                <button onclick="addComment();" type="button" class="btn btn-outline"
                                    style="background: #216e38; color: aliceblue; font-size: 13px;">Thêm bình luận</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <!-- List bình luận cũ -->
            <div class="title_BL mx-5">
                <label for="" style="font-size: 12px; font-weight: 800;">Danh sách người bình luận</label>
            </div>
            <div class="nguoi_binhLuan mx-5">
                <div class="mx-3 my-2">
                    <div class="d-flex user_comment">
                        <span class="iconify" data-icon="carbon:user-avatar-filled-alt"
                            style="color: #ffbf00; font-size: 30px;"></span>
                        <strong><label class="mx-3" style="position: relative; top: 5px;"
                                for="">Khách hàng 1</label></strong>
                        <span for="" style="font-size: 20px;" id="sao_rate">4</span>
                        <span class="iconify mx-1" data-icon="bi:star-fill"
                            style="color: #ffb416; font-size: 17px; position: relative; top: 5px;"></span>
                    </div>

                    <div class="noidungBL">
                        <p id="noidung_BL_text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Soluta voluptate, aspernatur voluptatibus, commodi alias impedit obcaecati molestiae</p>
                    </div>
                </div>

                @foreach ($nongsan->binhLuan as $item)
                    <div class="mx-3 my-2">
                        <div class="d-flex user_comment">
                            <span class="iconify" data-icon="carbon:user-avatar-filled-alt"
                                style="color: #ffbf00; font-size: 30px;"></span>
                            <strong><label class="mx-3" style="position: relative; top: 5px;"
                                    for="">NyDienKhum</label></strong>
                            <span for="" style="font-size: 20px;" id="sao_rate">4</span>
                            <span class="iconify mx-1" data-icon="bi:star-fill"
                                style="color: #ffb416; font-size: 17px; position: relative; top: 5px;"></span>
                        </div>

                        <div class="noidungBL">
                            <p id="noidung_BL_text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Soluta voluptate, aspernatur voluptatibus, commodi alias impedit obcaecati molestiae</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Phân trang -->

            <!-- Pagination // phân trang button -->

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
        //   rating star
        var saoRating = document.getElementsByName("rate");
        var sosao_DG = 0;
        var noidung_DG = 0;
        var trungbinh_sao = document.getElementById("sosao_TB");
        //
        function addComment() {
            var soSaoInput = 0;
            for (let item of saoRating) {
                if (item.checked == true) {
                    var sao = item.value;

                    soSaoInput = sao - 0;
                    sosao_DG = soSaoInput;
                    console.log(item.value);
                }

            }
            var text_cmt = document.getElementById("textarea_content_text");
            var div = document.getElementsByClassName('nguoi_binhLuan mx-5');

            var text_content_cmt = text_cmt.value;
            noidung_DG = text_cmt.value;
            var div02 = document.createElement('div');
            div02.className = "mx-3 my-2";
            div02.innerHTML =
                '<div class="d-flex user_comment"> <span class="iconify" data-icon="carbon:user-avatar-filled-alt" style="color: #ffbf00; font-size: 30px;"></span> <strong><label class="mx-3" style="position: relative; top: 5px;" for="">NyDienKhum</label></strong><span id="sao_rate" for="" style="font-size: 20px;">' +
                soSaoInput +
                '</span> <span class="iconify mx-1" data-icon="bi:star-fill" style="color: #ffb416; font-size: 17px; position: relative; top: 5px;"></span>  </div> <div class="noidungBL">   <p id="noidung_BL_text" style="font-weight: 100;">' +
                text_content_cmt + '</p> </div>';
            div[0].insertBefore(div02, div[0].firstChild);

            var rm = document.getElementById("remove_div");
            rm.remove();

            danhgia_BL();
        }




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
            }).done(function(result) {
                console.log(result);

                var res = JSON.parse(result);
                thongBao("alert-success", "Đã thêm " + res.soLuongThayDoi + " nông sản này vào giỏ hàng");
            }).fail(function(result) {
                console.log(result);
            })
        })


        // đánh giá - comment
        function danhgia_BL(){
            const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('idItemHoaDon');
            var form = new FormData();
            form.append("_token",'{{ csrf_token() }}');
            form.append("soSao", sosao_DG);
            console.log(sosao_DG);
            form.append("noiDung", noidung_DG);
            console.log(noidung_DG);
            form.append("idItemHoaDon", myParam);

            $.ajax({
                method: 'post',
                url: "http://localhost/FreshFoodLaravel/public/user/danhgia",
                context: document.body,
                data : form,
                contentType: false,
                processData: false
            }).done(function(result) {
                try {
                    console.log(result);
                    trungbinh_sao.innerHTML = result.nongSan.sosao;
                    
                } catch (error) {
                    
                }
            }).fail(function(result) {
                thongBao("alert-danger", "Đã có lỗi xãy ra");
            })
        }
    </script>
    <script type=" text/javascript " src=" ../js/home.js "></script>
    <script src=" https://use.fontawesome.com/3af9727d51.js "></script>
    <script src=" https://code.iconify.design/2/2.0.3/iconify.min.js "></script>
    <script src=" https://code.iconify.design/2/2.0.4/iconify.min.js "></script>

@endsection
