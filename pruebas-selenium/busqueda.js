const { Builder, By, Key, until } = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');

// Configuración del WebDriver para Chrome
let driver = new Builder()
    .forBrowser('chrome')
    .setChromeOptions(new chrome.Options())
    .build();

async function runTest() {
    try {
        // Ir a la página principal y verificar
        await driver.get('https://tochamateriasprimas.com/');
        let searchBox = await driver.findElement(By.name('search'));
        await searchBox.sendKeys('laptop', Key.RETURN);
        await driver.sleep(2000);
        let results = await driver.findElements(By.css('.product-item'));
        console.log(results.length > 0 ? 'Resultados encontrados' : 'Sin resultados');
    } finally {
        // Paso 4: Cerrar el navegador
        await driver.quit();
    }
}

// Ejecutar la prueba
runTest();
