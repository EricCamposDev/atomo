<?php
	

	/**
	* @category   DB
	* @package    src.db.connect
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	*	classe de conexão com o banco de dados
	*/
	
	class Connect extends Module {

		/*
		* conexão em si
		*/
		private $connection;

		/*
		* array de configuração db
		*/
		private $db = [];

		/*
		* herdando informações de DB das
		* classes antecessoras
		*/
		public function __construct(){
			parent::__construct();
		}

		/*
		* realziando conexão
		*/
		protected function get_instance() {

			try{
				$this->connection = new PDO("mysql:host=".$this->dbconfig->dbhost.";dbname=" . $this->dbconfig->dbname, $this->dbconfig->dbuser, $this->dbconfig->dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
				return $this->connection;
			}catch(PDOException $e){
				return false;
			}
		}

		/*
		* verificando status de conexão
		*/
		public function status(){
			if( !$this->get_instance() ){
				echo "connection with db-sql has failed...";
			}
		}

	}
?>