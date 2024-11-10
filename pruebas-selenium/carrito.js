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
        await driver.findElement(By.id('add-to-cart')).click();
        await driver.sleep(2000);
        let cartCount = await driver.findElement(By.id('cart-count')).getText();
        console.log(cartCount == '1' ? 'Producto agregado al carrito' : 'Error al agregar al carrito');
    } finally {
        // Paso 4: Cerrar el navegador
        await driver.quit();
    }
}

// Ejecutar la prueba
runTest();
