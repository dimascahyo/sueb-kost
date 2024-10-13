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
    /* border: 1px solid #000; */
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
    background-color: blue;
    font-size: .8rem;
    padding: 8px 14px;
    margin-bottom: 0;
  }

  a.btn.action.delete {
    background-color: crimson
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
    padding: 1rem 2rem;
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
    padding: 1rem 2rem;
    font-size: .8rem;
    color: #333;
    font-weight: 500;
    white-space: nowrap;
    /* border-top: 1px solid black; */
  }
  </style>
</head>

<body>
  <?php $this->load->view('partials/navigation_bar_user'); ?>

  <section>

    <section class="penghuni-section" id="penghuni">
      <div class="penghuni-container">
        <h4>Data Penghuni</h4>
        <div class="penghuni-table-wrapper">
          <table width="90%">
            <thead>
              <tr>
                <th>id kamar</th>
                <th>nama</th>
                <th>kontak</th>
                <th>alamat</th>
              </tr>
            </thead>
            <tbody class="penghuni-table-row">
              <?php foreach ($penghuni as $phn) { ?>
              <tr>
                <td><?php echo $phn['id_kamar'] ?></td>
                <td><?php echo $phn['nama'] ?></td>
                <td><?php echo $phn['kontak'] ?></td>
                <td><?php echo $phn['alamat'] ?></td>
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