var audio = new Audio();
audio.src = 'audio/audio.ogg';
audio.autoplay = true;
audio.loop = true;
cont = 0;

function efeito(){
    var audio = new Audio();
	audio.src = 'audio/efeito.wav';
	audio.autoplay = true;
}

function musicaFundo(){
    
	var opc = document.getElementById('opc');

    if(cont % 2 == 1){
    	opc.style.background = 'white';
    	audio.muted = false;
    	cont++;
    }else{
    	opc.style.background = '#333';
    	audio.muted = true;
    	cont++;
    }
};