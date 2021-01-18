<script>
	$(document).ready(function() {
		// summernote.
		$('.summernote').summernote({
			height: 150, //set editable area's height
			codemirror: { // codemirror options
				theme: 'monokai'
			},
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

		// setting awal
		$('#col-opsi').show()
		$('#kunci_isian').hide()
		$('#kunci_opsi').show()

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
	})
</script>