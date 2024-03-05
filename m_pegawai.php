<?php
include_once('koneksiMVC.php');

class m_pegawai
{
    private $id_pegawai;
    private $id_posisi;
    private $penaggung_jwb;
    private $nama_pegawai;
    private $alamat;
    private $kode_akses;
    private $no_telp;
    public $hasil = array();

    public function __construct(

        $id_pegawai = null,
        $id_posisi = null,
        $penaggung_jwb = null,
        $nama_pegawai = null,
        $alamat = null,
        $kode_akses = null,
        $no_telp = null
    ) {
        $this->mysqli = new mysqli(
            'localhost',
            'root',
            'rahasia',
            'minimarket_pbd'
        );
        $this->id_pegawai = $id_pegawai;
        $this->id_posisi - $id_posisi;
        $this->penaggung_jwb = $penaggung_jwb;
        $this->nama_pegawai = $nama_pegawai;
        $this->alamat = $alamat;
        $this->kode_akses = $kode_akses;
        $this->no_telp = $no_telp;
    }

    public function setPegawai(
        $id_pegawai,
        $nama_pegawai,
        $id_posisi,
        $kode_akses,
        $alamat,
        $no_telp
    ) {
        $this->mysqli->query("call Input_Pegawai('$id_pegawai','$nama_pegawai','$id_posisi','$kode_akses','$alamat','$no_telp')");
    }

    function getSemuaPegawai()
    {
        $pk = $this->mysqli->query("call Show_All_Pegawai()");
        while ($x = mysqli_fetch_array($pk)) {
            $this->hasil[] = $x;
        }
        return  $this->hasil;
    }

    function getPegawai($id_pegawai)
    {
        $pk = $this->mysqli->query("call Show_Pegawai('$id_pegawai')");
        while ($x = mysqli_fetch_assoc($pk)) {
            array_push($this->hasil, $x);
        }
        return $this->hasil;
    }

    function hapusPegawai($id_pegawai)
    {
        $this->mysqli->query("call Delete_Pegawai('$id_pegawai')");
    }

    function editPegawai(
        $id_pegawai,
        $nama_pegawai,
        $id_posisi,
        $kode_akses,
        $alamat,
        $no_telp
    ) {
        $this->mysqli->query("call Update_Pegawai('$id_pegawai','$nama_pegawai','$id_posisi','$kode_akses','$alamat','$no_telp')");
    }
}
