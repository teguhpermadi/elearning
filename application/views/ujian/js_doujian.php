<!-- easytimer -->

<script>
    $(document).ready(function() {
        // load soal pertama
        var soal_pertama = '<?= $soal_pertama['soal_id']; ?>'
        load_soal(soal_pertama)

        // disable enter
        $('#jawabanSoal').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
     
        countdown()

    })
</script>
<script>
    function countdown() {
        var timer = new Timer();
        timer.start({
            countdown: true,
            startValues: {
                // seconds: 5
                minutes: <?= $ujian['durasi'] ?>
            }
        });

        $('#countdownExample .values').html(timer.getTimeValues().toString());

        timer.addEventListener('secondsUpdated', function(e) {
            $('#countdownExample .values').html(timer.getTimeValues().toString());
        });

        timer.addEventListener('targetAchieved', function(e) {
            // $('#countdownExample .values').html('KABOOM!!');
            $('#finish').click()
        });
    }

    function load_soal(soalid) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('ujian/load_soal') ?>',
            data: {
                soal_id: soalid,
            },
            dataType: 'json',
            success: function(data) {
                // ubah class untuk button navigasi soal
                $(".active").not($('#soal-' + soalid).addClass('active')).removeClass('active');
                // console.log(data)
                // var jenis_soal
                $('#soal').html(data.soal)
                $('#soal').append(data.kunci)
                $('#soal').append('<input type="hidden" name="soal_id" value="' + soalid + '">')
                if (data.jenis_soal == '1') {
                    // pilihan ganda
                    $('#jawab').html('<div class="form-group">')
                    var obj = JSON.parse(data.opsi)
                    for (var prop in obj) {
                        // console.log("obj." + prop + " = " + obj[prop]);
                        // id="jawab-` + soalid + `-` + prop + `"
                        $('#jawab').append(`
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jawab"  value="` + prop + `">
                          <label class="form-check-label">` + obj[prop] + `</label>
                        </div>
                        `)
                    }
                    $('#jawab').append('</div>')
                    load_jawaban(soalid)
                } else {
                    // isian
                    $('#jawab').html('<input type="text" name="jawab" id="' + soalid + '" class="form-control" value="">')
                    load_jawaban(soalid)
                }
            },
            error: function(err) {
                console.log(err)
            }
        })
    }

    function load_jawaban(soalid) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('ujian/get_cache_jawab') ?>',
            data: {
                soal_id: soalid,
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                if (data != false) {
                    $('#' + soalid).val(data)
                    $("input[name=jawab][value=" + data + "]").prop('checked', true);
                }
            },
            error: function(err) {
                console.log(err)
            }
        })
    }

    // ketika form diisi
    $('#jawabanSoal').change(function() {
        var jawab = $('#jawab').val() || $('input[name="jawab"]:checked').val();
        // console.log(jawab)
        $.ajax({
            type: "POST",
            url: '<?= base_url('ujian/save_cache_jawab') ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                var soalid = $('input[name="soal_id"]').val()
                $('#soal-' + soalid).addClass('bg-primary')
                // console.log(soalid)
            },
            error: function(err) {
                console.log(err)

            }
        })
    });

    // ketika tombol finish di tekan artinya ujian telah benar-benar di selesaikan
    $('#finish').on('click', function() {
        var soalid = []
        <?php foreach ($all_soal as $soal) : ?>
            soalid.push('<?= $soal['soal_id'] ?>')
        <?php endforeach ?>
        $.ajax({
            type: "POST",
            url: '<?= base_url('ujian/koreksi_ujian') ?>',
            data: {
                soal_id: soalid,
                ujian_id: $('#ujian_id').val()
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                // console.log(soalid)
                location.href = '<?= base_url() ?>'
            },
            error: function(err) {
                console.log(err)

            }
        })
    })
</script>