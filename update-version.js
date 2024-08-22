const fs = require("fs");
const path = require("path");

// Caminho para o arquivo composer.json
const composerJsonPath = path.join(__dirname, "composer.json");

// Ler o conteúdo do arquivo composer.json
const composerJson = JSON.parse(fs.readFileSync(composerJsonPath, "utf8"));

// Incrementar a versão
const versionParts = composerJson.version.split(".");
versionParts[2] = parseInt(versionParts[2], 10) + 1;
composerJson.version = versionParts.join(".");

// Escrever de volta no arquivo composer.json
fs.writeFileSync(
  composerJsonPath,
  JSON.stringify(composerJson, null, 2) + "\n"
);

console.log(`Versão atualizada para ${composerJson.version}`);
