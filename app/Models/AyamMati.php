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
                'group_input'=>'MATI BESAR',
                'group_table'=>'MATI BESAR',
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
                'group_input'=>'MATI BESAR',
                'group_table'=>'MATI BESAR',
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
                'group_input'=>'MATI KECIL',
                'group_table'=>'MATI KECIL',
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
                'group_input'=>'MATI KECIL',
                'group_table'=>'MATI KECIL',
            ],
            [
                'name' => 'sisa_jlh_besar',
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
                'group_input'=>'SISA BESAR',
                'group_table'=>'SISA BESAR',
            ],
            [
                'name' => 'sisa_berat_besar',
                'label' => 'Berat',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'numeric',
                'rulesMessage' => ['numeric' => 'Harus berupa angka'],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'SISA BESAR',
                'group_table'=>'SISA BESAR',
            ],
            [
                'name' => 'sisa_jlh_kecil',
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
                'group_input'=>'SISA KECIL',
                'group_table'=>'SISA KECIL',
            ],
            [
                'name' => 'sisa_berat_kecil',
                'label' => 'Berat',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'numeric',
                'rulesMessage' => ['numeric' => 'Harus berupa angka'],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'SISA KECIL',
                'group_table'=>'SISA KECIL',
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
