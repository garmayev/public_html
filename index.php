<?php
	require ( "class/api.php" );
	require ( "config.php" );
	$api = new API();
	try {
		if ( is_null( $e = update_database() ) ) {
			var_dump($e);
			$api->error($e);
		}
	} catch (Exception $e) {

	} finally {

	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Local site</title>
  </head>
  <body>
    Where Am I?
  </body>
</html>