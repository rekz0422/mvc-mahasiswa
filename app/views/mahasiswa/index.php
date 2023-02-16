    <!-- 
    fungsi file ini : 
    1. nampilin bagian body{} dari page website kita
 -->

    <div class="container mt-2">
        <div class="row mb-1">
            <div class="col-sm-6">
                <?php FLash_msg::flash(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">

                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Masukan Nama Mahasiswa" aria-label="Recipient's username" aria-describedby="btn_cari" autocomplete="off" name="key">

                        <button class="btn btn-success" type="submit" id="btn_cari">cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn form-control btn-outline-success mb-3 tombol_tambahMhs" data-bs-toggle="modal" data-bs-target="#formModal">
                    Tambah
                </button>

                <h3>Daftar Mahasiswa</h3>
                <ul class="list-group">
                    <?php
                    foreach ($data[1] as $mhs) : ?>
                        <li class="list-group-item" aria-current="true">
                            <?= $mhs[1]; ?>
                            <a href="<?= BASEURL; ?>/Mahasiswa/hapus/<?= $mhs[0]; ?>" class="float-end badge rounded-pill text-bg-danger" onclick='return confirm("hapus data <?= $mhs[1] ?> ?" )'>hapus</a>

                            <a class="ubah_mhs float-end me-2 badge rounded-pill text-bg-warning" data-bs-toggle="modal" data-bs-target="#formModal<?= $mhs[0]; ?>">ubah</a>

                            <a href=" <?= BASEURL; ?>/Mahasiswa/detail/<?= $mhs[0]; ?>" class="float-end me-2 badge rounded-pill text-bg-secondary">detail</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- modal tambah data mhs  -->

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/Mahasiswa/tambah" method="post">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="nama" placeholder="." required>
                            <label for="nama">Nama Mahasiswa</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" name="nim" class="form-control" placeholder="." required>
                            <label for="nim">Nim Mahasiswa</label>
                        </div>
                        <div class="form-floating mb-2">
                            <select class="form-select" aria-label="Floating label select" id="jurusan" name="jurusan">
                                <option value="Teknik Informasi">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                            <label for="jurusan">Jurusan</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control" name="email" placeholder=".">
                            <label for="email">Email Mahasiswa</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    $mhs = array();
    foreach ($data[1] as $mhs) : ?>
        <!-- Modal ubah -->
        <div class="modal fade" id="formModal<?= $mhs[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?= BASEURL; ?>/Mahasiswa/ubah" method="post">
                            <input type="text" class="form-control mb-2" value="<?= $mhs[0] ?>" name="id_mhs" placeholder="." readonly>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" value="<?= $mhs[1] ?>" name="nama" placeholder="." required>
                                <label for="nama">Nama Mahasiswa</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="number" name="nim" value="<?= $mhs[2] ?>" class="form-control" placeholder="." required>
                                <label for="nim">Nim Mahasiswa</label>
                            </div>
                            <div class="form-floating mb-2">
                                <?php
                                $opt = array("Teknik Infromatika", "Sistem Informasi");
                                $jur = $mhs[3];
                                ?>
                                <select class="form-select" aria-label="Floating label select" id="jurusan" name="jurusan">
                                    <?php foreach ($opt as $opts) :
                                        if ($jur == $opts) { ?>
                                            <option value="<?= $opts ?>" selected><?= $opts ?>
                                            </option><?php } else { ?>
                                            <option value="<?= $opts ?>"><?= $opts ?></option>
                                        <?php } ?>
                                    <?php endforeach ?>
                                </select>
                                <label for="jurusan">Jurusan</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" value="<?= $mhs[4] ?>" name="email" placeholder=".">
                                <label for="email">Email Mahasiswa</label>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>