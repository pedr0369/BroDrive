<?php

function autoriza(){
    	$ci = get_instance();
	$usuario = $ci->session->userdata("usuario");
        if(!$usuario){
            redirect('/');
	}else{
	    return $usuario;
	}
}

function logado(){
	$ci = get_instance();
	$usuario = $ci->session->userdata("usuario");
        if($usuario){
            redirect('Painel/index');
	}
}

function autoriza_admin(){
    $ci = get_instance();
	$usuario = $ci->session->userdata("usuario");
        if($usuario['admin'] == 0){
            redirect('/');
	}
    return $ci->session->userdata("usuario");
}