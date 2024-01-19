<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profil  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_kegiatan');
        // $this->load->model('M_tagihan');
        // $this->load->model('M_pengajuan');
        // $this->load->model('M_instansi');

        
    }

    public function index()
    {

        $data['kegiatan'] = $this->M_kegiatan->tampil_data();
        $this->load->view('Front/Profil.php',$data);
    }
}
