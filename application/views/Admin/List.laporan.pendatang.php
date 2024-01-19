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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Laporan Pendatang Baru</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Pendatang Baru</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Pendatang Baru</h6>
                  <style type="text/css">
                    .btn-cetak{
                      margin-top: 36px;
                    }
                  </style>

                  <form action="<?php echo base_url() . 'Admin/Pendatang/cetak_laporan_pendatang'; ?>" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Pilih Bulan</label>
                          <input type="month" name="tanggal" class="form-control" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-danger btn-rounded btn-cetak">Cetak Laporan</button>
                      </div>
                    </div>

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

                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                         <th>No</th>
                         <th>Kode Permohonan</th>
                         <th>Nik</th>
                         <th>Nama</th>

                         <th>Status</th>

                       </tr>
                     </tfoot>
                     <tbody>
                      <?php
                      $no = 0;
                      foreach ($pendatang->result_array() as $row) :

                        $no++;
                        $id_surat_datang           = $row['id_surat_datang'];
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
                              <span class="badge badge-success">Sudah</span>
                            <?php }elseif($status == '2'){ ?>
                              <span class="badge badge-danger">DiTolak</span>
                            <?php }elseif($status == '0'){?>
                              <span class="badge badge-primary">Proses</span>
                            <?php }?>
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
               $('#nama').val(data.result[0].nama);
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