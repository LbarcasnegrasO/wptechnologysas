let dinerCofla = prompt("Cuanto diner tienes Cofla?");
let dinerRoberto = prompt("Cuanto diner tienes Roberto?");
let dinerPedro = prompt("Cuanto diner tienes Pedro?");

if (dinerCofla >= 0.6 && dinerCofla < 1){
	alert("comprate el helado de agua");
}
else if (dinerCofla >= 1 && dinerCofla < 1.6){
	alert("comprate el helado de crema");
}
else if (dinerCofla >= 1.6 && dinerCofla < 1.7){
	alert("comprate el helado de hedix");
}
else if (dinerCofla >= 1.7 && dinerCofla < 1.8){
	alert("comprate el helado de heladovich");
}
else if (dinerCofla >= 1.8 && dinerCofla < 2.9){
	alert("comprate el helado de helardo");
}
else if (dinerCofla >= 2.9){
	alert("comprate el helado con confites o el pote de 1/4kg");
}
else {
	alert("Lo siento, no tienes suficiente dinero!");
}