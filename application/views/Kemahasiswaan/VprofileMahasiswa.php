<br>
<h1>Profil Mahasiswa</h1>
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
          <td><a class="btn btn-primary" href="<?= base_url('assets/prestasi/').$key->file.".pdf" ?>">Lihat</a> </td>
        </tr>

        <?php $i++; }  ?>
      </tbody>
    </table>
      <div class="row">
      <div class="col">

      </div>
    </div>
  </div>
  <div class="col">

  </div>

</div>
