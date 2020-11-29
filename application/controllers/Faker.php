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

        $faker->seed(10);
        $random_number_image = rand(0,1084);
        for ($i=0; $i < 10; $i++) { 
            $url = $faker->imageUrl(100,100, $random_number_image + $i);
            # code...
            // echo $faker->title;
            // echo "<br>";
            echo $faker->phoneNumber;
            echo "<br>";
    
            // echo $faker->lastName;
            // echo "<br>";
        }
    }

    public function faker_guru()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));
        $faker->seed(10);
        $random_number_image = rand(0,1084);

        $data = [];
        // generate data faker
        for ($i=0; $i < 10; $i++) { 
            $url = $faker->imageUrl(100,100, $random_number_image);
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
}
