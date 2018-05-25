<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model{

    public function __construct(){
            parent::__construct();
    }
	public function insert($form = array()){
		$array_sql = array(
                'gambar'          => $form['gambar'],
                'keterangan'  => $form['keterangan'],
                'urutan'          => $form['urutan'],
                'hapus'        => $form['hapus'],
		);
		$this->db->insert('gallery', $array_sql);
	}
    public function updateUrutan($form = array()){
        $this->db->set('urutan',$form['urutan']);
        $this->db->where('id',$form['id']);
        $this->db->update('gallery');
    }

    public function getgallery($id,$hapus){
        $this->db->select('*');
        $this->db->from('gallery');
        if($id != ""){
            $this->db->where('id', $id);
        }
        if($hapus != ""){
            $this->db->where('hapus', $hapus);
        }
        $this->db->order_by('urutan', 'ASC');
		return $this->db->get()->result_array();
    }

    public function getUrutan(){
        $this->db->select('urutan');
        $this->db->from('gallery');
        $this->db->order_by('urutan', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function deletegallery($id){
        $this->db->set('hapus',1);
        $this->db->set('urutan',null);
        $this->db->where('id',$id);
        $this->db->update('gallery');
    }

}
