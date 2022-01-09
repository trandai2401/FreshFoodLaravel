<?php

namespace Database\Seeders;

use App\Models\danhmuc;
use App\Models\role;
use App\Models\trangthai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $role = new role();
        $role->ten = "Quản trị viên";
        $role->code = "ADMIN";
        $role->save();



        $role = new role();
        $role->ten = "Người dùng";
        $role->code = "USER";
        $role->save();



        $role = new role();
        $role->ten = "Nhân viên";
        $role->code = "STAFF";
        $role->save();



        $role = new role();
        $role->ten = "Quản lý";
        $role->code = "MANAGER";
        $role->save();





        User::create([
            'tendangnhap' => 'admin',
            'name' => 'admin',
            'email' => 'admin',
            'google_id' => '',
            'id_role' => '1',
            'password' => bcrypt('12345')

        ]);


        $trangThaiDonHang = new trangthai();
        $trangThaiDonHang->tentrangthai = "Chưa xác nhận";
        $trangThaiDonHang->save();

        $trangThaiDonHang = new trangthai();
        $trangThaiDonHang->tentrangthai = "Đã xác nhận";
        $trangThaiDonHang->save();

        $trangThaiDonHang = new trangthai();
        $trangThaiDonHang->tentrangthai = "Đang chuẩn bị";
        $trangThaiDonHang->save();

        $trangThaiDonHang = new trangthai();
        $trangThaiDonHang->tentrangthai = "Đang giao hàng";
        $trangThaiDonHang->save();

        $trangThaiDonHang = new trangthai();
        $trangThaiDonHang->tentrangthai = "Đã giao hàng";
        $trangThaiDonHang->save();


        $danhMuc  = new danhmuc();
        $danhMuc->tenDanhMuc = "Trái cây";
        $danhMuc->src = "img/danhmuc/traicay.png";
        $danhMuc->src_icon = '"<span class="iconify ml-2 mr-5" data-icon="fluent:food-apple-20-filled" style="font-size: 25px;"></span>"';
        $danhMuc->save();

        $danhMuc  = new danhmuc();
        $danhMuc->tenDanhMuc = "Vật phẩm khô";
        $danhMuc->src = "img/danhmuc/thucphamkho.png";
        $danhMuc->src_icon = '<span class="iconify ml-2 mr-5" data-icon="whh:coffeebean"  style="font-size: 23px;"></span>';
        $danhMuc->save();



        $danhMuc  = new danhmuc();
        $danhMuc->tenDanhMuc = "Rau củ";
        $danhMuc->src = "img/danhmuc/cuqua.png";
        $danhMuc->src_icon = '<span class="iconify ml-2 mr-5" data-icon="dashicons:carrot" style="font-size: 25px;"></span>';
        $danhMuc->save();



        $danhMuc  = new danhmuc();
        $danhMuc->tenDanhMuc = "Thịt tươi";
        $danhMuc->src = "img/danhmuc/thittuoi.png";
        $danhMuc->src_icon = '<span class=\"iconify ml-2 mr-5\" data-icon=\"emojione-monotone:meat-on-bone\" style=\"font-size: 25px;\"></span>';
        $danhMuc->save();

        $danhMuc  = new danhmuc();
        $danhMuc->tenDanhMuc = "Hải sản";
        $danhMuc->src = "img/danhmuc/haisan.png";
        $danhMuc->src_icon = '<span class=\"iconify ml-2 mr-5\" data-icon=\"ph:fish-fill\" style=\"font-size: 27px;\"></span>';
        $danhMuc->save();
    }
}
