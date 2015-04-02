<?php namespace models\admin;

class Users extends \core\Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function getUsers() {
        return $this->_db->select('SELECT * FROM '.PREFIX.'members ORDER BY username');
    }
    public function getUser($id) {
        $data = $this->_db->select('SELECT * FROM '.PREFIX.'members WHERE id=:id', 
                array(':id'=> $id));
        return $data[0];
    }
    public function addUser($data) {
        $this->_db->insert(PREFIX.'members', $data);
    }
    public function updateUser($data, $where) {
        $this->_db->update(PREFIX.'members', $data, $where);
    }
    public function deleteUser($where) {
        $this->_db->delete(PREFIX.'members', $where);
    }
}
