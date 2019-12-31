<br>
<h1>Profil</h1>
<hr>
<div class="row">
  <div class="col">
    <h3>Data Diri</h3>
    <div class="row">
      <div class="col">
        <table>
          <thead>

            <th></th>
            <th></th>
            <th></th>
          </thead>
          <tbody>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?= $mhs->nama  ?></td>
            </tr>
            <tr>
              <td>Nim</td>
              <td>:</td>
              <td><?= $mhs->nim  ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td><?= $mhs->email  ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?= $mhs->alamat  ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col">

      </div>
    </div>
  </div>
  <div class="col">

  </div>
</div>
<hr>
<div class="row">
  <div class="col">
    <h3>Data Prestasi</h3>
    <table class="table">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Tingkat</th>
        <th>Tahun</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach($prestasi as $key){

         ?>

        <tr>
          <td><?= $i ?></td>
          <td><?= $key->nama ?></td>
          <td><?= $key->tingkat ?></td>
          <td><?= $key->tahun ?></td>
          <td> <a class="btn btn-danger" href="<?= base_url('ControllerMahasiswa/HapusPrestasi/').$key->id_prestasi ?>">Hapus</a> <a class="btn btn-primary" href="<?= base_url('assets/prestasi/').$key->file.".pdf" ?>">Lihat</a> </td>
        </tr>

        <?php $i++; }  ?>
      </tbody>
    </table>
    <?= form_open_multipart('ControllerMahasiswa/upload_prestasi'); ?>
    <?= $error; ?>
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" name="nama" value="" placeholder="Nama Kegiatan">
        </div>
        <div class="col">
          <input type="text" class="form-control" name="tahun" value="" placeholder="tahun">
          <p></p>
        </div>

      </div>
      <div class="row">

        <div class="col">
          <input type="text" class="form-control" name="tingkat" value="" placeholder="tingkat">
        </div>
        <div class="col">
          <input type="File" id="inputGroupFile01" class="custom-file-input" name="file_prestasi" value="">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <input type="submit"  class="btn btn-primary" name="submit" value="Tambah">
        </div>

      </div>

    </form>
    <div class="row">
      <div class="col">

      </div>
    </div>
  </div>
  <div class="col">
    <h3>Proposal Diajukan</h3>
    <table class="table">
      <thead>
        <th>No</th>
        <th>Nama Kegiatan</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Status</th>
        <th>Catatan</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php $i = 1;
        foreach ($proposal as $key ) {
        ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $key->nama ?></td>
          <td><?= $key->tanggal ?></td>
          <td><?= $key->waktu ?></td>
          <td> <span class="<?php if($key->status == "disetujui"){echo 'bg-success';}else if($key->status == "ditolak"){echo 'bg-danger';}else{ echo 'bg-secondary';}  ?>"><?= $key->status ?></span> </td>
          <td><?= $key->komentar ?></td>
          <td> <?php if($key->status != "disetujui"){?> <a class="btn btn-danger" href="<?= base_url("ControllerMahasiswa/HapusProposal/").$key->id_proposal ?>">Hapus</a> <?php } ?> <a class="btn btn-primary" href="<?= base_url('assets/proposal/').$key->file.".pdf" ?>">Lihat</a> </td>
        </tr>
      <?php $i++; } ?>
      </tbody>
    </table>
  </div>

</div>
