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
            'id_users' => [
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

        $this->forge->addKey('id_omset', true);
        $this->forge->createTable('omset');
        $this->db->query('ALTER TABLE omset MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE omset MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

     public function down()
    {
        $this->forge->dropTable('omset');
    }
}