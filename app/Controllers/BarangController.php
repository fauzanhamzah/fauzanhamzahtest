<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;

class BarangController extends BaseController
{
	protected $barangModel;

	public function __construct()
	{
		$this->barangModel = new Barang();
	}

	public function index()
	{

		$data = [
			'title' => 'Barang',
			'header' => 'Data Barang',
			'barangs' => $this->barangModel->getBarang()
		];

		return view('barangs/index', $data);
	}

	public function detail($alias_barang)
	{

		$data = [
			'title' => 'Detail Barang',
			'header' => 'Detail Barang',
			'barang' => $this->barangModel->getBarang($alias_barang)
		];

		//jika barang tidak ada
		if (empty($data['barang'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang Tidak Ada!');
		}

		return view('barangs/detail', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Form Tambah Barang',
			'header' => 'Form Tambah Barang',
			'validation' => \Config\Services::validation()
		];

		return view('barangs/create', $data);
	}

	public function save()
	{

		//validasi Input
		if (!$this->validate([
			'nama_barang' => [
				'rules' => 'required|is_unique[barangs.nama_barang]',
				'errors' => [
					'required' => 'Nama Barang Tidak Boleh Kosong!',
					'is_unique' => 'Barang Sudah Ada, Silahakan Masukan Barang Yang Lain!'
				]
			],
			'harga_barang' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'Harga Barang Tidak Boleh Kosong',
					'numeric' => 'Harga Barang Hanya Dapat Diisi Dengan Number'
				]
			],
			'harga_jual' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'Harga Jual Tidak Boleh Kosong',
					'numeric' => 'Harga Jual Hanya Dapat Diisi Dengan Number'
				]
			],
			'stok' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'Stok Tidak Boleh Kosong',
					'numeric' => 'Stok Hanya Dapat Diisi Dengan Number'
				]
			],
			'foto_barang' => [
				'rules' => 'max_size[foto_barang,100]|is_image[foto_barang]|mime_in[foto_barang,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran Anda Terlalu Besar, Harus Kurang Dari 100KB',
					'is_image' => 'File Yang Anda Upload Tidak Cocok',
					'mime_in' => 'Hanya File JPG dan PNG Yang DIperbolehkan'
				]
			]
		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/barang/create')->withInput()->with('validation', $validation);
			return redirect()->to('/barang/create')->withInput();
		}

		//ambil gambar
		$fileFoto = $this->request->getFile('foto_barang');

		//cek file upload
		if ($fileFoto->getError() == 4) {
			$nama_foto_barang = 'default_image.png';
		} else {
			//generate random name
			$nama_foto_barang = $fileFoto->getRandomName();
			//pindahkan file ke foder img
			$fileFoto->move('img', $nama_foto_barang);
		}



		$alias_barang = url_title($this->request->getVar('nama_barang'), '-', true);

		$this->barangModel->save([
			'nama_barang' => $this->request->getVar('nama_barang'),
			'alias_barang' => $alias_barang,
			'harga_barang' => $this->request->getVar('harga_barang'),
			'harga_jual' => $this->request->getVar('harga_jual'),
			'stok' => $this->request->getVar('stok'),
			'foto_barang' => $nama_foto_barang
		]);

		session()->setFlashdata('pesan', 'Barang Berhasil Ditambahkan!');
		return redirect()->to('/barang');
	}

	public function delete($id)
	{
		//cari gambar berdasarkan id
		$barang = $this->barangModel->find($id);

		//cek gambar default
		if ($barang['foto_barang'] != 'default_image.png') {

			//hapus gambar
			unlink('img/' . $barang['foto_barang']);
		}
		$this->barangModel->delete($id);

		session()->setFlashdata('pesan', 'Barang Berhasil Dihapus!');
		return redirect()->to('/barang');
	}

	public function edit($alias_barang)
	{

		$data = [
			'title' => 'Form Update Barang',
			'header' => 'Form Update Barang',
			'barang' => $this->barangModel->getBarang($alias_barang),
			'validation' => \Config\Services::validation()
		];

		return view('barangs/edit', $data);
	}

	public function update($id)
	{
		//cek nama Barang
		$barangLama = $this->barangModel->getBarang($this->request->getVar('alias_barang'));
		if ($barangLama['nama_barang'] == $this->request->getVar('nama_barang')) {
			$rule_nama_barang = 'required';
		} else {
			$rule_nama_barang = 'required|is_unique[barangs.nama_barang]';
		}

		//validasi Input
		if (!$this->validate([
			'nama_barang' => [
				'rules' => $rule_nama_barang,
				'errors' => [
					'required' => 'Nama Barang Tidak Boleh Kosong!',
					'is_unique' => 'Barang Sudah Ada, Silahakan Masukan Barang Yang Lain!'
				]
			],
			'harga_barang' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'Harga Barang Tidak Boleh Kosong',
					'numeric' => 'Harga Barang Hanya Dapat Diisi Dengan Number'
				]
			],
			'harga_jual' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'Harga Jual Tidak Boleh Kosong',
					'numeric' => 'Harga Jual Hanya Dapat Diisi Dengan Number'
				]
			],
			'stok' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'Stok Tidak Boleh Kosong',
					'numeric' => 'Stok Hanya Dapat Diisi Dengan Number'
				]
			],
			'foto_barang' => [
				'rules' => 'max_size[foto_barang,100]|is_image[foto_barang]|mime_in[foto_barang,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran Anda Terlalu Besar, Harus Kurang Dari 100KB',
					'is_image' => 'File Yang Anda Upload Tidak Cocok',
					'mime_in' => 'Hanya File JPG dan PNG Yang DIperbolehkan'
				]
			]
		])) {

			return redirect()->to('/barang/edit/' . $this->request->getVar('alias_barang'))->withInput();
		}

		$filefotoBarang = $this->request->getFile('foto_barang');

		//cek gambar apakah gambar lama
		if ($filefotoBarang->getError() == 4) {
			$namaBarang = $this->request->getVar('foto_barangLama');
		} else {
			//generate nama file random
			$namaBarang = $filefotoBarang->getRandomName();

			//pindahkan foto
			$filefotoBarang->move('img', $namaBarang);
			//hapus foto lama
			unlink('img/' . $this->request->getVar('foto_barangLama'));
		}


		$alias_barang = url_title($this->request->getVar('nama_barang'), '-', true);

		$this->barangModel->save([
			'id' => $id,
			'nama_barang' => $this->request->getVar('nama_barang'),
			'alias_barang' => $alias_barang,
			'harga_barang' => $this->request->getVar('harga_barang'),
			'harga_jual' => $this->request->getVar('harga_jual'),
			'stok' => $this->request->getVar('stok'),
			'foto_barang' => $namaBarang
		]);

		session()->setFlashdata('pesan', 'Barang Berhasil Diupdate!');
		return redirect()->to('/barang');
	}
}
