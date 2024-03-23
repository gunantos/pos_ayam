<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjualan extends MyModel
{
    protected $table = 'penjualan';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_penjualan',
                'label' => 'ID',
                'primaryKey' => true,
                'allowed' => false,
                'type' => 'hidden',
                'showOnTable' => false,
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
                'label' => 'Ekor',
                'primaryKey' => false,
                'group_input'=>'BESAR',
                'group_table'=>'Besar',
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'number',
                'showOnTable' => true,
            ],
            [
                'name' => 'besar_berat',
                'label' => 'Berat',
                'group_input'=>'BESAR',
                'group_table'=>'Besar',
                'primaryKey' => false,
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
                'onGrafik'=>true,
                'showOnTable' => true,
            ],
            [
                'name' => 'kecil_jumlah',
                'label' => 'Ekor',
                'primaryKey' => false,
                'group_input'=>'KECIL',
                'group_table'=>'KECIL',
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'number',
                'showOnTable' => true,
            ],
            [
                'name' => 'kecil_berat',
                'label' => 'Berat',
                'primaryKey' => false,
                'group_input'=>'KECIL',
                'group_table'=>'KECIL',
                'allowed' => true,
                'allowed_search'=>true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
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
