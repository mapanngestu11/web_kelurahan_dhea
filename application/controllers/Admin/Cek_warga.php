<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cek_warga  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_warga');
        $this->load->helper('url');
        $this->load->library('upload');
        
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {


       $nama = $this->session->userdata('nama_lengkap');
       $data['warga'] = $this->M_warga->cek_login_warga($nama);
       $this->load->view('Admin/Cek.profil.warga.php', $data);
   }

   public function cek_warga()
   {
    $data = (object)array();
    $nik = $this->input->post('input_check_nik');
    // $nis = '2022001';
    $cek_nik = $this->M_warga->cek_warga($nik);

    $data_nik = json_encode($cek_nik);

    $decode_nik = json_decode($data_nik);

    if ($decode_nik != NULL) {

        $hasil = "Data Ada";
        $data->result  = TRUE;
        $data->success         = TRUE;
        $data->message        = "True !";

    }else{

        $hasil = "Data Kosong";
        $data->result = FALSE ;
        $data->status = FALSE;
    }

    echo json_encode($data);

}
public function add()
{
   date_default_timezone_set("Asia/Jakarta");
 $config['upload_path'] = './assets/upload/'; //path folder
 $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
 $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 $config['max_size']  = 100000; //Batas Ukuran

 $this->upload->initialize($config);
 if (!empty($_FILES['file']['name'])) {
   if ($this->upload->do_upload('file')) {
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

       $nik = $this->input->post('nik_baru');
       $nama_lengkap = $this->input->post('nama_lengkap');   
       $alamat = $this->input->post('alamat');             
       $jenis_kelamin = $this->input->post('jenis_kelamin');   
       $rt = $this->input->post('rt'); 

       $rw = $this->input->post('rw'); 
       $kelurahan = $this->input->post('kelurahan'); 
       $kecamatan = $this->input->post('kecamatan'); 
       $kota = $this->input->post('kota'); 
       $provinsi = $this->input->post('provinsi'); 

       $kode_pos = $this->input->post('kode_pos'); 
       $telp = $this->input->post('telp'); 
       $email = $this->input->post('email'); 
       $jumlah_anggota_keluarga = $this->input->post('jumlah_anggota_keluarga'); 
       $status = $this->input->post('status'); 

       $nama_user = $this->input->post('nama_user'); 
       $tanggal =  date('Y-m-d h:i:s');


       $data = array(
           'nik' => $nik,
           'nama_lengkap' => $nama_lengkap,
           'alamat' => $alamat,
           'jenis_kelamin' => $jenis_kelamin,
           'rt' => $rt,

           'rw' => $rw,
           'kelurahan' => $kelurahan,
           'kecamatan' => $kecamatan,
           'kota' => $kota,
           'provinsi' => $provinsi,

           'kode_pos' => $kode_pos,
           'telp' => $telp,
           'email' => $email,
           'jumlah_anggota_keluarga' => $jumlah_anggota_keluarga,
           'file' => $file,

           'status' => $status,
           'nama_user' => $nama_user,
           'tanggal' => $tanggal

       );



       $this->M_warga->input_data($data, 'tbl_warga');
       echo $this->session->set_flashdata('msg', 'success');
       redirect('Admin/Warga');
   } else {
    echo $this->session->set_flashdata('msg', 'warning');
    redirect('Admin/Warga');
}
} else {

    redirect('Admin/Warga');
}
}

public function delete($id_warga)
{
    $id_warga = $this->input->post('id_warga');
    $this->M_warga->delete_data($id_warga);
    echo $this->session->set_flashdata('msg', 'success-hapus');
    redirect('Admin/Warga');
}

public function update()
{
    date_default_timezone_set("Asia/Jakarta");
    $config['upload_path'] = './assets/upload/'; //path folder
    $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
    $config['max_size']  = 1000000; //Batas Ukuran

    $this->upload->initialize($config);

    if (!empty($_FILES['file']['name'] )) {

        if ($this->upload->do_upload('file')) {
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
            $id_warga = $this->input->post('id_warga');
            $nik = $this->input->post('nik');
            $nama_lengkap = $this->input->post('nama_lengkap');   
            $alamat = $this->input->post('alamat');             
            $jenis_kelamin = $this->input->post('jenis_kelamin');   
            $rt = $this->input->post('rt'); 

            $rw = $this->input->post('rw'); 
            $kelurahan = $this->input->post('kelurahan'); 
            $kecamatan = $this->input->post('kecamatan'); 
            $kota = $this->input->post('kota'); 
            $provinsi = $this->input->post('provinsi'); 

            $kode_pos = $this->input->post('kode_pos'); 
            $telp = $this->input->post('telp'); 
            $email = $this->input->post('email'); 
            $jumlah_anggota_keluarga = $this->input->post('jumlah_anggota_keluarga'); 
            $status = $this->input->post('status'); 

            $nama_user = $this->input->post('nama_user'); 
            $tanggal =  date('Y-m-d h:i:s');


            $data = array(
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'rt' => $rt,

                'rw' => $rw,
                'kelurahan' => $kelurahan,
                'kecamatan' => $kecamatan,
                'kota' => $kota,
                'provinsi' => $provinsi,

                'kode_pos' => $kode_pos,
                'telp' => $telp,
                'email' => $email,
                'jumlah_anggota_keluarga' => $jumlah_anggota_keluarga,
                'file' => $file,

                'status' => $status,
                'nama_user' => $nama_user,
                'tanggal' => $tanggal

            );

            $where = array(
                'id_warga' => $id_warga
            );

            $this->M_warga->update_data($where,$data,'tbl_warga');
            echo $this->session->set_flashdata('msg', 'success_update');
            redirect('Admin/Warga');
        } else {
            echo $this->session->set_flashdata('msg', 'warning');
            redirect('Admin/Warga');
        }

    } else {

        $id_warga = $this->input->post('id_warga');
        $nik = $this->input->post('nik');
        $nama_lengkap = $this->input->post('nama_lengkap');   
        $alamat = $this->input->post('alamat');             
        $jenis_kelamin = $this->input->post('jenis_kelamin');   
        $rt = $this->input->post('rt'); 

        $rw = $this->input->post('rw'); 
        $kelurahan = $this->input->post('kelurahan'); 
        $kecamatan = $this->input->post('kecamatan'); 
        $kota = $this->input->post('kota'); 
        $provinsi = $this->input->post('provinsi'); 

        $kode_pos = $this->input->post('kode_pos'); 
        $telp = $this->input->post('telp'); 
        $email = $this->input->post('email'); 
        $jumlah_anggota_keluarga = $this->input->post('jumlah_anggota_keluarga'); 
        $status = $this->input->post('status'); 

        $nama_user = $this->input->post('nama_user'); 
        $tanggal =  date('Y-m-d h:i:s');

        $data = array(
            'nik' => $nik,
            'nama_lengkap' => $nama_lengkap,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'rt' => $rt,

            'rw' => $rw,
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kota' => $kota,
            'provinsi' => $provinsi,

            'kode_pos' => $kode_pos,
            'telp' => $telp,
            'email' => $email,
            'jumlah_anggota_keluarga' => $jumlah_anggota_keluarga,

            'status' => $status,
            'nama_user' => $nama_user,
            'tanggal' => $tanggal

        );

        $where = array(
            'id_warga' => $id_warga
        );

        $this->M_warga->update_data($where,$data,'tbl_warga');
        echo $this->session->set_flashdata('msg', 'success_update');
        redirect('Admin/Warga');
    }
}
}
