<?php
	
	/**
	* @category   Core
	* @package    src.Core
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	*	classe raiz do atomo, responsavel pela extração das informações
	*	nos arquivos de configuração .atomo do sistema.
	*	arquivos: config.atomo // db-config.atomo
	*/


	class Core {

		/*
		* configurações do sistema
		* base de uso na aplicação
		*/
		protected $config;

		/*
		* controle de rotas [ /var/www/ e http:// ]
		*/
		protected $routes;

		/*
		* condigurações de conexão de banco
		*/
		protected $dbconfig;


		/*
		* carregando todas as configurações e rotas
		* para as classes filhas consumirem 
		*/
		public function __construct(){
			# loading app define
			$this->config = Scan::configAtom(dirname(dirname(__DIR__)) . "/config/config.atomo");

			if( $this->config ){

				$listen = ( trim($this->config->listen) != "" ) ? ":" . $this->config->listen : "";

				# path route
				$this->routes['path'] = $_SERVER['DOCUMENT_ROOT'] . $this->config->folder;

				if( file_exists($this->routes['path']) and is_dir($this->routes['path']) ){
					$this->routes['index'] = $this->config->protocol . "://" . $_SERVER['SERVER_NAME'] . $listen . $this->config->folder;
					# make object routes
					$this->routes = (object) $this->routes;
					# make engine db
					$this->dbconfig = $this->engineDB();
				}else{

					# determinando false nas rotas
					$this->routes = (object) ['path' => false, 'index' => false];

					# fail core
					$this->coreError("Falha ao construir base da aplicação", "O valor '".$this->config->folder."' não corresponde ao diretório da aplicação..., tente novamente modificando o valor de 'folder' em /config/config.atomo");
					
				}

			}else{
				$this->config = false;
				$this->coreError("Internal error", "Core is fail...");
			}
		}

		/*
		* configurando engine de banco sql para uso no sistema 
		* tendo em visto que existe o suporte do atomo
		*/
		protected function engineDB()
		{
			if( $this->config ){

				switch($this->config->engine_db){
					case "pdo-mysql":
						$this->dbconfig = Scan::configAtom(dirname(dirname(__DIR__)) . "/core/src/db/mysql/db-config.atomo");
						# include pdo files
						include_once $this->routes->path . "/core/src/db/mysql/Connect.php";
						include_once $this->routes->path . "/core/src/db/mysql/DB.php";
					break;
				}

				return $this->dbconfig;
			}
		}

		/*
		* reportação de erros de core
		*/
		public function coreError($title, $content)
		{
			if( $this->config and $this->config->debug == 1 ){
				echo '
					<fieldset style="background: #444;">
						<legend style="padding: 20px; background: darkred; color: #fff;">
							<b>'.$title.'</b>
						</legend>
						<h2 style="font-weight: bold; padding: 10px;color: #ddd;">'.$content.'</h2>
						<p style="color: #ccc; padding: 10px;">
							<img src="https://images.vexels.com/media/users/3/153024/isolated/preview/b954f58d35c3eb88de83550322d3ff53-atom-school-illustration-by-vexels.png" height="40" width="auto" />
							<b>Atomo Framework</b> - report at: '.date('d/m/Y').' in '.date('H:i:s') .'
						</p>
					</fieldset>
				';
			}
		}

	}
?>