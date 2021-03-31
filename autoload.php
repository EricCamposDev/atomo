<?php
	
	# core files
	$core = ['Ini','Scan','Core','Atom','Module','AtomoInstall', 'TEngine','Session'];

	# import all of core
	foreach($core as $file){
		require_once "core/src/" . $file . ".php";
	}

	$app = new Atom();
	$global_files = Scan::dir($app->path() . "/global/src");
	if( !empty($global_files) ){
		foreach($global_files as $file){
			$phpExtension = strpos($file, ".php");
			if( $phpExtension ){
				require_once $file;
			}
		}
	}

	# se houver vendor/composer, incluir
	if( file_exists($app->path() . "/vendor/autoload.php") ){
		require $app->path() . "/vendor/autoload.php";
	}
	
?>