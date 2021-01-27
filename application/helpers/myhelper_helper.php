<?php

function check_login()
{
    // pengganti $this
    $ci = &get_instance();

    if (!$ci->ion_auth->logged_in()) {
        redirect('auth/login');
    }
}

function user_info()
{
    // pengganti $this
    $ci = &get_instance();

    // dapatkan informasi user
    $user = $ci->ion_auth->user()->row(); // informasi data user
    $user_groups = $ci->ion_auth->get_users_groups($user->id)->row(); // informasi group user

    $data = [
        'id' => $user->id,
        'ip_address' => $user->ip_address,
        'username' => $user->username,
        'password' => $user->password,
        'email' => $user->email,
        'activation_code' => $user->activation_code,
        'forgotten_password_code' => $user->forgotten_password_code,
        'remember_code' => $user->remember_code,
        'created_on' => $user->created_on,
        'last_login' => $user->last_login,
        'active' => $user->active,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'full_name' => $user->first_name . ' ' .  $user->last_name,
        'company' => $user->company,
        'phone' => $user->phone,
        'foto' => $user->foto,
    ];

    switch ($user_groups->name) {
        case 'admin':
            $role = ['role' => 'admin'];
            return array_merge($data, $role);
            break;
        case 'guru':
            $role = ['role' => 'guru'];
            return array_merge($data, $role);
            break;
        case 'siswa':
            $role = ['role' => 'siswa'];
            return array_merge($data, $role);
            break;
    }

    return $data;
}

function user_menu()
{
    // pengganti $this
    $ci = &get_instance();

    switch (user_info()['role']) {
        case 'admin':
            $ci->load->view('template/menu_admin');
            break;
        case 'guru':
            $ci->load->view('template/menu_guru');
            break;
        case 'siswa':
            $ci->load->view('template/menu_siswa');
            break;
    }
}

function datetime_now()
{
    date_default_timezone_set('Asia/Jakarta');
    return date("Y-m-d\TH:i");
}

function time_elapsed_string($datetime, $full = false)
{

    date_default_timezone_set('Asia/Jakarta');
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'tahun',
        'm' => 'bulan',
        'w' => 'minggu',
        'd' => 'hari',
        'h' => 'jam',
        'i' => 'menit',
        's' => 'detik',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' lalu' : 'baru saja';
}

function generateRandomString($length = 6)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
