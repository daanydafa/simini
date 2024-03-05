<?php
session_start();
if (empty($_SESSION["user"]) && empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
 } else {
    include_once("c_transaksi.php");
    $controller = new c_transaksi();
    if (isset($_GET["hapus"])) {
        $controller->hapusTransaksi($_GET['hapus']);
    } else if (isset($_GET["tambah"])) {
        $controller->tambahTransaksi(
            $_POST['id_member']
        );
    } else if (isset($_GET["tambahDetail"])) {
        $controller->tambahDetailTransaksi(
            $_POST['no_transaksi'],
            $_POST['kode_barang'],
            $_POST['jml_barang']
        );
    } else {
        $controller->invoke();
    }
}
