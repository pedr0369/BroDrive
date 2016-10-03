<?php

function geraCodigo($id, $email){
	$letra = substr($email, 0, 1);
	$num = rand(100, 999);
	return $id . $letra . $num;
}