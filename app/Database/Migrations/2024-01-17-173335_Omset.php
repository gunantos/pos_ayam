<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Omset extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_omset' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'omset' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'do' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'id_users' => [
                'type' => 'INT',
                'null' => true,
                'default' => null,
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

        $this->forge->addKey('id_omset', true);
        $this->forge->createTable('omset');
    }

     public function down()
    {
        $this->forge->dropTable('omset');
    }
}