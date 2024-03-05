<?php
include_once("m_pemasok.php");

class c_pemasok{
    public $model;
    public function __construct(){
        $this->model = new m_pemasok();
    }

    public function invoke(){
        $pemasok = $this->model->getSemuaPemasok();
        include "v_pemasok.php";
    }

    function getPemasok($id_pemasok){
        $pemasok = $this->model->getPemasok($id_pemasok);
        return $pemasok;
    }
    
    function hapusPemasok($id_pemasok){
        $this->model->hapusPemasok($id_pemasok);
        header('Location: ?');
    }
    
    function tambahPemasok(
        $nama_pemasok,
        $alamat,
        $telp
    ) {
        $this->model->setPemasok(
            $nama_pemasok,
            $alamat,
            $telp
        );
        $this->invoke();
    }
}
