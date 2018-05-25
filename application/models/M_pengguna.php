<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model{

    public function __construct(){
            parent::__construct();
    }
	public function insert($form = array()){
		$array_sql = array(
	            'ID_PENGGUNA'       => $form['ID_PENGGUNA'],
                'NAMA_PENGGUNA'     => $form['NAMA_PENGGUNA'],
                'PASSWORD'          => $form['PASSWORD'],
                'GAMBAR'            => $form['GAMBAR'],
                'STATUS'            => $form['STATUS'],
		);
		$this->db->insert('pengguna', $array_sql);
	}
    public function edit($form = array()){
        $array_sql = array(
	            'ID_PENGGUNA'       => $form['ID_PENGGUNA'],
                'NAMA_PENGGUNA'     => $form['NAMA_PENGGUNA'],
                'PASSWORD'          => $form['PASSWORD'],
                'GAMBAR'            => $form['GAMBAR'],
                'STATUS'            => $form['STATUS'],
		);
        $this->db->where('ID_PENGGUNA', $form['ID_PENGGUNA']);
		$this->db->update('pengguna', $array_sql);
	}

    public function getPengguna($nama_pengguna,$status){
        $this->db->select('*');
        $this->db->from('pengguna');
        if($nama_pengguna !== ""){
            if($nama_pengguna !== 'admin'){
                $this->db->join('kedai', 'pengguna.ID_PENGGUNA = kedai.ADMIN_KEDAI');
            }
            $this->db->where('NAMA_PENGGUNA',$nama_pengguna);
        }
        if($status !== ""){
            $this->db->where('STATUS',$status);
        }
		return $this->db->get()->result_array();
    }
    public function getPengguna2($id,$status){
        $this->db->select('*');
        $this->db->from('pengguna');
        if($id !== ""){
            $this->db->where('ID_PENGGUNA',$id);
        }
        if($status !== ""){
            $this->db->where('STATUS',$status);
        }
		return $this->db->get()->result_array();
    }
    public function deletePengguna($id){
        $this->db->where('ID_PENGGUNA',$id);
        $this->db->delete('pengguna');
    }
    public function loginPengguna($NAMA_PENGGUNA,$PASSWORD){
        $this->db->select('NAMA_PENGGUNA,PASSWORD');
        $this->db->where('NAMA_PENGGUNA', $NAMA_PENGGUNA);
        $this->db->where('PASSWORD', $PASSWORD);
        return $this->db->get('pengguna')->result_array();
    }
}
