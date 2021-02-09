<script>
    var database = firebase.database();

    function readData() {
        <?php
        $count = $this->Ujian_model->count_soal($ujian['id']);
        ?>
        var totalSoal = '<?= $count['total'] ?>'
        var starCountRef = firebase.database().ref('ujian/<?= $ujian['id'] ?>');
        starCountRef.on('value', (snapshot) => {
            const data = snapshot.val();
            // updateStarCount(postElement, data);
            console.log(data)
            var html = ''
            for (const prop in data) {
                // console.log(`data.${prop} = ${data[prop]['connections']}`);
                html += `<tr>`
                html += `<td>${data[prop]['nama_siswa']}</td>`
                html += `<td>
                            <div class="progress">
                            <div class="progress-bar" id="progress-bar-${data[prop]['id_siswa']}" role="progressbar"></div>
                            </div>
                        </td>`
                html += `<td>${data[prop]['waktu_mulai']}</td>`
                if(data[prop][status] == 'Sedang Mengerjakan'){
                    html += `<td><span class="badge badge-primary">${data[prop]['status']}</span></td>`
                } else {
                    html += `<td><span class="badge badge-primary">${data[prop]['status']}</span></td>`
                }
                html += `<td>${data[prop]['nilai']}</td>`
                html += `<td></td>`
                html += `</tr>`
                $('#tbody-monitor').html(html)

                var ujianProgres = `${data[prop]['ujian_progres']}`
                var progres = Math.ceil(ujianProgres / totalSoal * 100)
                console.log(progres)
                $('#progress-bar-' + data[prop]['id_siswa']).html(progres + ' %')
                $('#progress-bar-' + data[prop]['id_siswa']).width(progres + '%');
                $('#progress-bar-' + data[prop]['id_siswa']).attr('aria-valuenow', ujianProgres)
                $('#progress-bar-' + data[prop]['id_siswa']).attr('aria-valuemax', '<?= $count['total'] ?>')
            }

        });
    }

    readData()
</script>