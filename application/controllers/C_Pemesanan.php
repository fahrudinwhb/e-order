<?php 
    class C_Pemesanan extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->model('M_kedai');
            $this->load->model('M_menu');
            $this->load->model('M_pemesanan');
            $this->load->model('M_ulasan');
            $this->load->model('M_meja');
        }
        
        public function index(){
            if(sizeof($_COOKIE) == 1 or sizeof($_COOKIE) == 2){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Maaf, anda belum melakukan pemesanan apapun')
                        window.location.href='".base_url()."';
                        </SCRIPT>");
            }
            $Cookies = $this->M_menu->getMenu('','');
            foreach($Cookies as $tmpData){
                if(isset($_COOKIE[$tmpData['ID_MENU']])){
                    $deCode[] = json_decode($_COOKIE[$tmpData['ID_MENU']],true);
                }
            }
            foreach($deCode as $json){
                $data['Tmp'][] = $this->M_menu->getMenu($json['Id_Menu'],$json['Id_Kedai']);
                $data['Jumlah'][] = $json['Jumlah'];
            }
            $data['data'] = $this->M_kedai->getDataKedai();
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
            $this->load->view('V_Pemesanan',$data);
        }
        public function TempData(){
            $IdKedai= $this->input->post('IdKedai');
            $IdMenu = $this->input->post('IdMenu');
            $Jumlah = $this->input->post('Jumlah');
            $Angka = $this->input->post('Angka');
            $data = array(
                'Id_Kedai' => $IdKedai,
                'Id_Menu'  => $IdMenu,
                'Jumlah'   => $Jumlah
            );
            $data = json_encode($data);
            setcookie($IdMenu,$data, time() + 3600);
        }
        public function delTmpData($id_Menu = ''){
            setcookie($id_Menu, "", time() - 3600, '/e-order/C_Pemesanan');
            setcookie('Id_Meja', "", time() - 3600, '/e-order/C_Pemesanan');
            redirect('C_Pemesanan');
        }
        public function inputPemesanan(){
            date_default_timezone_set('Asia/Jakarta');
            $NomorMeja = $this->input->post('NoMeja');
            for($i=0;$i<sizeof($_POST['idMenu']);$i++){
                $IdKedai = $this->input->post('idKedai');
                $IdMenu = $this->input->post('idMenu');
                $jumlah = $this->input->post('jumlah');
                $harga = $this->input->post('harga');
                $data[] = array(
                    'ID_KEDAI' => $IdKedai[$i],
                    'ID_MENU'  => $IdMenu[$i],
                    'JUMLAH_PESANAN' => $jumlah[$i],
                    'TOTAL_HARGA'  => $harga[$i]
                );
            }            
            foreach($data as $query){
                $query['ID_MEJA'] = $NomorMeja;
                $query['WAKTU_PEMESANAN'] = date('Y-m-d H:i:s');
                $idPemesanan = $this->M_pemesanan->insertA($query);
                $jsonAn[] = $NomorMeja;
                $jsonAb[] = $idPemesanan;
                $this->M_meja->update(array('ID_MEJA' => $NomorMeja),array('STATUS_MEJA' => 1));
            }
            $idPesan = json_encode($jsonAb);
            setcookie('Id_Pemesanan', $idPesan, time() + 3600,  '/e-order/C_Pemesanan');
            $idMeja = json_encode($jsonAn);
            setcookie('Id_Meja',$idMeja, time() + 3600, '/e-order/C_Pemesanan/inputFeedback');
            redirect('C_Pemesanan/Status');
        }
        public function Feedback(){
            if(sizeof($_COOKIE) == 1){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Maaf, anda belum melakukan pemesanan apapun')
                        window.location.href='".base_url()."';
                        </SCRIPT>");
            }
            $Cookies = $this->M_menu->getMenu('','');
            foreach($Cookies as $tmpData){
                if(isset($_COOKIE[$tmpData['ID_MENU']])){
                    $deCode[] = json_decode($_COOKIE[$tmpData['ID_MENU']],true);
                }
            }
            foreach($deCode as $json){
                $data['Tmp'][] = $this->M_menu->getMenu($json['Id_Menu'],$json['Id_Kedai']);
                $data['Jumlah'][] = $json['Jumlah'];
            }
            $data['kedai'] = $this->M_kedai->getDataKedai();
            $this->load->view('V_Feedback',$data);
        }
        public function inputFeedback(){
            date_default_timezone_set('Asia/Jakarta');
            if(sizeof($_COOKIE) == 1){
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Maaf, anda belum melakukan pemesanan apapun')
                        window.location.href='".base_url()."';
                        </SCRIPT>");
            }
            $Cookies = $this->M_menu->getMenu('','');
            foreach($Cookies as $tmpData){
                if(isset($_COOKIE[$tmpData['ID_MENU']])){
                    $deCode[] = json_decode($_COOKIE[$tmpData['ID_MENU']],true);
                }
            }
            foreach($deCode as $json){
                $data['Tmp'][] = $this->M_menu->getMenu($json['Id_Menu'],$json['Id_Kedai']);
                setcookie($json['Id_Menu'], "", time() - 3600, '/e-order/C_Pemesanan');
            }
            $z = 0;
            foreach($data['Tmp'] as $row){
                $input['ID_KEDAI'] = $row[0]['ID_KEDAI'];
                $input['BINTANG'] = $_POST['star'][$z];
                $input['ULASAN'] = $_POST['pesan'][$z];
                $input['WAKTU'] = date('Y-m-d H:i:s');
                $z++;
                $this->M_ulasan->insert($input);
            }
            $mejaJson = json_decode($_COOKIE['Id_Meja']);
            for($k=0;$k<sizeof($mejaJson);$k++){
                $this->M_meja->update(array('ID_MEJA' => $mejaJson[$k]),array('STATUS_MEJA' => 0));
            }
            $deCodePemesanan = json_decode($_COOKIE['Id_Pemesanan']);
            for($t=0;$t<sizeof($deCodePemesanan);$t++){
                $this->M_pemesanan->updateStatus($deCodePemesanan[$t],'Selesai');
                setcookie('Id_Pemesanan', "", time() - 3600,  '/e-order/C_Pemesanan');
            }
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Terima kasih atas ulasannya')
                        window.location.href='".base_url()."';
                        </SCRIPT>");            
        }
        public function Status(){
            $deCodePemesanan = json_decode($_COOKIE['Id_Pemesanan']);
//            setcookie('Id_Meja', "", time() - 3600, '/e-order/C_Pemesanan');
            for($t=0;$t<sizeof($deCodePemesanan);$t++){
                $data['Status'][] = $this->M_pemesanan->getData(array('ID_PEMESANAN' => $deCodePemesanan[$t]));
                $data['Nama'][] =  $this->M_menu->getMenu($data['Status'][$t][0]['ID_MENU'],'');
            }
//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
            $this->load->view('V_Status',$data);
        }
    }
?>