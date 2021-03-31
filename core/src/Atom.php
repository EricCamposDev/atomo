<?php
	
	/**
	* @category   Atom
	* @package    src.Atom
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	* metodos/funcões nativas do atomo
	* para uso hierarquico ou instanciado
	* - classe pai de instancia
	*/

	class Atom extends Core {

		/*
		* carregando informações do core
		* que foram processadas
		*/
		public function __construct(){
			parent::__construct();
		}

		/*
		* controle de uri para uso nas urls amigaveis
		* extração das uri's em $_GET['route']
		*/
		public function uri($key = null){
			# manager uri
			if( $key == null ){
				if( isset($_GET['route']) ){
					return explode("/", $_GET['route']);
				}else{
					return false;
				}
			}else{
				if( isset($_GET['route']) ){
					$pieces = explode("/", @$_GET['route']);
					if( $pieces ){
						if( isset($pieces[$key-1]) ){
							return $pieces[$key - 1];
						}else{
							return false;
						}
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
		}

		/*
		* caminho raiz da aplicação no servidor
		* retorna as pastas do servidor até a raiz
		* da aplicação. ex: /var/www/app
		*/
		public function path(){
			# get the root path /var/www/html...
			return $this->routes->path;
		}

		/*
		* caminho via http da aplicação.
		* retorna o link de acesso protocolado
		* ex: http://app.com ou http://localhost
		*/
		public function index(){
			# get the index path http://server.com
			return $this->routes->index;
		}

		/*
		* retorna o caminho modular para carregar uma view
		* ex: $segment = entrar, $module = login
		* retorno: http://app.com/login/entrar
		*/
		public function view($segment, $module = ""){
			# make url do view module
			$module = ($module == "" or $module == null) ? $this->uri(1) : $module;
			return $this->index() . "/" . $module . "/" . $segment;
		}

		/*
		* retorna o caminho modular para acessar uma controller
		* ex: $file = autentica, $module = login
		* retorno: http://app.com/modules/login/controllers/autentica.php
		*/
		public function controller($file, $module = null){
			# get url to controller file
			$module = ($module == "" or $module == null) ? $this->uri(1) : $module;
			if( file_exists($this->path() . "/modules/" . $module . "/controllers/" . $file .".php") ){
				return $this->index() . "/modules/" . $module . "/controllers/" . $file .".php";
			}else{
				return '#';
				# controller file not found
			}
		}
	}
?>