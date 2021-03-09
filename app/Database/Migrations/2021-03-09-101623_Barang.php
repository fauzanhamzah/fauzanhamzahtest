<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_barang' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'alias_barang' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'harga_barang' => [
				'type' => 'INT',
			],
			'harga_jual' => [
				'type' => 'INT',
			],
			'stok' => [
				'type' => 'INT',
			],
			'foto_barang'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('barangs');
	}

	public function down()
	{
		$this->forge->dropTable('barangs');
	}
}
