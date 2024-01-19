<?php defined('BASEPATH') or exit('No direct script access allowed');

class Informasi  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_kelahiran');
        $this->load->model('M_ktp');
        $this->load->model('M_pendatang');


        
    }

    public function index()
    {


        $this->load->view('Front/Informasi.php');
    }

    public function cek_kode()
    {
     $kode_permohonan = $this->input->post('kode_permohonan');

     $cek_ktp = $data = $this->M_ktp->cek_kodepermohonan_ktp($kode_permohonan)->result();

     if ($cek_ktp) {


        $no_telp = $cek_ktp['0']->no_telp;
        $email   = $cek_ktp['0']->email;
        $status  = $cek_ktp['0']->status;
        $keterangan = $cek_ktp['0']->keterangan;

        if ($status == '0') {
            $cek_status = 'Pending';
        }else{
            $cek_status = 'Selesai';
        }

        $data['informasi'] = array(
            'kode_permohonan' => $kode_permohonan,
            'email' => $email,
            'no_telp' => $no_telp,
            'cek_status' => $cek_status,
            'keterangan' => $keterangan
        );

        $this->load->view('Front/Info-surat.php',$data);

    }else{
     $cek_kematian = $this->M_kelahiran->cek_kodepermohonan_kematian($kode_permohonan)->result();

     if ($cek_kematian) {

        $no_telp = $cek_kematian['0']->no_telp;
        $email   = $cek_kematian['0']->email;
        $status  = $cek_kematian['0']->status;
        $keterangan = $cek_kematian['0']->keterangan;

        if ($status == '0') {
            $cek_status = 'Pending';
        }else{
            $cek_status = 'Selesai';
        }

        $data['informasi'] = array(
            'kode_permohonan' => $kode_permohonan,
            'email' => $email,
            'no_telp' => $no_telp,
            'cek_status' => $cek_status,
            'keterangan' => $keterangan
        );
        $this->load->view('Front/Info-surat.php',$data);

    }else{

       $cek_kelahiran = $this->M_kelahiran->cek_kodepermohonan_kelahiran($kode_permohonan)->result();

       if ($cek_kelahiran) {

        $no_telp = $cek_kelahiran['0']->no_telp;
        $email   = $cek_kelahiran['0']->email;
        $status  = $cek_kelahiran['0']->status;
        $keterangan = $cek_kelahiran['0']->keterangan;

        if ($status == '0') {
            $cek_status = 'Pending';
        }else{
            $cek_status = 'Selesai';
        }

        $data['informasi'] = array(
            'kode_permohonan' => $kode_permohonan,
            'email' => $email,
            'no_telp' => $no_telp,
            'cek_status' => $cek_status,
            'keterangan' => $keterangan
        );
        $this->load->view('Front/Info-surat.php',$data);

    }else{
        $cek_pendatang = $this->M_pendatang->cek_kodepermohonan_pendatang($kode_permohonan)->result();

        if ($cek_pendatang) {

           $no_telp = $cek_pendatang['0']->no_telp;
           $email   = $cek_pendatang['0']->email;
           $status  = $cek_pendatang['0']->status;
           $keterangan = $cek_pendatang['0']->keterangan;

           if ($status == '0') {
            $cek_status = 'Pending';
        }else{
            $cek_status = 'Selesai';
        }

        $data['informasi'] = array(
            'kode_permohonan' => $kode_permohonan,
            'email' => $email,
            'no_telp' => $no_telp,
            'cek_status' => $cek_status,
            'keterangan' => $keterangan
        );
        $this->load->view('Front/Info-surat.php',$data);

    }else{

        $cek_pindah = $this->M_pendatang->cek_kodepermohonan_pindah($kode_permohonan)->result();
        if ($cek_pindah) {
            
            $no_telp = $cek_pindah['0']->no_telp;
            $email   = $cek_pindah['0']->email;
            $status  = $cek_pindah['0']->status;
            $keterangan = $cek_pindah['0']->keterangan;

            if ($status == '0') {
                $cek_status = 'Pending';
            }else{
                $cek_status = 'Selesai';
            }

            $data['informasi'] = array(
                'kode_permohonan' => $kode_permohonan,
                'email' => $email,
                'no_telp' => $no_telp,
                'cek_status' => $cek_status,
                'keterangan' => $keterangan
            );
            $this->load->view('Front/Info-surat.php',$data);
            
        }else{
            $cek_status = 'Tidak terdaftar';
            $data['informasi'] = array(
                'kode_permohonan' => $kode_permohonan,
                'cek_status' => $cek_status
            );
            $this->load->view('Front/Info-surat.php',$data);
        }
    }
}
}
}




}
}
