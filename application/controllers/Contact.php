<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contact  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_login');
        // $this->load->model('M_tagihan');
        // $this->load->model('M_pengajuan');
        // $this->load->model('M_instansi');

        
    }

    public function index()
    {

        // var_dump($data['pengajuan']);
        // die;
        $this->load->view('Front/Kontak.php');
    }
}
