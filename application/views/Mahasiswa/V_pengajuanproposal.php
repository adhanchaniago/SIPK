
</br>
  <h1>Pengajuan Proposal</h1>
</br>
</br>
  <?= form_open_multipart('ControllerMahasiswa/upload_proposal'); ?>

    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nama" >Nama Kegiatan </label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tempat" >Tempat </label>
          <input type="text" name="tempat" class="form-control" id="tempat" placeholder="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tgl" >Tanggal </label>
          <input type="date" name="tanggal" class="form-control" id="tgl" placeholder="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tgl" >Waktu </label>
          <input type="text" name="waktu" class="form-control" id="tgl" placeholder="">
          <small class="text-primary">contoh: 10.00-12.00 </small>
        </div>
      </div>
     <div class="form-row">
      <div class="form-group col-6">

      <label>Deskripsi</label>
      <textarea type="text" name="deskripsi" class="form-control"></textarea>
    </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">

          <input type="File" id="inputGroupFile01" class="custom-file-input" name="file_proposal" value="">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">

          <input type="submit"  class="btn btn-primary" name="submit" value="Ajukan">
        </div>
      </div>
    </form>
