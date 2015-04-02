<?php namespace controllers\money;

use \core\View,
        \helpers\Session,
        \helpers\Url;;
        
class Transactions extends \core\Controller {
    private $_model;
    public function __construct() {
        parent::__construct();
        $this->_model = new \models\money\Transactions();
    }
    public function index() {
        $data['title'] = 'Transactions';
        $data['transactions'] = $this->_model->getTransactions();
        
        View::rendertemplate('main/header', $data);
        View::render('money/transactions', $data);
        View::rendertemplate('main/footer', $data);
    }
    public function add() {
        $error;
        $data['title'] = 'Add Transactions';
        $data['accountPaths'] = $this->_model->getAccountPaths();
        
        if (isset($_POST['submit'])) {
            $date = $_POST['date'];
            $description = $_POST['description'];
            $transferFrom = $_POST['transferFrom'];
            $transferTo = $_POST['transferTo'];
            $amount = $_POST['amount'];
            
            // validation
            if ($date=='') {
                $error[] = 'Date name is required';
            }
            if ($description=='') {
                $error[] = 'Description is required';
            }
            if ($transferFrom=='') {
                $error[] = 'Transfer From is required';
            }
            if ($transferTo=='') {
                $error[] = 'Transfer To is required';
            }
            if ($amount=='') {
                $error[] = 'Amount is required';
            }
            // if no error carry on
            if (!$error) {
                $postData['date'] = $date;
                $postData['description'] = $description;
                $postData['transferFrom'] = $transferFrom;
                $postData['transferTo'] = $transferTo;
                $postData['amount'] = $amount;
                $postData['accountId'] = Session::get('memberId');
                
                $this->_model->addTransactions($postData);
                Session::set('message', 'Transaction added');
                Url::redirect('money/transactions');
            }
            
        }
        
        
        View::rendertemplate('main/header', $data);
        View::render('money/transactionAdd', $data, $error);
        View::rendertemplate('main/footer', $data);
    }
    public function edit() {
        $error;
        $data['title'] = 'Add Transactions';
        $data['accountPaths'] = $this->_model->getAccountPaths();
        
        if (isset($_POST['submit'])) {
            $date = $_POST['date'];
            $description = $_POST['description'];
            $transferFrom = $_POST['transferFrom'];
            $transferTo = $_POST['transferTo'];
            $amount = $_POST['amount'];
            
            // validation
            if ($date=='') {
                $error[] = 'Date name is required';
            }
            if ($description=='') {
                $error[] = 'Description is required';
            }
            if ($transferFrom=='') {
                $error[] = 'Transfer From is required';
            }
            if ($transferTo=='') {
                $error[] = 'Transfer To is required';
            }
            if ($amount=='') {
                $error[] = 'Amount is required';
            }
            // if no error carry on
            if (!$error) {
                $postData['date'] = $date;
                $postData['description'] = $description;
                $postData['transferFrom'] = $transferFrom;
                $postData['transferTo'] = $transferTo;
                $postData['amount'] = $amount;
                $postData['accountId'] = Session::get('memberId');
                
                $this->_model->addTransactions($postData);
                Session::set('message', 'Transaction added');
                Url::redirect('money/transactions');
            }
            
        }
        
        
        View::rendertemplate('main/header', $data);
        View::render('money/transactionAdd', $data, $error);
        View::rendertemplate('main/footer', $data);
    }
    public function delete($id) {
        $where['id'] = $id;
        $this->_model->deleteTransaction($where);
        Session::set('message', 'Transaction deleted');
        Url::redirect('money/transactions');
    }
}
