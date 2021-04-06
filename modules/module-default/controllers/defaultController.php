<?php

	/**
	* @category   Controller
	* @package    controller.defaultController
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	* arquivo controller padrão do modulo
	* obs: instanciando a classe padrão do modulo
	*/
	
	# autoload application
	require dirname(dirname(dirname(__DIR__))) . "/autoload.php";

	# example...
	$app = new Atom();
	# example...
	$app->loadModel("module-default");

	# example...
	$default = new DefaultModule();

	/*
		write your code here...
	*/