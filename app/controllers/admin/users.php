<?php namespace controllers\admin;

use \core\View,
        \helpers\Password,
        \helpers\Session,
        \helpers\Url;

class Users extends \core\Controller {
    private $_model;
    public function __construct() {
        parent::__construct();
        if (Session::get('loggedin')==false) {
            Url::redirect('admin\login');
        }
        $this->_model = new \models\admin\users();
    }
    public function index() {
        $data['title'] = 'Users';
        $data['users'] = $this->_model->getUsers();
        View::rendertemplate('admin/header', $data);
        View::render('admin/users', $data, $error);
        View::rendertemplate('admin/footer', $data);
    }
    public function add() {
        $error;
        $data['title'] = 'Add User';
        
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            // validation
            if ($username=='') {
                $error[] = 'Username is required';
            }
            if ($password=='') {
                $error[] = 'Password is required';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Email is not valid';
            }
            // if no error carry on
            if (!$error) {
                $postData['username'] = $username;
                $postData['password'] = Password::make($password);
                $postData['email'] = $email;
                
                $this->_model->addUser($postData);
                Session::set('message', 'User Edited');
                Url::redirect('admin/users');
            }
            
        }
        
        View::rendertemplate('admin/header', $data);
        View::render('admin/userAdd', $data, $error);
        View::rendertemplate('admin/footer', $data);
    }
    
    public function edit($id) {
        $error;
        $data['title'] = 'Edit User';
        $data['user'] = $this->_model->getUser($id);
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            // validation
            if ($username=='') {
                $error[] = 'Username is required';
            }
            if ($password=='') {
                $error[] = 'Password is required';
            }
            if ($email=='') {
                $error[] = 'Email is required';
            }
            
            // if no error carry on
            if (!$error) {
                $postData['username'] = $username;
                $postData['password'] = Password::make($password);
                $postData['email'] = $email;
                
                $where['id'] = $id;
                $this->_model->updateUser($postData, $where);
                Session::set('message', 'User Edited');
                Url::redirect('admin/users');
            }
            
        }
        
        View::rendertemplate('admin/header', $data);
        View::render('admin/userEdit', $data, $error);
        View::rendertemplate('admin/footer', $data);
    }
    public function delete($id) {
        $where['id'] = $id;
        $this->_model->deleteUser($where);
        Session::set('message', 'User deleted');
        Url::redirect('admin/users');
    }
}

