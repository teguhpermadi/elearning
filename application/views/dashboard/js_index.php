<script>
  $(document).ready(function() {
    $('.datatable-posts').DataTable({
      // "dom": 'flrtip',
      "dom": '<t><"bottom float-right" p>',
      "order": [[ 2, "desc" ]],
    });

    $('.datatable-users').DataTable({
      "dom": '<t><"bottom float-right" p>',
      "order": [[ 2, "desc" ]],
    });
  });
</script>