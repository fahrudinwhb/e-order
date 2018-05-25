<?php 
    class C_Search extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->Model('M_menu');
            $this->load->model('M_kedai');
        }
        
        public function index(){
            $Keyword = $this->input->post('key');
            $data['menu'] = $this->M_menu->getMenuSearch(array('NAMA_MENU' => $Keyword));
            $data['data'] = $this->M_kedai->getDataKedai();
            $data['kedai'] = $this->M_kedai->getDataKedai();
            $this->load->view('V_Search',$data);
        }
    }
?>