<?php
	

	/**
	* @category   Scan
	* @package    src.Scan
	* @author     Eric Campos
	* @copyright  2019 - 2021 // Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    4.0.1
	*/

	/*
	* classe estatica de manipulação de arquivos
	* em diretorios gerenciamento
	*/

	class Scan {

		/*
		* metodo que carrega e converte os arquivos .atomo
		* em json objeto para manipulação do sistema
		*/
		public static function configAtom($atom_file){

			if( file_exists($atom_file) ){
				$configAtom = file($atom_file);
				$response = [];
				foreach($configAtom as $config){
					$pieces = explode("=", $config);
					if( isset($pieces[0]) and isset($pieces[1]) ){
						$response[$pieces[0]] = trim($pieces[1]);
					}
				}
				return (object) $response;
			}else{
				return false;
			}
		}

		/*
		* escaneia todas os arquivos e pastas de um diretorio
		*/
		public static function dir($path){

			$response = [];
			if( file_exists($path) ){
				$global = dir($path);
				while( $file = $global->read() ){
					if( !in_array($file, ['.','..','.htaccess']) ){
						$response[] = $path."/".$file;
					}
				}
				return $response;
			}else{
				return [];
			}
		}
	}
?>