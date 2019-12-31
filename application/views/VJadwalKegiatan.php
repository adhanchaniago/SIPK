<br>
<h1>Jadwal kegiatan</h1>

<table class="table">
  <thead>
    <th>No</th>
    <th>Nama</th>
    <th>Tanggal</th>
    <th>Waktu</th>
    <th>Tempat</th>
    <th>Deskripsi</th>
  </thead>
  <tbody>
    <?php $i=1; foreach($kegiatan as $key){ ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $key->nama ?></td>
        <td><?=  $key->tanggal ?></td>
        <td><?= $key->waktu ?></td>
        <td><?=  $key->tempat ?></td>
        <td><?= $key->deskripsi ?></td>
      </tr>

    <?php $i++; } ?>
  </tbody>
</table>
