let rageFirst = document.getElementById('rageFirst');
let healthFirst = document.getElementById('healthFirst');
let healthFirstDiv = document.getElementById('healthFirstDiv');

let rageSecond = document.getElementById('rageSecond');
let healthSecond = document.getElementById('healthSecond');
let healthSecondDiv = document.getElementById('healthSecondDiv');

let healthFirstPercent = 100*(healthFirst.innerHTML)/2000;
let healthSecondPercent = 100*(healthSecond.innerHTML)/500;

console.log(healthSecondPercent);

healthFirstDiv.style.width= healthFirstPercent+"%";

healthSecondDiv.style.width= healthSecondPercent+"%";

// if(healthSecondPercent = "0"){
//     healthSecondDiv.style.padding = "0";
//     healthSecondDiv.style.width= "100%";
//     healthSecondDiv.style.backgroundColor ="transparent";
//     healthSecondDiv.style.color = "red";
//     healthSecondDiv.style.fontSize = "150%";
//     healthSecondDiv.innerHTML="Défaite";
// }

// if(healthFirstPercent = "0"){
//     healthFirstDiv.style.padding = "0";
//     healthFirstDiv.style.width= "100%";
//     healthFirstDiv.style.backgroundColor ="transparent";
//     healthFirstDiv.style.color = "red";
//     healthFirstDiv.style.fontSize = "150%";
//     healthFirstDiv.innerHTML="Défaite";
// }