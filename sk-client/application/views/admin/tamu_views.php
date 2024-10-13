<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuebKost</title>
  <style>
  section {
    width: 100%;
    /* padding-top: 5rem; */
  }

  section.tamu-section {
    width: 100%;
  }

  section .tamu-container {
    max-width: 1080px;
    margin: auto;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 7rem 0;
  }

  section .tamu-container h4 {
    align-self: flex-start;
    font-size: 2rem;
    font-weight: 600;

    margin-bottom: 1rem;
  }

  section .tamu-container .tamu-table-wrapper {
    width: 100%;
    /* margin-top: 3rem; */
    overflow-x: auto;
    border-radius: 5px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  }

  a.btn {
    align-self: flex-start;
    display: block;
    color: #fff;
    background-color: #10B981;
    font-size: 1rem;
    font-weight: 500;
    padding: 12px 24px;
    border-radius: .2rem;
    -webkit-border-radius: .2rem;
    -moz-border-radius: .2rem;
    -ms-border-radius: .2rem;
    -o-border-radius: .2rem;
    box-shadow: 0px 0px 2px rgba(0, 0, 0, .2);
    margin-bottom: 1.5rem;
    cursor: pointer;
  }

  table,
  th,
  td {
    border-collapse: collapse;

  }

  section .tamu-container .tamu-table-wrapper table {
    background-color: #fff;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    width: 100%;
    padding-bottom: 1rem;
  }


  section .tamu-container .tamu-table-wrapper table thead tr th {
    padding: 1rem 2rem;
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    text-align: left;
    background-color: #059669;
  }


  section .tamu-container .tamu-table-wrapper table tbody tr:nth-child(even) {
    background-color: #ecfdf5;
  }

  section .tamu-container .tamu-table-wrapper table tbody tr td {
    padding: 1rem 2rem;
    font-size: .8rem;
    color: #333;
    font-weight: 500;
    white-space: nowrap;
  }
  </style>
</head>

<body>
  <?php $this->load->view('partials/navigation_bar'); ?>

  <section>

    <section class="tamu-section" id="tamu">
      <div class="tamu-container">
        <h4>Data Tamu</h4>
        <a href="<?= base_url(); ?>admin/tamu/tambah" class="btn">Tambah Data Tamu</a>
        <div class="tamu-table-wrapper">
          <table width="90%">
            <thead>
              <tr>
                <th>Id Kamar</th>
                <th>Nama Penghuni</th>
                <th>Nama Tamu</th>
                <th>Kontak Tamu</th>
                <th>Alasan</th>
              </tr>
            </thead>
            <tbody class="tamu-table-row">
              <?php foreach ($tamu as $tamu) { ?>
              <tr>
                <td><?php echo $tamu['id_kamar'] ?></td>
                <td><?php echo $tamu['nama_penghuni'] ?></td>
                <td><?php echo $tamu['nama_tamu'] ?></td>
                <td><?php echo $tamu['kontak_tamu'] ?></td>
                <td><?php echo $tamu['alasan'] ?></td>

              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </section>


  </section>

</body>

</html>