<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login') {
			redirect('auth');
		}
		loggin();
		$this->load->model('m_user');
		$this->load->model('m_alat');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data = [
			'title' => "Dashboard",
			'nama' => $this->session->userdata('nama'),
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('mahasiswa/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function users()
	{
		$data = [
			'title' => "Dashboard",
			'nama' => $this->session->userdata('nama'),
			'data' => $this->db->get('users')->result_array()
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('mahasiswa/show', $data);
		$this->load->view('template/footer');
	}
	public function createuser()
	{
		$data = [
            'title' => "Tambah Data",
            'nama' => $this->session->userdata('nama')
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('mahasiswa/add', $data);
        $this->load->view('template/footer');
	}
	function storeuser(){
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$jurusan = $this->input->post('jurusan');
		$rfid = $this->input->post('rfid');
		$role = $this->input->post('role');

		$data = array(
			'email' => $email,
			'password'=> password_hash(($password), PASSWORD_DEFAULT),
			'nama' => $nama,
			'jurusan' => $jurusan,
			'rfid' => $rfid,
			'role' => $role,
			'status' => 1
			);
		$this->m_user->store_user($data,'users');
		$this->session->set_flashdata('message','
		<div class="alert alert-success col-md-4 col-md-offset-4" role="alert">
			Data berhasil ditambahkan!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('admin/users');
	}

	function edit($id){
		$data = [
            'title' => "Edit Data",
            'nama' => $this->session->userdata('nama')
        ];
		$where = array('id' => $id);
		$data['user'] = $this->m_user->edit_data($where,'users')->result();
		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
		$this->load->view('mahasiswa/edit',$data);
		$this->load->view('template/footer');
	}

	function updateuser(){
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$jurusan = $this->input->post('jurusan');
		$rfid = $this->input->post('rfid');
		$role = $this->input->post('role');
		
		if (!empty($password)) {

		$data = array(
			'email' => $email,
			'password'=> password_hash(($password), PASSWORD_DEFAULT),
			'nama' => $nama,
			'jurusan' => $jurusan,
			'rfid' => $rfid,
			'role' => $role,
			'status' => 1
		);
	}else{
		$data = array(
			'email' => $email,
			'nama' => $nama,
			'jurusan' => $jurusan,
			'rfid' => $rfid,
			'role' => $role,
			'status' => 1
		);
	}
		$where = array(
			'id' => $id
		);
	 
		$this->m_user->update_data($where,$data,'users');
		$this->session->set_flashdata('message','
		<div class="alert alert-success col-md-4 col-md-offset-4" role="alert">
			Data berhasil diupdate!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('admin/users');
	}

	function delete($id){
		$where = array('id' => $id);
		$this->m_user->delete_data($where,'users');
		$this->session->set_flashdata('message','
		<div class="alert alert-success col-md-4 col-md-offset-4" role="alert">
			Data berhasil dihapus!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('admin/users');
	}
	public function matakuliah()
	{
		$data = [
			'title' => "Mata Kuliah",
			'nama' => $this->session->userdata('nama'),
			'data' => $this->db->get('matkul')->result_array()
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/show', $data);
		$this->load->view('template/footer');
	}
	public function tambahmatkul()
	{
		$data = [
			'title' => "Mata Kuliah",
			'nama' => $this->session->userdata('nama'),
			'data' => $this->db->get('matkul')->result_array()
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/tambahmatkul', $data);
		$this->load->view('template/footer');
	}
	public function alat()
	{
		$data = [
			'data' => $this->db->get('alat')->result_array(),
			'title' => "Device",
			'nama' => $this->session->userdata('nama'),
			'profile' => $this->m_user->getProfile($this->session->userdata('id'))->result_array()
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/alat', $data);
		$this->load->view('template/footer');
	}

	public function editAlat()
	{
		$id = $this->input->post('editSupplier');
		$dataAlat = $this->m_alat->getDetailAlat($id);

		if ($dataAlat) {
			echo json_encode($dataAlat->result_array());
		}
	}

	public function submitUpdatealat()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('devicename'),
			'jam_masuk' => $this->input->post('jamMsk'),
			'jam_pulang' => $this->input->post('jamPlg'),
			'MAC' => $this->input->post('mac'),
		);

		$update = $this->m_alat->updateAlat($id, $data);
		if ($update) {
			echo true;
		}
	}
}
