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
            'tanggal' => [
                'type' => 'DATE',
            ],
            'besar_berat' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
            ],
            'besar_ekor' => [
                'type' => 'INT',
            ],
            'besar_kg_tu' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
                'null'=>true,
                'default'=>null
            ],
            'kecil_berat' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
            ],
            'kecil_ekor' => [
                'type' => 'INT',
            ],
            'kecil_kg_tu' => [
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
