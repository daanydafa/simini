<?php
include_once('koneksiMVC.php');

class m_transaksi
{
    private $no_transaksi;
    private $id_pegawai;
    private $id_member;
    private $tgl_transaksi;
    private $total_harga;
    private $kode_barang;
    private $jml_barang;
    public $hasil = array();

    public function __construct(

        $no_transaksi = null,
        $id_pegawai = null,
        $id_member = null,
        $tgl_transaksi = null,
        $total_harga = null,
        $kode_barang = null,
        $jml_barang = null
    ) {
        $this->mysqli = new mysqli(
            'localhost',
            'root',
            'rahasia',
            'minimarket_pbd'
        );
        $this->no_transaksi = $no_transaksi;
        $this->id_pegawai = $id_pegawai;
        $this->id_member = $id_member;
        $this->tgl_transaksi = $tgl_transaksi;
        $this->total_harga = $total_harga;
        $this->kode_barang = $kode_barang;
        $this->jml_barang = $jml_barang;
    }

    public function setTransaksi(
        $id_pegawai,
        $id_member,
        $total_harga
    ) {
        $this->mysqli->query("CALL Input_Transaksi('$id_pegawai', $id_member, $total_harga, @no_transac);");
        $result = $this->mysqli->query("SELECT @no_transac AS no_transac;");
        $row = $result->fetch_assoc();
        return $row['no_transac'];
    }

    public function setDetailTransaksi(
        $no_transaksi,
        $kode_barang,
        $jml_barang
    ) {
        $this->mysqli->query("call Input_Detail_Transaksi('$no_transaksi','$kode_barang','$jml_barang');");
    }

    function getSemuaTransaksi()
    {
        $pk = $this->mysqli->query("call Show_All_Transaksi()");
        while ($x = mysqli_fetch_array($pk)) {
            $this->hasil[] = $x;
        }
        return  $this->hasil;
    }

    function getTransaksi($no_transaksi)
    {
        $pk = $this->mysqli->query("call Show_Transaksi('$no_transaksi')");
        while ($x = mysqli_fetch_assoc($pk)) {
            array_push($this->hasil, $x);
        }
        return $this->hasil;
    }

    function hapusTransaksi($no_transaksi)
    {
        $this->mysqli->query("call Delete_Transaksi('$no_transaksi')");
    }

    function getDetailTransaksi($no_transaksi)
    {
        $pk = $this->mysqli->query("Call Show_Detail_Barang ('$no_transaksi')");
        while ($x = mysqli_fetch_assoc($pk)) {
            array_push($this->hasil, $x);
        }
        return $this->hasil;
    }
}
