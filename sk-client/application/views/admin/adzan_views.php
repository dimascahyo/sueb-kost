<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Jadwal Sholat</title>
  <link rel="stylesheet" href="<?= base_url("assets/style.css") ?>">
  <style>
  section.jadwal-section {
    width: 100%;
  }

  section .jadwal-container {
    max-width: 1080px;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 7rem;
  }

  .jadwal-container h1 {
    font-size: 32px;
    margin-bottom: 20px;
    font-weight: 600
  }

  table,
  th,
  td {
    border-collapse: collapse;
  }

  section .jadwal-container .jadwal-table-wrapper {
    width: 100%;
    /* margin-top: 3rem; */
    overflow-x: auto;
    margin-bottom: 3rem;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
  }

  section .jadwal-container .jadwal-table-wrapper table {
    background-color: #fff;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    width: 100%;
    padding-bottom: 1rem;
  }

  section .jadwal-container .jadwal-table-wrapper table tr th {
    padding: 1rem 2rem;
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    text-align: left;
    background-color: #059669;
  }

  section .jadwal-container .jadwal-table-wrapper table tr:nth-child(odd) {
    background-color: #ecfdf5;
  }

  section .jadwal-container .jadwal-table-wrapper table tr td {
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
  <?php $this->load->view('partials/navigation_bar'); ?>


  <section class="jadwal-section">

    <div class="jadwal-container">
      <h1>Jadwal Sholat Sekitar Sueb Kost</h1>


      <div class="jadwal-table-wrapper">

        <?php if ($adzan_data) : ?>
        <table>
          <tr>
            <th>Tanggal</th>
            <th>Subuh</th>
            <th>Dzuhur</th>
            <th>Ashar</th>
            <th>Maghrib</th>
            <th>Isya</th>
          </tr>
          <?php foreach ($adzan_data as $data) : ?>
          <?php $date = date('Y-m-d', $data->date->timestamp); ?>
          <tr>
            <td><?php echo $date; ?></td>
            <td><?php echo $data->timings->Fajr; ?></td>
            <td><?php echo $data->timings->Dhuhr; ?></td>
            <td><?php echo $data->timings->Asr; ?></td>
            <td><?php echo $data->timings->Maghrib; ?></td>
            <td><?php echo $data->timings->Isha; ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
        <?php else : ?>
        <p>Data jadwal adzan tidak tersedia.</p>
        <?php endif; ?>

      </div>
    </div>
  </section>



</body>

</html>