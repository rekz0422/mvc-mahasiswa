<!-- 
    fungsi file ini : 
    1. nampilin bagian body{} dari page website kita
 -->

<div class="container mt-5" id="detail">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"> <?= $data[1][1]; ?></h5>
            <p class="card-text text-muted"> <?= $data[1][2]; ?></p>
            <p class="card-text"> <?= $data[1][3]; ?></p>
            <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-outline-dark">Kembali</a>
        </div>
    </div>
</div>