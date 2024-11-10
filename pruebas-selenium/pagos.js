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
        
        // Agregar producto al carrito
        await driver.findElement(By.id('add-to-cart')).click();
        await driver.findElement(By.id('checkout-button')).click();
        await driver.sleep(2000);

        // Llenar datos de pago (esto es una simulación)
        await driver.findElement(By.name('nombre')).sendKeys('Jorge Salgado');
        await driver.findElement(By.name('direccion')).sendKeys('123 Calle Falsa');
        await driver.findElement(By.name('tarjeta')).sendKeys('4111111111111111');
        await driver.findElement(By.id('confirmar-pago')).click();
        await driver.sleep(2000);

        // Verificar mensaje de confirmación
        let confirmationMessage = await driver.findElement(By.css('.confirmation')).getText();
        console.log(confirmationMessage.includes('Gracias por tu compra') ? 'Pago exitoso' : 'Error en pago');

    } finally {
        // Paso 4: Cerrar el navegador
        await driver.quit();
    }
}

// Ejecutar la prueba
runTest();
