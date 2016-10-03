function formulario(){
        
    var email = cadastro.email.value;
    var senha = cadastro.senha.value;
    var r_senha = cadastro.r_senha.value;
    var avatar = parseInt(cadastro.avatar.value);
	
    if(senha != r_senha){
        alert('As senhas não são iguais');
        return false;   
    }

    if(senha.length < 8 || !isNaN(senha)){
        alert('Senha muito curta ou contém somente dígitos, mínimo de 8 caracteres e não pode haver somente números');
        return false; 
    }
        
}
