<?php
/* fungsi file ini adalah : 
   0. terhubung dengan file Controler.php yang mengatur model dan view page website  
   1. tujuan folder app/views/mahasiswa*/
class About extends Controller
{
    public function index()
    {
        $data[0] = 'About';
        $data[1] = 'About';
        $this->view("templetes/header", $data);
        $this->view('about/index');
        $this->view("templetes/footer");
    }
    public function page()
    {
        $data[0] = 'About page';
        $this->view("templetes/header", $data);
        $this->view('about/page');
        $this->view("templetes/footer");
    }
}
