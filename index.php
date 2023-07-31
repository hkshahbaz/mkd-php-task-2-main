<?php

require_once('vendor/autoload.php');
require 'Model_builder.php';
require 'Controller_builder.php';

use \RedBeanPHP\R;

$ret = R::setup('mysql:host=localhost;dbname=php_task_2', 'root', '');

Flight::register('Model_builder', 'Model_builder');

// Setting base url
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$baseurl = "http://" . $host . $path . "/";

Flight::set('base_url', $baseurl);

Flight::route('/', function(){
	// Creating Views
	$model = Flight::Model_builder()->build();

	// Loading All models view
	Flight::render('index', array('models' => $model, 'jumbo_title' => 'All Models'), 'body_content');
	Flight::render('layouts/layout', array('title' => 'All Models'));
});

Flight::route('/model/@id', function($id){

	Flight::render('model_'.$id, array('jumbo_title' => 'Model '.$id), 'body_content');
	Flight::render('layouts/layout', array('title' => 'Model '.$id));
});

Flight::route('POST /model/store/@id', function($id) {
  
	//Validate the fields
	$data = Flight::request()->data;
	$input_prefix = explode(',', $data->input_prefix);

	foreach ($data as $name => $value) {

		if($data->$name == " "){

			Flight::render('model_'.$id, array('jumbo_title' => 'Model '.$id, 'error' => 'Some fields are missing!'), 'body_content');
			Flight::render('layouts/layout', array('title' => 'Model '.$id));
			return false;
		}
	}


	//DB code to insert into db
	$model = R::dispense( 'models' );
	$model->data = json_encode($data);
	$id = R::store( $model );

	Flight::redirect('/model_added');

});

Flight::route('/model_added', function(){

	Flight::render('model_added', array('jumbo_title' => 'Model Added'), 'body_content');
	Flight::render('layouts/layout', array('title' => 'Model Added'));
});

Flight::start();
