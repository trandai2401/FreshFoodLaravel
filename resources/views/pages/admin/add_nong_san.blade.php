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
                                    <label for="inputState">Danh mục</label>
                                    <select id="inputService" class="form-control" style="font-size: 13px;">
                                        <option selected>Service...</option>
                                        <option>Service 01</option>
                                        <option>Service 02</option>
                                        <option>Service 03</option>
                                        <option>Service 04</option>
                                        <option>Service 05</option>

                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="inputPassword4">Số lượng/Kg</label>
                                    <input type="number" class="form-control" id="inputPassword4" placeholder="03"
                                        style="font-size: 13px;">
                                </div>
                            </div>

                            <div class="form-row mx-5 mt-2">
                                <div class="col-8">
                                    <div class="form-group mt-4">
                                        <label for="">Nơi sản xuất</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Title"
                                            style="font-size: 13px;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mt-4">
                                        <label for="inputPassword4">Giá/Kg</label>
                                        <input type="number" class="form-control" id="inputPassword4"
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

                                <div class="col-4">
                                    <div class="form-group d-flex justify-content-end">
                                        <input type="file" name="file" id="file" hidden />
                                        <label class="label_input text-center px-3" id="btn_anhNongSan">&nbsp; Ảnh
                                            nông sản &nbsp; </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row mx-5 mt-2" style="margin-bottom: 30px">
                                <button type="submit" class="btn btn-outline-success w-100">Lưu sản phẩm</button>
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
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true">
                                <span class="iconify" data-icon="akar-icons:circle-chevron-left-fill"
                                    style="color: #216e38;  font-size: 30px;"></span>
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
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
        </div>

    </div>

@endsection
