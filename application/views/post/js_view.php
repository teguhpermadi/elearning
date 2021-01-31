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


		// $('.myFile').on('closed.bs.alert', function() {
		// 	var filename = $(this).data('filename')
		// 	var token = $(this).data('token')
		// 	$.ajax({
		// 		data: {
		// 			filename: filename,
		// 			token: token,
		// 		},
		// 		type: "POST",
		// 		url: "<?php echo base_url('post/delete_attachfile') ?>",
		// 		cache: false,
		// 		success: function(response) {
		// 			console.log(response);
		// 		}
		// 	});
		// 	alert('tes')
		// })

	});
</script>

<!-- khusus user role siswa -->
<?php if (user_info()['role'] == 'siswa') : ?>
	<script type="text/javascript">
		$('button.close').on('click', function() {
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
		Dropzone.autoDiscover = false;
		var file = new Dropzone(".dropzone", {
			url: "<?php echo base_url('materi/upload_files') ?>",
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
			c.append('post_id', <?= $post['id'] ?>)
			$('.token').append('<input type="hidden" name="token[]" id="token" value="' + a.token + '">')
			$('.token').append('<input type="hidden" name="post_id[]" id="post_id" value="<?= $post['id'] ?>">')
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
				url: "<?php echo base_url('materi/delete_files') ?>",
				cache: false,
				dataType: 'json',
				success: function(res) {
					// alert('Selected file removed !');			
				}

			});
		});
	</script>
<?php endif ?>

<?php if (user_info()['role'] == 'guru') : ?>
	<script>
		$('.list-siswa').on('click', function() {
			var siswa_id = $(this).data('siswaid')
			var tag_id = $(this).data('tagid')

			// $('#list-'+tag_id).html(siswa_id)
			$.ajax({
				type: "post",
				data: {
					siswa_id: siswa_id,
					post_id: '<?= $post['id'] ?>'
				},
				url: "<?php echo base_url('post/get_filesiswa') ?>",
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					// var d = $.parseJSON(data);
					$('#list-' + tag_id).html(data);
					// console.log(data);
				}

			});
		});

		function saveNilai() {
			var siswa_id = $('#siswa_id').val()
			var post_id = $('#post_id').val()
			var nilai = $('#nilai').val()
			var keterangan = $('#keterangan').val()

			$.ajax({
				type: "post",
				data: {
					siswa_id: siswa_id,
					post_id: post_id,
					nilai: nilai,
					keterangan: keterangan,
				},
				url: "<?php echo base_url('post/save_nilai') ?>",
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					// var d = $.parseJSON(data);
					// $('#list-'+tag_id).html(data);
					// console.log(data);
					toastr.success('Nilai tersimpan.')
					toastr.options = {
						"closeButton": false,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "2000",
						"hideDuration": "1000",
						"timeOut": "1000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				}

			});
		}
	</script>
<?php endif ?>