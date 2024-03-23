<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Piutang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_piutang' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'null' => true,
                'default'=>null
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'jumlah_piutang' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
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

        $this->forge->addKey('id_piutang', true);
        $this->forge->createTable('piutang');
        $this->db->query('ALTER TABLE piutang MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE piutang MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down()
    {
        $this->forge->dropTable('piutang');
    }
}
