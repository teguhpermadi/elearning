<script>
    var all_token = [];

    Dropzone.autoDiscover = false;
    var file = new Dropzone(".dropzone", {
        url: "<?php echo base_url('post/upload_files') ?>",
        // maxFilesize: 2,  // maximum size to uplaod 
        method: "post",
        acceptedFiles: "image/*", // allow only images
        paramName: "userfile",
        dictInvalidFileType: "Image files only allowed", // error message for other files on image only restriction 
        addRemoveLinks: true,
        autoProcessQueue: true
    });


    file.on("sending", function(a, b, c) {
        a.token = Math.random();
        c.append("token", a.token); //Random Token generated for every files 
        $('.token').append('<input type="text" class="token" name="token[]" id="token" value="' + a.token + '" data-token="' + a.token + '">')
        all_token.push(a.token)
    });

    file.on("success",function(){
        get_image(all_token)
    });

    function get_image(all_token) {
        $.ajax({
            data: {
                token: all_token,
            },
            type: "POST",
            url: "<?php echo base_url('flipbook/read_image') ?>",
            cache: false,
            success: function(response) {
                res = JSON.parse(response)
                console.log(res);
            }
        });
    }


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
                all_token = $.grep(all_token, function(value) {
                    return value != token;
                });
                get_image(all_token)
                // console.log(all_token)
            }

        });
    });
</script>