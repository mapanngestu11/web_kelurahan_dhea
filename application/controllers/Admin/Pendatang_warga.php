<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pendatang_warga  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pendatang');
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
        $data['pendatang'] = $this->M_pendatang->tampil_data_warga($nama);
        $this->load->view('Admin/List.pendatang.warga.php', $data);
    }

    public function laporan_pendatang()
    {
        $data['pendatang'] = $this->M_pendatang->tampil_data();
        $this->load->view('Admin/List.laporan.pendatang.php', $data);
    }

    public function cetak_laporan_pendatang ()
    {
     $tanggal = $this->input->post('tanggal');
     $bulan = date('m', strtotime($tanggal));

     $data['keterangan'] = 'Permohonan Pendatang Baru';
     $data['laporan'] = $this->M_pendatang->cetak_laporan($bulan);
     $this->load->view('Admin/Cetak_laporan.php',$data);

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
        $data->result  = $decode_nik;
        $data->success         = TRUE;
        $data->message        = "True !";

    }else{

        $hasil = "Data Kosong";
        $data->result = FALSE ;
        $data->status = FALSE;
    }

    echo json_encode($data);

}

public function delete($id_surat_pendatang)
{
    $id_surat_pendatang = $this->input->post('id_surat_pendatang');
    $this->M_pendatang->delete_data($id_surat_pendatang);
    echo $this->session->set_flashdata('msg', 'success-hapus');
    redirect('Admin/Pendatang');
}

public function add()
{

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
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');
                $status = '0';


                $data = array(
                   'kode_permohonan' => $kode_permohonan,
                   'nik' => $nik,
                   'kebutuhan' => $kebutuhan,
                   'status' => $status,
                   'file_pemohon' => $file,
                   'nama_user' => $nama_user,
                   'tanggal' => $tanggal
               );

                $this->M_pendatang->input_data($data, 'tbl_permohonan_surat_pendatang');
                echo $this->session->set_flashdata('msg', 'success');
                $nama = $this->session->userdata('nama_lengkap');
                $data['pendatang'] = $this->M_pendatang->tampil_data_warga($nama);
                $this->load->view('Admin/List.pendatang.warga.php', $data);

            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                $nama = $this->session->userdata('nama_lengkap');
                $data['pendatang'] = $this->M_pendatang->tampil_data_warga($nama);
                $this->load->view('Admin/List.pendatang.warga.php', $data);
            }
        } else {

         $nama = $this->session->userdata('nama_lengkap');
         $data['pendatang'] = $this->M_pendatang->tampil_data_warga($nama);
         $this->load->view('Admin/List.pendatang.warga.php', $data);
     }
 }

 public function update()
 {
    date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['file_surat']['name'])) {
            if ($this->upload->do_upload('file_surat')) {
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
                $id_surat_pendatang = $this->input->post('id_surat_pendatang');
                $status = $this->input->post('status');
                $keterangan = $this->input->post('keterangan');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');

                $data = array(

                    'status' => $status,
                    'keterangan' => $keterangan,
                    'file_pemohon' => $file,
                    'nama_user' => $nama_user,
                    'tanggal' => $tanggal


                );


                $where = array(
                    'id_surat_pendatang' => $id_surat_pendatang
                );

                $this->M_pendatang->update_data($where,$data,'tbl_permohonan_surat_pendatang');
                echo $this->session->set_flashdata('msg', 'success_update');
                $nama = $this->session->userdata('nama_lengkap');
                $data['pendatang'] = $this->M_pendatang->tampil_data_warga($nama);
                $this->load->view('Admin/List.pendatang.warga.php', $data);

            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                $nama = $this->session->userdata('nama_lengkap');
                $data['pendatang'] = $this->M_pendatang->tampil_data_warga($nama);
                $this->load->view('Admin/List.pendatang.warga.php', $data);
            }

        } else {

            $id_surat_pendatang = $this->input->post('id_surat_pendatang');
            $status = $this->input->post('status');
            $keterangan = $this->input->post('keterangan');
            $nama_user = $this->input->post('nama_user');
            $tanggal =  date('Y-m-d h:i:s');
            $data = array(

                'status' => $status,
                'keterangan' => $keterangan,
                'nama_user' => $nama_user,
                'tanggal' => $tanggal
            );

            

            $where = array(
                'id_surat_pendatang' => $id_surat_pendatang
            );

            $this->M_pendatang->update_data($where,$data,'tbl_permohonan_surat_pendatang');
            echo $this->session->set_flashdata('msg', 'success_update');
            $nama = $this->session->userdata('nama_lengkap');
            $data['pendatang'] = $this->M_pendatang->tampil_data_warga($nama);
            $this->load->view('Admin/List.pendatang.warga.php', $data);
        }

    }
}
