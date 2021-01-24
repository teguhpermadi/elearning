<script>
    $(document).ready(function() {
        // summernote
        $('.summernote').summernote({
            height: 100, //set editable area's height
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
            },
            disableDragAndDrop: true,
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo base_url('post/upload_image') ?>",
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
                url: "<?php echo base_url('post/delete_image') ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

        $('.soal-datatable').DataTable({
            "dom": 'tp',
            "pageLength": 5
        });

        // setting awal
        $('#col-opsi').show()
        $('#kunci_isian').hide()
        $('#kunci_opsi').show()
    })
</script>
<script>
    // ketika drodown jenis soal di ganti
    $('#jenis_soal').change(function() {
        var value = $(this).val()
        if (value == 1) {
            // opsi jawaban tampilkan
            $('#col-opsi').show()
            // kunci isian sembunyikan
            $('#kunci_isian').hide()
            // kunci opsi show
            $('#kunci_opsi').show()

        } else {
            // kunci isian show
            $('#kunci_isian').show()
            // opsi jawaban hide
            $('#col-opsi').hide()
            // kunci opsi hide
            $('#kunci_opsi').hide()
        }
    })

    // ketika tombol sisipkan
    $('.btn-sisipkan').on('click', function() {
        var soalid = $(this).data('soalid')
        // disable tombolnya untuk mencegah menyisipkan soal ganda
        $(this).attr('disabled', true);
        add_soalujian(soalid)
    })

    // ketika soal baru ditambahkan, simpan ke database dulu
    $('#formTambah').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '<?= base_url('ujian/save_soal') ?>',
            data: $(this).serialize(),
            type: "POST",
            success: function(data) {
                console.log(data)
                $('#tambah').modal('hide')
                add_soalujian(data)
                reset_form()
            },
            error: function(err) {}
        })
    })

    // add soal ujian
    function add_soalujian(soalid) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('ujian/add_soalujian') ?>',
            data: {
                soal_id: soalid,
                ujian_id: '<?= $ujian_id ?>',
            },
            dataType: 'json',
            success: function(data) {
                var soalid = data.soal_id
                // tampilkan soalnya
                load_soal(soalid)
            },
            error: function(err) {
                console.log(err)
            }
        })
    }

    // reset form
    function reset_form() {
        // atur ulang formnya
        $("select.dropdown").prop('selectedIndex', 0);
        $('#skor').val('');
        // setting awal
        $('#col-opsi').show()
        $('#kunci_isian').hide()
        $('#kunci_opsi').show()
        $(".summernote").summernote("code", "");
        1
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
                var jenis_soal
                if (data.jenis_soal == '1') {
                    jenis_soal = 'Pilihan Ganda'
                    var card = `
						<div class="card card-primary card-outline direct-chat direct-chat-primary" id="card-soal-` + data.id + `" data-soalid="` + data.id + `">
							<div class="card-header">
							<input type="hidden" name="sisipkansoalid[]" value="` + data.id + `" id="sisipkansoalid-` + data.id + `">

								<span data-toggle="tooltip" class="badge bg-primary">` + jenis_soal + `</span>
								<span data-toggle="tooltip" class="badge bg-primary">Skor ` + data.skor + `</span>
								<p>` + data.soal + `</p>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Jawaban"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Kunci dan Pembahasan" data-widget="chat-pane-toggle">
										<i class="fas fa-question-circle"></i>
									</button>
								</div>
							</div>
							<div class="card-body" style="display: block;">
							<div class="direct-chat-messages">
									<div class="alert alert-primary" role="alert"><i class="fas fa-key"></i> 
									` + data.kunci + `
									</div>
									` + '<ol id="ul-' + data.id + '" type="A"></ol>' + `
								</div>
								<!-- Petunjuk are loaded here -->
								<div class="direct-chat-contacts bg-info ">
									<div class="p-3 bg-primary text-white">
										<h3>Petunjuk</h3>
										<p>` + data.petunjuk + `</p>
									</div>
									<div class="p-3 bg-info text-white">
										<h3>Pembahasan</h3>
										<p>` + data.pembahasan + `</p>
									</div>
								</div>
							</div>
							<div class="card-footer" style="display: block;">
								<button type="button" class="btn btn-danger btn-sm" onclick="removeCard(` + data.id + `)">Hapus</button>
							</div>
						</div>
						`
                } else {
                    jenis_soal = 'Isian'

                    var card = `
						<div class="card card-primary card-outline direct-chat direct-chat-primary" id="card-soal-` + data.id + `" data-soalid="` + data.id + `">
							<div class="card-header">
							<input type="hidden" name="sisipkansoalid[]" value="` + data.id + `" id="sisipkansoalid-` + data.id + `">

								<span data-toggle="tooltip" class="badge bg-primary">` + jenis_soal + `</span>
								<span data-toggle="tooltip" class="badge bg-primary">Skor ` + data.skor + `</span>
								<p>` + data.soal + `</p>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Jawaban"><i class="fas fa-minus"></i>
									</button>
									<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Kunci dan Pembahasan" data-widget="chat-pane-toggle">
										<i class="fas fa-question-circle"></i>
									</button>
								</div>
							</div>
							<div class="card-body" style="display: block;">
							<div class="direct-chat-messages">
									<div class="alert alert-primary" role="alert"><i class="fas fa-key"></i> 
									` + data.kunci + `
									</div>
									` + '<input type="text" class="form-control"value="kolom jawaban isian" readonly>' + `
								</div>
								<!-- Petunjuk are loaded here -->
								<div class="direct-chat-contacts bg-info ">
									<div class="p-3 bg-primary text-white">
										<h3>Petunjuk</h3>
										<p>` + data.petunjuk + `</p>
									</div>
									<div class="p-3 bg-info text-white">
										<h3>Pembahasan</h3>
										<p>` + data.pembahasan + `</p>
									</div>
								</div>
							</div>
							<div class="card-footer" style="display: block;">
								<button type="button" class="btn btn-danger btn-sm" onclick="removeCard(` + data.id + `)">Hapus</button>
							</div>
						</div>
						`
                }

                // tambahkan cardnya
                $('#reviewsoal').append(card)

                // tambahkan pilihan gandanya
                $.each(JSON.parse(data.opsi), function(idx, item) {
                    $('#ul-' + data.id).append('<li>' + item + '</li>')
                })

            },
            error: function(err) {
                console.log(err)
            }
        })
    }

    // dapatkan seluruh soal ujian kemudia tampilkan soalnya
    <?php foreach ($all_soalujian as $soalujian) : ?>
        load_soal(<?= $soalujian['id'] ?>)
    <?php endforeach ?>

    function removeCard(soalid) {
        // card soalnya di remove
        $('#card-soal-' + soalid).CardWidget('remove')

        $.ajax({
            type: "POST",
            url: '<?= base_url('ujian/delete_soalujian') ?>',
            data: {
                soal_id: soalid,
            },
            dataType: 'json',
            success: function(data) {
                console.log(data)
            },
            error: function(err) {
                console.log(err)
            }
        })
    }
</script>