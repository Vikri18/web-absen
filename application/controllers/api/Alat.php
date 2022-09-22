<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Alat extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_alat');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function daftarUser_post()
    {
        $id = $this->m_alat->getAlatlastid()->result_array();
        $id = $id[0]['id_terakhir'];

        echo $id; // jangan di hapus
        $this->m_alat->updateIdterakhir($id + 1);
    }

    public function inputAbsen_post()
    {
        $rfid = $this->post('id');
        $id = $this->m_alat->getUserid($rfid)->result_array();
        $jam = $this->m_alat->getJamAbsen()->result_array();
        $keterangan = "";

        if (empty($id)) {
            $this->response([
                'status' => 'success',
                'msg' => 'No user found',
                'errors' => 1,
                'status_code' => 202
            ], 200);
        } else {
            $idUser = $id[0]['id'];
            $this->m_alat->setLogmasukpintu($idUser);

            if ((int)substr($jam[0]['jam_masuk'], 0, 2) <= (int)(date('G')) && ((int)date('i') <= substr((int)$jam[0]['jam_masuk'], 3, 2) + 5)) {
                $keterangan = "hadir";
            } else if ((int)date('G') >= substr((int)$jam[0]['jam_pulang'], 0, 2)) {
                $keterangan = "pulang";
            } else {
                $keterangan = "telat";
            }
        }

        $data = array(
            'id_user' =>  $idUser,
            'hari' => date('D'),
            'type' => $keterangan,
            'keterangan' => ''
        );

        $absen = $this->m_alat->submitAbsen_api($data);
        if ($absen) {
            $this->response([
                'status' => 'success',
                'msg' => 'Submit successfully',
                'errors' => null,
                'status_code' => 200
            ], 200);
        }
    }

}
