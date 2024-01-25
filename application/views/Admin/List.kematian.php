<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'Part/Sidebar.php';?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include 'Part/Topbar.php';?>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Permohonan Surat Kematian</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Permohonan Surat Kematian</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Permohonan Surat Kematian </h6>
                  <!--  <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Tambah Kematian</button> -->

                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Kematian</h5>
                          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                          </button>
                        </div>
                        <style>
                          .form-input {
                            padding-top: 5px;
                          }
                          .tambah_warga{
                            display: none;
                          }
                          .btn-cek{
                            margin-top: 40px;
                          }
                        </style>

                        <div class="modal-body">
                          <div class="modal-body">
                            <div class="row mb-4">
                              <div class="col-md-8">
                                <label>Cek Nik</label>
                                <div class="form-group form-input"> 
                                  <input type="text" name="nik" class="form-control" required="">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <button onclick="check_nik()" id="cek_nik" class="btn btn-primary btn-cek">Cek</button>
                              </div>
                            </div>
                            <form action="<?php echo base_url() . 'Admin/Kematian/add'; ?>" method="post" enctype="multipart/form-data" id="tambah_warga" class="tambah_warga">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Nik</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="nik" id="nik" class="form-control" readonly="">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>Nama Lengkap</label>
                                  <div class="form-group form-input">
                                    <input type="text" id="nama_lengkap" class="form-control" readonly="">
                                  </div>
                                </div>
                              </div>
                              <?php
                              $angka_acak = mt_rand(1, 999999); // Menghasilkan angka acak 6 digit antara 100000 dan 999999
                              ?>

                              <div class="row">
                                <div class="col-md-6">
                                  <label>Keperluan</label>
                                  <textarea class="form-control" rows="6" name="kebutuhan"></textarea>
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <label>Kode Permohonan</label>
                                      <input type="number" name="kode_permohonan" class="form-control" value="<?php echo $angka_acak;?>" readonly>
                                    </div>
                                    <style type="text/css">
                                      .informasi{
                                        color: red;
                                      }
                                    </style>
                                    <div class="col-md-12 mt-4">
                                      <label>Upload File Pemohon</label>
                                      <input type="file" name="file_pemohon" class="form-control" required="">
                                      <small class="informasi">File yang diupload berupa jpg|png|jpeg|pdf.</small>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <label>Nama Petugas</label>
                                  <?php
                                  $nama_user = $this->session->userdata('nama_lengkap');
                                  
                                  ?>
                                  <input type="text" name="nama_user" class="form-control" value="<?php echo $nama_user;?>" readonly="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">
                              <i class="bx bx-x d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                              <i class="bx bx-check d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Tambah</span>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Kode Permohonan</th>
                        <th>Nik</th>
                        <th>Nama</th>

                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Kode Permohonan</th>
                       <th>Nik</th>
                       <th>Nama</th>

                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                   </tfoot>
                   <tbody>
                    <?php
                    $no = 0;
                    foreach ($kematian->result_array() as $row) :

                      $no++;
                      $id_surat_kematian           = $row['id_surat_kematian'];
                      $nik     = $row['nik'];
                      $nama = $row['nama'];
                      $kode_permohonan = $row['kode_permohonan'];
                      $status = $row['status'];
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $kode_permohonan ?></td>
                        <td><?php echo $nik ?></td>
                        <td><?php echo $nama ?></td>

                        <td>
                         <?php if ($status == '1') { ?>
                          <span class="badge badge-success">Telah disetujui admin</span>
                        <?php }elseif($status == '2'){ ?>
                          <span class="badge badge-danger">Di Tolak</span>
                        <?php }elseif($status == '0'){?>
                          <span class="badge badge-primary">Masih Dalam Proses</span>
                        <?php }elseif($status == '3'){?>
                          <span class="badge badge-success">Sudah di setujui Lurah</span>
                        <?php } ?>
                      </td>

                      <td>
                        <div class="form-button-action">
                          <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_surat_kematian; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                          <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_surat_kematian; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
                          <!-- <a class="btn btn-link btn-warning btn-lg" data-toggle="modal" data-target="#ModalEmail<?php echo $id_surat_kematian; ?>"><i class=" fa fa-envelope" data-original-title="Edit Task" style="color:white;"></i></a> -->
                        </div>
                      </td>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!--Row-->

        <!-- Documentation Link -->
        <div class="row">
          <div class="col-lg-12">
            <p>DataTables is a third party plugin that is used to generate the demo table below. For more information
              about DataTables, please visit the official <a href="https://datatables.net/" target="_blank">DataTables
              documentation.</a></p>
            </div>
          </div>


        </div>
        <!---Container Fluid-->
      </div>


      <!-- modal hapus -->
      <?php foreach ($kematian->result_array() as $row) :
        $id_surat_kematian = $row['id_surat_kematian'];
        $nama = $row['nama'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_surat_kematian; ?>" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Kematian/delete' ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id_surat_kematian" value="<?php echo $id_surat_kematian; ?>" />

                  <p>Apakah Anda yakin mau menghapus <b><?php echo $nama; ?></b> ?</p>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                  </button>
                  <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end modal hapus -->


      <!-- modal edit -->
      <?php foreach ($kematian->result_array() as $row) :
        $id_surat_kematian = $row['id_surat_kematian'];

        $keterangan =  $row['keterangan'];
        $status = $row['status'];

        $nik = $row['nik'];
        $nama = $row['nama'];
        $tgl_lahir = $row['tgl_lahir'];
        $tgl_kematian = $row['tgl_kematian'];
        $jenis_kelamin = $row['jenis_kelamin'];

        $nik_pelapor = $row['nik_pelapor'];
        $nama_pelapor = $row['nama_pelapor'];
        $no_telp = $row['no_telp'];
        $email = $row['email'];
        $alamat = $row['alamat'];

        $ktp = $row['ktp'];
        $kk = $row['kk'];
        $lampiran_surat = $row['lampiran_surat'];




        ?>
        <div class="modal fade " id="ModalEdit<?php echo $id_surat_kematian; ?>" role="dialog" aria-hidden="true" data-backdrop="static">>
          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Update Data</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
                </button>
              </div>
              <style>
                .form-input {
                  padding-top: 5px;
                }
              </style>

              <div class="modal-body">
                <div class="modal-body">
                  <form action="<?php echo base_url() . 'Admin/Kematian/update'; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <label>Kode Permohonan</label>
                        <div class="form-group form-input">
                          <input type="text" name="kode_permohonan" value="<?php echo $row['kode_permohonan']; ?>" class="form-control" readonly>
                          <input type="hidden" name="id_surat_kematian" value="<?php echo $id_surat_kematian;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label>Nik</label>
                        <div class="form-group form-input">
                          <input type="text" name="nik" value="<?php echo $row['nik']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Nama</label>
                        <div class="form-group form-input">
                          <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Jenis Kelamin</label>
                        <div class="form-group form-input">
                          <input type="text" name="jenis_kelamin" value="<?php echo $jenis_kelamin;?>" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Tgl Lahir</label>
                        <div class="form-group form-input" readonly>
                          <input type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Tgl Kematian</label>
                        <div class="form-group form-input" readonly>
                          <input type="date" name="tgl_kematian" value="<?php echo $row['tgl_kematian']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                    </div>

                    <strong class="mb-8">Data Anggota Keluarga</strong>
                    <div class="row">
                      <div class="col-md-4">
                        <label>Nik (Anggota Keluarga)</label>
                        <div class="form-group form-input">
                          <input type="text" name="nik_pelapor" value="<?php echo $row['nik_pelapor']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Nama</label>
                        <div class="form-group form-input">
                          <input type="text" name="nama_pelapor" value="<?php echo $row['nama_pelapor']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>Status dalam Keluarga</label>
                        <div class="form-group form-input">
                          <input type="text" name="nama_pelapor" value="<?php echo $row['status_pelapor']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>No Telp.</label>
                        <div class="form-group form-input">
                          <input type="text" name="no_telp" value="<?php echo $row['no_telp']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <div class="form-group form-input">
                          <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Alamat</label>
                        <div class="form-group form-input">
                          <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label>File KTP</label>
                        <div class="form-group form-input">
                          <a href="<?php echo base_url() . "assets/upload/"; ?><?php echo $row['ktp'];?>" target="_blank" class="btn btn-primary">File KTP</a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>File KK</label>
                        <div class="form-group form-input">
                          <a href="<?php echo base_url() . "assets/upload/"; ?><?php echo $row['kk'];?>" target="_blank" class="btn btn-primary">File KK</a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label>File Lampiran Surat</label>
                        <div class="form-group form-input">
                          <a href="<?php echo base_url() . "assets/upload/"; ?><?php echo $row['lampiran_surat'];?>" target="_blank" class="btn btn-primary">File Lampiran</a>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-12">
                        <label>Status</label>
                        <div class="form-group form-input">
                         <select class="form-control" name="status">
                           <option value="<?php echo $status;?>">
                            <?php 
                            if ($status == '0') { ?>
                              Masih Dalam Proses
                            <?php }else if ($status == '1'){ ?>
                              Di Setujui oleh admin
                            <?php }else if ($status == '2'){  ?>
                              Di Tolak
                            <?php }else if ($status == '3'){ ?>
                              Sudah Di setujui Oleh Lurah
                            <?php } ?>
                          </option>

                          <?php
                          $cek_akses = $this->session->userdata('hak_akses');
                          if ($cek_akses == 'lurah') { ?>
                            <option value="3">Di setujui Oleh Lurah</option>
                            <option value="2">Di Tolak</option>

                          <?php }else{ ?>
                           <option value="0">Masih Dalam Proses</option>
                           <option value="1">Disetujui Oleh Admin</option>
                           <option value="2">Ditolak</option>
                         <?php } ?>
                       </select>
                     </div>

                   </div>
                 </div>
                 <div class="row">
                  <div class="col-md-12">
                    <label>Keterangan</label>
                    <div class="form-group form-input">
                      <textarea class="form-control" name="keterangan" required=""><?php echo $keterangan;?></textarea>
                    </div>
                  </div>
                </div>
              <!--       <div class="row">
                      <div class="col-md-6">
                        <label>File Surat</label>
                        <input type="file" name="file_surat" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Nama User</label>
                        <?php $nama_user = $this->session->userdata('nama_lengkap'); ?>
                        <input type="text" name="nama_user" class="form-control" value="<?php echo $nama_user;?>" readonly="">
                      </div>
                    </div> -->
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Proses Surat</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end modal -->
      <!-- Footer -->
      <?php include 'Part/Footer.php';?>
      <!-- Footer -->
    </div>
  </div>


  <!-- modal edit -->
  <?php foreach ($kematian->result_array() as $row) :
    $id_surat_kematian = $row['id_surat_kematian'];
    $nama_pelapor = $row['nama_pelapor'];
    ?>
    <div class="modal fade" id="ModalEmail<?php echo $id_surat_kematian; ?>" tabindex="-1" role="dialog" aria-labelledby="">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
            <h4 class="modal-title" id="myModalLabel">Kirim Data Email</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Kematian/kirim_email' ?>" method="post">
            <div class="modal-body">
              <input type="hidden" name="id_surat_kematian" value="<?php echo $id_surat_kematian; ?>" />
              <div class="row">
                <div class="col-md-12 mb-2">
                  <label>Nama Pengirim</label>
                  <?php $nama_user = $this->session->userdata('nama_lengkap'); ?>
                  <input type="text" name="nama_pengirim" class="form-control" value="<?php echo $nama_user;?>" readonly>
                </div>
                <div class="col-md-12">
                  <label>Pesan</label>
                  <input type="text" name="pesan" class="form-control" required="">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Batal</span>
              </button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Kirim Email</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- end modal hapus -->


  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include 'Part/Js.php';?>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
    function check_nik() {

      var input_check_nik = $('[name="nik"]').val();

      $.ajax({
        url: "<?= site_url('admin/ktp/cek_warga/') ?>",
        type: "POST",
        dataType: "JSON",
        data: {
          input_check_nik: input_check_nik
        },

        success: function(data) {

          if (data.result != '' ) {
               // alert(data.result[0].nik);
               document.getElementById("tambah_warga").style.display = "block";      
               $('#nik').val(data.result[0].nik);
               $('#nama_lengkap').val(data.result[0].nama_lengkap);
                // console.log(data.result[0].nik);
              }else{
               alert("Nik Tidak Ditemukan");
               
             }
           },
           error: function(jqXHR, textStatus, errorThrown) {

           }
         })
    }
  </script>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  <!-- msg -->
  <?php if ($this->session->flashData('msg') == 'warning') : ?>
    <script type="text/javascript">
      Swal.fire({
        type: 'warning',
        title: 'Perhatian !',
        heading: 'Success',
        text: "Proses Gagal !",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        bgColor: '#7EC857'
      });
    </script>

    <?php elseif ($this->session->flashData('msg') == 'success') : ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'success',
          title: 'Sukses',
          heading: 'Success',
          text: "Data Berhasil Di Tambahkan.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          bgColor: '#7EC857'
        });
      </script>
      <?php elseif ($this->session->flashData('msg') == 'success_update') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'success',
            title: 'Sukses',
            heading: 'Success',
            text: "Data Berhasil Di Update.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>
        <?php elseif ($this->session->flashData('msg') == 'success-hapus') : ?>
          <script type="text/javascript">
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              heading: 'Success',
              text: "Data Berhasil dihapus.",
              showHideTransition: 'slide',
              icon: 'success',
              hideAfter: false,
              bgColor: '#7EC857'
            });
          </script>
          <?php else : ?>

          <?php endif; ?>

        </body>

        </html>