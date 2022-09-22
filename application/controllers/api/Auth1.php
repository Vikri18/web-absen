<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Auth extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
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
}
