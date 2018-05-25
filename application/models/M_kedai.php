<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kedai extends CI_Model{

    public function __construct(){
            parent::__construct();
    }
	public function insert($form = array()){
		$array_sql = array(
	            'ID_KEDAI'      => $form['ID_KEDAI'],
                'ADMIN_KEDAI'  => $form['ADMIN_KEDAI'],
                'NAMA_KEDAI'     => $form['NAMA_KEDAI'],
                'LOGO_KEDAI'  => $form['LOGO_KEDAI'],
		);
		$this->db->insert('kedai', $array_sql);
	}
    public function edit($form = array()){
		$array_sql = array(
            'ID_KEDAI'      => $form['ID_KEDAI'],
            'ADMIN_KEDAI'  => $form['ADMIN_KEDAI'],
            'NAMA_KEDAI'     => $form['NAMA_KEDAI'],
            'LOGO_KEDAI'  => $form['LOGO_KEDAI'],
		);
        $this->db->where('ID_KEDAI', $form['ID_KEDAI']);
		$this->db->update('kedai', $array_sql);
	}

    public function getKedai($id){
        $this->db->select('*');
        $this->db->from('kedai');
        if($id !== ""){
            $this->db->where('ID_KEDAI',$id);
        }
		return $this->db->get()->result_array();
    }
    public function deleteKedai($id){
        $this->db->where('ID_KEDAI',$id);
        $this->db->delete('kedai');
    }
    
    /*Ednan's function*/
    public function getDataKedai($where = array()){
        $this->db->where($where);
		return $this->db->get('kedai')->result_array();
    }
}
