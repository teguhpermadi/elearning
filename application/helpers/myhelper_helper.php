<?php

function user_info()
{
    // pengganti $this
    $ci = &get_instance();

    // dapatkan informasi user
    $user = $ci->ion_auth->user()->row(); // informasi data user
    $user_groups = $ci->ion_auth->get_users_groups($user->id)->row(); // informasi group user

    $data = [
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
        'company' => $user->company,
        'phone' => $user->phone,
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
