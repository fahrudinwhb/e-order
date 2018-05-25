<?php 
    class C_Kedai extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->model('M_kedai');
            $this->load->model('M_Kategori');
            $this->load->model('M_menu');
        }
        
        public function index($Nama = ''){
            $str = str_replace('%20',' ',$Nama);
            $data['data'] = $this->M_kedai->getDataKedai();
            $kedai = $this->M_kedai->getDataKedai(array('NAMA_KEDAI' => $str));
            $data['kedai'] = $kedai;
            $data['kategori'] = $this->M_Kategori->getData();
            $data['menu'] = $this->M_menu->getMenu("",$kedai[0]['ID_KEDAI']);
            $this->load->view('V_Kedai', $data);
        }
    }
?>