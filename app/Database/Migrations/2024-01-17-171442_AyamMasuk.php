<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AyamMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_masuk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'type' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'berat' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
            ],
            'ekor' => [
                'type' => 'INT',
            ],
            'kg_tu' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
                'null'=>true,
                'default'=>null
            ],
            'id_user' => [
                'type' => 'INT',
                'null' => true,
                'default'=>null
            ],
            'createdAt' => [
                'type' => 'TIMESTAMP',
                'null'=>true,
            ],
            'updatedAt' => [
                'type' => 'TIMESTAMP',
                'null'=>true,
            ],
        ]);

        $this->forge->addKey('id_masuk', true);
        $this->forge->createTable('ayam_masuk');
        $this->db->query('ALTER TABLE ayam_masuk MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE ayam_masuk MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down()
    {
       $this->forge->dropTable('ayam_masuk');
    }
}
