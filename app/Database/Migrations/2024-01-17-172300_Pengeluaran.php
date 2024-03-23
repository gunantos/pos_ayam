<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'kandang' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'kantor' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'ayam' => [
                'type' => 'INT',
                'default' => 0,
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

        $this->forge->addKey('id_pengeluaran', true);
        $this->forge->createTable('pengeluaran');
        $this->db->query('ALTER TABLE ayam_mati MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE ayam_mati MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down()
    {
        $this->forge->dropTable('pengeluaran');
    }
}
