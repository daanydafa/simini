<?php
session_start();
if (empty($_SESSION["user"]) && empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else {
    include_once("c_barang.php");
    $controller = new c_barang();
    if (isset($_GET["hapus"])) {
        $controller->hapusBarang($_GET['hapus']);
    } else if (isset($_GET["edit"])) {
        $controller->editBarang(
            $_POST['kode_barang'],
            $_POST['nama_barang'],
            $_POST['harga_barang'],
            $_POST['jenis_barang'],
            $_POST['stok_barang'],
            $_POST['id_pemasok'],
        );
    } else if (isset($_GET["tambah"])) {
        $controller->tambahBarang(
            $_POST['nama_barang'],
            $_POST['harga_barang'],
            $_POST['jenis_barang'],
            $_POST['stok_barang'],
            $_POST['id_pemasok'],
        );
    } else {
        $controller->invoke();
    }
}
