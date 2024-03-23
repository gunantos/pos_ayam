<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keuangan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'setoran_tunai' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'setoran_transfer' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'piutang_tunai' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'piutang_transfer' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'id_user' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
            ],
            'createdAt' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
            'updatedAt' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id_keuangan', true);
        $this->forge->createTable('keuangan');
        $this->db->query('ALTER TABLE keuangan MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE keuangan MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down()
    {
        $this->forge->dropTable('keuangan');
    }
}
