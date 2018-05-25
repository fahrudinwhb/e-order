<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan_has_menu extends CI_Model{

    public function __construct(){
            parent::__construct();
    }
	public function insert($array_sql){
		$this->db->insert('pemesanan_has_menu', $array_sql);
	}
    public function delete($id){
        $this->db->where('ID_PEMESANAN',$id);
        $this->db->delete('pemesanan_has_menu');
    }
    public function get($where = array()){
        $this->db->select("*");
        $this->db->where($where);
        return $this->db->get('pemesanan_has_menu')->result_array();
    }
    public function insertA($array_sql){
		$this->db->insert('pemesanan_has_menu', $array_sql);
        return $this->db->insert_id();
	}
    public function sum_pemesanan($id_pememesanan){
        $this->db->select_sum('JUMLAH_HARGA_PESANAN');
        $this->db->select_sum('JUMLAH_MENU_PESANAN');
        $this->db->from('pemesanan_has_menu');
        $this->db->where('ID_PEMESANAN',$id_pememesanan);
        return $this->db->get('')->row_array();
    }
    public function update($where = array(), $data = array()){
        $this->db->where($where);
        $this->db->update('pemesanan_has_menu',$data);
    }
    public function join_all($id_pemesanan){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('pemesanan_has_menu','pemesanan.id_pemesanan = pemesanan_has_menu.id_pemesanan');
        $this->db->join('menu','pemesanan_has_menu.id_menu = menu.id_menu');
        $this->db->where('pemesanan.id_pemesanan',$id_pemesanan);
        return $this->db->get()->result_array();
    }
}
