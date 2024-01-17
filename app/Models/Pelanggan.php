<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan extends MyModel
{
    protected $table = 'pelanggan';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_pelanggan',
                'label' => 'ID Pelanggan',
                'primaryKey' => true,
                'allowed' => false,
                'type' => 'hidden',
                'showOnTable' => true,
            ],
            [
                'name' => 'nama_pelanggan',
                'label' => 'Nama Pelanggan',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|max_length[255]',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'max_length' => 'Maksimal 255 karakter',
                ],
                'type' => 'text',
                'showOnTable' => true,
            ],
            [
                'name' => 'is_hotel',
                'label' => 'Is Hotel',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|in_list[0,1]',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'in_list' => 'Pilih antara 0 atau 1',
                ],
                'type' => 'text',
                'showOnTable' => true,
            ],
            [
                'name' => 'alamat',
                'label' => 'Alamat',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'max_length[255]',
                'rulesMessage' => ['max_length' => 'Maksimal 255 karakter'],
                'type' => 'text',
                'showOnTable' => true,
            ],
            [
                'name' => 'telp',
                'label' => 'Telepon',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'max_length[25]',
                'rulesMessage' => ['max_length' => 'Maksimal 25 karakter'],
                'type' => 'text',
                'showOnTable' => true,
            ],
            [
                'name' => 'id_user',
                'label' => 'ID User',
                'primaryKey' => false,
                'allowed' => true,
                'type' => 'none',
                'showOnTable' => true,
            ],
        ];
    }
}
