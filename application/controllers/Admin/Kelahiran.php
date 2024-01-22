<?php defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


class Kelahiran  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelahiran');
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
        $data['kelahiran'] = $this->M_kelahiran->tampil_data();
        $this->load->view('Admin/List.kelahiran.php', $data);
    }

    public function kirim_email()
    {
        $id_surat_kelahiran = $this->input->post('id_surat_kelahiran');

        $data = $this->M_kelahiran->cek_data_surat($id_surat_kelahiran)->result();

        $cek_email = $data['0']->email;
        $kode_permohonan =  $data['0']->kode_permohonan;
        $nama = $data['0']->nama;

        $mail = new PHPMailer(true);

        $pesan         = $this->input->post('pesan');
        $nama_pengirim      = $this->input->post('nama_pengirim');
        $email              =  $cek_email;


        $mail->isSMTP();      
         $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'Dheakajbs1@gmail.com';   
            $mail->Password   = 'spputfauyrdqlfdf';                  // SMTP username
            
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for 
            $mail->setFrom('Dheakajbs1@gmail.com');
            $mail->addAddress($email, $nama_pengirim);     // Add a recipient

            $mail->addReplyTo('Dheakajbs1@gmail.com');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Informasi Permohonan Surat Kelahiran, Kelurahan Karang Timur';
            $mail->Body    = '<h1>Halo,' .$nama. '.</h1> <p> Permohonan Surat kamu dengan nomor : <strong>' .$kode_permohonan. ' </strong>, Sudah selesai anda bisa langsung untuk mengambilnya di Kelurahan Karang Timur. Note Pesan : ' .$pesan. '</p> ';

            if ($mail->send()) {
             echo $this->session->set_flashdata('msg', 'success');
             redirect('Admin/Kelahiran');
         } else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

    public function laporan_kelahiran()
    {
        $data['kelahiran'] = $this->M_kelahiran->tampil_data();
        $this->load->view('Admin/List.laporan.kelahiran.php', $data);
    }


    public function cetak_laporan_kelahiran ()
    {
       $tanggal = $this->input->post('tanggal');
       $bulan = date('m', strtotime($tanggal));

       $cek_bulan = date('F', strtotime($tanggal));

       $data['keterangan'] = 'Permohonan Pembuatan Surat Kelahiran';
       $data['laporan'] = $this->M_kelahiran->cetak_laporan($bulan);
       $jumlah = $this->M_kelahiran->cetak_laporan_jumlah ($bulan);
       $setuju = $this->M_kelahiran->cetak_laporan_setuju ($bulan);
       $proses = $this->M_kelahiran->cetak_laporan_proses ($bulan);
       $tolak = $this->M_kelahiran->cetak_laporan_tolak ($bulan);



       $data['informasi'] = array( 
        'bulan' => $cek_bulan,
        'jumlah' => $jumlah,
        'setuju' => $setuju,
        'proses' => $proses,
        'tolak' => $tolak,

    );
       $this->load->view('Admin/Cetak_laporan_kelahiran.php',$data);

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

public function delete($id_surat_kelahiran) 
{
    $id_surat_kelahiran = $this->input->post('id_surat_kelahiran');
    $this->M_kelahiran->delete_data($id_surat_kelahiran);
    echo $this->session->set_flashdata('msg', 'success-hapus');
    redirect('Admin/Kelahiran');
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

                $this->M_kelahiran->input_data($data, 'tbl_surat_kelahiran');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Kelahiran');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Kelahiran');
            }
        } else {

            redirect('Admin/Kelahiran');
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
                $id_surat_kelahiran = $this->input->post('id_surat_kelahiran');
                $status = $this->input->post('status');
                $keterangan = $this->input->post('keterangan');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');

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



                $data = array(

                    'status' => $status,
                    'keterangan' => $keterangan,
                    'file_surat' => $file,
                    'nama_user' => $nama_user,
                    'tanggal' => $tanggal,

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

                );


                $where = array(
                    'id_surat_kelahiran' => $id_surat_kelahiran
                );

                $this->M_kelahiran->update_data($where,$data,'tbl_surat_kelahiran');
                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Kelahiran');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Kelahiran');
            }

        } else {

            $id_surat_kelahiran = $this->input->post('id_surat_kelahiran');
            $status = $this->input->post('status');
            $keterangan = $this->input->post('keterangan');
            $nama_user = $this->input->post('nama_user');
            $tanggal =  date('Y-m-d h:i:s');

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

            $data = array(

                'status' => $status,
                'keterangan' => $keterangan,
                'nama_user' => $nama_user,
                'tanggal' => $tanggal,

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

            );

            

            $where = array(
                'id_surat_kelahiran' => $id_surat_kelahiran
            );

            $this->M_kelahiran->update_data($where,$data,'tbl_surat_kelahiran');
            echo $this->session->set_flashdata('msg', 'success_update');

            $data = $this->M_kelahiran->cek_data_surat($id_surat_kelahiran)->result();

            $cek_email = $data['0']->email;
            $kode_permohonan =  $data['0']->kode_permohonan;
            $nama = $data['0']->nama;



            $mail = new PHPMailer(true);

            $pesan              = $keterangan;
            $nama_pengirim      = $this->input->post('nama_pengirim');
            $email              =  $cek_email;

            if ($status  == '1') {
                $cek_status = 'Di Setujui oleh admin Kelurahan';
            } elseif ($status == '2') {
                $cek_status = 'Di Tolak';
            } elseif ($status == '0') {
                $cek_status = 'Masih Menunggu';
            } elseif ($status == '3') {
                $cek_status = 'Sudah Disetujui oleh Lurah';
            }

            if ($cek_status == '3') {
               $mail->isSMTP();      

            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'Dheakajbs1@gmail.com';   
            $mail->Password   = 'spputfauyrdqlfdf';                  // SMTP username
            
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for 
            $mail->setFrom('Dheakajbs1@gmail.com');
            $mail->addAddress($email, $nama_pengirim);     // Add a recipient

            $mail->addReplyTo('Dheakajbs1@gmail.com');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Informasi Permohonan KTP Kelurahan Karang Timur';
            $mail->Body    = '
            <H1>Notifikasi Kelurahan Karang Timur</h1>
            <br>
            <p>Salam Sejahtera,</p>
            <h3>Terima Kasih, <strong>'.$nama.'</strong></h3> <p> sudah melakukan <strong>Permohonan Surat Kelahiran</strong>.</p><p> Permohonan Surat Kelahiran dengan nomor : <strong>' .$kode_permohonan. ' </strong>, Saat ini : <strong> '.$cek_status.' </strong> , Mohon untuk datang Ke Kelurahan Karang Timur Setelah 2 -3 Hari Setelah Menerima email ini.<br>Keterangan lebih lanjut sebagai berikut : ' .$pesan. '</p> 
            <br>
            <p>Terimakasih atas perhatiannya</p>
            <p>Hormat Kami</p>
            <br><p>Kelurahan Karang Timur</p>

            <br>
            <small>Email ini dikirimkan otomatis. Mohon jangan membalas email ini.</small>

            ';

            if ($mail->send()) {
             // echo $this->session->set_flashdata('msg', 'success');
             // redirect('Admin/Ktp');
            } else {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
           $mail->isSMTP();      

            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'Dheakajbs1@gmail.com';   
            $mail->Password   = 'spputfauyrdqlfdf';                  // SMTP username
            
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for 
            $mail->setFrom('Dheakajbs1@gmail.com');
            $mail->addAddress($email, $nama_pengirim);     // Add a recipient

            $mail->addReplyTo('Dheakajbs1@gmail.com');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Informasi Permohonan Surat Kelahiran Kelurahan Karang Timur';
            $mail->Body    = '
            <H1>Notifikasi Kelurahan Karang Timur</h1>
            <br>
            <p>Salam Sejahtera,</p>
            <h3>Terima Kasih, <strong>'.$nama.'</strong></h3> <p> sudah melakukan <strong>Permohonan Surat Kelahiran</strong>.</p><p> Permohonan surat tersebut dengan nomor : <strong>' .$kode_permohonan. ' </strong>, Saat ini sedang tahap : <strong> '.$cek_status.' </strong> , Keterangan lebih lanjut sebagai berikut : ' .$pesan. '</p> 
            <br>
            <p>Terimakasih atas perhatiannya</p>
            <p>Hormat Kami</p>
            <br><p>Kelurahan Karang Timur</p>

            <br>
            <small>Email ini dikirimkan otomatis. Mohon jangan membalas email ini.</small>

            ';

            if ($mail->send()) {

            } else {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }



        redirect('Admin/Kelahiran');
    }

}
}
