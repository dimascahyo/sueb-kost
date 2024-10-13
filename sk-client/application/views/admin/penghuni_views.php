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
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 7rem;
  }

  section .penghuni-container h4 {
    align-self: flex-start;
    font-size: 2rem;
    margin-bottom: 1rem;
    font-weight: 600;
  }

  section .penghuni-container .penghuni-table-wrapper {
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
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
    font-size: 1rem;
    font-weight: 500;
    padding: 12px 24px;
    border-radius: .2rem;
    -webkit-border-radius: .2rem;
    -moz-border-radius: .2rem;
    -ms-border-radius: .2rem;
    -o-border-radius: .2rem;
    margin-bottom: 1.5rem;
    cursor: pointer;
  }

  a.btn.action {
    display: inline-block;
    background-color: #0ea5e9;
    font-size: .8rem;
    padding: 6px 12px;
    margin-bottom: 0;
  }

  a.btn.action.delete {
    background-color: #e11d48
  }

  table,
  th,
  td {
    border-collapse: collapse;
  }

  section .penghuni-container .penghuni-table-wrapper table {
    background-color: #fff;
    width: 100%;
    padding-bottom: 1rem;
  }


  section .penghuni-container .penghuni-table-wrapper table thead tr th {
    padding: 1rem 1.5rem;
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    text-align: left;
    background-color: #059669;
  }

  section .penghuni-container .penghuni-table-wrapper table tbody tr:nth-child(even) {
    background-color: #ecfdf5;
  }

  section .penghuni-container .penghuni-table-wrapper table tbody tr td {
    padding: 1rem 1.8rem;
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

    <section class="penghuni-section" id="penghuni">
      <div class="penghuni-container">
        <h4>Data Penghuni</h4>
        <a href="<?= base_url(); ?>admin/penghuni/tambah" class="btn">Tambah Penghuni</a>
        <div class="penghuni-table-wrapper">
          <table width="90%">
            <thead>
              <tr>
                <th>id kamar</th>
                <th>nama</th>
                <th>nik</th>
                <th>kontak</th>
                <th>alamat</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody class="penghuni-table-row">
              <?php foreach ($penghuni as $phn) { ?>
              <tr>
                <td><?php echo $phn['id_kamar'] ?></td>
                <td><?php echo $phn['nama'] ?></td>
                <td><?php echo $phn['nik'] ?></td>
                <td><?php echo $phn['kontak'] ?></td>
                <td><?php echo $phn['alamat'] ?></td>
                <td><a href="<?= base_url(); ?>admin/penghuni/edit/<?= $phn['id_kamar']; ?>" class="btn action">
                    edit
                  </a>
                  <a href="<?= base_url(); ?>admin/penghuni/hapus/<?= $phn['id_kamar']; ?>"
                    onclick="return confirm('yakin?');" class="btn action delete">
                    delete
                  </a>
                </td>
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