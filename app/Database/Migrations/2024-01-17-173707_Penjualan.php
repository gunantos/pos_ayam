<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penjualan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'null' => true,
            ],
            'type' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1,
            ],
            'jumlah' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'berat' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
                'default' => 0,
            ],
            'total_rp' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'total_bayar' => [
                'type' => 'INT',
                'default' => 'total_rp',
            ],
            'total_utang' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'id_users' => [
                'type' => 'INT',
                'null' => true,
            ],
            'createdAt' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'updatedAt' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on update' => 'CURRENT_TIMESTAMP',
            ],
        ]);

        $this->forge->addKey('id_penjualan', true);
        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
