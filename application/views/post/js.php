<script>
    $(document).ready(function() {
        var max = '<?= $max  ?>';
        getallcomment()

        $("#addcomment").on('click', function() {
            var post_id = $("#post_id").val();;
            var parrent_id = 0;
            var comment = $("#comment").val();

            if (comment.length >= 1) {
                $.ajax({
                    url: "<?= base_url('post/add_comment') ?>",
                    method: 'POST',
                    data: {
                        post_id: post_id,
                        parrent_id: parrent_id,
                        comment: comment,
                    },
                    success: function(data) {
                        var result = JSON.parse(data);
                        $("#comment").val("");
                        console.log(result)
                        // max++;
                        // $("#comm_count").text(max + " Comments");
                        // $(".usercomments").html('')
                        // getallcomment();

                        // tambahkan feedback dari komentar baru kedalam html
                        $(".usercomments").append(`
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="">
                            <div class="comment-text">
                            <span class="username">` + 
                            + result.first_name +
                            `<span class="text-muted float-right">` + result.published_at + `</span>
                            </span>`
                            + result.content +
                            `<br>
                            <a href="javascript:void(0)" data-commentID=` + result.id + ` onclick="reply(this)" class="btn btn-default btn-sm">
                            <i class="fas fa-share"></i> Balas</a></div>
                            </div>
                        </div>
                        `);

                    },
                    error: function() {
                        alert('Data not inserted.');
                    }

                });
            }
        })

        $("#addreply").on('click', function() {
            var post_id = $('#post_id').val()
            var parrent_id = $('#comment_id').val()
            var comment = $("#replycomment").val();

            if (comment.length >= 1) {
                $.ajax({
                    url: "<?= base_url('post/add_comment') ?>",
                    method: 'POST',
                    data: {
                        post_id: post_id,
                        parrent_id: parrent_id,
                        comment: comment,
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        // max++;
                        // $("#comm_count").text(max + " Comments");
                        $("#replycomment").val("");

                        $(".replyrow").hide();

                        // $(".usercomments").html('')
                        // getallcomment();

                        $(".replyrow").parent().next().append(`
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="' . base_url('node_modules/admin-lte/dist/img/user3-128x128.jpg') . '">
                            <div class="comment-text">
                            <span class="username">` + 
                            + result.first_name +
                            `<span class="text-muted float-right">` + result.published_at + `</span>
                            </span>`
                            + result.content +
                            `<br>
                            <a href="javascript:void(0)" data-commentID=` + result.id + ` onclick="reply(this)" class="btn btn-default btn-sm">
                            <i class="fas fa-share"></i> Balas</a></div>
                            </div>
                        </div>
                        `);
                    },
                    error: function() {
                        alert('Data not inserted');
                    }

                });
            } else {
                alert('please check your input reply commment');
            }

            // getallcomment();
        })

        function getallcomment() {

            // if (start > max) {
            //     return;
            // }
            $.ajax({
                url: '<?= base_url('post/all_comment/') . $post['id'] ?>',
                method: 'POST',
                datatype: 'JSON',
                // data: {
                //     start: start
                // },
                success: function(response) {
                    // body...
                    // console.log(response)
                    var d = $.parseJSON(response);
                    $(".usercomments").append(d);
                    // getallComment((start + 20), max);
                },
                error: function() {
                    // body...
                    alert('Data not found');
                }
            });
        }

    })

    function reply(caller) {
        commentid = $(caller).attr('data-commentID');
        $('#comment_id').val(commentid)
        $(".replyrow").insertAfter($(caller));
        $(".replyrow").show();
    }
</script>