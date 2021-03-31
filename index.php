<?php
	
	/**
	* @category   Root
	* @package    ---
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	/*
	* autoload da aplicação
	*/
	require "autoload.php";
	
	/*
	* iniciando mecanismo de
	* controle de modulos
	*/
	$module = new Module();
	
	/*
	* renderizando modulos já configurados
	*/
	$module->render();
?>