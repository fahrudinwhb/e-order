<?php 
    class M_meja extends CI_Model{
        
        public function getData($where = array()){
            $this->db->where($where);
            return $this->db->get('meja')->result_array();
        }
        public function inputData($data = array()){
            $this->db->insert('meja',$data);
        }
        public function delData($where = array()){
            $this->db->where($where);
            $this->db->delete('meja');
        }
        public function update($where = array(), $data = array()){
            $this->db->where($where);
            $this->db->update('meja',$data);
        }
    }
?>