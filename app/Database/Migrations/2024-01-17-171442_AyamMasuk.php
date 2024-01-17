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
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'updatedAt' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on update' => 'CURRENT_TIMESTAMP',
            ],
        ]);

        $this->forge->addKey('id_masuk', true);
        $this->forge->createTable('ayam_masuk');
    }

    public function down()
    {
       $this->forge->dropTable('ayam_masuk');
    }
}
