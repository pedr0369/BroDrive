function ia(a){
    
    canvas = document.getElementById('canvas');
    context = canvas.getContext('2d'); 
    
    canvas.height = window.innerHeight;
    canvas.width = window.innerWidth;
    
    if(canvas.height > canvas.width){
       canvas.height = canvas.width;
    }
   
    window.onresize = redimensiona;
    
    var menu = document.getElementById('menu');
    
    canvas.style.display = 'block';
    menu.style.display = 'none';
    
    var teclas = {};
    
    var pontos = {
    	  points: 5,
        mod : 0
    }
    
    var item = {
        x: (canvas.width / 2) - 1,
        y: 0,
        altura: canvas.height / 8,
        largura: 2,
        speed: 2,
    }
    
    var bola = {
        x: (canvas.width / 2) - 12,
        y: (canvas.height / 2) - 12,
        grau: canvas.height / 75,
        dirx: -1,
        diry: 1,
        speed: 3,
        mod: 0
    };
            
    var esquerda = { 
        x: 10,
        y: (canvas.height / 2) - 60,
        altura: canvas.height / 6,
        largura: canvas.width * 0.013,
        score: 0,
        speed: 5
    };
            
    var direita = { 
        x: canvas.width - (canvas.width * 0.013) - 10,
        y: (canvas.height / 2) - 60,
        altura: canvas.height / 6,
        largura: canvas.width * 0.013,
        score: 0,
        speed: 5,
    };
            
    document.addEventListener("keydown", function(e){
        teclas[e.keyCode] = true;
    }, false);
            
    document.addEventListener('keyup', function(e){
        delete teclas[e.keyCode]; 
    }, false);

    function moveBloco(){
    
    	document.addEventListener('touchstart', function(e){
        	if(e.changedTouches[0].pageY <= esquerda.y && e.changedTouches[0].pageY > 10) {
        		esquerda.y -= (esquerda.speed + pontos.mod);
        	}
	        else if(e.changedTouches[0].pageY >= esquerda.y + esquerda.altura && esquerda.y + esquerda.altura < canvas.height -10){
	        	esquerda.y += (esquerda.speed + pontos.mod);
	        }
    	}, false);
    
    	document.addEventListener('touchend', function(e){
        	esquerda.y += 0;
    	}, false);
    
        if(87 in teclas && esquerda.y > 10){
            esquerda.y -= (esquerda.speed + pontos.mod);
        }
        else if(83 in teclas && esquerda.altura + esquerda.y < canvas.height -10 ){
            esquerda.y += (esquerda.speed + pontos.mod);
        }

        if(a == "play"){
            if(direita.y + (direita.altura / 2) >= bola.y && direita.y > 10 && bola.x >= canvas.width / 2){
                direita.y -= (direita.speed + pontos.mod);
            }
            else if( direita.y - (direita.altura / 2) <= bola.y && direita.y + direita.altura < canvas.height - 10  && bola.x >= canvas.width / 2 ){
                direita.y += (direita.speed + pontos.mod);
            }  
        }else {
            if(38 in teclas && direita.y > 10){
                direita.y -= (direita.speed + pontos.mod);
            }
            else if(40 in teclas && direita.altura + direita.y < canvas.height -10 ){
                direita.y += (direita.speed + pontos.mod);
            }
        }

    }
            
    function moveBola(){
                
        if(pontos.mod > 10){
            pontos.mod = 10;                    
        }

        if(bola.y + bola.grau >= esquerda.y - 5 && bola.y <= esquerda.y + esquerda.altura - 5 && bola.x <= esquerda.x + esquerda.largura){
            efeito();
            bola.dirx = 1;
            bola.mod += (canvas.width * 0.0008);
            pontos.mod += 0.6;
        }
        else if(bola.y + bola.grau >= direita.y - 5 && bola.y <= direita.y + direita.altura - 5 && bola.x + bola.grau >= direita.x){
            efeito();
            bola.dirx = -1;
            bola.mod += (canvas.width * 0.0008);
            pontos.mod += 0.6;
        }

        if(bola.y  >= esquerda.y + (esquerda.altura * 0.01) && bola.y <= esquerda.y + (esquerda.altura * 0.10) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = - 1.2;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.11) && bola.y <= esquerda.y + (esquerda.altura * 0.20) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = - 1;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.21) && bola.y <= esquerda.y + (esquerda.altura * 0.30) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = - 0.8;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.31) && bola.y <= esquerda.y + (esquerda.altura * 0.40) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = - 0.6;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.41) && bola.y <= esquerda.y + (esquerda.altura * 0.50) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = - 0.4;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.51) && bola.y <= esquerda.y + (esquerda.altura * 0.60) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = 0.4;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.61) && bola.y <= esquerda.y + (esquerda.altura * 0.70) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = 0.6;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.71) && bola.y <= esquerda.y + (esquerda.altura * 0.80) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = 0.8;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.81) && bola.y <= esquerda.y + (esquerda.altura * 0.90) && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = 1;
        }else if(bola.y  >= esquerda.y + (esquerda.altura * 0.91) && bola.y <= esquerda.y + esquerda.altura && bola.x <= esquerda.x + esquerda.largura ){
            bola.diry = 1.2;
        }
		
        else if(bola.y  >= direita.y + (direita.altura * 0.01) && bola.y <= direita.y + (direita.altura * 0.10) && bola.x + bola.largura >= direita.x ){
            bola.diry = - 1.2;
        }else if(bola.y  >= direita.y + (direita.altura * 0.11) && bola.y <= direita.y + (direita.altura * 0.20) && bola.x + bola.largura >= direita.x ){
            bola.diry = - 1;
        }else if(bola.y  >= direita.y + (direita.altura * 0.21) && bola.y <= direita.y + (direita.altura * 0.30) && bola.x + bola.largura >= direita.x ){
            bola.diry = - 0.8;
        }else if(bola.y  >= direita.y + (direita.altura * 0.31) && bola.y <= direita.y + (direita.altura * 0.40) && bola.x + bola.largura >= direita.x ){
            bola.diry = - 0.6;
        }else if(bola.y >= direita.y + (direita.altura * 0.41) && bola.y <= direita.y + (direita.altura * 0.50) && bola.x + bola.largura >= direita.x ){
            bola.diry = - 0.4;
        }else if(bola.y >= direita.y + (direita.altura * 0.51) && bola.y <= direita.y + (direita.altura * 0.60) && bola.x + bola.largura >= direita.x ){
            bola.diry = 0.4;
        }else if(bola.y >= direita.y + (direita.altura * 0.61) && bola.y <= direita.y + (direita.altura * 0.70) && bola.x + bola.largura >= direita.x ){
            bola.diry = 0.6;
        }else if(bola.y  >= direita.y + (direita.altura * 0.71) && bola.y <= direita.y + (direita.altura * 0.80) && bola.x + bola.largura >= direita.x ){
            bola.diry = 0.8;
        }else if(bola.y  >= direita.y + (direita.altura * 0.81) && bola.y <= direita.y + (direita.altura * 0.90) && bola.x + bola.largura >= direita.x ){
            bola.diry = 1;
        }else if(bola.y >= direita.y + (direita.altura * 0.91) && bola.y <= direita.y + (direita.altura) && bola.x + bola.largura >= direita.x ){
            bola.diry = 1.2;
        }
                
        if(bola.y <= 0){
            bola.diry = 1;
        }else if(bola.y + bola.grau >= canvas.height){
            bola.diry = -bola.diry;
        }
                
        if(bola.mod > 14){
            bola.mod = 14;
        }
        bola.x += (bola.speed + bola.mod) * bola.dirx;
        bola.y += (bola.speed + bola.mod) * bola.diry;
                
        if(bola.x < esquerda.x + esquerda.largura - 15){
            newGame("player2");
        }
        else if(bola.x + bola.largura > direita.x + 15){
            newGame("player1");
        }
                
    };
      
    function itemSpeed(){
      
      if(item.y <= 0){
          item.diry = 0.8;      
      }
      else if(item.y + item.altura >= canvas.height){
          item.diry = -0.8;
      }
      
      if(bola.y + bola.grau >= item.y && bola.y <= item.y + item.altura && bola.x <= item.x + item.largura && bola.x + bola.grau >= item.x){
            bola.mod += 0.5;
        }
      
      item.y += item.diry;
    }
    
    function redimensiona(){  
	    
       canvas.height = window.innerHeight;
       canvas.width = window.innerWidth;
    
       if(canvas.height > canvas.width){
    	  canvas.height = canvas.width;
       }
    
       item.x = (canvas.width / 2) - 1;
       item.altura = canvas.height / 8;
       
       bola.x = (canvas.width / 2) - 12;
       bola.y = (canvas.height / 2) - 12;
       bola.grau = canvas.height / 75;
       
       esquerda.y = (canvas.height / 2) - 60;
       esquerda.altura = canvas.height / 6;
       esquerda.largura = canvas.width * 0.013;
      
       direita.y = (canvas.height / 2) - 60;
       direita.x = canvas.width - (canvas.width * 0.013) - 10;
       direita.largura = canvas.width * 0.013;
       direita.altura = canvas.height / 6;	
      	
    }
          
    function newGame(winner){
        if(winner === "player1"){ 
            esquerda.score++;
            pontos.points--;
        }else{
            direita.score++;
            pontos.points--;
        }
                
        esquerda.y = canvas.height / 2 - esquerda.altura / 2;
        direita.y = esquerda.y;
        bola.y = canvas.height / 2 - bola.grau / 2;
        bola.x = canvas.width / 2 - bola.grau / 2;
        bola.mod = 0;
        pontos.mod = 0;
        item.y = 0;
    };

    function desenha(){  
                 
        context.clearRect(0, 0, canvas.width, canvas.height);
        
        moveBloco();
        moveBola();
        itemSpeed();
        
        context.beginPath();   
        context.fillStyle = "red";
        context.rect(item.x, item.y, item.largura, item.altura); 
        context.fill(); 
           
        context.beginPath(); 
        context.fillStyle = "rgb(34,190,38)";
        context.strokeStyle = "black";           
        context.rect(esquerda.x, esquerda.y, esquerda.largura, esquerda.altura);
        context.rect(direita.x, direita.y, direita.largura, direita.altura);        
        context.stroke();
        context.arc(bola.x, bola.y, bola.grau, 0, 2 * Math.PI);
        context.fill();
    
        context.fillStyle = "rgb(24,101,15)";
        context.font = "40px Verdana";
        context.fillText(esquerda.score,80, 60);
        context.fillText(direita.score, canvas.width - 90, 60);
        
        if(pontos.points == 0){
            if(esquerda.score > direita.score){
                alert('Player 1 venceu!');
            }else{
            	alert('Player 2 venceu!');
            }
            top.location.href='index.html';
        }

    };
    setInterval(desenha, 15);
    desenha();            
}