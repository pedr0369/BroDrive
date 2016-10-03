<?php

function geraCodigo(){
    $ci = get_instance();
	$usuario = $ci->session->userdata("usuario");

	return $usuario['id'] . rand(100, 999);
	
}