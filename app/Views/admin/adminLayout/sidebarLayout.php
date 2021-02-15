<?php $uri = service('uri')->getSegment(2); ?>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Administrator</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Halaman Utama</li>
            <li class="nav-item <?= $uri == '' ? 'active' : '' ?>"><a class="nav-link" href="/admin"><i class="fas fa-igloo"></i> <span>Utama</span></a></li>
            <li class="menu-header">Kependudukan Desa</li>
            <li class="nav-item dropdown <?= ($uri == 'penduduk' ? 'active' : ($uri == 'edit_penduduk' ? 'active' : ($uri == 'pindah' ? 'active' : ($uri == 'edit_pindah' ? 'active' : ($uri == 'kematian' ? 'active' : ($uri == 'edit_kematian' ? 'active' : ($uri == 'input_penduduk' ? 'active' : ($uri == 'input_kematian' ? 'active' : ($uri == 'input_pindah' ? 'active' : ''))))))))) ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Data Penduduk</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= ($uri == 'penduduk' ? 'active' : ($uri == 'edit_penduduk' ? 'active' : ($uri == 'input_penduduk' ? 'active' : ''))) ?>"><a class="nav-link" href="/admin/penduduk">Semua Penduduk</a></li>
                    <li class="<?= ($uri == 'kematian' ? 'active' : ($uri == 'edit_kematian' ? 'active' : ($uri == 'input_kematian' ? 'active' : ''))) ?>"><a class="nav-link" href="/admin/kematian">Kematian</a></li>
                    <li class="<?= ($uri == 'pindah' ? 'active' : ($uri == 'edit_pindah' ? 'active' : ($uri == 'input_pindah' ? 'active' : ''))) ?>"><a href="/admin/pindah" class="nav-link">Pindah</a></li>
                </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Laporan Penduduk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Semua Penduduk</a></li>
                    <li><a class="nav-link" href="layout-default.html">Penduduk Aktif</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Kematian</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Pindah</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $uri == 'surat_kematian' ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope-open-text"></i> <span>Surat Pengantar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-transparent.html">Akta Kelahiran</a></li>
                    <li class="<?= $uri == 'surat_kematian' ? 'active' : '' ?>"><a class="nav-link" href="/admin/surat_kematian">Kematian</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Domisili Penduduk</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Domisili Usaha</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Tidak Mampu</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">SKCK</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Kartu Tanda Penduduk</a></li>
                </ul>
            </li>
            <li class="menu-header">Konfigurasi</li>
            <li class="nav-item dropdown <?= ($uri == 'master_agama' ? 'active' : ($uri == 'master_negara' ? 'active' : ($uri == 'master_pendidikan' ? 'active' : ''))) ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Data Pengguna</a></li>
                    <li class="<?= $uri == 'master_agama' ? 'active' : '' ?>"><a href="/admin/master_agama">Data Agama</a></li>
                    <li class="<?= $uri == 'master_negara' ? 'active' : '' ?>"><a href="/admin/master_negara">Data Negara</a></li>
                    <li class="<?= $uri == 'master_pendidikan' ? 'active' : '' ?>"><a href="/admin/master_pendidikan">Data Pendidikan</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-door-open"></i> <span>Keluar</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-primary btn-lg btn-block btn-icon-split text-white">
                <i class="fas fa-clock"></i> <?= date_format(date_create(date('Y-m-d')), 'd F Y') ?>
            </a>
        </div>
    </aside>
</div>