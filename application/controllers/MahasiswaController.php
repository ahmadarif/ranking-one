<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaController extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Mahasiswa');
	}
	
	public function index()
	{
		echo "ini index";
	}
	
	public function test()
	{
		echo "TEST AJA";
	}

	public function getMahasiswa($page, $size)
	{

		// $response = array(
		// 	'content' => $this->Mahasiswa->getMahasiswa(($page - 1) * $size, $size)->result(),
		// 	'totalPages' => ceil($this->Mahasiswa->getCountMahasiswa() / $size)
		// 	);

		$response = new StdClass();
		$response->content = $this->Mahasiswa->getMahasiswa(($page - 1) * $size, $size)->result();
		$response->totalPages = ceil($this->Mahasiswa->getCountMahasiswa() / $size);


		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();

		exit;
	}

	public function saveMahasiswa()
	{
		echo "TES";
		exit;
		
		// via x-www-form-urlencode
		$data['nim'] = $this->input->post('nim');
		$data['nama'] = $this->input->post('nama');
		$data['kelas'] = $this->input->post('kelas');
		$data['tanggalLahir'] = $this->input->post('tanggalLahir');
		
		$this->output
		->set_status_header(201)
		->set_content_type('application/json')
		->set_output(json_encode($data))
		->_display();

		exit;


		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Mahasiswa->insertMahasiswa($data);

		// $response = array(
		// 	'Success' => true,
		// 	'Info' => 'Data Tersimpan'
		// 	);

		$response = new StdClass();
		$response->Success = true;
		$response->Info = 'Data Tersimpan';

		$this->output
		->set_status_header(201)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();

		exit;
	}

	public function updateMahasiswa($nim)
	{
		// via x-www-form-urlencode
		$data['nim'] = $nim;
		$data['nama'] = $this->input->input_stream('nama');
		$data['kelas'] = $this->input->input_stream('kelas');
		$data['tanggalLahir'] = $this->input->input_stream('tanggalLahir');
		
		$this->output
		->set_status_header(201)
		->set_content_type('application/json')
		->set_output(json_encode($data))
		->_display();

		exit;

		$data = (array)json_decode(file_get_contents('php://input'));
		$this->Mahasiswa->updateMahasiswa($data, $nim);

		// $response = array(
		// 	'Success' => true,
		// 	'Info' => 'Data Berhasil di update'
		// 	);

		$response = new StdClass();
		$response->Success = true;
		$response->Info = 'Data Berhasil diupdate';

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();

		exit;
	}

	public function deleteMahasiswa($nim)
	{
		$this->Mahasiswa->deleteMahasiswa($nim);

		// $response = array(
		// 	'Success' => true,
		// 	'Info' => 'Data Berhasil di hapus');

		$response = new StdClass();
		$response->Success = true;
		$response->Info = 'Data Berhasil dihapus';

		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();

		exit;
	}

}

/* End of file MahasiswaController.php */
/* Location: ./application/controllers/MahasiswaController.php */