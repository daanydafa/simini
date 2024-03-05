<?php
session_start();
if (empty($_SESSION["user"]) && empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else {
    include_once("c_member.php");
    $controller = new c_member();
    if (isset($_GET["hapus"])) {
        $controller->hapusMember($_GET['hapus']);
    } else if (isset($_GET["edit"])) {
        $controller->editMember(
            $_POST['id_member'],
            $_POST['nama_member'],
            $_POST['alamat'],
            $_POST['telp']
        );
    } else if (isset($_GET["tambah"])) {
        $controller->tambahMember(
            $_POST['nama_member'],
            $_POST['alamat'],
            $_POST['telp']
        );
    } else {
        $controller->invoke();
    }
}
