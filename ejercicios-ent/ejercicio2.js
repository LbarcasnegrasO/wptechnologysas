/*
Enunciado Ejercicio 2:
Dada una cadena de texto, comprobar si es un palíndromo o no.
Los palindromos son palabras que se leen igual aun estando invertidas o normal.
Por ejemplo: ana, bob, otto, allivessevilla.
*/

function palindromo(texto){
    let invertido = texto
                    .split('')// separa las palabra y la incluye en un array
                    .reverse()// Coloca la palabra de atras para alante, es decir al reves
                    .join('');// Une el array de letras
    return (invertido === texto);
}

console.log("¿Es un palindromo?" + palindromo("otto"));