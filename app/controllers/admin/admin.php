<?php namespace controllers\admin;
use \helpers\Session,
        \helpers\Url,
        \core\View;

class Admin extends \core\Controller
{
    private $_model;
    private $_model_users;
    public function __construct() {
        parent::__construct();
        
        if (Session::get('loggedin')==false) {
            Url::redirect('admin\login');
        }
        $this->_model = new \models\admin\admin();
        $this->_model_users = new \models\admin\users();
    }
    public function index() {
        $data['title'] = 'Admin';
        $data['user'] = $this->_model->getUser(Session::get('memberId'));
        $data['users'] = $this->_model_users->getUsers();
        View::rendertemplate('admin/header', $data);
        View::render('admin/admin', $data);
        //View::render('admin/users', $data);
        View::rendertemplate('admin/footer', $data);
    }
}
