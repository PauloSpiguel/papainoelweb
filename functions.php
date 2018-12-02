<?php

use \NewTech\Model\User;

function checkLogin($inadmin = true){
	
	return User::checkLogin($inadmin);
}

function getUserName(){
	
	$user = User::getFromSession();

	return $user->getdesperson();
}

?>