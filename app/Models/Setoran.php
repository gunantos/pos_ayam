<?php

namespace App\Models;

use CodeIgniter\Model;

class Setoran extends MyModel
{
    protected $table = 'setoran';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_setoran',
                'label' => 'ID Setoran',
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
                'name' => 'tunai',
                'label' => 'Tunai',
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
                'name' => 'jumlah_setoran',
                'label' => 'Jumlah Setoran',
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
