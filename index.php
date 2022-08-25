<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        canvas{
            border: 1px solid;
        }
        #imagen{
            display: none;
        }
    
    </style>
</head>
<body>
 
    <canvas id="canvas" width="500" height="500">
        Hola, tu navegador no funciona
    </canvas>
      <!-- }  <img src="descarga.jpg" alt="" id="imagen"> -->

    <script>
        var canvas = null;
        var ctx = null;
        var color = 'red';
        var fig = 'arc';
        var press = false;
        let direccion = 'rigth';

       var superX = 0;
        var superY = 0; 
        var player1 = null;
        var player2 = null;
        let speed = 10;


        let shark  =new Image();
        let coin  =new Image();
        let wall  = new Image();

        var audio1 = new Audio();

        let pause = false;


        let pared  = null;
        function run(){
            canvas = document.getElementById('canvas');
            ctx = canvas.getContext('2d');
            player1 = new Cuadro(250, 250, 40,40, 'red');
            player2 = new Cuadro(getRandomInt(0, 500), getRandomInt(0, 500), 40,40, 'green')
            pared = new Cuadro(40,120,30,300, 'gray');


            shark.src = 'shark.jpg';
            coin.src = 'coin.jpg';


            audio1.src = 'mario-coin.mp3';
            paint();
        }


        function getRandomInt(min = 0, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min) + min);
}

       

        function paint(){

            window.requestAnimationFrame(paint);
            player1.pintar(ctx);

          //  player2.pintar(ctx);
 
            ctx.fillStyle = 'white';
            ctx.fillRect(0,0,500,500);
            ctx.fillStyle = player1.c;


         //   ctx.fillRect(player1.x,  player1.y, 40,40);

             ctx.drawImage(shark, player1.x, player1.y, 40,40);



            ctx.fillStyle = player2.c;
            ctx.drawImage(coin, player2.x,  player2.y, 40,40);



            pared.pintar(ctx);

        if(pause){
        
            ctx.fillStyle = 'rgba(0,00,0,0.5)';
            ctx.fillRect(0,0,500,500);
        }else{
            update()
        }

           // update();
          /*   ctx.fillStyle = 'green';
            ctx.fillRect(player2.x,  player2.y, 40,40);
 */
/* 
            player1.x+=10;

            if(player1.x>500)
            player1.x = 0; */
           
      /*       player2.x+=15;

            if(player2.x>500)
            player2.x = 0;

            if(player1.se_tocan(player2)){
                console.log('toca');
            }
 */

 function update(){
 
    if(direccion == 'up'){
            //arriba
                // pla}yer1-=20;
         
            
               player1.y -= speed;
               if(player1.y < 0){
                    player1.y = 500
                }
    
            } 
            if(direccion == 'down'){
                //abajo
            
                //  superY+=20;

                player1.y+= speed;
                if(player1.y > 500){
                    player1.y = 0
                }
            } 
            if(direccion == 'left'){
                //izq
             
                player1.x-= speed;
                if(player1.x < 0){
                    player1.x = 500
                }
                // superX-=20;
            } 
            if(direccion ==  'rigth'){
                //der
                // superX+=20;
                player1.x+= speed;
                if(player1.x > 500){
                    player1.x = 0
                }
            
             
            } 

            if(player1.se_tocan(player2)){  
                player2.x = getRandomInt(0, 500)
                player2.y = getRandomInt(0, 500)
                audio1.play();
                // player1.speed = 500;
            }

            if(player1.se_tocan(pared)){
                 if(direccion == 'up'){
                    player1.y +=speed;
                }

                 if(direccion == 'down'){
                    player1.y -=speed;
                } 


                 if(direccion == 'rigth'){
                    player1.x -=speed;
                }

                if(direccion == 'left'){
                    player1.x +=speed;
                }  
            }
 
 }
            


            
        }

        window.requestAnimationFrame = (function () {
        return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 17);
        };
    }());


    document.addEventListener('keydown',(e)=>{
        console.log(e.keyCode);//w = 87, 

            if(e.keyCode==87 || e.keyCode == 38){
            //arriba
                // pla}yer1-=20;

                direccion = 'up'
            } 
            if(e.keyCode==40 || e.keyCode == 83){
            //abajo
            direccion = 'down'
              //  superY+=20;
            } 
            if(e.keyCode==37 || e.keyCode == 65){
            //izq
            direccion = 'left'
               // superX-=20;
            } 
            if(e.keyCode==39 || e.keyCode == 68){
            //der
               // superX+=20;
               direccion = 'rigth'
            } 
        
            console.log('asdadsa', pause ) ;


            if (e.keyCode == 32 ){
            pause =  (pause) ? false: true;
        } 
   
        }); 


    window.addEventListener('load',run);

    function Cuadro(x, y, w, h , c){
        this.x = x;
        this.y = y;
        this.w = w;
        this.h = h;
        this.c = c;



        this.pintar = function(ctx){
            ctx.fillStyle = this.c;
            ctx.fillRect(this.x,this.y,this.w,this.h);
            ctx.strokeRect(this.x,this.y,this.w,this.h);
            // ctx.fillRec}{}t(superX, superY, 40,40);
        }

    this.se_tocan = function (target) { 
        if(this.x < target.x + target.w &&

        this.x + this.w > target.x && 

        this.y < target.y + target.h && 

        this.y + this.h > target.y)
        {
        return true;	 
        }  
        };
    }





</script>
</body>
</html>