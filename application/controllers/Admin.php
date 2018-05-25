<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
        if($this->session->userdata('pengguna')){
			$this->load->model('M_kedai');
			$this->load->model('M_meja');
			$this->load->model('M_menu');
			$this->load->model('M_pengguna');
			$this->load->model('M_pemesanan');
			$data['jumlah_kedai'] = count($this->M_kedai->getKedai(""));
			$data['jumlah_menu'] = count($this->M_menu->getMenu("",""));
			$data['jumlah_meja'] = count($this->M_meja->getData());
			$data['jumlah_pengguna'] = count($this->M_pengguna->getPengguna("",""));
			$this->load->view('admin/V_admin',$data);
        }
        else{
			redirect('login');
        }
	}
	//Kedai
	public function kedai(){
		if($this->session->userdata('pengguna')){
			if(!$this->uri->segment(3)){
				$this->load->model('M_kedai');
				$data['kedai'] = $this->M_kedai->getkedai("","0");
				$this->load->view('admin/V_admin_kedai',$data);
			}
			elseif($this->uri->segment(3) == "buat"){
				$this->load->model('M_pengguna');
				$this->load->model('M_kedai');
				$data['pengguna'] = $this->M_pengguna->getPengguna("","1");
				$this->load->view('admin/V_admin_kedai_buat',$data);
			}
			elseif($this->uri->segment(3) == "edit" and $this->uri->segment(4)){
				$this->load->model('M_kedai');
				$data['kedai'] = $this->M_kedai->getkedai($this->uri->segment(4));
				$this->load->view('admin/V_admin_kedai_edit',$data);
			}
			elseif($this->uri->segment(3) == "lihat" and $this->uri->segment(4)){
				$this->load->model('M_kedai');
				$data['kedai'] = $this->M_kedai->getkedai($this->uri->segment(4),"0");
				$this->load->view('admin/V_admin_kedai_lihat',$data);
			}
			else{
				show_404();
			}
		}
		else{
			redirect('login');
		}
	}
	public function kedai_submit(){
		$this->load->model("M_kedai");
		$panjang_base_url = strlen(base_url());
		$nama_kedai = $this->input->post("nama");
		$admin_kedai = $this->input->post("admin");
		$logo_kedai = substr($this->input->post("icon"),$panjang_base_url);
		$array_insert = array(
			'ID_KEDAI'      => "",
			'NAMA_KEDAI'	=> $nama_kedai,
			'ADMIN_KEDAI'   => $admin_kedai,
			'LOGO_KEDAI'  	=> $logo_kedai
		);
		if($this->M_kedai->insert($array_insert)){
			echo "berhasil insert";
		}
		else{
			echo var_dump($array_insert);
		}
	}
	public function kedai_edit(){
		$this->load->model("M_kedai");
		$panjang_base_url = strlen(base_url());
		$id_kedai = $this->input->post("id");
		$nama_kedai = $this->input->post("nama");
		$admin_kedai = $this->input->post("admin");
		$logo_kedai = substr($this->input->post("icon"),$panjang_base_url);
		$array_insert = array(
			'ID_KEDAI'      => $id_kedai,
			'NAMA_KEDAI'	=> $nama_kedai,
			'ADMIN_KEDAI'   => $admin_kedai,
			'LOGO_KEDAI'  	=> $logo_kedai
		);
		if($this->M_kedai->edit($array_insert)){
			echo "berhasil insert";
		}
		else{
			echo var_dump($array_insert);
		}
	}
	public function kedai_delete(){
		$this->load->model("M_kedai");
		$id_kedai = $this->input->post('id');
		$this->M_kedai->deletekedai($id_kedai);
	}
	public function meja(){
		$this->load->model('M_meja');
		$data['meja'] = $this->M_meja->getData();
		$this->load->view('admin/V_admin_kursi',$data);
	}
	public function pengguna(){
		if($this->session->userdata('pengguna')){
			if(!$this->uri->segment(3)){
				$this->load->model('M_pengguna');
				$data['pengguna'] = $this->M_pengguna->getPengguna("","");
				$this->load->view('admin/V_admin_pengguna',$data);
			}
			elseif($this->uri->segment(3) == "buat"){
				$this->load->model('M_pengguna');
				$this->load->view('admin/V_admin_pengguna_buat');
			}
			elseif($this->uri->segment(3) == "edit" and $this->uri->segment(4)){
				$this->load->model('M_pengguna');
				$data['pengguna'] = $this->M_pengguna->getPengguna2($this->uri->segment(4),"");
				$this->load->view('admin/V_admin_pengguna_edit',$data);
			}
			elseif($this->uri->segment(3) == "lihat" and $this->uri->segment(4)){
				$this->load->model('M_pengguna');
				$data['kedai'] = $this->M_pengguna->getPengguna($this->uri->segment(4),"0");
				$this->load->view('admin/V_admin_pengguna_lihat',$data);
			}
			else{
				show_404();
			}
		}
		else{
			redirect('login');
		}
	}
	public function pengguna_submit(){
		$this->load->model("M_pengguna");
		$panjang_base_url = strlen(base_url());
		$id = "KD".substr(md5(uniqid(rand(), true)),0,4);
		$nama_pengguna = $this->input->post("nama");
		$password = $this->input->post("password");
		$gambar = substr($this->input->post("icon"),$panjang_base_url);
		$status = $this->input->post('status');
		$array_insert = array(
			'ID_PENGGUNA'   => $id,
			'NAMA_PENGGUNA'	=> $nama_pengguna,
			'PASSWORD'      => $password,
			'GAMBAR'		=> $gambar,
			'STATUS'		=> $status,
		);
		if($this->M_pengguna->insert($array_insert)){
			echo "berhasil insert";
		}
		else{
			echo var_dump($array_insert);
		}
	}
	public function pengguna_edit(){
		$this->load->model("M_pengguna");
		$panjang_base_url = strlen(base_url());
		$id = $this->input->post('id');
		$nama_pengguna = $this->input->post("nama");
		$password = $this->input->post("password");
		$gambar = substr($this->input->post("icon"),$panjang_base_url);
		$status = $this->input->post('status');
		$array_insert = array(
			'ID_PENGGUNA'   => $id,
			'NAMA_PENGGUNA'	=> $nama_pengguna,
			'PASSWORD'      => $password,
			'GAMBAR'		=> $gambar,
			'STATUS'		=> $status,
		);
		if($this->M_pengguna->edit($array_insert)){
			echo "berhasil insert";
		}
		else{
			echo var_dump($array_insert);
		}
	}
	public function pengguna_delete(){
		$this->load->model("M_pengguna");
		$id_pengguna = $this->input->post('id');
		$this->M_pengguna->deletePengguna($id_pengguna);
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
		$file = $lokasi_crop."Crop-".$filename;
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
