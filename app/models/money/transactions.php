<?php namespace models\money;

class Transactions extends \core\Model {
    private $concatStrFrom = 'aFrom.id as idFrom, CONCAT(aFrom.type, ":", aFrom.parentAccount, ":", aFrom.name) as pathFrom';
    private $concatStrTo = 'aTo.id as idTo, CONCAT(aTo.type, ":", aTo.parentAccount, ":", aTo.name) as pathTo';
    public function __construct() {
        parent::__construct();
    }
    public function getTransactions() {
        return $this->_db->select('SELECT t.*'
                .', '.$this->concatStrFrom
                .', '.$this->concatStrTo
                .', mFrom.username as usermameFrom'
                .', mTo.username as usernameTo'
                .' FROM '.PREFIX.'transactions AS t'
                .' LEFT JOIN '.PREFIX.'accounts AS aFrom ON t.transferFrom=aFrom.id'
                .' LEFT JOIN '.PREFIX.'accounts AS aTo ON t.transferTo=aTo.id'
                .' LEFT JOIN '.PREFIX.'members AS mFrom ON mFrom.id=aFrom.ownerId'
                .' LEFT JOIN '.PREFIX.'members AS mTo ON mTo.id=aTo.ownerId'
                .' ORDER BY t.date;');
    }
    public function getAccountPaths() {
        return $this->_db->select(
                'SELECT'
                .' '.$this->concatStrTo
                .' FROM '.PREFIX.'accounts AS aTo'
                .' ORDER BY pathTo ASC'
                );
    }
    public function addTransactions($data) {
        $this->_db->insert(PREFIX.'transactions', $data);
    }
    public  function deleteTransaction($where) {
        $this->_db->delete(PREFIX.'transactions', $where);
    }
}

