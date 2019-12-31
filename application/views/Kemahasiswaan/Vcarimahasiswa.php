<br><h1>Cari Mahasiswa</h1>
<br>
<form class="form-group" action="<?= base_url('ControllerKemahasiswaan/AksiCariMahasiswa/') ?>" method="post">
  <div class="row">
    <div class="col md-4 padding-0">
      <input type="text" name="key" value="" class="form-control" placeholder="Masukkan kata kunci...">
    </div>
    <div class="col md-2 padding-0">
      <input type="submit" name="submit" value="Cari" class="btn btn-primary">
    </div>
    <div class="col md-6">

    </div>
  </div>

</form>
<?php if(!empty($mahasiswa)){ ?>
<table class="table">
  <thead>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Alamat</th>
    <th>Email</th>
    <th>Aksi</th>
  </thead>
  <tbody>
    <?php $i=1;
    foreach ($mahasiswa as $key) {
      ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $key->nama ?></td>
        <td><?= $key->nim ?></td>
        <td><?= $key->alamat ?></td>
        <td><?= $key->email ?></td>
        <td><a class="btn btn-success" href="<?= base_url('ControllerKemahasiswaan/LihatProfil/').$key->id_mhs ?>">Lihat Profil</a> </td>
      </tr>
      <?php
    $i++;
  } ?>
  </tbody>
</table>
<?php }?>
