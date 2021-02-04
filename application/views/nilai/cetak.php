<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container">

        <h1>Cetak Rekap Nilai</h1>
        <h5>Mata Pelajaran <?= $mapel['nama'] ?> Kelas <?= $kelas['nama'] ?></h5>


        <table>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 15%;">Nama Siswa</th>
                        <!-- dapatkan semua postingan terkait mapel ini dan kelas ini -->
                        <?php
                        $all_post = $this->Nilai_model->get_post_by_category_and_tag($mapel['id'], $kelas['id']);
                        foreach ($all_post as $post) :
                        ?>
                            <th><a href="<?= base_url('post/view/') . $post['post_id'] ?>" style="color: black;"><?= $post['post_title'] ?></a></th>
                        <?php endforeach ?>
                        <th>Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $all_siswa = $this->Rombel_model->get_siswa_by_kelas($kelas['id']);

                    foreach ($all_siswa as $siswa) :
                    ?>
                        <tr>
                            <td><?= $siswa['first_name'] . ' ' . $siswa['last_name'] ?></td>
                            <?php
                            // dapatkan semua postingan terkait mapel ini dan kelas ini
                            $all_post = $this->Nilai_model->get_post_by_category_and_tag($mapel['id'], $kelas['id']);
                            foreach ($all_post as $post) :
                                // dapatkan semua nilai terkait siswa dan post ini
                                $all_nilai = $this->Nilai_model->get_nilai_all_siswa_by_post($siswa['user_id'], $post['post_id']);
                                if (!empty($all_nilai)) {
                                    foreach ($all_nilai as $nilai) :
                                        echo '<td>' . $nilai['nilai'] . '</td>';
                                    endforeach;
                                } else {
                                    echo '<td>0</td>';
                                }
                            endforeach;
                            ?>
                            <td>
                                <?php
                                $rerata = $this->Nilai_model->get_nilai_rerata($siswa['user_id'], $mapel['id']);
                                echo round($rerata['rerata'], 1);
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>