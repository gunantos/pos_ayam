<?php

namespace App\Models;

use CodeIgniter\Model;

class Keuangan extends MyModel
{
    protected $table = 'keuangan';

    public function myfields(): array
    {
        return [
            [
                'name' => 'id_keuangan',
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
                'name' => 'setoran_tunai',
                'label' => 'Setoran Hotel',
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
                'group_input'=>'SETORAN',
                'group_table'=>'SETORAN',
            ],
            [
                'name' => 'setoran_transfer',
                'label' => 'Setoran Langganan',
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
                'group_input'=>'SETORAN',
                'group_table'=>'SETORAN',
            ],
            [
                'name' => 'piutang_tunai',
                'label' => 'Piutang Hotel',
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
                'group_input'=>'PIUTANG',
                'group_table'=>'PIUTANG',
            ],
            [
                'name' => 'piutang_transfer',
                'label' => 'Piutang Langganan',
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
                'group_input'=>'PIUTANG',
                'group_table'=>'PIUTANG',
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
