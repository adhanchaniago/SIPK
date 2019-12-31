<br>
<h1>Proposal Masuk</h1>

<table class="table">
  <thead>
    <th>No</th>
    <th>Nama Kegiatan</th>
    <th>Deskripsi</th>
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
      <td><?= $key->deskripsi ?></td>
      <td><?= $key->tanggal ?></td>
      <td><?= $key->waktu ?></td>
      <td> <span class="<?php if($key->status == "disetujui"){echo 'bg-success';}else if($key->status == "ditolak"){echo 'bg-danger';}else{ echo 'bg-secondary';}  ?>"><?= $key->status ?></span> </td>
      <td><?= $key->komentar ?></td>
      <td>  <a class="btn btn-success" href="<?= base_url("ControllerKemahasiswaan/TanggapiProposal/").$key->id_proposal ?>">Tanggapi</a> <a class="btn btn-primary" href="<?= base_url('assets/proposal/').$key->file.".pdf" ?>">Lihat</a> </td>
    </tr>
  <?php $i++; } ?>
  </tbody>
</table>
