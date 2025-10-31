const fs = require('fs');
const path = require('path');
const textParagraph = document.getElementById("testObject")
console.log(textParagraph,"bruh")

const files = fs.readdirSync('.')
textParagraph.innerHTML = `${path.join('./',files[0])}`