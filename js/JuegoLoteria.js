(function() {
    "use strict";
    const cards = document.querySelectorAll(".loteria-card");
    let firstCard, secondCard;
    let hasFlippedCard = false;
    let lockBoard = false;
    let match = 0;

    function flipCard() {

        if (lockBoard) return;
        if (this === firstCard) return;
        this.classList.add('flip');

        if (!hasFlippedCard) {
            hasFlippedCard = true;
            firstCard = this;
            return;
        }
        secondCard = this;
        checkForMatch();
        FindelJuego();
    }

    /* funcion para generar las cartas aleatoriamente */
    (function Agregarcartas() {
        let index = 0; //sirve para recorrer los div de la pagina JuegoLoteria
        //en este arreglo guarda los numeros de la carta
        let numerocartas = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        cards.forEach(card => {
            index++; //contador para recorrer los id de los div
            let randomCard = Math.floor((Math.random() * 59) + 2); //sacamos una carta aleatoria de nuestra carpeta
            let i = 0; //contador para el while que utilizaremos en el while mas adelante
            //agregamos al primero en la fila
            if (numerocartas[0] == "") {
                numerocartas[0] = randomCard;

            } /*si ya se introdujo el primero realizamos lo siguiente */
            else {
                //verificamos los numero para que no se repitan las cartas
                while (i < index) {
                    //si la carta en la posicion i es la misma que el randomCard y i diferente que el ultimo dato
                    if (randomCard === numerocartas[i] && i != index - 1) {
                        //generamos otro numero y volvemos a empezar la busqueda
                        randomCard = Math.floor((Math.random() * 59) + 2);
                        numerocartas[index - 1] = randomCard;
                        i = 0;
                    } /*si el se acaban de recorrer todos los datos sin repeticiones se agrega y se sale del ciclo*/
                    else if ((i + 1) == index) {
                        //introducimos el numero en el arreglo y salimos del ciclo for
                        numerocartas[index - 1] = randomCard;
                        i = 18; //lo utilizamos para salir del ciclo
                    }
                    i++;
                }
            }

            //ponemos la etiqueta imagen con la carta de loteria en una varible con el numero random que nos dio
            let ventana = `<img src="img/Cartas/Loteria-${numerocartas[index - 1]}.png" alt="Carta de loteria" class="front-card"></img>`;
            //sacamos el div con el id para agregar la etiqueta imagen el index nos indica el numero de div
            document.getElementById("posicion" + index).innerHTML = ventana;
        });
        console.log(numerocartas);
    })();

    function FindelJuego() {
        setTimeout(() => {
            if (match == 6)
                alert("Has ganado")
        }, 2000);
    }

    /* Funcion que revisa la igualdad de las cartas */
    function checkForMatch() {
        var puntaje = document.getElementById("puntaje");
        if (firstCard.dataset.carta === secondCard.dataset.carta) {
            disableCards();
            match = 1 + match;
            puntaje.innerHTML = match * 100;
        } else {
            unflipCards();
        }
    }

    function unflipCards() {
        lockBoard = true;
        setTimeout(() => {
            firstCard.classList.remove("flip");
            secondCard.classList.remove("flip");
            lockBoard = false;
            resetBoard();
        }, 1500);
    }

    function disableCards() {
        firstCard.removeEventListener("click", flipCard);
        secondCard.removeEventListener("click", flipCard);
        resetBoard();
    }

    function resetBoard() {
        [hasFlippedCard, lockBoard] = [false, false];
        [firstCard, secondCard] = [null, null];
    }

    cards.forEach(card => card.addEventListener("click", flipCard));



})();