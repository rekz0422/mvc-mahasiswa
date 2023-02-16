<?php
/*  Fungsi file ini : 
    0. semua class yang ada harus dibikin manual
    1. Menyimpan segala fungsi database dalam bentuk class yang 
       digunakan oleh file lain.

*/
class Database
{
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    protected $db_con, $var_que_db, $hn;

    public function __construct()
    {
        $this->hn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->db_con = new PDO($this->hn, $this->db_user, $this->db_pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query_DB($que)
    {
        $this->var_que_db = $this->db_con->prepare($que);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->var_que_db->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->var_que_db->execute();
    }

    public function resultSet_Db()
    {
        $this->execute();
        return $this->var_que_db->fetchAll();
    }

    public function single_Db()
    {
        $this->execute();
        return $this->var_que_db->fetch();
    }

    public function rowCount()
    {
        return $this->var_que_db->rowCount();
    }
}
