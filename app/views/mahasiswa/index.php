<div class="container">
  <div class="row">
    <div class="col-6">
      <?php Flasher::flash() ?>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-lg-6">
    <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Data Mahasiswa</button>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari mahasiswa..." name="keyword" id="keyword" autocomplete="off">
          <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
        </div>
      </form>
    </div>
  </div>
    <div class="row">
        <div class="col-6 mt-3">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item">
                    <?= $mhs['nama']; ?>
                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge bg-danger float-end ms-2" style="text-decoration:none;" onclick="return confirm('Yakin');">hapus</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge bg-warning float-end ms-2 tampilModalUbah" style="text-decoration:none;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">Edit</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-primary float-end ms-2" style="text-decoration:none;">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="nrp">NPM</label>
            <input type="number" class="form-control" id="npm" name="npm" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
              <option value="pilih">--- Pilih ---</option>
              <option value="Teknik Mesin">Teknik Mesin</option>
              <option value="Kedokteran">Kedokteran</option>
              <option value="Teknologi Pangan">Teknologi Pangan</option>
              <option value="Hukum">Hukum</option>
              <option value="Psikologi">Psikologi</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
