<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVentas extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_producto' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_producto','productos','id','CASCADE','SET NULL');
        $this->forge->createTable('ventas');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('ventas');
    }
}

