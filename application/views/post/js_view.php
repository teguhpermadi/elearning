<!-- jQuery  -->
<script src="<?= base_url('assets/') ?>dflip/js/libs/jquery.min.js" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="<?= base_url('assets/') ?>dflip/js/dflip.min.js" type="text/javascript"></script>

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
	});
</script>