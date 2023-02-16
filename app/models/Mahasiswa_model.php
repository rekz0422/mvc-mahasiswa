<?php

/*  fungsi file model mhs : 
    1. untuk menyimpan segala jenis kode database mahasiswa 
    2. mengambil funsi database dari file core/Database.php
*/

class Mahasiswa_model
{
    private $table = 'data_mhs';
    private $db_model;


    public function __construct()
    {
        $this->db_model = new Database;
    }

    public function getAllmhs()
    {
        $this->db_model->query_Db('SELECT * FROM data_mhs ORDER BY id_mhs DESC');
        return $this->db_model->resultSet_Db();
    }

    public function getMhsid($id)
    {
        $this->db_model->query_Db('SELECT * FROM ' . $this->table . ' WHERE id_mhs=:id');
        $this->db_model->bind('id', $id);
        return $this->db_model->single_Db();
    }
    public function tambahDataMhs($dataMhs)
    {
        $que = 'INSERT INTO ' . $this->table . ' VALUES ("",?,?,?,?)';
        $this->db_model->query_Db($que);
        $this->db_model->bind(1, $dataMhs['nama']);
        $this->db_model->bind(2, $dataMhs['nim']);
        $this->db_model->bind(3, $dataMhs['jurusan']);
        $this->db_model->bind(4, $dataMhs['email']);

        $this->db_model->execute();

        return $this->db_model->rowCount();

        // return 0;
    }
    public function ubahDataMhs($dataMhs)
    {
        $que = "UPDATE data_mhs SET nama = ?,
                nim = ?,
                jurusan = ?,
                email = ? 
                WHERE id_mhs = ? ";
        $this->db_model->query_Db($que);
        $this->db_model->bind(1, $dataMhs['nama']);
        $this->db_model->bind(2, $dataMhs['nim']);
        $this->db_model->bind(3, $dataMhs['jurusan']);
        $this->db_model->bind(4, $dataMhs['email']);
        $this->db_model->bind(5, $dataMhs['id_mhs']);

        $this->db_model->execute();

        return $this->db_model->rowCount();

        // return 0;
    }
    public function hapusDataMhs($idMhs)
    {
        $que = 'DELETE FROM ' . $this->table . ' WHERE id_mhs = ?';
        $this->db_model->query_DB($que);
        $this->db_model->bind(1, $idMhs);

        $this->db_model->execute();
        return $this->db_model->rowCount();
    }

    public function cariMhs()
    {
        $key = $_POST['key'];
        $que = 'SELECT * FROM  ' . $this->table . ' WHERE nama LIKE ?';
        $this->db_model->query_DB($que);
        $this->db_model->bind(1, "%$key%");

        $this->db_model->execute();
        return $this->db_model->resultSet_Db();
    }
}
