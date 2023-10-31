</div><!-- end row -->
</div> <!-- end container fluid -->

<footer class="text-center mb-0 py-3">
    <!-- <p class="text-muted small mb-0">Copyright &copy; <?php echo  date("Y"); ?> <a href="https://www.youtube.com/channel/UCyHwOyTkQBgwfWMOrblSUDg" style="text-decoration:none;">
    <b>ADGRAFIKA</b></a>. All Rights Reserved</p> -->
</footer>
<script src="../jquery-3.6.3.min.js"></script>
<script src="assets/js/jquery.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
    $(document).ready(function() {
        $('#table_barang').DataTable({});
    });
</script>

</body>

</html>