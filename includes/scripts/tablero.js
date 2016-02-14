
$(document).on('ready', function() {

    //dibujar una fila
    // dibujar 8 filas
    // posicion tablero, color casillas

    //cargar sprites
    //ubicar sprites
    //posicion inicial

    //eventos click
    //movimientos
    //reglas
    
    var CASILLA_NEGRA = '#9f7119',
	CASILLA_BLANCA = '#debf83',
	HIGHLIGHT_COLOUR = '#fb0006';

    var filas = 8;
    var tamCasilla;
    var tablero = $("#tablero");
    var ctx = tablero[0].getContext('2d');

    function main() {
        tamCasilla = tablero / filas;
        //dibujar tablero vacio
        dibujarTablero();
    }

    function dibujarTablero() {
        // ciclo para 8 filas
        for (var i = 0; i < filas; i++) {
            dibujarFila(i);
        }
        
        ctx.lineWidth = 3;
        ctx.strokeRect(0, 0, filas * tamCasilla, tamCasilla * tamCasilla); 
    }

    function dibujarFila(nfila) {
        //dibujar 8 casillas de izq a derecha
        for (var icasilla = 0; icasilla < filas; icasilla++) {
            dibujarCasilla(nfila, icasilla);
        }
    }

    function dibujarCasilla(nfila, icasilla) {

        ctx.fillStyle = getColor(nfila, icasilla);
        
        //dibujar el rectangulo para el fondo
        ctx.fillRect(nfila * tamCasilla, icasilla * tamCasilla, tamCasilla, tamCasilla);
        
        ctx.stroke();
    }
    
    function getColor(nfila, ncasilla){
        
        var color;
        
        if(nfila%2){
            // si la fila es impar
            //casilla impar = blanco  par= negro
            color = (ncasilla%2?CASILLA_BLANCA:CASILLA_NEGRA);
        }
        else{
            // si la fila es par
            // casilla impar= negro  par = blanco
            color = (ncasilla%2?CASILLA_NEGRA:CASILLA_BLANCA);
        }
        
        return color;
    }

    main();



});