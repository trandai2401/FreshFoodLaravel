@extends('masterlayout.web.header')

@section('sanpham-danhmuc')
    <link rel="stylesheet" href="{{ asset('style/sanpham-danhmuc-style/sanpham_danhmuc.css') }}">

    <link rel="stylesheet" href="{{ asset('style/landing-style/landing-page-rep.css') }}">
    <link rel="stylesheet" href="{{ asset('style/landing-style/landing-page.css') }}">

    <div class="main_body">
        <!-- Part 2: Ảnh banner chứa lable -->
        <div class="banner">
            <div class="img_banner_bg w-100">
                <img src="{{ asset('image/sanpham_danhmuc/banner/img-banner-spDM.png') }}" alt="">
            </div>
            <div class="parth_content">
                <h4><b> {{ $tenDanhMuc[0]->tenDanhMuc }}</b></h4>
                <span> <a href="{{ route('home') }}"> Trang chủ</a> / <b> {{ $tenDanhMuc[0]->tenDanhMuc }}</b></span>
            </div>
        </div>

        <!-- Part 3: Thanh chưa radio và tìm kím -->
        <div class="container search_filter d-flex">
            <div class="title">
                <strong>Số sản phẩm tìm kiếm liên quan</strong>
                <p class="m-0">50 sản phẩm</p>
            </div>

            <div class="combobox_filter d-flex">
                <span class="mr-3">Sắp xếp:</span>
                <div class="form-group">
                    <select onchange="loc({{ $tenDanhMuc[0]->id }})" class="form-control" id="exampleFormControlSelect1"
                        style="width: 200px">
                        <option value="tenNongSan asc">A - Z</option>
                        <option value="tenNongSan desc">Z - A</option>
                        <option value="gia desc">Giá giảm dần</option>
                        <option value="gia asc">Giá tăng dần</option>
                        <option>Giá thấp đến cao</option>
                        <option>Giá cao đến thấp</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" id="searchByKeyWord">
                <div class="input-group-append">
                    <button onClick="timKiem(1)" class="btn" type="submit" style="background-color: #216e38;">
                        <span class="iconify text-white" data-icon="bx:bx-search-alt-2"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Part 4:  -->
        <div class="container main-body d-flex px-0 mt-1">

            <!-- Part 2.2.1: Service-left -->
            <div class="service_left mr-3">

                <!-- item-2: Price range -->
                <div class="price_range">
                    <p class="text-success ml-4 mt-3"><strong>Lọc giá sản phẩm</strong></p>
                    <div class="form-group d-flex mx-3">
                        <input value="" type="number" class="form-control py-3" id="giaBatDau" placeholder="0"
                            style="width: 100px; font-size: 10px;">
                        <p class="mt-2 mx-1">&ndash;</p>
                        <input value="" type="number" class="form-control py-3" id="giaKetThuc" placeholder="1000000"
                            style="width: 100px; font-size: 10px;">
                    </div>
                </div>

                <!-- item-3: Salesroom -->
                <div class="salesroom">
                    <p class="text-success ml-4 my-3"><strong>Địa điểm</strong></p>
                    <label class="checkbox mx-4 mb-3">
                        <input class=" checkbox_address_item mr-3 text-danger" type="checkbox" id="checkbox_address_HaNoi"
                            value="ha noi" name="scales" style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>Hà Nội
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>

                    <label class="checkbox mx-4 mb-3">
                        <input class="  checkbox_address_item mr-3" type="checkbox" id="checkbox_address_DaNang"
                            value="da nang" name="horns">
                        <i class="mr-3 icon-checkbox"></i>Đà Nẵng
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class=" checkbox_address_item  mr-3" type="checkbox" id="checkbox_address_HoChiMinh"
                            value="can tho" name="horns">
                        <i class="mr-3 icon-checkbox"></i>Cần Thơ
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class=" checkbox_address_item  mr-3" type="checkbox" id="checkbox_address_CanTho"
                            value="ho chi minh" name="horns">
                        <i class="mr-3 icon-checkbox"></i>Hồ Chí Minh
                    </label>
                </div>

                <!-- item-4: Salesroom -->
                <div class="salesroom">
                    <p class="text-success ml-4 my-3"><strong>Giảm giá</strong></p>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger" type="checkbox" id="checkbox_address_HaNoi" name="scales"
                            style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>Giảm giá trong ngày
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger" type="checkbox" id="checkbox_address_HaNoi" name="scales"
                            style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>Giảm giá trong tuần
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger" type="checkbox" id="checkbox_address_HaNoi" name="scales"
                            style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>Giảm giá trong tháng
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>

                </div>

                <button onclick="loc({{ $tenDanhMuc[0]->id }})" type="button" class="btn btn-outline-success mx-4"
                    style="width: 80%; height: 30px; font-size: 10px; position: relative; top: 20px;">Áp dụng</button>
            </div>

            <!-- Part 2.2.2: Card-product-right -->
            <div class="card_product_right">
                <div class="row product">
                    @foreach ($nongsans as $nongsan)
                        <div class="col-4 card_product">
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
                                            href="{{ route('nongsan', ['idNongSan' => $nongsan->id]) }}">{{ $nongsan->tenNongSan }}</a>
                                    </p>
                                    <div class="text_price"><span
                                            class="mx-4"><b>{{ number_format($nongsan->gia, 0, ',', '.') }}đ</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>


                <!-- Pagination // phân trang button -->
                <div class="container pagination  d-flex">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <?php $soLuongTrang = ceil(count(App\Models\nongsan::select("*")->where("id_danhmuc",$tenDanhMuc[0]->id)->get()) / 6); ?>
                            @for ($i = 1; $i <= $soLuongTrang; $i++)
                                <li onclick="callApiPhanTrangByIndex('{{$i}}')" class="page-item @if ($trangDuocChon == $i)phantrang_nongsan @endif"><a class="page-link"
                                        >{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!--  -->

        </div>
    </div>


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
                        <a href="#!" class="text_reset" >Our store</a>
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


        function timKiem(idDanhMuc) {
            var searchByKeyWord = document.getElementById('searchByKeyWord');
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('keyword', searchByKeyWord.value);
            form.append('idDanhMuc', idDanhMuc);


            $.ajax({
                method: 'post',
                url: "http://localhost/FreshFoodLaravel/public/1234",
                context: document.body,
                data: form,
                contentType: false,
                processData: false

            }).done(function(result) {
                var temp = document.getElementsByClassName('card_product_right')[0];
                temp.innerHTML = result;


            }).fail(function(result) {
                console.log(result);
            })
        }


        function loc(idDanhMuc) {
            var form = new FormData();
            var t = document.getElementsByClassName('checkbox_address_item');
            var exampleFormControlSelect1 = document.getElementById('exampleFormControlSelect1');
            var arrDiaDiem = [];
            // arrDiaDiem.push("");
            for (let i = 0; i < t.length; i++) {

                if (t[i].checked) {
                    form.append("arrDiaDiem[]", t[i].value);

                }

            }
            form.append('_token', '{{ csrf_token() }}');
            form.append('sortBy', exampleFormControlSelect1.value);
            var giaBatDau = document.getElementById('giaBatDau');
            var giaKetThuc = document.getElementById('giaKetThuc');

            var giaTribatDau = giaBatDau.value;
            var giaTriKetThuc = giaKetThuc.value;
            if (giaTribatDau == '') {
                giaTribatDau = 0;
            }


            form.append('giaTribatDau', giaTribatDau);
            form.append('giaTriKetThuc', giaTriKetThuc);
            form.append('idDanhMuc', idDanhMuc);
            // form.append('arrDiaDiem', arrDiaDiem);
            $.ajax({
                method: 'post',
                url: "http://localhost/FreshFoodLaravel/public/123",
                context: document.body,
                data: form,
                contentType: false,
                processData: false

            }).done(function(result) {
                var temp = document.getElementsByClassName('card_product_right')[0];
                temp.innerHTML = result;
                console.log(result);

            }).fail(function(result) {
                console.log("ThatBai");
                console.log(result);
            })


        }

        function callApiPhanTrangByIndex(index) {
            var form = new FormData();
      
            $.ajax({
                method: 'get',
                url: "{{ route('danhmuc', ['idDanhMuc'=>$tenDanhMuc[0]->id]) }}/"+index,
                context: document.body,
                data: form,
                contentType: false,
                processData: false

            }).done(function(result) {
                var temp = document.getElementsByClassName('row product')[0];
                temp.innerHTML = result;
                console.log(result);

            }).fail(function(result) {
                console.log("ThatBai");
                console.log(result);
            })
        }
    </script>
@endsection
