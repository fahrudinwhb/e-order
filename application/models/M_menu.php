<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model{

    public function __construct(){
            parent::__construct();
    }
	public function insert($form = array()){
		$array_sql = array(
	            'ID_MENU'       => $form['ID_MENU'],
                'ID_KEDAI'      => $form['ID_KEDAI'],
                'BARU'          => $form['BARU'],
                'NAMA_MENU'     => $form['NAMA_MENU'],
                'DESKRIPSI_MENU'=> $form['DESKRIPSI_MENU'],
                'PROMO'         => $form['PROMO'],
                'HARGA_MENU'    => $form['HARGA_MENU'],
                'KATEGORI'      => $form['KATEGORI'],
                'GAMBAR'        => $form['GAMBAR'],
		);
		$this->db->insert('menu', $array_sql);
	}
    public function edit($form = array()){
        $array_sql = array(
	            'ID_MENU'       => $form['ID_MENU'],
                'ID_KEDAI'      => $form['ID_KEDAI'],
                'BARU'          => $form['BARU'],
                'NAMA_MENU'     => $form['NAMA_MENU'],
                'DESKRIPSI_MENU'=> $form['DESKRIPSI_MENU'],
                'PROMO'         => $form['PROMO'],
                'HARGA_MENU'    => $form['HARGA_MENU'],
                'KATEGORI'      => $form['KATEGORI'],
                'GAMBAR'        => $form['GAMBAR'],
		);
        $this->db->where('ID_MENU', $form['ID_MENU']);
		$this->db->update('menu', $array_sql);
	}
    public function get($where = array()){
        $this->db->where($where);
        return $this->db->get('menu')->result_array();
    }
    public function getMenu($id,$id_kedai){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('kategori', 'menu.kategori = kategori.ID_KATEGORI');
        if($id !== ""){
            $this->db->where('ID_MENU',$id);
        }
        if($id_kedai != ""){
            $this->db->where('ID_KEDAI',$id_kedai);
        }
		return $this->db->get()->result_array();
    }
    public function deleteMenu($id){
        $this->db->where('ID_MENU',$id);
        $this->db->delete('menu');
    }

    /*Ednan's Function*/
    public function getMenuSearch($where = array()){
        $this->db->like($where);
        return $this->db->get('menu')->result_array();
    }
}
