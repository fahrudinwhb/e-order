<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
        $this->load->model('M_pengguna');
        $this->load->view('admin/V_login');
        if($this->input->post('submit')){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $do_login = $this->M_pengguna->loginPengguna($username,$password);
            if($do_login == null){
                $this->session->set_flashdata('login', 'gagal');
                redirect('login');
            }
            else{
				$data = $this->M_pengguna->getPengguna($username,"");
				if($data[0]['STATUS'] == '0'){
					$this->session->set_userdata('pengguna',$data);
					redirect('admin');
				}
				elseif($data[0]['STATUS'] == '1'){
					$this->session->set_userdata('kedai',$data);
					redirect('kedai');
				}
            }
        }
        elseif($this->session->userdata('pengguna')){
            redirect('admin');
        }
	}
	public function logout(){
		$this->session->unset_userdata('kedai');
		$this->session->unset_userdata('pengguna');
		redirect('Login');
	}
}
