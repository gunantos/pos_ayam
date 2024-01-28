<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengeluaran extends MyModel
{
    protected $table = 'pengeluaran';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_pengeluaran',
                'label' => 'ID Pengeluaran',
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
                'name' => 'kandang',
                'label' => 'Kandang',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'onGrafik'=>true,
                'showOnTable' => true,
            ],
            [
                'name' => 'kantor',
                'label' => 'Kantor',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'onGrafik'=>true,
                'showOnTable' => true,
            ],
            [
                'name' => 'ayam',
                'label' => 'Ayam',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'onGrafik'=>true,
                'showOnTable' => true,
            ],
            [
                'name' => 'id_user',
                'label' => 'ID User',
                'primaryKey' => false,
                'allowed' => true,
                'type' => 'none',
                'showOnTable' => false,
            ],
        ];
    }
}
