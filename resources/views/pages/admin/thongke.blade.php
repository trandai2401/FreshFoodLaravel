@extends('masterlayout.admin.header')
@section('add-nongsan')


    <link rel="stylesheet" href="{{ asset('style/ds_giohang_khachhang/ds_giohang_khachhang.css') }}">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Thống kê</h1>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Biểu đồ thể hiện lượt mua trong tuần
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">Cập nhật hiện tại</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Biểu đồ thể hiện tỉ lệ sản phẩm bán ra theo danh mục
                            </div>
                            <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">Cập nhật hiện tại</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    {{-- <script src="{{asset('js/chart-bar-demo.js')}}"></script> --}}
    <script src="{{ asset('js/chart-pie-demo.js') }}"></script>

    <script>
        var form = new FormData();
        form.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'get',
            url: "http://localhost/FreshFoodLaravel/public/thongke",
            context: document.body,
            data: form,
            contentType: false,
            processData: false

        }).done(function(result) {
            arrayData = [];
            for (let item of result) {
                arrayData.push(item.SOlUONG);
                console.log(item.SOlUONG);
            }
            console.log(arrayData);

            Chart.defaults.global.defaultFontFamily =
                '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Bar Chart Example
            var ctx = document.getElementById("myBarChart");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"],
                    datasets: [{
                        label: "Revenue",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: arrayData,
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 30,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });

        }).fail(function(result) {
            console.log(result);
        })
    </script>
@endsection
