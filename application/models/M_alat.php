<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_alat extends CI_Model
{

    public function getUserid($rfid)
    {
        $this->db->select('id');
        $this->db->where('rfid', $rfid);
        return $this->db->get('users');
    }

    public function submitAbsen_api($data)
    {
        if ($this->db->insert('absen', $data)) {
            return true;
        }
    }

    public function getAlatlastid()
    {
        $this->db->select('id_terakhir');
        return $this->db->get('alat');
    }

    public function updateIdterakhir($id)
    {
        $this->db->set('id_terakhir', $id);
        $this->db->where('id', 1);
        $this->db->update('alat');
    }

    public function getJamAbsen()
    {
        $this->db->select('jam_masuk, jam_pulang');
        return $this->db->get('alat');
    }

    public function setLogmasukpintu($id)
    {
        $data = array(
            'id_user' => $id,
            'jam_buka_pintu' => date('d-m-y G:i:s'),
        );

        if ($this->db->insert('logbukapintu', $data)) {
            return true;
        }
    }

    public function getDetailAlat($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('alat');
    }

    public function updateAlat($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('alat', $data);
    }
}