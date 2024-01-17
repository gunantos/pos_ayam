<?php

namespace App\Models;

use CodeIgniter\Model;

class AyamMati extends MyModel
{
    protected $table            = 'ayam_mati';
     public function myfields(): array
    {
        return [
            [
                'name' => 'id_mati',
                'label' => 'ID Mati',
                'primaryKey' => true,
                'allowed' => false,
                'type' => 'hidden',
                'showOnTable' => true,
            ],
            [
                'name' => 'type',
                'label' => 'Type',
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
                'name' => 'jumlah',
                'label' => 'Jumlah',
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
                'name' => 'berat',
                'label' => 'Berat',
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
