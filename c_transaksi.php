<?php
include_once("m_transaksi.php");
include_once("m_barang.php");

class c_transaksi
{
    public $model;
    public function __construct()
    {
        $this->model = new m_transaksi();
    }

    public function invoke()
    {
        $transaksi = $this->model->getSemuaTransaksi();
        include "v_transaksi.php";
    }

    function getTransaksi($no_transaksi)
    {
        $transaksi = $this->model->getTransaksi($no_transaksi);
        return $transaksi;
    }

    function hapusTransaksi($no_transaksi)
    {
        $this->model->hapusTransaksi($no_transaksi);
        header('Location: ?');
    }

    function tambahTransaksi(
        $id_member
    ) {
        $no_transaksi = $this->model->setTransaksi(
            $_SESSION['user'],
            $id_member,
            0
        );
        include "v_tambahTransaksi.php";
    }

    function tambahDetailTransaksi(
        $no_transaksi,
        $kode_barang,
        $jml_barang
    ) {
        $model_barang = new m_barang();
        $barang = $model_barang->getBarang($kode_barang);
        foreach ($barang as $row) { 
            $stok_barang = $row['stok_barang']*1 ;
        }
        $jml_barang *= 1;

        if ($stok_barang !== null) {
            if ($stok_barang < $jml_barang) {
                include "v_tambahTransaksi.php";
                echo "<script>alert('Stok barang tidak mencukupi    Stok Barang : $stok_barang');</script>";
            } else {
                $this->model->setDetailTransaksi($no_transaksi, $kode_barang, $jml_barang);
                include "v_tambahTransaksi.php";
            }
        }
    }
}
