<footer class="main-footer">
  <strong>Copyright &copy; 2021 Elearning</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
  </div>
</footer>

</div>
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
<!-- <script src="<?= base_url('node_modules/admin-lte/') ?>dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url('node_modules/admin-lte/') ?>dist/js/demo.js"></script> -->

<!-- SweetAlert2 -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/toastr/toastr.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('node_modules/admin-lte/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- multiselect -->
<script src="<?= base_url('assets/multiselect/js/jquery.multi-select.js') ?>" type="text/javascript"></script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-database.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBzx5DkWdPQXkLfM80ycRMuCpG0b2VJIlE",
    authDomain: "e-learning-646fb.firebaseapp.com",
    projectId: "e-learning-646fb",
    storageBucket: "e-learning-646fb.appspot.com",
    messagingSenderId: "520046590532",
    appId: "1:520046590532:web:7716c03189e5891c46da11",
    measurementId: "G-74J8CFMCEV"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  var database = firebase.database();


  // writeUserData()
  function check() {
    // since I can connect from multiple devices or browser tabs, we store each connection instance separately
    // any time that connectionsRef's value is null (i.e. has no children) I am offline
    var myConnectionsRef = firebase.database().ref('users/<?= user_info()['id'] ?>/connections');

    // stores the timestamp of my last disconnect (the last time I was seen online)
    var lastOnlineRef = firebase.database().ref('users/<?= user_info()['id'] ?>/lastOnline');

    var connectedRef = firebase.database().ref('.info/connected');

    var userId = firebase.database().ref('users/<?= user_info()['id'] ?>/nama_lengkap');
    var wa = firebase.database().ref('users/<?= user_info()['id'] ?>/wa');
    var role = firebase.database().ref('users/<?= user_info()['id'] ?>/role');

    connectedRef.on('value', function(snap) {
      if (snap.val() === true) {
        // We're connected (or reconnected)! Do anything here that should happen only if online (or on reconnect)
        var con = myConnectionsRef.push();

        // When I disconnect, remove this device
        con.onDisconnect().remove();

        // Add this device to my connections list
        // this value could contain info about the device or a timestamp too
        con.set(true);

        // When I disconnect, update the last time I was seen online
        // lastOnlineRef.onDisconnect().set(firebase.database.ServerValue.TIMESTAMP);
        var timeInMs = Date.now();
        lastOnlineRef.onDisconnect().set(timeInMs);

        userId.set(
          '<?= user_info()['full_name'] ?>'
        )

        wa.set(
          '<?= user_info()['phone'] ?>'
        )

        role.set(
          '<?= user_info()['role'] ?>'
        )
      }
    });



  }

  check()
</script>

<script>
  $(document).ready(function() {

    $('.datatable').DataTable({
      // "dom": 'flrtip',
      "dom": '<"top float-left" l><"top float-right" f><t><"bottom float-left" i><"bottom float-right" p>'
    });
    $('.select').multiSelect();

  });
</script>


<!-- cek jika variabel js tidak ditemukan -->
<?= (empty($js)) ? '' : $js ?>

</body>

</html>