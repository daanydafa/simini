<?php
include_once('koneksiMVC.php');

class m_pemasok {
    private $id_pemasok;
    private $alamat;
    private $nama_pemasok;
    private $telp;
    public $hasil = array();

    public function __construct(
        
        $id_pemasok = null,
        $alamat = null,
        $nama_pemasok = null,
        $telp = null
    ) {
        $this->mysqli = new mysqli(
            'localhost',
            'root',
            'rahasia',
            'minimarket_pbd'
        );
        $this->id_pemasok = $id_pemasok;
        $this->alamat = $alamat;
        $this->nama_pemasok = $nama_pemasok;
        $this->telp = $telp;
    }

    public function setPemasok(
        $nama_pemasok,
        $alamat,
        $telp
    ) {
        $this->mysqli->query("call Input_Pemasok('$nama_pemasok','$alamat','$telp')");
    }

    function getSemuaPemasok(){
        $pk = $this->mysqli->query("call Show_All_Pemasok()");
        while ($x = mysqli_fetch_array($pk)) {
            $this->hasil[] = $x;
        }
        return  $this->hasil;
    }
    
    function getPemasok($id_pemasok){
        $pk = $this->mysqli->query("call Show_Pemasok('$id_pemasok')");
        while ($x = mysqli_fetch_assoc($pk)) {
            array_push($this->hasil, $x);
        }
        return $this->hasil;
    }
   
    function hapusPemasok($id_pemasok){
        $this->mysqli->query("call Delete_Pemasok('$id_pemasok')");
    }
}
