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
					// var obj = JSON.parse(data)
					var card = `
					<div class="card" id="cardsoal-">
                        <div class="card-header">
                            <span class="badge badge-primary">Jenissoal</span>
                        </div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eaque qui molestiae, pariatur recusandae eum voluptatem delectus. Quibusdam accusamus iure, autem dignissimos fugiat nobis magni quas laborum? Aut, praesentium assumenda?
                            <ol>
                                <li>asd</li>
                                <li>asdas</li>
                            </ol>
                            <div class="alert alert-info" role="alert">
                                Kunci
                            </div>
                            <div class="alert alert-secondary" role="alert">
                                Petunjuk
                            </div>
                            <div class="callout callout-info mt-2">
                                <h5>Pembahasan</h5>
                                <p>Follow the steps to continue to payment.</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </div>
                    </div>
					`
					console.log(data)
					$('#reviewsoal').append(card)
				},
			});
		}

		if ($(this).is(":not(:checked)")) {
			var id = $(this).attr('value')
			$('#sisipkansoal-' + id).remove()
		}
	})
</script>