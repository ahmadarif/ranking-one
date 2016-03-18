<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Model {

	public function getCountMahasiswa()
	{
		return $this->db->count_all_results('mahasiswa', FALSE);
	}

	public function getMahasiswa($page, $size)
	{
		return $this->db->get('mahasiswa', $size, $page);
	}

	public function insertMahasiswa($dataMahasiswa)
	{
		$val = array(
			'nim' => $dataMahasiswa['nim'],
			'nama' => $dataMahasiswa['nama'],
			'kelas' => $dataMahasiswa['kelas'],
			'tanggalLahir' => $dataMahasiswa['tanggalLahir']
			);
		$this->db->insert('mahasiswa', $val);
	}

	public function updateMahasiswa($dataMahasiswa, $nim)
	{
		$val = array(
			'nama' => $dataMahasiswa['nama'],
			'kelas' => $dataMahasiswa['kelas'],
			'tanggalLahir' => $dataMahasiswa['tanggalLahir']
			);
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa', $val);
	}

	public function deleteMahasiswa($nim)
	{
		$val = array(
			'nim' => $nim
			);
		$this->db->delete('mahasiswa', $val);
	}
	
}

/* End of file Mahasiswa.php */
/* Location: ./application/models/Mahasiswa.php */