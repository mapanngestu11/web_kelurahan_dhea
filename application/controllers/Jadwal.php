<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_jadwal');
        // $this->load->model('M_tagihan');
        // $this->load->model('M_pengajuan');
        // $this->load->model('M_instansi');

        
    }

    public function index()
    {

        $data['kegiatan'] = $this->M_jadwal->tampil_data();
        $this->load->view('Front/Jadwal.php',$data);
    }

    public function detail($id_kegiatan)
    {
        $data['kegiatan'] = $this->M_kegiatan->detail_kegiatan($id_kegiatan);
        $this->load->view('Front/detail_kegiatan.php',$data);
    }
}
