<?php
	class User
	{
		public $name;
		public $isLoggedIn;
	}

	$user = new User();
	$user->name = "Nhom8";
	$user->isLoggedIn = true;

	echo serialize($user);
	echo "\n";
?>
