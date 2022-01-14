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
                <p id="soLuongNongSan" class="m-0">{{ count($nongsans) }} sản phẩm</p>
            </div>

            <div class="combobox_filter d-flex">
                <span class="mr-3">Sắp xếp:</span>
                <div class="form-group">
                    <select onchange="loc({{ $tenDanhMuc[0]->id }},1)" class="form-control"
                        id="exampleFormControlSelect1" style="width: 200px">
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
                <button onclick="loc({{ $tenDanhMuc[0]->id }},1)" type="button" class="btn btn-outline-success mx-4"
                    style=" margin-bottom: 30px; width: 80%; height: 30px; font-size: 10px; position: relative; top: 20px;">Áp
                    dụng</button>

                <!-- item-2: Price range -->
                <div class="price_range">
                    <p class="text-success ml-4 mt-3"><strong>Lọc giá sản phẩm</strong></p>
                    <div class="form-group d-flex mx-3">
                        <input value="" onchange="validateBatDau()" type="number" class="form-control py-3" id="giaBatDau"
                            placeholder="0" style="width: 100px; font-size: 10px;">
                        <p class="mt-2 mx-1">&ndash;</p>
                        <input value="" type="number" class="form-control py-3" id="giaKetThuc" onchange="validateKetThuc()"
                            placeholder="1000000" style="width: 100px; font-size: 10px;">
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
                    <p class="text-success ml-4 my-3"><strong>Lọc theo sao đánh giá</strong></p>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger loc_SoSao" type="checkbox" id="checkbox_address_HaNoi" value="1"
                            name="loc_SoSao" style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>

                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger loc_SoSao" type="checkbox" id="checkbox_address_HaNoi" value="2"
                            name="loc_SoSao" style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger loc_SoSao" type="checkbox" id="checkbox_address_HaNoi" value="3"
                            name="loc_SoSao" style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger loc_SoSao" type="checkbox" id="checkbox_address_HaNoi" value="4"
                            name="loc_SoSao" style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #c0c0c0; font-size: 25px;"></span>
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>
                    <label class="checkbox mx-4 mb-3">
                        <input class="mr-3 text-danger loc_SoSao" type="checkbox" id="checkbox_address_HaNoi" value="5"
                            name="loc_SoSao" style="background: #e94560;">
                        <i class="mr-3 icon-checkbox"></i>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <span class="iconify" data-icon="ant-design:star-filled"
                            style="color: #fb0; font-size: 25px;"></span>
                        <!-- <label class="state p-dange" for="checkbox_address_HaNoi">Hà Nội</label> -->
                    </label>

                </div>


            </div>

            <!-- Part 2.2.2: Card-product-right -->
            <div class="card_product_right">
                <div class="row product">
                    @foreach ($nongsans as $nongsan)
                        <div class="col-4 card_product">
                            @if ($nongsan->soluong == 0)
                                <div class="hethang">
                                    <p for="">Hết hàng</p>
                                </div>
                            @endif

                            <div class="card">
                                <img style="opacity:      @if ($nongsan->soluong == 0)
                                0.5
                                @endif;" class="card-img-top" src="{{ asset($nongsan->hinhanh[0]->src) }}"
                                alt="Card image cap">
                                <div class="middle d-flex">
                                    @if ($nongsan->soluong > 0)
                                        <button onclick="addNongSan({{ $nongsan->id }})" class="middle_cart mx-3"><span
                                                class="iconify" data-icon="fa-solid:cart-plus"
                                                style="color: #216e38;  font-size: 35px"></span></button>
                                    @endif

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
                            <?php $soLuongTrang = ceil(
                                count(
                                    App\Models\nongsan::select('*')
                                        ->where('id_danhmuc', $tenDanhMuc[0]->id)
                                        ->get(),
                                ) / 6,
                            ); ?>
                            @for ($i = 1; $i <= $soLuongTrang; $i++)
                                <li onclick="callApiPhanTrangByIndex('{{ $i }}')"
                                    class="page-item @if ($trangDuocChon == $i)phantrang_nongsan @endif"><a id="page-item-{{ $i }}"
                                        class="page-link">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!--  -->

        </div>

        <!-- part 5 -->
        <div class="mx-5" style="margin-bottom: 100px; margin-top: 100px; height: 120px;">
            <div style="background-color: #727272; width: 80%; height: 0.5px; margin:10px 10%;"></div>
            <div class="title">
                <span class="iconify" data-icon="healthicons:eyeglasses-outline"
                    style="color: #0e8b25; font-size:50px;"></span>
                <label for=""><strong>Có thể bạn chưa biết?</strong> </label>
            </div>
            <div class="container card_tintuc_danhmuc" style="margin-top: 20px;">
                <nav style="background-color: rgba(255, 253, 234, 0.5);">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active text-success" id="nav-home-tab" data-toggle="tab"
                            href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Công thức món ngon</a>
                        <a class="nav-item nav-link text-success" id="nav-profile-tab" data-toggle="tab"
                            href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bảo quản thực
                            phẩm của bạn</a>
                        <a class="nav-item nav-link text-success" id="nav-contact-tab" data-toggle="tab"
                            href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cách chọn thực
                            phẩm sạch</a>
                        <a class="nav-item nav-link text-success" id="nav-contact-tab" data-toggle="tab"
                            href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Món chay </a>
                        <a class="nav-item nav-link text-success" id="nav-contact-tab" data-toggle="tab"
                            href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Bữa trưa vui
                            khỏe</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent" style="">
                    <!-- dành cho tab 1 -->
                    <div class="tab-pane fade show active congthuc_list" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="title_congthuc my-4 mx-2">
                            <p>BỘ SƯU TẬP NỔI BẬC</p>
                            <div class="line"
                                style="height: 0.1px; width: 100px; background-color: rgb(40, 212, 40);"></div>
                        </div>
                        <div class="row mx-5">
                            <div class="col-3">
                                <div class="card bg-white card_congthuc border-0">
                                    <img class="card-img"
                                        src="https://media.cooky.vn/collections/g121/1209974/s270x350/cooky-collection-cover-c1209974.jpg"
                                        alt="Card image">
                                    <div class="background_img_overlay text-white">
                                        <div class="text_content_title">
                                            <a href="#">Trộn bộ các món ngon từ đu đủ</a>
                                            <br>
                                            <label for=""> 32 công thức</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card bg-white card_congthuc border-0">
                                    <img class="card-img"
                                        src="https://media.cooky.vn/collections/g114/1136059/s270x350/cooky-collection-cover-c1136059.jpg"
                                        alt="Card image">
                                    <div class="background_img_overlay text-white">
                                        <div class="text_content_title">
                                            <a href="#">20+ Cách dùng nấm để chế biến món ăn</a>
                                            <br>
                                            <label for=""> 20 công thức</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card bg-white card_congthuc border-0">
                                    <img class="card-img"
                                        src="https://media.cooky.vn/collections/g112/1118788/s270x350/cooky-collection-cover-c1118788.jpg"
                                        alt="Card image">
                                    <div class="background_img_overlay text-white">
                                        <div class="text_content_title">
                                            <a href="#">40+ Cách nấu canh chua ba miền</a>
                                            <br>
                                            <label for=""> 45 công thức</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card bg-white card_congthuc border-0">
                                    <img class="card-img"
                                        src="https://media.cooky.vn/collections/g111/1106844/s270x350/cooky-collection-cover-c1106844.jpg"
                                        alt="Card image">
                                    <div class="background_img_overlay text-white">
                                        <div class="text_content_title">
                                            <a href="#">20+ Món gỏi chứa đầy ắp Topping</a>
                                            <br>
                                            <label for=""> 22 công thức</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- dành cho tab 2 -->
                    <div class="tab-pane fade baoquanTP_list" id="nav-profile" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
                        <div class="title_congthuc my-4 mx-2">
                            <p>BỘ SƯU TẬP NỔI BẬC</p>
                            <div class="line"
                                style="height: 0.1px; width: 100px; background-color: rgb(40, 212, 40);"></div>
                        </div>
                        <ul class="list-unstyled">
                            <li class="media" style="margin: 30px 10%;">
                                <img class="mr-3"
                                    src="https://images.unsplash.com/photo-1606588347049-62bfd0c118d5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c2FsdHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60"
                                    alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1"> <b>Bảo quản thực phẩm bằng cách ướp muối</b> </h6>
                                    <p>Muối được xem là “chất bảo quản thực phẩm” hiệu quả mà ông bà ta thường áp dụng. Đặc
                                        biệt, những thực phẩm tươi sống như cá, thịt... thường được ướp muối để được tươi,
                                        ngon hơn. Nồng độ mặn của muối giúp tiêu diệt đa số các loại nấm và vi khuẩn có hại.
                                        Thịt heo, trâu,
                                        bò và thịt cừu cũng có thể áp dụng ướp muối tương tự,... <a href="#">Xem chi
                                            tiết</a></p>

                                </div>
                            </li>
                            <li class="media" style="margin: 30px 10%;">
                                <img class="mr-3"
                                    src="https://media.istockphoto.com/photos/woman-taking-raw-food-from-refrigerator-picture-id1199457758?b=1&k=20&m=1199457758&s=170667a&w=0&h=gyE5JSBn72XNGwWdNvDTCq9iHH5SYk0moxt_GPnSTyY="
                                    alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1"> <b>Bảo quản thực phẩm bằng cách làm lạnh</b> </h6>
                                    <p>Đây là cách dễ dàng và đơn giản nhất mà ai cũng có thể thực hiện được. Không cần dùng
                                        đến chất bảo quản thực phẩm, bạn cũng có thể duy trì độ tươi sống, chỉ với việc đưa
                                        thực phẩm ráo vào ngăn đá tủ lạnh. Thời gian bảo quản thực phẩm tươi sống ở nhiệt độ
                                        từ 0 - 2 độ C và tối đa là 30 ngày. Nhìn chung, đây là cách phổ biến nhất vì tiết
                                        kiệm thời gian.
                                        Tuy nhiên, nhược điểm của phương pháp này là thực phẩm không được khử trùng hoặc
                                        tiêu diệt vi khuẩn.
                                        Bên cạnh đó, làm giảm độ tươi ngon,... <a href="#">Xem chi tiết</a></p>

                                </div>
                            </li>
                            {{-- <li class="media"  style="margin: 30px 10%;">
                                <img class="mr-3" src="https://media.istockphoto.com/photos/various-kimchi-in-jar-korean-food-picture-id1183017964?b=1&k=20&m=1183017964&s=170667a&w=0&h=HpVzr-VGW18UYGxuPGkgho9Z3kSMWanN239IQ2JDFok=" alt="Generic placeholder image">
                                <div class="media-body">
                                  <h6 class="mt-0 mb-1"> <b>Bảo quản thực phẩm bằng cách muối chua</b> </h6>
                                  <p>Muối chua là cách bảo quản thực phẩm tốt nhất bằng cách đặt hoặc nấu nó trong một chất ức chế phù hợp cho tiêu dùng của con người, điển hình như ngâm nước muối (nhiều muối), giấm, rượu và dầu thực vật, nhất là dầu ô liu nhưng cũng có nhiều loại dầu khác. Hầu hết các quá trình muối chua nào cũng liên quan 
                                      đến việc nấu hoặc đun sôi để các thực phẩm bảo quản trở nên bão hòa với các chất dùng để muối chua.
                                      Tuy nhiên, nhược điểm của phương pháp này là thực phẩm không được khử trùng hoặc tiêu diệt vi khuẩn. Bên cạnh đó, làm giảm độ tươi ngon,... <a href="#">Xem chi tiết</a></p>
                                  
                                </div>
                              </li> --}}
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores officia id soluta obcaecati
                        aspernatur necessitatibus corporis quo omnis fugiat inventore temporibus quos voluptate nesciunt
                        nisi porro accusamus, aperiam, molestiae doloremque.
                    </div>
                </div>
            </div>
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
        var soLuongNongSan = document.getElementById('soLuongNongSan');

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

                soLuongNongSan.innerHTML = document.getElementsByClassName('col-4 card_product').length +
                    " sản phẩm";

            }).fail(function(result) {
                console.log(result);
            })
        }


        function validateBatDau() {
            var giaBatDau = document.getElementById('giaBatDau');
            var giaKetThuc = document.getElementById('giaKetThuc');

            if (giaBatDau.value < 0) {
                thongBao("alert-danger", "không thể nhập số bé hơn 0");
                giaBatDau.value = 0;
            }

        }

        function validateKetThuc() {
            var giaBatDau = document.getElementById('giaBatDau');
            var giaKetThuc = document.getElementById('giaKetThuc');

            if (giaKetThuc.value < 0) {
                thongBao("alert-danger", "không thể nhập số bé hơn 0");
                giaKetThuc.value = "";
            } else {
                let giaTemp = 0;
                if (giaBatDau.value == 0 || giaBatDau.value == "") {
                    giaTemp = 0;
                } else {
                    giaTemp = giaBatDau.value;
                }
                if (giaTemp > giaKetThuc.value) {
                    thongBao("alert-danger", "không thể nhập số bé hơn giá tiền bắt đầu");
                    giaKetThuc.value = "";
                }


            }

        }










        function loc(idDanhMuc, trangDuocChon) {
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

            var danhSachSaoCanLoc = document.getElementsByClassName('mr-3 text-danger loc_SoSao');
            for (let i = 0; i < danhSachSaoCanLoc.length; i++) {
                if (danhSachSaoCanLoc[i].checked) {
                    form.append("arrSoSao[]", danhSachSaoCanLoc[i].value);
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
            form.append('idDanhMuc', idDanhMuc + '');
            form.append('trangDuocChon', trangDuocChon);

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
                soLuongNongSan.innerHTML = document.getElementsByClassName('col-4 card_product').length +
                    " sản phẩm";
            }).fail(function(result) {
                console.log("ThatBai");
                console.log(result);
            })


        }

        function callApiPhanTrangByIndex(index) {
            var form = new FormData();

            $.ajax({
                method: 'get',
                url: "{{ route('danhmuc', ['idDanhMuc' => $tenDanhMuc[0]->id]) }}/" + index,
                context: document.body,
                data: form,
                contentType: false,
                processData: false

            }).done(function(result) {
                var temp = document.getElementsByClassName('row product')[0];
                temp.innerHTML = result;
                let page_item = document.getElementsByClassName("page-item");
                for (let item of page_item) {
                    item.children[0].style.backgroundColor = "#ffffff";
                    item.children[0].style.color = "#216e38"
                }
                let page_item_phantrang = document.getElementById("page-item-" + index);
                page_item_phantrang.style.backgroundColor = "#216e38";
                page_item_phantrang.style.color = "#ffffff"
                console.log(result);

            }).fail(function(result) {
                console.log("ThatBai");
                console.log(result);
            })
        }
    </script>
@endsection
