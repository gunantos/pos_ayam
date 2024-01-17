<?php

namespace App\Models;

use CodeIgniter\Model;

class Omset extends MyModel
{
    protected $table = 'omset';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_omset',
                'label' => 'ID Omset',
                'primaryKey' => true,
                'allowed' => false,
                'type' => 'hidden',
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
                'name' => 'omset',
                'label' => 'Omset',
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
                'name' => 'do',
                'label' => 'DO',
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
                'type' => 'textarea',
                'showOnTable' => true,
            ],
            [
                'name' => 'id_users',
                'label' => 'ID User',
                'primaryKey' => false,
                'allowed' => true,
                'type' => 'none',
                'showOnTable' => true,
            ],
        ];
    }
}
