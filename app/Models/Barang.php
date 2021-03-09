<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'barangs';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'nama_barang',
		'alias_barang',
		'foto_barang',
		'harga_barang',
		'harga_jual',
		'stok'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	public function getBarang($alias_barang = false)
	{
		if ($alias_barang == false) {
			return $this->findAll();
		}

		return $this->where(['alias_barang' => $alias_barang])->first();
	}
}
