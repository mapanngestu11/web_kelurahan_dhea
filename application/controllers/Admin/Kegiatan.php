<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kegiatan');
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
        $data['kegiatan'] = $this->M_kegiatan->tampil_data();
        $this->load->view('Admin/List.kegiatan.php', $data);
    }

    public function delete($id_kegiatan)
    {
        $id_kegiatan = $this->input->post('id_kegiatan');
        $this->M_kegiatan->delete_data($id_kegiatan);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/Kegiatan');
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
                    'tanggal' => $tanggal,
                    'nama_user' => $nama_user

                );



                $this->M_kegiatan->input_data($data, 'tbl_kegiatan');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Kegiatan');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Kegiatan');
            }
        } else {

            redirect('Admin/Kegiatan');
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
                $id_kegiatan = $this->input->post('id_kegiatan');
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
                    'tanggal' => $tanggal,
                    'nama_user' => $nama_user

                );

                $where = array(
                    'id_kegiatan' => $id_kegiatan
                );

                $this->M_kegiatan->update_data($where,$data,'tbl_kegiatan');
                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Kegiatan');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Kegiatan');
            }

        } else {

          $id_kegiatan = $this->input->post('id_kegiatan');
          $nama_kegiatan = $this->input->post('nama_kegiatan');
          $isi_kegiatan = $this->input->post('isi_kegiatan');
          $waktu = $this->input->post('waktu');
          $tempat = $this->input->post('tempat');
          $nama_user = $this->input->post('nama_user');
          $tanggal =  date('Y-m-d h:i:s');


          $data = array(

           'nama_kegiatan' => $nama_kegiatan,
           'isi_kegiatan' => $isi_kegiatan,
           'waktu' => $waktu,
           'tempat' => $tempat,
           'tanggal' => $tanggal,
           'nama_user' => $nama_user

       );



          $where = array(
            'id_kegiatan' => $id_kegiatan
        );

          $cek = $this->M_kegiatan->update_data($where,$data,'tbl_kegiatan');
          echo $this->session->set_flashdata('msg', 'success_update');
          redirect('Admin/Kegiatan');
      }
  }
}
