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
        await driver.get('https://tochamateriasprimas.com/ventas.php');
        
        await driver.get('https://tusitio.com/checkout');
        await driver.findElement(By.id('confirmar-pago')).click();
        await driver.sleep(2000);
        let errorMessage = await driver.findElement(By.css('.error-message')).getText();
        console.log(errorMessage ? 'Mensaje de error mostrado' : 'No se detectó mensaje de error');

    } finally {
        // Paso 4: Cerrar el navegador
        await driver.quit();
    }
}

// Ejecutar la prueba
runTest();
