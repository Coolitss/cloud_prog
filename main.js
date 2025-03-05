//FLORENCE D. FACTON

const http = require('http');
const fs = require('fs');

// Function to generate random temperature between 15°C and 35°C
function generateRandomTemperature() {
    return Math.floor(Math.random() * (35 - 15 + 1) + 15);
}
// Create a server
const server = http.createServer((req, res) => {
    // Read the HTML file
    fs.readFile('m18.html', 'utf8', (err, data) => {
        if (err) {
            res.statusCode = 500;
            res.end('Error loading the HTML file');
        } else {
            // Generate a random temperature
            const temperature = generateRandomTemperature();
            console.log(temperature);
            // Gin Change ko di Sir, (oldTag, newTag) sa newTag na i call si temperature nga may random number
            const modifiedData = data.replace('<span id="temperature-unit">- °C</span>', `<span id="temperature-unit">${temperature} °C</span>`);
            // Set the content type
            res.setHeader('Content-Type', 'text/html');
            // Send the modified HTML to the client
            res.end(modifiedData);
        }
    });
});
// Start the server on port 3000
server.listen(3000, () => {
    console.log('Server running on port 3000');
});