<?php
include_once("m_pegawai.php");

class c_pegawai
{
    public $model;
    public function __construct()
    {
        $this->model = new m_pegawai();
    }

    public function invoke()
    {
        $pegawai = $this->model->getSemuaPegawai();
        include "v_pegawai.php";
    }

    function getPegawai($id_pegawai)
    {
        $pegawai = $this->model->getPegawai($id_pegawai);
        return $pegawai;
    }

    function hapusPegawai($id_pegawai)
    {
        $this->model->hapusPegawai($id_pegawai);
        header('Location: ?');
    }

    function tambahPegawai(
        $id_pegawai,
        $nama_pegawai,
        $id_posisi,
        $kode_akses,
        $alamat,
        $no_telp
    ) {
        $this->model->setPegawai(
            $id_pegawai,
            $nama_pegawai,
            $id_posisi,
            $kode_akses,
            $alamat,
            $no_telp
        );
        $this->invoke();
    }

    function editPegawai(
        $id_pegawai,
        $nama_pegawai,
        $id_posisi,
        $kode_akses,
        $alamat,
        $no_telp
    ) {
        $this->model->editPegawai(
            $id_pegawai,
            $nama_pegawai,
            $id_posisi,
            $kode_akses,
            $alamat,
            $no_telp
        );
        $this->invoke();
    }
}
