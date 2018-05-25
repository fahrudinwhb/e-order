<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kedai extends CI_Controller {

	public function index(){
        $this->load->model('M_meja');
		$this->load->model('M_pemesanan');
        if($this->session->userdata('kedai')){
            $data['meja'] = $this->M_meja->getData();
			$data['jumlah_meja_pesanan'] = $this->M_pemesanan->jumlah_meja_pesanan();
			$data['array_pesanan'] = $this->M_pemesanan->get($this->session->userdata('kedai')[0]['ID_KEDAI']);
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			$this->load->view('kedai/V_kedai',$data);
        }
        else{
			redirect('login');
        }
	}
	public function menu(){
		if($this->session->userdata('kedai')){
			if(!$this->uri->segment(3)){
				$this->load->model("M_menu");
				$data['menu'] = $this->M_menu->getMenu("",$this->session->userdata('kedai')[0]['ID_KEDAI']);
				$this->load->view('kedai/V_menu',$data);
			}
			elseif($this->uri->segment(3) == "buat"){
				$this->load->model('M_menu');
				$this->load->view('kedai/V_menu_buat');
			}
			elseif($this->uri->segment(3) == "edit" and $this->uri->segment(4)){
				$this->load->model('M_menu');
				$data['menu'] = $this->M_menu->getMenu($this->uri->segment(4),$this->session->userdata('kedai')[0]['ID_KEDAI']);
				$this->load->view('kedai/V_menu_edit',$data);
			}
			else{
				show_404();
			}
		}
		else{
			redirect('login');
		}
	}
	public function menu_buat(){
		$this->load->model("M_menu");
		$panjang_base_url = strlen(base_url());
		$id_menu = "FD".substr(md5(uniqid(rand(), true)),0,4);
		$id_kedai = $this->input->post("id_kedai");
		$nama_menu = $this->input->post("nama");
		$deskripsi_menu = $this->input->post("deskripsi");
		$promo_menu = $this->input->post("promo");
		$harga_menu = $this->input->post("harga");
		$kategori_menu = $this->input->post("kategori");
		$baru_menu = $this->input->post("baru");
		$logo_menu = substr($this->input->post("icon"),$panjang_base_url);
		$array_insert = array(
			'ID_MENU'      	=> $id_menu,
			'ID_KEDAI'      => $id_kedai,
			'NAMA_MENU'		=> $nama_menu,
			'DESKRIPSI_MENU' => $deskripsi_menu,
			'PROMO'			=> $promo_menu,
			'HARGA_MENU'	=> $harga_menu,
			'KATEGORI'		=> $kategori_menu,
			'BARU'			=> $baru_menu,
			'GAMBAR'  		=> $logo_menu
		);
		if($this->M_menu->insert($array_insert)){
			echo "berhasil insert";
		}
		else{
			echo var_dump($array_insert);
		}
	}
	public function menu_edit(){
		$this->load->model("M_menu");
		$panjang_base_url = strlen(base_url());
		$id_menu = $this->input->post("id_menu");
		$id_kedai = $this->input->post("id_kedai");
		$nama_menu = $this->input->post("nama");
		$deskripsi_menu = $this->input->post("deskripsi");
		$promo_menu = $this->input->post("promo");
		$harga_menu = $this->input->post("harga");
		$kategori_menu = $this->input->post("kategori");
		$baru_menu = $this->input->post("baru");
		$logo_menu = substr($this->input->post("icon"),$panjang_base_url);
		$array_insert = array(
			'ID_MENU'      	=> $id_menu,
			'ID_KEDAI'      => $id_kedai,
			'NAMA_MENU'		=> $nama_menu,
			'DESKRIPSI_MENU' => $deskripsi_menu,
			'PROMO'			=> $promo_menu,
			'HARGA_MENU'	=> $harga_menu,
			'KATEGORI'		=> $kategori_menu,
			'BARU'			=> $baru_menu,
			'GAMBAR'  		=> $logo_menu
		);
		if($this->M_menu->edit($array_insert)){
			echo "berhasil insert";
		}
		else{
			echo var_dump($array_insert);
		}
	}
	public function menu_delete(){
		$this->load->model("M_menu");
		$id_menu = $this->input->post('id');
		$this->M_menu->deleteMenu($id_menu);
	}
	public function ulasan(){
		if($this->session->userdata('kedai')){
			if(!$this->uri->segment(3)){
				$this->load->model("M_ulasan");
				$id_kedai = $this->session->userdata('kedai')[0]['ID_KEDAI'];
				$data['ulasan'] = $this->M_ulasan->get($id_kedai);
				$this->load->view('kedai/V_ulasan',$data);
			}
			else{
				show_404();
			}
		}
		else{
			redirect('login');
		}
	}
	public function pesanan(){
		$this->load->model('M_pemesanan');
		$id_kedai = $this->session->userdata('kedai')[0]['ID_KEDAI'];
		$data['array_pesanan'] = $this->M_pemesanan->get($id_kedai);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->load->view('kedai/V_pesanan',$data);
	}
	public function edit_status_pesanan(){
		$this->load->model('M_pemesanan');
		$this->load->model('M_meja');
		$id_pesanan = $this->input->post('meja-id-pesanan');
		$id_meja = $this->input->post('id-meja');
		$status = $this->input->post('optradio');
		$this->M_pemesanan->updateStatus($id_pesanan,$status);
		if($status == 'Selesai'){
			$this->M_meja->update(array('ID_MEJA	' => $id_meja),array('STATUS_MEJA' => 0));

		}
		redirect('kedai');
	}
	public function get_pesanan_meja(){
		$this->load->model('M_pemesanan');
		// $id_meja = $this->input->post('id_meja');
		// $id_kedai = $this->input->post('id_kedai');
		$pemesanan = $this->M_pemesanan->get_by_meja(1,2);
		if(count($pemesanan) != 0){
			echo json_encode($pemesanan);
		}
		else{
			$pemesanan = "tidak ada";
			echo json_encode($pemesanan);
		}
	}
	public function set_session_meja(){
		$id = $this->input->post();
		$this->session->set_userdata('id_form',$id);
	}
	// crop gambar
	public function gambar($lokasi){
		$icon_location = "assets/img"."/".$lokasi."/";
		$icon_file = $icon_location.basename($_FILES["icon"]["name"]);
		if(move_uploaded_file($_FILES["icon"]["tmp_name"], $icon_file)){
			echo $icon_file;
		}
		else {
			print_r($_FILES);
		}
	}
	public function gambarCrop($lokasi){
		$this->load->helper('path');
		$filename = $_POST['filename'];
		$img = $_POST['pngimageData'];
		$lokasi_crop = "assets/img"."/".$lokasi."/";
		$img = str_replace('data:image/jpeg;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = $lokasi_crop."crop_".$filename;
		$lokasi_hasil_crop = base_url().$file;
		$success = file_put_contents($file, $data);
		if($success){
			echo $lokasi_hasil_crop;
		}
		else{
			echo "Gagal menyimpan hasil crop";
		}
	}
}
