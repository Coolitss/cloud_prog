function generateQoutes(){
    const qoutes = [
        "Success is not final, failure is not fatal: It is the courage to continue that counts.",
        "The only way to do great work is to love what you do.",
        "Believe you can and you're halfway there.",
        "In the middle of every difficulty lies opportunity.",
        "The future belongs to those who believe in the beauty of their dreams."
    ];

    const randomIndex = Math.floor(Math.random() * qoutes.length);

    const randomQoutes = qoutes[randomIndex];

    document.getElementById("qoute").innerHTML = randomQoutes;
}

    document.getElementById("generateButton").addEventListener("click", generateQoutes);