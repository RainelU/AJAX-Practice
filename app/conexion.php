<?php
	define("LOCALHOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("NAME_DB", "test");

	$mysqli = new mysqli(LOCALHOST, USER, PASS, NAME_DB);

		if ($mysqli -> connect_error) {
			die('Sorry, ERROR 500 D:' . mysqli_connect_error());
		}

		$mysqli -> set_charset("utf8");
?>