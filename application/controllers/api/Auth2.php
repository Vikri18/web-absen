<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class User extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function dashboard_get()
    {
        $id = $this->get('user_id');
        $data = $this->m_user->getDashboard_api($id);

        $hadir = 0;
        $alpha = 0;
        $izin = 0;


        $listAbsen = array();
        foreach ($data->result_array() as $items) {
            if ($items['type'] === 'hadir') {
                $hadir++;
            } else if ($items['type'] === 'izin') {
                $izin++;
            } else if ($items['type'] === 'alpha') {
                $alpha++;
            }

            $listAbsen[] = $items;
        }

        $rekap = array(
            'hadir' => $hadir,
            'izin' => $izin,
            'alpha' => $alpha
        );

        $konten = array(
            'rekap' => $rekap,
            'list_absen' => $listAbsen
        );
        
        if(empty($data->result_array())){
        $rekap = array(
            'hadir' => 0,
            'izin' => 0,
            'alpha' => 0
        );

        $konten = array(
            'rekap' => $rekap,
            'list_absen' => null
        );
        $this->response([
            'status' => 'success',
            'msg' => 'Successfully',
            'errors' => null,
            'status_code' => 200,
            'content' => $konten
        ], 200);
        } else {
        $this->response([
            'status' => 'success',
            'msg' => 'Successfully',
            'errors' => null,
            'status_code' => 200,
            'content' => $konten
        ], 200);
        }


    }

    public function subizin_post()
    {
        $id = $this->post('user_id');
        $type = $this->post('type');
        $ket = $this->post('keterangan');

        $data = array(
            'id_user' => $id,
            'hari' => date('D'),
            'type' => $type,
            'keterangan' => $ket
        );

        $izin = $this->m_user->submitIzin_api($data);
        if ($izin) {
            $this->response([
                'status' => 'success',
                'msg' => 'Submit successfully',
                'errors' => null,
                'status_code' => 200
            ], 200);
        }
    }

    public function listabsen_get()
    {
        $id = $this->get('user_id');
        $bulan = $this->get('bulan');
        $tahun = $this->get('tahun');
        $data = $this->m_user->getListabsen_api($id, $bulan . " " . $tahun);

        $hadir = 0;
        $alpha = 0;
        $izin = 0;

        $listAbsen = array();
        foreach ($data->result_array() as $items) {
            if ($items['type'] === 'hadir') {
                $hadir++;
            } else if ($items['type'] === 'izin') {
                $izin++;
            } else if ($items['type'] === 'alpha') {
                $alpha++;
            }

            $listAbsen[] = $items;
        }

        $rekap = array(
            'hadir' => $hadir,
            'izin' => $izin,
            'alpha' => $alpha
        );

        $konten = array(
            'rekap' => $rekap,
            'list_absen' => $listAbsen
        );

        // $this->response([
        //     'status' => 'success',
        //     'msg' => 'Successfully',
        //     'errors' => null,
        //     'status_code' => 200,
        //     'content' => $konten
        // ], 200);
        
    if(empty($data->result_array())){
                $rekap = array(
            'hadir' => 0,
            'izin' => 0,
            'alpha' => 0
        );

        $konten = array(
            'rekap' => $rekap,
            'list_absen' => null
        );
        $this->response([
            'status' => 'success',
            'msg' => 'Successfully',
            'errors' => null,
            'status_code' => 200,
            'content' => $konten
        ], 200);
        } else {
        $this->response([
            'status' => 'success',
            'msg' => 'Successfully',
            'errors' => null,
            'status_code' => 200,
            'content' => $konten
        ], 200);
        }
    }

    public function listMatkul_get()
    {
        $id = $this->get('user_id');
        $data = $this->m_user->getListmatkul_api($id);

        $listMatkul = array();
        foreach ($data->result_array() as $items) {
            $listMatkul[] = $items;
        }
        $konten = array(
            'list_matkul' => $listMatkul
        );
        
                if(empty($data->result_array())){
                     $konten = array(
            'list_matkul' => null
        );
        $this->response([
            'status' => 'success',
            'msg' => 'Successfully',
            'errors' => null,
            'status_code' => 200,
            'content' => $konten
        ], 200);
        } else {
        $this->response([
            'status' => 'success',
            'msg' => 'Successfully',
            'errors' => null,
            'status_code' => 200,
            'content' => $konten
        ], 200);
        }
        

        // $this->response([
        //     'status' => 'success',
        //     'msg' => 'Successfully',
        //     'errors' => null,
        //     'status_code' => 200,
        //     'content' => $konten
        // ], 200);
    }

    public function simpanMatkul_post()
    {

        $id = $this->post('user_id');
        $matkul = $this->post('matkul');
        $hari = $this->post('hari');
        $jam_mulai = $this->post('jam_mulai');
        $jam_selesai = $this->post('jam_selesai');
        $dosen = $this->post('dosen');

        $data = array(
            'id_user' => $id,
            'matkul' => $matkul,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'dosen' => $dosen
        );

        $matkul = $this->m_user->simpanMatkul_api($data);
        if ($matkul) {
            $this->response([
                'status' => 'success',
                'msg' => 'Submit successfully',
                'errors' => null,
                'status_code' => 200,
                'content' => null
            ], 200);
        }
    }

    public function deleteMatkul_post()
    {

        $id = $this->post('user_id');
        $idMatkul = $this->post('id');

        $Hpsmatkul = $this->m_user->deleteMatkul_api($id, $idMatkul);
        if ($Hpsmatkul) {
            $this->response([
                'status' => 'success',
                'msg' => 'Delete successfully',
                'errors' => null,
                'status_code' => 200,
                'content' => null
            ], 200);
        }
    }
}
