<script>
	$(document).ready(function() {
		//Mengirimkan Token Keamanan
		$.ajaxSetup({
			headers: {
				'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#form_comment').on('submit', function(event) {
			event.preventDefault();
			var form_data = $(this).serialize();
			$.ajax({
				url: "<?= base_url('post/add_comment') ?>",
				method: "POST",
				data: form_data,
				success: function(data) {
					$('#form_comment')[0].reset();
					$('#parrent_id').val('0');
					$(".replyrow").insertAfter($('.default_replyrow'));
					load_comment();
				},
				error: function(data) {
					console.log(data.responseText)
				}
			})
		});

		load_comment();

		function load_comment() {
			$.ajax({
				url: "<?= base_url('post/load_comment/') . $post['id'] ?>",
				method: "GET",
				success: function(data) {
					var d = $.parseJSON(data);
					$('#display_comment').html(d);
				},
				error: function(data) {
					console.log(data.responseText)
				}
			})
		}

		$(document).on('click', 'button.reply', function() {
			var parrent_id = $(this).attr("id");
			var author = $(this).attr("data-author");
			$('#parrent_id').val(parrent_id);
			$('#content').focus();
			$(".replyrow").insertAfter($(this));
			$("#content").attr('placeholder', 'Balas komentar ' + author);
		});

		$(document).on('click', '#cancel', function() {
			$(".replyrow").insertAfter($('.default_replyrow'));
			$('#parrent_id').val(0);
			$("#content").attr('placeholder', 'Tulis Komentar');

		});

		// $(document).on('click', '.delete', function() {
		// 	var komentar_id = $(this).attr("id");
		// 	$.ajax({
		// 		url: "delete_komentar.php",
		// 		method: "POST",
		// 		data: {
		// 			komentar_id: komentar_id
		// 		},
		// 		dataType: 'JSON',
		// 		success: function(data) {
		// 			if (data.status) {
		// 				load_comment();
		// 			} else {
		// 				load_comment();

		// 			}
		// 		},
		// 		error: function(data) {
		// 			console.log(data.responseText)
		// 		}
		// 	});
		// });

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
			}
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
	});
</script>