<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Setoran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_setoran' => [
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
            'tunai' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 1,
            ],
            'jumlah_setoran' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint'=>255,
                'null'=>true,
                'default' => null,
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

        $this->forge->addKey('id_setoran', true);
        $this->forge->createTable('setoran');
    }

    public function down()
    {
        $this->forge->dropTable('setoran');
    }
}
