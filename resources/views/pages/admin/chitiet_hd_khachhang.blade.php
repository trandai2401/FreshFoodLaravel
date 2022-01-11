@extends('masterlayout.admin.header')
@section('add-nongsan') 

<link rel="stylesheet" href="{{ asset('style/chitietHD_admin/chitietHD_admin.css') }}">

 
 <!-- Part 2.2: Phần nội dung chính - được thay đổi  -->
 <div id="layoutSidenav_content">
    <div class="main_content">
        <h6 class="path text-success mt-4 mx-4">
            <a href="#"><span>Trang chủ /</span></a>
            <a href="#"><span>Duyệt hóa đơn /</span></a>
            <a class="text-dark " href="#"><span>Chi tiết hóa đơn</span></a>
        </h6>
    </div>

    <div id="content_HD">
        <div class="d-flex">
            <div class="row thongtinHD" style="font-size: 13px; width: 400px">
                <div class="col-6">
                    <p> <strong>Mã hóa đơn:</strong> <span>MDH001</span> </p>
                    <p> <strong>SĐT:</strong> <span>09057854</span> </p>
                    <p> <strong>Tổng tiền ship:</strong> <span>250.000đ</span> </p>

                </div>
                <div class="col-6">
                    <p> <strong></strong> <span>Nguyễn Thị Ngọc Ánh</span> </p>
                    <p> <strong>Địa chỉ:</strong> <span>Đại Hưng - Đại Lộc - Quảng Nam - Quảng Nam</span> </p>       
                </div>
            </div>

            <div class="trangthai_DH mx-5">
                <div class="card bg-transparent border-0" style="font-size: 13px; width: 200px">
                    <p> <strong>Trạng thái đơn hàng:</strong></p>
                    <select class="custom-select" id="selectTTDH" style="font-size: 13px; background-color: #ffb52b; color: black;">
                        
                        <option value="1">Đang chờ duyệt</option>
                        <option value="2">Đang vận chuyển</option>
                        <option value="3">Đã nhận hàng</option>
                      </select>
                </div>
            </div>

            <div class="inHD mx-5">
                <div class="card bg-transparent border-0" style="font-size: 13px; width: 200px">
                    <p> <strong>In hóa đơn</strong></p>
                    <button id="btn_inHD" type="button" class="btn btn-outline bg-transparent border-0"><span class="iconify" data-icon="noto-v1:printer" style="font-size: 30px;"></span></button>
                </div>
            </div>
        </div>
        
    </div>
    
    <!-- table sản phẩm -->
    <table class="table" id="table_SP" style="font-size: 13px;">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Hình ảnh</th>            
            <th scope="col">Tên nông sản</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá tiền</th>
            <th scope="col">Ngày mua</th>

          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th scope="row" style="vertical-align: middle;">1</th>
            <td class="" style="vertical-align: middle;">
                <img  class="hinhanhSP" src="../image/landing/card/bơ.png" alt="">
            </td>
            <td class="" style="vertical-align: middle;">
                <p>Bơ Lâm Đồng</p>
            </td>
            <td style="vertical-align: middle;">2</td>
            <td style="vertical-align: middle;">120.000 đ</td>
            <td style="vertical-align: middle;">21-12-2021</td>
          </tr>
          

          <tr class="">
            <th scope="row" style="vertical-align: middle;">1</th>
            <td class="" style="vertical-align: middle;">
                <img  class="hinhanhSP" src="../image/landing/card/bưởi.png" alt="">
            </td>
            <td class="" style="vertical-align: middle;">
                <p>Bơ Lâm Đồng</p>
            </td>
            <td style="vertical-align: middle;">2</td>
            <td style="vertical-align: middle;">120.000 đ</td>
            <td style="vertical-align: middle;">21-12-2021</td>
          </tr>

          <tr class="">
            <th scope="row" style="vertical-align: middle;">1</th>
            <td class="" style="vertical-align: middle;">
                <img  class="hinhanhSP" src="../image/landing/card/chanh vàng.png" alt="">
            </td>
            <td class="" style="vertical-align: middle;">
                <p>Bơ Lâm Đồng</p>
            </td>
            <td style="vertical-align: middle;">2</td>
            <td style="vertical-align: middle;">120.000 đ</td>
            <td style="vertical-align: middle;">21-12-2021</td>
          </tr>

          <tr class="">
            <th scope="row" style="vertical-align: middle;">1</th>
            <td class="" style="vertical-align: middle;">
                <img  class="hinhanhSP" src="../image/landing/card/cà rốt.png" alt="">
            </td>
            <td class="" style="vertical-align: middle;">
                <p>Bơ Lâm Đồng</p>
            </td>
            <td style="vertical-align: middle;">2</td>
            <td style="vertical-align: middle;">120.000 đ</td>
            <td style="vertical-align: middle;">21-12-2021</td>
          </tr>
        </tbody>
      </table>  

</div>



<script>
    window.addEventListener('DOMContentLoaded', event => {
        // Simple-DataTables
        // https://github.com/fiduswriter/Simple-DataTables/wiki

        const datatablesSimple = document.getElementById('datatablesSimple');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });
</script>


@endsection