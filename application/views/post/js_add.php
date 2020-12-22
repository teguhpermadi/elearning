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
		$('.token').append('<input type="hidden" name="token[]" id="token" value="'+a.token+'">')
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
</script>