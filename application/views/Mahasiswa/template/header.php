<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #4682B4 ;"> <!--#34495e -->
      <!-- link ke home -->
      <?php
      $this->load->helper('url');

      ?>
      <a class="navbar-brand" href="<?php echo site_url('ControllerMahasiswa');?>"> SIPKK UPI <br> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <!-- link ke form -->
            <a class="nav-link" href="<?php echo site_url('ControllerMahasiswa');?>">Profile <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <!-- link ke form -->
            <a class="nav-link" href="<?php echo site_url('ControllerMahasiswa/JadwalKegiatan');?>">Jadwal Kegiatan <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <!-- link ke form -->
            <a class="nav-link" href="<?php echo site_url('ControllerMahasiswa/proposal');?>">Proposal <span class="sr-only">(current)</span></a>
          </li>


          <li class="nav-item">
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="kontak.php">Kontak</a> -->
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('AuthController/logout');?>">Logout<span class="sr-only">(current)</span></a>
          </li>
        </ul>

      </div>
    </nav>
    <div class="container">
