<?php

namespace App\Models;

use CodeIgniter\Model;

class AyamMasuk extends MyModel
{
    protected $table = 'ayam_masuk';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_masuk',
                'label' => 'ID Masuk',
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
                'allowed_search'=>true,
                'rules' => 'required|valid_date',
                'value'=>date('Y-m-d'),
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'valid_date' => 'Format tanggal tidak valid',
                ],
                'type' => 'date',
                'showOnTable' => true,
            ],
            [
                'name' => 'besar_ekor',
                'label' => 'EKOR',
                'primaryKey' => false,
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'number',
                'showOnTable' => true,
                'group_input'=>'BESAR',
                'group_table'=>'BESAR',
            ],
            [
                'name' => 'besar_berat',
                'label' => 'Berat',
                'primaryKey' => false,
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
                'showOnTable' => true,
                'onGrafik'=>true,
                'group_input'=>'BESAR',
                'group_table'=>'BESAR',
            ],
            [
                'name' => 'besar_kg_tu',
                'label' => 'KG TU',
                'primaryKey' => false,
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
                'showOnTable' => true,
                'group_input'=>'BESAR',
                'group_table'=>'BESAR',
            ],
            [
                'name' => 'kecil_ekor',
                'label' => 'EKOR',
                'primaryKey' => false,
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'number',
                'showOnTable' => true,
                'group_input'=>'KECIL',
                'group_table'=>'KECIL',
            ],
            [
                'name' => 'kecil_berat',
                'label' => 'Berat',
                'primaryKey' => false,
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
                'showOnTable' => true,
                'onGrafik'=>true,
                'group_input'=>'KECIL',
                'group_table'=>'KECIL',
            ],
            [
                'name' => 'kecil_kg_tu',
                'label' => 'KG TU',
                'primaryKey' => false,
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
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
