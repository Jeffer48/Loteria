let inicio = 0;
//Arreglo que contara las 61 cartas
let arr = new Array(61);
arr[0] = Math.floor((Math.random() * 59) + 2);
setInterval(() => {
    //Inicio nos dara el tope de cartas maximas que tenemos
    inicio++;
    //Contador sera el que nos ayudara a poner limites en el ciclo while para checar cartas repetidas
    contador = 0;
    if (inicio < 61) {
        let randomCard = Math.floor((Math.random() * 59) + 2); //Generamos las cartas
        //verificamos los numero para que no se repitan las cartas
        while (contador < inicio) {
            //Si la carta en la posicion inicio es la misma que el randomCard y inicio diferente que el ultimo dato
            if (randomCard === arr[contador] && contador != inicio - 1) {
                //generamos otro numero y volvemos a empezar la busqueda
                randomCard = Math.floor((Math.random() * 59) + 2);
                arr[inicio - 1] = randomCard;
                contador = 0;
            } else if ((contador + 1) == inicio) {
                //introducimos el numero en el arreglo y salimos del ciclo for
                arr[inicio - 1] = randomCard;
                contador = 78; //lo utilizamos para salir del ciclo
            }

            contador++;
        }
        //funcion para ir metiendo las cartas a un arreglo, pasandole valores
        agregar(randomCard, inicio, arr);

        //ponemos la etiqueta imagen con la carta de loteria en una varible con el numero random que nos dio
        let salida = `<img src="img/Cartas/Loteria-${randomCard}.png" alt="Carta de loteria" class="cartas-juego"></img>`;
        //sacamos el div con el id para agregar la etiqueta imagen el index nos indica el numero de div
        document.getElementById("salida").innerHTML = salida;
        //console.log(randomCard);
        val();
    }
}, 2000);


function agregar(cadena, i, arr) {
    arr[i] = cadena;
    //console.log(arr);

    console.log(cadena);
}

(function() {
    "use strict";
    const cards = document.querySelectorAll(".loteria-card");

    /*let firstCard, secondCard;
    const cardsl = document.querySelectorAll(".cartas-juego");
    const botoni = document.querySelectorAll(".boton-inicio");
    let firstCard, secondCard;
    let hasFlippedCard = false;
    let lockBoard = false;
    let match = 0;

    /*function flipCard() {

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
    }*/
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

    })();

    /* */

    /*function FindelJuego() {
        setTimeout(() => {
            if (match == 6)
                alert("Has ganado")
        }, 2000);
    }

    /* Funcion que revisa la igualdad de las cartas */
    /* function checkForMatch() {
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

     cards.forEach(card => card.addEventListener("click", flipCard));*/



})();

/*-----------------------------------Validaciones------------------------------------------*/
let cartasAtrasadas = new Array(); //Arreglo de cartas pasadas
const cartasTablero = document.querySelectorAll('.loteria-card');
cartasTablero.forEach(carta => carta.addEventListener('click', validar));

let puntaje = 0;

function validar() {
    let cartaJugador = this; //Con esto guardo la opción de la carta seleccionada

    cartasAtrasadas.forEach(cartaA => match(cartaA));

    let isMatch = false;

    function match(cartaA) {
        if (cartaA.src == cartaJugador.lastElementChild.src) {
            let ficha =
                `<img src="img/ficha.png" class="ficha" alt="ficha">`;
            //`<img src="../Cris.png" class="ficha" alt="ficha" width="80px" height="80px" style="position: absolute; left: 30px; top: 30px">`;
            cartaJugador.innerHTML += ficha; //Se agrega la ficha, necesita sumarse para no eliminar la carta
            puntaje++;
            if (puntaje == 16) {
                let inicion = 63;
                setTimeout(() => {
                    alert("GANASTE!!");
                }, 800);
            }
            console.log('El puntaje es ' + puntaje);
            console.log('match');
            console.log(cartaJugador);
        }
    }
}

function val() {
    let carta = document.querySelector('.cartas-juego').firstChild;
    cartasAtrasadas.push(carta);
}