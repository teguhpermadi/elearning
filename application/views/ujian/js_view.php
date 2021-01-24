<script>
    $(document).ready(function() {
        $('#verifikasi').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '<?= base_url('ujian/cektoken') ?>',
                data: $(this).serialize(),
                type: "POST",
                success: function(data) {
                    // console.log(data)
                    var obj = JSON.parse(data)
                    console.log(obj.status)
                    if(obj.status == true)
                    {
                        location.href = '<?= base_url('ujian/do_ujian/?key=') ?>' + obj.url_encrypted;
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })
    })
</script>