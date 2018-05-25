<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_ulasan extends CI_Model{

    public function __construct(){
            parent::__construct();
    }
	public function insert($array_sql){
		$this->db->insert('ulasan', $array_sql);
	}
    public function get($id){
        $this->db->select('*');
        $this->db->from('ulasan');
        $this->db->where('ID_KEDAI',$id);
        return $this->db->get()->result_array();
    }
    public function delete($id){
        $this->db->where('ID_MENU',$id);
        $this->db->delete('menu');
    }

}
