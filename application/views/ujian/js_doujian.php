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

        
    })
</script>
<script>
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
                $('#soal').append('<input type="text" name="soal_id" value="' + soalid + '">')
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
            },
            error: function(err) {
                console.log(err)

            }
        })
    });

    $('#next').on('click', function() {
        // reference: https://stackoverflow.com/questions/9957227/jquery-click-next-button
        // $(this).closest("tr").next().find("input:button").click();
    })
</script>