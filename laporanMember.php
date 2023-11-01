<?php include 'template/header.php'; ?>
<?php
function format_ribuan($nilai)
{
  return number_format($nilai, 0, ',', '.');
}
$query = mysqli_query($conn, "SELECT * FROM laporankumember");
// $total = 0;
// $tot_bayar = 0;
// $no = 1;
// while ($r = $query->fetch_assoc()) {
//     $total = $r['subtotal']
//         // * $r['quantity']
//     ;
//     $tot_bayar += $total;
// }
?>
<div class="col-md-9 mb-2">
  <div class="row">

    <!-- table barang -->
    <div class="col-md-12 mb-2">
      <div class="card">
        <div class="card-header bg-purple">
          <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Laporan</b></div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table" width="100%">
            <thead class="thead-purple">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Tgl Input</th>
                <!-- <th>Member</th> -->
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $data_barang = mysqli_query($conn, "SELECT * FROM laporankumember ");
              while ($d = mysqli_fetch_array($data_barang)) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['statusMember']; ?></td>
                  <td><?php echo $d['tgl_input']; ?></td>
                  <!-- <td><?php echo 'Member' ?></td> -->
                  <td>
                    <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id']; ?>" onclick="javascript:return confirm('Hapus Data Barang ?');">
                      <i class="fa fa-trash fa-xs"></i> Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <!-- <tfoot>
              <tr>
                <th colspan="6" class="text-right"><b>TOTAL :</b></th>
                <th><b>Rp. <?php echo format_ribuan($tot_bayar); ?>,-</b></th>
                <th></th>
              </tr>
            </tfoot> -->
          </table>
        </div>
      </div>
    </div>
    <!-- end table barang -->

  </div><!-- end row col-md-9 -->
</div>

<?php
include 'config.php';
if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $hapus_data = mysqli_query($conn, "DELETE FROM laporankuMember WHERE id ='$id'");
  echo '<script>window.location="laporanMember.php"</script>';
}

?>
<?php include 'template/footer.php'; ?>