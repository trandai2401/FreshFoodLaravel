@extends('masterlayout.admin.header')
@section('add-nongsan')

    <!-- boostrap table -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
    <style>
        #layoutSidenav_content .container .card.mb-4 {
            position: absolute;
            top: 100px;
            width: 80%;
        }

    </style>
    <div id="layoutSidenav_content">
        <div class="main_content">
            <h6 class="path text-success mt-4 mx-4">
                <a href="#"><span>Trang chủ /</span></a>
                <a href="#"><span>Nhân viên /</span></a>
                <a class="text-dark " href="#"><span>Tất cả khách hàng</span></a>
            </h6>
        </div>


        <div class="container">

            <div class="card mb-4">

                <div class="card-body">
                    <table id="datatablesSimple" class="table-striped" style="">
                        <thead style="background-color: #ffe923;">
                            <tr>
                                <th>Stt</th>
                                <th>Tài khoản KH</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Phân quyền</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $stt = 0; ?>
                            @foreach ($nhanViens as $nhanVien)
                                <tr class="bg-light">
                                    <td>{{ ++$stt }}</td>
                                    <td>{{ $nhanVien->name }}</td>
                                    <td>{{ $nhanVien->email }}</td>
                                    <td>{{ $nhanVien->sodienthoai }}</td>
                                    <td>{{ $nhanVien->diachi }}</td>

                                    <td>
                                        <select onchange="changeRole({{ $nhanVien->id }})"
                                            id="select{{ $nhanVien->id }}" class="custom-select custom-select-sm">

                                            <option value="3">Nhân viên</option>
                                            <option selected value="2">Khách hàng</option>

                                        </select>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeRole(idNhanVien) {
            var selectID = document.getElementById('select' + idNhanVien);


            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('idNhanVien', idNhanVien);
            form.append('id_role', selectID.value);
            form.append('_method', "PUT");
            $.ajax({
                method: 'post',
                url: "http://localhost/FreshFoodLaravel/public/admin/nhanvien",
                context: document.body,
                data: form,
                contentType: false,
                processData: false

            }).done(function(result) {
                if (result == 1)
                    thongBao("alert-success", "Đã thay đổi vai trò của đối tượng này");
                console.log(result);
            }).fail(function(result) {
                console.log(result);
            })

        }






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
