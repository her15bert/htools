<?php namespace models\admin;
 
class Admin extends \core\Model {
    public function __construct() {
        parent::__construct();
    }
    public function getUser($id) {
        $data = $this->_db->select('SELECT * FROM '.PREFIX.'members WHERE id = :id',
                array(':id' => $id));
        return $data[0];
    }
}
