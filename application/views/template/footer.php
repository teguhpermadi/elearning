<footer class="main-footer">
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>

<!-- </div> -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('node_modules/admin-lte/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('node_modules/admin-lte/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('node_modules/admin-lte/') ?>dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- multiselect -->
<script src="<?= base_url('assets/multiselect/js/jquery.multi-select.js') ?>" type="text/javascript"></script>

<script>
  $(document).ready(function() {
    $('#tableAdmin').DataTable();
    $('#tableGuru').DataTable();
    $('#tableSiswa').DataTable();
    $('#tableKelas').DataTable();
    $('#tableCategory').DataTable();
    $('#tableTag').DataTable();
    $('#posts').DataTable({
      // "dom": 'flrtip',
      // "dom": '<"top float-right" f>'
    });
    $('.select').multiSelect();
    // Summernote
    $('.summernote').summernote({
      height: 250, //set editable area's height
      codemirror: { // codemirror options
        theme: 'monokai'
      },
      placeholder: 'Tulis konten disini',
      callbacks: {
        onImageUpload: function(image) {
          uploadImage(image[0]);
        },
        onMediaDelete: function(target) {
          deleteImage(target[0].src);
        }
      }
    });

    function uploadImage(image) {
      var data = new FormData();
      data.append("image", image);
      $.ajax({
        url: "<?php echo base_url('posts/upload_image') ?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
          $('.summernote').summernote("insertImage", url);
        },
        error: function(data) {
          console.log(data);
        }
      });
    }

    function deleteImage(src) {
      $.ajax({
        data: {
          src: src
        },
        type: "POST",
        url: "<?php echo base_url('posts/delete_image') ?>",
        cache: false,
        success: function(response) {
          console.log(response);
        }
      });
    }

    // default published
    $("#date").hide()

    // disable date time
    $('#status').change(function() {
      if ($('#status').val() == 'jadwalkan') {
        $("#date").show()
      } else {
        $("#date").hide()
      } 
    })

    // required checkbox
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function() {
      if (requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
      } else {
        requiredCheckboxes.attr('required', 'required');
      }
    });
  });
</script>


</body>

</html>