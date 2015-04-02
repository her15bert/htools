<?php namespace controllers\money;
use \core\View,
        \helpers\Session,
        \helpers\Url;

class Money extends \core\Controller {
    private $_model;
    private $_modelAccounts;
    private $_modelTransactions;
    
    public function __construct() {
        parent::__construct();
        
        if (Session::get('loggedin')==false) {
            Url::redirect('admin\login');
        }
        $this->_modelAccounts = new \models\money\Accounts();
        $this->_modelTransactions = new \models\money\Transactions();
    }
    public function index() {
        $data['title'] = 'Money';
        $data['money'] = $this->getMoney();
        echo '<pre>';
        echo print_r($data['money']);
        echo '</pre>';
        View::rendertemplate('main/header', $data);
        View::render('money/money', $data);
        View::rendertemplate('main/footer', $data);
    }
    private function getMoney() {
        $data['income'] = array(
            'users' => array(),
            'date' => array(),
            'total' => 0
            );
        $data['expense'] = array(
            'users' => array(),
            'date' => array(),
            'total' => 0
            );
        $transactions = $this->_modelTransactions->getTransactions();
        echo '<pre>';
        echo print_r($transactions);
        echo '</pre>';
        foreach ($transactions as $row)
        {
            // <editor-fold desc="users init">
            if (!array_key_exists($row->usernameTo, $data['income']['users'])) {
                $data['income']['users'][$row->usernameTo] = 0;
            }
            if (!array_key_exists($row->usernameTo, $data['expense']['users'])) {
                $data['expense']['users'][$row->usernameTo] = 0;
            }
            // </editor-fold>
            
            // <editor-fold desc="date init">
            $d=strtotime($row->date);
            $year = date('Y', $d);
            $month = date('m', $d);
            if (!array_key_exists($year, $data['income']['date'])) {
                $data['income']['date'][$year] = array();
            }
            if (!array_key_exists($month, $data['income']['date'][$year])) {
                $data['income']['date'][$year][$month] = 0;
            }
            if (!array_key_exists($year, $data['expense']['date'])) {
                $data['expense']['date'][$year] = array();
            }
            if (!array_key_exists($month, $data['expense']['date'][$year])) {
                $data['expense']['date'][$year][$month] = 0;
            }
            // </editor-fold>
            
            $amount = $row->amount;
            
            if (strpos($row->pathTo,'Income:') !== false) {
                $data['income']['users'][$row->usernameTo] = $data['income']['users'][$row->usernameTo] + $amount;
                $data['income']['date'][$year][$month] = $data['income']['date'][$year][$month] + $amount;
                $data['income']['total'] = $data['income']['total'] + $amount;
            } else if ((strpos($row->pathTo,'Expense:') !== false)) {
                $data['expense']['users'][$row->usernameTo] = $data['expense']['users'][$row->usernameTo] + $amount;
                $data['expense']['date'][$year][$month] = $data['expense']['date'][$year][$month] + $amount;
                $data['expense']['total'] = $data['expense']['total'] + $amount;
            } else if ((strpos($row->pathTo,'Asset:') !== false)) {
                $data['expense']['users'][$row->usernameTo] = $data['expense']['users'][$row->usernameTo] + $amount;
                $data['expense']['date'][$year][$month] = $data['expense']['date'][$year][$month] + $amount;
                $data['expense']['total'] = $data['expense']['total'] + $amount;
            }
        }
        $data['difference'] = $data['income']['total'] - $data['expense']['total'];
        return $data;
    }
}