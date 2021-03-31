<?php
  $template = new TEngine();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title><?=$template->title(); ?></title>
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
		<link rel="icon" href="<?=$template->index(); ?>/public/atlantis/assets/img/icon.ico" type="image/x-icon"/>
		<?php
			$template->css();
		?>
		<?php
			$template->js();
		?>
	</head>
	<body>
		<div class="wrapper">
					
			<?php
				# call module view's
				$template->invokeView(); 
			?>
			
		</div>
		
	</body>
</html>

