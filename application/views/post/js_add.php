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

		$.fn.fileUploader = function(filesToUpload) {
			this.closest(".files").change(function(evt) {

				for (var i = 0; i < evt.target.files.length; i++) {
					filesToUpload.push(evt.target.files[i]);
				};
				var output = [];

				for (var i = 0, f; f = evt.target.files[i]; i++) {
					var removeLink = "<a class=\"removeFile\" href=\"#\" data-fileid=\"" + i + "\">Remove</a>";

					output.push("<li><strong>", f.name, "</strong> - ",
						f.size, " bytes. &nbsp; &nbsp; ", removeLink, "</li> ");
				}

				$(this).children(".fileList")
					.append(output.join(""));
			});
		};

		var filesToUpload = [];

		$(document).on("click", ".removeFile", function(e) {
			e.preventDefault();
			var fileName = $(this).parent().children("strong").text();
			// loop through the files array and check if the name of that file matches FileName
			// and get the index of the match
			for (i = 0; i < filesToUpload.length; ++i) {
				if (filesToUpload[i].name == fileName) {
					// console.log("match at: " + i);
					// remove the one element at the index where we get a match
					filesToUpload.splice(i, 1);
				}
			}
			//console.log(filesToUpload);
			// remove the <li> element of the removed file from the page DOM
			$(this).parent().remove();
		});


		$("#files").fileUploader(filesToUpload);

	})
</script>