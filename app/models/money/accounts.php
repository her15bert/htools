<?php namespace models\money;

class Accounts extends \core\Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function getAccountTypes(){
        return $this->_db->select('SELECT * FROM '.PREFIX.'nosql WHERE type = :type',
                array(':type' => 'accountType'));
    }
    public function getMemberId($username) {
        $data = $this->_db->select('SELECT id FROM '.PREFIX.'members WHERE username = :username',
                array(':username' => $username));
        return $data[0]->id;
    }
    public function addAccount($data) {
        $this->_db->insert(PREFIX.'accounts', $data);
    }
    public function getAccounts() {
        return $this->_db->select('SELECT * FROM '.PREFIX.'accounts ORDER BY type ASC, parentAccount ASC, name ASC;');
    }
    public function getAccount($id) {
        $data = $this->_db->select('SELECT * FROM '.PREFIX.'accounts WHERE id = :id',
                array(':id' => $id));
        return $data[0];
    }
    public function updateAccount($data, $where) {
        $this->_db->update(PREFIX.'accounts', $data, $where);
    }
    public function deleteAccount($where) {
        $this->_db->delete(PREFIX.'accounts', $where);
    }
}
