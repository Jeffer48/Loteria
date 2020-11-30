(function (){
    const cards = document.querySelectorAll('.loteria-card');
    cards.forEach(card => card.addEventListener('click', validar));
    
    function validar(){
        let cartaJugador = this.lastElementChild.src;   //Con esto tomamos la localización de la carta para comparar
        let cartaActual = document.querySelector('.cartas-juego').firstChild.src;   //Con esto tomo la localización de la carta del mazo
        
        if(cartaActual == cartaJugador){
            let ficha = `<img src="img/ficha.png" alt="ficha" width="80px" height="80px" style="position: absolute; left: 30px; top: 30px"></img>`;
            this.innerHTML += ficha;    //Se agrega la ficha, necesita sumarse para no eliminar la carta
        }else{
            console.log("carta incorrecta");
        }
        
    }
})();