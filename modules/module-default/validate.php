<?php
	
	$module   = new Module();
	$template = new TEngine();

	# validate view
	if( $module->uri(2) == false ){
		$module->goToModule();
	}

	$validate = $module->validate();

	if( $validate['error'] == false ){

		# controle de erros
		$template->error([
			'404' => [
				'title'   => 'Error 404',
				'file' 	  => '404',
				'packages' => ['atlantis-base'],
				'access' => true
			],
			'403' => [
				'title'   => 'Error 403',
				'file' 	  => '403',
				'packages' => ['atlantis-base'],
				'access' => true
			]
		]);

		
		# default routes
		$template->set([
			'welcome' => [
				'title'   => 'Welcome to atomo framework',
				'file' 	  => 'welcome',
				'packages' => ['bootstrap'],
				'access' => true
			]
		]);

	}else{
		# show error core
		$module->coreError("Internal Error" , $validate['message']);
	}


?>