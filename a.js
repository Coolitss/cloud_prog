const rs = require("readline-sync");




while(true){
    const q = rs.question("Enter a number: ");
    const rand = Math.floor(Math.random() * 10);

    if(q == rand){
        console.log("You hit a monster! \nAnother monster appeared!");
    }else if(q !== rand){
        console.log("Oops you missed!");
    }
} 