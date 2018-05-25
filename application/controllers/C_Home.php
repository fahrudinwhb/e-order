<?php 
    class C_Home extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->model('M_kedai');
            $this->load->model('M_menu');
        }
        
        public function index(){
            $data['data'] = $this->M_kedai->getDataKedai();
            $data['kedai'] = $this->M_kedai->getDataKedai();
            $Cookies = $this->M_menu->getMenu('','');
//            foreach($Cookies as $tmpData){
//                setcookie($tmpData['ID_MENU'],"", time() - 3600, '/e-order/C_Pemesanan');
//            }
            $data['Promo'] = $this->M_menu->getMenu('','');
            $this->load->view('V_Home',$data);
        }
    }
?>