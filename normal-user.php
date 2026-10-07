<?php
	include 'classes.php';
	$a = new DangerousClass();
	file_put_contents('serial_nhom8',serialize($a));
?>
