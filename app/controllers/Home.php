<?php
/* fungsi file ini adalah : 
   0. terhubung dengan file Controler.php yang mengatur model dan view page website  
   1. tujuan folder app/views/mahasiswa*/
class Home extends Controller
{
    public function index()
    {
        $data[0] = 'Home';
        $data[1] = $this->model('User_model')->getUser();
        $this->view("templetes/header", $data);
        $this->view("home/index", $data);
        $this->view("templetes/footer");
    }
}
