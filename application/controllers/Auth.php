<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => "Halaman Login"
        ];

        $this->load->view('login', $data);
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                if ($user['status'] === '0') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Tidak Active</div>');
                    redirect('auth');
                }

                $data = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'nama' => $user['nama'],
                    'role' => $user['role'],
                    'status' => 'login',
                    'masuk' => TRUE,
                ];

                $this->session->set_userdata($data);

                if ($user['role'] === '1') {
                    $this->session->set_userdata('akses', '1');
                    redirect('admin');
                } else  if ($user['role'] === '2') {
                    $this->session->set_userdata('akses', '2');
                    redirect('dosen');
                } else {
                    $this->session->set_userdata('akses', '3');
                    redirect('mahasiswa');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Tidak Ditemukan !</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('akses');
        $this->session->unset_userdata('masuk');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses Logout !</div>');
        redirect('auth');
    }
}
