<?php defined('BASEPATH') or exit('No direct script access allowed');

class Homepage  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_login');
        $this->load->model('M_warga');
        // $this->load->model('M_pengajuan');
        // $this->load->model('M_instansi');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function index()
    {

        $data['jumlah_warga'] = $this->M_warga->jumlah_warga()->result();
        $data['jumlah_ktp'] = $this->M_warga->jumlah_ktp()->result();
        $data['jumlah_kelahiran'] = $this->M_warga->jumlah_kelahiran()->result();
        $data['jumlah_kematian'] = $this->M_warga->jumlah_kematian()->result();
        $data['jumlah_pendatang'] = $this->M_warga->jumlah_pendatang()->result();
        $data['jumlah_pindah'] = $this->M_warga->jumlah_pindah()->result();

        $data['warga'] = $this->M_warga->tampil_data_limit();

        $this->load->view('Admin/Homepage.php',$data);
    }
}
