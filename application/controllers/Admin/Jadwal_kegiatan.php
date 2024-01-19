<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_kegiatan  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_jadwal');
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
        $data['kegiatan'] = $this->M_jadwal->tampil_data();
        $this->load->view('Admin/List.jadwal.kegiatan.php', $data);
    }

    public function delete($id_jadwal)
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $this->M_jadwal->delete_data($id_jadwal);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/Jadwal_kegiatan');
    }

    public function add()
    {
       date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 10000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 500;
                $config['height'] = 450;
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $nama_kegiatan = $this->input->post('nama_kegiatan');
                $isi_kegiatan = $this->input->post('isi_kegiatan');
                $waktu = $this->input->post('waktu');
                $tempat = $this->input->post('tempat');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');

                $data = array(

                    'nama_kegiatan' => $nama_kegiatan,
                    'isi_kegiatan' => $isi_kegiatan,
                    'gambar' => $gambar,
                    'waktu' => $waktu,
                    'tempat' => $tempat,

                    'nama_user' => $nama_user

                );



                $this->M_jadwal->input_data($data, 'tbl_jadwal_kegiatan');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Jadwal_kegiatan');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Jadwal_kegiatan');
            }
        } else {

            redirect('Admin/Jadwal_kegiatan');
        }
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1950;
                $config['height'] = 631;
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $id_jadwal = $this->input->post('id_jadwal');
                $nama_kegiatan = $this->input->post('nama_kegiatan');
                $isi_kegiatan = $this->input->post('isi_kegiatan');
                $waktu = $this->input->post('waktu');
                $tempat = $this->input->post('tempat');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');

                $data = array(

                    'nama_kegiatan' => $nama_kegiatan,
                    'isi_kegiatan' => $isi_kegiatan,
                    'gambar' => $gambar,
                    'waktu' => $waktu,
                    'tempat' => $tempat,

                    'nama_user' => $nama_user

                );

                $where = array(
                    'id_jadwal' => $id_jadwal
                );

                $this->M_jadwal->update_data($where,$data,'tbl_jadwal_kegiatan');
                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Jadwal_kegiatan');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Jadwal_kegiatan');
            }

        } else {

          $id_jadwal = $this->input->post('id_jadwal');
          $nama_kegiatan = $this->input->post('nama_kegiatan');
          $isi_kegiatan = $this->input->post('isi_kegiatan');
          $waktu = $this->input->post('waktu');
          $tempat = $this->input->post('tempat');
          $nama_user = $this->input->post('nama_user');
          


          $data = array(

             'nama_kegiatan' => $nama_kegiatan,
             'isi_kegiatan' => $isi_kegiatan,
             'waktu' => $waktu,
             'tempat' => $tempat,

             'nama_user' => $nama_user

         );



          $where = array(
            'id_jadwal' => $id_jadwal
        );

          $cek = $this->M_jadwal->update_data($where,$data,'tbl_jadwal_kegiatan');
          echo $this->session->set_flashdata('msg', 'success_update');
          redirect('Admin/Jadwal_kegiatan');
      }
  }
}
