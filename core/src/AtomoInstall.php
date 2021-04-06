<?php
	

	class AtomoInstall
	{
		private $config;
		private $dbsql;
		private $pathDBsql;
		private $pathConfig;
		private $pathModules;

		public function __construct()
		{
			$this->pathConfig = dirname(dirname(__DIR__)) . "/config/config.atomo";
			$this->pathModules = dirname(dirname(__DIR__)) . "/modules/";
			$this->pathDBsql = dirname(dirname(__DIR__)) . "/core/src/db/mysql/db-config.atomo";
		}

		public function config()
		{
			# obtendo dados de configuração	
			$this->config = Scan::configAtom($this->pathConfig);
			# removendo barra de folder
			$this->config->folder = str_replace("/", "", $this->config->folder);

			return $this->config;
		}

		public function dbConfig()
		{
			# obtendo configuração de banco
			$this->dbsql = Scan::configAtom($this->pathDBsql);

			return $this->dbsql;
		}

		public function modules(){

			$response = [];
			$modules = Scan::dir($this->pathModules);
			if( !empty($modules) ){
				foreach($modules as $pathModule){
					$md_config = Scan::configAtom($pathModule . "/config.module");
					if( isset($md_config->name) ){
						$md_config_array = (array) $md_config;
						array_unshift($response, $md_config_array);
					}
				}
			}

			return (!empty($response)) ? $response : false;
		}

	}
?>