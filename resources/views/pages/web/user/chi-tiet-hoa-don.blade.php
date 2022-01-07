@extends('masterlayout.web.header')
@section('user-profile')
<base href="{{asset('')}}">
<link rel="stylesheet" href="{{ asset('style/thanhToanGH-style/thanhToanGioHang.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('style/hoaDonMuaHang.css') }}"> -->
<!-- Body cart-->
<!-- Part 2: body-main -->
<div class="container path title mt-3">
    <p> <a href="#" style="text-decoration: none;"><b class="text-success">Danh sách hóa đơn</b></a> / <b> Chi tiết hóa đơn</b></p>
    <div class="chitietThongTin">
        <p class="my-0"> <strong> Mã hóa đơn: </strong><label for="">MS28374</label></p>

        <p class="my-0"> <strong> Ngày thanh toán: </strong><label for="">21/12/2021</label></p>
        <p class="my-0"> <strong> Trạng thái đơn hàng:</strong> <label for="">Đã giao hàng</label></p>
        <p class="my-0"> <strong> Địa điểm:</strong> <label for="">Thôn Trúc hà</label> - <label for="">Xã Đại hưng</label> - <label for="">huyện Đại Lộc</label> - <label for="">tỉnh Quảng Nam</label></p>
    </div>
</div>

<div class="container body-main">
    <!-- Part 2.1: voucher-cart  -->
    <div class="voucher-cart" style="height:auto; margin-bottom: 100px;">
        <table class="w-100" id="table-voucher-cart">
            <tr>
                <th id="voucher">
                    <label  class="checkbox ml-5">
                            Sản phẩm
                    </label>
                    
                </th>
                <th id="quantity">Số lượng (kg)</th>
                <th id="price"> &emsp;Giá </th>
            </tr>
            <!-- row1 -->
            <tr id="row01">
                <td class="voucher">
                    <div class="img-voucher-description">
                        <img src="../image/landing/card/chuối vàng.png" alt="">
                        <p style="font-size: 13px; margin: 0px 10px;">Dâu tây đà lạt</p>
                    </div>

                </td>
                <td class="quantity">                       
                        <span class="py-5" for="" style="font-size: 13px;">5</span>                        
                </td>
                <td class="price">
                    <div style="font-size: 13px; width: 100%; display: flex; position: relative;left: -50px;">
                        <span class="col-10 mt-2" style="font-size: 13px;">500.000.000 vnd</span>
                        <button  class="bg-transparent border-0"><span class="iconify" data-icon="ant-design:comment-outlined" style="color: #177a4c; font-size: 30px;"></span></button>
                    </div>
                        
                </td>  
            </tr>
            
            <tr id="row01">
                <td class="voucher">
                    <div class="img-voucher-description">
                        <img src="../image/landing/card/chuối vàng.png" alt="">
                        <p style="font-size: 13px; margin: 0px 10px;">Dâu tây đà lạt</p>
                    </div>

                </td>
                <td class="quantity">                       
                        <span class="py-5" for="" style="font-size: 13px;">5</span>                        
                </td>
                <td class="price">
                    <div style="font-size: 13px; width: 100%; display: flex; position: relative;left: -50px;">
                        <span class="col-10 mt-2" style="font-size: 13px;">500.000.000 vnd</span>
                        <button class="bg-transparent border-0"><span class="iconify" data-icon="ant-design:comment-outlined" style="color: #177a4c; font-size: 30px;"></span></button>
                    </div>
                        
                </td>  
            </tr>

            <tr id="row01">
                <td class="voucher">
                    <div class="img-voucher-description">
                        <img src="../image/landing/card/chuối vàng.png" alt="">
                        <p style="font-size: 13px; margin: 0px 10px;">Dâu tây đà lạt</p>
                    </div>

                </td>
                <td class="quantity">                       
                        <span class="py-5" for="" style="font-size: 13px;">5</span>                        
                </td>
                <td class="price">
                    <div style="font-size: 13px; width: 100%; display: flex; position: relative;left: -50px;">
                        <span class="col-10 mt-2" style="font-size: 13px;">500.000.000 vnd</span>
                        <button class="bg-transparent border-0"><span class="iconify" data-icon="ant-design:comment-outlined" style="color: #177a4c; font-size: 30px;"></span></button>
                    </div>
                        
                </td>  
            </tr>
            </table>
    </div>
        



    <!-- Part 2.2: total-cart  -->
    <div class="total-cart">
        <div class="container-fluid pay-voucher">
            <table id="pay-voucher">
                <tr class="d-none">
                    <th id="title-payvoucher" class="border-0">
                    
                    
                    </th>
                    <th id="input-voucher" class="border-0"></th>
                    
                </tr>

                <tr id="title-chooseAll">
                    <td colspan="2" class="pt-4">
                    <span  class="">Hóa đơn</span>
                    </td>
                </tr>

                <tr>
                    <td>Tiền :</td>
                    <td>600.0000.0000 đ</td>                     
                </tr>

                <tr>
                    <td>Phí giao :</td>
                    <td>0 đ</td>                     
                </tr>


                <tr style="border-top: 0.7px rgb(172, 172, 172) solid;">
                    <td  style="border-top: 0.7px rgb(172, 172, 172) solid;">Tổng cộng :</td>
                    <td>600.0000 đ</td>                     
                </tr>
                </table>
                
        </div>

    </div>
</div>

<!-- Footer -->
<!-- Part 12: Footer -->
<div class="container-fluid footer mt-5">
    <div class="row row_footer">
        <div class="col-lg-4 col-md-4 col-sm-12 image">
            <div class="frame">
                <img class="logo_footer pt-4" src="https://cdni.iconscout.com/illustration/premium/thumb/healthy-food-2358006-1969921.png" alt="logo-footer">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 contract">
            <div class="frame">
                <h6 class="text-uppercase fw-bold">
                    Contact Us
                </h6>
                <p>
                <a href="#!" class="text_reset">36 Ong Ich Khiem,Da nang,  VietNam</a>
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
                        <span class="iconify " data-icon="bx:bxl-facebook-circle"  ></span>
                    </a>
                    <a href="">
                        <span class="iconify" data-icon="ant-design:twitter-circle-filled" data-width="24" data-height="24"></span>
                    </a>
                    <a href="">
                        <span class="iconify" data-icon="akar-icons:instagram-fill" data-width="24" data-height="24"></span>
                    </a>
                    <a href="">
                        <span class="iconify" data-icon="akar-icons:google-contained-fill" data-width="24" data-height="24"></span>
                        </span>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection