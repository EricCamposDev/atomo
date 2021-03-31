<?php
	

	/**
	* @category   TEngine
	* @package    src.TEngine
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	* classe de manipulação de template
	* baseado nas configurações do modulo
	* a ser carregado
	*/

	class TEngine extends Module {

		/*
		* pacotes de carregamento / packages
		*/
		private $packages;

		/*
		* log de erros
		*/
		private $errors;

		/*
		* carregando e manipulando as indformações
		* de packages.json
		*/
		public function __construct(){

			parent::__construct();

			if( file_exists(parent::path() . "/public/packages.json") ){
				$this->packages = json_decode(file_get_contents(parent::path()."/public/packages.json"),true);
			}else{
				$this->packages = false;
			}
		}

		/*
		* injeta uma configuração na engine para
		* renderização
		*/
		public function set($data){
			if( isset( $data[parent::uri(2)]) ){
				$GLOBALS['template_engine'] = $data[parent::uri(2)];

				# verificando se existe permissão
				if( !$data[parent::uri(2)]["access"] ){
					$GLOBALS['template_engine'] = $this->errors['403'];
				}

			}else{
				# view não encontrada
				$GLOBALS['template_engine'] = $this->errors['404'];
			}
		}

		/*
		* define um erro especifico de carregamento
		*/
		public function error($data = array()){

			$this->errors = $data;
		}

		/*
		* carrega uma view definida pelo validate.php
		* do modulo carregado
		*/
		public function invokeView(){

			if( isset($GLOBALS['template_engine']) ){
				
				$path = $this->md_path . "/views/" . $GLOBALS['template_engine']['file'] . ".php";
				if( file_exists($path) ){
					require $path;
				}else{
					# load 404, view not found
					parent::coreError("Error 404", "File not found...");
				}

			}else{
				parent::coreError("Error 500","Failed to render module...");
			}
		}

		/*
		* carrega componentes externos na aplicaçao
		*/
		public function component($name){

			# invoke theme component
			$pathComponent = parent::path() . "/app/components/" . $name . ".php";
			if( file_exists($pathComponent) ){
				require $pathComponent;
			}else{
				parent::coreError("Failed to include", "Component " .$name. " not found...");
			}
		}

		/*
		* carrega o titulo da aplicação em title
		*/
		public function title(){
			if( isset($GLOBALS['template_engine']) ){
				return $GLOBALS['template_engine']['title'];
			}else{
				return 'title view not found...';
			}
		}

		/*
		* carrega todos os css's dos pacotes chamados em
		* validate.php
		*/
		public function css(){
			if( isset($GLOBALS['template_engine']['packages']) ){
				$output = "\n";
				foreach($GLOBALS['template_engine']['packages'] as $pack){
					foreach($this->packages[$pack]['css'] as $css){

						$remote = substr($css,0,4);
						$css = ($remote != "http") ? parent::index() . "/" . $css : $css;

						$output .= '<link rel="stylesheet" type="text/css" href="'.$css.'" />'."\n";
					}
				}

				echo $output;
			}else{
				return false;
			}
		}

		/*
		* carrega todos os javascripts dos pacotes chamados
		* em validate.php
		*/
		public function js(){

			if( isset($GLOBALS['template_engine']['packages']) ){
				$output = "\n";
				foreach($GLOBALS['template_engine']['packages'] as $pack){
					foreach($this->packages[$pack]['js'] as $js){

						$remote = substr($js,0,4);
						$js = ($remote != "http") ? parent::index() . "/" . $js : $js;

						$output .= '<script src="'.$js.'"></script>'."\n";
					}
				}

				echo $output;
			}else{
				return false;
			}
		}
	}
?>