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
                'name' => 'type',
                'label' => 'Type',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|in_list[0,1]',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'in_list' => 'Pilih antara 0 atau 1',
                ],
                'type' => 'select',
                'options'=>[
                    '1'=>'Besar',
                    '0'=>'Kecil'
                ],
                'showOnTable' => true,
            ],
            [
                'name' => 'tanggal',
                'label' => 'Tanggal',
                'primaryKey' => false,
                'allowed' => true,
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
                'name' => 'berat',
                'label' => 'Berat',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
                'showOnTable' => true,
            ],
            [
                'name' => 'ekor',
                'label' => 'Jumlah Ekor',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'number',
                'showOnTable' => true,
            ],
            [
                'name' => 'kg_tu',
                'label' => 'KG TU',
                'primaryKey' => false,
                'allowed' => true,
                'rules' => 'required|numeric',
                'rulesMessage' => [
                    'required' => 'Wajib diisi',
                    'numeric' => 'Harus berupa angka',
                ],
                'type' => 'decimal',
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
