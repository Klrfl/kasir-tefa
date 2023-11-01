<?php include 'template/header.php'; ?>
<?php $barang = mysqli_query($conn, "SELECT * FROM member");
$jsArray = "var statusMember = new Array();";
$jsArray1 = "var nama = new Array();";
?>
<div class="col-md-9 mb-2">
  <div class="row">

    <!-- kasir -->
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body py-4">
          <h3>Cek Member</h3>
          <form method="POST">
            <hr>

            <div class="form-group row mb-0">

              <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nomor Telepon</b></label>
              <div class="col-sm-8 mb-2">
                <div class="input-group">
                  <input type="text" name="nomor_telpon" class="form-control form-control-sm border-right-0" list="datalist1" onchange="changeValue(this.value)" oninput="changeValue(this.value)" id="kodeBarangInput" aria-describedby="basic-addon2" required style="border-radius:15px" value="">
                  <datalist id="datalist1">
                    <?php if (mysqli_num_rows($barang)) { ?>
                      <?php while ($row_brg = mysqli_fetch_array($barang)) { ?>
                        <option value="<?php echo $row_brg["nomor_telpon"] ?>"> <?php echo $row_brg["nomor_telpon"] ?>
                        <?php

                        $jsArray .= "statusMember['" . $row_brg['nomor_telpon'] . "'] = {statusMember:'" . addslashes($row_brg['statusMember']) . "'};";

                        $jsArray1 .= "nama['" . $row_brg['nomor_telpon'] . "'] = {nama:'" . addslashes($row_brg['nama']) . "'};";
                      } ?>
                      <?php } ?>
                  </datalist>
                </div>
              </div>

              <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nama</b></label>
              <div class="col-sm-8 mb-2">
                <input type="text" class="form-control form-control-sm" name="nama" id="nama">
              </div>
              <label class="col-sm-4 col-form-label col-form-label-sm"><b>Status Member</b></label>
              <div class="col-sm-8 mb-2">
                <div class="input-group">
                  <input type="text" class="form-control form-control-sm" id="statusMember" value="Umum" name="statusMember">
                  <div class="input-group-append">
                    <button class="btn btn-purple btn-sm" name="save" value="simpan" type="submit">
                      <i class="fa fa-plus mr-2"></i>Konfirmasi</button>

                  </div>
                </div>
              </div>

            </div>
          </form>
          <form method="post">
            <div class="form-group row mb-0">
              <label class="col-sm-4 col-form-label col-form-label-sm"><b>Batal Member</b></label>
              <div class="col-sm-8 mb-2">
                <button class="btn btn-danger btn-sm" name="batal" value="batal" type="submit">
                  <i class="fa-solid fa-xmark"></i>Batal</button>
              </div>
            </div>
          </form>
          <?php
          if (isset($_POST['save'])) {
            // UPDATE STATUSMember MEMBER DISINIIIIIIIIIIIIIIIIIIIIIIIIIIII


            $statusMember = mysqli_query($conn, "SELECT * FROM keranjangstatus");
            while ($d = mysqli_fetch_array($statusMember)) {
              //  echo $user
              echo $d['statusMember'];
            }
            if (empty($d['statusMember'])) {
              $nomor_telpon = $_POST['nomor_telpon'];
              $nama = $_POST['nama'];
              $statusMember = $_POST['statusMember'];
              $sql = "INSERT INTO keranjangstatus ( nomor_telpon, nama, statusMember) VALUES('$nomor_telpon','$nama','$statusMember')";
              $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

              if ($query) {
                echo '<script>window.location="index.php"</script>';
              } else {
                echo "Error :" . $sql . "<br>" . mysqli_error($conn);
              }

              mysqli_close($conn);
            } elseif (!empty($d['statusMember'])) {
              echo "Error :" . $sql . "<br>" . mysqli_error($conn);
            }
          } ?>
          <?php
          // DELETE STATUSMember MEMBER DISINIIIIIIIIIIIIIIIIIIIIIIIIIIII
          if (isset($_POST['batal'])) {
            $hapusdata = mysqli_query($conn, "DELETE FROM keranjangstatus");
            echo '<script>window.location="cekMember.php"</script>';
          } ?>
          <hr>
          <?php
          function format_ribuan($nilai)
          {
            return number_format($nilai, 0, ',', '.');
          }
          $tgl = date("jmYGi");
          $huruf = "AD";
          $kodeCart = $huruf . $tgl;
          ?>

          <?php
          $query = mysqli_query($conn, "SELECT * FROM keranjang");
          $total = 0;
          $tot_bayar = 0;
          $no = 1;
          while ($r = $query->fetch_assoc()) {
            $total = $r['harga_barang'];
            $tot_bayar += $total;
            $bayar = $r['bayar'];
            $kembalian = $r['kembalian'];
          }
          error_reporting(0);
          ?>

        </div>
      </div>
    </div>
    <!-- end kasir -->

    <!-- tes -->
    <div class="col-md-6 mb-3">
      <div class="card" id="print" style="font-weight: bolder; ">
        <div class="card-header bg-white border-0 pb-0 pt-4">
          <?php
          $toko = mysqli_query($conn, "SELECT * FROM login ORDER BY nama_toko ASC");
          while ($dat = mysqli_fetch_array($toko)) {
            $user = $dat['user'];
            $nama_toko = $dat['nama_toko'];
            $alamat = $dat['alamat'];
            $telp = $dat['telp'];
            echo "<h5 class='card-tittle mb-0 text-center'><b>$nama_toko</b></h5>
        <p class='m-0 small text-center'>$alamat</p>
          <p class='small text-center'>Telp. $telp</p>";
          }
          ?>
          <div class="row">
            <div class="col-8 col-sm-9 pr-0">
              <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                <li>NOTA : <?php
                            $notrans = mysqli_query($conn, "SELECT * FROM keranjang ORDER BY no_transaksi ASC LIMIT 1");
                            while ($dat2 = mysqli_fetch_array($notrans)) {
                              $notransaksi = $dat2['no_transaksi'];
                              echo "$notransaksi";
                            }
                            ?></li>
                <li>KASIR : <?php echo $user ?></li>
                <li>MEMBER :
                  <?php
                  $statusMember = mysqli_query($conn, "SELECT * FROM keranjangstatus");
                  while ($d = mysqli_fetch_array($statusMember)) {
                    //  echo $user
                    echo $d['statusMember'];
                  }
                  // echo [$statusMember['statusMember']]

                  ?>
                </li>
              </ul>
            </div>
            <div class="col-4 col-sm-3 pl-0">
              <ul class="pl-0 small" style="list-style: none;">
                <li>TGL : <?php echo  date("j-m-Y"); ?></li>
                <li>JAM : <?php echo  date("G:i:s"); ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body small pt-0">
          <hr class="mt-0">
          <div class="row">
            <div class="col-5 pr-0">
              <span><b>Nama Barang</b></span>
            </div>
            <div class="col-1 px-0 text-center">
              <span><b>Qty</b></span>
            </div>
            <div class="col-3 px-0 text-right">
              <span><b>Harga</b></span>
            </div>
            <div class="col-3 pl-0 text-right">
              <span><b>Subtotal</b></span>
            </div>
            <div class="col-12">
              <hr class="mt-2">
            </div>
            <?php
            $data_barang = mysqli_query($conn, "SELECT * FROM keranjang");
            while ($d = mysqli_fetch_array($data_barang)) {
            ?>
              <div class="col-5 pr-0">
                <a href="?id=<?php echo $d['id_cart']; ?>" onclick="javascript:return confirm('Hapus Data Barang ?');" style="text-decoration:none;">
                  <i class="fa fa-times fa-xs text-danger mr-1"></i>
                  <span class="text-dark"><?php echo $d['nama']; ?></span>
                </a>
              </div>

              <div class="col-3 px-0 text-right">
                <span><?php echo format_ribuan($d['harga_barang']); ?></span>
              </div>
              <div class="col-3 pl-0 text-right">
                <span><?php echo format_ribuan($d['subtotal']); ?></span>
              </div>
            <?php } ?>
            <div class="col-12">
              <hr class="mt-2">
              <ul class="list-group border-0">
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                  <b>Total</b>
                  <span><b><?php echo format_ribuan($tot_bayar); ?></b></span>
                </li>
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                  <b>Bayar</b>
                  <span><b><?php echo format_ribuan($bayar); ?></b></span>
                </li>
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                  <b>Kembalian</b>
                  <span><b><?php echo format_ribuan($kembalian); ?></b></span>
                </li>
              </ul>
            </div>
            <div class="col-sm-12 mt-3 text-center">
              <p>* TERIMA KASIH TELAH BERBELANJA*</p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="text-right mt-3">
                <form method="POST">
                    <a href="printStruk.php" target="_blank">PRINT</a>
                    <button class="btn btn-primary btn-sm" onclick="javascript:return confirm('Jangan lupa Print Struk');" name="selesai" type="submit"><i class="fa fa-check mr-1"></i> Selesai</button>
                </form>
            </div> -->
      <?php
      // if (isset($_POST['selesai'])) {
      //     $ambildata = mysqli_query($conn, "INSERT INTO laporanku (no_transaksi,bayar,kembalian,id_Cart,kode_barang, nama, subtotal)
      //     SELECT no_transaksi,bayar,kembalian,id_Cart,kode_barang, nama, subtotal
      //     FROM keranjang ") or die(mysqli_connect_error());
      //     $hapusdata = mysqli_query($conn, "DELETE FROM keranjang");
      //     echo '<script>window.location="index.php"</script>';
      // }
      ?>
    </div>
    <!-- end tes -->

    <?php
    include 'config.php';
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
      $hapus_data = mysqli_query($conn, "DELETE FROM keranjang WHERE id_cart ='$id'");
      echo '<script>window.location="index.php"</script>';
    }

    ?>
  </div><!-- end row col-md-9 -->
</div>
<script type="text/javascript">
  <?php echo $jsArray; ?>
  <?php echo $jsArray1; ?>

  function changeValue(nomor_telpon) {
    document.getElementById("nama").value = nama[nomor_telpon].nama;
    document.getElementById("statusMember").value = statusMember[nomor_telpon].statusMember;
  };


  // FINALLLL
</script>
<?php include 'template/footer.php'; ?>