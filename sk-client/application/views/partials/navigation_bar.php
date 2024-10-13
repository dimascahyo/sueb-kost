<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url("assets/style.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/font.css") ?>">
  <title>Document</title>
  <style>
  * {
    list-style: none;
    text-decoration: none;
  }

  nav {
    position: fixed;
    width: 100%;
    background-color: #fff;
    box-shadow: 0px 1px 5px #aaa;
  }

  nav .container {
    width: 100%;
    height: 100%;
    max-width: 1080px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: auto;
    padding: 1.5rem 0;
  }

  nav .container h1.title {
    font-weight: 700;
    color: #047857;
  }

  nav ul {
    display: flex;
    flex-direction: row;
    gap: 2rem;
  }

  nav li {
    font-weight: 500;
  }

  nav a {
    color: #047857;

  }
  </style>
</head>

<body>

  <nav>
    <div class="container">
      <h1 class="title">SuebKost</h1>
      <ul>
        <li><a href="<?php echo site_url("admin/penghuni"); ?>">Penghuni</a></li>
        <li><a href="<?php echo site_url("admin/adzan"); ?>">Jadwal Sholat</a></li>
        <li><a href="<?php echo site_url("admin/pengaduan"); ?>"> Pengaduan</a></li>
        <li><a href="<?php echo site_url("admin/tamu"); ?>">Tamu</a></li>
        <li><a href="<?php echo site_url("auth"); ?>">Keluar</a></li>
      </ul>
    </div>
  </nav>

</body>

</html>