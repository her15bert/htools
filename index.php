<?php
if(file_exists('vendor/autoload.php')){
	require 'vendor/autoload.php';
} else {
	echo "<h1>Please install via composer.json</h1>";
	echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
	echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
	exit;
}

if (!is_readable('app/core/config.php')) {
	die('No config.php found, configure and rename config.example.php to config.php in app/core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}

//initiate config
new \core\config();

//create alias for Router
use \core\router,
    \helpers\url;

//define routes


Router::any('/admin', '\controllers\admin\admin@index');
Router::any('/admin/login', 'controllers\admin\auth@login');
Router::any('/admin/logout', 'controllers\admin\auth@logout');

Router::any('/admin/users', 'controllers\admin\users@index');
Router::any('/admin/users/add', 'controllers\admin\users@add');
Router::any('/admin/users/edit/(:num)', 'controllers\admin\users@edit');
Router::any('/admin/users/delete/(:num)', 'controllers\admin\users@delete');

Router::any('/money', 'controllers\money\money@index');
Router::any('/money/accounts', 'controllers\money\accounts@index');
Router::any('/money/accounts/add', 'controllers\money\accounts@add');
Router::any('/money/accounts/edit/(:num)', 'controllers\money\accounts@edit');
Router::any('/money/accounts/delete/(:num)', 'controllers\money\accounts@delete');

Router::any('/money/transactions', 'controllers\money\transactions@index');
Router::any('/money/transactions/add', 'controllers\money\transactions@add');
Router::any('/money/transactions/edit/(:num)', 'controllers\money\transactions@edit');
Router::any('/money/transactions/delete/(:num)', 'controllers\money\transactions@delete');

Router::any('', '\controllers\main\main@index');


//if no route found
Router::error('\core\error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
