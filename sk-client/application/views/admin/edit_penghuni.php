<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuebKost</title>
  <style>
  section {
    width: 100%;
    height: 100vh;
    /* padding-top: 5rem; */
  }

  section.penghuni-section {
    width: 100%;
  }

  section .penghuni-container {
    max-width: 1080px;
    margin: auto;
    /* height: 100%; */
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 7rem
  }

  form {
    width: 100%;
  }

  section .penghuni-container h1 {
    font-size: 2rem;
  }

  .form-container {
    width: 100%;
    margin: auto;
    margin-top: 2rem;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1.5rem;
  }

  .form-group {
    width: 48%;
  }

  .form-group label {
    font-size: 1rem;
    display: flex;
    margin-bottom: 4px;
  }

  .form-group input,
  .form-group textarea {
    border: none;
    padding: 12px 16px;
    width: 100%;
    font-size: 1rem;
    border-radius: 5px;
    box-shadow: .5px .5px 2px #aaa;
    border: 1px solid #ccc;
    resize: none;
    color: #333;
    box-sizing: border-box;
  }

  input.btn {
    width: 25%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    box-shadow: .5px .5px 2px #aaa;
    background-color: lightseagreen;
    color: #fff;
    font-size: 1.1rem;
    cursor: pointer;
  }
  </style>
</head>

<body>
  <?php $this->load->view('partials/navigation_bar'); ?>


  <section>
    <section class="penghuni-section">
      <div class="penghuni-container">
        <h1>Edit Penghuni</h1>
        <form action="" method="POST">
          <div class="form-container">
            <div class="form-group">
              <label for="id_kamar">Kamar:</label>
              <input type="text" value="<?= $penghuni['id_kamar']; ?>" id="id_kamar" name="id_kamar" required><br>
            </div>

            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" value="<?= $penghuni['nama']; ?>" id="nama" name="nama" required><br>
            </div>

            <div class="form-group">
              <label for="nik">NIK:</label>
              <input type="text" value="<?= $penghuni['nik']; ?>" id="nik" name="nik" required><br>
            </div>

            <div class="form-group">
              <label for="kontak">Kontak:</label>
              <input type="text" value="<?= $penghuni['kontak']; ?>" id="kontak" name="kontak" required><br>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat:</label>
              <textarea id="alamat" rows="4" maxlength="150" name="alamat"
                required><?= $penghuni['alamat']; ?></textarea><br>
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" id="password" value="<?= $penghuni['password']; ?>" name="password" required><br>
            </div>
          </div>
          <input type="submit" value="Edit" class="btn">
        </form>
      </div>
    </section>
  </section>
</body>

</html>