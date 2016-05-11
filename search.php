<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'db_name');


if (isset($_GET['term_to_look_for'])){
	$return_arr = array();

	try {
		//remove port number if not needed - 3306
	    $conn = new PDO("mysql:host=".DB_SERVER.";port=3306;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare('SELECT term_name FROM table WHERE term_name LIKE :term_to_look_for');
	    $stmt->execute(array('term_to_look_for' => '%'.$_GET['term_to_look_for'].'%'));
	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['term_name'];
	    }
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}
    echo json_encode($return_arr);
}
?>

<!-- index.php file -> just an example and should be modified to what is needed
	<div class="container-fluid">
		<form action='' method='post'>
			<div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span></span>
				<input type='text' name='' value='' class='auto' placeholder="Search...">
			</div>
		</form>
	</div>
-->
