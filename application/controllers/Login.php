<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_warga');
	}


	public function index()
	{
		$this->load->view('Login/Index.php');
	}

	public function auth()
	{
		$username = strip_tags(str_replace("'", "", $this->input->post('username')));
		$password = strip_tags(str_replace("'", "", $this->input->post('password')));

		$u = $username;
		$p = $password;
		$cadmin = $this->M_login->cekadmin($u, $p);
		$cekadmin = $cadmin->num_rows();
		
		if ($cekadmin == '') {
			$cadmin = $this->M_warga->cekadmin($u,$p);

			json_encode($cadmin);

		}else{
			json_encode($cadmin);
		}
		


		if ($cadmin->num_rows() > 0) {
            // echo "berhasil";
            // die();
			$this->session->set_userdata('masuk', true);
			$this->session->set_userdata('user', $u);
			$xcadmin = $cadmin->row_array();

            // var_dump($xcadmin['hak_akses']);
            // die;

			if ($xcadmin['hak_akses'] == 'admin') {
				$this->session->set_userdata('akses', 'admin');
				$id = $xcadmin['id'];
				$nama_lengkap = $xcadmin['nama_lengkap'];
				$hak_akses = $xcadmin['hak_akses'];
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('nama_lengkap', $nama_lengkap);
				$this->session->set_userdata('hak_akses', $hak_akses);
				$data = array(
					'hak_akses'     => $hak_akses,
					'nama_lengkap'     => $nama_lengkap,
					'logged_in' => TRUE
				);
				redirect('Admin/Homepage', $data);
			} elseif ($xcadmin['hak_akses'] == 'lurah') {
				$this->session->set_userdata('akses', 'lurah');
				$id = $xcadmin['id'];
				$nama_lengkap = $xcadmin['nama_lengkap'];
				$hak_akses = $xcadmin['hak_akses'];
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('nama_lengkap', $nama_lengkap);
				$this->session->set_userdata('hak_akses', $hak_akses);
				$data = array(
					'hak_akses'     => $hak_akses,
					'nama_lengkap'     => $nama_lengkap,
					'logged_in' => TRUE
				);

				redirect('Admin/Homepage', $data);
			}elseif ($xcadmin['hak_akses'] == 'warga') {
				$this->session->set_userdata('akses', 'warga');
				$id = $xcadmin['id_warga'];
				$nama_lengkap = $xcadmin['nama_lengkap'];
				$hak_akses = $xcadmin['hak_akses'];
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('nama_lengkap', $nama_lengkap);
				$this->session->set_userdata('hak_akses', $hak_akses);
				$data = array(
					'hak_akses'     => $hak_akses,
					'nama_lengkap'     => $nama_lengkap,
					'logged_in' => TRUE
				);


				redirect('Admin/Homepage_warga', $data);
			}
		} else {

			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Username Atau Password Salah</div>');
			redirect('Login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}
