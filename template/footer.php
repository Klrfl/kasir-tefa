</div><!-- end row -->
</div> <!-- end container fluid -->

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