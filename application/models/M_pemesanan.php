<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model{

    public function __construct(){
            parent::__construct();
    }
	public function insert($array_sql){
		$this->db->insert('pemesanan', $array_sql);
	}
    public function get($id_kedai){

        $this->db->select('A.NAMA_MENU,A.GAMBAR,B.ID_PEMESANAN,B.JUMLAH_MENU_PESANAN,B.JUMLAH_HARGA_PESANAN');
        $this->db->from('menu as A');
        $this->db->join('pemesanan_has_menu as B','A.ID_MENU = B.ID_MENU');
        $this->db->where('A.ID_KEDAI',$id_kedai);
        $menu_pesanan = $this->db->get()->result_array();

        $id_pesanan = array();
        foreach($menu_pesanan as $data){
            $id_pesanan[] = $data['ID_PEMESANAN'];
        }
        $id_pesanan = array_unique($id_pesanan);

        $detail_pesanan_punya_kedai = array();
        foreach($id_pesanan as $data){
            $detail_pesanan_punya_kedai[] = $this->total_pemesanan($data);
        }
        $data = array();
        $data['menu_pesanan'] = $menu_pesanan;
        $data['pesanan'] = $detail_pesanan_punya_kedai;
        return $data;

    }

    //get data dari tabel pemesanan berdasarkan pemesanan
    private function total_pemesanan($ID_PEMESANAN){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('meja','pemesanan.ID_MEJA = meja.ID_MEJA');
        $this->db->where('ID_PEMESANAN',$ID_PEMESANAN);
        return $this->db->get()->row_array();
    }
    public function jumlah_meja_pesanan(){
        $this->db->distinct();
        // $this->db->select('ID_MEJA');
        // $this->db->from('pemesanan');
        $this->db->select('A.ID_MEJA,B.NOMOR_MEJA,A.ID_PEMESANAN,A.STATUS_PEMESANAN');
        $this->db->from('pemesanan as A');
        $this->db->join('meja as B', 'A.ID_MEJA = B.ID_MEJA');
        return $this->db->get()->result_array();
    }
    public function delete($id){
        $this->db->where('ID_MENU',$id);
        $this->db->delete('pemesanan');
    }
    public function updateStatus($id_pesanan,$status){
        $this->db->set('STATUS_PEMESANAN', $status);
        $this->db->where('ID_PEMESANAN', $id_pesanan);
		$this->db->update('pemesanan');
    }
    public function get_pemesanan_terakhir(){
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->order_by('WAKTU_PEMESANAN', 'DESC');
        return $this->db->get()->row_array();
    }
    /*Ednan's Function*/
    public function getData($where = array()){
        $this->db->where($where);
        return $this->db->get('pemesanan')->result_array();
    }
    public function insertA($array_sql){
		$this->db->insert('pemesanan', $array_sql);
        return $this->db->insert_id();
	}
    public function update($where = array(), $data = array()){
        $this->db->where($where);
        $this->db->update('pemesanan',$data);
    }
}
