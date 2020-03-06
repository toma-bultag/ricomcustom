jQuery(document).ready(function( $ ) {

	


	$('.buildings__item').addClass( "test" );


 });



let opala = "opa-pa-pa-pa";

jQuery(document).ready(function( $ ) {

	document.addEventListener("click", opa)

	function opa(){
		// alert(opala);
	}


 });

let myColors = ['red', 'orange', 'yellow', 'black', 22*5];

myColors.forEach(say);

function say(color){
	console.log("hoho is " + color)	
}


let pets  = [

	{sex: "woman", name: "Asq ", age: 40 },
	{sex: "man", name: "Vesko", age: 57},
	{sex: "man", name: "Popo", age: 12},
	{sex: "man", name: "Gicho", age: 56},
	{sex: "man", name: "Gencho", age: 21}
]

function onlyMen(x) {
	return x.sex == "man";
}

function onlyMladi(x) {
	return x.age < 50;
}

function nameOnly(x) {
	return x.name
}

let mladiMaje = pets.filter(onlyMen).filter(onlyMladi).map(nameOnly)


console.log(mladiMaje);


//todo list
let ourForm = document.getElementById("ourForm");
let ourField = document.getElementById("ourField");
let ourList = document.getElementById("ourList");

ourForm.addEventListener("submit", (e) => {
	e.preventDefault();
	createItem(ourField.value);
})

function createItem(x) {
	let ourHTML = `<li>${x} <button onclick="ma(this)">Delete</button> </li>`;
	ourList.insertAdjacentHTML("beforeend", ourHTML);
	ourField.value = "";
	ourField.focus();	
	// deleteItem(x);
}

function ma(el) {
    el.parentElement.remove();
}















