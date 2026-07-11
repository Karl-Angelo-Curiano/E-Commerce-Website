<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true,
            ],
            'user_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
            ],
            'address'=>[
                'type'=>'TEXT',
            ],
            'city'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
            ],
            'province'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
            ],
            'zip_code'=>[
                'type'=>'VARCHAR',
                'constraint'=>20,
            ],
            'created_at'=>[
                'type'=>'DATETIME',
                'null'=>true,
            ],
            'updated_at'=>[
                'type'=>'DATETIME',
                'null'=>true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
        $this->forge->createTable('addresses');
    }

    public function down()
    {
        $this->forge->dropTable('addresses');
    }
}