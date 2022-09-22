<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
        $this->load->model('m_user');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'title' => "Dashboard Mahasiswa",
            'nama' => $this->session->userdata('nama'),
            'data' => $this->db->get('users')->result_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('template/footer');
    }

    public function profile()
    {
        $data = [
            'title' => "Profile Mahasiswa",
            'nama' => $this->session->userdata('nama'),
            'profile' => $this->m_user->getProfile($this->session->userdata('id'))->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('mahasiswa/profile', $data);
        $this->load->view('template/footer');
    }
    public function add()
    {
        $data = [
            'title' => "Dashboard Mahasiswa",
            'nama' => $this->session->userdata('nama')
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('mahasiswa/add', $data);
        $this->load->view('template/footer');
    }
    public function updateprofile()
    {
        $password = $this->input->post('profileEmail');
        if (!empty($password)) 
        {
            $data = array(
                'nama' => $this->input->post('profileNama'),
                'jurusan' => $this->input->post('profileJurusan'),
                'email' => $this->input->post('profileEmail'),
                'password' => password_hash($password, PASSWORD_DEFAULT),
            );
        }else
        {
            $data = array(
                'nama' => $this->input->post('profileNama'),
                'jurusan' => $this->input->post('profileJurusan'),
                'email' => $this->input->post('profileEmail'),
            );
        }
        if ($this->m_user->updateProfiles($this->input->post('profileID'), $data)) {
            $this->session->set_flashdata('message','
            <div class="alert alert-success col-md-4 col-md-offset-4" role="alert">
                Profile berhasil diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('mahasiswa/profile');
        }
    }
}