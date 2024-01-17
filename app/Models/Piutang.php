<?php

namespace App\Models;

use CodeIgniter\Model;

class Piutang extends MyModel
{
    protected $table = 'piutang';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_piutang',
                'label' => 'ID Piutang',
                'primaryKey' => true,
                'allowed' => false,
                'type' => 'hidden',
                'showOnTable' => true,
            ],
            [
                'name' => 'id_pelanggan',
                'label' => 'ID Pelanggan',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'numeric',
                'rulesMessage' => ['numeric' => 'Harus berupa angka'],
                'type' => 'text',
                'showOnTable' => true,
            ],
            [
                'name' => 'tanggal',
                'label' => 'Tanggal',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|valid_date',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'valid_date' => 'Format tanggal tidak valid',
                ],
                'type' => 'date',
                'showOnTable' => true,
            ],
            [
                'name' => 'jumlah_piutang',
                'label' => 'Jumlah Piutang',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'showOnTable' => true,
            ],
            [
                'name' => 'keterangan',
                'label' => 'Keterangan',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'max_length[255]',
                'rulesMessage' => ['max_length' => 'Maksimal 255 karakter'],
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
