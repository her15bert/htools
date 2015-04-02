<?php namespace controllers\money;
use \core\View,
        \helpers\Session,
        \helpers\Url;;

class Accounts extends \core\Controller {
    private $_model;
    public function __construct() {
        parent::__construct();
        $this->_model = new \models\money\accounts();
    }
    public function index() {
        $data['title'] = 'Accounts';
        $data['accounts'] = $this->_model->getAccounts();
        
        View::rendertemplate('main/header', $data);
        View::render('money/accounts', $data);
        View::rendertemplate('main/footer', $data);
    }
    public function add() {
        $error;
        
        $data['title'] = 'Add Account';
        $data['accountTypes'] = $this->_model->getAccountTypes();
        
        if (isset($_POST['submit'])) {
            $accountName = $_POST['accountName'];
            $description = $_POST['description'];
            $notes = $_POST['notes'];
            $accountType = $_POST['accountType'];
            $parentAccount = $_POST['parentAccount'];
            
            // validation
            if ($accountName=='') {
                $error[] = 'Account name is required';
            }
            if ($parentAccount=='') {
                $error[] = 'Parent acount is required';
            }
            
            // if no error carry on
            if (!$error) {
                $new['name'] = $accountName;
                $new['description'] = $description;
                $new['notes'] = $notes;
                $new['type'] = $accountType;
                $new['parentAccount'] = $parentAccount;
                
                $this->_model->addAccount($new);
                Session::set('message', 'Account added');
                Url::redirect('money/accounts');
            }
            
        }
        
        View::rendertemplate('main/header', $data);
        View::render('money/accountAdd', $data, $error);
        View::rendertemplate('main/footer', $data);
    }
    
    public function edit($id) {
        $error;
        
        $data['title'] = 'Edit Account';
        $data['account'] = $this->_model->getAccount($id);
        $data['accountTypes'] = $this->_model->getAccountTypes();
        
        if (isset($_POST['submit'])) {
            $accountName = $_POST['accountName'];
            $description = $_POST['description'];
            $notes = $_POST['notes'];
            $accountType = $_POST['accountType'];
            $parentAccount = $_POST['parentAccount'];
            
            // validation
            if ($accountName=='') {
                $error[] = 'Account name is required';
            }
            if ($parentAccount=='') {
                $error[] = 'Parent acount is required';
            }
            
            // if no error carry on
            if (!$error) {
                $postData['name'] = $accountName;
                $postData['description'] = $description;
                $postData['notes'] = $notes;
                $postData['type'] = $accountType;
                $postData['parentAccount'] = $parentAccount;
                
                $where['id'] = $id;
                $this->_model->updateAccount($postData, $where);
                Session::set('message', 'Account edited');
                Url::redirect('money/accounts');
            }
            
        }
        
        View::rendertemplate('main/header', $data);
        View::render('money/accountEdit', $data, $error);
        View::rendertemplate('main/footer', $data);
    }
    public function delete($id) {
        $where['id'] = $id;
        $this->_model->deleteAccount($where);
        Session::set('message', 'Account deleted');
        Url::redirect('money/accounts');
    }
}