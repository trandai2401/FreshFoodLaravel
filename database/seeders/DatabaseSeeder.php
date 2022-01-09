<?php

namespace Database\Seeders;

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

        // User::create([
        //     'tendangnhap' => 'admin',
        //     'name' => 'admin',
        //     'email' => 'admin',
        //     'google_id' => '',
        //     'id_role' => '1',
        //     'password' => bcrypt('12345')

        // ]);

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
    }
}
