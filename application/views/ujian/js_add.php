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

	})
</script>

<script>
	$(".checkbox-soal").on('click', function() {
		if ($(this).is(":checked")) {
			var id = $(this).attr('value')
			var html = '<input type="hidden" value="' + id + '" name="sisipkansoalid[]" id="sisipkansoal-' + id + '">'
			$('#soalujian').append(html)

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
					var card = `
					<div class="card card-primary card-outline direct-chat direct-chat-primary" id="card-soal-` + data.id + `">
                        <div class="card-header">
                            <span data-toggle="tooltip" class="badge bg-primary">` + data.jenis_soal + `</span>
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
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSoalModal">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-card-widget="remove">Hapus</button>
                        </div>
                    </div>
					`
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
			$('#sisipkansoal-' + id).remove()
			$('#card-soal-' + id).remove()
		}
	})
</script>