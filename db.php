<?php

$mysqli = new mysqli('localhost', 'root', '', 'wa1_en');
if ($mysqli->connect_errno) {
	echo '<p class="error">Could not connect!</p>';
} else {
	$mysqli->query("SET CHARACTER SET 'utf8'");
}

?>