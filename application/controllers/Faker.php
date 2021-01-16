<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

class Faker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $faker = Faker\Factory::create();
        $faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));

        $faker->seed(100);
        // $random_number_image = rand(0,1084);
        for ($i = 0; $i < 100; $i++) {
            //     $url = $faker->imageUrl(100,100, $random_number_image + $i);
            # code...
            // echo $faker->title;
            // echo $faker->name;
            // echo "<br>";
            // echo $faker->phoneNumber;
            // echo $faker->realText($maxNbChars = 500, $indexSize = 2);
            // echo "<br><br>";
            // echo $faker->lastName;
            // echo "<br>";
        }
    }

    public function guru()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));
        $faker->seed(10);
        $random_number_image = rand(0, 1084);

        $data = [];
        // generate data faker
        for ($i = 0; $i < 10; $i++) {
            $url = $faker->imageUrl(100, 100, $random_number_image);
            array_push($data, [
                // isi data pada tabel guru
                'first_name' => $faker->firstName,
                'no_hp' => $faker->e164PhoneNumber,
                'email' => $faker->email,
                'password' => $faker->password,
                'nomor_induk' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'foto' => $url,
            ]);
        }

        $this->db->insert_batch('guru', $data);
        echo 'Faker Guru Success';
    }

    public function soal()
    {
        $faker = Faker\Factory::create();
        $faker->seed(20);
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $soal = [
                // isi data pada tabel guru
                'author_id' => $faker->numberBetween($min = 3, $max = 5),
                'mapel_id' => $faker->numberBetween($min = 1, $max = 3),
                'tingkat' => $faker->numberBetween($min = 7, $max = 9),
                'created_at' => datetime_now(),
                'soal' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'jenis_soal' => '1',
                'opsi' => json_encode(
                    [
                        'a' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                        'b' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                        'c' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                        'd' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    ]
                ),
                'kunci' => $faker->randomElement($array = array('a', 'b', 'c', 'd')),
                'petunjuk' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'pembahasan' => $faker->sentence($nbWords = 15, $variableNbWords = true),
                'skor' => $faker->numberBetween($min = 1, $max = 5),
            ];
            
            array_push($data, $soal);
        }

        echo json_encode($data);
        $this->db->insert_batch('soal', $data);
        // echo 'Faker soal Success';
    }

    public function ujian()
    {
        $faker = Faker\Factory::create();
        $faker->seed(5);
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $soal_id = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];
            $date = $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 5 days', $timezone = 'Asia/Jakarta');
            array_push($data, [
                'author_id' => $faker->numberBetween($min = 3, $max = 5),
                'created_at' => datetime_now(),
                'nama_ujian' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'waktu_mulai' => datetime_now(),
                'waktu_selesai' => $date->format("Y-m-d\TH:m"),
            ]);
        }

        // echo json_encode($data);
        $this->db->insert_batch('ujian', $data);
        echo 'Faker ujian success';
    }
}
