<?php
include_once("m_member.php");

class c_member{
    public $model;
    public function __construct(){
        $this->model = new m_member();
    }

    public function invoke(){
        $member=$this->model->getSemuaMember();
        include "v_member.php";
    }

    function getMember($id_member){
        $member = $this->model->getMember($id_member);
        return $member;
    }
    
    function hapusMember($id_member){
        $this->model->hapusMember($id_member);
        header('Location: ?');
    }
    
    function tambahMember(
        $nama_member,
        $alamat,
        $telp
    ) {
        $this->model->setMember(
            $nama_member,
            $alamat,
            $telp
        );
        $this->invoke();
    }
 
    function editMember(
        $id_member,
        $nama_member,
        $alamat,
        $telp
    ) {
        $this->model->editMember(
            $id_member,
            $nama_member,
            $alamat,
            $telp
        );
        $this->invoke();
    }
}
