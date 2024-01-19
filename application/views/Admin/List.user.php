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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data User</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data User</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                  <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Tambah User</button>

                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Data User</h5>
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
                            <form action="<?php echo base_url() . 'Admin/User/add'; ?>" method="post">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>Nama Lengkap</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="nama_lengkap" placeholder="Nama" class="form-control" required maxlength="20">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Username</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>Password</label>
                                  <div class="form-group form-input">
                                    <input type="password" class="form-control" name="password" minlength="8" placeholder="***" required>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Hak Akses</label>
                                  <div class="form-group form-input">
                                    <select name="hak_akses" class="form-control" required>
                                      <option value="">--Pilih--</option>
                                      <option value="admin"> Admin </option>
                                      <option value="lurah"> Lurah </option>

                                    </select>
                                  </div>
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($user->result_array() as $row) :

                        $no++;
                        $id_user           = $row['id_user'];
                        $nama_lengkap = $row['nama_lengkap'];
                        $username     = $row['username'];
                        $hak_akses = $row['hak_akses'];
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $nama_lengkap ?></td>
                          <td><?php echo $username ?></td>
                          <td><span class="badge badge-success"><?php echo $hak_akses;?></span></td>
                          <td>
                            <div class="form-button-action">
                              <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_user; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                              <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_user; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
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
          <?php foreach ($user->result_array() as $row) :
            $id_user = $row['id_user'];
            $nama_lengkap = $row['nama_lengkap'];
            ?>
            <div class="modal fade" id="ModalHapus<?php echo $id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                    <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo base_url() . 'Admin/User/delete' ?>" method="post">
                    <div class="modal-body">
                      <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />

                      <p>Apakah Anda yakin mau menghapus <b><?php echo $nama_lengkap; ?></b> ?</p>

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
          <?php foreach ($user->result_array() as $row) :
            $id_user = $row['id_user'];
            $nama_lengkap = $row['nama_lengkap'];
            $hak_akses    = $row['hak_akses'];

            ?>
            <div class="modal fade " id="ModalEdit<?php echo $id_user; ?>" role="dialog" aria-hidden="true" data-backdrop="static">>
              <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Update Data User</h5>
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
                      <form action="<?php echo base_url() . 'Admin/User/update'; ?>" method="post">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Nama Lengkap</label>
                            <div class="form-group form-input">
                              <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label>Username</label>
                            <div class="form-group form-input">
                              <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Kode Pegawai" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Password</label>
                            <div class="form-group form-input">
                              <input type="password" name="password" autocomplete="off"  placeholder="Ubah Password" class="form-control" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label>Hak Akses</label>
                            <div class="form-group form-input">
                              <select name="hak_akses" class="form-control" required>
                                <option value="<?php echo $row['hak_akses']; ?>"> <?php echo $row['hak_akses']; ?> </option>
                                <option value="admin"> Admin </option>
                                <option value="lurah"> Lurah </option>
                                
                              </select>
                            </div>
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
                        <span class="d-none d-sm-block">Simpan</span>
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

      <!-- Scroll to top -->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <?php include 'Part/Js.php';?>

      <!-- Page level custom scripts -->
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
        text: "Data Sudah ada .",
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
      <?php elseif ($this->session->flashData('msg') == 'info-update') : ?>
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