<script>
	$(document).ready(function() {

		// required checkbox
		var requiredCheckboxes = $('.options :checkbox[required]');
		requiredCheckboxes.change(function() {
			if (requiredCheckboxes.is(':checked')) {
				requiredCheckboxes.removeAttr('required');
			} else {
				requiredCheckboxes.attr('required', 'required');
			}
		});

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
			// "dom": 'flrtip',
			"dom": 'tp'
		});

		// setting awal
		$('#col-opsi').show()
		$('#kunci_isian').hide()
		$('#kunci_opsi').show()

		// semua card di setting collapse
		// $('.direct-chat-primary').CardWidget('collapse')
	})
</script>

<script>
	$(".checkbox-soal").on('click', function() {
		if ($(this).is(":checked")) {
			var id = $(this).attr('value')
			// var html = '<input type="text" value="' + id + '" name="sisipkansoalid[]" id="sisipkansoalid-' + id + '">'
			// $('#soalujian').append(html)

			// load soal
			$.ajax({
				type: "POST",
				url: '<?= base_url('ujian/load_soal') ?>',
				data: {
					soal_id: id
				},
				dataType: 'json',
				success: function(data) {
					// var opsisoal = '<ul id="ul-' + data.id + '"></ul>'
					// if (data.opsi != null) {
					// jika opsi soal tidak null
					// $.each(JSON.parse(data.opsi), function(idx, item) {
					// $('#ul-'+data.id).append('<li?>'+item+'</li>')
					// 	})
					// } else {
					// jika opsi soal null
					// opsisoal = ''
					// }
					var jenis_soal
					if (data.jenis_soal == 1) {
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
								<button type="button" class="btn btn-danger btn-sm " data-card-widget="remove"  data-soalid="`+data.id+`">Hapus</button>
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
								<button type="button" class="btn btn-danger btn-sm " data-card-widget="remove"  data-soalid="`+data.id+`">Hapus</button>
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
					// console.log(data)
				},
			});
		}

		if ($(this).is(":not(:checked)")) {
			var id = $(this).attr('value')
			$('#sisipkansoalid-' + id).remove()
			$('#card-soal-' + id).remove()
		}


	})

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

	$('#formTambahSoal').on('submit', function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?= base_url('ujian/save_soal') ?>',
			data: $(this).serialize(),
			type: "POST",
			success: function(data) {
				// console.log(data)
				// hide modal
				$('#tambahSoal').modal('hide')
				// parse datanya yang barusan di kirim
				var obj = JSON.parse(data)
				var jenis_soal
				if (obj.jenis_soal == 1) {
					jenis_soal = 'Pilihan Ganda'
					var card = `
						<div class="card card-primary card-outline direct-chat direct-chat-primary" id="card-soal-` + obj.id + `" data-soalid="` + obj.id + `">
							<div class="card-header">
							<input type="hidden" name="sisipkansoalid[]" value="` + obj.id + `" id="sisipkansoalid-` + obj.id + `">

								<span data-toggle="tooltip" class="badge bg-primary">` + jenis_soal + `</span>
								<span data-toggle="tooltip" class="badge bg-primary">Skor ` + obj.skor + `</span>
								<p>` + obj.soal + `</p>
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
									` + obj.kunci + `
									</div>
									` + '<ol id="ul-' + obj.id + '" type="A"></ol>' + `
								</div>
								<!-- Petunjuk are loaded here -->
								<div class="direct-chat-contacts bg-info ">
									<div class="p-3 bg-primary text-white">
										<h3>Petunjuk</h3>
										<p>` + obj.petunjuk + `</p>
									</div>
									<div class="p-3 bg-info text-white">
										<h3>Pembahasan</h3>
										<p>` + obj.pembahasan + `</p>
									</div>
								</div>
							</div>
							<div class="card-footer" style="display: block;">
								<button type="button" class="btn btn-danger btn-sm " data-card-widget="remove"  data-soalid="`+obj.id+`">Hapus</button>
							</div>
						</div>
						`
				} else {
					jenis_soal = 'Isian'

					var card = `
						<div class="card card-primary card-outline direct-chat direct-chat-primary" id="card-soal-` + obj.id + `" data-soalid="` + obj.id + `">
							<div class="card-header">
							<input type="hidden" name="sisipkansoalid[]" value="` + obj.id + `" id="sisipkansoalid-` + obj.id + `">

								<span data-toggle="tooltip" class="badge bg-primary">` + jenis_soal + `</span>
								<span data-toggle="tooltip" class="badge bg-primary">Skor ` + obj.skor + `</span>
								<p>` + obj.soal + `</p>
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
									` + obj.kunci + `
									</div>
									` + '<input type="text" class="form-control"value="kolom jawaban isian" readonly>' + `
								</div>
								<!-- Petunjuk are loaded here -->
								<div class="direct-chat-contacts bg-info ">
									<div class="p-3 bg-primary text-white">
										<h3>Petunjuk</h3>
										<p>` + obj.petunjuk + `</p>
									</div>
									<div class="p-3 bg-info text-white">
										<h3>Pembahasan</h3>
										<p>` + obj.pembahasan + `</p>
									</div>
								</div>
							</div>
							<div class="card-footer" style="display: block;">
								<button type="button" class="btn btn-danger btn-sm " data-card-widget="remove" data-soalid="`+obj.id+`">Hapus</button>
							</div>
						</div>
						`
				}

				// tambahkan cardnya
				$('#reviewsoal').append(card)

				// tambahkan pilihan gandanya
				$.each(JSON.parse(obj.opsi), function(idx, item) {
					$('#ul-' + obj.id).append('<li>' + item + '</li>')
				})

				// var html = '<input type="text" value="' + obj.id + '" name="sisipkansoalid[]" id="sisipkansoalid-' + obj.id + '">'
				// $('#soalujian').append(html)

				// atur ulang formnya
				$("select.dropdown").prop('selectedIndex', 0);
				$('#skor').val('');
				// setting awal
				$('#col-opsi').show()
				$('#kunci_isian').hide()
				$('#kunci_opsi').show()
				$(".summernote").summernote("code", "");

			},
			error: function(err) {
				console.log(err)
			}
		})
	})

	$('button.btn-danger').on('click', function(){
		var soalid = $(this).data('soalid')
		alert(soalid)
	})

</script>