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

        // sembunyikan dulu
        $(".content").hide()
        get_sisa_menit()
    })
</script>
<script>
    function countdown(sisa) {
        // console.log(sisa)
        var timer = new Timer();
        timer.start({
            countdown: true,
            startValues: {
                minutes: sisa
            }
        });

        $('#countdownExample .values').html(timer.getTimeValues().toString());

        timer.addEventListener('secondsUpdated', function(e) {
            $('#countdownExample .values').html(timer.getTimeValues().toString());
            var menit = timer.getTimeValues().minutes
            save_minute(menit)
            // console.log(menit.minutes)
        });

        timer.addEventListener('targetAchieved', function(e) {
            // $('#countdownExample .values').html('KABOOM!!');
            $('#finish').click()
        });
    }

    function save_minute(menit) {
        // simpan sisa waktunya di firebase
        var database = firebase.database();
        var sisa_waktu = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/sisa_waktu');
        sisa_waktu.set(menit+1)
    }

    function get_sisa_menit() {
        var database = firebase.database();
        var sisa = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/sisa_waktu');
        sisa.once('value', (snapshot) => {
            const data = snapshot.val();
            // dapatkan sisa waktunya
            countdown(data)
            // sembunyikan loadingnya
            $(".loading").hide()
            // setelah sisa waktu berhasil di load, tampilkan contennya
            $(".content").fadeIn(2000);
        })
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
                console.log(data)
                var soalid = $('input[name="soal_id"]').val()
                $('#soal-' + soalid).addClass('bg-primary')
                // console.log(soalid)
                updateProgress()
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
                console.log(data)
                // console.log(soalid)
                endUjian(data)
                location.href = '<?= base_url('ujian/result_ujian_siswa/') . $ujian['id'] ?>'
            },
            error: function(err) {
                console.log(err)

            }
        })
    })

    startUjian()

    function startUjian() {
        var database = firebase.database();
        var id_siswa = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/id_siswa');
        var nama_siswa = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/nama_siswa');
        var waktu_mulai = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/waktu_mulai');
        var status = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/status');
        waktu_mulai.set('<?= datetime_now() ?>')
        nama_siswa.set('<?= user_info()['full_name'] ?>')
        nama_id_siswasiswa.set('<?= user_info()['id'] ?>')
        status.set('Sedang Mengerjakan')
    }

    function updateProgress() {
        // Gets the number of elements with class yourClass
        var numItems = $('.bg-primary').length
        var database = firebase.database();
        var jawab = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/ujian_progres');
        jawab.set(numItems)
    }

    function endUjian(data) {
        var waktu_selesai = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/waktu_mulai');
        var status = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/status');
        var nilai = firebase.database().ref('ujian/<?= $ujian['id'] ?>/<?= user_info()['id'] ?>/nilai');
        waktu_selesai.set('<?= datetime_now() ?>')
        status.set('Selesai Mengerjakan')
        nilai.set(data.nilai)
    }
</script>