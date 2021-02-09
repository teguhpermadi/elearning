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
                    // console.log(obj.status)
                    if (obj.status == true) {
                        set_minute()
                        location.href = '<?= base_url('ujian/do_ujian/?key=') ?>' + obj.url_encrypted;
                    }
                },
                error: function(err) {
                    // console.log(err)
                }
            })
        })
    })
</script>
<script>
    // set waktu di firebase
    var database = firebase.database();
    function set_minute() {
        // simpan sisa waktunya di firebase
        var sisa_waktu = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/sisa_waktu');
        sisa_waktu.set(<?= $ujian['durasi'] ?>)
    }

    function set_ujian()
    {
        var waktu_mulai = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/waktu_mulai');
        var jawab = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/ujian_progres');
        jawab.set('0')
        waktu_mulai.set('<?= datetime_now2() ?>')

    }
</script>