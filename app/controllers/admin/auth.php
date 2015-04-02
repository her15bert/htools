<?php namespace controllers\admin;

use \core\view,
    \helpers\Password,
    \helpers\Session,
    \helpers\Url;

class Auth extends \core\Controller {
    private $_model;
    
    public function __construct() {
        parent::__construct();
        
        
        $this->_model = new \models\admin\auth();
    }
    public function login() {
        if (Session::get('loggedin')) {
            Url::redirect('admin');
        }
        $error;
        $data['title'] = 'Login';
        
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // validation
            if ($username=='') {
                $error[] = 'Username is required';
            }
            if ($password=='') {
                $error[] = 'Password is required';
            }
            if (!$error && Password::verify($password, $this->_model->gethash($username))==false) {
                $error[] = "Wrong username or password";
            }
            
            // if no error carry on
            if (!$error) {
                Session::set('loggedin', true);
                Session::set('memberId', $this->_model->getMemberId($username));
                
                
                Url::redirect('admin');
            }
            
        }
        
        View::rendertemplate('main/header', $data);
        View::render('admin/login', $data, $error);
        View::rendertemplate('main/footer', $data);
    }
    public function logout() {
        Session::destroy();
        Url::redirect();
    }
}