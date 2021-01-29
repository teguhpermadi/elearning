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
			height: 300, //set editable area's height
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

		// jika alertnya di close maka hapus file dengan token ini
		$('.myFile').on('closed.bs.alert', function() {
			var filename = $(this).data('filename')
			var token = $(this).data('token')
			$.ajax({
				data: {
					filename: filename,
					token: token,
				},
				type: "POST",
				url: "<?php echo base_url('post/delete_attachfile') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		})

	})
</script>

<script>
	Dropzone.autoDiscover = false;
	var file = new Dropzone(".dropzone", {
		url: "<?php echo base_url('post/upload_files') ?>",
		// maxFilesize: 2,  // maximum size to uplaod 
		method: "post",
		// acceptedFiles:"image/*", // allow only images
		paramName: "userfile",
		// dictInvalidFileType:"Image files only allowed", // error message for other files on image only restriction 
		addRemoveLinks: true,
		autoProcessQueue: true
	});


	file.on("sending", function(a, b, c) {
		a.token = Math.random();
		c.append("token", a.token); //Random Token generated for every files 
		$('.token').append('<input type="hidden" name="token[]" id="token" value="' + a.token + '">')
	});


	// delete on upload 

	file.on("removedfile", function(a) {
		var token = a.token;
		$('#token').remove()
		$.ajax({
			type: "post",
			data: {
				token: token
			},
			url: "<?php echo base_url('post/delete_files') ?>",
			cache: false,
			dataType: 'json',
			success: function(res) {
				// alert('Selected file removed !');			
			}

		});
	});


	// ketika tombol sisipkan
	$('.btn-sisipkan').on('click', function() {
		var ujianid = $(this).data('ujianid')
		// disable tombolnya untuk mencegah menyisipkan soal ganda
		$(this).attr('disabled', true);
		$.ajax({
			type: "post",
			data: {
				ujian_id: ujianid
			},
			url: "<?php echo base_url('ujian/load_ujian') ?>",
			cache: false,
			dataType: 'json',
			success: function(data) {
				// console.log(data)
				var html = `<div class="alert alert-warning alert-dismissible fade show alert-ujian" role="alert" id="alert-` + data.id + `">
							<strong>Nama:</strong> ` + data.nama_ujian + `<br>
							<strong>Kelas tingkat:</strong> ` + data.kelas_tingkat + `<br>
							<strong>Waktu selesai:</strong> ` + data.waktu_selesai + `<br>
							<strong>Token:</strong> ` + data.token + `
							<button type="button" class="close" aria-label="Close" onclick="deleteUjian(` + data.id + `)">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>`
				$('#previewSisipkanUjian').append(html)

				var input = `<input type="hidden" name="sisipkanujian[]" value="`+data.id+`" id="sisipkanujian-`+data.id+`">`
				$('#sisipkanUjian').append(input)

		
			}
		});
	})

	function deleteUjian(ujianid)
	{
		$('#alert-'+ujianid).alert('close')	
		$('#sisipkanujian-'+ujianid).remove()
		$('#ujian-'+ujianid).attr('disabled', false);
	}
</script>