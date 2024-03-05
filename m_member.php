<?php
include_once('koneksiMVC.php');

class m_member {
    private $id_member;
    private $nama_member;
    private $alamat;
    private $telp;
    public $hasil = array();

    public function __construct(
        
        $id_member = null,
        $nama_member = null,
        $alamat = null,
        $telp = null
    ) {
        $this->mysqli = new mysqli(
            'localhost',
            'root',
            'rahasia',
            'minimarket_pbd'
        );
        $this->id_member = $id_member;
        $this->nama_member = $nama_member;
        $this->alamat = $alamat;
        $this->telp = $telp;
    }

    public function setMember(
        $nama_member,
        $alamat,
        $telp
    ) {
        $this->mysqli->query("Call Input_Member('$nama_member','$alamat','$telp')");
    }

    function getSemuaMember(){
        $pk = $this->mysqli->query("Call Show_All_Member");
        while ($x = mysqli_fetch_array($pk)) {
            $this->hasil[] = $x;
        }
        return  $this->hasil;
    }

    function getMember($id_member){
        $pk = $this->mysqli->query("call Show_Member('$id_member')");
        while ($x = mysqli_fetch_assoc($pk)) {
            array_push($this->hasil, $x);
        }
        return $this->hasil;
    }
   
    function hapusMember($id_member){
        $this->mysqli->query("Call Delete_Member('$id_member')");
    }
    
    function editMember(
        $id_member,
        $nama_member,
        $alamat,
        $telp
    ) {
        $this->mysqli->query("Call Update_Member('$id_member','$nama_member','$alamat','$telp')");
    }
}
