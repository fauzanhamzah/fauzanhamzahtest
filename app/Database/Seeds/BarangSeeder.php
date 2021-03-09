<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BarangSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'foto_barang' => 'barang3-min.jpg',
			'nama_barang' => 'Keyboard Mechanical k3',
			'alias_barang' => 'keyboard-mechanical-k3',
			'harga_barang' => '800000',
			'harga_jual' => '850000',
			'stok' => '25',
			'created_at' => Time::now(),
			'updated_at' => Time::now()
		];
		//using query builder
		$this->db->table('barangs')->insert($data);
	}
}
