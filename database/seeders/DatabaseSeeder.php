<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $layanan = [
            ['nama' => 'oli', 'kode' => '01', 'harga' => 30000, 'waktu' => '00:05:00'],
            ['nama' => 'filter udara', 'kode' => '01', 'harga' => 25000, 'waktu' => '00:10:00'],
            ['nama' => 'filter ac', 'kode' => '01', 'harga' => 25000, 'waktu' => '00:10:00'],
            ['nama' => 'busi', 'kode' => '01', 'harga' => 35000, 'waktu' => '00:15:00'],
            ['nama' => 'minyak rem', 'kode' => '01', 'harga' => 90000, 'waktu' => '00:15:00'],
            ['nama' => 'rem depan', 'kode' => '01', 'harga' => 120000, 'waktu' => '00:15:00'],
            ['nama' => 'rem belakang', 'kode' => '01', 'harga' => 75000, 'waktu' => '00:15:00'],
            ['nama' => 'service standard', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'ganti oli', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'ganti filter udara', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'ganti filter ac', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'ganti busi', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'ganti minyak rem', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'ganti rem depan', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
            ['nama' => 'ganti rem belakang', 'kode' => '02', 'harga' => 80000, 'waktu' => '00:15:00'],
        ];
        
        $user = [
            ['username' => 'admin', 'nama' => 'Service Advisor', 'role' => 'admin','password' => 'admin'],
            ['username' => 'foreman1', 'nama' => 'foreman1', 'role' => 'foreman','password' => 'foreman1'],
            ['username' => 'foreman2', 'nama' => 'foreman2', 'role' => 'foreman','password' => 'foreman2'],
            ['username' => 'kasir', 'nama' => 'kasir', 'role' => 'kasir','password' => 'kasir'],
        ];

        $teknisi = [
            ['nama_teknisi' => 'Teknisi A1', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A2', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A3', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A4', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi A5', 'status' => 'available', 'foreman_id' => '2'],
            ['nama_teknisi' => 'Teknisi B1', 'status' => 'available', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B2', 'status' => 'available', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B3', 'status' => 'available', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B4', 'status' => 'available', 'foreman_id' => '3'],
            ['nama_teknisi' => 'Teknisi B5', 'status' => 'available', 'foreman_id' => '3'],
        ];
        

        DB::table('db_layanan')->insert($layanan);
        DB::table('db_users')->insert($user);
        DB::table('db_teknisi')->insert($teknisi);
    }
}
