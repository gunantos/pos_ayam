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
            'besar_jumlah' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'besar_berat' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
                'default' => 0,
            ],
            'kecil_jumlah' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'kecil_berat' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
                'default' => 0,
            ],
            'id_users' => [
                'type' => 'INT',
                'null' => true,
            ],
            'createdAt' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updatedAt' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_penjualan', true);
        $this->forge->createTable('penjualan');
        $this->db->query('ALTER TABLE penjualan MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE penjualan MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
