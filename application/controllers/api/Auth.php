<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Auth extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function login_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $data = [
                    'user_id' => $user['id'],
                    'email' => $user['email'],
                    'name' => $user['nama'],
                    'jurusan' => $user['jurusan'],
                ];

                $this->response([
                    'status' => 'success',
                    'msg' => 'Successfully',
                    'errors' => null,
                    'status_code' => 200,
                    'content' => $data
                ], 200);
            } else {
                $this->response([
                    'status' => 'success',
                    'msg' => 'Username Or Password Wrong !!!',
                    'errors' => true,
                    'status_code' => 202,
                    'content' => null
                ], 202);
            }
        } else {
            $this->response([
                'status' => 'success',
                'msg' => 'Username not Found',
                'errors' => true,
                'status_code' => 202,
                'content' => null
            ], 202);
        }
    }

    public function signin_post()
    {

        $email = $this->post('email');
        $password = $this->post('password');
        $nama = $this->post('nama');
        $jurusan = $this->post('jurusan');
        $rfid = $this->post('rfid');
        $role = $this->post('role');

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $data = array(
            'email' => $email,
            'password' => $passwordHash,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'rfid' => $rfid,
            'role' => $role,
            'status' => '1'
        );

        $signin = $this->m_user->signin_api($data);
        if ($signin) {
            $this->response([
                'status' => 'success',
                'msg' => 'User Success Create',
                'errors' => null,
                'status_code' => 200
            ], 200);
        }
    }
}
