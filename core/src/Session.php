<?php
	

	/**
	* @category   Session
	* @package    src.Session
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	* classe estatica de controle de sessões
	* como padrão ela possui a de usuario com
	* seu nome predefinido em config.atomo
	*/

	class Session extends Core {

		/*
		* dados do servidor de acesso
		*/
		private static $server;

		/*
		* nome da sessão
		*/
		private static $name;

		/*
		* caminho dos logs de sessão
		*/
		private static $path;

		/*
		* carregando path de Core
		*/
		public function __construct(){

			parent::__construct();

			$core = new Core();

			if( $core->login_access_status == 1 ){
				self::$name = $core->login_access_name;
			}

			self::$path = $this->routes['path'];
		}

		/*
		* metodo de criação de sessão
		*/
		public static function new($data = array(), $name = null ){

			@session_start();
			$name = ($name == null) ? self::$name : $name;
			$data['server'] = $_SERVER;
			$_SESSION[sha1($name)] = $data;
			return [
				'name' => sha1($name)
			];
		}


		/*
		* checa se uma sessão realmente existe
		*/
		public static function auth($name = null){

			@session_start();
			$name = ($name == null) ? self::$name : $name;
			return isset($_SESSION[sha1($name)]);

		}

		/*
		* obtem dados de uma sessão
		*/
		public static function get($name = null){

			@session_start();
			$name = ($name == null) ? self::$name : $name;
			return (Session::auth($name)) ? $_SESSION[sha1($name)] : false;

		}

		/*
		* modifica informações de uma sessão
		*/
		public static function edit($data = [], $name = null){
			@session_start();
			$name = ($name == null) ? self::$name : $name;
			if( Session::auth($name) ){

				$log = Session::get($name);
				foreach($data as $k => $v){
					$log[$k] = $v;
				}

				$_SESSION[sha1($name)] = $log;

				return true;
			}else{
				return false;
			}
		}

		/*
		* elimina uma sessão / finaliza
		*/
		public static function done($name = null){

			@session_start();
			if($name == null){
				session_destroy();
			}else{
				unset($_SESSION[sha1($name)]);
			}

		}

	}