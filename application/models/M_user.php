<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    private $tableAbsen = 'absen';

    public function getDashboard_api($id)
    {
        return $this->db->query("SELECT id, hari, DATE_FORMAT(tanggal, '%d %M %Y') as tanggal,  DATE_FORMAT(tanggal, '%H:%i') AS jam, type, keterangan
                                 FROM absen WHERE id_user = '$id'");
    }

    public function submitIzin_api($data)
    {
        if ($this->db->insert('absen', $data)) {
            return true;
        }
    }

    public function getListabsen_api($id, $tgl)
    {
        return $this->db->query("SELECT id, hari,DATE_FORMAT(tanggal, '%d %M %Y') as tanggal, DATE_FORMAT(tanggal, '%H:%i') AS jam, type, keterangan FROM absen 
                                    WHERE id_user = '$id' AND  DATE_FORMAT(tanggal,'%m %Y')='$tgl'");
    }

    public function simpanMatkul_api($data)
    {
        if ($this->db->insert('matkul', $data)) {
            return true;
        }
    }

    public function getListmatkul_api($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('matkul');
    }

    public function deleteMatkul_api($id, $idMatkul)
    {
        return $this->db->query("DELETE FROM matkul WHERE id = '$idMatkul' AND id_user ='$id'");
    }
    
    public function getProfile($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users');
    }

    public function updateProfiles($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    function store_user($data,$table){
		$this->db->insert($table,$data);
	}
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }

    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}