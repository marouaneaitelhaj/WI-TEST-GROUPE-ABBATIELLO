<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_{name} extends CI_Migration {

    public function up()
    {
        // Add your migration code here
        // Example: $this->dbforge->add_field(array(...));
        // $this->dbforge->create_table('table_name');
    }

    public function down()
    {
        // Add your rollback code here
        // Example: $this->dbforge->drop_table('table_name');
    }
}