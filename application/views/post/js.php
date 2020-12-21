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
				method: "POST",
				success: function(data) {
					var d = $.parseJSON(data);
					$('#display_comment').html(d);
				},
				error: function(data) {
					console.log(data.responseText)
				}
			})
		}

		$(document).on('click', '.reply', function() {
			var parrent_id = $(this).attr("id");
			$('#parrent_id').val(parrent_id);
			// $('#content').focus();

			$(".replyrow").insertAfter($(parrent_id));
			$(".replyrow").show();
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
	});
</script>