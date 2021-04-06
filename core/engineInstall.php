<?php

	if( isset($_GET['request-ajax']) and !empty($_GET['request-ajax']) ){

		switch($_GET['request-ajax']){
			case "base-apps":

				# load base application's
				$path = dir(dirname(__DIR__) . "/app");
				$base_apps = [];
				while($app = $path->read() ){
					if( !in_array($app, [".","..",".htaccess"]) ){
						$app = str_replace(".php","",$app);
						array_push($base_apps, $app);
					}
				}

				# return with validations
				echo (!empty($base_apps)) ? json_encode(['error'=>false,'apps'=>$base_apps]) : json_encode(['error'=>true]);
				
			break;
			case "new-app":
				if( isset($_POST["name"]) and !empty($_POST["name"]) and $_POST["name"] != "app-default" ){
					
					$defaultApp = file_get_contents(dirname(__DIR__)."/app/app-default.php");

					# verificando se ja existe algum app com o msm nome
					$pathNewApp = dirname(__DIR__)."/app/".$_POST["name"].".php";
					if( !file_exists($pathNewApp) ){


						$handle = fopen($pathNewApp, "a+");
						fwrite($handle, $defaultApp);
						fclose($handle);

						if(file_exists($pathNewApp) and is_file($pathNewApp)){
							echo true;
						}else{
							echo false;
						}

					}else{
						echo false;
					}
					
				}else{
					echo false;
				}
			break;

			case "delete-app":
				if( isset($_POST["name"]) and !empty($_POST["name"]) and $_POST["name"] != "app-default" ){
					# delete app
					$pathApp = dirname(__DIR__)."/app/".$_POST["name"].".php";
					# delete...
					unlink($pathApp);
					# check if exist...
					if( file_exists($pathApp) and is_file($pathApp) ){
						echo false;
					}else{
						echo true;
					}
				}else{
					echo false;
				}
			break;
		}

	}

?>