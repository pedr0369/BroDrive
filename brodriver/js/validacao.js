function formulario(){
        
    var nome = cadastro.nome.value;
    var email = cadastro.email.value;
    var senha = cadastro.senha.value;
    var r_senha = cadastro.r_senha.value;
    var cel = cadastro.cel.value;

    var numNome = nome.replace(/[^0-9]/g,'');
    var nomen = parseInt(numNome);

    if(cel.length < 10 || cel.length > 11 || isNaN(cel)){
        alert('Coloque seu celular corretamente com ddd e numero sem espaços');
        return false;
    }

    if(senha != r_senha){
        alert('As senhas não são iguais');
        return false;   
    }

    if(senha.length < 8 || !isNaN(senha)){
        alert('Senha muito curta ou contém somente dígitos, mínimo de 8 caracteres e não pode haver somente números');
        return false; 
    }

    if(!isNaN(nomen)){
        alert('Não é permitido número no nome');
        return false;
    }
        
}

function editDados(){
    
    var senhaAtual = alter.nome.value;
    var cel = alter.cel.value;

    var numNome = nome.replace(/[^0-9]/g,'');
    var nomen = parseInt(numNome);
    
    if(cel.length != 0){
        if(cel.length < 10 || cel.length > 11 || isNaN(cel)){
            alert('Coloque seu celular corretamente com ddd e numero sem espaços');
            return false;
        }
    }

    if(!isNaN(nomen)){
        alert('Não é permitido número no nome');
        return false;
    }       
}

function editarSenha(){

    	var newSenha = alter.senha.value;
    	var repNewSenha = alter.rep_new_senha.value;
    	
    	if(newSenha != repNewSenha ){
        	alert('As senhas não são iguais');
        	return false;   
    	}

    	if(newSenha.length < 8 || !isNaN(newSenha )){
        	alert('Senha muito curta ou contém somente dígitos, mínimo de 8 caracteres e não pode haver somente números');
        	return false; 
    	}
}