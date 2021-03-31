<?php
	
	/**
	* @category   Module
	* @package    src.Module
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	* controle, carregamento e ações dos modulos.
	* além de validação, integridade, configuração e 
	* transição.
	*/

	class Module extends Atom {
		
		/*
		* arquivo application no qual o modulo
		* está sendo carregado
		*/
		protected $md_app;

		/*
		* nome do modulo
		*/
		protected $md_name;

		/*
		* view que o modulo vai/esta
		* carregando
		*/
		protected $md_view;

		/*
		* caminho do modulo
		* ate o servidor
		*/
		protected $md_path;

		/*
		* configurações do modulo
		*/
		protected $md_config;

		/*
		* arquivo padrão de erro 404
		* ao se carregar quando a view
		* não for encontrada no modulo
		*/
		protected $md_404;

		/*
		* carregando e validando o modulo que está sendo chamado na url(uri)
		*/
		public function __construct(){

			parent::__construct();
		
			# valor default do modulo
			$this->md_name = (parent::uri(1) != false) ? parent::uri(1) : $this->config->default_module;

			# validação secundária interna de modulo
			$validateModule = $this->validate();
			if( $validateModule['error'] == false ){

				# validação terciaria, sessão
				$this->md_path = parent::path() . "/modules/" . $this->md_name;
				$this->md_config = Scan::configAtom( $this->md_path . "/config.module" );

				# valor default da view
				$this->md_view = (parent::uri(2) != false) ? parent::uri(2) : $this->md_config->default_view;

				if( $this->config->login_access_status == 1 and $this->md_config->use_session == 1 ){
					if( !Session::auth() ){
						$this->md_name = $this->config->login_access_module;
						$this->md_view = $this->config->login_access_view;
					}
				}

			}else{
				# erro de core
				if( $this->config->debug  == 1 ){
					Core::coreError("Module Error" , $validateModule['message']);
				}
			}
		}

		/*
		* renderizando resultado da validação do
		* modulo
		*/
		public function render(){

			# verificando status de aplicação
			if( $this->config->install == 1 ){

				include "core/install.php";

			}else{
				# aplicação já instalada e configurada

				# validate module
				$validate = $this->validate();

				if( $validate['error'] == false ){

					# redirect do modulo e view carregados
					if( parent::uri(2) == false ){
						$this->redirect();
					}

					# load models of module
					$this->loadModels();
					
					###### start application #########
					# init validate module
					require $this->md_path . "/validate.php";
					# init helpers module
					require $this->md_path . "/helpers.php";
					# init base application
					require parent::path() . "/app/" . $this->md_config->app . ".php";

				}else{

					# redirect do modulo e view carregados
					if( parent::uri(2) == false ){
						$this->redirect();
					}

					if( $this->config->debug  == 1 ){
						parent::coreError("Error Module", $validate['message']);
					}
				}
			}		
		}

		/*
		* metodo helper que organiza valores do
		* array para carregar os modulos em ordem
		* crescente na pasta
		*/
		public function sortClass($foo){

			$return = [];
			$saporra = [];
		    foreach($foo as $k=>$a){
		        $saporra[$k] = strlen($a);
		    }

		    asort($saporra);
		    
		    foreach($saporra as $chaveDesseKrl => $aPorraDoArquivo){
		        $return[] = $foo[$chaveDesseKrl];
		    }

		    return $return;   
		}

		/*
		* carregando classes do diretorio models/ do modulo
		* selecionado no parametro
		*/
		public function loadModels($modules = null){
			# carregamento padrão de core
			if( $modules == null ){
				$modules = [$this->md_name];
			}

			# verificando se um array de modulos foi carregado
			if( is_array($modules) and !empty($modules) ){
				foreach($modules as $module){
					# array de models
					$models = [];
					# atribundo modulo ao atributo
					$module_name = ($module == null or $module == "") ? $this->md_name : $module;
					# escaneando diretorio /models de cada modulo e obtendo os arquivos models
					$models = Scan::dir($this->path() . "/modules/" . $module_name . "/models");
					# ordenando arquivos em ordem alfabetica
					$models = $this->sortClass($models);
					# verificando existencia de arquivos
					if( !empty($models) ){
						foreach($models as $md){
							require_once $md;
						}
					}
				}
			}else{
				Core::coreError("Falha de carregamento","O carregamento de models deve ser como array, corrija isto e prossiga");
			}
		}

		/*
		* controle de autenticação nos modulos, carregamento
		* do modulo em caso de controle de sessão
		*/
		protected function authModule(){
			if( $this->config->login_access_status  == 1 and $this->md_config->use_session == 1 ){

				if( !Session::auth() ){

					$this->md_name = $this->config->login_access_module;
					$this->md_path = parent::path() . "/modules/" . $this->md_name;
					$this->md_config = Scan::configAtom( $this->md_path . "/config.module" );


					if( $this->md_config->use_session == 1 ){
						if( $this->config->debug  == 1 ){
							Core::coreError("Erro de modularização","Você não pode definir um modulo de autenticação como usuário de sessão, no seu arquivo de configuração do modulo em /modules/".$this->md_name."/config.module altere o campo use_session para 0. ex: use_session=0");
						}
					}else{
						header("Location: " . parent::index() . "/" . $this->config->login_access_module . "/" . $this->config->login_access_view);
					}

				}else{

					$this->md_name = (parent::uri(1) != false) ? parent::uri(1) : $this->config->default_module;
					$this->md_path = parent::path() . "/modules/" . $this->md_name;
					$this->md_config = Scan::configAtom( $this->md_path . "/config.module" );

					header("Location: " . parent::index() . "/" . $this->md_name . "/" . $this->md_view);
				}

			}
		}

		/*
		* obtendo modulos publicos do sistema
		*/
		public function getModules(){

			$response= [];
			$modules = Scan::dir(parent::path() . "/modules");
			if( !empty($modules) ){
				foreach($modules as $pathModule){
					$md_config = Scan::configAtom($pathModule . "/config.module");
					$response[] = $md_config->name;
				}
			}

			return $response;
		}
		
		/*
		* processo de validação do modulo, se baseando em diversos
		* fatores de extrutura
		*/
		protected function validate(){

			$pathModule = parent::path()."/modules/".$this->md_name;
			# check if exist base
			if( file_exists($pathModule) ){
				if( file_exists($pathModule."/validate.php") ){
					if( file_exists($pathModule."/config.module") ){
						return [
							'error' => false
						];
					}else{
						# config file not found
						return [
							'error' => true,
							'message' => 'config.module not found...'
						];
					}
				}else{
					# validate.php not found
					return [
						'error' => true,
						'message' => 'validate.php not found...'
					];
				}
			}else{

				# module not found
				return [
					'error' => true,
					'message' => 'module ' . $this->md_name . ' not found...'
				];
			}
		}

		/*
		* redirecionamento modular [bugado!]
		*/
		public function redirect($module = null, $view = null){
			$this->md_name = ($module != null) ? $module : $this->md_name;
			$this->md_view = ($view != null) ? $view : $this->md_view;
			$urlTo = parent::index() . "/" . $this->md_name . "/" . $this->md_view;
			$urlFrom = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			if( $urlFrom != $urlTo ){
				header("Location: " . $urlTo);
			}
		}
	}
?>