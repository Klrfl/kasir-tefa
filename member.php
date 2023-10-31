<?php include 'template/header.php'; ?>
<?php
if (!empty($_POST['add_member'])) {
    $nama = $_POST['nama'];
    (int)$nomor_telpon =  $_POST['nomor_telpon'];
    $status = $_POST['status'];
    $tgl = $_POST['tgl_input'];

    mysqli_query($conn, "INSERT INTO member VALUES('','$nama','$nomor_telpon','$status','$tgl')")
        or die(mysqli_error($conn));
    echo '<script>window.location="member.php"</script>';
}

// $query = mysqli_query($conn, "SELECT max(id_barang) as kodeTerbesar FROM barang");
// $data = mysqli_fetch_array($query);
// $kodeBarang = $data['kodeTerbesar'];
// $urutan = (int) substr($kodeBarang, 3, 3);
// $urutan++;
// $huruf = "BRG";
// $kodeBarang = $huruf . sprintf("%03s", $urutan);
?>

<div class="col-md-9 mb-2">
    <div class="row">

        <!-- barang -->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header bg-purple">
                    <div class="card-tittle text-white"><i class="fa fa-user"></i> <b>Tambah Member Khusus</b></div>
                </div>
                <div class="card-body">
                    <!-- CADANGAN -->
                    <!-- <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>Kode Barang</b></label>
                                <input type="text" name="id_barang" class="form-control" value="<?php echo $kodeBarang; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Nama Barang</b></label>
                                <input type="text" name="nama_barang" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Harga Barang</b></label>
                                <input type="number" name="harga_barang" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Tanggal Input</b></label>
                                <div class="input-group">
                                    <input type="text" name="tgl_input" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" readonly>
                                    <div class="input-group-append">
                                        <button name="add_member" value="simpan" class="btn btn-purple" type="submit">
                                            <i class="fa fa-plus mr-2"></i>Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> -->
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label><b>Nama Member Khusus</b></label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Nomor Telepon</b></label>
                                <input type="tel" pattern="[0-9]*" name="nomor_telpon" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Status</b></label> <br>
                                <!-- <input type="number" name="harga_barang" class="form-control" required> -->
                                <select class="form-select form-control" aria-label="Default select example" name="status" style="width: 200px;">
                                    <option selected value="Khusus">Khusus</option>
                                    <option value="Umum">Umum</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Tanggal Input</b></label>
                                <div class="input-group">
                                    <input type="text" name="tgl_input" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" readonly>
                                    <div class="input-group-append">
                                        <button name="add_member" value="simpan" class="btn btn-purple" type="submit">
                                            <i class="fa fa-plus mr-2"></i>Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end barang -->


        <!-- table barang -->
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header bg-purple">
                    <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Barang</b></div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_barang" width="100%">
                        <thead class="thead-purple">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor Telpon</th>
                                <th>Status</th>
                                <th>Tanggal Input</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_member = mysqli_query($conn, "SELECT * FROM member");
                            while ($d = mysqli_fetch_array($data_member)) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['nomor_telpon']; ?></td>
                                    <td><?php echo $d['statusMember']; ?></td>
                                    <td><?php echo $d['tgl_input']; ?></td>
                                    <td>
                                        <!-- <a class="btn btn-primary btn-xs" href="edit.php?id=<?php echo $d['id']; ?>">
                                            <i class="fa fa-pen fa-xs"></i> Edit</a> -->
                                        <a class="btn btn-danger btn-xs" href="?id=<?php echo $d['id']; ?>" onclick="javascript:return confirm('Hapus Data Member ?');">
                                            <i class="fa fa-trash fa-xs"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
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
    $hapus_data = mysqli_query($conn, "DELETE FROM member WHERE id ='$id'");
    echo '<script>window.location="member.php"</script>';
}

?>
<?php include 'template/footer.php'; ?>