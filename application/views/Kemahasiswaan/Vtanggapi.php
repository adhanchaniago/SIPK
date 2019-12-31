
</br>
  <h1>Pengajuan Proposal</h1>
</br>
</br>
  <form class="" action="<?= base_url('ControllerKemahasiswaan/AksiTanggapi') ?>" method="post">

  <input type="hidden" name="id_proposal" value="<?= $proposal->id_proposal ?>">
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nama" >Nama Kegiatan </label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="" value="<?= $proposal->nama ?>" disabled>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tempat" >Tempat </label>
          <input type="text" name="tempat" class="form-control" id="tempat" placeholder="" value="<?= $proposal->tempat ?>" disabled>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tgl" >Tanggal </label>
          <input type="date" name="tanggal" class="form-control" id="tgl" placeholder="" value="<?= $proposal->tanggal ?>" disabled>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tgl" >Waktu </label>
          <input type="text" name="waktu" class="form-control" id="tgl" placeholder="" value="<?= $proposal->waktu ?>" disabled>
          </div>
      </div>
     <div class="form-row">
      <div class="form-group col-6">

      <label>Deskripsi</label>
      <textarea type="text" name="deskripsi" class="form-control" disabled><?= $proposal->deskripsi  ?></textarea>
    </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">

        <a class="btn btn-success" href="<?= base_url('assets/proposal/').$proposal->file.".pdf" ?>">Lihat File</a>
        </div>
      </div>
      <hr>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Beri Tanggapan</label><br>
          <select name="status">
            <option value="belum ada tanggapan" <?php if($proposal->status == "belum ada tanggapan"){echo "selected";} ?>>belum ada tanggapan</option>
            <option value="ditolak" <?php if($proposal->status == "ditolak"){echo "selected";} ?>>Tolak</option>
            <option value="disetujui" <?php if($proposal->status == "distujui"){echo "selected";} ?>>Setujui</option>
          </select>

        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Komentar</label>
          <textarea type="text" name="komentar" class="form-control"><?= $proposal->komentar ?></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">

          <input type="submit"  class="btn btn-primary" name="submit" value="Tanggapi">
        </div>
      </div>
    </form>
