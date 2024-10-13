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

  section.pengaduan-section {
    width: 100%;
  }

  section .pengaduan-container {
    max-width: 1080px;
    margin: auto;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 7rem 0;
  }

  section .pengaduan-container h4 {
    align-self: flex-start;
    font-size: 2rem;
    color: var(--primary);
    margin-bottom: 1rem;
  }

  section .pengaduan-container .pengaduan-table-wrapper {
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
    background-color: green;
    font-size: 1rem;
    font-weight: 500;
    padding: 12px 24px;
    border-radius: .2rem;
    -webkit-border-radius: .2rem;
    -moz-border-radius: .2rem;
    -ms-border-radius: .2rem;
    -o-border-radius: .2rem;
    box-shadow: 3px 3px var(--dark);
    margin-bottom: 1rem;
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

  section .pengaduan-container .pengaduan-table-wrapper table {
    background-color: #fff;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    width: 100%;
    padding-bottom: 1rem;
  }


  section .pengaduan-container .pengaduan-table-wrapper table thead tr th {
    padding: 1rem 2rem;
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    text-align: left;
    background-color: #059669;
  }

  section .pengaduan-container .pengaduan-table-wrapper table tbody tr:nth-child(even) {
    background-color: #ecfdf5;
  }

  section .pengaduan-container .pengaduan-table-wrapper table tbody tr td {
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

    <section class="pengaduan-section" id="pengaduan">
      <div class="pengaduan-container">
        <h4>Data Pengaduan</h4>
        <div class="pengaduan-table-wrapper">
          <table width="90%">
            <thead>
              <tr>
                <th>id kamar</th>
                <th>nama</th>
                <th>aduan</th>
                <th>status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="pengaduan-table-row">
              <?php foreach ($pengaduan as $pgd) { ?>
              <tr>
                <td><?php echo $pgd['id_kamar'] ?></td>
                <td><?php echo $pgd['nama'] ?></td>
                <td><?php echo $pgd['aduan'] ?></td>
                <td><?php echo $pgd['status'] ?></td>
                <td>
                  <a href="<?= base_url(); ?>admin/pengaduan/edit/<?= $pgd['id']; ?>" class="btn action">
                    edit
                  </a>
                  <a href="<?= base_url(); ?>admin/pengaduan/hapus/<?= $pgd['id']; ?>"
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