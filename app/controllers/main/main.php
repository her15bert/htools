<?php namespace controllers\main;
use \core\View;

class Main extends \core\Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['title'] = 'Welcome';
        View::rendertemplate('main/header', $data);
        View::render('main/main', $data);
        View::rendertemplate('main/footer', $data);
    }
}