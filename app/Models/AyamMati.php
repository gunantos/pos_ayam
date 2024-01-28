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
                'name' => 'besar_jumlah',
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
                'onGrafik'=>true,
                'group_input'=>'BESAR',
                'group_table'=>'BESAR',
            ],
            [
                'name' => 'besar_berat',
                'label' => 'Berat',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'numeric',
                'rulesMessage' => ['numeric' => 'Harus berupa angka'],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'BESAR',
                'group_table'=>'BESAR',
            ],
            [
                'name' => 'kecil_jumlah',
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
                'onGrafik'=>true,
                'group_input'=>'KECIL',
                'group_table'=>'KECIL',
            ],
            [
                'name' => 'kecil_berat',
                'label' => 'Berat',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'numeric',
                'rulesMessage' => ['numeric' => 'Harus berupa angka'],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'KECIL',
                'group_table'=>'KECIL',
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
