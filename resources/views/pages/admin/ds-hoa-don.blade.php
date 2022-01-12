@extends('masterlayout.admin.header')
@section('add-nongsan')

    <link rel="stylesheet" href="{{ asset('style/ds_giohang_khachhang/ds_giohang_khachhang.css') }}">
    <!-- Part 2.2: Phần nội dung chính - được thay đổi  -->
    <div id="layoutSidenav_content">
        <div class="main_content">
            <h6 class="path text-success mt-4 mx-4">
                <a href="#"><span>Trang chủ /</span></a>
                <a href="#"><span>Duyệt hóa đơn /</span></a>
                <a class="text-dark " href="#"><span>Danh sách hóa đơn</span></a>
            </h6>
        </div>

        <div id="table_datatablesSimple" class="container">
            <div class="card mb-4">

                <div class="card-body">
                    <table id="datatablesSimple" class="table-striped" style="">
                        <thead style="background-color: #ffe923;">
                            <tr>
                                <th>Stt</th>
                                <th>Mã hóa đơn</th>
                                <th>Tên người dùng</th>
                                <th>Ngày mua hàng</th>
                                <th>Tổng tiền</th>
                                <th>Chi tiết</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $i = 0; ?>
                            @foreach ($hoaDons as $item)
                                <tr class="bg-light">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ number_format($item->tongtien + $item->tienship, 0, ',', ' ') }}đ</td>
                                    <td>
                                        <a href="{{ route('chiTietHoaDon', ['idHoaDon' => $item->id]) }}"
                                            class="chitiet_HD">Chi tiết HĐ</a>
                                    </td>
                                    <td>
                                        {{ $item->trangThai->tentrangthai }}
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <tr class="bg-light">
                            <td>1</td>
                            <td>HD0034</td>
                            <td>ngocanh</td>
                            <td>12-01-2022</td>
                            <td>350.000đ</td>
                            <td> 
                                <a href="#" class="chitiet_HD">Chi tiết HĐ</a>
                            </td>
                            <td>
                                Đang chờ duyệt
                            </td>
                        </tr>
                        <tr class="bg-light">
                            <td>1</td>
                            <td>HD0034</td>
                            <td>ngocanh</td>
                            <td>12-01-2022</td>
                            <td>350.000đ</td>
                            <td> 
                                <a href="#" class="chitiet_HD">Chi tiết HĐ</a>
                            </td>
                            <td>
                                Đang chờ duyệt
                            </td>
                        </tr> --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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


    <script type="text/javascript" src="../bootstrap/bootstrap-4.6.0-dist/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

@endsection
