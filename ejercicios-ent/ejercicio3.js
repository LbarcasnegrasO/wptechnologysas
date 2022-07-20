/*
Enunciado Ejercicio 3.
Dada una palabra,, buscar en una frase y devolver cuantas veces aparece en ella.
La frase y la palabra deben ser parametros de una función.

Ejemplos:
Coincidencias("hola soy una palabra en una frase, PALABRA.","palabra")// Devuelve: 2.
coincidencias("soy la frase", "victor")// Devuelve: 0

Como hacerlo:
- Funcion con dos parametros "frase" y "busqueda"
- Poner string en minusculas y limpiarlo // quitar ",/./-"
- Comprobar si la busqueda esta incluida en la frase
- Crear una array de palabras de la frase
- Mapear esas palabras y hacer un contador de cada una
- Devolver el contador de la busqueda
*/

function coincidencias(frase, busqueda){
    let text_limpio = frase
                        .toLowerCase()// colocar en minusculas la letras dentro de la frase
                        .replace(/[!¡.,-]/gi,'');// limpiador de letras de frase de(, / . y -)
    
    let resultado = 0;

    if(text_limpio.includes(busqueda)){
        let palabras = text_limpio.split(" ");// separa las palabra y la incluye en un array

        let mapa = {};
        for(let palabra of palabras){
           if(mapa[palabra]){
              mapa[palabra]++; 
           }else{
               mapa[palabra] = 1;
           }

        }
        resultado = mapa[busqueda];

    }else{
        resultado = 0;
    }

    return resultado;

    console.log(text_limpio);
}
console.log(
    "Numero de coincidencias en la frase: ",
    //coincidencias("Hola, que tal, soy LUIS oviedo. luis luis", "oviedo"),
    coincidencias("Esta es mi frase", "paco")
);