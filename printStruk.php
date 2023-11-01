<?php include "config.php"; ?>
<html>

<head>
  <title>PRINT STRUK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./assets/css/stylePrint.css">
</head>

<body style="text-align: center;">
  <?php

  function format_ribuan($nilai)
  {
    return number_format($nilai, 0, ',', '.');
  }
  $tgl = date("jmYGi");
  $huruf = "AD";
  $kodeCart = $huruf . $tgl;

  $query = mysqli_query($conn, "SELECT * FROM keranjang");
  $total = 0;
  $tot_bayar = 0;
  $no = 1;
  while ($r = $query->fetch_assoc()) {
    $total = $r['harga_barang'] * $r['quantity'];
    $tot_bayar += $total;
    $bayar = $r['bayar'];
    $kembalian = $r['kembalian'];
  }
  error_reporting(0);
  ?>
  <div id="invoice-POS">

    <center id="top">
      <!-- <div class="logo"></div> -->
      <div class="info">
        <h2>Metskull Kitchen</h2>
      </div>
      <!--End Info-->
    </center>
    <!--End InvoiceTop-->

    <div id="mid">
      <div class="info" style="list-style: none; text-align: left;">
        <div class="" style="list-style: none; text-align: left;">
          <ul style=" list-style: none; text-align: left; font-size: 12px;">
            <li>TGL : <?php echo  date("j-m-Y"); ?></li>
            <li>JAM : <?php echo  date("G:i:s"); ?></li>
          </ul>
        </div>

      </div>
    </div><!--End Invoice Mid-->

    <div id="bot">

      <div id="table" class="tableInfo" style="font-size: larger;">
        <table>
          <tr class="tabletitle">
            <td class="item">
              <h2>Item</h2>
            </td>
            <td class="Hours">
              <h2>Qty</h2>
            </td>
            <td class="Rate">
              <h2>Sub Total</h2>
            </td>
          </tr>

          <?php
          $data_barang = mysqli_query($conn, "SELECT * FROM keranjang");
          while ($d = mysqli_fetch_array($data_barang)) {
          ?>
            <tr class="service">
              <td class="tableitem">
                <p><?php echo $d['nama_barang']; ?></p>
              </td>

              <td class="tableitem">
                <p><?php echo $d['quantity']; ?></p>
              </td>

              <!-- <td class="tableitem">
                <p>
                  <?php echo format_ribuan($d['harga_barang']); ?>
                </p>
              </td> -->

              <td class="tableitem">
                <p><?php echo format_ribuan($d['subtotal']); ?></p>
              </td>
            </tr>
          <?php } ?>

          <tr class="tabletitle">
            <td></td>
            <td class="Rate">
              <h2>Total</h2>
            </td>
            <td class="payment">
              <h2><?php echo format_ribuan($tot_bayar); ?></h2>
            </td>
          </tr>

          <tr class="tabletitle">
            <td></td>
            <td class="Rate">
              <h2>Cash</h2>
            </td>
            <td class="payment">
              <h2><?php echo format_ribuan($bayar); ?></h2>
            </td>
          </tr>

          <tr class="tabletitle">
            <td></td>
            <td class="Rate">
              <h2>Change</h2>
            </td>
            <td class="payment">
              <h2><?php echo format_ribuan($kembalian); ?></h2>
            </td>
          </tr>

        </table>
      </div><!--End Table-->

      <div id="legalcopy" style="text-align: center;">
        <p class="legal"><strong>THANK YOU</strong>
        </p>
      </div>

    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

  <!-- <a href="printStruk.php" target="_blank" onclick="javascript:return window.print()">PRINT</a> -->

  <script type="text/javascript">
    window.onload = function() {
      window.print();
    }
    <?php echo $jsArray; ?>
    <?php echo $jsArray1; ?>

    // FITUR TAMBAHAN
    let buttonPizza = document.getElementById('buttonPizza');

    function textPizza() {
      document.getElementById("kodeBarangInput").value = 'Pizza';
      document.getElementById("nama_barang").value = 'Pizza';
      document.getElementById("harga_barang").value = 10000;
    }

    // AKHIR FITUR TAMBAHAN
    function changeValue(id_barang) {
      document.getElementById("nama_barang").value = nama_barang[id_barang].nama_barang;
      document.getElementById("harga_barang").value = harga_barang[id_barang].harga_barang;
    };

    function total() {
      var harga = parseInt(document.getElementById('harga_barang').value);
      var jumlah_beli = parseInt(document.getElementById('quantity').value);
      var jumlah_harga = harga * jumlah_beli;
      document.getElementById('subtotal').value = jumlah_harga;
    }

    function totalnya() {
      var harga = parseInt(document.getElementById('hargatotal').value);
      var pembayaran = parseInt(document.getElementById('bayarnya').value);
      var kembali = pembayaran - harga;
      document.getElementById('total1').value = kembali;
    }
  </script>
  <!-- <button onclick="window.print()">Print this page</button> -->
</body>

</html>