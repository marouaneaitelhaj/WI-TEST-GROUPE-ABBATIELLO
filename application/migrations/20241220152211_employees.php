<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_employees extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nom' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'prenom' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'mail' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ),
            'adresse' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'telephone' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'poste' => array(
                'type' => 'ENUM',
                'constraint' => array('Gérant', 'Livreur', 'Cuisinier'),
                'null' => FALSE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('employees');
    }

    public function down()
    {
        $this->dbforge->drop_table('employees');
    }
}