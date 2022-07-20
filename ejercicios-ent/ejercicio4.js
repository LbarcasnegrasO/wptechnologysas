/*
Enunciado Ejercicio 4:
Dada una cadena de texto, darle la vuelta e invertir el orden de sus caracteres,
sin usar métodos propios del lenguaje, solo estructuras de control.

Ejemplos:
invertir('hola')  // Devuelve: 'aloh'
invertir('victor') // Devuelve: 'rotciv'
invertir('robles') // Devuelve: 'selbor'

Como hacerlo:
- Funcion con parametro "cadena"
- Crear una variable para guardar la cadena invertida
- Bucle que recorra el string y guarde los caracteres en la variable


 function invertir(texto){

    let invertido = "";

    for(let letra of texto){
        invertido = letra + invertido;
    }
    return invertido;
}

function invertido(texto){
    return texto.split("").reverse().join('');
}
*/
/*
console.log("Texto invertido: ", invertir("wptechnologysas.com"));
let animals = ["eagle","osprey","salmon"];

let key = animal => animal === "salmon";

if(animals.some(key)){
    console.log("swim");
}*/

class Animal {
    static belly = [];
    eat() { Animal.belly.push("food");}
}

let a = new Animal();
a.eat();

console.log(Animal.belly[0]);
