<?php
	require( "config.php" );
	try {
		if ( !is_null( $e = update_database() ) ) {
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