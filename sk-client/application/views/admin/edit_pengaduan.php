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
    background-color: #10B981;
    color: #fff;
    font-size: 1.1rem;
    cursor: pointer;
  }

  input:disabled {
    cursor: not-allowed;
    background-color: #fff;
    border: 1px solid #fff;
  }


  .form-group .select select {
    border-radius: 5px;
    border: none;
    padding: 14px 12px;
    outline: none;
    flex: 1;
    color: #333;
    background-color: #fff;
    background-image: none;
    cursor: pointer;
  }


  /* Custom Select wrapper */
  .select {
    position: relative;
    display: flex;
    width: 100%;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: .5px .5px 2px #aaa;
    border: 1px solid #ccc;
  }

  /* Arrow */
  .select::after {
    content: '\25BC';
    position: absolute;
    top: 0;
    right: 0;
    padding: 1em;
    background-color: #ccc;
    transition: .25s all ease;
    pointer-events: none;
  }

  /* Transition */
  .select:hover::after {
    color: #f39c12;
  }
  </style>
</head>

<body>
  <?php $this->load->view('partials/navigation_bar'); ?>


  <section>
    <section class="penghuni-section">
      <div class="penghuni-container">
        <h1>Edit Status Pengaduan</h1>
        <form action="" method="POST">
          <div class="form-container">

            <div class="form-group">
              <label for="id">Id Pengaduan:</label>
              <input type="text" id="id" value="<?= $pengaduan['id']; ?>" placeholder="Masukkan id pengaduan" readonly
                name="id" required><br>
            </div>


            <div class="form-group">
              <label for="id_kamar">Kamar:</label>
              <input type="text" id="id_kamar" value="<?= $pengaduan['id_kamar']; ?>" placeholder="Masukkan id kamar"
                readonly name="id_kamar" required><br>
            </div>

            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" id="nama" readonly name="nama" value="<?= $pengaduan['nama']; ?>" required
                placeholder="Masukkan nama penghuni"><br>
            </div>

            <div class="form-group">
              <label for="aduan">Aduan:</label>
              <input type="text" id="aduan" readonly name="aduan" value="<?= $pengaduan['aduan']; ?>" required
                placeholder="Masukkan Aduan"><br>
            </div>

            <!-- <div class="form-group">
              <label for="status">status:</label>
              <input type="text" id="status"  name="status" value="<?= $pengaduan['status']; ?>"  placeholder="Masukkan status"><br>
            </div> -->

            <div class="form-group">
              <label for="status">Status:</label>
              <div class="select">
                <select id="status" name="status" required>
                  <option value="">Pilih status</option>
                  <option id="status" name="status" value="Selesai"
                    <?= ($pengaduan['status'] === 'Selesai') ? 'selected' : ''; ?>>
                    Selesai
                  </option>
                  <option id="status" name="status" value="Belum Selesai"
                    <?= ($pengaduan['status'] === 'Belum Selesai') ? 'selected' : ''; ?>>
                    Belum Selesai
                  </option>
                </select>
              </div>
            </div>
          </div>
          <input type="submit" value="Edit" class="btn">
        </form>
      </div>
    </section>
  </section>
</body>

</html>