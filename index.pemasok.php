<?php
session_start();
if (empty($_SESSION["user"]) && empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else {
    include_once("c_pemasok.php");
    $controller = new c_pemasok();
    if (isset($_GET["hapus"])) {
        $controller->hapusPemasok($_GET['hapus']);
    } else if (isset($_GET["tambah"])) {
        $controller->tambahPemasok(
            $_POST['nama_pemasok'],
            $_POST['alamat'],
            $_POST['telp']
        );
    } else {
        $controller->invoke();
    }
}
