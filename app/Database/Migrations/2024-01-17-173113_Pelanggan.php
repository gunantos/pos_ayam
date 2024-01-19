<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'is_hotel' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'telp' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
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

        $this->forge->addKey('id_pelanggan', true);
        $this->forge->createTable('pelanggan');
        $this->db->query('ALTER TABLE pelanggan MODIFY createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
        $this->db->query('ALTER TABLE pelanggan MODIFY updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
