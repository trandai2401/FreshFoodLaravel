@extends('masterlayout.admin.header')
@section('add-nongsan')


    <!-- boostrap table -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

    <div id="layoutSidenav_content">
        <div class="main_content">
            <h6 class="path text-success mt-4 mx-4">
                <a href="#"><span>Trang chủ /</span></a>
                <a href="#"><span>Sản phẩm /</span></a>
                <a class="text-dark " href="#"><span>Tất cả sản phẩm</span></a>
            </h6>

            <div class="container">
                <a href="{{ route('AdminAddNongSan') }}"><button class="btn btn-primary" style="margin: 10px">Thêm nông sản
                    </button></a>
                <div class="card mb-4">

                    <div class="card-body">
                        <table id="datatablesSimple" class="table-striped" style="">
                            <thead style="background-color: #ffe923;">
                                <tr>
                                    <th>Stt</th>
                                    <th>Tên Nông sản</th>
                                    <th>Danh mục</th>
                                    <th>SL(kg)</th>
                                    <th>Giá bán</th>
                                    <th> Ngày nhập </th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($nongSans as $nongSan)
                                    <tr class="bg-light">
                                        <td>{{ $nongSan->id }}</td>
                                        <td>{{ $nongSan->tenNongSan }}</td>
                                        <td>{{ $nongSan->danhmuc->tenDanhMuc }}</td>
                                        <td>{{ $nongSan->soluong }}</td>
                                        <td>{{ $nongSan->gia }} VNĐ</td>
                                        <td>06/02/2021</td>
                                        <td>
                                            <button class="border-0 bg-transparent delete"><span class="iconify"
                                                    data-icon="clarity:remove-solid"
                                                    style="color: #968917; font-size: 25px;"></span></button>

                                            <button class="border-0 bg-transparent delete"><span class="iconify"
                                                    data-icon="fluent:person-edit-20-filled"
                                                    style="color: #216e38;  font-size: 25px;"></span></button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const datatablesSimple = document.getElementById('datatablesSimple');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
    </script>
@endsection
