<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AyamMati extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mati' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'type' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'jumlah' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'berat' => [
                'type' => 'FLOAT',
                'constraint' => '5,2',
                'null' => true,
                'default' => null,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'id_user' => [
                'type' => 'INT',
                'null' => true,
                'default'=>null
            ],
            'createdAt' => [
                'type' => 'TIMESTAMP',
                'null'=>true
            ],
            'updatedAt' => [
                'type' => 'TIMESTAMP',
                'null'=>true
            ],
        ]);

        $this->forge->addKey('id_mati', true);
        $this->forge->createTable('ayam_mati');
        $this->db->query('ALTER TABLE ayam_mati MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE ayam_mati MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down()
    {
        $this->forge->dropTable('ayam_mati');
    }
}
