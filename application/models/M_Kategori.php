<?php 
    class M_Kategori extends CI_Model{
        
        public function getData(){
            return $this->db->get('kategori')->result_array();
        }
    }
?>