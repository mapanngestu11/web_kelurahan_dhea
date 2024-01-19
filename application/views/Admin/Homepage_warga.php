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
            <h1 class="h3 mb-0 text-gray-800">Selamat Datang, Di Website Kelurahan Karang Timur</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Homepage</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Pendatang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pendatang[0]->jumlah;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-folder fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Surat Kelahiran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_kelahiran[0]->jumlah;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-folder fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Permohonan KTP</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_ktp[0]->jumlah;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-folder fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Data Warga</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_warga[0]->jumlah;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <!-- Area Chart -->

            <!-- Pie Chart -->

            <!-- Invoice Example -->
            <div class="col-xl-12 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Website Kelurahan Karang Timur</h6>

                </div>
                <style type="text/css">
                  .img_gambar{
                    width: 100%;
                    padding: 5px;
                  }
                </style>
                <div class="table-responsive">
                 <img src="<?php echo base_url() . "assets/Front/img/bg1.jpg"; ?>" class="img_gambar">
               </div>
               <div class="card-footer"></div>
             </div>
           </div>

           <!-- Message From Customer-->

           <!--Row-->
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

</body>

</html>