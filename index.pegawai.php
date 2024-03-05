<?php
session_start();
if (empty($_SESSION["user"]) && empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else {
    include_once("c_pegawai.php");
    $controller = new c_pegawai();
    if (isset($_GET["hapus"])) {
        $controller->hapusPegawai($_GET['hapus']);
    } else if (isset($_GET["edit"])) {
        $controller->editPegawai(
            $_POST['id_pegawai'],
            $_POST['nama_pegawai'],
            $_POST['id_posisi'],
            $_POST['kode_akses'],
            $_POST['alamat'],
            $_POST['no_telp']
        );
    } else if (isset($_GET["tambah"])) {
        $controller->tambahPegawai(
            $_POST['id_pegawai'],
            $_POST['nama_pegawai'],
            $_POST['id_posisi'],
            $_POST['kode_akses'],
            $_POST['alamat'],
            $_POST['no_telp']
        );
    } else {
        $controller->invoke();
    }
}
