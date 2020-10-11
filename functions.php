<?php

use \Ezdev\Model\User;
use \Ezdev\Model\Cart;

function formatPrice($vlprice)
{

	if (!$vlprice > 0) $vlprice = 0;

	return number_format($vlprice, 2, ",", ".");

}

function checkLogin($inadmin = true)
{

	return User::checkLogin($inadmin);

}

function getUserName()
{

	$user = User::getFromSession();

	return $user->getdesperson();

}

function getUserId()
{

	$user = User::getFromSession();

	return $user->getidperson();

}



function formatDate($date)
{

	return date('d/m/Y', strtotime($date));

}

?>