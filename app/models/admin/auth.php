<?php namespace models\admin;

class Auth extends \core\Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function getHash($username){
        $data = $this->_db->select('SELECT password FROM '.PREFIX.'members WHERE username = :username',
                array(':username' => $username));
        return $data[0]->password;
    }
    public function getMemberId($username) {
        $data = $this->_db->select('SELECT id FROM '.PREFIX.'members WHERE username = :username',
                array(':username' => $username));
        return $data[0]->id;
    }
}

