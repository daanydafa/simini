<?php
include_once("m_barang.php");

class c_barang{
    public $model;
    public function __construct(){
        $this->model = new m_barang();
    }

    public function invoke(){
        $barang = $this->model->getSemuaBarang();
        include "v_barang.php";
    }

    function getBarang($kode_barang){
        $barang = $this->model->getBarang($kode_barang);
        return $barang;
    }

    function getStokBarangbyId($kode_barang){
        $barang = $this->model->getBarang($kode_barang);
        return $barang;
    }
    
    function hapusBarang($kode_barang){
        $this->model->hapusBarang($kode_barang);
        header('Location: ?');
    }
    
    function tambahBarang(
        $nama_barang,
        $harga_barang,
        $jenis_barang,
        $stok_barang,
        $id_pemasok
    ) {
        $this->model->setBarang(
            $nama_barang,
            $harga_barang,
            $jenis_barang,
            $stok_barang,
            $id_pemasok
        );
        $this->invoke();
    }
 
    function editBarang(
        $kode_barang,
        $nama_barang,
        $harga_barang,
        $jenis_barang,
        $stok_barang,
        $id_pemasok
    ) {
        $this->model->editBarang(
            $kode_barang,
            $nama_barang,
            $harga_barang,
            $jenis_barang,
            $stok_barang,
            $id_pemasok
        );
        $this->invoke();
    }
}
