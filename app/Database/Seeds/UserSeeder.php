<?php

namespace App\Database\Seeds;
use Myth\Auth\Password;
use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = new User([
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password_hash' => Password::hash('admin'),
            'active'=>1
        ]);
        $u = new \Myth\Auth\Models\UserModel();
        $u->insert($data);
    }
}
