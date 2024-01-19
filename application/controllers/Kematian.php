<?php defined('BASEPATH') or exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


class Kematian  extends CI_Controller
{


  function __construct()
  {
    parent::__construct();

    $this->load->model('M_kelahiran');
    $this->load->model('M_warga');
    $this->load->helper('url');
    $this->load->library('upload');
        // $this->load->model('M_tagihan');
        // $this->load->model('M_pengajuan');
        // $this->load->model('M_instansi');


  }

  public function index()
  {

    $this->load->view('Front/Form_pilih_surat.php');
  }

  public function pilih_pengajuan_surat_kelahiran()
  {
    $this->load->view('Front/Form_surat_kelahiran.php');
  }

  public function pilih_pengajuan_surat_kematian()
  {
    $this->load->view('Front/Form_surat_kematian.php'); 
  }

  public function input_data_surat_kelahiran()
  {
   date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);

        if (!empty($_FILES['kk']['name'])) {
          if ($this->upload->do_upload('kk')) {
            $gbr = $this->upload->data();
                //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['new_image'] = './assets/upload/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $file_kk = $gbr['file_name'];

            if (!empty($_FILES['ktp_ayah']['name'])) {
              if ($this->upload->do_upload('ktp_ayah')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file_ktp_ayah = $gbr['file_name'];

                if (!empty($_FILES['ktp_ibu']['name'])) {
                  if ($this->upload->do_upload('ktp_ibu')) {
                    $gbr = $this->upload->data();
                //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '100%';
                    $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $file_ktp_ibu = $gbr['file_name'];


                    $kode_permohonan = $this->input->post('kode_permohonan');

                    $nama_anak = $this->input->post('nama_anak');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $tempat_lahir_anak = $this->input->post('tempat_lahir_anak');
                    $tgl_lahir_anak = $this->input->post('tgl_lahir_anak');
                    $waktu_lahir = $this->input->post('waktu_lahir');

                    $nama_rs = $this->input->post('nama_rs');
                    $alamat_rs = $this->input->post('alamat_rs');
                    $nik_ayah = $this->input->post('nik_ayah');
                    $nama_ayah = $this->input->post('nama_ayah');
                    $tempat_lahir_ayah = $this->input->post('tempat_lahir_ayah');

                    $tgl_lahir_ayah = $this->input->post('tgl_lahir_ayah');
                    $no_telp = $this->input->post('no_telp');
                    $email = $this->input->post('email');
                    $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
                    $alamat_ayah = $this->input->post('alamat_ayah');

                    $nik_ibu = $this->input->post('nik_ibu');
                    $nama_ibu = $this->input->post('nama_ibu');
                    $tempat_lahir_ibu = $this->input->post('tempat_lahir_ibu');
                    $tgl_lahir_ibu = $this->input->post('tgl_lahir_ibu');
                    $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');

                    $alamat_ibu = $this->input->post('alamat_ibu');
                    $tanggal =  date('Y-m-d h:i:s');
                    $status = '0';


                    $data = array(
                     'kode_permohonan' => $kode_permohonan,
                     'nama_anak' => $nama_anak,
                     'jenis_kelamin' => $jenis_kelamin,
                     'tempat_lahir_anak' => $tempat_lahir_anak,
                     'tgl_lahir_anak' => $tgl_lahir_anak,

                     'waktu_lahir' => $waktu_lahir,
                     'nama_rs' => $nama_rs,
                     'alamat_rs' => $alamat_rs,
                     'nik_ayah' => $nik_ayah,
                     'nama_ayah' => $nama_ayah,

                     'tempat_lahir_ayah' => $tempat_lahir_ayah,
                     'tgl_lahir_ayah' => $tgl_lahir_ayah,
                     'no_telp' => $no_telp,
                     'email' => $email,
                     'pekerjaan_ayah' => $pekerjaan_ayah,
                     'alamat_ayah' => $alamat_ayah,

                     'nik_ibu' => $nik_ibu,
                     'nama_ibu' => $nama_ibu,
                     'tempat_lahir_ibu' => $tempat_lahir_ibu,
                     'tgl_lahir_ibu' => $tgl_lahir_ibu,
                     'pekerjaan_ibu' => $pekerjaan_ibu,
                     'alamat_ibu' => $alamat_ibu,

                     'kk' => $file_kk,
                     'ktp_ayah' => $file_ktp_ayah,
                     'ktp_ibu' => $file_ktp_ibu,
                     'status' => $status,
                     'tanggal' => $tanggal
                   );

                    $this->M_kelahiran->input_data_surat_kelahiran($data, 'tbl_surat_kelahiran');

                    $data['informasi'] = array(
                     'kode_permohonan' => $kode_permohonan,
                     'nama' => $nama_ayah
                   );

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api.fonnte.com/send',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS => array(
                        'target' => $no_telp,
                        'message' => 'Terimakasih Sudah Membuat Permohonan Surat Kematian Melalui Website Kelurahan Karang Timur, anda bisa mengecek surat pada kode permohonan '.$kode_permohonan.' dan akan mendapatkan pemberitahuan lanjutan melalui email yang di daftarkan '.$email.'.', 
                        'countryCode' => '62', 
                      ),
                      CURLOPT_HTTPHEADER => array(
                        'Authorization: 1__!Zq+6GTxoo7vqmGAZ' 
                      ),
                    ));

                    $response = curl_exec($curl);
                    $this->load->view('Front/Info.php',$data);

                  } else {
                    echo $this->session->set_flashdata('msg', 'warning-surat');
                    $this->load->view('Front/Homepage.php');
                  }
                } 

              } else {
               echo $this->session->set_flashdata('msg', 'warning-surat');
               $this->load->view('Front/Homepage.php');
             }
           } 

         } else {
          echo $this->session->set_flashdata('msg', 'warning-surat');
          $this->load->view('Front/Homepage.php');
        }
      } 
    }

    public function cek_permohonan()
    {
      $kode_permohonan = $this->input->post('kode_permohonan');
      $hasil = $this->M_kelahiran->cek_kode_permohonan($kode_permohonan)->result();

      $status = $hasil[0]->status;
      $keterangan = $hasil[0]->keterangan;
      $file_surat = $hasil[0]->file_surat;



      if ($status == '1') {   
        $data['hasil'] = array(
          'status' => $status,
          'keterangan' => $keterangan,
          'file_surat' => $file_surat

        );
        $this->load->view('Front/Hasil_ktp.php',$data);

      }else{
        echo $this->session->set_flashdata('msg', 'proses');
        redirect('Kelahiran');
      }

    }

    public function add()
    {
      $nik = $this->input->post('nik');
      $hasil = $this->M_kelahiran->cek_ktp($nik)->result();

      if ($hasil) {
       date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['file_pemohon']['name'])) {
          if ($this->upload->do_upload('file_pemohon')) {
            $gbr = $this->upload->data();
                //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['new_image'] = './assets/upload/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $file = $gbr['file_name'];
            $nik = $this->input->post('nik');
            $kode_permohonan = $this->input->post('kode_permohonan');
            $kebutuhan = $this->input->post('kebutuhan');
            $tanggal =  date('Y-m-d h:i:s');
            $status = '0';


            $data = array(
             'kode_permohonan' => $kode_permohonan,
             'nik' => $nik,
             'kebutuhan' => $kebutuhan,
             'status' => $status,
             'file_pemohon' => $file,
             'tanggal' => $tanggal
           );

            $this->M_kelahiran->input_data($data, 'tbl_permohonan_surat_kelahiran');
            echo $this->session->set_flashdata('msg', 'success');
            redirect('Kelahiran');
          } else {
            echo $this->session->set_flashdata('msg', 'warning');
            redirect('Kelahiran');
          }
        } else {

          redirect('Kelahiran');
        }

      }else{
        echo $this->session->set_flashdata('msg', 'gagal');
        redirect('Kelahiran');
      }
    }




  }
