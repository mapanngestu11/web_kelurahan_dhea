<?php defined('BASEPATH') or exit('No direct script access allowed');

class User  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {
        $data['user'] = $this->M_user->tampil_data();
        $this->load->view('Admin/List.user.php', $data);
    }
    public function add()
    {
        date_default_timezone_set("Asia/Jakarta");
        $nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $hak_akses = $this->input->post('hak_akses');
        $waktu =  date('Y-m-d h:i:s');


        $data = array(
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'hak_akses' => $hak_akses,
            'waktu' => $waktu
        );

        $this->M_user->input_data($data, 'tbl_user');
        echo $this->session->set_flashdata('msg', 'success');
        redirect('Admin/User');
    }

    public function delete($id_user)
    {
        $id_user = $this->input->post('id_user');
        $this->M_user->delete_data($id_user);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/User');
    }

    public function update($kode_pegawai)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id_user = $this->input->post('id_user');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $hak_akses = $this->input->post('hak_akses');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $waktu =  date('Y-m-d h:i:s');

        $data = array(
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'hak_akses' => $hak_akses,
            'waktu' => $waktu
        );

        $where = array(
            'id_user' => $id_user
        );

        $this->M_user->update_data($where, $data, 'tbl_user');
        echo $this->session->set_flashdata('msg', 'info-update');
        redirect('Admin/User');
    }
}
