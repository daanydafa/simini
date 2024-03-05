<?php
include_once('koneksiMVC.php');

class m_barang
{
    private $kode_barang;
    private $nama_barang;
    private $harga_barang;
    private $jenis_barang;
    private $stok_barang;
    public $hasil = array();

    public function __construct(

        $kode_barang = null,
        $nama_barang = null,
        $harga_barang = null,
        $jenis_barang = null,
        $stok_barang  = null
    ) {
        $this->mysqli = new mysqli(
            'localhost',
            'root',
            'rahasia',
            'minimarket_pbd'
        );
        $this->kode_barang = $kode_barang;
        $this->nama_barang = $nama_barang;
        $this->harga_barang = $harga_barang;
        $this->jenis_barang = $jenis_barang;
        $this->stok_barang = $stok_barang;
    }

    public function setBarang(
        $nama_barang,
        $harga_barang,
        $jenis_barang,
        $stok_barang,
        $id_pemasok
    ) {
        $this->mysqli->query("call Input_Barang('$nama_barang','$harga_barang','$jenis_barang','$stok_barang', '$id_pemasok')");
    }

    function getSemuaBarang()
    {
        $pk = $this->mysqli->query("CALL Show_All_Barang");
        while ($x = mysqli_fetch_array($pk)) {
            $this->hasil[] = $x;
        }
        return  $this->hasil;
    }

    function getBarang($kode_barang)
    {
        $pk = $this->mysqli->query("Call Show_Barang('$kode_barang')");
        while ($x = mysqli_fetch_assoc($pk)) {
            array_push($this->hasil, $x);
        }
        return $this->hasil;
    }

    function getStokBarangById($kode_barang)
    {
        $pk = $this->mysqli->query("Call Show_Stok_Barang_By_Kode_Barang($kode_barang)");
        while ($x = mysqli_fetch_assoc($pk)) {
            array_push($this->hasil, $x);
        }
        return $this->hasil;
    }

    function hapusBarang($kode_barang)
    {
        $this->mysqli->query("Call Delete_Barang($kode_barang)");
    }

    function editBarang(
        $kode_barang,
        $nama_barang,
        $harga_barang,
        $jenis_barang,
        $stok_barang,
        $id_pemasok
    ) {
        $this->mysqli->query("Call Update_Barang('$kode_barang,','$nama_barang','$harga_barang','$jenis_barang','$stok_barang','$id_pemasok')");
    }
}
