<!-- Part 2.2: Phần nội dung chính - được thay đổi  -->
@extends('masterlayout.admin.header')
@section('add-nongsan')
    <div id="layoutSidenav_content">
        <div class="main_content">
            <h6 class="path text-success mt-4 mx-4">
                <a href="#"><span>Trang chủ /</span></a>
                <a href="#"><span>Sản phẩm /</span></a>
                <a class="text-dark " href="#"><span>Thêm mới sản phẩm</span></a>
            </h6>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid d-flex justify-content-around">
                    <div class="form-add-voucher">
                        <div class="titile-add-voucher-form text-left">
                            <h5 class="text-success pt-3 px-5"><b> THÔNG TIN SẢN PHẨM</b></h5>
                        </div>
                        <div class="form add_voucher">
                            <form action="">
                                <div class="form-group row mx-5 mt-3">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Title"
                                        style="font-size: 13px;">
                                </div>

                                <div class="form-row mx-5 mt-4">
                                    <div class="col-8">
                                        <label for="inputState">Loại danh mục</label>
                                        <select id="inputCategory" class="form-control" style="font-size: 13px;">
                                            <?php $select = 'selected'; ?>
                                            @foreach ($arrayDanhMuc as $danhmuc)
                                                <option {{ $select }} value="{{ $danhmuc->id }}">
                                                    {{ $danhmuc->tenDanhMuc }}</option>
                                                <?php $select = ''; ?>
                                            @endforeach

                                        </select>
                                        <input type="text" name="danhmuc" id="danhmuc" value="{{ $arrayDanhMuc[0]->id }}">
                                        <script>
                                            var danhmuc = document.getElementById('inputCategory');
                                            var idDanhMuc = {{ $arrayDanhMuc[0]->id }};
                                            danhmuc.addEventListener('change', function() {
                                                idDanhMuc = this.value;

                                            })
                                        </script>
                                    </div>
                                    <div class="col-4">
                                        <label for="inputPassword4">Số lượng/Kg</label>
                                        <input type="number" class="form-control" id="inputsoluong" placeholder="03"
                                            style="font-size: 13px;">
                                    </div>
                                </div>

                                <div class="form-row mx-5 mt-2">
                                    <div class="col-8">
                                        <div class="form-group mt-4">
                                            <label for="">Nơi sản xuất</label>
                                            <input type="text" class="form-control" id="inputNoiSanXuat"
                                                placeholder="Title" style="font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mt-4">
                                            <label for="inputPassword4">Giá/Kg</label>
                                            <input type="number" class="form-control" id="inputGia"
                                                placeholder="Price          (VND)" style="font-size: 13px;">
                                        </div>

                                    </div>
                                </div>

                                <div class="CKEditor mx-5 mt-4">
                                    <textarea class="" name="editor1"></textarea>
                                    <script>
                                        CKEDITOR.replace('editor1');
                                    </script>
                                </div>


                                <div class="form-row mx-5 mt-4">
                                    <div class="col-8 d-flex justify-content-between">


                                    </div>
                                    <div class="col-4">
                                        <div class="form-group d-flex justify-content-end">
                                            <input type="file" name="arrayfile" id="arrayfile" hidden multiple />
                                            <input type="file" name="file" id="file" hidden multiple />
                                            <label class="label_input text-center px-3" value="1" id="btn_anhNongSan">&nbsp;
                                                Ảnh
                                                nông sản &nbsp; </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mx-5 mt-2">
                                    <button id="submit" type="button" class="btn btn-outline-success w-100">Lưu sản
                                        phẩm</button>
                                </div>

                            </form>




                        </div>

                    </div>
                    <div class="form-img-voucher">
                        <div class="titile-add-voucher-form text-left">
                            <h5 class="text-success pt-3 px-5"><b>ẢNH SẢN PHẨM</b></h5>
                        </div>

                        <!-- slide img voucher -->
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
                            style="background: #e0f0f7;">
                            <div class="carousel-inner">
                                <img src="../image/addVoucher/empty-img.PNG" alt="">

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true">
                                    <span class="iconify" data-icon="akar-icons:circle-chevron-left-fill"
                                        style="color: #216e38;  font-size: 30px;"></span>
                                </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true">
                                    <span class="iconify" data-icon="akar-icons:circle-chevron-right-fill"
                                        style="color: #216e38; font-size: 30px;"></span>
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="quantity-img-voucher d-flex justify-content-end">
                            <input class="text-center" type="text" name="" id="quantity-img-voucher" placeholder="4">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>




    <script>
        var at = "active";
        var inp = document.getElementById("file");
        var btn = document.getElementById("btn_anhNongSan");
        var divimg = document.getElementsByClassName("carousel-inner")[0];
        // function chonFile() {
        //     inp.click();
        //     console.log("1");
        // }

        btn.addEventListener("click", function() {
            inp.click();
        });


        inp.addEventListener("change", function() {
            var files = this.files[0];

            if (files) {
                var reader = new FileReader();
                reader.onload = function() {
                    var result = reader.result;

                    var div = document.createElement("div");
                    div.className = "carousel-item" + " " + at;


                    var image = document.createElement("img");

                    image.src = result;
                    // image.width = 400;
                    image.className = "d-block w-100";


                    div.append(image);
                    var div02 = document.createElement("div");
                    div02.className = "middle";
                    div02.innerHTML =
                        '<div class="text_middle d-flex"> <button class="bg-transparent border-0"> <span class="iconify" data-icon="whh:delete" style="color: #4e4e4e; font-size: 25px;"></span> </button> </div>';
                    div.append(div02);
                    divimg.append(div);

                    at = "";
                };
                reader.readAsDataURL(files);
            }
        });
    </script>



    <script>
        var ten = document.getElementById('inputEmail4');
        var danhmuc = document.getElementById('danhmuc');
        var inputsoluong = document.getElementById('inputsoluong');
        var inputNoiSanXuat = document.getElementById('inputNoiSanXuat');
        var inputGia = document.getElementById('inputGia');
        var noidungnongsan = document.getElementById('noidungnongsan');







        var submit = document.getElementById('submit');
        submit.addEventListener('click', function() {
            var imagefile = document.getElementById("file").files[0];
            var form = new FormData();
            form.append('_token', '{{ csrf_token() }}');
            form.append('ten', ten.value);
            form.append('danhmuc', idDanhMuc);
            form.append('soluong', inputsoluong.value);
            form.append('noisanxuat', inputNoiSanXuat.value);
            form.append('gia', inputGia.value);
            form.append('noidung', CKEDITOR.instances.editor1.getData());
            form.append('images', imagefile);
            $.ajax({
                method: 'post',
                url: "http://localhost/FreshFoodLaravel/public/admin/add-nong-san",
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
            }).fail(function(result) {
                console.log(result);
            })
        })
    </script>






    <script src="{{ asset('js/addVoucher.js') }}"></script>
@endsection
