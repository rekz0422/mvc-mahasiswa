<?php
/* fungsi file ini adalah : 
   1. untuk  mengatur tampilan views file mahasiswa
   2. untuk mengatur model dari mahasiswa (model yang di atur bisa dikirim berupa 
      variable / array /data)
   3. tujuan folder app/views/mahasiswa
   
*/
class Mahasiswa extends Controller
{
    public function index()
    {
        $data[0] = 'data mahasiswa';
        $data[1] = $this->model('Mahasiswa_model')->getAllmhs();
        $this->view('templetes/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templetes/footer');
    }
    public function detail($id)
    {
        $data[0] = 'detail mahasiswa';
        $data[1] = $this->model('Mahasiswa_model')->getMhsid($id);
        $this->view('templetes/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templetes/footer');
    }

    public function tambah()
    {
        /* ic or sysmbol alert : 
        1. check-fill
        2. triangle-fill
        3. info-fill
        */
        if ($this->model('Mahasiswa_model')->tambahDataMhs($_POST) > 0) {
            FLash_msg::setFlash('Berhasil', 'Disimpan', 'success', 'check-fill');
            header("Location: " . BASEURL . '/mahasiswa');
            exit;
        } else {
            FLash_msg::setFlash('Gagal', 'Disimpan', 'danger', 'triangle-fill');
            header("Location: " . BASEURL . '/mahasiswa');
            exit;
        }
    }
    public function ubah()
    {
        /* ic or sysmbol alert : 
        1. check-fill
        2. triangle-fill
        3. info-fill
        */
        if ($this->model('Mahasiswa_model')->ubahDataMhs($_POST) > 0) {
            FLash_msg::setFlash('Berhasil', 'Diubah', 'success', 'check-fill');
            header("Location: " . BASEURL . '/mahasiswa');
            exit;
        } else {
            FLash_msg::setFlash('Gagal', 'Diubah', 'danger', 'triangle-fill');
            header("Location: " . BASEURL . '/mahasiswa');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMhs($id) > 0) {
            FLash_msg::setFlash('Berhasil', 'Dihapus', 'warning', 'check-fill');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            FLash_msg::setFlash('Gagal', 'Dihapus', 'danger', 'triangle-fill');
            header("Location: " . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {

        $data[0] = 'data mahasiswa';
        $data[1] = $this->model('Mahasiswa_model')->cariMhs();
        $this->view('templetes/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templetes/footer');
    }
}
