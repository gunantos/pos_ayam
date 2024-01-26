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
                'name' => 'setoran_tunai',
                'label' => 'Setoran Tunai',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'SETORAN',
                'group_table'=>'SETORAN',
            ],
            [
                'name' => 'setoran_transfer',
                'label' => 'Setoran Transfer',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'SETORAN',
                'group_table'=>'SETORAN',
            ],
            [
                'name' => 'piutang_tunai',
                'label' => 'Piutang Tunai',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'PIUTANG',
                'group_table'=>'PIUTANG',
            ],
            [
                'name' => 'piutang_transfer',
                'label' => 'Piutang Transfer',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'text',
                'showOnTable' => true,
                'group_input'=>'PIUTANG',
                'group_table'=>'PIUTANG',
            ],
            [
                'name' => 'id_users',
                'label' => 'ID User',
                'primaryKey' => false,
                'allowed' => true,
                'type' => 'none',
                'showOnTable' => false,
            ],
        ];
    }
}
