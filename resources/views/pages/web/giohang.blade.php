@extends('masterlayout.web.header')

@section('giohang')
    <link rel="stylesheet" href="{{ asset('style/cartVoucher-style/cartVoucher.css') }}">
    <div class="container path title mt-3">
        <p> <a href="#"><b class="text-success">Trang chủ</b></a> / <b>Giỏ hàng</b></p>

        <p> <a href="giohang">nhap </a></p>
    </div>

    <div class="container body-main">
        <!-- Part 2.1: voucher-cart  -->
        <div class="voucher-cart">
            <table class="w-100" id="table-voucher-cart">
                <tr>
                    <th id="voucher">
                        <label class="checkbox  mx-2">
                            <input class="mr-3" type="checkbox" id="checkbox_address_DaNang" name="horns">
                            <i class="mr-3 icon-checkbox"></i> Sản phẩm
                        </label>

                    </th>
                    <th id="quantity">Số lượng</th>
                    <th id="price"> &emsp;Giá </th>
                </tr>
                <!-- row1 -->
                @foreach ($gioHang->itemGioHang as $item)
                    <tr id="itemGH{{ $item->id_nongsan }}">
                        <td class="voucher">

                            <label class="checkbox  mx-2">
                                <input class="" type="checkbox" id="checkbox_address_DaNang" name="horns">
                                <i class="icon-checkbox"></i>
                            </label>

                            <div class="img-voucher-description">
                                <img src="{{ asset($item->nongsan->hinhanh[0]->src) }}" alt="">
                                <p style="font-size: 13px; margin: 0px 10px;"> {{ $item->nongsan->tenNongSan }}</p>
                            </div>


                        </td>
                        <td class="quantity mt-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button onclick="editCart({{ $item->nongsan->id }},-1,{{ $item->nongsan->gia }})"
                                        class="btn btn-outline-success" type="button"><span id="icon-minus"
                                            class="iconify" data-icon="entypo:minus"></span></button>
                                </div>
                                <input id="input-quantity{{ $item->id_nongsan }}" type="text" class="form-control input soluongNS"
                                    value="{{ $item->soluong }}" aria-label="" aria-describedby="basic-addon1"
                                    style="font-size: 13px;">
                                <div class="input-group-append">
                                    <button onclick="editCart({{ $item->nongsan->id }},1,{{ $item->nongsan->gia }})"
                                        class="btn btn-outline-success" type="button"><span id="icon-plus"
                                            class="iconify" data-icon="entypo:plus"></span></button>
                                </div>
                            </div>
                        </td>
                        <td class="price">
                            <div style="font-size: 13px; width: 100%; display: flex;">
                                <span id="gia_item{{ $item->id_nongsan }}" class="col-10 mt-2"
                                    style="font-size: 13px;">{{ number_format($item->nongsan->gia * $item->soluong, 0, ',', '.') }}
                                    vnd</span>
                                <button onclick="removeRow('{{ $item->id_nongsan }}');"
                                    class="col-2 border-0 bg-transparent px-0"
                                    style="font-size: 15px; width: 20px; position: relative; right: 0px;"><span
                                        class="iconify" data-icon="iwwa:delete"></span></button>
                            </div>
                        </td>
                    </tr>
                @endforeach




                {{-- <!-- row1 -->
                <tr id="row02">
                    <td class="voucher">

                        <label class="checkbox  mx-2">
                            <input class="" type="checkbox" id="checkbox_address_DaNang" name="horns">
                            <i class="icon-checkbox"></i>
                        </label>

                        <div class="img-voucher-description">
                            <img src="../image/landing/card/cua hoàng đế.png" alt="">
                            <p style="font-size: 13px; margin: 0px 10px;"> Yêu bé Đại nhất nè</p>
                        </div>


                    </td>
                    <td class="quantity mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success" type="button"><span id="icon-minus"
                                        class="iconify" data-icon="entypo:minus"></span></button>
                            </div>
                            <input id="input-quantity" type="text" class="form-control input" placeholder="10" aria-label=""
                                aria-describedby="basic-addon1" style="font-size: 13px;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button"><span id="icon-plus"
                                        class="iconify" data-icon="entypo:plus"></span></button>
                            </div>
                        </div>
                    </td>
                    <td class="price">
                        <div style="font-size: 13px; width: 100%; display: flex;">
                            <span class="col-10 mt-2" style="font-size: 13px;">500.000.000 vnd</span>
                            <button onclick="removeRow('row02');" class="col-2 border-0 bg-transparent px-0"
                                style="font-size: 15px; width: 20px; position: relative; right: 0px;"><span
                                    class="iconify" data-icon="iwwa:delete"></span></button>
                        </div>
                    </td>
                </tr>


                <!-- row1 -->
                <tr id="row03">
                    <td class="voucher">

                        <label class="checkbox  mx-2">
                            <input class="" type="checkbox" id="checkbox_address_DaNang" name="horns">
                            <i class="icon-checkbox"></i>
                        </label>

                        <div class="img-voucher-description">
                            <img src="../image/landing/card/cherry.png" alt="">
                            <p style="font-size: 13px; margin: 0px 10px;"> Yêu bé Đại nhất nè</p>
                        </div>


                    </td>
                    <td class="quantity mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success" type="button"><span id="icon-minus"
                                        class="iconify" data-icon="entypo:minus"></span></button>
                            </div>
                            <input id="input-quantity" type="text" class="form-control input" placeholder="10" aria-label=""
                                aria-describedby="basic-addon1" style="font-size: 13px;">
                            <div class="input-group-append">
                                <button onclick="" class="btn btn-outline-success" type="button"><span id="icon-plus"
                                        class="iconify" data-icon="entypo:plus"></span></button>
                            </div>
                        </div>
                    </td>
                    <td class="price">
                        <div style="font-size: 13px; width: 100%; display: flex;">
                            <span class="col-10 mt-2" style="font-size: 13px;">500.000.000 vnd</span>
                            <button onclick="removeRow('row03');" class="col-2 border-0 bg-transparent px-0"
                                style="font-size: 15px; width: 20px; position: relative; right: 0px;"><span
                                    class="iconify" data-icon="iwwa:delete"></span></button>
                        </div>
                    </td>
                </tr>

                <!-- row1 -->
                <tr id="row04">
                    <td class="voucher">

                        <label class="checkbox  mx-2">
                            <input class="" type="checkbox" id="checkbox_address_DaNang" name="horns">
                            <i class="icon-checkbox"></i>
                        </label>

                        <div class="img-voucher-description">
                            <img src="../image/landing/card/Chân dê.png" alt="">
                            <p style="font-size: 13px; margin: 0px 10px;"> Yêu bé Đại nhất nè</p>
                        </div>


                    </td>
                    <td class="quantity mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success" type="button"><span id="icon-minus"
                                        class="iconify" data-icon="entypo:minus"></span></button>
                            </div>
                            <input id="input-quantity" type="text" class="form-control input" placeholder="10" aria-label=""
                                aria-describedby="basic-addon1" style="font-size: 13px;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button"><span id="icon-plus"
                                        class="iconify" data-icon="entypo:plus"></span></button>
                            </div>
                        </div>
                    </td>
                    <td class="price">
                        <div style="font-size: 13px; width: 100%; display: flex;">
                            <span class="col-10 mt-2" style="font-size: 13px;">500.000.000 vnd</span>
                            <button onclick="removeRow('row04');" class="col-2 border-0 bg-transparent px-0"
                                style="font-size: 15px; width: 20px; position: relative; right: 0px;"><span
                                    class="iconify" data-icon="iwwa:delete"></span></button>
                        </div>
                    </td>
                </tr>

                <!-- row1 -->
                <tr id="row05">
                    <td class="voucher">

                        <label class="checkbox  mx-2">
                            <input class="" type="checkbox" id="checkbox_address_DaNang" name="horns">
                            <i class="icon-checkbox"></i>
                        </label>

                        <div class="img-voucher-description">
                            <img src="../image/landing/card/bưởi.png" alt="">
                            <p style="font-size: 13px; margin: 0px 10px;"> Yêu bé Đại nhất nè</p>
                        </div>


                    </td>
                    <td class="quantity mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success" type="button"><span id="icon-minus"
                                        class="iconify" data-icon="entypo:minus"></span></button>
                            </div>
                            <input id="input-quantity" type="text" class="form-control input" placeholder="10" aria-label=""
                                aria-describedby="basic-addon1" style="font-size: 13px;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button"><span id="icon-plus"
                                        class="iconify" data-icon="entypo:plus"></span></button>
                            </div>
                        </div>
                    </td>
                    <td class="price">
                        <div style="font-size: 13px; width: 100%; display: flex;">
                            <span class="col-10 mt-2" style="font-size: 13px;">500.000.000 vnd</span>
                            <button onclick="removeRow('row05');" class="col-2 border-0 bg-transparent px-0"
                                style="font-size: 15px; width: 20px; position: relative; right: 0px;"><span
                                    class="iconify" data-icon="iwwa:delete"></span></button>
                        </div>
                    </td>
                </tr> --}}

            </table>
        </div>




        <!-- Part 2.2: total-cart  -->
        <div class="total-cart" >
            <div class="container-fluid pay-voucher  bg-white">
                <table id="pay-voucher">
                    <tr class="d-none">
                        <th id="title-payvoucher" class="border-0">


                        </th>
                        <th id="input-voucher" class="border-0"></th>

                    </tr>

                    <tr id="title-chooseAll">
                        <td colspan="2" class="pt-4">
                            <span class="">Thanh toán</span>
                        </td>
                    </tr>

                    <tr>
                        <td>Tiền :</td>
                        <td id="tamtinh">{{ number_format($gioHang->tongTienGioHang($gioHang->id), 0, ',', '.') }} đ</td>
                    </tr>

                    <tr>
                        <td>Phí giao :</td>
                        <td id="phigiaohang">0 đ</td>
                    </tr>

                    <tr>
                        <td>Discount :</td>
                        <td>0 đ</td>
                    </tr>

                    <tr style="border-top: 0.7px rgb(172, 172, 172) solid;">
                        <td style="border-top: 0.7px rgb(172, 172, 172) solid; font-weight: 700;">Tổng cộng :</td>
                        <td id="tongtienthanhtoan">
                            {{ number_format($gioHang->tongTienGioHang($gioHang->id), 0, ',', '.') }} đ</td>
                    </tr>

                    <tr style="border-top: 0.7px rgb(172, 172, 172) solid;">
                            <td  style="border-top: 0.7px rgb(172, 172, 172) solid;">Địa chỉ người dùng</td>
                            <td></td>                     
                    </tr>
                </table>
                <!-- tinh thanh -->
                    <div class="form-group">
                        <!-- <label for="exampleFormControlSelect1" style="font-size: 10px; font-weight: 600;" >Tỉnh/ Thành phố</label> -->
                        <select onchange="thuhoaxuxu();" class="form-control" id="tinhthanh" style="font-size: 13px; font-weight: 600;">
                        <option>Tỉnh/ Thành phố</option>
                        
                        </select>
                    </div>

                    <!-- huyện quận -->
                    <div class="form-group">
                        <!-- <label for="exampleFormControlSelect1" style="font-size: 10px; font-weight: 600;" >Tỉnh/ Thành phố</label> -->
                        <select onchange="changeQH();" class="form-control" id="quanhuyen" style="font-size: 13px; font-weight: 600;">
                        <option>Huyện/ Quận</option>
                        
                        </select>
                    </div>

                    <!-- xã phường -->
                    <div class="form-group">
                        <!-- <label for="exampleFormControlSelect1" style="font-size: 10px; font-weight: 600;" >Tỉnh/ Thành phố</label> -->
                        <select onchange="changePX();" class="form-control" id="phuongxa" style="font-size: 13px; font-weight: 600;">
                        <option>Phường/ Xã</option>
                        
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1" style="font-size: 10px; font-weight: 600;" >Số  nhà</label>
                        <input  style="font-size: 13px; font-weight: 600;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Địa chỉ số nhà">
                    </div>
                <button type="button" class="btn btn-success w-100 mt-2" style="font-size: 13px;">Thanh toán ngay</button>
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
         var formTT = document.getElementById("tinhthanh");
        var formQH = document.getElementById("quanhuyen");
        var formPX  = document.getElementById("phuongxa");
        function laySLNS(){
            var solg = 0;
            var dsInput = document.getElementsByClassName("form-control input soluongNS");
            for(let item of dsInput){
                solg = solg + (item.value - 0);
                
            }
            return solg*1000;
        }



        function callApiTinhThanh(){
           
            $.ajax({
                type: 'POST',
                url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province',
                headers: {
                    "token":"8d38601c-7035-11ec-9054-0a1729325323"
                }
                //OR
                //beforeSend: function(xhr) {
                //  xhr.setRequestHeader("My-First-Header", "first value");
                //  xhr.setRequestHeader("My-Second-Header", "second value");
                //}
            }).done(function(data) { 
                var a = data.data;
                for(let item = 0 ; item  < a.length; item++ ){
                    var optionTT = document.createElement('OPTION');
                    optionTT.value = a[item].ProvinceID;
                    optionTT.innerText = a[item].ProvinceName;
                    formTT.append(optionTT);
                    
                }
                console.log(optionTT.value);
            });
        }
        

        callApiTinhThanh();

        function thuhoaxuxu(){
            console.log(formTT.value);
            callApiQuanHuyen(formTT.value);
        }

        function changeQH(){
            console.log(formQH.value);
            callApiPhuongXa(formQH.value);
        }

        function changePX(){
            callApiPhuongXa(formQH.value);
            callApiPTTT();
        }
        

        function callApiQuanHuyen(idTinhThanh){
            
            var form = new FormData();
            form.append('province_id',idTinhThanh);
            
            $.ajax({
                type: 'GET',
                url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district?province_id='+idTinhThanh,
                headers: {
                    "token":"8d38601c-7035-11ec-9054-0a1729325323"
                }
            }).done(function(data) { 
                for(let i = 0; formQH.children.length > 0 ; i++){
                    formQH.children[0].remove();

                }
                var a = data.data;
                for(let item = 0 ; item  < a.length; item++ ){
                    var optionQH = document.createElement('OPTION');
                    optionQH.value = a[item].DistrictID;
                    optionQH.innerText = a[item].DistrictName;
                    formQH.append(optionQH);
                    
                }
                console.log(a);
            });
        }

        // call api phường xã
        function callApiPhuongXa(idPhuongXa){
            
            var form = new FormData();
            form.append('district_id',idPhuongXa);
            
            $.ajax({
                type: 'GET',
                url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id='+idPhuongXa,
                headers: {
                    "token":"8d38601c-7035-11ec-9054-0a1729325323"
                }
            }).done(function(data) { 
                for(let i = 0; formPX.children.length > 0 ;i++){
                    formPX.children[0].remove();
                }
                var a = data.data;
                for(let item = 0 ; item  < a.length; item++ ){
                    var optionPX = document.createElement('OPTION');
                    optionPX.value = a[item].WardCode;
                    optionPX.innerText = a[item].WardName;
                    formPX.append(optionPX);
                }
                console.log(a);
            });
        }

        // call api phương thức thanh toán
        function callApiPTTT(){
            $.ajax({
                type: 'GET',
                url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services',
                headers: {
                    "token":"8d38601c-7035-11ec-9054-0a1729325323"
                },
                data: {
                    "shop_id": 2413843,
                    "from_district": 3186,
                    "to_district": formQH.value
                }
                
            }).done(function(data) { 
                console.log(data);
                var maPT = data.data[0].service_type_id;
                console.log(maPT);
                
                callApiGiaCuocVanChuyen(maPT);
            });
        }
        

        // call api tính phí ship
        function callApiGiaCuocVanChuyen(maPT){
            $.ajax({
                type: 'GET',
                url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee',
                headers: {
                    "token":"8d38601c-7035-11ec-9054-0a1729325323",
                    "shop_id": 2413843
                },
                data: {
                    "service_type_id": maPT,
                    "insurance_value": 1000,
                    "coupon": null,
                    "to_ward_code": "340518",
                    "from_district_id": 1917,
                    "to_district_id": 1526,
                    "weight": laySLNS(),
                    "length": 15,
                    "width": 15,
                    "height": 15
                }
                
            }).done(function(data) { 
                console.log(data);
                var tongPhiShip = data.data.total;
                var phigiao = document.getElementById("phigiaohang");
                phigiao.innerText =String(tongPhiShip).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " đ"; 
            });
        }

        




        function editCart(idNS, sl, gia) {
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('idNongSan', idNS);
            form.append('soLuong', sl);
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

                if (res.soLuong == 0) {
                    removeRow(idNS);
                }
                var gia_item = document.getElementById('gia_item' + idNS);
                var input_quantity = document.getElementById('input-quantity' + idNS);
                gia_item.innerHTML = String(gia * res.soLuong).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " vnd"
                input_quantity.value = res.soLuong;
                updateTongTienThanhToan(res.tongTien);
            }).fail(function(result) {
                console.log(result);
            })
        }

        

        function updateTongTienThanhToan(result) {
            var tongtienthanhtoan = document.getElementById('tongtienthanhtoan');
            tongtienthanhtoan.innerHTML = String(result).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " đ"

            var tamtinh = document.getElementById('tamtinh');
            tamtinh.innerHTML = String(result).replace(/(.)(?=(\d{3})+$)/g, '$1,') + " đ";
        }


        function removeRow(idNS) {
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('_method', 'DELETE');
            form.append('id_nongsan', idNS);
            $.ajax({
                method: 'post',
                url: "{{ route('cart1') }}",
                context: document.body,
                data: form,
                contentType: false,
                processData: false
            }).done(function(result) {
                try {
                    console.log(result);
                    var divNS = document.getElementById('itemGH' + idNS);
                    divNS.remove();
                    updateTongTienThanhToan(result);
                    thongBao("alert-success", "Đã xóa nông sản này ra khỏi giỏ hàng");
                } catch (error) {
                    thongBao("alert-danger", "Đã có lỗi xãy ra");
                }
            }).fail(function(result) {
                thongBao("alert-danger", "Đã có lỗi xãy ra");
            })
        }



    </script>


@endsection
