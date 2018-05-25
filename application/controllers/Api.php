<?php
// require_once APPPATH.'libraries\Format.php';
//require_once APPPATH.'libraries\REST_Controller.php';

class Api extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
    public function index(){
        // $this->load->view("api");
    }
    //get pemesanan
	public function pemesanan(){
        $this->load->model('M_pemesanan');
        $id = $this->input->post('Id');
        $get_pemesanan['Pemesanan'] = $this->M_pemesanan->getData(array("pemesanan.ID_PEMESANAN" => $id));
        header('Content-Type: application/json');
        echo json_encode($get_pemesanan);
	}
    //buat pemesanan baru (butuh data : id_meja )
    public function insert_pemesanan(){
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_pemesanan');
        $this->load->model('M_meja');
        // $id_pememesanan = "M".rand(3,100);
        $id_pemesanan = $this->input->post('id_pemesanan');
        $waktu_pemesanan = date('Y-m-d H:i:s');
        $status_pemesanan = "Belum Di Konfirmasi";
        $id_pememesanan = $this->M_pemesanan->getData(array('ID_PEMESANAN' => $id_pemesanan));
        if(count($id_pememesanan) != 0){
            $status = array('status id' => 'sudah ada');
        }
        else{
            $status = array('status id' => 'belum ada');
            $this->M_pemesanan->insert(array(
                'ID_PEMESANAN'      => $id_pemesanan,
                'WAKTU_PEMESANAN'   => $waktu_pemesanan,
                'STATUS_PEMESANAN'  => $status_pemesanan
            ));
        }
        header('Content-Type: application/json');
        echo json_encode($status);
    }
    public function insert_meja_pesanan(){
        $this->load->model('M_pemesanan');
        $this->load->model('M_meja');
        $id_pemesanan = $this->input->post('id_pemesanan');
        $id_meja = $this->input->post('id_meja');
        $this->M_pemesanan->update(array('ID_PEMESANAN' => $id_pemesanan),array('ID_MEJA' => $id_meja));
        $this->M_meja->update(array('ID_MEJA' => $id_meja),array('STATUS_MEJA' => 1));
        $status = array('status' => 'berhasil');
        header('Content-Type: application/json');
        echo json_encode($status);

    }
    //buat menambahkan menu ke pemesanan TERAKHIR !! (butuh data : id_menu dan jumlah_menu_pesanan )
    public function tambah_menu_pesanan(){
        $this->load->model('M_pemesanan');
        $this->load->model('M_menu');
        $this->load->model('M_pemesanan_has_menu');
        // // query get id pemesanan TERAKHIR
        // $array = array('pemesanan_terkahir' => $this->M_pemesanan->get_pemesanan_terakhir());

        $id_pemesanan = $this->input->post('id_pemesanan');
        // input post jumlah_menu_pesanan dan input post id_menu
        $id_menu = $this->input->post('id_menu');
        $jumlah_menu_pesanan = $this->input->post('jumlah_menu_pesanan');
        //query menu berdasarkan id_menu
        $query_menu = $this->M_menu->get(array('ID_MENU' => $id_menu));
        $jumlah_harga_pesananan = $query_menu[0]['HARGA_MENU']*$jumlah_menu_pesanan;
        // query cek menu apa udah ada di pemesanan_has_menu
        $query_cek_menu = $this->M_pemesanan_has_menu->get(array('ID_PEMESANAN' => $id_pemesanan,'ID_MENU' => $id_menu));
        // jika menu ditemukan lakukan update data
        if(count($query_cek_menu) != 0){
            $jumlah_menu_pesanan = $query_cek_menu[0]['JUMLAH_MENU_PESANAN']+$jumlah_menu_pesanan;
            $jumlah_harga_pesananan = $query_cek_menu[0]['JUMLAH_HARGA_PESANAN']+$jumlah_harga_pesananan;
            $this->M_pemesanan_has_menu->update(
                array('ID_PEMESANAN' => $id_pemesanan,'ID_MENU' => $id_menu),
                array('JUMLAH_MENU_PESANAN' => $jumlah_menu_pesanan,'JUMLAH_HARGA_PESANAN' => $jumlah_harga_pesananan)
            );
        }
        //jika menu tidak ditemukan lakukan insert data baru
        else{
            $this->M_pemesanan_has_menu->insert(array(
                'ID_MENU'               => $id_menu,
                'ID_PEMESANAN'          => $id_pemesanan,
                'JUMLAH_MENU_PESANAN'   => $jumlah_menu_pesanan,
                'JUMLAH_HARGA_PESANAN'  => $jumlah_harga_pesananan
            ));
        }
        //update total menu dan total harga di tabel pemesanan
        $data = array('sum_pemesanan' => $this->M_pemesanan_has_menu->sum_pemesanan($id_pemesanan));
        $this->M_pemesanan->update(
            array('ID_PEMESANAN' => $id_pemesanan),
            array('TOTAL_MENU_PESANAN' => $data['sum_pemesanan']['JUMLAH_MENU_PESANAN'],'TOTAL_HARGA_PESANAN' => $data['sum_pemesanan']['JUMLAH_HARGA_PESANAN'])
        );
        header('Content-Type: application/json');
        $status = array('status' => 'berhasil');
        echo json_encode($status);
    }
    // input feedback dan rating
	public function feedback(){
		$array_insert = array(
			"Isi" => $this->input->post("FeedBack"),
            "Rating" => $this->input->post("Rating")
		);
        header('Content-Type: application/json');
        echo json_encode($array_insert);
	}
    //get promo yang tidak null
    public function promo(){
        $this->load->model('M_menu');
        $data['Promo'] = $this->M_menu->get(array('Promo !=' => null));
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    //get kedai berdasarkan nama kedai
    public function kedai(){
        $this->load->model('M_kedai');
        $nama_kedai = $this->input->post('nama_kedai');
        $data['Kedai'] = $this->M_kedai->getDataKedai(array('NAMA_KEDAI' => $nama_kedai));
        header('Content-Type: application/json');
        echo json_encode($data['Kedai']);
    }
    //search menu bersarkan keyword
    public function search(){
        $this->load->model('M_kedai');
        $this->load->model('M_menu');
        $Keyword = $this->input->post('keyword');
        $data['Hasil_Search'] = $this->M_menu->getMenuSearch(array('NAMA_MENU' => $Keyword));
        header('Content-Type: application/json');
        echo json_encode($data['Hasil_Search']);
    }
    //get menu bersarkan id kedai
    public function get_menu_by_kedai(){
        $this->load->model('M_kedai');
        $this->load->model('M_menu');
        $id_kedai = $this->input->post('id_kedai');
        $data['Menu_By_Kedai'] = $this->M_menu->get(array('id_kedai' => $id_kedai));
        header('Content-Type: application/json');
        echo json_encode($data['Menu_By_Kedai']);
    }
    //get menu by nama menu
    public function get_menu_by_nama(){
        $this->load->model('M_menu');
        $nama_menu = $this->input->post('nama_menu');
        $data['Menu_By_Nama'] = $this->M_menu->get(array('nama_menu' => $nama_menu));
        header('Content-Type: application/json');
        echo json_encode($data['Menu_By_Nama']);
    }
    public function get_status_pemesanan(){
        $this->load->model('M_menu');
        $this->load->model('M_pemesanan');
        $this->load->model('M_pemesanan_has_menu');
        $id_pemesanan = $this->input->post('id_pemesanan');
        $query['query'] = $this->M_pemesanan_has_menu->join_all($id_pemesanan);
        header('Content-Type: application/json');
        echo json_encode($query);

    }
}
