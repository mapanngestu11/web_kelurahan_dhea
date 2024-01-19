   <?php if($this->session->userdata('hak_akses')==='admin' ):?> 
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <!-- <img src="<?php echo base_url()."assets/Admin/"; ?>img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">Administrator</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Tampilan Dashboard
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Kegiatan/') ?>">
            <i class="fas fa-fw fa-pen"></i>
            <span>Data Kegiatan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Jadwal_kegiatan/') ?>">
            <i class="fas fa-fw fa-pen"></i>
            <span>Data Jadwal Kegiatan</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Warga
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Warga/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Warga</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Permohonan Surat
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Data Permohonan Surat</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Surat</h6>
            <a class="collapse-item" href="<?php echo base_url('Admin/Ktp/') ?>">KTP Baru</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Pendatang/') ?>">Surat Pendatang</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Pindah/') ?>">Surat Pindah</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Kelahiran/') ?>">Surat Kelahiran</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Kematian/') ?>">Surat Kematian</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true"
        aria-controls="collapseTable">
        <i class="fas fa-fw fa-folder"></i>
        <span>Cetak Laporan</span>
      </a>
      <div id="laporan" class="collapse" aria-labelledby="headingTable" data-parent="#laporan">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Cetak Laporan</h6>
          <a class="collapse-item" href="<?php echo base_url('Admin/Ktp/laporan_ktp') ?>">KTP Baru</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/Pendatang/laporan_pendatang') ?>">Surat Pendatang</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/Pendatang/laporan_pindah') ?>">Surat Pindah</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/Kelahiran/laporan_kelahiran') ?>">Surat Kelahiran</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/Kematian/laporan_kematian') ?>">Surat Kematian</a>
        </div>
      </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Pengaturan
    </div>

    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('Admin/User/') ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>User Pengguna</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>
  <?php elseif($this->session->userdata('hak_akses')==='lurah'):?> 
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <!-- <img src="<?php echo base_url()."assets/Admin/"; ?>img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">Lurah</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Tampilan Dashboard
        </div>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Warga
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Warga/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Warga</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Permohonan Surat
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Data Permohonan Surat</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Surat</h6>
            <a class="collapse-item" href="<?php echo base_url('Admin/Ktp/') ?>">KTP Baru</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Pendatang/') ?>">Surat Pendatang</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Pindah/') ?>">Surat Pindah</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Kelahiran/') ?>">Surat Kelahiran</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Kematian/') ?>">Surat Kematian</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true"
        aria-controls="collapseTable">
        <i class="fas fa-fw fa-folder"></i>
        <span>Cetak Laporan</span>
      </a>
      <div id="laporan" class="collapse" aria-labelledby="headingTable" data-parent="#laporan">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Cetak Laporan</h6>
          <a class="collapse-item" href="<?php echo base_url('Admin/Ktp/laporan_ktp') ?>">KTP Baru</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/Pendatang/laporan_pendatang') ?>">Surat Pendatang</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/Kelahiran/laporan_kelahiran') ?>">Surat Kelahiran</a>
        </div>
      </div>
    </li>

    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>

  <?php elseif($this->session->userdata('hak_akses')==='warga'):?> 
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <!-- <img src="<?php echo base_url()."assets/Admin/"; ?>img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">Warga</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Admin/Homepage_warga/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Tampilan Dashboard
        </div>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Warga
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Admin/Cek_warga/') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Lihat Profil</span>
          </a>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Permohonan Surat
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Data Permohonan Surat</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Surat</h6>
            <a class="collapse-item" href="<?php echo base_url('Admin/Ktp_warga/') ?>">KTP Baru</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Pendatang_warga/') ?>">Surat Pendatang</a>
            <a class="collapse-item" href="<?php echo base_url('Admin/Kelahiran_warga/') ?>">Surat Kelahiran</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Kegiatan
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#DataKegiatan" aria-expanded="true"
        aria-controls="DataKegiatan">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Informasi Kegiatan</span>
      </a>
      <div id="DataKegiatan" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Informasi Kegiatan</h6>
          <a class="collapse-item" href="<?php echo base_url('Kegiatan/') ?>">Data Kegiatan</a>
          <a class="collapse-item" href="<?php echo base_url('Jadwal/') ?>">Jadwal Kegiatan</a>

        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>

  <?php endif;?>